<?php
/**
 * Feature Name: Scripts
 * Author:       HerrLlama for wpcoding.de
 * Author URI:   http://wpcoding.de
 * Licence:      GPLv3
 */

/**
 * Adds the needed javascript in the frontend
 *
 * @wp-hook	wp_enqueue_scripts
 * @return	void
 */
function uf_wp_enqueue_scripts() {

	$script_suffix = '.js';
	if ( defined( 'WP_DEBUG' ) )
		$script_suffix = '.dev.js';

	wp_register_script(
		'uf-frontend-scripts',
		TT_USER_FRONTEND_BASE . '/js/password' . $script_suffix,
		array( 'jquery', 'utils' )
	);

	wp_enqueue_script( 'uf-frontend-scripts' );
	wp_localize_script( 'uf-frontend-scripts', 'uf_vars', array(
		'strength_indicator'	=> __( 'Strength indicator','spacex' ),
		'very_weak'				=> __( 'Very weak','spacex' ),
		'weak'					=> __( 'Weak','spacex' ),
		'medium'				=> __( 'Medium','spacex' ),
		'strong'				=> __( 'Strong','spacex' ),
		'mismatch'				=> __( 'Mismatch','spacex' )
	) );
	
	
	wp_enqueue_style( 'user-frontend-css',	TT_USER_FRONTEND_BASE . '/css/user-frontend.css',	null, false );
}
add_action( 'wp_enqueue_scripts', 'uf_wp_enqueue_scripts' );