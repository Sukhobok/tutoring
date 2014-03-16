$(document).on('change', '[name="user_photos[]"]', function () {
	console.log('aaa');
	var formdata = new FormData();
	for(i = 0; i < this.files.length; i++) {
		formdata.append('user_photos[]', this.files[i]);
	}

	$.ajax({
		url: '/ajax/user/upload_photos',
		type: 'POST',
		data: formdata,
		processData: false,
		contentType: false,
		dataType: 'json'
	}).done(function (data) {
		console.log(data);
	});
});

$(document).on('mouseenter', '.ss-photo', function () {
	$(this).children('.ss-photo-hover').fadeIn();
	$(this).children('.ss-photo-delete').fadeIn();
}).on('mouseleave', '.ss-photo', function () {
	$(this).children('.ss-photo-hover').fadeOut();
	$(this).children('.ss-photo-delete').fadeOut();
});

$(document).on('click', '.ss-photo-delete', function (e) {
	e.stopPropagation();
	var photo_id = this.getAttribute('data-ss-photo-id');
	$.ajax({
		url: '/ajax/user/delete_photo',
		type: 'POST',
		data: { id: photo_id }
	}).done(function (data) {
		console.log(data);
	});
});
