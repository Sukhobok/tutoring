/**
 * My Profile
 */

$(document).on('click', 'input[data-ss-settings-expand]', function () {
	var to_expand = this.getAttribute('data-ss-settings-expand');
	$('td[data-ss-settings-expand="' + to_expand + '_o"]').hide();
	$('td[data-ss-settings-expand="' + to_expand + '_e"]').show();
});

$(document).on('change', 'input[data-ss-settings-change]', function () {
	var that = this;
	var what = this.getAttribute('data-ss-settings-change');
	var value = $(this).val();

	$.ajax({
		url: '/ajax/settings/change',
		type: 'POST',
		dataType: 'text',
		data: { what: what, value: value },
		success: function (data) {
			$(that).val(data);
		}
	});
});
