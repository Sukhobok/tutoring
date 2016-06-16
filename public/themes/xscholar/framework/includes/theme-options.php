<?php
/**
 * spacex Theme Options
 *
 * Whole Theme's Settings
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* ---------------------------------------------------------------------- */
/*	Filter Option Tree
/* ---------------------------------------------------------------------- */
function filter_radio_images( $array, $field_id ) {
  
  if ( $field_id == 'tt_sidebar_position') {
  
    $array = array(
		array(
			'value'   => 'nosidebar',
			'label'   => __( 'No Sidebar', 'option-tree' ), 
			'src'     => X_ADMIN_ASSETS . '/images/nosidebar.png'
		),
		array(
			'value'   => 'fullwidth',
			'label'   => __( 'Fullwidth', 'option-tree' ), 
			'src'     => X_ADMIN_ASSETS . '/images/fullwidth.png'
		),
		array(
			'value'   => 'left',
			'label'   => __( 'Left Sidebar', 'option-tree' ),
			'src'     => X_ADMIN_ASSETS . '/images/left-sidebar.png'
		),
		array(
			'value'   => 'right',
			'label'   => __( 'Right Sidebar', 'option-tree' ),
			'src'     => X_ADMIN_ASSETS . '/images/right-sidebar.png'
		)
    );
	
  }
  
  return $array;
  
}
add_filter( 'ot_radio_images', 'filter_radio_images', 10, 2 );


/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
	
	
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
		
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
	
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General',
		'icon'		  => 'fa-cogs'
      ),
      array(
        'id'          => 'tt_styling',
        'title'       => 'Styling',
		'icon'		  => 'fa-adjust'
      ),
	  array(
        'id'          => 'tt_typography',
        'title'       => 'Typography',
		'icon'		  => 'fa-font'
      ),
      array(
        'id'          => 'aveta_blog',
        'title'       => 'Blog',
		'icon'		  => 'fa-align-left'
      ),
      array(
        'id'          => 'tt_header',
        'title'       => 'Header',
		'icon'		  => 'fa-columns'
      ),
      array(
        'id'          => 'tt_footer',
        'title'       => 'Footer',
		'icon'		  => 'fa-columns'
      ),
      array(
        'id'          => 'sidebar',
        'title'       => 'Sidebar',
		'icon'		  => 'fa-bookmark-o'
      ),
	  array(
        'id'          => 'xcourse',
        'title'       => 'XCourse',
		'icon'		  => 'fa-graduation-cap'
      ),
	  array(
        'id'          => 'xevent',
        'title'       => 'XEvent',
		'icon'		  => 'fa-check'
      ),
	  array(
        'id'          => 'popup',
        'title'       => 'Pop Up',
		'icon'		  => 'fa-indent'
      ),
	  array(
        'id'          => 'social',
        'title'       => 'Social',
		'icon'		  => 'fa-share-alt'
      ),
	  array(
        'id'          => 'colorscheme',
        'title'       => 'Color Scheme',
		'icon'		  => 'fa-share-alt'
      ),
	  /*array(
        'id'          => 'importexport',
        'title'       => 'Import/Export',
		'icon'		  => 'fa-refresh'
      ),*/
    ),
    'settings'        => array( 	
	 /*
	 array(
        'id'          => 'tt_responsive',
        'label'       => 'Responsive',
        'desc'        => 'Disable to remove responsive function.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),*/
/* ---------------------------------------------------------------------- */
/*	General Settings
/* ---------------------------------------------------------------------- */
	  array(
		'id'       => 'tt_theme_setting_tab',			
		'label'     => __('Theme Settings', 'spacex'),
		'type'     => 'tab',
		'section'     => 'general',
	),	
	 array(
        'id'          => 'tt_theme_layout',
        'label'       => 'Theme Layout',
        'desc'        => 'Choose the theme layout.',
        'std'         => 'fullwidth',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

        'choices'     => array( 
          array(
            'value'       => 'boxed',
            'label'       => 'Boxed',
            'src'         => ''
          ),
          array(
            'value'       => 'fullwidth',
            'label'       => 'Fullwidth',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'tt_theme_width',
        'label'       => 'Theme Width',
        'desc'        => 'Set theme width for desktop (default is 1200px)',
        'std'         => '1200px',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'tt_favicon',
        'label'       => 'Favicon',
        'desc'        => 'Choose image to upload favicon (you would choose file with .ico or .png)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),

	  array(
        'id'          => 'tt_preload_icon',
        'label'       => 'Preload Icon',
        'desc'        => 'Set icon for preload theme (overide woocommerce ajax loader icon).',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	 
	  
      array(
        'id'          => 'tt_site_sidebar',
        'label'       => 'Site Sidebar',
        'desc'        => 'This settings will determine page structure in all regular pages and posts. This option can be overwritten by a single pages and posts.',
        'std'         => 'fullwidth',
        'type'        => 'radio-image',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'choices'		=> array(
			array(
				'value'   => 'fullwidth',
				'label'   => __( 'Fullwidth', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/fullwidth.png'
			),
			array(
				'value'   => 'left',
				'label'   => __( 'Left Sidebar', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/left-sidebar.png'
			),
			array(
				'value'   => 'right',
				'label'   => __( 'Right Sidebar', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/right-sidebar.png'
			)
		),

      ),
	  array(
        'id'          => 'tt_switch_style',
        'label'       => 'Switcher',
        'desc'        => 'Disable to hide switcher style.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'general',
      ),
	  
	array(
		'id'       => 'tt_page_header_tab',			
		'label'     => __('Page Header', 'spacex'),
		'type'     => 'tab',
		'section'     => 'general',
		'std'	=> '#fff',
	),	
	array(
			'id'       => 'tt_page_header_type',			
			'label'     => __('Page Header Type', 'spacex'),
			'desc' => 'Choose page header style for whole site.',
			'class' => 'page-header-type',
			'type'     => 'radio_image',
			'std'	=> 'center',
			'section'     => 'general',
			'choices' => array(
				array(
					'value'   => 'no',
					'label'   => __( 'No Page Header', 'option-tree' ), 
					'src'     => X_ADMIN_ASSETS . '/images/no-page-title.png'
				),
				array(
					'value'   => 'bothside',
					'label'   => __( 'Page Title', 'option-tree' ),
					'src'     => X_ADMIN_ASSETS . '/images/page-title-bothside.png'
				),
				array(
					'value'   => 'center',
					'label'   => __( 'Fancy', 'option-tree' ),
					'src'     => X_ADMIN_ASSETS . '/images/page-title-center.png'
				),
				array(
					'value'   => 'left',
					'label'   => __( 'Fancy', 'option-tree' ),
					'src'     => X_ADMIN_ASSETS . '/images/page-title-left.png'
				),
			),
			
	),
	array(
			'id'       => 'tt_page_header_design',			
			'label'     => __('Design', 'spacex'),
			'desc' => '',
			'class' => '',
			'type'     => 'design',
			'section'     => 'general',
	),
	
	array(
		'id'       => 'tt_hero_tab',			
		'label'     => __('Hero Banner', 'spacex'),
		'type'     => 'tab',
		'section'     => 'general',
		'std'	=> '#fff',
	),
	array(
        'id'          => 'tt_hero',
        'label'       => 'Hero Banner',
        'desc'        => 'Enable to display hero banner.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        	
      ),
	  array(
        'id'          => 'tt_hero_homepage',
        'label'       => 'Hero Homepage',
        'desc'        => 'Enable to display hero banner on front page.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        	
      ),
	  
	   array(
				'id'       => 'tt_hero_type',			
				'label'     => __('Type', 'spacex'),
				'desc' => '',
				'type'     => 'select',
				'section'     => 'general',
				'std'	=> 'image',
				'condition' => 'tt_hero:is(true)',
				'choices' => array(
					array(
						'value'       => 'image',
						'label'       => 'Image',
						'src'         => ''
					  ),
					  array(
						'value'       => 'slider',
						'label'       => 'Slider',
						'src'         => ''
					  ),

				),
				
			),
			 array(
				'id'       => 'tt_hero_slider',			
				'label'     => __('Slider', 'spacex'),
				'desc' => '',
				'type'     => 'list-item',
				'section'     => 'general',
				'std'	=> '',
				'condition' => 'tt_hero_type:is(slider)',
				'settings'    => array( 
				  array(
					'id'          => 'slide_src',
					'label'       => 'Slide Image',
					'desc'        => '',
					'std'         => '',
					'type'        => 'upload',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				  array(
					'id'          => 'slide_link',
					'label'       => 'URL',
					'desc'        => 'Link to this url when click image.',
					'std'         => '',
					'type'        => 'upload',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				  array(
					'id'          => 'slide_content',
					'label'       => 'Content',
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				  
				)	
				
			),
	 


	 	 array(
				'id'       => 'tt_hero_bg_image',			
				'label'     => __('Image', 'spacex'),
				'desc' => '',
				'type'     => 'upload',
				'section'     => 'general',
				'std'	=> '',
				'condition' => 'tt_hero_type:is(image)',
				
			),
			array(
				'id'       => 'tt_hero_url',			
				'label'     => __('URL', 'spacex'),
				'desc' => '',
				'type'     => 'text',
				'section'     => 'general',
				'std'	=> '',
				'condition' => 'tt_hero_type:is(image)',

				
			),
			 array(
				'id'       => 'tt_hero_slider',			
				'label'     => __('Slider', 'spacex'),
				'desc' => '',
				'type'     => 'list-item',
				'section'     => 'general',
				'std'	=> '',
				'condition' => 'tt_hero_type:is(slider)',
				'settings'    => array( 
				  array(
					'id'          => 'slide_src',
					'label'       => 'Slide Image',
					'desc'        => '',
					'std'         => '',
					'type'        => 'upload',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				  array(
					'id'          => 'slide_link',
					'label'       => 'URL',
					'desc'        => 'Link to this url when click image.',
					'std'         => '',
					'type'        => 'upload',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				   array(
					'id'          => 'slide_content',
					'label'       => 'Content',
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => ''
				  ),
				  
				)	
				
			),
		 array(
				'id'       => 'tt_hero_bg_color',			
				'label'     => __('Background Color', 'spacex'),
				'desc' => '',
				'type'     => 'colorpicker',
				'section'     => 'general',
				'std'	=> '',
				'condition' => 'tt_hero:is(true)',
				
			),	
			
			array(
				'id'       => 'tt_hero_padding_height',			
				'label'     => __('Height', 'spacex'),
				'desc' => 'Leave blank to make height auto.',
				'type'     => 'text',
				'section'     => 'general',
				'condition' => 'tt_hero:is(true)',
				
			),	
		array(
			'id'       => 'tt_hero_overlay',			
			'label'     => __('Overlay Color', 'spacex'),
			'desc' => '',
			'type'     => 'colorpicker',
			'section'     => 'general',
			'std'	=> '',
			'class' => 'ot-colorpicker-opacity',
			'condition' => 'tt_hero:is(true)',
			
		),	

/* ---------------------------------------------------------------------- */
/*	Styling Settings
/* ---------------------------------------------------------------------- */	 

      array(
        'id'          => 'tt_background',
        'label'       => 'Background',
        'desc'        => 'Set the background for whole theme.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'tt_styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
     
       array(
        'id'          => 'tt_color_scheme',
        'label'       => 'Scheme Color',
        'desc'        => 'Choose scheme color for whole theme.',
        'std'         => '#5fcf80',
        'type'        => 'scheme',
        'section'     => 'tt_styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

		'choices' => array(
							array(
								'value'       => '#1abc9c',
							  ),
							  array(
								'value'       => '#16a085',
							  ),
							   array(
								'value'       => '#5fcf80',
							  ),
							  array(
								'value'       => '#5cb860',
							  ),
							  array(
								'value'       => '#39add1',
							  ),
							  array(
								'value'       => '#2980b9',
							  ),
							  array(
								'value'       => '#9b59b6',
							  ),
							  array(
								'value'       => '#8e44ad',
							  ),
							  array(
								'value'       => '#34495e',
							  ),
							  array(
								'value'       => '#2c3e50',
							  ),
							  array(
								'value'       => '#f1c40f',
							  ),
							  array(
								'value'       => '#f39c12',
							  ),
							   array(
								'value'       => '#e67e22',
							  ),
							   array(
								'value'       => '#d35400',
							  ),
							   array(
								'value'       => '#e15258',
							  ),
							  array(
								'value'       => '#c84045',
							  ),
							  array(
								'value'       => '#ecf0f1',
							  ),
							  array(
								'value'       => '#bdc3c7',
							  ),
							  array(
								'value'       => '#95a5a6',
							  ),
							  array(
								'value'       => '#7f8c8d',
							  ),
						),
		),	
      array(
        'id'          => 'tt_custom_color_scheme',
        'label'       => 'Custom Color Scheme',
        'desc'        => 'Select the color to make your own scheme for your website.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'tt_styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tt_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Add custom CSS to your website.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'tt_styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
/* ---------------------------------------------------------------------- */
/*	Typography Settings
/* ---------------------------------------------------------------------- */	  
	   array(
        'id'          => 'tt_content_font',
        'label'       => 'Content Font',
        'desc'        => 'Font for all main content.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tt_heading_font',
        'label'       => 'Heading Font Family',
        'desc'        => 'Font family for all the heading.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	  array(
        'id'          => 'tt_heading_1',
        'label'       => 'H1',
        'desc'        => 'Set font size for H1 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_heading_2',
        'label'       => 'H2',
        'desc'        => 'Set font size for H2 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_heading_3',
        'label'       => 'H3',
        'desc'        => 'Set font size for H3 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_heading_4',
        'label'       => 'H4',
        'desc'        => 'Set font size for H4 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_heading_5',
        'label'       => 'H5',
        'desc'        => 'Set font size for H5 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_heading_6',
        'label'       => 'H6',
        'desc'        => 'Set font size for H6 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'tt_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
/* ---------------------------------------------------------------------- */
/*	Blog
/* ---------------------------------------------------------------------- */	  
	  array(
        'id'          => 'tt_blog_title',
        'label'       => 'Blog Title',
        'desc'        => 'Set the title for Blog page.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'tt_post_share',
        'label'       => 'Post Share',
        'desc'        => 'Post share are enabled by default. Check this box to disable sharing on all blog posts.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      
      ),	
      array(
        'id'          => 'tt_blog_post_excerpt',
        'label'       => 'Blog Post Excerpt',
        'desc'        => 'The post excerpt will display as default. Check this to disable this functionality and hidden post excerpt.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'tt_blog_post_excerpt_link',
        'label'       => 'Blog Post Excerpt Link Text',
        'desc'        => 'Enter the text for the link that will lead to the full blog post.
This functionality will be ignored if displaying the full blog post.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
     /* array(
        'id'          => 'tt_blog_animation_speed',
        'label'       => 'Blog Gallery Animation Speed',
        'desc'        => 'This number represents how fast your slides will animate.',
        'std'         => '500',
        'type'        => 'text',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tt_blog_effect',
        'label'       => 'Blog Gallery Effect',
        'desc'        => 'This select will affect your slider effect.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => 'Fade',
            'src'         => ''
          ),
          array(
            'value'       => 'slide',
            'label'       => 'Slide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'tt_blog_autoplay',
        'label'       => 'Blog Gallery Autoplay',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'True',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'False',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'tt_blog_pause',
        'label'       => 'Blog Gallery Pause on Hover',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'True',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'False',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'tt_blog_navigation',
        'label'       => 'Blog Gallery Navigation Arrow',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'aveta_blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'True',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'False',
            'src'         => ''
          )
        ),
      ),*/
/* ---------------------------------------------------------------------- */
/*	Header Settings
/* ---------------------------------------------------------------------- */	  
 array(
		'id'       => 'tt_header_setting_tab',			
		'label'     => __('Header Options', 'spacex'),
		'type'     => 'tab',
		'section'     => 'tt_header',
	),	
	
	array(
        'id'          => 'tt_header_type',
        'label'       => 'Header Type',
        'desc'        => 'Choose One of This Header Type',
        'std'         => 'dark',
        'type'        => 'select',
        'section'     => 'tt_header',
		'choices'     => array( 
          array(
            'value'       => 'dark',
            'label'       => 'Dark Style',
            'src'         => ''
          ),
		  array(
            'value'       => 'white',
            'label'       => 'White',
            'src'         => ''
          ),
		    array(
            'value'       => 'classic',
            'label'       => 'Classic',
            'src'         => ''
          ),
		  array(
            'value'       => 'transparent',
            'label'       => 'Transparent',
            'src'         => ''
          ),
		 
        ),
      ),
	  array(
        'id'          => 'tt_header_design',
        'label'       => 'Design',
        'desc'        => 'Choose One of This Header Type',
        'std'         => '',
        'type'        => 'design',
        'section'     => 'tt_header',
	),	
	   array(
        'id'          => 'tt_logo_type',
        'label'       => 'Logo',
        'desc'        => 'Choose an image to upload logo.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'tt_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Logo',
		 'choices'     => array( 
		  array(
            'value'       => 'text',
            'label'       => 'Text Logo',
            'src'         => ''
          ),
          array(
            'value'       => 'image',
            'label'       => 'Image',
            'src'         => ''
          ),
		  
        ),
      ),  
	   array(
        'id'          => 'tt_logo_text',
        'label'       => 'Logo Text',
        'desc'        => 'Type text for logo.',
        'std'         => 'SCHOLAR',
        'type'        => 'text',
        'section'     => 'tt_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Logo',
		'condition' => 'tt_logo_type:is(text)',			
      ),  
	  array(
        'id'          => 'tt_logo_image',
        'label'       => 'Logo Image',
        'desc'        => 'Choose an image to upload logo.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'tt_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
		'group'       => 'Logo',	
		'condition' => 'tt_logo_type:is(image)',				
        'class'       => ''
      ),
	  
     

	  array(
        'id'          => 'tt_header_topbar',
        'label'       => 'Top Bar',
        'desc'        => 'Enable to display top bar.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'tt_header',
		'group'     => 'Top Bar',
      ),
	  array(
        'id'          => 'tt_topbar_design',
        'label'       => 'Design',
        'desc'        => '',
        'std'         => '',
        'type'        => 'design',
        'section'     => 'tt_header',
		'group'     => 'Top Bar',
		'condition' => 'tt_header_topbar:is(true)',	

      ),
	  
	  array(
        'id'          => 'tt_header_cart_icon',
        'label'       => 'Mini Cart Icon',
        'desc'        => 'Shopping bag icon for mini cart on header',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'tt_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_header_cart_type:is(bag)',	
      ),
	 array(
		'id'       => 'tt_header_sticky_setting_tab',			
		'label'     => __('Sticky Menu', 'spacex'),
		'type'     => 'tab',
		'section'     => 'tt_header',
	),	
	  array(
        'id'          => 'tt_header_sticky_menu',
        'label'       => 'Sticky Menu',
        'desc'        => 'Disable to hide Sticky Header',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ),
	  array(
        'id'          => 'tt_header_sticky_type',
        'label'       => 'Sticky Type',
        'desc'        => 'Black or White',
        'std'         => 'white',
        'type'        => 'select',
        'section'     => 'tt_header',
		'choices'     => array( 
		  array(
            'value'       => 'black',
            'label'       => 'Black',
            'src'         => ''
          ),
          array(
            'value'       => 'white',
            'label'       => 'White',
            'src'         => ''
          ),
		  )
      ),
	   array(
        'id'          => 'tt_header_sticky_logo',
        'label'       => 'Sticky Logo',
        'desc'        => 'Choose image display as logo in sticky menu',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'tt_header',
      ),
	   array(
        'id'          => 'tt_header_sticky_search',
        'label'       => 'Search',
        'desc'        => 'Enable to display search on sticky nav.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ),
	  array(
        'id'          => 'tt_header_sticky_cart',
        'label'       => 'Mini Cart',
        'desc'        => 'Enable to display mini cart on sticky nav.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ),
	  array(
		'id'       => 'tt_header_widget_setting_tab',			
		'label'     => __('Widget', 'spacex'),
		'type'     => 'tab',
		'section'     => 'tt_header',
	  ),	
	  array(
        'id'          => 'tt_header_text',
        'label'       => 'Header Text Widget',
        'desc'        => 'Enable to display header text widget',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ),
	  array(
        'id'          => 'tt_header_text_widget',
        'label'       => 'Header text widget content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'tt_header',
		'settings'    => array( 
				  array(
					'id'          => 'description',
					'label'       => 'Description',
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
				  ),
				  array(
					'id'          => 'icon',
					'label'       => 'Icon',
					'desc'        => '',
					'std'         => '',
					'type'        => 'icon',
					'choices' => spacex_config_icons(),
				  ),
				  
				)	
      ),
	 
	  array(
        'id'          => 'tt_header_user_manager',
        'label'       => 'Login Button',
        'desc'        => 'Enable to display header login button and user button after logged in.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ), 	
	  array(
        'id'          => 'tt_menu_search',
        'label'       => 'Menu Search Button',
        'desc'        => 'Enable to display button search on main menu',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ), 	
	  array(
        'id'          => 'tt_page_side_trigger',
        'label'       => 'Page Slide Button',
        'desc'        => 'Enable to display page slide menu button on main menu',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'tt_header',
      ), 
	 
	  array(
        'id'          => 'tt_header_cart_type',
        'label'       => 'Mini Cart Display',
        'desc'        => 'Choose the way to display mini cart. You have to delete cookie after saving this option.',
        'std'         => 'default',
        'type'        => 'select',
        'section'     => 'tt_header',
		'choices'     => array( 
		 array(
            'value'       => 'default',
            'label'       => 'Default (Cart Icon -Text)',
            'src'         => ''
          ),
          array(
            'value'       => 'bag',
            'label'       => 'Image - Cart Count',
            'src'         => ''
          ),

        ),
      ),
	 
		
	 

	  array(
        'id'          => 'x_footer_columns',
        'label'       => 'Footer Columns',
        'desc'        => 'Select the number of columns you would like to display in the footer.',
        'std'         => '3',
        'type'        => 'radio_image',
        'section'     => 'tt_footer',
		'group'		  => 'Footer',			
        'choices'     => array( 
          array(
				'value'   => 'no',
				'label'   => __( 'No Page Header', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/footer_no.png'
			),
			array(
				'value'   => '1',
				'label'   => __( '1 Column', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1.png'
			),
			array(
				'value'   => '2',
				'label'   => __( '2 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_2.png'
			),
			array(
				'value'   => '3',
				'label'   => __( '3 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_3.png'
			),
			array(
				'value'   => '4',
				'label'   => __( '4 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_4.png'
			),
			array(
				'value'   => '1323',
				'label'   => __( '1/3 2/3', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1323.png'
			),
			array(
				'value'   => '2313',
				'label'   => __( '2/3 1/3', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_2313.png'
			),
			array(
				'value'   => '1434',
				'label'   => __( '1/4 3/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1434.png'
			),
			array(
				'value'   => '3414',
				'label'   => __( '3/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_3414.png'
			),
			array(
				'value'   => '141424',
				'label'   => __( '1/4 1/4 2/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_141424.png'
			),
			array(
				'value'   => '142414',
				'label'   => __( '1/4 2/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_142414.png'
			),
			array(
				'value'   => '241414',
				'label'   => __( '2/4 1/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
			array(
				'value'   => '5',
				'label'   => __( '5', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
			array(
				'value'   => '6',
				'label'   => __( '6', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
        ),
      ),

	 array(
        'id'          => 'x_footer_type',
        'label'       => 'Footer Type',
        'desc'        => '',
        'std'         => 'dark',
        'type'        => 'select',
        'section'     => 'tt_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'Footer',			
		  'choices'     => array( 
			  array(
				'value'       => 'dark',
				'label'       => 'Dark',
				'src'         => ''
			  ),
			   array(
				'value'       => 'white',
				'label'       => 'White',
				'src'         => ''
			  ),
			),
		  ), 
	array(
		'id'          => 'x_footer_intro',
		'label'       => 'Footer Intro',
		'desc'        => 'Display footer intro content',
		'std'         => 'false',
		'type'        => 'select',
		'section'     => 'tt_footer',
		'group'		  => 'Footer',	
					

	  'choices'     => array( 
			  array(
				'value'       => 'false',
				'label'       => 'None',
				'src'         => ''
			  ),
			  array(
				'value'       => 'left',
				'label'       => 'Left',
				'src'         => ''
			  ),
			  array(
				'value'       => 'right',
				'label'       => 'Right',
				'src'         => ''
			  ),
			),
		  ),
	array(
		'id'          => 'x_footer_intro_content',
		'label'       => 'Intro Content',
		'desc'        => '',
		'std'         => '',
		'type'        => 'textarea',
		'section'     => 'tt_footer',
		'group'		  => 'Footer',	
		'condition' => 'x_footer_intro:is(true)',			

	),
	
	  
	 
	
	
	array(
        'id'          => 'tt_footer_extra',
        'label'       => 'Position',
        'desc'        => 'Choose position to display footer extra',
        'std'         => 'false',
        'type'        => 'select',
        'section'     => 'tt_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'Footer Extra',
		'choices'     => array( 
			  array(
				'value'       => 'false',
				'label'       => 'None',
				'src'         => ''
			  ),
			  array(
				'value'       => 'top',
				'label'       => 'Top of Footer',
				'src'         => ''
			  ),
			  array(
				'value'       => 'bottom',
				'label'       => 'Bottom of Footer',
				'src'         => ''
			  ),
			),
					
		  ),
	 array(
        'id'          => 'tt_footer_extra_column',
        'label'       => 'Columns',
        'desc'        => 'Select the number of columns you would like to display in the footer.',
        'std'         => '3',
        'type'        => 'radio_image',
        'section'     => 'tt_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'Footer Extra',				
        'choices'     => array( 
          array(
				'value'   => 'no',
				'label'   => __( 'No Page Header', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/footer_no.png'
			),
			array(
				'value'   => '1',
				'label'   => __( '1 Column', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1.png'
			),
			array(
				'value'   => '2',
				'label'   => __( '2 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_2.png'
			),
			array(
				'value'   => '3',
				'label'   => __( '3 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_3.png'
			),
			array(
				'value'   => '4',
				'label'   => __( '4 Columns', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_4.png'
			),
			array(
				'value'   => '1323',
				'label'   => __( '1/3 2/3', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1323.png'
			),
			array(
				'value'   => '2313',
				'label'   => __( '2/3 1/3', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_2313.png'
			),
			array(
				'value'   => '1434',
				'label'   => __( '1/4 3/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_1434.png'
			),
			array(
				'value'   => '3414',
				'label'   => __( '3/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_3414.png'
			),
			array(
				'value'   => '141424',
				'label'   => __( '1/4 1/4 2/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_141424.png'
			),
			array(
				'value'   => '142414',
				'label'   => __( '1/4 2/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_142414.png'
			),
			array(
				'value'   => '241414',
				'label'   => __( '2/4 1/4 1/4', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
			array(
				'value'   => '5',
				'label'   => __( '5', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
			array(
				'value'   => '6',
				'label'   => __( '6', 'option-tree' ),
				'src'     => X_ADMIN_ASSETS . '/images/footer_241414.png'
			),
        ),
      ),
	  	array(
        'id'          => 'tt_footer_extra_design',
        'label'       => 'Design',
        'desc'        => '',
        'std'         => '',
        'type'        => 'design',
		'group'		=> 'Footer Extra',
        'section'     => 'tt_footer',
		),	
	   array(
        'id'          => 'x_footer_design',
        'label'       => 'Design',
        'desc'        => '',
        'std'         => '',
        'type'        => 'design',
        'section'     => 'tt_footer',
	),	
	array(
        'id'          => 'x_footer_credit',
        'label'       => 'Footer Credit',
        'desc'        => '',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'tt_footer',
	),	
	array(
        'id'          => 'x_footer_copyright',
        'label'       => 'Copyright',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'tt_footer',
	),
	array(
        'id'          => 'x_footer_social',
        'label'       => 'Social Icons',
        'desc'        => 'Display social icons next to copyright',
        'std'         => '',
        'type'        => 'switch',
        'section'     => 'tt_footer',
	),	

	   array(
        'id'          => 'tt_site_sidebar_type',
        'label'       => 'Sidebar Widget Display',
        'desc'        => 'Set sidebar widget display type.',
        'std'         => 'clean',
        'type'        => 'select',
        'section'     => 'sidebar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'choices' => array(
					array(
						'value'       => 'clean',
						'label'       => 'Clean (Default)',
						'src'         => ''
					  ),
					  array(
						'value'       => 'border',
						'label'       => 'Border',
						'src'         => ''
					  ),
					   array(
						'value'       => 'background',
						'label'       => 'Background',
						'src'         => ''
					  ),
					   array(
						'value'       => 'boxed',
						'label'       => 'Boxed',
						'src'         => ''
					  ),
				),

      ),	  	
      array(
        'id'          => 'tt_user_sidebars',
        'label'       => 'Sidebar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'sidebar_description',
            'label'       => 'Sidebar Description',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => ''
          )
        )
      ),

	  array(
        'id'          => 'tt_product_column',
        'label'       => 'Column',
        'desc'        => 'Choose column to display product in a row',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'xcourse',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'choices'     => array( 
          array(
            'value'       => '4',
            'label'       => 'Default',
            'src'         => ''
          ),
		  array(
            'value'       => '6',
            'label'       => '6 Columns',
            'src'         => ''
          ),
		  array(
            'value'       => '5',
            'label'       => '5 Columns',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4 Columns',
            'src'         => ''
          ),
		   array(
            'value'       => '3',
            'label'       => '3 Columns',
            'src'         => ''
          ),
		   array(
            'value'       => '2',
            'label'       => '2 Columns',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'course_catalog',
        'label'       => 'Catalog Size',
        'desc'        => 'Set catalog image size.',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xcourse',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	  array(
        'id'          => 'course_single',
        'label'       => 'Single Size',
        'desc'        => 'Set single course image size',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xcourse',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	  array(
        'id'          => 'course_thumbnail',
        'label'       => 'Thumbnail Size',
        'desc'        => 'Set thumbnail course size',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xcourse',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	   array(
        'id'          => 'courses_per_page',
        'label'       => 'Number of Post',
        'desc'        => 'Number courses display in archive per page.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'xcourse',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	 array(
        'id'          => 'event_catalog',
        'label'       => 'Catalog Size',
        'desc'        => 'Set catalog image size.',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xevent',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	  array(
        'id'          => 'event_single',
        'label'       => 'Single Size',
        'desc'        => 'Set single event image size',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xevent',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	  array(
        'id'          => 'event_thumbnail',
        'label'       => 'Thumbnail Size',
        'desc'        => 'Set thumbnail event size',
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'xevent',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Image Size',
      ),
	   array(
        'id'          => 'events_per_page',
        'label'       => 'Number of Post',
        'desc'        => 'Number events display in archive per page.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'xevent',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	/*  array(
        'id'          => 'tt_product_action',
        'label'       => 'Product Action',
        'desc'        => 'Choose the way to display action button.',
        'std'         => 'default',
        'type'        => 'radio_image',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'choices'	=> array(
			array(
				'value'   => 'default',
				'label'   => __( 'No Sidebar', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/action_default.png'
			),
			array(
				'value'   => 'megashop',
				'label'   => __( 'Fullwidth', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/action_complex.png'
			),
			array(
				'value'   => 'diamond',
				'label'   => __( 'Fullwidth', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/action_diamond.png'
			),
			array(
				'value'   => 'tech',
				'label'   => __( 'Fullwidth', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/action_tech.png'
			),
			array(
				'value'   => 'block',
				'label'   => __( 'Fullwidth', 'option-tree' ), 
				'src'     => X_ADMIN_ASSETS . '/images/action_tech.png'
			),
		)
       
      ),*/
/*	  array(
        'id'          => 'tt_product_progress_purchase',
        'label'       => 'Progress Purchase Bar',
        'desc'        => 'Enable to display progress purchase bar instead of classic page header. (Only for cart and check out page.)',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),*/
	   
	/*  array(
        'id'          => 'tt_wishlist_page',
        'label'       => 'Wishlist Page',
        'desc'        => 'Choose page to display wishlist products.',
        'std'         => '0',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'wishlist',
		'choices'     => spacex_themeoptions_dropdown_pages(),
      ),
	 
	   array(
        'id'          => 'tt_wishlist_price_show',
        'label'       => 'Price Show',
        'desc'        => 'Enable to show price in wishlist page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'wishlist',
		
       ),
	   array(
        'id'          => 'tt_wishlist_stock_show',
        'label'       => 'Stock Show',
        'desc'        => 'Enable to show stock in wishlist page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'wishlist',
		
       ),
	   array(
        'id'          => 'tt_wishlist_addtocart_show',
        'label'       => 'Add to cart Button',
        'desc'        => 'Enable to show add to cart button in wishlist page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'wishlist',
		
       ),
	   array(
        'id'          => 'tt_compare_page',
        'label'       => 'Compare Page',
        'desc'        => 'Choose page to display compared products.',
        'std'         => '0',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'compare',
		'choices'     => spacex_themeoptions_dropdown_pages(),
      ),
	
	   array(
        'id'          => 'tt_compare_price_show',
        'label'       => 'Price Show',
        'desc'        => 'Enable to show price in compare page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'compare',
		
       ),
	   array(
        'id'          => 'tt_compare_stock_show',
        'label'       => 'Stock Show',
        'desc'        => 'Enable to show stock in compare page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'compare',
		
       ),
	   array(
        'id'          => 'tt_compare_addtocart_show',
        'label'       => 'Add to cart Button',
        'desc'        => 'Enable to show add to cart button in compare page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'		  => 'compare'
		
       ),*/
	
	/*	array(
        'id'          => 'tt_use_cookie',
        'label'       => 'Use Cookie',
        'desc'        => 'Enable to use cookie for wishlist and compare in 30 days. Session will be used if this get disable.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

		
       ),

	   array(
        'id'          => 'tt_product_action_cart',
        'label'       => 'Add to cart',
        'desc'        => 'Disable to hide add to add to cart button in catalog mode.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',

      ),
	  array(
        'id'          => 'tt_product_action_wishlist',
        'label'       => 'Wishlist',
        'desc'        => 'Disable to hide add to wishlist button in catalog mode.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',

      ),
	   array(
        'id'          => 'tt_product_action_compare',
        'label'       => 'Compare',
        'desc'        => 'Disable to hide compare button in catalog mode.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
      ),
	  array(
        'id'          => 'tt_product_action_detail',
        'label'       => 'Sharing',
        'desc'        => 'Disable to hide detail button in catalog mode.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
      ),
	
	   array(
        'id'          => 'tt_catalog_rating',
        'label'       => 'Rating',
        'desc'        => 'Disable to Hide Rating Star.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_catalog_category',
        'label'       => 'Category',
        'desc'        => 'Disable to Hide Category Name.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_catalog_sale',
        'label'       => 'Sale Flash',
        'desc'        => 'Disable to Hide Sale Badges.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'catalog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),*/

	/* array(
        'id'          => 'tt_product_single_breadcrumb',
        'label'       => 'Breadcrumb',
        'desc'        => 'Disable to hide breadcrumb in single product page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        	
      ),

        	
	   array(
        'id'          => 'tt_product_single_featured',
        'label'       => 'Featured Products',
        'desc'        => 'Display featured product in single product page (on the right side)',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        	
      ),
	   array(
        'id'          => 'tt_product_single_sidebar_position',
        'label'       => 'Sidebar Underneath', 
        'desc'        => 'Sidebar goes under product detail instead of the default.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        	
      ),
	   array(
        'id'          => 'tt_product_single_sidebar',
        'label'       => 'Sidebar', 
        'desc'        => 'Sidebar goes under product detail instead of the default.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'choices' => spacex_get_list_sidebars(),
		'dependence' => array(
											'key' => 'tt_product_single_sidebar_position',
											'value' => 'true',
											'assign' => 'equal', //unequal	
				),			
        ),
	  
	  array(
        'id'          => 'tt_product_single_display',
        'label'       => 'Style',
        'desc'        => 'Choose type of the display content in single product page',
        'std'         => 'true',
        'type'        => 'select',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        		'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Default',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => 'Thumbnail Next To Single Product Image',
            'src'         => ''
          ),
		  array(
            'value'       => '3',
            'label'       => 'Thumbnail Over Single Product Image',
            'src'         => ''
          ), 

        ),
      ),
	   array(
        'id'          => 'tt_product_single_action',
        'label'       => 'Action Button',
        'desc'        => 'Choose type of the display action button (wishlist, compare)',
        'std'         => 'icon',
        'type'        => 'select',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        		'choices'     => array( 
          array(
            'value'       => 'icon',
            'label'       => 'Icon(Default)',
            'src'         => ''
          ),
		  array(
            'value'       => 'text',
            'label'       => 'Text',
            'src'         => ''
          ),
		  array(
            'value'       => 'mix',
            'label'       => 'Mix',
            'src'         => ''
          ),

        ),
      ),
	  	   array(
        'id'          => 'tt_single_product_action_addtocart',
        'label'       => 'Add to cart',
        'desc'        => 'Disable to hide add to add to cart button in single product page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
		'choices'  => array(
					array(
						'on_label'  => 'Enable',
						'off_label'  => 'Disable',
					),
				),
      ),
	  array(
        'id'          => 'tt_single_product_action_wishlist',
        'label'       => 'Wishlist',
        'desc'        => 'Disable to hide add to wishlist button in single product page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
		'choices'  => array(
					array(
						'on_label'  => 'Enable',
						'off_label'  => 'Disable',
					),
				),
      ),
	   array(
        'id'          => 'tt_single_product_action_compare',
        'label'       => 'Compare',
        'desc'        => 'Disable to hide compare button in single product page.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
		'choices'  => array(
					array(
						'on_label'  => 'Enable',
						'off_label'  => 'Disable',
					),
				),
      ),
	  array(
        'id'          => 'tt_single_product_action_detail',
        'label'       => 'Detail',
        'desc'        => 'Disable to hide detail button in single product.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'product action button',
		'choices'  => array(
					array(
						'on_label'  => 'Enable',
						'off_label'  => 'Disable',
					),
				),
      ),
	  array(
        'id'          => 'tt_product_zoom',
        'label'       => 'Product Zoom',
        'desc'        => 'Disable to turn off zoom function.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Product Zoom',

      ),
	  array(
        'id'          => 'tt_product_zoom_responsive',
        'label'       => 'Inner Zoom',
        'desc'        => 'Enable this to zoom inner image instead of zoom window on right side of the image.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'group'       => 'Product Zoom',

      ),
	  array(
        'id'          => 'tt_product_rating',
        'label'       => 'Rating',
        'desc'        => 'Disable to hide rating from product.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_product_sale_flash',
        'label'       => 'Sale Flash',
        'desc'        => 'Disable to hide sale badge from product.',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'tt_product_sharing',
        'label'       => 'Disable to hide sharing social icons.',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'switch',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),*/
	  	  array(
        'id'          => 'tt_pop_up',
        'label'       => 'Pop up',
        'desc'        => 'Enable to display pop up in first load of page.',
        'std'         => 'false',
        'type'        => 'switch',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	  array(
        'id'          => 'tt_pop_up_background',
        'label'       => 'Background',
        'desc'        => 'Pop up background',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',
	

      ),
	   array(
        'id'          => 'tt_pop_up_color',
        'label'       => 'Text Color',
        'desc'        => 'Text color',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',	

      ),
	  array(
        'id'          => 'tt_pop_up_width',
        'label'       => 'Width',
        'desc'        => 'Pop up width. Leave this blank for width auto.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',

      ),
	   array(
        'id'          => 'tt_pop_up_height',
        'label'       => 'Height',
        'desc'        => 'Pop up height. Leave this blank for height auto.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',

      ),
	   array(
        'id'          => 'tt_pop_up_donot',
        'label'       => 'Do not show checkbox text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',

      ),
	   array(
        'id'          => 'tt_pop_up_banner',
        'label'       => 'Banner',
        'desc'        => 'Pop up banner',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',

      ),
	   array(
        'id'          => 'tt_pop_up_text',
        'label'       => 'Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'popup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition' => 'tt_pop_up:is(true)',

      ),
	   array(
        'id'          => 'tt_social_links',
        'label'       => 'Social Icons',
        'desc'        => '',
        'type' => 'social-links',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	   array(
        'id'          => 'x_color_scheme',
        'label'       => 'Color Scheme',
        'desc'        => '',
        'type' => 	'color-scheme',
        'section'     => 'colorscheme',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	 /* array(
        'id'          => 'x_import',
        'label'       => 'Import Data',
        'desc'        => '',
        'type' => 	'import-data',
        'section'     => 'importexport',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	   array(
        'id'          => 'x_export',
        'label'       => 'Export Data',
        'desc'        => '',
        'type' => 	'export-data',
        'section'     => 'importexport',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',

      ),
	*/

	  /* array(
        'id'          => 'tt_product_share',
        'label'       => 'Product Sharing',
        'desc'        => 'Product share are enabled by default. Check this box to disable sharing on all product.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'product',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Disable Sharing Product',
            'src'         => ''
          )
        ),
      ),	*/
	  
			
			
	  
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}