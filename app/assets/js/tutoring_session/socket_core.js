var session_finished = false;

if(environment === 'local') {
	var ts_socket = io.connect('http://studysquare.lh:53101');
} else {
	var ts_socket = io.connect('http://studysquare.com:53101');
}

ts_socket.on('waiting', function (data) {
	console.log(data.time - Math.round(Date.now()/1000));
});

ts_socket.on('canceled', function () {
	session_finished = true;
	console.log('canceled');
});

ts_socket.on('finished', function () {
	session_finished = true;
	console.log('finished');
});

ts_socket.on('started', function () {
	console.log('started');
});
