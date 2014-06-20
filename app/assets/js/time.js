function dateToString(date) {
	var month = new Array();
	month[0] = "Jan";
	month[1] = "Feb";
	month[2] = "Mar";
	month[3] = "Apr";
	month[4] = "May";
	month[5] = "Jun";
	month[6] = "Jul";
	month[7] = "Aug";
	month[8] = "Sep";
	month[9] = "Oct";
	month[10] = "Nov";
	month[11] = "Dec";

	var d = date.getDate();
	var m = month[date.getMonth()];
	var y = date.getFullYear();
	var h = date.getHours();
	var min = date.getMinutes();
	var am_pm = 'AM';
	if(h >= 12) {
		h-=12;
		am_pm = 'PM';
	}

	if(h == 0) h = 12;

	return '' + m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y + ' at ' + (h<=9 ? '0' + h : h) + ':' + (min<=9 ? '0' + min : min) + ' ' + am_pm;
}

function convert_time() {
	$('.time-ago').each(function() {
		if(this.getAttribute('data-time') == '')
			return true;

		var to_convert = new Date(this.getAttribute('data-time')*1000);
		var difference = Math.round((new Date() - to_convert)/1000);

		if(difference < 0) {
			difference = 0-difference;
			if(difference < 60) {
				$(this).html('in a few seconds');
			} else {
				difference = Math.floor(difference / 60);
				if(difference < 10) {
					$(this).html('in about ' + difference + ' minutes');
				} else {
					$(this).html(dateToString(to_convert));
				}
			}
		} else {
			if(difference < 60) {
				$(this).html('a few seconds ago');
			} else {
				difference = Math.floor(difference / 60);
				if(difference < 60) {
					$(this).html('about ' + difference + ' minute' + (difference > 1 ? 's' : '') + ' ago');
				} else {
					difference = Math.floor(difference / 60);
					if(difference < 24) {
						$(this).html('about ' + difference + ' hours ago');
					} else {
						$(this).html(dateToString(to_convert));
					}
				}
			}
		}
	});
}

convert_time();
var convert_time_internval = setInterval(convert_time, 60000);

function convert_seconds (sec)
{
	var m = parseInt(sec / 60, 10);
	var s = sec % 60;
	return (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s);
}
