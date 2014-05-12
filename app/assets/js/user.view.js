/**
 * Display friend name on hover
 */
$(document).on('mouseenter', '.friend', function () {
	$('span', this).fadeIn();
	$('.friend-hover', this).fadeIn();
}).on('mouseleave', '.friend', function () {
	$('span', this).fadeOut();
	$('.friend-hover', this).fadeOut();
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

$('#ss-hire-date1').datepicker();
$('#ss-hire-date2').datepicker();
$('#ss-hire-date3').datepicker();

$(document).on('click', '#ss-hire-send', function () {
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
				console.log('1-4 hours');
			} else if (data.error_type === 'description') {
				console.log('provide description');
			} else if (data.error_type === 'time_check') {
				console.log('+ 3 hours');
			} else if (data.error_type === 'time_equal') {
				console.log('different time');
			} else {
				console.log('other');
			}
		} else {
			console.log('everything ok');
		}
	});
});
