/**
 * Display friend name on hover
 */
$(document).on('mouseenter', '.friend', function () {
	$('span', this).fadeIn();
	$('.friend-hover', this).fadeIn();
}).on('mouseleave', '.friend', function () {
	$('span', this).fadeOut();
	$('.friend-hover', this).fadeOut();
});

/**
 * Send friend request
 */
$(document).on('click', '.add-friend-button', function () {
	var uid = this.getAttribute('data-uid');
	$(this).hide();
	
	$.ajax({
		url: '/ajax/friendship/send_request',
		method: 'POST',
		data: { id: uid }
	}).done(function (data) {
		//
	});
});
