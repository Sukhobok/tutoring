/**
 * StudySquare Tabs (eg. user page, dashboard)
 */
$(document).on('click', '.page-tab', function () {
	var to_open = '.page-tab-' + this.getAttribute('data-ss-tab');
	$('.page-tab').removeClass('is-active');
	$(this).addClass('is-active');

	$('.page-tab-component').hide();
	$(to_open).show();
});

/**
 * StudySquare Photo (eg. user photos, profile photos)
 */
$(document).on('click', '.ss-photo', function () {
	console.log('--Expand photo');
});
