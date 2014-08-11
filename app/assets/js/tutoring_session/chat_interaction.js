$(document).on('keyup', '.ts-chat-textarea', function (e) {
	if(e.keyCode === 13
	&& $('#ts-chat-pressing-enter-cb').is(':checked')
	&& $.trim($('.ts-chat-textarea').val()) !== '') {
		tsChatAdd($.trim($('.ts-chat-textarea').val()));
		ts_socket.emit(
			'tutoring_session_data',
			{
				what: 'chat',
				message: $.trim($('.ts-chat-textarea').val())
			}
		);
		$('.ts-chat-textarea').val('');
	}
});

$(document).on('click', '.ts-chat-send', function () {
	if($.trim($('.ts-chat-textarea').val()) !== '') {
		tsChatAdd($.trim($('.ts-chat-textarea').val()));
		ts_socket.emit(
			'tutoring_session_data',
			{
				what: 'chat',
				message: $.trim($('.ts-chat-textarea').val())
			}
		);
		$('.ts-chat-textarea').val('');
	}
});
