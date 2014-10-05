socket.on('new_message', function (data)
{
	new_ss_notification();

	if (!$('.ss-chat').is(':visible'))
	{
		$.growl({
			title: "New message!",
			message: '<span class="bold">' + data.from_name + '</span> sent you a message!',
			from_id: data.from_id
		});
	}
});

/**
 * Chat Open/Close
 */
$(document).on('click', '.header-chat-icon', function ()
{
	if ($('.ss-chat').is(':visible'))
	{
		$.pageslide.close();
	}
	else
	{
		$('.header-icon-count', this).text('0');
		$('.header-icon-count', this).addClass('hide');
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

var add_ss_chat_message = function (_type, _message, _time, _picture)
{
	var snippet_message = $('.ss-chat .ss-chat-conversation-write').clone().removeClass('ss-chat-conversation-write');
	snippet_message.removeClass('sent-message');
	snippet_message.addClass(_type + '-message');
	$('.message-content p', snippet_message).text_multiline(_message);
	$('.message-time', snippet_message)[0].setAttribute('data-time', _time);
	$('.message-time', snippet_message).show();
	if (_picture !== false)
	{
		$('.message-picture img', snippet_message)[0].setAttribute('src', _picture);
	}
	$('.ss-chat-conversation-write').before(snippet_message);
}

// User click
$('.ss-chat').on('click', '.ss-chat-item', function ()
{
	var selected_uid = this.getAttribute('data-ss-uid');
	$('.ss-chat-main').fadeOut(250);
	$('.ss-chat-conversation')[0].setAttribute('data-ss-uid', selected_uid);

	$.ajax({
		url: '/ajax/messages/get_conversation',
		type: 'GET',
		data: { uid: selected_uid }
	}).done(function (data) {
		$('.ss-chat .sent-message, .ss-chat .received-message').not('.ss-chat-conversation-write').remove();

		$.each(data, function (k, v) {
			add_ss_chat_message(v.type, v.message, v.created_at, v.message_picture);
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

		$('.ss-chat-conversation').fadeIn(250, function ()
		{
			$('.ss-chat').mCustomScrollbar('update');
			$('.ss-chat').mCustomScrollbar('scrollTo', 'bottom');
		});
		convert_time();
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
		var _uid = $('.ss-chat-conversation')[0].getAttribute('data-ss-uid');
		add_ss_chat_message('sent', $.trim($(this).val()), Math.round(new Date()/1000), false);
		$('.ss-chat').mCustomScrollbar('update');
		$('.ss-chat').mCustomScrollbar('scrollTo', 'bottom');
		convert_time();
		
		$.ajax({
			url: '/ajax/messages/send_message',
			type: 'POST',
			data: { message: $.trim($(this).val()), uid: _uid }
		}).done(function (data) {
			// Done
		});

		$(this).val('');
		$(this).height(30);
	}
}).on('focus', '.sent-message textarea', function ()
{
	// Bugfix that caused scroll to top
	$('.ss-chat').mCustomScrollbar('scrollTo', this);
});

// On receive
socket.on('new_message', function (data)
{
	if (data.from_id == $('.ss-chat-conversation')[0].getAttribute('data-ss-uid'))
	{
		add_ss_chat_message('received', data.message, Math.round(new Date()/1000), data.profile_picture);
		$('.ss-chat').mCustomScrollbar('update');
		$('.ss-chat').mCustomScrollbar('scrollTo', 'bottom');
		convert_time();
	}
});

/**
 * Open user conversation
 */
var ss_chat_open_user_conversation = function (uid)
{
	if (!$('.ss-chat').is(':visible'))
	{
		// Open the chat first
		$.pageslide({ direction: 'left', href: '#ss-chat-inner', modal: true });
	}

	$('.ss-chat-main').fadeOut(250);
	$('.ss-chat-conversation')[0].setAttribute('data-ss-uid', uid);

	$.ajax({
		url: '/ajax/messages/get_conversation',
		type: 'GET',
		data: { uid: uid }
	}).done(function (data) {
		$('.ss-chat .sent-message, .ss-chat .received-message').not('.ss-chat-conversation-write').remove();

		$.each(data, function (k, v) {
			add_ss_chat_message(v.type, v.message, v.created_at, v.message_picture);
		});

		// Color - Red
		$('.chat-conversation-container').removeClass('is-green');
		$('.chat-conversation-container').removeClass('is-blue');
		$('.chat-conversation-container').removeClass('is-red');
		$('.chat-conversation-container').addClass('is-red');

		$('.ss-chat-conversation').fadeIn(250, function ()
		{
			if (!$('.ss-chat').find('.mCSB_container').length)
			{
				$('.ss-chat').mCustomScrollbar();
			}
			else
			{
				$('.ss-chat').mCustomScrollbar('update');
			}
			
			$('.ss-chat').mCustomScrollbar('scrollTo', 'bottom');
		});
		convert_time();
	});
}

$(document).on('click', '.ss-chat-open-user-conversation', function (e)
{
	e.stopPropagation();
	ss_chat_open_user_conversation(this.getAttribute('data-ss-uid'));
});
