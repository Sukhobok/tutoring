$(document).on('click', '.ss-link', function () {
	window.location.href = this.getAttribute('data-ss-link');
});

$(document).on('click', '.header-settings-icon', function () {
	$('.header-settings-extended').animate({ height: 'toggle' });
});

$(document).on('click', '.page-tab', function () {
	var to_open = '.page-tab-' + this.getAttribute('data-ss-tab');
	$('.page-tab').removeClass('is-active');
	$(this).addClass('is-active');

	$('.page-tab-component').hide();
	$(to_open).show();
});
