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
class SPACEX_POSTTYPES {

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
		if ( taxonomy_exists( 'course_cat' ) ) {
			return;
		}

		
		
		register_taxonomy(
			"course_cat",
			array("xcourse"),
			array(
						'hierarchical'          => true,
						'label'                 => __( 'Course Categories', 'woocommerce' ),
						'labels' => array(
								'name'              => __( 'Course Categories', 'woocommerce' ),
								'singular_name'     => __( 'Course Category', 'woocommerce' ),
								'menu_name'         => _x( 'Categories', 'Admin menu name', 'woocommerce' ),
								'search_items'      => __( 'Search Course Categories', 'woocommerce' ),
								'all_items'         => __( 'All Course Categories', 'woocommerce' ),
								'parent_item'       => __( 'Parent Course Category', 'woocommerce' ),
								'parent_item_colon' => __( 'Parent Course Category:', 'woocommerce' ),
								'edit_item'         => __( 'Edit Course Category', 'woocommerce' ),
								'update_item'       => __( 'Update Course Category', 'woocommerce' ),
								'add_new_item'      => __( 'Add New Course Category', 'woocommerce' ),
								'new_item_name'     => __( 'New Product Course Name', 'woocommerce' )
							),
						'public'              => true,
						'show_ui'               => true,
						'query_var'             => true,

			)
		);
		

		register_taxonomy( 'course_tag',
			apply_filters( 'woocommerce_taxonomy_objects_product_tag', array( 'xcourse' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_tag', array(
				'hierarchical'          => false,
				'update_count_callback' => '_wc_term_recount',
				'label'                 => __( 'Product Tags', 'woocommerce' ),
				'labels'                => array(
						'name'                       => __( 'Course Tags', 'woocommerce' ),
						'singular_name'              => __( 'Course Tag', 'woocommerce' ),
						'menu_name'                  => _x( 'Tags', 'Admin menu name', 'woocommerce' ),
						'search_items'               => __( 'Search Course Tags', 'woocommerce' ),
						'all_items'                  => __( 'All Course Tags', 'woocommerce' ),
						'edit_item'                  => __( 'Edit Course Tag', 'woocommerce' ),
						'update_item'                => __( 'Update Course Tag', 'woocommerce' ),
						'add_new_item'               => __( 'Add New Course Tag', 'woocommerce' ),
						'new_item_name'              => __( 'New Course Tag Name', 'woocommerce' ),
						'popular_items'              => __( 'Popular Course Tags', 'woocommerce' ),
						'separate_items_with_commas' => __( 'Separate Course Tags with commas', 'woocommerce'  ),
						'add_or_remove_items'        => __( 'Add or remove Course Tags', 'woocommerce' ),
						'choose_from_most_used'      => __( 'Choose from the most used Course tags', 'woocommerce' ),
						'not_found'                  => __( 'No Course Tags found', 'woocommerce' ),
					),
				'show_ui'               => true,
				'query_var'             => true,
			) )
		);

	}

	/**
	 * Register core post types
	 */
	public static function register_post_types() {
		if ( post_type_exists('xcourse') ) {
			return;
		}

		register_post_type( 'xcourse',
			array(
				'labels' =>
					array(
						'name' => __('Course' , 'spacex'),
						'singular_name' => __('Course' , 'spacex'),
						'add_new' => __('Add New Course', 'spacex'),
						'add_new_item' => __('Add New Course', 'spacex'),
						'edit_item' => __('Edit Course', 'spacex'),
						'new_item' => __('New Course', 'spacex'),
						'all_items' => __('All Courses', 'spacex'),
						'view_item' => __('View Course', 'spacex'),
						'search_items' => __('Search Courses', 'spacex'),
						'not_found' =>  __('No Courses Found', 'spacex'),
						'not_found_in_trash' => __('No courses found in Trash', 'spacex'),
						'parent_item_colon' => __('', 'spacex'),
						'menu_name' => __('XCourse', 'spacex')
				   ),
					'description'         => __( 'This is where you can add new courses.', 'spacex' ),
					'public'              => true,
					'show_ui'             => true,
					'map_meta_cap'        => true,
					'publicly_queryable'  => true,
					'exclude_from_search' => false,
					'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
					'rewrite'             => array( 'slug' => 'course' ),
					'query_var'           => true,
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
					'has_archive'         => true,
					'show_in_nav_menus'   => true,
					'menu_icon'			  => 'dashicons-welcome-learn-more',
			)
		);
		register_post_type( 'instructor',
			array(
				'labels' =>
					array(
						'name' => __('Instructor' , 'spacex'),
						'singular_name' => __('Instructor' , 'spacex'),
						'add_new' => __('Add New Instructor', 'spacex'),
						'add_new_item' => __('Add New Instructor', 'spacex'),
						'edit_item' => __('Edit Instructor', 'spacex'),
						'new_item' => __('New Instructor', 'spacex'),
						'all_items' => __('All Instructors', 'spacex'),
						'view_item' => __('View Instructor', 'spacex'),
						'search_items' => __('Search Instructors', 'spacex'),
						'not_found' =>  __('No Instructors Found', 'spacex'),
						'not_found_in_trash' => __('No Instructors found in Trash', 'spacex'),
						'parent_item_colon' => __('', 'spacex'),
						'menu_name' => __('Instructor', 'spacex')
				   ),
					'description'         => __( 'This is where you can add new Instructors.', 'spacex' ),
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'page-attributes' ),
					'show_in_nav_menus'   => true,
					'rewrite'             => array( 'slug' => 'instructor' ),
					'public'              => true,
					'has_archive'         => true,
					'show_in_menu'			=> 'edit.php?post_type=xcourse'
			)
		);
		
	}

}

SPACEX_POSTTYPES::init();
