<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post;	
		
	echo '<aside class="entry-description">';
	echo '<h3 class="widget-title">DESCRIPTION</h3>';
	echo get_post_meta($post->ID,'event-description',true);
	echo '</aside>';