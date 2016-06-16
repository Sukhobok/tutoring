<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => '',
	'overlay'	=> '',
	'align'	=> '',
	'fullwidth'	=> '',
	'text_style'	=> '',
	'parallax'		=> '',
	'video_bg'		=> '',
	'video_bg_overlay'		=> '',
	'video_bg_mp4'		=> '',
	'video_bg_ogv'		=> '',
	'video_bg_webm'		=> '',
	
	
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row ' . ( $this->settings( 'base' ) === 'vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

$container = '';
if($fullwidth != 'yes')
{
	$container = ' container ';
}
else
{
	$container = ' fullwidth ';	
}
$spacex_style = array();

if($parallax == 'yes')
{
	$spacex_style[] = 'background-attachment:fixed';	
}
$spacex_style[] = 'background-position-y: center';

if(!empty($align))
{
	$spacex_style[] = 'text-align:'. $align;	
}
$video_class = '';
if($video_bg == 'yes')
{
	$video_class = ' section-video-bg';
}
$output .= '<div class="'.$css_class . $video_class.'"'.$style.' style="'.implode(';', $spacex_style).'">';
if(!empty($overlay))
{
	$output .= '<div class="section-overlay" style="background:'.$overlay.';"></div>';
}
if($video_bg == 'yes')
{
	$output .= '<div class="video-background">';
	$output .= '<video autoplay loop muted>';
	if(!empty($video_bg_mp4))
	{
		$output .= '<source src="'.$video_bg_mp4.'" type="video/mp4">';
	}
	if(!empty($video_bg_ogv))
	{
		$output .= '<source src="'.$video_bg_ogv.'" type="video/ogv">';
	}
	if(!empty($video_bg_webm))
	{
		$output .= '<source src="'.$video_bg_webm.'" type="video/webm">';
	}	
	$output .= 'Your browser does not support the video tag.</video>';
	$output .= '</div>';
	
}
$output .= '<div class="'.esc_attr($container).' vctt-text-'.esc_attr($text_style).'">';

$output .= wpb_js_remove_wpautop($content);

$output .= '</div>';

$output .= '</div>'.$this->endBlockComment('row');

echo $output; 