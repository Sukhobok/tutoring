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
	$('.ss-invite-friends-checkbox-friend:checked').each(function (index)
	{
		_to_invite.push(this.getAttribute('data-ss-fid'));
	});

	window.location.reload();
});
