var io = require('socket.io').listen(53100);
var clients = {};

io.sockets.on('connection', function (socket) {
	var cookie = socket.handshake.headers.cookie;
	if(cookie) cookie = cookie.split(';');
	else cookie = new Array();
	var sessionId = '';

	cookie.forEach(function (e) {
		var temp = e.split('=');
		// Trim first and last spaces
		temp[0] = temp[0].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		if(temp[0] == 'laravel_session') sessionId = temp[1];
	});

	if(sessionId != '') {
		//
	}
});
