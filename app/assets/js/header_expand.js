/**
 * Close any extended
 */
function header_close_extended () {
	$('.header-extended').each(function ()
	{
		if ($(this).css('display') != 'none')
		{
			$(this).animate({ height: 'toggle' });
		}
	});

	if ($('.header-settings-extended').css('display') != 'none')
	{
		$('.header-settings-extended').animate({ height: 'toggle' });
	}

	if ($('.ss-chat').is(':visible'))
	{
		$.pageslide.close();
	}
}

$(document).on('click', function ()
{
	header_close_extended();
});

/**
 * Extend settings menu
 */
$(document).on('click', '.header-settings-icon', function (e)
{
	if ($('.header-settings-extended').css('display') == 'none')
		header_close_extended();
	$('.header-settings-extended').animate({ height: 'toggle' });

	e.stopPropagation();
});

/**
 * Extend friends menu
 */
$(document).on('click', '.header-friend-icon', function (e)
{
	if ($('.header-friend-extended').css('display') == 'none')
		header_close_extended();
	$('.header-friend-extended').animate({ height: 'toggle' });

	e.stopPropagation();
});

/**
 * Extend notifications menu
 */
$(document).on('click', '.header-notif-icon', function (e)
{
	if ($('.header-notif-extended').css('display') == 'none')
		header_close_extended();
	$('.header-notif-extended').animate({ height: 'toggle' });

	e.stopPropagation();
});

/**
 * Friend requests
 */
$(document).on('click', '.accept-friendship-request', function ()
{
	var uid = this.getAttribute('data-uid');
	$(this).parents('.header-extended-item').hide();
	
	$.ajax({
		url: '/ajax/friendship/accept_request',
		method: 'POST',
		data: { id: uid }
	}).done(function (data) {
		//
	});
});

$(document).on('click', '.decline-friendship-request', function ()
{
	var uid = this.getAttribute('data-uid');
	$(this).parents('.header-extended-item').hide();
	
	$.ajax({
		url: '/ajax/friendship/decline_request',
		method: 'POST',
		data: { id: uid }
	}).done(function (data) {
		//
	});
});
