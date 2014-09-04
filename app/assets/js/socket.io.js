if(environment === 'local') {
	var socket = io.connect('http://studysquare.lh:53100');
} else {
	var socket = io.connect('http://studysquare.com:53100');
}

socket.on('duplicate_session', function ()
{
	$.ssModal(
	{
		modalId: 'duplicate-session',
		canBeClosed: 0
	});
});
