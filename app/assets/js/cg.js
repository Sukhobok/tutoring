$(document).on('click', '.join-cg', function () {
	var url = this.getAttribute('data-what');
	url = '/ajax/' + url + '/join';
	var id = this.getAttribute('data-id');
	$(this).hide();

	$.ajax({
		url: url,
		type: 'POST',
		data: { id: id }
	}).done(function (data) {
		$('h2.count-members').text(parseInt($('h2.count-members').text()) + 1);
	});
});
