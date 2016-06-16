<?php
/**
 * Register Menus
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once( X_BASE_DIR . '/framework/class/Spacex_Menu.php');
include_once( X_BASE_DIR . '/framework/class/Walker_Nav_Menu.php');
include_once( X_BASE_DIR . '/framework/class/Walker_Nav_Menu_Edit.php');
// Register navigation 
register_nav_menus( array(
	'top_nav' => __( 'Top Bar Menu', 'spacex' ),
	'primary_nav' => __( 'Primary Menu', 'spacex' ),
	'footer_nav'  => __( 'Footer Menu', 'spacex' ),
	//'short_nav'  => __( 'Header Short Menu', 'spacex' ),
	'vertical'  => __( 'Vertical Menu', 'spacex' )
) );	