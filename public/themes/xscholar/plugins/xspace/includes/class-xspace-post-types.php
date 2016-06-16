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
class XS_POST_TYPES {

	/**
	 * Hook in methods
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
		add_action( 'init', array( __CLASS__, 'register_post_types' ), 5);
	}

	/**
	 * Register WooCommerce taxonomies.
	 */
	public static function register_taxonomies() {
		if ( taxonomy_exists( 'xgallery-categories' ) ) {
			return;
		}

		register_taxonomy(
			"xgallery-categories",
			array("xgallery"),
			array(
				"hierarchical" => true,
				"label" => __("Categories",'spacex'),
				"singular_label" => __("Category","spacex"),
				'show_in_menu' => 'spacex',
				"rewrite" => true
			)
		);
	

	}

	/**
	 * Register core post types
	 */
	public static function register_post_types() {
		
		register_post_type( 'xslider',
			array(
				'labels' =>
					array(
						'name' => __( 'XSlider' , 'spacex'),
						'singular_name' => __( 'XSlider' , 'spacex')
					),
				'public' => true,
				'has_archive' => false,
				'rewrite' => false,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					//'editor',
					//'author',
					'thumbnail',
					//'post-formats',
					//'excerpt',
					//'comments'
				)
			)
		);
		
		register_post_type( 'xgallery',
			array(
				'labels' =>
					array(
						'name' => __( 'Gallery' , 'spacex'),
						'singular_name' => __( 'Gallery' , 'spacex')
					),
				'public' => true,
				'has_archive' => true,
				'rewrite' => true,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					'editor',
					//'author',
					'thumbnail',
					'post-formats',
					'excerpt',
					//'comments'
				)
			)
		);
		//flush_rewrite_rules();
		
		
		//Team
		/*
		register_post_type( 'team',
			array(
				'labels' =>
					array(
						'name' => __('Team Members' , 'spacex'),
						'singular_name' => __('Team Member' , 'spacex'),
						'add_new' => __('Add New', 'spacex'),
						'add_new_item' => __('Add New Team Member', 'spacex'),
						'edit_item' => __('Edit Team Member', 'spacex'),
						'new_item' => __('New Team Member', 'spacex'),
						'all_items' => __('All Team Members', 'spacex'),
						'view_item' => __('View Team Member', 'spacex'),
						'search_items' => __('Search Team Members', 'spacex'),
						'not_found' =>  __('No team members found', 'spacex'),
						'not_found_in_trash' => __('No team member found in Trash', 'spacex'),
						'parent_item_colon' => __('', 'spacex'),
						'menu_name' => __('Team Members', 'spacex')
				   ),
				'public' => true,
				'has_archive' => false,
				'rewrite' => true,
				'capability_type' => 'page',
				'supports' => array('title',
					'editor',
					//'author',
					'thumbnail',
					//'excerpt',
					//'comments'
					'page-attributes'
				)
			)
		);
		*/
		//Client
		register_post_type( 'client',
			array(
				'labels' =>
					array(
						'name' => __( 'Client' , 'spacex'),
						'singular_name' => __( 'Client' , 'spacex')
					),
				'public' => true,
				'has_archive' => false,
				'rewrite' => true,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					'editor',
					//'author',
					'thumbnail',
					//'post-formats',
					//'excerpt',
					//'comments'
				)
			)
		);
		//Counter
		register_post_type( 'counter',
			array(
				'labels' =>
					array(
						'name' => __( 'Counter' , 'spacex'),
						'singular_name' => __( 'Counter' , 'spacex')
					),
				'public' => true,
				'has_archive' => false,
				'rewrite' => true,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					'editor',
					//'author',
					//'thumbnail',
					//'post-formats',
					//'excerpt',
					//'comments'
				)
			)
		);
		//Benefit
		register_post_type( 'benefit',
			array(
				'labels' =>
					array(
						'name' => __( 'Benefit' , 'spacex'),
						'singular_name' => __( 'Benefit' , 'spacex')
					),
				'public' => true,
				'has_archive' => false,
				'rewrite' => true,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					'editor',
					//'author',
					'thumbnail',
					//'post-formats',
					//'excerpt',
					//'comments'
				)
			)
		);
		//Testimonial
		register_post_type( 'testimonial',
			array(
				'labels' =>
					array(
						'name' => __( 'Testimonial' , 'spacex'),
						'singular_name' => __( 'Testimonial' , 'spacex')
					),
				'public' => true,
				'has_archive' => false,
				'rewrite' => true,
				'show_in_menu' => 'spacex',
				'supports' => array('title',
					'editor',
					//'author',
					'thumbnail',
					//'post-formats',
					//'excerpt',
					//'comments'
				)
			)
		);
		
	}

}

XS_POST_TYPES::init();
