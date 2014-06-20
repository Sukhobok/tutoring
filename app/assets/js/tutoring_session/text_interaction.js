var tsTextSend = function (text) {
	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'text',
			value: text
		}
	);
};

var tsTextReceive;

tsInitText(function (editor) {
	editor.addMenuItem('save_file', {
		text: 'Save file',
		onclick: function() {
			editor.insertContent('Some content');
		}
	});

	editor.on('keyup', function (e) {
		tsTextSend(editor.getContent());
	});

	editor.on('change', function (e) {
		tsTextSend(editor.getContent());
	});

	tsTextReceive = function (text) {
		editor.setContent(text);
	}
});
