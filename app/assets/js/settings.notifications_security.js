$(document).on('change', '.page-settings .ss-ns-change', function () {
	var what = this.getAttribute('data-ss-ns-change');
	var value = $(this).val();

	$.ajax({
		url: '/ajax/settings/change_user_data',
		type: 'POST',
		data: { what: what, value: value }
	}).done(function (data) {
		//
	});
});
