// On load
$(function () { $('.header-notice').html('Please wait ...'); });
var session_finished = false;
var waiting_interval = false;

if(environment === 'local') {
	var ts_socket = io.connect('http://studysquare.lh:53101');
} else {
	var ts_socket = io.connect('http://test232.studysquare.com:53101');
}

ts_socket.on('waiting', function (data) {
	var _time = convert_seconds(data.time - Math.round(Date.now()/1000));
	$('.header-notice').html('Waiting for the other user ... Auto-cancel in <span class="special">' + _time + '</span> minutes!');

	waiting_interval = setInterval(function (_time)
	{
		var _time = convert_seconds(_time - Math.round(Date.now()/1000));
		$('.header-notice').html('Waiting for the other user ... Auto-cancel in <span class="special">' + _time + '</span> minutes!');
	}, 1000, data.time);
});

ts_socket.on('canceled', function () {
	session_finished = true;
	if (waiting_interval !== false)
	{
		clearInterval(waiting_interval); $('.header-notice').html('');
	}
});

ts_socket.on('finished', function () {
	session_finished = true;
	if (waiting_interval !== false)
	{
		clearInterval(waiting_interval); $('.header-notice').html('');
	}
});

ts_socket.on('started', function (data) {
	$.ssModal({ modalId: 'ts-started' });
	if (waiting_interval !== false)
	{
		clearInterval(waiting_interval); $('.header-notice').html('');
	}

	var _time = convert_seconds(data.finish_time - Math.round(Date.now()/1000));
	$('.header-notice').html('The session will end in <span class="special">' + _time + '</span> minutes!');

	waiting_interval = setInterval(function (_time)
	{
		var _time = convert_seconds(_time - Math.round(Date.now()/1000));
		$('.header-notice').html('The session will end in <span class="special">' + _time + '</span> minutes!');
	}, 1000, data.finish_time);
});
