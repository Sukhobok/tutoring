$('#right-calendar').datepicker();

$('.ss-search-anything').autocomplete({
	minLength: 1,

	source: function (req, res) {
		$.ajax({
			url: '/ajax/search',
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
		window.location.href = '/' + u.item.type.toLowerCase() + '/' + u.item.id;
	}
}).data('ui-autocomplete')._renderItem = function (ul, item) {
	var to_append = '<a class="ss-search-result">';
	if(item.profile_picture != '') {
		to_append += '<div class="profile-picture ss-search-result-img"><img src="' + item.profile_picture + '" width="50" /></div>';
	}
	to_append += '<div class="ss-search-result-content">' + item.name + '<br /><span style="font-size: 12px;">' + item.data + '</span></div>';
	to_append += '<div class="clear"></div>';
	to_append += '</a>';

	return $('<li>')
	.append(to_append)
	.appendTo(ul);
};
