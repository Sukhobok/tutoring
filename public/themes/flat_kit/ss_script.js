$(document).on('click', '.ss-vr-approve', function ()
{
	var _uid = $(this).data('ss-uid');
	var _w9 = $('input[name="req_w9_' + _uid + '"]').is(':checked') ? 'yes' : 'no';
	var that = this;

	$(that).parents('tr').remove();

	$.ajax(
	{
		url: '/admin/ajax/verification/approve',
		type: 'POST',
		data: { uid: _uid, w9: _w9 }
	}).done(function (data)
	{
		//
	});
});

$(document).on('click', '.ss-vr-decline', function ()
{
	var _uid = $(this).data('ss-uid');
	var that = this;

	$(that).parents('tr').remove();

	$.ajax(
	{
		url: '/admin/ajax/verification/decline',
		type: 'POST',
		data: { uid: _uid }
	}).done(function (data)
	{
		//
	});
});
