<?php
$output = $title = $tab_id = $tab_icon = '';
extract(shortcode_atts($this->predefined_atts, $atts));

extract( shortcode_atts( array(
	'tab_icon' => '',
), $atts ) );


$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_clearfix', $this->settings['base'], $atts );

if(!empty($tab_icon) || $tab_icon != 'none')
{
	$output .= "\n\t\t\t" . '<div data-icon="'.$tab_icon.'" id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class.' tab-pane"  role="tabpanel">';
}
else
{
	$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class.' tab-pane"  role="tabpanel">';	
}
$output .= ($content=='' || $content==' ') ? __("Empty tab. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_tab');

echo $output;