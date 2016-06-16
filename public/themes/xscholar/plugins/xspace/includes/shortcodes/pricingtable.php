<?php
/* ---------------------------------------------------------------------- */
/*	Pricing Table
/* ---------------------------------------------------------------------- */

add_shortcode('pricing_table', 'spacex_shortcode_pricing_table');
	function spacex_shortcode_pricing_table($atts, $content = null) {
	
		$defaults =array( 'type' => '', 'column' => '', 'css_animation'			=> '',);
		extract( shortcode_atts( $defaults, $atts ) );
		
		$output = '';
		
		if(!empty($css_animation))
		$css_animation = $css_animation . ' wpb_animate_when_almost_visible';	
	
		$output .= '<div class="sep-boxed-pricing column-'.$column.' '.$css_animation.'">';
		$output .= do_shortcode($content);
		$output .= '</div><div class="clearfix"></div>';

		return $output;
	}

// Pricing Column
add_shortcode('pricing_column', 'spacex_shortcode_pricing_column');
	function spacex_shortcode_pricing_column($atts, $content = null) {
	
		$defaults =array( 'title' => '', 'price' => '', 'unit' => '', 'highlight' => '', 'button' => '', 'link' => '');
		extract( shortcode_atts( $defaults, $atts ) );
		
		$output = '';
		
		if($highlight=='yes'):
			$output = '<div class="col highlight vc_col-sm-3">';
		else:
			$output = '<div class="col">';
		endif;	
		
		
		
		$output .= '<ul>';
		if(!empty($title)):
		$output .= ' <li class="title-row clearfix"><span class="table-title">'.$title.'</span><span class="table-price">'.$price.'<i>'.$unit.'</i></span>';
		
		if($button !== '')
		{
			$output .= do_shortcode('[spacexbutton type="border" color="white" size="small" text="'.$button.'" link="'.$link.'"]');
		}
		
		$output .= '</li>';
		endif;
		$output .= do_shortcode($content);
		$output .= '</ul>';
		$output .= '</div>';

		return $output;
	}

// Pricing Row
add_shortcode('pricing_row', 'spacex_shortcode_pricing_row');
	function spacex_shortcode_pricing_row($atts, $content = null) {
		
		$output = '';
		$output .= ' <li class="normal-row">';
		$output .= do_shortcode($content);
		$output .= '</li>';

		return $output;
	}

// Pricing Footer
add_shortcode('pricing_footer', 'spacex_shortcode_pricing_footer');
	function spacex_shortcode_pricing_footer($atts, $content = null) {
		
		$defaults =array( 'link' => '');
		extract( shortcode_atts( $defaults, $atts ) );
		
		$output = '';
		$output .= '<li class="footer-row">';
		if(!empty($content)){
			$output .= '<a href="'.$link.'">' . do_shortcode($content). '</a>';
		}
		$output .= '</li>';

		return $output;
	}
