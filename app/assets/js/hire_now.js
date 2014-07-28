socket.on('hire_now', function (data)
{
	$('#ss-modal-hire-now-notify-person img').attr('src', data.student_profile_picture);
	$('#ss-modal-hire-now-notify-person h2').text(data.student_name);
	$('#ss-modal-hire-now-hours').text(data.hours);
	$('#ss-modal-hire-now-price').text(parseInt(data.price / data.hours, 10));
	$('#ss-modal-hire-now-description').text(data.description);
	$('#ss-modal-hire-now-notify-buttons')[0].setAttribute('data-ss-request-id', data.request_id);

	$.ssModal(
	{
		modalId: 'hire-now-notify',
		canBeClosed: 0
	});

	var hire_now_expire_interval = setInterval(function ()
	{
		var _s = data.expire - Math.round(Date.now() / 1000);

		if (_s < 0)
		{
			clearInterval(hire_now_expire_interval);
			$.ssModal(
			{
				action: 'close'
			});
		}
		else
		{
			var _m = 0;
			if (_s > 60)
			{
				_m = Math.floor(_s / 60);
				_s = _s % 60;
			}
			
			$('#ss-modal-hire-now-expire span').text('0' + _m + ':' + ((_s < 10) ? '0' + _s : _s));
		}
	}, 1000);
});

$('#ss-modal-hire-now-notify-buttons').on('click', '#ss-modal-hire-now-notify-accept', function ()
{
	var _hnr_id = $(this).parent()[0].getAttribute('data-ss-request-id');
});

$('#ss-modal-hire-now-notify-buttons').on('click', '#ss-modal-hire-now-notify-decline', function ()
{
	var _hnr_id = $(this).parent()[0].getAttribute('data-ss-request-id');
});
