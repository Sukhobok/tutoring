<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Blockquote
/* ---------------------------------------------------------------------- */
add_shortcode('blockquote', 'spacex_shortcode_blockquote');

function spacex_shortcode_blockquote( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'sourcename'			=> '',
		'sourceurl'			=> '',
		'sourcetitle'			=> '',
		'sourcedate'			=> '',
		'css_animation'			=> '',
	), $atts));
	
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$output.= '<blockquote class="'.$el_class.'">' ;
	$output.= '<i class="fa fa-quote-left"></i>' ;	
	$output.= '<p>'.$sourcetitle.'</p>' ;	
	$output.= '<span>'.$sourcename .'</span>';
	//$output.= '<time>'.$soururl .'</time>';		
	//$output.= '<time>'.$sourcedate .'</time>';		
	$output.= '</blockquote>' ;	
		
	return $output;	
}
