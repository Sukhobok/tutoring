/**
 * Growl
 */
socket.on('new_message', function (data)
{
	new_ss_notification();

	if ($.inArray(parseInt(data.from_id), chat_opened) == -1)
	{
		$.growl({
			title: "New message!",
			message: '<span class="bold">' + data.from_name + '</span> sent you a message!',
			from_id: data.from_id,
			from_name: data.from_name
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

/**
 * Cateogry Change
 */
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

/**
 * User click
 */
$('.ss-chat').on('click', '.ss-chat-item', function ()
{
	open_new_chat_window(parseInt(this.getAttribute('data-ss-uid')), this.getAttribute('data-ss-name'));
});

$(document).on('click', '.ss-chat-open-user-conversation', function (e)
{
	e.stopPropagation();
	open_new_chat_window(parseInt(this.getAttribute('data-ss-uid')), this.getAttribute('data-ss-name'));
});

/**
 * Open New Chat Window
 */
var chat_opened = [];
var open_new_chat_window = function (uid, name)
{
	var exists = chat_opened.indexOf(uid);

	if (exists == -1)
	{
		chat_opened.push(uid);

		var $newchat = $('.layout-chat-right-window-model').clone();
		$newchat.removeClass('layout-chat-right-window-model');
		$newchat.children('h1').text(name);
		$newchat.children('.layout-chat-right-window-content').html('');
		$newchat.css({ right: chat_opened.length*260 + 80 });
		$('.layout-chat-right').after($newchat);

		$newchat[0].setAttribute('data-uid', uid);

		$.ajax({
			url: '/ajax/messages/get_conversation',
			type: 'GET',
			data: { uid: uid }
		}).done(function (data)
		{
			$.each(data, function (k, v) {
				add_ss_chat_message(uid, v.type, v.message, v.created_at, v.message_picture);
			});

			convert_time();
			var $container = $('.layout-chat-right-window[data-uid=' + uid + ']').children('.layout-chat-right-window-content');
			$container.scrollTop($container[0].scrollHeight);
		});
	}
}

/**
 * Add a new message to a chat window
 */
var add_ss_chat_message = function (_uid, _type, _message, _time, _picture)
{
	switch (_type)
	{
		case 'sent':
			var $right_message = $('.layout-chat-right-window-model .right_message').clone();
			$right_message.children('.message').children('p').text(_message);
			$right_message.children('.message_time').children('.time-ago')[0].setAttribute('data-time', _time);
			$('.layout-chat-right-window[data-uid="' + _uid + '"]').children('.layout-chat-right-window-content').append($right_message).append('<div class="clear"></div>');
			break;

		default:
			var $left_message = $('.layout-chat-right-window-model .left_message').clone();
			$left_message.children('.message').children('p').text(_message);
			$left_message.children('.message_time').children('.time-ago')[0].setAttribute('data-time', _time);
			$('.layout-chat-right-window[data-uid="' + _uid + '"]').children('.layout-chat-right-window-content').append($left_message).append('<div class="clear"></div>');

			if (_picture !== false)
			{
				$('.message-picture img', $left_message)[0].setAttribute('src', _picture);
			}
			break;
	}
};

/**
 * Close Chat Window
 */
$(document).on('click', '.close-chat-window', function ()
{
	var $chat_window = $(this).parents('.layout-chat-right-window');
	var uid = parseInt($chat_window[0].getAttribute('data-uid'));
	var key = $.inArray(uid, chat_opened);
	
	chat_opened.splice(key, 1);
	$chat_window.animate({ height: 'toggle' }, { duration: 500, complete: function()
	{
		$chat_window.remove();
	}});

	for (var i = key; i < chat_opened.length; i++)
	{
		$('.layout-chat-right-window[data-uid=' + chat_opened[i] + ']').animate({ right: '-=260' }, 500);
	}
});

/**
 * Hire
 */
$(document).on('click', '.chat-window-hire', function ()
{
	var $chat_window = $(this).parents('.layout-chat-right-window');
	var uid = $chat_window[0].getAttribute('data-uid');
	window.location.href = '/user/' + uid + '?hire=true';
});

/**
 * Minimize
 */
$(document).on('click', '.layout-chat-right-window h1, .minimize-chat-window', function()
{
	var $chat_window = $(this).parents('.layout-chat-right-window');

	if($chat_window.children('.layout-chat-right-window-content').is(':visible'))
	{
		$chat_window.children('.layout-chat-right-window-content').hide();
		$chat_window.children('.layout-chat-right-window-input').hide();
	}
	else
	{
		$chat_window.children('.layout-chat-right-window-content').show();
		$chat_window.children('.layout-chat-right-window-input').show();
	}
});

/**
 * Send message
 */
$(document).on('keydown', '.layout-chat-right-window-input textarea', function (e)
{
	var uid = $(this).parents('.layout-chat-right-window').data('uid');
	
	if(e.which == 13)
	{
		if($.trim($(this).val()) != '')
		{
			add_ss_chat_message(uid, 'sent', $.trim($(this).val()), Math.round(Date.now()/1000), false);
			convert_time();

			$.ajax({
				url: '/ajax/messages/send_message',
				type: 'POST',
				data: { message: $.trim($(this).val()), uid: uid }
			}).done(function (data) {
				// Done
			});
		}

		var $container = $(this).parent('.layout-chat-right-window-input').siblings('.layout-chat-right-window-content');
		$container.scrollTop($container[0].scrollHeight);
		$(this).val('');
		e.preventDefault();
	}
});

/**
 * On receive message
 */
socket.on('new_message', function (data)
{
	if ($.inArray(parseInt(data.from_id), chat_opened) >= 0)
	{
		add_ss_chat_message(data.from_id, 'received', data.message, Math.round(new Date()/1000), data.profile_picture);
		
		var $container = $('.layout-chat-right-window[data-uid="' + data.from_id + '"] .layout-chat-right-window-content');
		$container.scrollTop($container[0].scrollHeight);
		convert_time();
	}
});
