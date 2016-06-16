<?php
$output = $title = $interval = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'interval' => 0,
	'el_class' => '',
	'tabnavtype' => '',
	'aligntabnav' => '',
	
), $atts ) );

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
$tabs_nav = '';
$tabs_nav .= '<ul role="tablist" class="nav nav-tabs vc_clearfix tabs-nav-'.$tabnavtype.' align-'.$aligntabnav.'">';


foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts($tab[0]);

	if(isset($tab_atts['title'])) {
		$tabs_nav .= '<li role="presentation"><a href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '" aria-controls="'.sanitize_title( $tab_atts['title'] ).'" role="tab" data-toggle="tab">';
		$tabs_nav .= $tab_atts['title'] . '</a></li>';
	}

}
$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );


if ( 'vc_tour' == $this->shortcode ) {
	$css_class .= ' vertical-tabs';
}
$output .= "\n\t\t" . '<div class="tabs-wrapper vc_clearfix '.$css_class.'">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
$output .= "\n\t\t\t" . $tabs_nav;
$output .= '<div class="tab-content">';
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
$output .= '</div>';

$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );


echo $output;