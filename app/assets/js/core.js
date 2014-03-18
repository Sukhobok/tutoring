/**
 * Simulate link press
 */
$(document).on('click', '.ss-link', function () {
	window.location.href = this.getAttribute('data-ss-link');
});

/**
 * Extend settings menu
 */
$(document).on('click', '.header-settings-icon', function () {
	$('.header-settings-extended').animate({ height: 'toggle' });
});

/**
 * Send friend request
 */
$(document).on('click', '.add-friend-button', function () {
	var uid = this.getAttribute('data-uid');
	$.ajax({
		url: '/ajax/user/send_friend_request',
		method: 'POST',
		data: { id: uid }
	}).done(function (data) {
		//
	});
});
