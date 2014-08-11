var tsChatAdd = function (message, index) {
	index = typeof index !== 'undefined' ? index : 0;

	var _div = $('<div class="ts-chat-message ts-chat-message-' + index + '"></div>');
	var _name = $('<span class="ts-chat-message-name"></span>');

	if (index == 1)
		_name.text(partner_name);
	else
		_name.text(current_name);

	var _message = $('<span class="ts-chat-message-content"></span>');
	_message.text(': ' + message);

	_div.append(_name);
	_div.append(_message);

	$('.ts-chat-messages').append(_div);
	$('.ts-chat-messages').animate({
		scrollTop: $('.ts-chat-messages')[0].scrollHeight
	}, 1000);
}
