/**
 * Simulate link press
 */
$(document).on('click', '.ss-link', function () {
	window.location.href = this.getAttribute('data-ss-link');
});

/**
 * Set multiline value
 * e.g. message page
 */
$.fn.text_multiline = function (text) {
	this.text(text);
	this.html(this.html().replace(/\n/g,'<br/>'));
	return this;
}

/**
 * Audio Alert
 */
var audio_alert = function ()
{
	$('#ss-audio-alert')[0].play();
}

/**
 * Window Focus
 */
var window_has_focus = true;
var ss_notifications = 0;
var old_document_title = document.title;

window.onblur = function ()
{
	window_has_focus = false;
};

window.onfocus = function ()
{
	window_has_focus = true;
	ss_notifications = 0;
	setTimeout(function ()
	{
		document.title = old_document_title;
	}, 1000);
};

var new_ss_notification = function ()
{
	if (!window_has_focus)
	{
		ss_notifications++;
		document.title = '(' + ss_notifications + ') ' + old_document_title;
		audio_alert();
	}
};
