<?php
/**
 * spacex Shortcodes
 *
 * Functions for shortcodes
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'xgetCSSAnimation' ) ) {
	
	function xgetCSSAnimation( $css_animation ) {
		$output = '';
		if ( $css_animation != '' ) {
			wp_enqueue_script( 'waypoints' );
			$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
		}
		return $output;
	}
}
		
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/heading.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/category.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/categories.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/client.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/testimonial.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/team.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/gallery.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/benefit.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/fromblogpost.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/button.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/productsearch.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/verticalmenu.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/pricingtable.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/xcalltoaction.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/social-icons.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/counter.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/login_form.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/blockquote.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/minicart.php');
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes/xslider.php');
