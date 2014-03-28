/**
 * Autocomplete classrooms
 */
$('.classroom-autocomplete').autocomplete({
	minLength: 1,

	source: function (req, res) {
		$.ajax({
			url: '/ajax/classroom/json',
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
		window.location.href = '/classroom/' + u.item.id;
	}
});

for(i = 0; i < $('.classroom-autocomplete').length; i++) {
	$($('.classroom-autocomplete')[i]).data('ui-autocomplete')._renderItem = function (ul, item) {
		return $('<li>')
		.append('<a>' + item.name + '</a>')
		.appendTo(ul);
	};
}

/**
 * Autocomplete groups
 */
$('.group-autocomplete').autocomplete({
	minLength: 1,

	source: function (req, res) {
		$.ajax({
			url: '/ajax/group/json',
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
		window.location.href = '/group/' + u.item.id;
	}
});

for(i = 0; i < $('.group-autocomplete').length; i++) {
	$($('.group-autocomplete')[i]).data('ui-autocomplete')._renderItem = function (ul, item) {
		return $('<li>')
		.append('<a>' + item.name + '</a>')
		.appendTo(ul);
	};
}

/**
 * Create classroom
 */
$('.create-classroom').click(function () {
	window.location.href = '/classroom/create?name=' + encodeURIComponent($('.classroom-autocomplete').val());
});

/**
 * Create group
 */
$('.create-group').click(function () {
	window.location.href = '/group/create?name=' + encodeURIComponent($('.group-autocomplete').val());
});
