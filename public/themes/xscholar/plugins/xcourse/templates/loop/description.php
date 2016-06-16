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
		
	echo '<div class="course-loop-description">';
	$description = get_post_meta($post->ID,'course-description',true);
	echo substr($description,0,89) . '...';
	echo '</div>';