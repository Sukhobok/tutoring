<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Benefit
/* ---------------------------------------------------------------------- */
add_shortcode('spacexbutton', 'spacex_shortcode_button');

function spacex_shortcode_button( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'type'			=> '',
		'color'			=> '',
		'text'			=> '',
		'link'			=> '',
		'align'			=> '',
		'size'			=> '',
		'css_animation'			=> '',
	), $atts));
	
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$output = '<a href="'.$link.'" class="spacex-button '.$type.' '.$color.' '.$size.' '.$align.' '.$el_class.'" ><span>'.$text.'</span></a>';	
		
		
	return $output;	
}
