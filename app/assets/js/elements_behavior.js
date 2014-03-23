/**
 * StudySquare Tabs (eg. user page, dashboard)
 */
$(document).on('click', '.page-tab', function () {
	var to_open = '.page-tab-' + this.getAttribute('data-ss-tab');
	$('.page-tab').removeClass('is-active');
	$(this).addClass('is-active');

	$('.page-tab-component').hide();
	$(to_open).show();
});

/**
 * StudySquare Photo (eg. user photos, profile photos)
 */
$(document).on('click', '.ss-photo', function () {
	console.log('--Expand photo');
});

/**
 * StudySquare Upload photo with preview and crop 
 */
$(document).on('change', '.ss-picture-upload', function () {
	var that = this;
	if(that.files && that.files[0]) {
		var file = that.files[0];
		if (!file.type.match(/image.*/)) return false;

		var reader = new FileReader();
		reader.onload = function (e) {
			var preview = $(that).parents('.ss-file-wrapper').siblings('.ss-picture-preview');
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
