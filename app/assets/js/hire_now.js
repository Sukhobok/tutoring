$(document).on('click', '#ss-hire-now', function () {
	// Close hire form
	$.ssModal({
		action: 'close'
	});

	// Send request
	$.ajax({
		url: '/ajax/user/hire_now',
		type: 'POST',
		data: {
			hours: $('#ss-hire-hours').val(),
			tutor_id: user_view_id,
			description: $('#ss-hire-desc textarea').val()
		}
	}).done(function (data) {
		if(data.error === 1) {
			if (data.error_type === 'hours') {
				$.ssModal({ modalId: 'hire-hours-limit' });
			} else if (data.error_type === 'description') {
				$.ssModal({ modalId: 'hire-description' });
			} else if (data.error_type === 'money') {
				$.ssModal({ modalId: 'hire-money' });
			} else {
				$.ssModal({ modalId: 'hire-other' });
			}
		} else {
			$.ssModal(
			{
				modalId: 'hire-now-send',
				canBeClosed: 0
			});

			var hire_now_send_expire_interval = setInterval(function ()
			{
				var _s = data.expire - Math.round(Date.now() / 1000);

				if (_s < 0)
				{
					clearInterval(hire_now_send_expire_interval);
					$.ssModal(
					{
						action: 'close'
					});
				}
				else
				{
					$('#ss-modal-hire-now-send-expire span').text(convert_seconds(_s));
				}
			}, 1000);
		}
	});
});

socket.on('hire_now', function (data)
{
	$('#ss-modal-hire-now-notify-person img').attr('src', data.student_profile_picture);
	$('#ss-modal-hire-now-notify-person h2').text(data.student_name);
	$('#ss-modal-hire-now-notify-hours').text(data.hours);
	$('#ss-modal-hire-now-notify-price').text(parseInt(data.price / data.hours, 10));
	$('#ss-modal-hire-now-notify-description').text(data.description);
	$('#ss-modal-hire-now-notify-buttons')[0].setAttribute('data-ss-request-id', data.request_id);

	$.ssModal(
	{
		modalId: 'hire-now-notify',
		canBeClosed: 0
	});

	var hire_now_notify_expire_interval = setInterval(function ()
	{
		var _s = data.expire - Math.round(Date.now() / 1000);

		if (_s < 0)
		{
			clearInterval(hire_now_notify_expire_interval);
			$.ssModal(
			{
				action: 'close'
			});
		}
		else
		{	
			$('#ss-modal-hire-now-notify-expire span').text(convert_seconds(_s));
		}
	}, 1000);
});

$('#ss-modal-hire-now-notify-buttons').on('click', '#ss-modal-hire-now-notify-accept', function ()
{
	var _hnr_id = $(this).parent()[0].getAttribute('data-ss-request-id');

	$.ajax(
	{
		url: '/ajax/user/hire_now_approve',
		type: 'POST',
		data: { hnr_id: _hnr_id }
	}).done(function (data)
	{
		window.location.href = '/session/start';
	});
});

$('#ss-modal-hire-now-notify-buttons').on('click', '#ss-modal-hire-now-notify-decline', function ()
{
	var _hnr_id = $(this).parent()[0].getAttribute('data-ss-request-id');
	$.ssModal(
	{
		action: 'close'
	});

	$.ajax(
	{
		url: '/ajax/user/hire_now_decline',
		type: 'POST',
		data: { hnr_id: _hnr_id }
	}).done(function (data)
	{
		//
	});
});

socket.on('hire_now_response', function (data)
{
	if (data.response == 'approve')
	{
		window.location.href = '/session/start';
	}
	else
	{
		$.ssModal(
		{
			action: 'close'
		});
	}
});