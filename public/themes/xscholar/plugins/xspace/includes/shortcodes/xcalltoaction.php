<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Call To Action
/* ---------------------------------------------------------------------- */
add_shortcode('xcalltoaction', 'spacex_shortcode_cta');

function spacex_shortcode_cta( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'first'			=> '',
		'second'			=> '',
		'color'	=> '',				
		'layout'			=> '',
		'bg_color'			=> '',
		'bg_image'			=> '',	
		'border'			=> '',
		//'parallax'			=> '',
		'button'			=> '',
		'size'			=> '',
		'text'			=> '',
		'link'			=> '',
		'css_animation'			=> '',		
	), $atts));
	
	$output ='';
	$style = '';

	if($border == 'yes')
	{
		$border = 'border';
	}
	if($bg_color !== '')
	{
		$style .= 'background-color:'.$bg_color.';';
	}
	if($bg_image !== '')
	{
		$bg = wp_get_attachment_image_src($bg_image, 'full');
		$style .= 'background-image:url('.$bg[0].');';
	}
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$output .= '<div class="ts-cta '.$layout.' '.$border.' '.$el_class.' clearfix" style="'.$style.'">';
	$output .= '<div class="cta-content">';
	$output .= '<div class="cta-inner '.$color.'">';
		$output .= '<h2>'.$first.'</h2>';
		if($second !== '')
		{
			$output .= '<p>'.$second.'</p>';	
		}
	$output .= '</div>';
	
	if($button == 'yes')
	{

		$output .= '<a href="'.$link.'" class="ts-cta-button spacex-button border white '.$size.'">'.$text.'</a>';	
	}
	$output .= '</div>';
	$output .= '</div>';
	return $output;	
}
