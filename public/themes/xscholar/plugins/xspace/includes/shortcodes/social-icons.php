<?php
/* ---------------------------------------------------------------------- */
/*	Social Icons
/* ---------------------------------------------------------------------- */
add_shortcode('socialicons', 'spacex_shortcode_social_icons');

function spacex_shortcode_social_icons( $atts, $content = null ) { 

	$output = $el_class = '';
	

	$socials = ot_get_option('tt_social_links');
	
	if(!is_array($socials))
	{
		return;
	}
		
		if(!empty($css_animation))
		$css_animation = $css_animation . ' wpb_animate_when_almost_visible';	
		
		$output .= '<ul class="social-icons">';
			foreach($socials as $item)
			{
				$output .= '<li><a target="_blank" href="'.esc_url($item['href']).'" title="'.esc_attr($item['title']).'"><i class="fa fa-'.esc_attr($item['title']).' '.esc_attr($item['title']).'"></i></a></li>';
			}
		$output .= '</ul>';
		
		return $output;

}

