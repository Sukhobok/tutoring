<?php
/**
 * spacex Metaboxes
 *
 * Functions for Metaboxes.
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


global $meta_boxes;

$meta_boxes = array();

/* ---------------------------------------------------------------------- */
/*	Get Sidebar List
/* ---------------------------------------------------------------------- */

function spacex_get_list_sidebars()
{
	global $wp_registered_sidebars;
	$sidebar_choices = array();
	
	 foreach ($wp_registered_sidebars as $sidebar)
	{
		$sidebar_choices[] = array(
				'label' => $sidebar['name'],
				'value' => sanitize_title($sidebar['name']),
				'src' => ''
		);
	
	}	
	
	$user_sidebars = ot_get_option('tt_user_sidebars');
	
	if (is_array($user_sidebars)) {
		
		foreach ($user_sidebars as $sidebar) {
			
			$sidebar_choices[] = array(
				'label' => $sidebar['title'],
				'value' => sanitize_title($sidebar['title']),
				'src' => ''
			);
		}
		
	}
	return $sidebar_choices;
}

/* ---------------------------------------------------------------------- */
/*	Page Options
/* ---------------------------------------------------------------------- */	
$meta_boxes[] = array(
		'id' => 'page_options_boxes',
		'title' => __('Page Options', 'spacex'),
		'desc' => '',
		'pages' => array('page', 'gallery', 'post', 'product'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id'    => 'tt_sidebar_position',			
				'label' => __('Sidebar Position', 'spacex'),
				'desc'	=> 'This option overwritten site sidebar position.',
				'class' => 'sidebar-position',
				'type'  => 'radio_image',
				'std'	=> 'nosidebar',
			),
			array(
				'id'       => 'tt_sidebar_list',			
				'label'     => __('Sidebar List', 'spacex'),
				'desc' => 'Choose one of sidebar in the list',
				'type'     => 'select',
				'std'	=> '',
				'choices' => spacex_get_list_sidebars(),

				
			),
			array(
				'id'       => 'tt_page_header_type_follow',			
				'label'     => __('Follow General Page Header ', 'spacex'),
				'desc' => 'Disable to set your custom style',
				'class' => 'page-header-type',
				'type'     => 'switch',
				'std'	=> 'true',
			),
			array(
				'id'       => 'tt_page_header_type',			
				'label'     => __('Page Header Type', 'spacex'),
				'desc' => 'Choose predefined header style',
				'class' => 'page-header-type',
				'type'     => 'radio_image',
				'std'	=> '2',
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
				'condition' => 'tt_page_header_type_follow:is(false)',
				
			),

		)
);		
/* ---------------------------------------------------------------------- */
/*	Flip Product Image
/* ---------------------------------------------------------------------- */	
$meta_boxes[] = array(
		'id' => 'product_settings',
		'title' => __('Flip Product Image', 'spacex'),
		'desc' => '',
		'pages' => array('product'),
		'context' => 'side',
		'priority' => 'low',
		'fields' => array(
			array(
				'id'    => 'tt_flip_product_image',			
				'label' => '',
				'desc'	=> '',
				'class' => '',
				'type'  => 'upload',
				'std'	=> ''
			),
		)
);			

/* ---------------------------------------------------------------------- */
/*	Testimonial
/* ---------------------------------------------------------------------- */

	$meta_boxes[] = array(
	'id'       => 'testimonial-settings',
	'title'    => __('Testimonial Settings', 'spacex'),
	'pages'    => array('testimonial'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(

		array(
			'label' => 'Company',
			'id'   => 'testimonial_company',			
			'type' => 'text',
			'std'  => '',
			'desc' => '',
		),
		array(
			'label' => 'Address',
			'id'   => 'testimonial_address',			
			'type' => 'text',
			'std'  => '',
			'desc' => '',
		),
	)
);


/* ---------------------------------------------------------------------- */
/*	Team Members
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
		'id' => 'spacex_team_options',
		'title' => __('Team Options', 'spacex'),
		'desc' => '',
		'pages' => array('team'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'spacex_team_position',
				'label' => __('Team Position', 'spacex'),
				'desc' => 'Person position in team. Can be used as job title.',
				'type' => 'text',
				'class' => '',
			),
			array(
				'id' => 'spacex_team_description',
				'label' => __('Short description', 'spacex'),
				'desc' => 'Short description about person.',
				'type' => 'textarea',
				'class' => '',
			),
			array(
				'id' => 'spacex_team_facebook_url',
				'label' => __('Facebook URL', 'spacex'),
				'desc' => __('Display Facebook icon if not empty.', 'spacex'),
				'type' => 'Text',
				'class' => '',
			),
			array(
				'id' => 'spacex_team_twitter_url',
				'label' => __('Twitter URL', 'spacex'),
				'desc' => __('Display Twitter icon if not empty.', 'spacex'),
				'type' => 'Text',
				'class' => '',
			),
			array(
				'id' => 'spacex_team_skype_username',
				'label' => __('Skype username', 'spacex'),
				'desc' => __('Display Skype icon if not empty.', 'spacex'),
				'type' => 'Text',
				'class' => '',
			),
			/*array(
				'id' => 'spacex_team_skills',
				'label' => __('Skills', 'spacex'),
				'desc' => '',
				'std' => '',
				'type' => 'list-item',
				'settings' => array(
					array(
						'id' => 'percentage',
						'label' => __('Percentage', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					)
				)
			)*/
		)
	);
/* ---------------------------------------------------------------------- */
/*	XGallery
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'spacex_post_type_xgallery',
	'title'    => __('Gallery Setting', 'spacex'),
	'pages'    => array('xgallery'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		
		array(
			'label' => __('Gallery Meta', 'spacex'),
			'id'   =>  'spacex_gallery_meta',
			'type' => 'list-item',
			'std'  => '',
			'settings' => array(
					array(
						'id' => 'meta-text',
						'label' => __('Text', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'meta-icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
				)
		),
		array(
			'label' => __('Link', 'spacex'),
			'id'   =>  'spacex_gallery_link',
			'type' => 'text',
			'std'  => '',
		),
		
	)
);
/* ---------------------------------------------------------------------- */
/*	Benefit
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'spacex_post_type_benefit',
	'title'    => __('Benefit Setting', 'spacex'),
	'pages'    => array('benefit'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	
		array(
			'label' => __('Target Link', 'spacex'),
			'id'   =>  'spacex_benefit_link',
			'type' => 'text',
			'std'  => '',
		),
		array(
			'label' => __('Custom Icon (Image)', 'spacex'),
			'id'   =>  'spacex_benefit_custom_icon',
			'type' => 'upload',
			'std'  => '',
		),
		array(
			'label' => __('Icon Size', 'spacex'),
			'id'   =>  'spacex_benefit_custom_icon_size',
			'type' => 'select',
			'std'  => 'normal',
			'choices' => array(
				array(
					'value'       => 'small',
					'label'       => 'Small',
					'src'         => ''
				  ),
				array(
					'value'       => 'normal',
					'label'       => 'Normal',
					'src'         => ''
				  ),
				  array(
					'value'       => 'large',
					'label'       => 'Large',
					'src'         => ''
				  ),
				  array(
					'value'       => 'extra_large',
					'label'       => 'Extra Large',
					'src'         => ''
				  ),
		
			),
		),
		array(
			'label' => __('Icon', 'spacex'),
			'id'   =>  'spacex_benefit_icon',
			'type' => 'icon',
			'std'  => '',
			'class' => 'fa-select-icon',
			'choices' => spacex_config_icons(),
		),
		
	)
);
/* ---------------------------------------------------------------------- */
/*	Counter
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'spacex_post_type_counter',
	'title'    => __('Counter Setting', 'spacex'),
	'pages'    => array('counter'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	

		array(
			'label' => __('Custom Icon (Image)', 'spacex'),
			'id'   =>  'spacex_counter_custom_icon',
			'type' => 'upload',
			'std'  => '',
		),
		array(
			'label' => __('Icon Size', 'spacex'),
			'id'   =>  'spacex_counter_custom_icon_size',
			'type' => 'select',
			'std'  => 'normal',
			'choices' => array(
				array(
					'value'       => 'small',
					'label'       => 'Small',
					'src'         => ''
				  ),
				array(
					'value'       => 'normal',
					'label'       => 'Normal',
					'src'         => ''
				  ),
				  array(
					'value'       => 'large',
					'label'       => 'Large',
					'src'         => ''
				  ),
				  array(
					'value'       => 'extra_large',
					'label'       => 'Extra Large',
					'src'         => ''
				  ),
		
			),
		),
		array(
			'label' => __('Icon', 'spacex'),
			'id'   =>  'spacex_counter_icon',
			'type' => 'icon',
			'std'  => '',
			'class' => 'fa-select-icon',
			'choices' => spacex_config_icons(),
		),
		
	)
);

/* ---------------------------------------------------------------------- */
/*	Course
/* ---------------------------------------------------------------------- */
$meta_boxes[] = array(
	'id'       => 'spacex_post_type_course_status',
	'title'    => __('Course Status', 'spacex'),
	'pages'    => array('xcourse'),
	'context'  => 'side',
	'priority' => 'default',
	'fields'   => array(

		array(
			'id'   =>  'course-status',
			'type' => 'select',
			'std'  => '',
			'choices' => array(
					array(
						'value'       => 'opening',
						'label'       => 'Opening',
						'src'         => ''
					  ),
					 array(
						'value'       => 'completed',
						'label'       => 'Completed',
						'src'         => ''
					 ),
					 array(
						'value'       => 'coming-soon',
						'label'       => 'Coming Soon',
						'src'         => ''
					 ),

			),
		),
	)
);		
$meta_boxes[] = array(
	'id'       => 'spacex_post_type_course',
	'title'    => __('Course Setting', 'spacex'),
	'pages'    => array('xcourse'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	
		array(
			'label' => __('Featured', 'spacex'),
			'id'   =>  '_featured',
			'type' => 'switch',
			'std'  => '',
			'desc' => 'Enable to featured this course.',
		),
		array(
			'label' => __('Video', 'spacex'),
			'id'   =>  'course-video',
			'type' => 'upload',
			'std'  => '',
			'desc' => 'Upload or enter video\'URL. Support HTML5 video: ogv, mp4, ogg, webm.',
		),
		array(
			'label' => __('Gallery', 'spacex'),
			'id'   =>  'course-gallery',
			'type' => 'gallery',
			'desc' => 'Select multiple images.',
		),
		array(
			'label' => __('Instructor', 'spacex'),
			'id'   =>  'course-instructor',
			'type' => 'custom_post_type_checkbox',
			'post_type' => 'instructor',
			'desc' => 'Select instructor join this course.',
		),
		array(
			'label' => __('Selling Price', 'spacex'),
			'id'   =>  'course_selling',
			'type' => 'custom_post_type_select',
			'post_type' => 'product',
			'desc' => 'Select product price to selling this course.',
		),
		array(
				'label' => __('Meta', 'spacex'),
				'id' => 'course-meta',
				'desc' => '',
				'std' => '',
				'type' => 'list-item',
				'settings' => array(
					array(
						'id' => 'course-link',
						'label' => __('Link', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'course-icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
					array(
						'id' => 'course-description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					)
				)
		),
		array(
				'label' => __('Lesson', 'spacex'),
				'id' => 'course-lesson',
				'desc' => '',
				'std' => '',
				'type' => 'list-item',
				'settings' => array(
					array(
						'id' => 'course-description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'textarea',
					)
				)
		),
		array(
			'label' => __('Description', 'spacex'),
			'id'   =>  'course-description',
			'type' => 'textarea',
			'desc' => 'Course description.',
		),
		
		
		
	)
);
$meta_boxes[] = array(
	'id'       => 'spacex_post_type_instructor',
	'title'    => __('Instructor Setting', 'spacex'),
	'pages'    => array('instructor'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	

		array(
			'label' => __('Instructor Job', 'spacex'),
			'id'   =>  'instructor-level',
			'type' => 'text',
			'std'  => '',
			'desc' => 'Example: Teacher of XCollege',
		),
		array(
			'label' => __('Social Icons', 'spacex'),
			'id'   =>  'instructor-social',
			'type' => 'social-links',
			'std'  => '',
			'desc' => 'Social icons',
		),
		array(
			'label' => __('Instructor Meta', 'spacex'),
			'id'   =>  'instructor-meta',
			'type' => 'list-item',
			'std'  => '',
			'desc' => 'Display instructor information, every item in list as a module.',
			'settings' => array(
					array(
						'id' => 'description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
				)
		),
		array(
			'label' => __('Infomation Module', 'spacex'),
			'id'   =>  'instructor-about',
			'type' => 'list-item',
			'std'  => '',
			'desc' => 'Display instructor information, every item in list as a module.',
			'settings' => array(
					array(
						'id' => 'instructor-description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'textarea',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
				)
		),
	)
);	

$meta_boxes[] = array(
	'id'       => 'spacex_post_type_course',
	'title'    => __('Event Setting', 'spacex'),
	'pages'    => array('xevent'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	
		array(
			'label' => __('Featured', 'spacex'),
			'id'   =>  '_featured',
			'type' => 'switch',
			'std'  => '',
			'desc' => 'Enable to featured this event.',
		),
		array(
			'label' => __('Date', 'spacex'),
			'id'   =>  'event_date',
			'type' => 'date-time-picker',
			'std'  => '',
			'desc' => '',
		),
		array(
			'label' => __('Video', 'spacex'),
			'id'   =>  'event-video',
			'type' => 'upload',
			'std'  => '',
			'desc' => 'Upload or enter video\'URL. Support HTML5 video: ogv, mp4, ogg, webm.',
		),
		array(
			'label' => __('Gallery', 'spacex'), 
			'id'   =>  'event-gallery',
			'type' => 'gallery',
			'desc' => 'Select multiple images.',
		),
		array(
			'label' => __('Speakers', 'spacex'),
			'id'   =>  'event-speaker',
			'type' => 'custom_post_type_checkbox',
			'post_type' => 'speaker',
			'desc' => 'Select speaker join this course.',
		),
		array(
			'label' => __('Selling Price', 'spacex'),
			'id'   =>  'event_selling',
			'type' => 'custom_post_type_select',
			'post_type' => 'product',
			'desc' => 'Select product price to selling this course.',
		),
		array(
				'label' => __('Meta', 'spacex'),
				'id' => 'event-meta',
				'desc' => '',
				'std' => '',
				'type' => 'list-item',
				'settings' => array(
					array(
						'id' => 'event-link',
						'label' => __('Link', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'event-icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
					array(
						'id' => 'event-description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					)
				)
		),
		array(
				'label' => __('Module', 'spacex'),
				'id' => 'event-module',
				'desc' => '',
				'std' => '',
				'type' => 'list-item',
				'settings' => array(
					array(
						'id' => 'description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'textarea',
					),
					array(
						'id' => 'time',
						'label' => __('Time', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'id' => 'icon',
						'label' => __('Icon', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'icon',
					)
					
				)
		),
		array(
			'label' => __('Description', 'spacex'),
			'id'   =>  'event-description',
			'type' => 'textarea',
			'desc' => 'Event description.',
		),
		
		
		
	)
);
$meta_boxes[] = array(
	'id'       => 'spacex_post_type_instructor',
	'title'    => __('Speaker Setting', 'spacex'),
	'pages'    => array('speaker'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	

		array(
			'label' => __('Speaker Job', 'spacex'),
			'id'   =>  'speaker-level',
			'type' => 'text',
			'std'  => '',
			'desc' => 'Example: Teacher of XCollege',
		),
		array(
			'label' => __('Social Icons', 'spacex'),
			'id'   =>  'speaker-social',
			'type' => 'social-links',
			'std'  => '',
			'desc' => 'Social icons',
		),
		array(
			'label' => __('Speaker Meta', 'spacex'),
			'id'   =>  'speaker-meta',
			'type' => 'list-item',
			'std'  => '',
			'desc' => 'Display instructor information, every item in list as a module.',
			'settings' => array(
					array(
						'id' => 'description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'text',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
				)
		),
		array(
			'label' => __('Infomation Module', 'spacex'),
			'id'   =>  'speaker-about',
			'type' => 'list-item',
			'std'  => '',
			'desc' => 'Display instructor information, every item in list as a module.',
			'settings' => array(
					array(
						'id' => 'speaker-description',
						'label' => __('Description', 'spacex'),
						'desc' => '',
						'std' => '',
						'type' => 'textarea',
					),
					array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
				)
		),
	)
);		

$meta_boxes[] = array(
	'id'       => 'spacex_post_type_xslider',
	'title'    => __('Slide Settings', 'spacex'),
	'pages'    => array('xslider'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
	

		
		array(
			'label' => __('Heading', 'spacex'),
			'id'   =>  'slide-heading',
			'type' => 'text',
			'std'  => '',
			'desc' => '',
		),
		array(
			'label' => __('Content', 'spacex'),
			'id'   =>  'slide-content',
			'type' => 'textarea',
			'std'  => '',
		),
		array(
			'label' => __('Nav Description', 'spacex'),
			'id'   =>  'slide-desc',
			'type' => 'text',
			'std'  => '',
		),
		array(
			'label' => __('External Link', 'spacex'),
			'id'   =>  'slide-link',
			'type' => 'text',
			'std'  => '',
		),
		array(
						'label' => __('Icon', 'spacex'),
						'id'   =>  'slide-icon',
						'type' => 'icon',
						'std'  => '',
						'class' => 'fa-select-icon',
						'choices' => spacex_config_icons(),
					),
		
	)
);		

function spacex_register_meta_boxes() {

  global $meta_boxes;
  
  foreach( $meta_boxes as $meta_box ) {
    ot_register_meta_box( $meta_box );
  }
  
}
add_action( 'admin_init', 'spacex_register_meta_boxes' );

function spacex_config_icons()
{
	$icons = array();
	
	$icons[] = array(
			'label' => '--Select Icon--',
			'value' => 'none',
			'src' => ''
	);

	if (file_exists(get_template_directory().'/css/font-awesome.css'))
	{
		$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		
		
		$file_url = get_template_directory_uri() . '/css/font-awesome.css';
		$request = wp_remote_get($file_url);
		$subject = wp_remote_retrieve_body( $request );

		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

		foreach($matches as $match){
			$icons[] = array(
			'label' => $match[1],
			'value' => $match[1],
			'src' => ''
		);
		}
		
	}
 	sort($icons);
	return $icons;

}

function spacex_jscomposer_icons()
{
	$icons = array();
	
	$icons[] = array(
			'label' => '--Select Icon--',
			'value' => 'none',
			'src' => ''
	);

	if (file_exists(get_template_directory().'/css/font-awesome.css'))
	{
		$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		
		
		$file_url = get_template_directory_uri() . '/css/font-awesome.css';
		$request = wp_remote_get($file_url);
		$subject = wp_remote_retrieve_body( $request );

		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

		foreach($matches as $match){
			$icons[] = array(
			'label' => $match[1],
			'value' => $match[1],
			'src' => ''
		);
		}
		
	}
 	sort($icons);
	return $icons;

}