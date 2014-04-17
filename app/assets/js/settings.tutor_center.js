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
