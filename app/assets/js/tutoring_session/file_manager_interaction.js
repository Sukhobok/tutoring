$(document).on('mouseenter', '.ts-file-manager-file', function () {
	$('.ts-file-manager-file-actions', this).fadeIn();
}).on('mouseleave', '.ts-file-manager-file', function () {
	$('.ts-file-manager-file-actions', this).fadeOut();
});
