var io = require('socket.io').listen(53101);
var needle = require('needle');
var clients = {};
var _signature = '008ae19bff7861eeec0ecdf80f8915b842cd34e1';
var timeouts = {};

/**
 * Only for debugging
 */
function ss_debug (data)
{
	console.log("\033[31;43m" + data + "\033[0m");
}

io.configure(function ()
{
	io.set('authorization', function (handshakeData, callback)
	{
		var _base_url = handshakeData.headers.origin;
		var cookie = handshakeData.headers.cookie;
		if (cookie)
		{
			cookie = cookie.split(';');
		}
		else
		{
			cookie = new Array();
		}
		var session = '';

		cookie.forEach(function (e)
		{
			var temp = e.split('=');
			// Trim first and last spaces
			temp[0] = temp[0].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			if (temp[0] === 'laravel_session')
			{
				session = temp[1];
			}
		});

		if (session != '')
		{
			var _query = 'session=' + session + '&signature=' + _signature;
			var _url = _base_url + '/api/get_user_by_session?' + _query;
			needle.get(_url, function (err, resp)
			{
				if (!err && resp.body.error == 0)
				{
					var _query = 'uid=' + resp.body.result + '&signature=' + _signature;
					var _url = _base_url + '/api/get_tutoring_session?' + _query;
					needle.get(_url, function (err2, resp2)
					{
						if (!err2 && resp2.body.error == 0)
						{
							// Fill handshake for user
							handshakeData.client_type = 'user';
							handshakeData.user_id = parseInt(resp.body.result, 10);
							handshakeData.ts_id = parseInt(resp2.body.result, 10);
							handshakeData.first_online = false;
							handshakeData.ts_cancel_time = parseInt(resp2.body.cancel_time, 10);

							var _in_room = io.sockets.clients('ts_' + handshakeData.ts_id);
							if (_in_room.length === 0)
							{
								handshakeData.first_online = true;

								setTimeout(function (ts_id, _base_url)
								{
									var _in_room = io.sockets.clients('ts_' + ts_id);
									if (_in_room.length === 1)
									{
										var _query = 'uid=' + _in_room[0].handshake.user_id + '&ts_id=' + ts_id + '&signature=' + _signature;
										var _url = _base_url + '/api/finish_tutoring_session?' + _query;
										needle.get(_url, function (err, resp)
										{
											ss_debug('TS Finished');
											io.sockets.in('ts_' + ts_id).emit('canceled');

											_in_room.forEach(function (item) {
												item.disconnect_by_sever = true;
												item.disconnect();
											});
										});
									}
								}, (parseInt(resp2.body.cancel_time, 10) - Math.round(Date.now() / 1000))*1000, handshakeData.ts_id, _base_url);

								callback(null, true);
							}
							else if (_in_room.length === 1)
							{
								if (_in_room[0].handshake.user_id === handshakeData.user_id)
								{
									callback(null, false);
								}
								else
								{
									var _query = 'uid=' + handshakeData.user_id + '&ts_id=' + handshakeData.ts_id + '&signature=' + _signature;
									var _url = _base_url + '/api/start_tutoring_session?' + _query;
									needle.get(_url, function (err3, resp3)
									{
										if (!err3 && resp3.body.error == 0)
										{
											// Tutoring Session ending Timeout
											if (typeof timeouts['ts_' + handshakeData.ts_id] === 'undefined')
											{
												timeouts['ts_' + handshakeData.ts_id] = setTimeout(function (ts_id, _base_url)
												{
													var _in_room = io.sockets.clients('ts_' + ts_id);
													if (_in_room.length === 2)
													{
														var _query = 'uid=0&ts_id=' + ts_id + '&signature=' + _signature;
														var _url = _base_url + '/api/finish_tutoring_session?' + _query;
														needle.get(_url, function (err, resp)
														{
															ss_debug('TS Finished Normal');
															io.sockets.in('ts_' + ts_id).emit('finished');

															_in_room.forEach(function (item) {
																item.disconnect_by_sever = true;
																item.disconnect();
															});
														});
													}
												}, (parseInt(resp3.body.finish_time, 10) - Math.round(Date.now() / 1000))*1000, handshakeData.ts_id, _base_url);
											}

											io.sockets.in('ts_' + handshakeData.ts_id).emit('started');
											callback(null, true);
										}
										else
										{
											// Couldn't receive response from server
											callback(null, false);
										}
									});

								}
							}
							else
							{
								callback(null, false);
							}
						}
						else
						{
							// Deny
							callback(null, false);
						}
					});
				}
				else
				{
					if (typeof handshakeData.query.signature !== 'undefined'
						&& handshakeData.query.signature === _signature)
					{
						// Allow as server
						handshakeData.client_type = 'server';
						callback(null, true);
					}
					else
					{
						// Deny
						callback(null, false);
					}
				}
			});
		}
		else
		{
			if (typeof handshakeData.query.signature !== 'undefined'
				&& handshakeData.query.signature === _signature)
			{
				// Allow as server
				handshakeData.client_type = 'server';
				callback(null, true);
			}
			else
			{
				// Deny
				callback(null, false);
			}
		}
	});
});

io.sockets.on('connection', function (socket)
{
	var hs = socket.handshake;
	if (hs.client_type === 'user')
	{
		socket.join('ts_' + hs.ts_id);
		if (hs.first_online)
		{
			// Notify user that the other person is not online yet
			socket.emit('waiting', { time: hs.ts_cancel_time });
		}
		else
		{
			// Both should be connected now
			socket.emit('started');
		}
	}

	socket.on('tutoring_session_data', function (data)
	{
		socket.broadcast.to('ts_' + hs.ts_id).emit('tutoring_session_data', data);
		// Store them for the recording
	});

	socket.on('message', function (data)
	{
		socket.broadcast.to('ts_' + hs.ts_id).emit('message', data);
	});

	socket.on('disconnect', function ()
	{
		if (typeof socket.disconnect_by_sever === 'undefined')
		{
			ss_debug('User disconected');
			socket.leave('ts_' + hs.ts_id);

			var _in_room = io.sockets.clients('ts_' + hs.ts_id);
			if (_in_room.length === 1)
			{
				var _base_url = hs.headers.origin;
				var _query = 'uid=' + _in_room[0].handshake.user_id + '&ts_id=' + hs.ts_id + '&signature=' + _signature;
				var _url = _base_url + '/api/finish_tutoring_session?' + _query;
				needle.get(_url, function (err, resp)
				{
					ss_debug('TS Finished');
					io.sockets.in('ts_' + hs.ts_id).emit('canceled');

					_in_room.forEach(function (item) {
						item.disconnect_by_sever = true;
						item.disconnect();
					});
				});
			}
		}
	});
});