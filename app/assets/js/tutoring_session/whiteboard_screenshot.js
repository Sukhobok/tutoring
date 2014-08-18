var _current_canvas = document.getElementById('ts-canvas');

var base64_to_blob = function (dataURI)
{
	var base64Data = dataURI.split(',')[1];
	var contentType = dataURI.split(',')[0].split(':')[1].split(';')[0];

	contentType = contentType || '';
	var sliceSize = 1024;
	var byteCharacters = atob(base64Data);
	var bytesLength = byteCharacters.length;
	var slicesCount = Math.ceil(bytesLength / sliceSize);
	var byteArrays = new Array(slicesCount);

	for (var sliceIndex = 0; sliceIndex < slicesCount; ++sliceIndex) {
		var begin = sliceIndex * sliceSize;
		var end = Math.min(begin + sliceSize, bytesLength);

		var bytes = new Array(end - begin);
		for (var offset = begin, i = 0 ; offset < end; ++i, ++offset) {
			bytes[i] = byteCharacters[offset].charCodeAt(0);
		}
		byteArrays[sliceIndex] = new Uint8Array(bytes);
	}

	return new Blob(byteArrays, { type: contentType });
}

$(document).on('click', '.ts-take-screenshot', function ()
{
	var _url = _current_canvas.toDataURL();
	var _blob = base64_to_blob(_url);

	var xhr = new XMLHttpRequest();
	var form_data = new FormData();
	form_data.append('ts-file', _blob);
	form_data.append('ts-file-type', 'screenshot');
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
