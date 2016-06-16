<?php

$switch = ot_get_option('tt_switch_style');

if($switch !== 'true'){
	return;
}


function xswitcher_styles() {
		wp_enqueue_style( 'x-switcher-css', get_template_directory_uri() . '/css/switcher.css' );
}
add_action('wp_enqueue_scripts', 'xswitcher_styles');

?>
<script>
jQuery(document).ready(function() {


	jQuery('.switcher-title').click(function(){
			jQuery(this).parents('.x-switcher').toggleClass('show');
	});
	jQuery('.switch-layout span').click(function(){

		var id=jQuery(this).attr("data-id");
		jQuery('.switch-layout span').removeClass('active');
		jQuery(this).addClass('active');



		if(id=='boxed')
		{
			jQuery('link[id="layout-css"]').attr('href','<?php echo get_template_directory_uri();?>/css/layout/boxed.css');
			jQuery('.switcher-field.bg').show('slow');

			jQuery(window).resize();
		}
		else if(id=='fullwidth')
		{
			jQuery('body').css('background',  "#fff");
			jQuery('link[id="layout-css"]').attr('href','<?php echo get_template_directory_uri();?>/css/layout/fullwidth.css');
			jQuery(window).resize();
			jQuery('.switcher-field.bg').hide('slow');
		}

	});
	jQuery('.switch-header span').click(function(){

		var id=jQuery(this).attr("data-id");
		jQuery('.switch-header span').removeClass('active');
		jQuery(this).addClass('active');

		if(id!=='')
		{
			jQuery('#main-header').attr('class', id );
			jQuery(window).resize();
		}

	});

	jQuery('.switch-color > span').click(function(){

		var path = '<?php echo get_template_directory_uri();?>';
		var color = (jQuery(this).attr('data-id'));

		if(jQuery('link[id="skin-css"]').length > 0)
		{
			jQuery('link[id="skin-css"]').attr('href',  path+'/css/skin/'+color+'.css' );
		}
		else
		{

			jQuery('head').append('<link id="skin-css" rel="stylesheet" href="'+path+'/css/skin/'+color+'.css" type="text/css" />');
		}

		jQuery('style[title="skin"]').remove();

	});

	jQuery('.switch-background > span').click(function(){
		var id=jQuery(this).attr("data-id");
		var bg = jQuery(this).css('background');

		jQuery('body').css('background',  bg.replace("-thumb", ""));
		jQuery('body').css('background-attachment', 'fixed');
	});

	jQuery('.switch-sidebar > span').click(function(){
		var id=jQuery(this).attr("data-id");
		jQuery('.switch-sidebar span').removeClass('active');
		jQuery(this).addClass('active');

		jQuery('body').find('#sidebar').addClass(id);
		jQuery('body').removeClass('sidebar-background').removeClass('sidebar-boxed').removeClass('sidebar-border').removeClass('sidebar-clean').addClass('sidebar-'+id);

	});

	jQuery('.switch-hidden > span').click(function(){
		var id=jQuery(this).attr("data-element");
		jQuery(this).toggleClass('active');
		jQuery(id).toggle('hide');
	});

});
</script>
<div class="x-switcher">
	<div class="switcher-title"><i class="fa fa-cog"></i>Switcher Style </div>
    <div class="switcher-inside">

        <div class="switcher-field">
    		<p class="label">Color Scheme</p>
            <p class="small">Set your own color in Theme Options</p>
        	<p class="switch-color sw-field clearfix"><span data-id="red" class="red"></span><span data-id="blue"  class="blue"></span><span data-id="green" class="green"></span><span data-id="orange" class="orange"></span><span data-id="purple" class="purple"></span><span data-id="turquose" class="turquose"></span><span data-id="midnightblue" class="midnightblue"></span><span data-id="concrete" class="concrete"></span></p>
        </div>

        <div class="switcher-field clearfix">
    	    <p class="label">Layout</p>
	        <p class="switch-layout sw-field"><span data-id="boxed" class="sw-boxed">Boxed</span><span data-id="fullwidth" class="active sw-fullwidth">Fullwidth</span></p>
        </div>
        <div class="switcher-field clearfix bg">
    	    <p class="label">Background</p>
	        <p class="switch-background sw-field"><span data-id="img0" id="img0"></span><span data-id="img1" id="img1"></span><span data-id="img2" id="img2"></span><span data-id="img3" id="img3"></span><span data-id="img4" id="img4"></span><span data-id="img5" id="img5"></span><span data-id="img6" id="img6"></span><span data-id="img7" id="img7"></span></p>
        </div>

        <div class="switcher-field clearfix">
            <p class="label">Header Style</p>
            <p class="switch-header sw-field"><span data-id="dark" class="dark">Dark</span><span data-id="white" class="white">White</span><span class="transparent" data-id="transparent">Trans</span><span class="classic" data-id="classic">Classic</span></p>
        </div>

        <div class="switcher-field clearfix">
            <p class="label">Sidebar Style</p>
            <p class="switch-sidebar sw-field"><span data-id="clean" class="clean">Clean</span><span class="background" data-id="background">Background</span><span class="border" data-id="border">Border</span><span class="boxed" data-id="boxed">Boxed</span></p>
        </div>

         <div class="switcher-field clearfix">
            <p class="switch-hidden sw-field"><span data-element="#topbar">Hide Topbar</span></p>
        </div>


    </div>
</div>
