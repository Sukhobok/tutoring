var io = require('socket.io')(53100);
var needle = require('needle');
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
 * Socket.IO - Duplicate session
 */
io.use(function (socket, next)
{
	if (socket.request.client_type === 'user')
	{
		if (clients.hasOwnProperty(socket.request.user_id))
		{
			socket.emit('duplicate_session');
			next(new Error('Duplicate session'));
		}
		else
		{
			clients[socket.request.user_id] = socket;
			next();
		}
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
	socket.on('new_message', function (data)
	{
		if (socket.request.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.to_id))
			{
				clients[data.to_id].emit('new_message', data);
			}
		}
	});

	socket.on('hire_now', function (data)
	{
		if (socket.request.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.tutor_id))
			{
				clients[data.tutor_id].emit('hire_now', data);
			}
		}
	});

	socket.on('hire_now_response', function (data)
	{
		if (socket.request.client_type === 'server')
		{
			if (clients.hasOwnProperty(data.student_id))
			{
				clients[data.student_id].emit('hire_now_response', data);
			}
		}
	});

	socket.on('disconnect', function ()
	{
		if (socket.request.client_type === 'user')
		{
			delete clients[socket.request.user_id];
		}
	});
});
