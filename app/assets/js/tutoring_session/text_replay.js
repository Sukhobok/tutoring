var tsTextReceive;

tsInitText(function (editor) {
	tsTextReceive = function (text) {
		editor.setContent(text);
	}
});
