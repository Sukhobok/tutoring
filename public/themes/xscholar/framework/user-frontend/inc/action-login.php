<?php
/**
 * Feature Name: Action Login
 * Author:       HerrLlama for wpcoding.de
 * Author URI:   http://wpcoding.de
 * Licence:      GPLv3
 */

/**
 * Checks the credentials and performs the login
 *
 * @wp-hook	uf_login
 * @return	void
 */
function uf_perform_login() {

	// check username
	if ( ! isset( $_POST[ 'user_login' ] ) || trim( $_POST[ 'user_login' ] ) == '' ) {
		wp_safe_redirect( home_url( '/user-login/?message=nodata' ) );
		exit;
	}

	// check password
	if ( ! isset( $_POST[ 'user_pass' ] ) || trim( $_POST[ 'user_pass' ] ) == '' ) {
		wp_safe_redirect( home_url( '/user-login/?message=nodata' ) );
		exit;
	}

	// set credentials
	$credentials = array(
		'user_login'	=> $_POST[ 'user_login' ],
		'user_password'	=> $_POST[ 'user_pass' ],
	);

	// remember me
	if ( isset( $_POST[ 'rememberme' ] ) && $_POST[ 'rememberme' ] == 'on' )
		$credentials[ 'remember' ] = 'on';

	// signon user
	$user = wp_signon( $credentials );

	// check login
	if ( ! is_wp_error( $user ) ) {

		// set the url
		if ( isset( $_POST[ 'redirect_to' ] ) && trim( $_POST[ 'redirect_to' ] ) != '' )
			$url = $_POST[ 'redirect_to' ];
		else
			$url = home_url( '/user-profile/' );
		$url = apply_filters( 'uf_perform_login_redirection_url', $url );

		wp_safe_redirect( $url );
		exit;
	} else {
		wp_safe_redirect( home_url( '/user-login/?message=nologin' ) );
		exit;
	}
}
add_action( 'uf_login', 'uf_perform_login' );

/**
 * Redirect Adminstrator logged in to backend
 *
 * @return	void
 */
function uf_redirect_admin () {
    if ( current_user_can( 'subscriber' ) && !defined( 'DOING_AJAX' ) ) {
        wp_redirect( home_url('/user/') );
        exit;
    }
}
add_action( 'login_init', 'uf_redirect_admin' );

/**
 * Displays a message
 *
 * @wp-hook	uf_login_messages
 * @param	string $message
 * @return	void
 */
function uf_login_messages( $message ) {

	switch ( $message ) {
		case 'nodata':
		return '<div class="user-message error"><p>'.__( 'We need some input values to handle the login.', 'spacex' ).'</p></div>';
			break;
		case 'nologin':
			return '<div class="user-message error"><p>'.__( 'Username or password is incorrect.', 'spacex' ).'</p></div>';
			break;
		case 'password_resetted':
			return '<div class="user-message updated"><p>'.__( 'Password has been resetted.', 'spacex' ).'</p></div>';
			break;
		case 'registered':
			return '<div class="user-message updated"><p>'.__( 'You have been successfully registered. Please check your mail for your credentials and more informations.', 'spacex' ).'</p></div>';
			break;
		case 'regdisabled':
			return '<div class="user-message error"><p>'.__( 'URegistration is currently disabled.', 'spacex' ).'</p></div>';
			break;
		case 'loggedout':
		return '<div class="user-message updated"><p>'.__( 'You have been successfully logged out.', 'spacex' ).'</p></div>';
			break;
		case 'wpduact_inactive':
		return '<div class="user-message updated"><p>'.__( 'Your account has been temporarily deactivated.', 'spacex' ).'</p></div>';
			break;
		default:
			break;
	}
}
add_action( 'uf_login_messages', 'uf_login_messages' );