/**
 * Friend requests
 */
$(document).on('click', '.accept-friendship-request', function () {
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

$(document).on('click', '.decline-friendship-request', function () {
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

function header_close_extended () {
	$('.header-extended').each(function () {
		if($(this).css('display') != 'none') {
			$(this).animate({ height: 'toggle' });
		}
	});

	if($('.header-settings-extended').css('display') != 'none') {
		$('.header-settings-extended').animate({ height: 'toggle' });
	}
}

/**
 * Extend settings menu
 */
$(document).on('click', '.header-settings-icon', function () {
	if($('.header-settings-extended').css('display') == 'none')
		header_close_extended();
	$('.header-settings-extended').animate({ height: 'toggle' });
});

/**
 * Extend friends menu
 */
$(document).on('click', '.header-friend-icon', function () {
	if($('.header-friend-extended').css('display') == 'none')
		header_close_extended();
	$('.header-friend-extended').animate({ height: 'toggle' });
});

/**
 * Extend notifications menu
 */
$(document).on('click', '.header-notif-icon', function () {
	if($('.header-notif-extended').css('display') == 'none')
		header_close_extended();
	$('.header-notif-extended').animate({ height: 'toggle' });
});

/**
 * Extend chat menu
 */
$(document).on('click', '.header-chat-icon', function () {
	if($('.header-chat-extended').css('display') == 'none')
		header_close_extended();
	$('.header-chat-extended').animate({ height: 'toggle' });
});
