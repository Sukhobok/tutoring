var io = require('socket.io')(53101);
var needle = require('needle');
var fs = require('fs');
var _signature = '008ae19bff7861eeec0ecdf80f8915b842cd34e1';
var _environment = process.env.STUDYSQUARE_ENV;
var clients = {};

if (_environment === 'local')
{
	var _base_url = 'http://studysquare.lh';
}
else
{
	var _base_url = 'http://studysquare.com';
}

var get_ss_session_from_cookie = function (cookie)
{
	var session = '';
	if (cookie)
	{
		cookie = cookie.split(';');
	}
	else
	{
		cookie = new Array();
	}

	cookie.forEach(function (e)
	{
		var temp = e.split('=');
		temp[0] = temp[0].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		if (temp[0] === 'laravel_session')
		{
			session = temp[1];
		}
	});

	return session;
}

/**
 * Timeouts
 */
var _ss_cancel = function (ts_id)
{
	var _in_room = typeof io.sockets.adapter.rooms['ts_' + ts_id] === 'undefined' ? [] : Object.keys(io.sockets.adapter.rooms['ts_' + ts_id]);
	if (_in_room.length === 1)
	{
		var _query = 'uid=' + io.sockets.connected[_in_room[0]].request.user_id + '&ts_id=' + ts_id + '&signature=' + _signature;
		var _url = _base_url + '/api/finish_tutoring_session?' + _query;
		needle.get(_url, function (err, resp)
		{
			io.sockets.in('ts_' + ts_id).emit('canceled');

			_in_room.forEach(function (item)
			{
				io.sockets.connected[item].disconnect_by_sever = true;
				io.sockets.connected[item].disconnect();
			});
		});
	}
}

var _ss_finish = function (ts_id)
{
	var _in_room = typeof io.sockets.adapter.rooms['ts_' + ts_id] === 'undefined' ? [] : Object.keys(io.sockets.adapter.rooms['ts_' + ts_id]);
	if (_in_room.length === 2)
	{
		var _query = 'uid=0&ts_id=' + ts_id + '&signature=' + _signature;
		var _url = _base_url + '/api/finish_tutoring_session?' + _query;
		needle.get(_url, function (err, resp)
		{
			io.sockets.in('ts_' + ts_id).emit('finished');

			_in_room.forEach(function (item)
			{
				io.sockets.connected[item].disconnect_by_sever = true;
				io.sockets.connected[item].disconnect();
			});
		});
	}
}

/**
 * Socket.IO - Auth
 */
io.use(function (socket, next)
{
	var session = get_ss_session_from_cookie(socket.request.headers.cookie);

	if (session != '')
	{
		var _query = 'session=' + session + '&signature=' + _signature;
		var _url = _base_url + '/api/get_user_by_session?' + _query;
		needle.get(_url, function (err, resp)
		{
			if (!err && resp.body.error == 0)
			{
				// Allow as user
				socket.request.client_type = 'user';
				socket.request.user_id = parseInt(resp.body.result, 10);
				next();
			}
			else
			{
				if (typeof socket.request._query.signature !== 'undefined'
					&& socket.request._query.signature === _signature)
				{
					// Allow as server
					socket.request.client_type = 'server';
					next();
				}
				else
				{
					// Deny
					next(new Error('Not logged in'));
				}
			}
		});
	}
	else
	{
		if (typeof socket.request._query.signature !== 'undefined'
			&& socket.request._query.signature === _signature)
		{
			// Allow as server
			socket.request.client_type = 'server';
			next();
		}
		else
		{
			// Deny
			next(new Error('Not logged in'));
		}
	}
});

/**
 * Socket.IO - Tutoring Session Check
 */
io.use(function (socket, next)
{
	if (socket.request.client_type === 'user')
	{
		var _query = 'uid=' + socket.request.user_id + '&signature=' + _signature;
		var _url = _base_url + '/api/get_tutoring_session?' + _query;
		needle.get(_url, function (err, resp)
		{
			if (!err && resp.body.error == 0)
			{
				socket.request.ts_id = parseInt(resp.body.result, 10);

				var _in_room = typeof io.sockets.adapter.rooms['ts_' + socket.request.ts_id] === 'undefined' ? [] : Object.keys(io.sockets.adapter.rooms['ts_' + socket.request.ts_id]);
				if (_in_room.length === 0)
				{
					socket.join('ts_' + socket.request.ts_id);
					socket.emit('waiting', { time: parseInt(resp.body.cancel_time, 10) });
					setTimeout(_ss_cancel, (parseInt(resp.body.cancel_time, 10) - Math.round(Date.now() / 1000))*1000, socket.request.ts_id);

					next();
				}
				else if(_in_room.length === 1)
				{
					if (io.sockets.connected[_in_room[0]].request.user_id === socket.request.user_id)
					{
						next(new Error('Already in'));
					}
					else
					{
						socket.join('ts_' + socket.request.ts_id);

						var _query = 'uid=' + socket.request.user_id + '&ts_id=' + socket.request.ts_id + '&signature=' + _signature;
						var _url = _base_url + '/api/start_tutoring_session?' + _query;
						needle.get(_url, function (err2, resp2)
						{
							if (!err2 && resp2.body.error == 0)
							{
								setTimeout(_ss_finish, (parseInt(resp2.body.finish_time, 10) - Math.round(Date.now() / 1000))*1000, socket.request.ts_id);
								
								io.sockets.connected[_in_room[0]].emit('started',
								{
									finish_time: parseInt(resp2.body.finish_time, 10)
								});

								socket.emit('started',
								{
									finish_time: parseInt(resp2.body.finish_time, 10)
								});

								next();
							}
							else
							{
								next(new Error('Error Starting Session'));
							}
						});
					}
				}
				else
				{
					next(new Error('Already two'));
				}
			}
			else
			{
				next(new Error('No Session Found'));
			}
		});
	}
	else
	{
		next();
	}
});

/**
 * Socket.IO
 */
io.on('connection', function (socket)
{
	socket.on('tutoring_session_data', function (data)
	{
		socket.broadcast.to('ts_' + socket.request.ts_id).emit('tutoring_session_data', data);
		fs.writeFile('../app/storage/tutoring_sessions/' + socket.request.ts_id + '/data/' + Date.now() + '.' + socket.request.user_id + '.tsdp', JSON.stringify(data), function (err) {});
	});

	socket.on('server_tutoring_session_data', function (data)
	{
		if (socket.request.client_type === 'server')
		{
			io.sockets.in('ts_' + data.ts_id).emit('tutoring_session_data', data);
			fs.writeFile('../app/storage/tutoring_sessions/' + data.ts_id + '/data/' + Date.now() + '.' + data.user_id + '.tsdp', JSON.stringify(data), function (err) {});
		}
	});

	socket.on('message', function (data)
	{
		socket.broadcast.to('ts_' + socket.request.ts_id).emit('message', data);
	});

	socket.on('close_session', function (data)
	{
		if (socket.request.client_type === 'server')
		{
			_ss_finish(data.ts_id);
		}
	});

	socket.on('disconnect', function ()
	{
		if (typeof socket.disconnect_by_sever === 'undefined' && socket.request.client_type === 'user')
		{
			socket.leave('ts_' + socket.request.ts_id);

			var _in_room = typeof io.sockets.adapter.rooms['ts_' + socket.request.ts_id] === 'undefined' ? [] : Object.keys(io.sockets.adapter.rooms['ts_' + socket.request.ts_id]);
			if (_in_room.length === 1)
			{
				var _query = 'uid=' + socket.request.user_id + '&ts_id=' + socket.request.ts_id + '&signature=' + _signature;
				var _url = _base_url + '/api/finish_tutoring_session?' + _query;
				needle.get(_url, function (err, resp)
				{
					io.sockets.in('ts_' + socket.request.ts_id).emit('canceled');

					_in_room.forEach(function (item)
					{
						io.sockets.connected[item].disconnect_by_sever = true;
						io.sockets.connected[item].disconnect();
					});
				});
			}
		}
	});
});
