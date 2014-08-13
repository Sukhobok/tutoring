$(document).on('click', '.ss-open-chat-button', function ()
{
	if ($('.ss-chat').is(':visible'))
	{
		$.pageslide.close();
	}
	else
	{
		$.pageslide({ direction: 'left', href: '#ss-chat-inner', modal: true });
		$('.ss-chat').mCustomScrollbar();
	}
});

// Cateogry Change
$('.ss-chat').on('click', '.ss-chat-category', function ()
{
	$('.ss-chat-category').removeClass('is-active');
	$(this).addClass('is-active');
	var _new_category = this.getAttribute('data-ss-chat-category');

	$('.ss-chat-category-items:visible').fadeOut(250, function ()
	{
		$('.ss-chat-category-items[data-ss-chat-category="' + _new_category + '"]').fadeIn(250, function ()
		{
			$('.ss-chat').mCustomScrollbar('update');
		});
	});
});

// User click
$('.ss-chat').on('click', '.ss-chat-item', function ()
{
	var selected_uid = this.getAttribute('data-ss-uid');
	$('.ss-chat-main').fadeOut(250);

	$.ajax({
		url: '/ajax/messages/get_conversation',
		type: 'GET',
		data: { uid: selected_uid }
	}).done(function (data) {
		$('.ss-chat .sent-message, .ss-chat .received-message').not('.ss-chat-conversation-write').remove();

		$.each(data, function (k, v) {
			var snippet_message = $('.ss-chat .ss-chat-conversation-write').clone().removeClass('ss-chat-conversation-write');
			snippet_message.removeClass('sent-message');
			snippet_message.addClass(v.type + '-message');
			$('.message-content p', snippet_message).text_multiline(v.message);
			$('.message-time', snippet_message)[0].setAttribute('data-time', v.created_at);
			$('.message-time', snippet_message).show();
			$('.message-picture img', snippet_message)[0].setAttribute('src', v.message_picture);
			$('.ss-chat-conversation-write').before(snippet_message);
		});

		// Get the color
		$('.chat-conversation-container').removeClass('is-green');
		$('.chat-conversation-container').removeClass('is-blue');
		$('.chat-conversation-container').removeClass('is-red');

		if ($('.ss-chat .ss-chat-category.is-active .ss-chat-category-bull').hasClass('is-red'))
			$('.chat-conversation-container').addClass('is-red');
		else if ($('.ss-chat .ss-chat-category.is-active .ss-chat-category-bull').hasClass('is-blue'))
			$('.chat-conversation-container').addClass('is-blue');
		else
			$('.chat-conversation-container').addClass('is-green');

		$('.ss-chat-conversation').fadeIn(250);
		convert_time();
		$('.ss-chat').mCustomScrollbar('update');
		$('.ss-chat').mCustomScrollbar('scrollTo', 'bottom');
	});
}).on('click', '.ss-chat-conversation-back', function ()
{
	$('.ss-chat-conversation').fadeOut(250, function ()
	{
		$('.ss-chat .sent-message textarea').val('');
		$('.ss-chat-main').fadeIn(250, function ()
		{
			$('.ss-chat').mCustomScrollbar('update');
		});
	});
});

// Textarea (send chat message)
$('.ss-chat').on('keyup', '.sent-message textarea', function (e)
{
	while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css('borderTopWidth')) + parseFloat($(this).css('borderBottomWidth')))
	{
		$(this).height($(this).height()+10);
		$('.ss-chat').mCustomScrollbar('update');
	};

	if (e.keyCode === 13 && $.trim($(this).val()) !== '')
	{
		$(this).val('');
		$(this).height(30);
	}
}).on('focus', '.sent-message textarea', function ()
{
	// Bugfix that caused scroll to top
	$('.ss-chat').mCustomScrollbar('scrollTo', this);
});
