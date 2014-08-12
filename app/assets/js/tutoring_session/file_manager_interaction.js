$(document).on('mouseenter', '.ts-file-manager-file', function () {
	$('.ts-file-manager-file-actions', this).fadeIn();
}).on('mouseleave', '.ts-file-manager-file', function () {
	$('.ts-file-manager-file-actions', this).fadeOut();
});

$(document).on('click', '.ts-file-manager-file-action', function ()
{
	var action = this.getAttribute('data-ss-action');
	var file = $(this).parent().data('ss-file');

	if (action == 'download')
	{
		tsDownloadFile(file);
	}
	else if (action == 'remove')
	{
		$.ajax(
		{
			url: '/ajax/session/remove_file',
			type: 'POST',
			data: { file: file }
		}).done(function (data)
		{
			//
		});
	}
});

$(document).on('change', 'input[name="ts-file-upload"]', function ()
{
	var xhr = new XMLHttpRequest();
	var form_data = new FormData();
	form_data.append('ts-file', this.files[0]);
	xhr.open('POST', '/ajax/session/receive_file', true);
	xhr.send(form_data);

	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var _response = JSON.parse(xhr.responseText);
			if (_response.error == 0)
			{
				// No errors
			}
			else
			{
				// We have an error
			}
		}
	};
});
