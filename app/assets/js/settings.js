/**
 * My Profile
 */
$(document).on('click', '.page-settings .ss-delete', function () {
	$(this).parents('tr').remove();
});

$(document).on('click', '.page-settings .ss-add-education', function () {
	var snippet = $('.hide.snippet-add-education').clone().removeClass('hide');
	var new_row = $('<tr></tr>').append($('<td></td>').append(snippet));
	$('.ss-table-education').prepend(new_row);
});
