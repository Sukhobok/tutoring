var tsNewFile = function (data)
{
	var file = $('.snippet-ts-file-manager-file').clone().removeClass('snippet-ts-file-manager-file');
	if (data.filename.length > 12)
	{
		var _filename = data.filename.substr(0, 12) + '...';
	}
	else
	{
		var _filename = data.filename;
	}

	$('.ts-file-manager-file-actions', file)[0].setAttribute('data-ss-file', data.filename);
	$('.ts-file-manager-file-caption', file).text(_filename);
	$('.ts-file-manager-file-caption', file).attr('title', data.filename);
	$('.ts-file-manager-file-icon', file).attr('src', data.icon);
	$('.ts-file-manager-file-icon', file).attr('alt', data.filename);
	$('.ts-file-manager-files').append(file);
	file.removeClass('hide');

	$('.ts-file-manager-count').text(parseInt($('.ts-file-manager-count').text(), 10) + 1);
}

var tsDownloadFile = function (file)
{
	window.open('/ajax/session/download_file?file=' + file);
}

var tsRemoveFile = function (file)
{
	if ($('.ts-file-manager-file-actions[data-ss-file="' + file + '"]'))
	{
		$('.ts-file-manager-file-actions[data-ss-file="' + file + '"]').parents('.ts-file-manager-file').remove();
		$('.ts-file-manager-count').text(parseInt($('.ts-file-manager-count').text(), 10) - 1);
	}
}
