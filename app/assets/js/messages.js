/**
 * Set the height according to the user screen
 */
$(window).resize(function () {
	var new_height = $(window).height() - 200;

	if($('.layout-sidebar-right .ss-container').height() >= new_height) {
		new_height = $('.layout-sidebar-right .ss-container').height();
	}

	$('.message-container-left').height(new_height);
	$('.message-container-main').height(new_height - 100);
});

/**
 * On load
 */
$(window).load(function () {
	$(window).resize();
	$('.message-container-main, .message-container-left').mCustomScrollbar();
	$('.layout-main .message-container-main').mCustomScrollbar('scrollTo', 'bottom');
});

/**
 * Select a new conversation
 */
$('.layout-sidebar.message-page').on('click', '.conversation-item', function () {
	var selected_uid = this.getAttribute('data-uid');
	$('.conversation-item').removeClass('is-selected');
	$(this).addClass('is-selected');
	$('.message-container-main .mCSB_container').html('');
	$('.message-send')[0].setAttribute('data-uid', selected_uid);

	$.ajax({
		url: '/ajax/messages/get_conversation',
		type: 'GET',
		data: { uid: selected_uid }
	}).done(function (data) {
		$.each(data, function (k, v) {
			var snippet_message = $('.snippet-message').clone().removeClass('snippet-message');
			snippet_message.addClass(v.type + '-message');
			$('.message-content p', snippet_message).text_multiline(v.message);
			$('.message-time', snippet_message)[0].setAttribute('data-time', v.created_at);
			$('.message-picture img', snippet_message)[0].setAttribute('src', v.message_picture);
			$('.message-container-main .mCSB_container').append(snippet_message);
			snippet_message.removeClass('hide');
		});

		convert_time();
		$('.layout-main .message-container-main').mCustomScrollbar('update');
		$('.layout-main .message-container-main').mCustomScrollbar('scrollTo', 'bottom');
	});
});

/**
 * Send a message
 */
$('.layout-main.message-page').on('click', '.message-send', function () {
	var message = $('.message-new textarea');
	var uid = $(this)[0].getAttribute('data-uid');
	message.val($.trim(message.val()));

	if(message.val() != '') {
		var snippet_message = $('.snippet-message').clone().removeClass('snippet-message');
		snippet_message.addClass('sent-message');
		$('.message-content p', snippet_message).text_multiline(message.val());
		$('.message-time', snippet_message)[0].setAttribute('data-time', Math.round(new Date()/1000));
		$('.message-container-main .mCSB_container').append(snippet_message);
		snippet_message.removeClass('hide');

		convert_time();
		$('.layout-main .message-container-main').mCustomScrollbar('update');
		$('.layout-main .message-container-main').mCustomScrollbar('scrollTo', 'bottom');

		$.ajax({
			url: '/ajax/messages/send_message',
			type: 'POST',
			data: { message: message.val(), uid: uid }
		}).done(function (data) {
			// Done
		});

		message.val('');
	}
});
