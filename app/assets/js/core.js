$(document).on('click', '.ss-link', function () {
	window.location.href = this.getAttribute('data-ss-link');
});

$(document).on('click', '.header-settings-icon', function () {
	$('.header-settings-extended').animate({ height: 'toggle' });
});
