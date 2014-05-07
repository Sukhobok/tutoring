var tsTextSend = function (text) {
	// Send text
};

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

	// On receive text:
	// editor.setContent(text);
});
