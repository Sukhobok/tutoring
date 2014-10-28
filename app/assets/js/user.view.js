/**
 * Disable buttons for hire
 */
$('#ss-hire-desc textarea').on('keyup', function ()
{
	if($.trim($('#ss-hire-desc textarea').val()) !== '')
	{
		$('#ss-hire-send').removeClass('disabled');
		$('#ss-hire-now').removeClass('disabled');
	}
	else
	{
		$('#ss-hire-send').addClass('disabled');
		$('#ss-hire-now').addClass('disabled');
	}
});

/**
 * Display friend name on hover
 */
$(document).on('mouseenter', '.friend', function () {
	$('.friend-hover-content', this).fadeIn();
	$('.friend-hover', this).fadeIn();
}).on('mouseleave', '.friend', function () {
	$('.friend-hover-content', this).fadeOut();
	$('.friend-hover', this).fadeOut();
});

/**
 * Remove friend
 */
$(document).on('click', '.ss-friend-remove', function (e)
{
	e.stopPropagation();
	$(this).parents('.friend').remove();
	var _id = this.getAttribute('data-ss-uid');

	$.ajax(
	{
		url: '/ajax/friendship/remove',
		type: 'POST',
		data: { id: _id }
	}).done(function ()
	{
		//
	});
});

/**
 * Send friend request
 */
$(document).on('click', '.add-friend-button', function () {
	var uid = this.getAttribute('data-uid');
	$(this).hide();
	
	$.ajax({
		url: '/ajax/friendship/send_request',
		type: 'POST',
		data: { id: uid }
	}).done(function (data) {
		//
	});
});

/**
 * Modal: hire
 */
$(document).on('click', '.hire-user-button', function () {
	$.ssModal({
		modalId: 'hire'
	});
});

if (window.location.search.substring(1, 5) === 'hire')
{
	$.ssModal({
		modalId: 'hire'
	});
}

$('#ss-hire-date1').datepicker();
$('#ss-hire-date2').datepicker();
$('#ss-hire-date3').datepicker();

$(document).on('click', '#ss-hire-send', function () {
	if($(this).hasClass('disabled')) return false;

	// Close hire form
	$.ssModal({
		action: 'close'
	});

	// Get dates
	var date1 = $("#ss-hire-date1").datepicker("getDate");
	date1.setHours(parseInt($('select[name="ap1"]').val()*12) + parseInt($('select[name="hour1"]').val()));
	date1.setMinutes($('select[name="minute1"]').val());

	var date2 = $("#ss-hire-date2").datepicker("getDate");
	date2.setHours(parseInt($('select[name="ap2"]').val()*12) + parseInt($('select[name="hour2"]').val()));
	date2.setMinutes($('select[name="minute2"]').val());

	var date3 = $("#ss-hire-date3").datepicker("getDate");
	date3.setHours(parseInt($('select[name="ap3"]').val()*12) + parseInt($('select[name="hour3"]').val()));
	date3.setMinutes($('select[name="minute3"]').val());

	// Send request
	$.ajax({
		url: '/ajax/user/hire',
		type: 'POST',
		data: {
			hours: $('#ss-hire-hours').val(),
			tutor_id: user_view_id,
			description: $('#ss-hire-desc textarea').val(),

			time1_y: date1.getUTCFullYear(),
			time1_m: date1.getUTCMonth() + 1,
			time1_d: date1.getUTCDate(),
			time1_h: date1.getUTCHours(),
			time1_min: date1.getUTCMinutes(),

			time2_y: date2.getUTCFullYear(),
			time2_m: date2.getUTCMonth() + 1,
			time2_d: date2.getUTCDate(),
			time2_h: date2.getUTCHours(),
			time2_min: date2.getUTCMinutes(),

			time3_y: date3.getUTCFullYear(),
			time3_m: date3.getUTCMonth() + 1,
			time3_d: date3.getUTCDate(),
			time3_h: date3.getUTCHours(),
			time3_min: date3.getUTCMinutes()
		}
	}).done(function (data) {
		if(data.error === 1) {
			if (data.error_type === 'hours') {
				$.ssModal({ modalId: 'hire-hours-limit' });
			} else if (data.error_type === 'description') {
				$.ssModal({ modalId: 'hire-description' });
			} else if (data.error_type === 'time_check') {
				$.ssModal({ modalId: 'hire-3-hours' });
			} else if (data.error_type === 'time_equal') {
				$.ssModal({ modalId: 'hire-time-equal' });
			} else if (data.error_type === 'money') {
				$.ssModal({ modalId: 'hire-money' });
			} else {
				$.ssModal({ modalId: 'hire-other' });
			}
		} else {
			// Everything OK
		}
	});
});
