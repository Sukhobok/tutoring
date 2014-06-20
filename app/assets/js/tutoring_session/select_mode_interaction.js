$(document).on('click', '.ts-mode-select', function () {
	var _new = this.getAttribute('data-ts-mode-select');
	tsSelectMode(_new);
	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'mode',
			mode: _new
		}
	);
});
