var tsCodingEditor = ace.edit('ts-coding-editor');
tsCodingEditor.setTheme('ace/theme/monokai');
tsCodingEditor.getSession().setMode('ace/mode/text');
var undoManager = tsCodingEditor.getSession().getUndoManager();

var tsCodingChangeLang = function (lang) {
	tsCodingEditor.getSession().setMode('ace/mode/' + lang);
	$('.ts-coding-sidebar-lang').removeClass('is-selected');
	$('[data-ts-coding-lang="' + lang + '"]').addClass('is-selected');
};

var tsCodingChangeTemplate = function (template) {
	tsCodingEditor.setTheme('ace/theme/' + template);
	$('.ts-coding-sidebar-template').removeClass('is-selected');
	$('[data-ts-coding-template="' + template + '"]').addClass('is-selected');
};

var tsCodingAction = function (action) {
	switch (action) {
		case 'undo':
			undoManager.undo();
			break;

		case 'redo':
			undoManager.redo();
			break;

		case 'save':
			// Save file
			break;
	}
};
