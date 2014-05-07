var tsCodingEditor = ace.edit('ts-coding-editor');
tsCodingEditor.setTheme('ace/theme/monokai');
tsCodingEditor.getSession().setMode('ace/mode/text');
var undoManager = tsCodingEditor.getSession().getUndoManager();

var tsCodingChangeLang = function (lang) {
	tsCodingEditor.getSession().setMode('ace/mode/' + lang);
};

var tsCodingChangeTemplate = function (template) {
	tsCodingEditor.setTheme('ace/theme/' + template);
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
