/*-----------------------------------------------------------------------------------
/*
/* Switcher
/*
-----------------------------------------------------------------------------------*/


	
/*----------------------------------------------------*/
/*	Switcher
/*----------------------------------------------------*/	
(function($) {
		  
$(document).ready(function(){

$('#sw-button-toggle').click(function(){									  

	
	  if($(this).parent().hasClass('toggle-in'))
	  {
	  	$(this).parent().removeClass('toggle-in');
	  }
	  else
	  {
		  $(this).parent().addClass('toggle-in');
	  }
	  
	  
});
$('.sw-btn').click(function(){
										   
		id=$(this).attr('id');
		
		if(id=='boxed')
		{	
			$('link[id="tt-layout"]').attr('href','css/layout/boxed1.css');
			$(window).resize();
		}
		else if(id=='fullwidth')
		{
			$('link[id="tt-layout"]').attr('href','css/layout/fullwidth.css');
			$(window).resize();
		}
});
$('.skin li').click(function(){
										   
	color=($(this).attr('id'));	
		
	if(color=='green')
	{	
		$('link[id="skin"]').attr('href','css/skin/green.css');
	}
	else if(color=='red')
	{
		$('link[id="skin"]').attr('href','css/skin/red.css');
	}
	else if(color=='orange')
	{
		$('link[id="skin"]').attr('href','css/skin/orange.css');
	}
	else if(color=='blue')
	{
		$('link[id="skin"]').attr('href','css/skin/blue.css');
	}
	else if(color=='steel')
	{
		$('link[id="skin"]').attr('href','css/skin/steel.css');
	}	
		
});
$('.bg-pattern li').click(function(){
										   
	changeBackground=($(this).attr('class'));	
	$('body').removeClass();
	$('body').addClass(changeBackground);
});

});

})(this.jQuery);
/*----------------------------------------------------*/
/*	End Document
/*----------------------------------------------------*/		


