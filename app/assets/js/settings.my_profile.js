$('.page-settings').on('click', '.ss-delete', function () {
	var id = this.getAttribute('data-ss-id');
	$.ajax({
		url: '/ajax/settings/delete_education',
		type: 'POST',
		data: { id: id }
	}).done(function (data) {
		//
	});

	$(this).parents('tr').remove();
});

$('.page-settings').on('click', '.ss-add-education', function () {
	var snippet = $('.hide.snippet-add-education').clone().removeClass('hide');
	var new_row = $('<tr></tr>').append($('<td></td>').append(snippet));
	$('.ss-table-education').prepend(new_row);
	update_autocomplete_my_profile();
});

$('.page-settings').on('change', 'select[name="type[]"]', function () {
	var education_name = $(this).siblings('input[name="name[]"]');
	education_name.val('');
	education_name.removeClass('university-autocomplete');
	education_name.removeClass('highschool-autocomplete');
	if(this.value == 'highschool') education_name.addClass('highschool-autocomplete');
	else education_name.addClass('university-autocomplete');

	$(this).siblings('input[name="education_id[]"]').val('0');
	update_autocomplete_my_profile();
});

function update_autocomplete_my_profile () {
	/**
	 * Autocomplete highschools
	 */
	$('.highschool-autocomplete').autocomplete({
		minLength: 1,

		source: function (req, res) {
			$.ajax({
				url: '/ajax/highschool/json',
				data: { search: req.term },
				dataType: 'json',
				type: 'GET',
				success: function (data) {
					res(data);
				}
			});
		},

		select: function (e, u) {
			e.preventDefault();
			$(this).val(u.item.name);
			$(this).siblings('input[name="education_id[]"]').val(u.item.id);
		}
	});

	for(i = 0; i < $('.highschool-autocomplete').length; i++) {
		$($('.highschool-autocomplete')[i]).data('ui-autocomplete')._renderItem = function (ul, item) {
			return $('<li>')
			.append('<a>' + item.name + '<br /><span style="font-size: 12px;">' + item.address + '</span></a>')
			.appendTo(ul);
		};
	}

	/**
	 * Autocomplete universities
	 */
	$('.university-autocomplete').autocomplete({
		minLength: 1,

		source: function (req, res) {
			$.ajax({
				url: '/ajax/university/json',
				data: { search: req.term },
				dataType: 'json',
				type: 'GET',
				success: function (data) {
					res(data);
				}
			});
		},

		select: function (e, u) {
			e.preventDefault();
			$(this).val(u.item.name);
			$(this).siblings('input[name="education_id[]"]').val(u.item.id);
		}
	});

	for(i = 0; i < $('.university-autocomplete').length; i++) {
		$($('.university-autocomplete')[i]).data('ui-autocomplete')._renderItem = function (ul, item) {
			return $('<li>')
			.append('<a>' + item.name + '<br /><span style="font-size: 12px;">' + item.address + '</span></a>')
			.appendTo(ul);
		};
	}
}
