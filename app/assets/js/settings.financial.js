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

// Add Dwolla account
$(document).on('click', '.ss-financial-add-dwolla', function ()
{
	$.ssModal(
	{
		modalId: 'add-dwolla'
	});
});

$(document).on('click', '.ss-modal-add-dwolla-save', function ()
{
	var _email = $('input[name="ss-add-dwolla-email"]').val();
	$.ssModal(
	{
		action: 'close'
	});

	$.ajax(
	{
		url: '/ajax/settings/add_dwolla',
		type: 'POST',
		data: { email: _email }
	}).done(function (data)
	{
		window.location.reload();
	});
});

// Delete Dwolla account
$(document).on('click', '.ss-financial-delete-dwolla', function ()
{
	var _id = this.getAttribute('data-ss-dwolla-id');
	$(this).parents('li').remove();

	$.ajax(
	{
		url: '/ajax/settings/delete_dwolla',
		type: 'POST',
		data: { id: _id }
	}).done(function (data)
	{
		window.location.reload();
	});
});

// If they choose a withdrawal method
$(document).on('click', '.ss-modal-withdrawal-method', function ()
{
	var _method_id = this.getAttribute('data-ss-method-id');
	$.ssModal(
	{
		action: 'close'
	});

	$.ajax(
	{
		url: '/ajax/settings/withdrawal',
		type: 'POST',
		data: { amount: parseInt($('.ss-money-withdrawal-input').val(), 10), method_id: _method_id }
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
