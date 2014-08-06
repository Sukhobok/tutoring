$(document).on('click', '.ss-money-withdrawal-button', function ()
{
	var _withdrawal = parseInt($('.ss-money-withdrawal-input').val(), 10);
	var _available = parseInt($('.ss-money-withdrawal-your-funds').text(), 10);

	if (_withdrawal > _available || _withdrawal == 0)
	{
		$.ssModal(
		{
			modalId: 'withdrawal-error'
		});
	}
	else
	{
		$('.ss-modal-withdrawal-amount').text('$' + _withdrawal);
		$.ssModal(
		{
			modalId: 'withdrawal'
		});
	}
});

$(document).on('click', '.ss-modal-withdrawal-confirm', function ()
{
	$.ajax(
	{
		url: '/ajax/settings/withdrawal',
		type: 'POST',
		data: { amount: parseInt($('.ss-money-withdrawal-input').val(), 10) }
	}).done(function (data)
	{
		if (data.error == 1)
		{
			$.ssModal(
			{
				modalId: 'withdrawal-error2'
			});
		}
		else
		{
			$.ssModal(
			{
				modalId: 'withdrawal-success'
			});

			setTimeout(function ()
			{
				window.location.reload();
			}, 1500);
		}
	});
});
