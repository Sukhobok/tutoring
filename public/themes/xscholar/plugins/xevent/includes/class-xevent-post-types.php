<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Registers post types and taxonomies
 *
 * @class 		WC_Post_types
 * @version		2.2.0
 * @package		WooCommerce/Classes/Products
 * @category	Class
 * @author 		WooThemes
 */
class XEVENT_POSTTYPES {

	/**
	 * Hook in methods
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_post_types' ), 5);
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
		
	}

	/**
	 * Register WooCommerce taxonomies.
	 */
	public static function register_taxonomies() {
		if ( taxonomy_exists( 'event_cat' ) ) {
			return;
		}

		
		
		register_taxonomy(
			"event_cat",
			array("xevent"),
			array(
						'hierarchical'          => true,
						'label'                 => __( 'Event Categories', 'woocommerce' ),
						'labels' => array(
								'name'              => __( 'Event Categories', 'woocommerce' ),
								'singular_name'     => __( 'Event Category', 'woocommerce' ),
								'menu_name'         => _x( 'Categories', 'Admin menu name', 'woocommerce' ),
								'search_items'      => __( 'Search Course Categories', 'woocommerce' ),
								'all_items'         => __( 'All Event Categories', 'woocommerce' ),
								'parent_item'       => __( 'Parent Event Category', 'woocommerce' ),
								'parent_item_colon' => __( 'Parent Event Category:', 'woocommerce' ),
								'edit_item'         => __( 'Edit Event Category', 'woocommerce' ),
								'update_item'       => __( 'Update Event Category', 'woocommerce' ),
								'add_new_item'      => __( 'Add New Event Category', 'woocommerce' ),
								'new_item_name'     => __( 'New Event Name', 'woocommerce' )
							),
						'public'              => true,
						'show_ui'               => true,
						'query_var'             => true,
/*						'capabilities'          => array(
							'manage_terms' => 'manage_event_terms',
							'edit_terms'   => 'edit_event_terms',
							'delete_terms' => 'delete_event_terms',
							'assign_terms' => 'assign_event_terms',
						),*/
						'rewrite'             => array( 'slug' => 'event_cat' ),
			)
		);
		

		register_taxonomy( 'event_tag',
			apply_filters( 'woocommerce_taxonomy_objects_product_tag', array( 'xevent' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_tag', array(
				'hierarchical'          => false,
				'update_count_callback' => '_wc_term_recount',
				'label'                 => __( 'Event Tags', 'woocommerce' ),
				'labels'                => array(
						'name'                       => __( 'Event Tags', 'woocommerce' ),
						'singular_name'              => __( 'Event Tag', 'woocommerce' ),
						'menu_name'                  => _x( 'Tags', 'Admin menu name', 'woocommerce' ),
						'search_items'               => __( 'Search Event Tags', 'woocommerce' ),
						'all_items'                  => __( 'All Event Tags', 'woocommerce' ),
						'edit_item'                  => __( 'Edit Event Tag', 'woocommerce' ),
						'update_item'                => __( 'Update Event Tag', 'woocommerce' ),
						'add_new_item'               => __( 'Add New Event Tag', 'woocommerce' ),
						'new_item_name'              => __( 'New Event Tag Name', 'woocommerce' ),
						'popular_items'              => __( 'Popular Event Tags', 'woocommerce' ),
						'separate_items_with_commas' => __( 'Separate Event Tags with commas', 'woocommerce'  ),
						'add_or_remove_items'        => __( 'Add or remove Event Tags', 'woocommerce' ),
						'choose_from_most_used'      => __( 'Choose from the most used Event tags', 'woocommerce' ),
						'not_found'                  => __( 'No Event Tags found', 'woocommerce' ),
					),
				'show_ui'               => true,
				'query_var'             => true,
				'rewrite'             => array( 'slug' => 'event_tag' ),
			) )
		);

	}

	/**
	 * Register core post types
	 */
	public static function register_post_types() {
		if ( post_type_exists('xevent') ) {
			return;
		}

		register_post_type( 'xevent',
			array(
				'labels' =>
					array(
						'name' => __('Event' , 'spacex'),
						'singular_name' => __('Event' , 'spacex'),
						'add_new' => __('Add New Event', 'spacex'),
						'add_new_item' => __('Add New Event', 'spacex'),
						'edit_item' => __('Edit Event', 'spacex'),
						'new_item' => __('New Event', 'spacex'),
						'all_items' => __('All Events', 'spacex'),
						'view_item' => __('View Event', 'spacex'),
						'search_items' => __('Search Events', 'spacex'),
						'not_found' =>  __('No Events Found', 'spacex'),
						'not_found_in_trash' => __('No events found in Trash', 'spacex'),
						'parent_item_colon' => __('', 'spacex'),
						'menu_name' => __('XEvent', 'spacex')
				   ),
					'description'         => __( 'This is where you can add new xevents.', 'spacex' ),
					'public'              => true,
					'show_ui'             => true,
					'map_meta_cap'        => true,
					'publicly_queryable'  => true,
					'exclude_from_search' => false,
					'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
					'rewrite'             => array( 'slug' => 'event' ),
					'query_var'           => true,
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
					'has_archive'         => true,
					'show_in_nav_menus'   => true,
					'menu_icon'			  => 'dashicons-microphone',
			)
		);
		register_post_type( 'speaker',
			array(
				'labels' =>
					array(
						'name' => __('Speaker' , 'spacex'),
						'singular_name' => __('Speaker' , 'spacex'),
						'add_new' => __('Add New Speaker', 'spacex'),
						'add_new_item' => __('Add New Speaker', 'spacex'),
						'edit_item' => __('Edit Speaker', 'spacex'),
						'new_item' => __('New Speaker', 'spacex'),
						'all_items' => __('All Speakers', 'spacex'),
						'view_item' => __('View Speaker', 'spacex'),
						'search_items' => __('Search Speakers', 'spacex'),
						'not_found' =>  __('No Speakers Found', 'spacex'),
						'not_found_in_trash' => __('No Speakers found in Trash', 'spacex'),
						'parent_item_colon' => __('', 'spacex'),
						'menu_name' => __('Speaker', 'spacex')
				   ),
					'description'         => __( 'This is where you can add new Speakers.', 'spacex' ),
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'page-attributes' ),
					'show_in_nav_menus'   => true,
					'rewrite'             => array( 'slug' => 'speaker' ),
					'public'              => true,
					'has_archive'         => true,
					'show_in_menu'			=> 'edit.php?post_type=xevent'
			)
		);
		
	}

}

XEVENT_POSTTYPES::init();
