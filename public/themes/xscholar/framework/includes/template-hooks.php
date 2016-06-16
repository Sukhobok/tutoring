<?php
/**
 * spacex Template Hooks
 *
 * Functions for the templating theme.
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/* ---------------------------------------------------------------------- */
/* Hooks
/* ---------------------------------------------------------------------- */

add_action( 'spacex_before_main_content', 'spacex_template_page_header', 5 );
add_action( 'spacex_before_main_content', 'spacex_site_hero', 3 );


add_action( 'spacex_before_site_header', 'spacex_switcher_style', 1 );

add_action( 'spacex_before_content', 'spacex_start_wrapper_main_content', 5 );
add_action( 'spacex_after_content', 'spacex_end_wrapper_main_content', 5 );


add_action( 'spacex_popup', 'spacex_popup_template', 1 );
add_action( 'spacex_before_theme_content', 'spacex_move_to_top', 10 );

add_action( 'spacex_before_site_header', 'spacex_template_sticky_nav', 1 );
add_action( 'spacex_before_site_header', 'spacex_template_page_side_content', 5 );

add_action( 'spacex_inner_site_header', 'spacex_template_header_logo', 10 );
add_action( 'spacex_inner_site_header', 'spacex_template_header_menu', 15 );

add_action( 'spacex_after_logo', 'spacex_header_widget', 5 );

//add_action( 'xcourse_after_page_header_title', 'the_breadcrumb', 5 );


$menu_search = ot_get_option('tt_menu_search');
if($menu_search == 'true')
{
	add_action( 'spacex_after_main_menu', 'spacex_simple_search_form', 5 );
}

$page_side_button = ot_get_option('tt_page_side_trigger');
if($page_side_button == 'true')
{
	add_action( 'spacex_before_main_menu', 'spacex_mobile_menu_trigger', 5 );
}

$footer_bottom = ot_get_option('tt_footer_extra');
if($footer_bottom == 'bottom')
{
	add_action( 'spacex_after_footer', 'spacex_template_footer_extra', 5 );
}
elseif($footer_bottom == 'top')
{
	add_action( 'spacex_before_footer', 'spacex_template_footer_extra', 5 );
}
add_action( 'spacex_after_footer', 'spacex_template_footer_credit', 10 );
