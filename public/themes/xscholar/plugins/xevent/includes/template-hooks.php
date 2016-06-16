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
 * @see xevent_output_content_wrapper()
 * @see xevent_output_content_wrapper_end()
 */
add_action( 'xevent_before_main_content', 'xevent_output_content_wrapper', 10 );
add_action( 'xevent_after_main_content', 'xevent_output_content_wrapper_end', 10 );
//add_action( 'xevent_before_main_content', 'xevent_template_page_header', 5 );

/**
 * Course Loop
 *
 * @see xevent_result_count()
 * @see xevent_catalog_ordering()
 * @see xevent_reset_loop()
 */
remove_action( 'xevent_before_event_loop', 'xevent_result_count', 20 );
//add_action( 'xevent_before_event_loop', 'xevent_catalog_ordering', 30 );
//add_action( 'xevent_after_shop_loop_item_title', 'xevent_template_loop_meta', 20 );
add_action( 'xevent_after_shop_loop_item_title', 'xevent_template_loop_price', 15 );
add_action( 'xevent_after_shop_loop_item_title', 'xevent_template_loop_description', 10 );
//add_action( 'xevent_after_shop_loop_item_title', 'xevent_template_loop_action_button', 30 );

/**
 * Archive descriptions
 *
 * @see xevent_taxonomy_archive_description()
 * @see xevent_event_archive_description()
 */
add_action( 'xevent_after_page_header_title', 'xevent_taxonomy_archive_description', 10 );
add_action( 'xevent_after_page_header_title', 'xevent_event_archive_description', 10 );


/**
 * Breadcrumbs
 *
 * @see the_breadcrumbs()
 */
//add_action( 'xevent_before_event_loop', 'the_breadcrumb', 10 );

/**
 * Pagination after shop loops
 *
 * @see xevent_pagination()
 */
add_action( 'xevent_after_event_loop', 'xevent_pagination', 10 );

/**
 * Thumbnail
 *
 */
add_action( 'xevent_before_shop_loop_item_title', 'xevent_template_loop_thumbnail', 10 );

add_action( 'xevent_inside_event_thumbnail', 'xevent_template_event_loop_status', 10 );

add_action( 'xevent_inside_event_thumbnail', 'xevent_template_event_date_time', 15 );

add_action( 'xevent_after_single_event_title', 'xevent_post_meta', 10 );



?>