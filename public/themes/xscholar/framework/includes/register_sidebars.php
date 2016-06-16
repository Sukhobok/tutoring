<?php
/**
 * Register Sidebars
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Default Sidebar', 'spacex' ),
			'id' => 'default',
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		/*register_sidebar( array(
			'name' => __( 'Shop Sidebar', 'spacex' ),
			'id' => 'shop-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );*/
		register_sidebar( array(
			'name' => __( '1st Footer Column', 'spacex' ),
			'id' => 'footer_widget1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '2nd Footer Column', 'spacex' ),
			'id' => 'footer_widget2',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '3rd Footer Column', 'spacex' ),
			'id' => 'footer_widget3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '4th Footer Column', 'spacex' ),
			'id' => 'footer_widget4',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '5th Footer Column', 'spacex' ),
			'id' => 'footer_widget5',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '6th Footer Column', 'spacex' ),
			'id' => 'footer_widget6',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => __( '1st Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '2nd Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget2',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '3rd Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '4th Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget4',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '5th Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget5',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( '6th Footer Extra Column', 'spacex' ),
			'id' => 'footer_bottom_widget6',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Page Slide Sidebar', 'spacex' ),
			'id' => 'page_slide_sidebar',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Left Topbar Sidebar', 'spacex' ),
			'id' => 'left_topbar_sidebar',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Right Topbar Sidebar', 'spacex' ),
			'id' => 'right_topbar_sidebar',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Forum Sidebar', 'spacex' ),
			'id' => 'forum_sidebar',			
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		
		$user_sidebars = ot_get_option('tt_user_sidebars');

		if (is_array($user_sidebars))
		{
			foreach ($user_sidebars as $sidebar)
			{
				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => sanitize_title($sidebar['title']),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => "</aside>",
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				) );
			}
		}

		
}		
		