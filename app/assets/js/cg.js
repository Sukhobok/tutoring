$(document).on('click', '.join-cg', function ()
{
	var url = this.getAttribute('data-what');
	url = '/ajax/' + url + '/join';
	var id = this.getAttribute('data-id');
	$(this).hide();

	$.ajax(
	{
		url: url,
		type: 'POST',
		data: { id: id }
	}).done(function (data)
	{
		$('h2.count-members').text(parseInt($('h2.count-members').text()) + 1);
	});
});

$(document).on('click', '.ss-cg-invite-friends-start', function ()
{
	$.ssModal({ modalId: 'invite-friends' });
});

$(document).on('click', '.ss-modal-invite-friends-cancel', function ()
{
	$.ssModal({ action: 'close' });
});

$(document).on('click', '.ss-modal-invite-friends-send', function ()
{
	var _to_invite = [];
	var _object = document.getElementById('ss-modal-invite-friends').getAttribute('data-ss-object');
	var _object_id = document.getElementById('ss-modal-invite-friends').getAttribute('data-ss-object-id');
	$('.ss-invite-friends-checkbox-friend:checked').each(function (index)
	{
		_to_invite.push(this.getAttribute('data-ss-fid'));
	});

	$.ajax(
	{
		url: '/ajax/' + _object.toLowerCase() + '/invite',
		type: 'POST',
		data: { object_id: _object_id, user_ids: _to_invite.join(',') }
	}).done(function (data)
	{
		window.location.reload();
	});

	$.ssModal({ action: 'close' });
});

$(document).on('click', '.accept-cg-invitation', function (e)
{
	e.stopPropagation();
	var url = this.getAttribute('data-ss-object').toLowerCase();
	url = '/ajax/' + url + '/join';
	var id = this.getAttribute('data-ss-object-id');

	$.ajax(
	{
		url: url,
		type: 'POST',
		data: { id: id }
	}).done(function (data)
	{
		window.location.reload();
	});
});

$(document).on('click', '.decline-cg-invitation', function (e)
{
	e.stopPropagation();
	$.ajax(
	{
		url: '/ajax/user/decline_invitation',
		type: 'POST',
		data: { id: this.getAttribute('data-ss-id') }
	}).done(function (data)
	{
		window.location.reload();
	});
});
