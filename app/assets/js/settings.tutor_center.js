if($('.ss-complete-subjects').length != 0) {
	$('.ss-complete-subjects').tokenInput('/ajax/settings/subjects', {
		hintText: 'Start typing a subject ...',
		preventDuplicates: true,
		prePopulate: current_user_subjects,

		onAdd: function (item) {
			$.ajax({
				url: '/ajax/settings/add_subject',
				type: 'POST',
				data: { id: item.id }
			}).done(function (data) {
				//
			});
		},
		
		onDelete: function (item) {
			$.ajax({
				url: '/ajax/settings/delete_subject',
				type: 'POST',
				data: { id: item.id }
			}).done(function (data) {
				//
			});
		}
	});
}

/**
 * Request Subject
 */
$(document).on('click', '.ss-request-subject', function ()
{
	$.ajax(
	{
		url: '/ajax/settings/request_subject',
		type: 'POST',
		data: { name: $('.ss-request-subject-name').val() }
	}).done(function (data)
	{
		if (data.error == 0)
		{
			alert('Request Sent! Please allow a few hours for us to review it!');
		}
		else
		{
			alert('There was an error! Please complete the fields!');
		}
	});

	$('.ss-request-subject-name').val('');
});

/**
 * Change user data
 */
$(document).on('change', '[name="tc-available-now"]', function () {
	var value = 0;
	if($(this).is(':checked')) value = 1;

	$.ajax({
		url: '/ajax/settings/change_user_data',
		type: 'POST',
		data: { what: 'available', value: value }
	}).done(function (data) {
		//
	});
});

$(document).on('change', '[name="tc-bio"]', function () {
	$.ajax({
		url: '/ajax/settings/change_user_data',
		type: 'POST',
		data: { what: 'bio', value: this.value }
	}).done(function (data) {
		//
	});
});

$(document).on('change', '[name="tc-hourly-rate"]', function () {
	$('[name="tc-net-rate"]').val(parseInt(this.value) - (parseInt(this.value) / 10) - 1);

	$.ajax({
		url: '/ajax/settings/change_user_data',
		type: 'POST',
		data: { what: 'price', value: this.value }
	}).done(function (data) {
		//
	});
});

/**
 * Incoming Requests
 */
$(document).on('click', '.ss-inc-req-approve', function () {
	var hr_id = this.getAttribute('data-hr-id');
	var choice = $(this).parents('tr').find('input[name="ss-inc-req-date' + hr_id + '"]:checked').val();
	if (choice != '1' && choice != '2' && choice != '3')
		choice = '1';

	$.ajax({
		url: '/ajax/settings/approve_hire_request',
		type: 'POST',
		data: { hr_id: hr_id, choice: choice }
	}).done(function (data) {
		//
	});

	$(this).parents('tr').remove();
});

$(document).on('click', '.ss-inc-req-decline', function () {
	var hr_id = this.getAttribute('data-hr-id');

	$.ajax({
		url: '/ajax/settings/decline_hire_request',
		type: 'POST',
		data: { hr_id: hr_id }
	}).done(function (data) {
		//
	});

	$(this).parents('tr').remove();
});
