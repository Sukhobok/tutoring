<?php
$output = $title = $el_id = '';

extract( shortcode_atts( array(
	'title' => __( "Section", "js_composer" ),
	'el_id' => '',
	'tab_icon' => '',
), $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', $this->settings['base'], $atts );
$output .= "\n\t\t\t" . '<div ' . ( isset( $el_id ) && ! empty( $el_id ) ? "id='" . esc_attr( $el_id ) . "'" : "" ) . 'class="' . $css_class . '">';

if($tab_icon !== 'none' || !empty($tab_icon))
{
	$output .= "\n\t\t\t\t" . '<a class="togglex-toggler collapsed" data-toggle="collapse" href="#' . sanitize_title( $title ) . '" aria-controls="'.sanitize_title_with_dashes($title).'"  aria-expanded="true"><i class="fa '.$tab_icon.'"></i>' . $title . '</a>';
}
else
{
	
	$output .= "\n\t\t\t\t" . '<a class="togglex-toggler collapsed" data-toggle="collapse" href="#' . sanitize_title( $title ) . '" aria-controls="'.sanitize_title_with_dashes($title).'"  aria-expanded="true">' . $title . '</a>';
}
$output .= "\n\t\t\t\t" . '<div class="collapse vc_clearfix" id="'.sanitize_title_with_dashes($title).'">';
$output .= "\n\t\t\t\t" . '<div class="togglex-content">';

$output .= ( $content == '' || $content == ' ' ) ? __( "Empty section. Edit page to add content here.", "js_composer" ) : "\n\t\t\t\t" . wpb_js_remove_wpautop( $content );
$output .= "\n\t\t\t\t" . '</div>';
$output .= "\n\t\t\t\t" . '</div>';
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment( '.wpb_accordion_section' ) . "\n";

echo $output;
