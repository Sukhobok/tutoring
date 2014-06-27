if(environment === 'local') {
	var socket = io.connect('http://studysquare.lh:53100');
} else {
	var socket = io.connect('http://test232.studysquare.com:53100');
}

socket.on('new_message', function (data)
{
	audio_alert();

	$.growl({
		title: "New message!",
		message: '<span class="bold">' + data.from_name + '</span> sent you a message!',
		ss_redirect: '/messages/' + data.from_id
	});
})
