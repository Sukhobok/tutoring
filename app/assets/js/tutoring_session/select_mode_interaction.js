$(document).on('click', '.ts-mode-select', function () {
	var _new = this.getAttribute('data-ts-mode-select');
	tsSelectMode(_new);
});
