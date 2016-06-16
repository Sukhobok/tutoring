<?php
/**
 * Hooks Function
 *
 * @author 		spacex
 * @package 	spacex/Templates
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Content Wrappers
 *
 * @see xcourse_output_content_wrapper()
 * @see xcourse_output_content_wrapper_end()
 */
add_action( 'xcourse_before_main_content', 'xcourse_output_content_wrapper', 10 );
add_action( 'xcourse_after_main_content', 'xcourse_output_content_wrapper_end', 10 );
//add_action( 'xcourse_before_main_content', 'xcourse_template_page_header', 5 );

/**
 * Course Loop
 *
 * @see xcourse_result_count()
 * @see xcourse_catalog_ordering()
 * @see xcourse_reset_loop()
 */
remove_action( 'xcourse_before_course_loop', 'xcourse_result_count', 20 );
//add_action( 'xcourse_before_course_loop', 'xcourse_catalog_ordering', 30 );
//add_action( 'xcourse_after_shop_loop_item_title', 'xcourse_template_loop_meta', 20 );
add_action( 'xcourse_after_shop_loop_item_title', 'xcourse_template_loop_price', 15 );
add_action( 'xcourse_after_shop_loop_item_title', 'xcourse_template_loop_description', 10 );
//add_action( 'xcourse_after_shop_loop_item_title', 'xcourse_template_loop_action_button', 30 );

/**
 * Archive descriptions
 *
 * @see xcourse_taxonomy_archive_description()
 * @see xcourse_course_archive_description()
 */
add_action( 'xcourse_after_page_header_title', 'xcourse_taxonomy_archive_description', 10 );
add_action( 'xcourse_after_page_header_title', 'xcourse_course_archive_description', 10 );

/**
 * Breadcrumbs
 *
 * @see the_breadcrumbs()
 */
//add_action( 'xcourse_before_course_loop', 'the_breadcrumb', 10 );
/**
 * Pagination after shop loops
 *
 * @see xcourse_pagination()
 */
add_action( 'xcourse_after_course_loop', 'xcourse_pagination', 10 );

/**
 * Thumbnail
 *
 */
add_action( 'xcourse_before_shop_loop_item_title', 'xcourse_template_loop_thumbnail', 10 );

add_action( 'xcourse_inside_course_thumbnail', 'xcourse_template_course_loop_status', 10 );

add_action( 'xcourse_after_single_course_title', 'xcourse_post_meta', 10 );


?>