var tsSelectMode = function (mode) {
	$('.ts-mode-tools-top').addClass('hide');
	$('.ts-mode-tools-top[data-ts-mode="' + mode + '"]').removeClass('hide');

	$('.ts-mode-select').removeClass('is-selected');
	$('.ts-mode-select[data-ts-mode-select="' + mode + '"]').addClass('is-selected');

	$('.ts-modes').addClass('hide');
	$('.ts-modes[data-ts-mode="' + mode + '"]').removeClass('hide');
};
