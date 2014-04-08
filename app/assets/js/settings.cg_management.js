$('.page-settings').on('click', '.cg-leave-button', function () {
	var id = this.getAttribute('data-cg-id');
	var type = this.getAttribute('data-cg-type');
	var url = '/ajax/' + type + '/quit';

	$.ajax({
		url: url,
		type: 'POST',
		data: { id: id }
	}).done(function (data) {
		window.location.reload();
	});
});

$('.page-settings').on('click', '.cg-join-button', function () {
	var id = this.getAttribute('data-cg-id');
	var type = this.getAttribute('data-cg-type');
	var url = '/ajax/' + type + '/join';

	$.ajax({
		url: url,
		type: 'POST',
		data: { id: id }
	}).done(function (data) {
		window.location.reload();
	});
});
