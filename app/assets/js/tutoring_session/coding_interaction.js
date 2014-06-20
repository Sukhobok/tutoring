$(document).on('click', '.ts-coding-sidebar-lang', function () {
	tsCodingChangeLang(this.getAttribute('data-ts-coding-lang'));

	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'coding',
			action: 'change_language',
			value: this.getAttribute('data-ts-coding-lang')
		}
	);
});

$(document).on('click', '.ts-coding-sidebar-template', function () {
	tsCodingChangeTemplate(this.getAttribute('data-ts-coding-template'));

	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'coding',
			action: 'change_template',
			value: this.getAttribute('data-ts-coding-template')
		}
	);
});

$(document).on('click', '.ts-coding-sidebar-action', function () {
	tsCodingAction(this.getAttribute('data-ts-coding-action'));

	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'coding',
			action: 'action',
			value: this.getAttribute('data-ts-coding-action')
		}
	);
});

$('#ts-coding-editor').on('keyup click', function (e) {
	var data = {};
	data.cursor_at = tsCodingEditor.selection.getCursor();
	data.code_data = tsCodingEditor.getValue();

	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'coding',
			action: 'data',
			value: data
		}
	);
});
