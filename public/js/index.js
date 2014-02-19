$(document).on('click', '.header-button, #close-top-login', function() {
	if($('header').css('top') != '0px') {
		$('header').animate({ top: 0 });
		$('#top-login').slideToggle();
	} else {
		$('header').animate({ top: $('#top-login').outerHeight(true) });
		$('#top-login').slideToggle();
	}
});
