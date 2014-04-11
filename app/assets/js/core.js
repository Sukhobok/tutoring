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
