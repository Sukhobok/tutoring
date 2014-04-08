$(document).on('mouseenter', '.friend', function () {
	$('span', this).fadeIn();
	$('.friend-hover', this).fadeIn();
}).on('mouseleave', '.friend', function () {
	$('span', this).fadeOut();
	$('.friend-hover', this).fadeOut();
});
