<?php
/**
 * Feature Name: Helpers
 * Author:       HerrLlama for wpcoding.de
 * Author URI:   http://wpcoding.de
 * Licence:      GPLv3
 */

/**
 * loads the action url for the forms
 *
 * @return	string
 */
function uf_get_action_url( $action ) {

	return home_url( '/user-action/?action=' . $action );
}

/**
 * standard login form arguments
 *
 * @return	array
 */
function uf_login_form_args() {
	$args = array(
		'echo'				=> TRUE,
		'redirect'			=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], // Default redirect is back to the current page
		'form_id'			=> 'loginform',
		'label_username'	=> __( 'Username','spacex' ),
		'label_password'	=> __( 'Password','spacex' ),
		'label_remember'	=> __( 'Remember Me','spacex' ),
		'label_log_in'		=> __( 'Log In','spacex' ),
		'id_username'		=> 'user_login',
		'id_password'		=> 'user_pass',
		'id_remember'		=> 'rememberme',
		'id_submit'			=> 'wp-submit',
		'remember'			=> TRUE,
		'value_username'	=> '',
		'value_remember'	=> FALSE, // Set this to true to default the "Remember me" checkbox to checked
	);

	return apply_filters( 'uf_login_form_args', $args );
}

/**
 * on submit, we have to store the post and get
 * vars in session to get them back after redirect..
 *
 * @wp-hook	uf_set_request_vars
 * @return	void
 */
function uf_set_request_vars(){

	maybe_start_session();

	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
		$_SESSION[ 'uf_post_vars' ] = $_POST;

	// on a get- and/or post-request, you can send GET-Params
	$_SESSION[ 'uf_get_vars' ] = $_GET;
}
add_action( 'uf_set_request_vars', 'uf_set_request_vars' );
	
/**
 * when loading the template, we have to refetch
 * after Redirect the POST and GET-vars from Session..
 *
 * @wp-hook	uf_get_request_vars
 * @return	void
 */
function uf_get_request_vars(){

	maybe_start_session();

	// trying to get the POST-vars session
	if ( array_key_exists( 'uf_post_vars', $_SESSION ) )
		$_POST = array_merge( $_SESSION[ 'uf_post_vars' ], $_POST );

	// trying to get the GET-Vars from session
	if ( array_key_exists( 'uf_get_vars', $_SESSION ) )
		$_GET = array_merge( $_SESSION[ 'uf_get_vars' ], $_GET );

	// now we have to combine the GET, POST and REQUEST to rebuild the old $_REQUEST
	
	$_REQUEST =  array_merge( $_GET, $_POST, $_REQUEST );
}
add_action( 'uf_get_request_vars', 'uf_get_request_vars' );
	
/**
 * wordpress-style function to start the session when net started.
 *
 * @return	void
 */
function maybe_start_session(){
	if ( ! session_id() )
		session_start();
}


if(class_exists('XSPACE'))
{
	/**
	 * Get the lost password url
	 *
	 * @wp-hook	lostpassword_url
	 * @param	string $url
	 * @return	string the ready made url
	 */
	function uf_lostpassword_url( $url ) {
		return home_url( '/user-forgot-password/' );
	}
	add_action( 'lostpassword_url', 'uf_lostpassword_url' );
		
	/**
	 * Get the register url
	 *
	 * @wp-hook	register_url
	 * @param	string $url
	 * @return	string the ready made url
	 */
	function uf_register_url( $url ) {
		return home_url( '/user-register/' );
	}
	add_action( 'register_url', 'uf_register_url' );
		
	/**
	 * Get the register url
	 *
	 * @wp-hook	wp_signup_location
	 * @param	string $url
	 * @return	string the ready made url
	 */
	function uf_signup_location( $url ) {
		return home_url( '/user-register/' );
	}
	add_action( 'wp_signup_location', 'uf_signup_location' );
		
	/**
	 * Get the login url
	 *
	 * @wp-hook	login_url
	 * @param	string $url
	 * @return	string the ready made url
	 */

	function uf_login_url( $url, $redirect = '' ) {
		$login_url = home_url( '/user-login/' );

		if ( ! empty( $redirect ) )
			$login_url = add_query_arg( 'redirect_to', urlencode( $redirect ), $login_url );

		return $login_url;
	}
	add_action( 'login_url', 'uf_login_url', 10, 2 );

	
	/**
	 * Get the logout url
	 *
	 * @wp-hook	logout_url
	 * @param	string $url
	 * @return	string the ready made url
	 */
	function uf_logout_url( $url, $redirect = '' ) {

		$args = array( 'action' => 'logout' );
		if ( ! empty( $redirect ) )
			$args[ 'redirect_to' ] = urlencode( $redirect );

		$logout_url = add_query_arg( $args, home_url( '/' ) );
		$logout_url = str_replace( '&amp;', '&', $logout_url );
		$logout_url = add_query_arg( 'wp_uf_nonce_logout', wp_create_nonce( 'logout' ), $logout_url );
		$logout_url = esc_html( $logout_url );

		return $logout_url;
	}
	add_action( 'logout_url', 'uf_logout_url', 10, 2 );
		
	/**
	 * Get the edit profile url
	 *
	 * @wp-hook	edit_profile_url
	 * @param	string $url
	 * @return	string the ready made url
	 */
	function uf_edit_profile_url( $url ) {
		if ( is_admin() )
			return $url;

		return home_url( '/user-profile/' );
	}
	add_action( 'edit_profile_url', 'uf_edit_profile_url' );
}