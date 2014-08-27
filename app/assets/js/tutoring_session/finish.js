/**
 * Close Session
 */
$(document).on('click', '.ts-close-session', function ()
{
	$(this).css({ visibility: 'hidden' });

	$.ajax(
	{
		url: '/ajax/session/close_session',
		type: 'POST',
		data: { }
	}).done(function (data)
	{
		//
	});
});

/**
 * Stars
 */
$('#ss-modal-ts-finished-stars').on('click', '.ss-modal-ts-finished-star', function ()
{
	var _index = $('.ss-modal-ts-finished-star').index(this);
	$('.ss-modal-ts-finished-star').attr('src', '/images/rating_empty.png');
	$('.ss-modal-ts-finished-star').slice(0, _index + 1).attr('src', '/images/rating_full.png');
	$(this).parent()[0].setAttribute('data-ss-stars-amount', _index + 1);
}).on('mouseenter', '.ss-modal-ts-finished-star', function ()
{
	var _index = $('.ss-modal-ts-finished-star').index(this);
	$('.ss-modal-ts-finished-star').attr('src', '/images/rating_empty.png');
	$('.ss-modal-ts-finished-star').slice(0, _index + 1).attr('src', '/images/rating_full.png');
}).on('mouseleave', '.ss-modal-ts-finished-star', function ()
{
	var _index = parseInt($(this).parent()[0].getAttribute('data-ss-stars-amount'), 10);
	$('.ss-modal-ts-finished-star').attr('src', '/images/rating_empty.png');
	$('.ss-modal-ts-finished-star').slice(0, _index).attr('src', '/images/rating_full.png');
});

/**
 * On Rate
 */
$('#ss-modal-ts-finished').on('click', '.ss-modal-ts-finished-rate-tutor', function ()
{
	$(this).remove();

	$.ajax(
	{
		url: '/ajax/session/leave_feedback',
		type: 'POST',
		data:
		{
			ts_id: global_ts_id,
			stars: $('#ss-modal-ts-finished-stars')[0].getAttribute('data-ss-stars-amount'),
			message: $('#ss-modal-ts-finished-feedback textarea').val()
		}
	}).done(function ()
	{
		window.location.href = '/dashboard';
	});
});

/**
 * On Complaint
 */
$('#ss-modal-ts-finished').on('click', '.ss-modal-ts-finished-complaint-send', function ()
{
	$(this).remove();

	$.ajax(
	{
		url: '/ajax/session/send_complaint',
		type: 'POST',
		data:
		{
			ts_id: global_ts_id
		}
	}).done(function ()
	{
		//
	});
});

/**
 * On Save
 */
$('#ss-modal-ts-finished').on('click', '.ss-modal-ts-finished-save', function ()
{
	$(this).remove();

	$.ajax(
	{
		url: '/ajax/session/save',
		type: 'POST',
		data:
		{
			ts_id: global_ts_id
		}
	}).done(function ()
	{
		//
	});
});
