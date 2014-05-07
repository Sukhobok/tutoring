$(document).on('click', '.ts-coding-sidebar-lang', function () {
	$('.ts-coding-sidebar-lang').removeClass('is-selected');
	$(this).addClass('is-selected');
	tsCodingChangeLang(this.getAttribute('data-ts-coding-lang'));
});

$(document).on('click', '.ts-coding-sidebar-template', function () {
	$('.ts-coding-sidebar-template').removeClass('is-selected');
	$(this).addClass('is-selected');
	tsCodingChangeTemplate(this.getAttribute('data-ts-coding-template'));
});

$(document).on('click', '.ts-coding-sidebar-action', function () {
	tsCodingAction(this.getAttribute('data-ts-coding-action'));
});
