/**
 * Thumb up post
 */
$(document).on('click', '.thumb-up', function () {
	var thumbs_up_count = $(this).children('.thumb-up-count');
	var thumbs_down_count = $(this).siblings('.thumb-down').children('.thumb-down-count');
	var pid = this.getAttribute('data-pid');

	$.ajax({
		url: '/ajax/post/save_thumb',
		method: 'POST',
		data: { type: 'up', id: pid }
	}).done(function (data) {
		if(data.result == 0) {
			thumbs_down_count.text(parseInt(thumbs_down_count.text()) - 1);
			thumbs_up_count.text(parseInt(thumbs_up_count.text()) + 1);
		} else if(data.result == 1) {
			thumbs_up_count.text(parseInt(thumbs_up_count.text()) + 1);
		}
	})
});

/**
 * Thumb down post
 */
$(document).on('click', '.thumb-down', function () {
	var thumbs_down_count = $(this).children('.thumb-down-count');
	var thumbs_up_count = $(this).siblings('.thumb-up').children('.thumb-up-count');
	var pid = this.getAttribute('data-pid');

	$.ajax({
		url: '/ajax/post/save_thumb',
		method: 'POST',
		data: { type: 'down', id: pid }
	}).done(function (data) {
		if(data.result == 0) {
			thumbs_down_count.text(parseInt(thumbs_down_count.text()) + 1);
			thumbs_up_count.text(parseInt(thumbs_up_count.text()) - 1);
		} else if(data.result == 1) {
			thumbs_down_count.text(parseInt(thumbs_down_count.text()) + 1);
		}
	})
});
