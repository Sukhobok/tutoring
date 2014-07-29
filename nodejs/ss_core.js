var io = require('socket.io').listen(53100);
var needle = require('needle');
var clients = {};
var _signature = '008ae19bff7861eeec0ecdf80f8915b842cd34e1';

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
					handshakeData.client_type = 'user';
					handshakeData.user_id = parseInt(resp.body.result, 10);
					callback(null, true);
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
		if (clients.hasOwnProperty(hs.user_id))
		{
			socket.emit('duplicate_session');
			socket.disconnect();
		}
		else
		{
			clients[hs.user_id] = socket;
		}
	}

	socket.on('new_comment', function (data)
	{
		//
	});

	socket.on('new_message', function (data)
	{
		if (hs.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.to_id))
			{
				clients[data.to_id].emit('new_message', data);
			}
		}
	});

	socket.on('hire_now', function (data)
	{
		if (hs.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.tutor_id))
			{
				clients[data.tutor_id].emit('hire_now', data);
			}
		}
	});

	socket.on('hire_now_response', function (data)
	{
		if (hs.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.student_id))
			{
				clients[data.student_id].emit('hire_now_response', data);
			}
		}
	});

	socket.on('disconnect', function ()
	{
		if (hs.client_type === 'user')
		{
			delete clients[hs.user_id];
		}
	});
});
