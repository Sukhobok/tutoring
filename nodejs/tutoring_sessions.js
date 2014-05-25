var io = require('socket.io').listen(53101);
var needle = require('needle');
var clients = {};
var _signature = '008ae19bff7861eeec0ecdf80f8915b842cd34e1';

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
				if (resp.body.error == 0 && !err)
				{
					var _query = 'uid=' + resp.body.result + '&signature=' + _signature;
					var _url = _base_url + '/api/get_tutoring_session?' + _query;
					needle.get(_url, function (err2, resp2)
					{
						if (resp2.body.error == 0 && !err2)
						{
							// Fill handshake for user
							handshakeData.client_type = 'user';
							handshakeData.user_id = parseInt(resp.body.result, 10);
							handshakeData.ts_id = parseInt(resp2.body.result, 10);

							var _in_room = io.sockets.clients('ts_' + handshakeData.ts_id);
							if (_in_room.length === 0)
							{
								callback(null, true);
							}
							else if (in_room.length === 1)
							{
								if (_in_room[0].handshake.user_id === handshakeData.user_id)
								{
									callback(null, false);
								}
								else
								{
									callback(null, true);
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
					if (typeof handshake.query.signature !== 'undefined'
						&& handshake.query.signature === _signature)
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
			if (typeof handshake.query.signature !== 'undefined'
				&& handshake.query.signature === _signature)
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
	//
});
