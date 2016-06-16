<?php
/**
 * Plugin Name:	User Frontend
 * Description:	This plugin restricts the access to the admin panel and provides register, profile, login and logout features inside of the theme.
 * Version:		1.0.4
 * Author:		HerrLlama for wpcoding.de
 * Author URI:	http://wpcoding.de
 * Licence:		GPLv3
 */

// check wp
if ( ! function_exists( 'add_action' ) )
	return;

// set some constants
define( 'UF_PLUGIN_VERSION', '1.0.4' );
define( 'TT_USER_FRONTEND_PATH', get_template_directory() . '/framework/user-frontend' );
define( 'TT_USER_FRONTEND_BASE', get_template_directory_uri() . '/framework/user-frontend' ); 
/**
 * Inits the plugins, loads all the files
 * and registers all actions and filters
 *
 * @wp-hook	plugins_loaded
 * @return	void
 */

	
	// This is for the Heartbeat API and auth check.
	// If auth check is failed, the user will be promted to login again.
	// It loads wp_login_url() in a iframe. Currently the user-login.php is
	// not optimized for this iframe, so lets just link the login URL, which opens
	// in a new tab. Fore more, see wp_auth_check_html()
	add_action( 'wp_auth_check_same_domain', '__return_false' );
	
	// localization
	//include_once(TT_USER_FRONTEND_PATH . '/inc/localization.php');

	
	// set up the helper functions
	include_once( TT_USER_FRONTEND_PATH  . '/inc/user-helpers.php');
	
	// set up the helper functions
	include_once( TT_USER_FRONTEND_PATH  . '/inc/helpers.php');
	
	// restrict the backend access
	include_once(TT_USER_FRONTEND_PATH . '/inc/restrict-backend-access.php');


	// scripts
	include_once(TT_USER_FRONTEND_PATH . '/inc/scripts.php');
	

	// template includes
	include_once(TT_USER_FRONTEND_PATH . '/inc/template-loader.php');


	// the action handler
	include_once(TT_USER_FRONTEND_PATH  .'/inc/action-handler.php');
	

	// the special error handler
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-error.php');
	

	// user activation
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-activation.php');
	

	// forgot password
	include_once(TT_USER_FRONTEND_PATH  .'/inc/action-forgot-password.php');
	

	// user login
	include_once(TT_USER_FRONTEND_PATH  .'/inc/action-login.php');
	

	// user logout
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-logout.php');
	

	// user profile
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-profile.php');

	// registration
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-register.php');
	

	// reset password
	include_once(TT_USER_FRONTEND_PATH . '/inc/action-reset-password.php');
	

	// wp titles
	include_once(TT_USER_FRONTEND_PATH . '/inc/wp-title.php');
	
	
	//add_action( 'plugins_loaded', 'uf_init' );
