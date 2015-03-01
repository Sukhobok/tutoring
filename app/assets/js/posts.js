/**
 * Post Picture Upload
 */
$(document).on('change', '#post_message [name="photos[]"]', function ()
{
	var that = this;
	var preview = $(that).parents('.ss-file-wrapper').siblings('.ss-pictures-preview');
	preview.html('');

	if(that.files)
	{
		for (var i = 0; i < that.files.length; i++)
		{
			var file = that.files[i];
			if (!file.type.match(/image.*/)) continue;

			var reader = new FileReader();
			reader.onload = function (e)
			{
				var uploaded_img = $('<div class="ss-photo" />').html($('<img/>').attr('src', e.target.result));
				preview.append(uploaded_img).show();
			}

			reader.readAsDataURL(file);
		}
	}
});

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

/**
 * Post a comment
 */
function post_comment (pid, comment) {
	show_comment (pid, comment);
	$.ajax({
		url: '/ajax/post/post_comment',
		method: 'POST',
		data: { pid: pid, comment: comment }
	}).done(function (data) {
		//
	});
}

function show_comment (pid, comment) {
	var snippet = $('.snippet-comment').clone().removeClass('snippet-comment');
	snippet.addClass('posted-comment');
	$('.posted-comment-message', snippet).text_multiline(comment);
	$('.posted-comment-time', snippet)[0].setAttribute('data-time', Math.round(new Date() / 1000));
	$('.posted-comments[data-ss-pid="' + pid + '"]').prepend(snippet);
	snippet.removeClass('hide');
	convert_time();
}

$(document).on('click', '.post-comment-button', function () {
	var message = $.trim($(this).parents('.post-comment').children('.post-comment-textarea').val());
	var pid = $(this).data('ss-pid');

	if(message !== '') {
		post_comment(pid, message);
		$(this).parents('.post-comment').children('.post-comment-textarea').val('');
	}
});

$(document).on('keyup', '.post-comment-textarea', function (e) {
	var message = $.trim($(this).val());
	var pid = $(this).data('ss-pid');

	if(e.keyCode === 13
	&& $(this).siblings('.post-comment-bottom').children('.post-comment-pressing-enter').children('.post-comment-pressing-enter-cb').is(':checked')
	&& message !== '') {
		post_comment(pid, message);
		$(this).val('');
	}
});

/**
 * Read More (article)
 */
$('.article-content-text').readmore();

/**
 * Show more comments
 */
$(document).on('click', '.posted-comments .show-more', function () {
	$(this).parents('.posted-comments').children('.posted-comment').css({ 'display': 'block' });
	$(this).remove();
});
