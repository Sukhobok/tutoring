/**
 * My Profile
 */

$(document).on('change', '.page-settings .ss-picture-upload', function () {
	if(this.files && this.files[0]) {
		var file = this.files[0];
		if (!file.type.match(/image.*/)) return false;

		var reader = new FileReader();
		reader.onload = function (e) {
			var preview = $('.page-settings #ss-picture-preview');
			var uploaded_img = $('<img/>').attr('src', e.target.result);
			
			preview.html(uploaded_img).show();
			uploaded_img.Jcrop({
				aspectRatio: 1,
				minSize: [50, 50],
				setSelect: [100, 100, 50, 50],
				onSelect: function(c) {
					$('input[name="profile_x"]').val(c.x);
					$('input[name="profile_y"]').val(c.y);
					$('input[name="profile_w"]').val(c.w);
					$('input[name="profile_h"]').val(c.h);
				}
			});
		}
		reader.readAsDataURL(file);
	}
});

$(document).on('click', '.page-settings .ss-delete', function () {
	$(this).parents('tr').remove();
});

$(document).on('click', '.page-settings .ss-add-education', function () {
	var snippet = $('.hide.snippet-add-education').clone().removeClass('hide');
	var new_row = $('<tr></tr>').append($('<td></td>').append(snippet));
	$('.ss-table-education').prepend(new_row);
});
