<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Heading
/* ---------------------------------------------------------------------- */
add_shortcode('heading', 'spacex_shortcode_heading');

function spacex_shortcode_heading( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'title'			=> '',
		'subtitle'			=> '',
		'align'			=> '',		
		'type'			=> '',
		'size'			=> '',
		'css_animation'			=> '',
	), $atts));
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	if($size == '' || $size == 'default')
	{
		$size = 'h2';
	}
	if($type == '5')
	{
		$output .= '<'.esc_attr($size).' class="block-heading type-'.esc_attr($type).' align-'.esc_attr($align).' '.esc_attr($el_class).'"><span>'.$title.'</span></'.esc_attr($size).'>';
	}
	else
	{
		$output .= '<'.esc_attr($size).' class="block-heading type-'.esc_attr($type).' align-'.esc_attr($align).' '.esc_attr($el_class).'"><span>'.$title.'</span></'.esc_attr($size).'>';
	}
	if(!empty($subtitle) || $subtitle !== '<p></p>' || $subtitle !== '<p> </p>' || $subtitle !== '</p> <p>' || $subtitle !== '</p><p>')
	{
		$output .= '<div class="subheading '.esc_attr($align).' '.esc_attr($el_class).'">'.$subtitle.'</div>';
	}

	return $output;	
}
