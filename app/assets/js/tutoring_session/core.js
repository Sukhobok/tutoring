if(environment === 'local') {
	var ts_socket = io.connect('http://192.168.0.100:53101');
} else {
	var ts_socket = io.connect('http://studysquare.com:53101');
}
