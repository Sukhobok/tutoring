<?php
/**
 * Spacex Custom Visual Composer
 *
 * Functions for custom Visual Composer's functions.
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Remove VC Teaser metabox
if ( is_admin() ) {
	if ( ! function_exists('spacex_remove_vc_boxes') ) {
		function spacex_remove_vc_boxes(){
			$post_types = get_post_types( '', 'names' ); 
			foreach ( $post_types as $post_type ) {
				remove_meta_box('vc_teaser',  $post_type, 'side');
			}
		} // End function
	} // End if
add_action('do_meta_boxes', 'spacex_remove_vc_boxes');
}


$add_css_animation = array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'admin_label' => true,
	'value' => array(
		__( 'No', 'js_composer' ) => '',
		__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
		__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
		__( 'Left to right', 'js_composer' ) => 'left-to-right',
		__( 'Right to left', 'js_composer' ) => 'right-to-left',
		__( 'Appear from center', 'js_composer' ) => "appear"
	),

	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
);


/*------------------------------------------------*/
/* Courses
/*------------------------------------------------*/
if(class_exists('XCOURSE'))
{
vc_map( array(
    "name" => __("Courses", 'js_composer'),
    "base" => "courses",
    "class" => "",
	"icon" => "spacex_ico_product_list",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
 
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
            "value" => "",
            "description" => ""
        ),
		array(
            "type" => "textfield",
 
            "heading" => __("Number of Posts", "js_composer"),
            "param_name" => "perpage",
            "value" => "",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
 
            "heading" => __("Category", "js_composer"),
            "param_name" => "category",
			'admin_label' => true,
            "value" => get_shop_categories(),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Ajax Filter Dropdown", "js_composer"),
            "param_name" => "filter",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
 
            "heading" => __("Featured Products", "js_composer"),
            "param_name" => "featured",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
 
            "heading" => __("Latest Products", "js_composer"),
            "param_name" => "latest",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
 
            "heading" => __("Best Sellers", "js_composer"),
            "param_name" => "bestsellers",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
 
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
        				__( 'Sort by price', 'js_composer' ) =>  'price'
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ),   
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
			'admin_label' => true,
            "param_name" => "layout",
            "value" =>	array(
							__('Grid', 'js_composer') => 'grid',
							__('List', 'js_composer') => 'list',
							__('Table', 'js_composer') => 'table'),
            "description" => ""
        ),   
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),    
		$add_css_animation,
    ),

) );
}
/*------------------------------------------------*/
/* Call To Action
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Spacex Call To Action", 'js_composer'), 
    "base" => "xcalltoaction",
    "class" => "",
	"icon" => "spacex_ico_product_slider",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "js_composer"),
            "param_name" => "first",
            "value" => "Title",
            "description" => ""
        ),
		array(
            "type" => "textarea",
            "heading" => __("Subtitle", "js_composer"),
            "param_name" => "second",
            "value" => "Subtitle",
            "description" => "",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Text Color", "js_composer"),
			'admin_label' => true,
            "param_name" => "color",
            "value" =>	array(
							__('Dark', 'js_composer') => 'dark',
							__('White', 'js_composer') => 'white',
						),	
            "description" => "",
        ),  
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
			'admin_label' => true,
            "param_name" => "layout",
            "value" =>	array(
							__('Content Left, Button Right', 'js_composer') => 'left',
							__('Content & Button Centered', 'js_composer') => 'center',
							__('Content Left, Button Bottom', 'js_composer') => 'bottom',
						),	
            "description" => "",
        ),    
		array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "js_composer"),
            "param_name" => "bg_color",
            "description" => "",
        ),
		array(
            "type" => "attach_image",
            "heading" => __("Background Image", "js_composer"),
            "param_name" => "bg_image",
            "description" => "",
        ),	
		array(
            "type" => "checkbox",
            "heading" => __("Border", "js_composer"),
            "param_name" => "border",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		/*array(
            "type" => "checkbox",
            "heading" => __("Parallax Background"),
            "param_name" => "parallax",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),	*/
		array(
            "type" => "checkbox",
            "heading" => __("Button", "js_composer"),
            "param_name" => "button",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Button Size", "js_composer"),
            "param_name" => "size",
            "value" => array(
                        __( 'Small', 'js_composer' ) => 'small',
        				__( 'Normal', 'js_composer' ) => 'medium',
        				__( 'Large', 'js_composer' ) => 'large',
                    ),
			"dependency" => Array('element'	=> "button", 'value' => "yes" ),		
            "description" => "",
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Text on Button", "js_composer"),
            "param_name" => "text",
            "description" => "",
			"dependency" => Array('element'	=> "button", 'value' => "yes" ),
        ),
		array(
            "type" => "textfield",
            "heading" => __("Link", "js_composer"),
            "param_name" => "text",
            "description" => "",
			"dependency" => Array('element'	=> "button", 'value' => "yes" ),
        ),     
		$add_css_animation,
    ),

) );


/*------------------------------------------------*/
/* Remove vc_row params
/*------------------------------------------------*/
if ( function_exists('vc_remove_param') ) {
	
	// Rows
	vc_remove_param( 'vc_row', 'full_width' );
	vc_remove_param( 'vc_row', 'font_color' );
	vc_remove_param( 'vc_row', 'padding' );
	vc_remove_param( 'vc_row', 'bg_color' );
	vc_remove_param( 'vc_row', 'bg_image' );
	vc_remove_param( 'vc_row', 'bg_image_repeat' );
	vc_remove_param( 'vc_row', 'margin_bottom' );
	
}
vc_add_param("vc_tabs", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Tab Nav Type", "js_composer"),
	"param_name"	=> "tabnavtype",
	"value"			=> array(
		__("Default", "js_composer")					=> 'default',
		__("Background", "js_composer")		=> "background",
		__("Splash", "js_composer")		=> "splash",
		__("Classic", "js_composer")	=> "classic" ),	
) );

vc_add_param("vc_tabs", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Align Tab Nav", "js_composer"),
	"param_name"	=> "aligntabnav",
	"value"			=> array(
		__("Left", "js_composer")					=> 'left',
		__("Center", "js_composer")		=> "center",
		__("Right", "js_composer")		=> "right"),
) );

vc_add_param("vc_tab", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Icon", "js_composer"),
	"param_name"	=> "tab_icon",
	"value"			=> spacex_jscomposer_icons()

) );

vc_add_param("vc_accordion_tab", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Icon", "js_composer"),
	"param_name"	=> "tab_icon",
	"value"			=> spacex_jscomposer_icons()

) );


/*------------------------------------------------*/
/* Rows
/*------------------------------------------------*/
vc_add_param("vc_row", array(
	"type"			=> "checkbox",
	"class"			=> "",
	"heading"		=> __("Fullwidth Content", "js_composer"),
	"param_name"	=> "fullwidth",
	"value"			=> Array(__("Enable", "js_composer") => 'yes'),
	"description"	=> __("Enable to fullwidth content inside this row.", "js_composer")
));
vc_add_param( "vc_row", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Align", "js_composer"),
	"param_name"	=> "align",
	"value"			=> array(
		__("Left", "js_composer")		=> "left",
		__("Center", "js_composer")		=> "center",
		__("Right", "js_composer")	=> "right" ),
) );
vc_add_param("vc_row", array(
	"type"			=> "colorpicker",
	"class"			=> "",
	"heading"		=> __("Background Overlay", "js_composer"),
	"param_name"	=> "overlay",
	"value"			=> "",
	"description"	=> __("Set background overlay color", "js_composer")
));
vc_add_param("vc_row", array(
	"type"			=> "checkbox",
	"class"			=> "",
	"heading"		=> __("Parallax Background", "js_composer"),
	"param_name"	=> "parallax",
	"value"			=> Array(__("Enable", "js_composer") => 'yes'),
	"description"	=> __("Enable to parallax background.", "js_composer")
));

vc_add_param( "vc_row", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Animation", "js_composer"),
	"param_name"	=> "css_animation",
	"value"			=> array(
		__("No", "js_composer")					=> '',
		__("Top to bottom", "js_composer")		=> "top-to-bottom",
		__("Bottom to top", "js_composer")		=> "bottom-to-top",
		__("Left to right", "js_composer")		=> "left-to-right",
		__("Right to left", "js_composer")		=> "right-to-left",
		__("Appear from center", "js_composer")	=> "appear" ),
) );

vc_add_param( "vc_row", array(
	"type"			=> "dropdown",
	"class"			=> "",
	"heading"		=> __("Typography Style Scheme", "js_composer"),
	"param_name"	=> "text_style",
	"value"			=> array(
		__("Dark Text", "js_composer")	=> 'dark',
		__("White Text", "js_composer")	=> "light",
	)
) );
  


vc_add_param( "vc_row", array(
	"type"			=> 'checkbox',
	"heading"		=> __("Enable HTML5 Video Background", "js_composer"),
	"param_name"	=> "video_bg",
	"description"	=> __("Check this box to enable html5 video background.", "js_composer"),
	"value"			=> Array(__("Yes, please", "js_composer") => 'yes')
) );

vc_add_param( "vc_row", array(
	"type"			=> 'dropdown',
	"heading"		=> __("Video Background Overlay", "js_composer"),
	"param_name"	=> "video_bg_overlay",
	"value"			=> array(
		__("None", "js_composer")				=> 'none',
		__("Dark", "js_composer")				=> "dark",
		__("Dotted", "js_composer")			=> "dotted",
	),
	"dependency" => Array('element'	=> "video_bg", 'value' => "yes" ),
) );

vc_add_param("vc_row", array(
	"type"			=> "textfield",
	"heading"		=> __("Video URL: MP4 URL", "js_composer"),
	"param_name"	=> "video_bg_mp4",
	"value"			=> "",
	"description"	=> __("Enter the URL to a SELF hosted video .mp4 file url.", "js_composer"),
	"dependency" => Array('element'	=> "video_bg", 'value' => "yes" ),
));

vc_add_param("vc_row", array(
	"type"			=> "textfield",
	"heading"		=> __("Video URL: OGV URL", "js_composer"),
	"param_name"	=> "video_bg_ogv",
	"value"			=> "",
	"description"	=> __("Enter the URL to a SELF hosted video .webm file url.", "js_composer"),
	"dependency" => Array('element'	=> "video_bg", 'value' => "yes" ),
));

vc_add_param("vc_row", array(
	"type"			=> "textfield",
	"heading"		=> __("Video URL: WEBM URL", "js_composer"),
	"param_name"	=> "video_bg_webm",
	"value"			=> "",
	"description"	=> __("Enter the URL to a SELF hosted video .webm file url.", "js_composer"),
	"dependency" => Array('element'	=> "video_bg", 'value' => "yes" ),
));


/*------------------------------------------------*/
/* Client
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Client", 'js_composer'), 
    "base" => "client",
    "class" => "",
	"icon" => "spacex_ico_client",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),

		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
        				
                    ),
            "description" => "",
        ),
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		$add_css_animation,
		    
    ),

) );
/*------------------------------------------------*/
/* Testimonial
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Testimonial", 'js_composer'), 
    "base" => "testimonial",
    "class" => "",
	"icon" => "spacex_ico_testimonial",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

				array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),

		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),

		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
        				
                    ),
            "description" => "",
        ),
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		$add_css_animation,
		    
    ),
) );

/*------------------------------------------------*/
/* Team Members
/*------------------------------------------------*/
/*vc_map( array(
    "name" => __("Team Members", 'js_composer'), 
    "base" => "team",
    "class" => "",
	"icon" => "spacex_ico_team",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => __("Number of Posts", 'js_composer'),
            "param_name" => "perpage",
            "value" => __("5"),
            "description" => ""
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Column", 'js_composer'),
            "param_name" => "column",
            "value" => array(
                        '1' => '1',
        				'2' => '2',

						'3' => '3',
						'4' => '4',
                    ),
            "description" => "",
        ),
		    
    ),

) );*/
/*------------------------------------------------*/
/* Gallery
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Gallery", 'js_composer'), 
    "base" => "xgallery",
    "class" => "",
	"icon" => "spacex_ico_recent_projects",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" => array(
                        __( 'Wall', 'js_composer' ) => 'wall',
						 __( 'Column', 'js_composer' ) => 'column',
        				__( 'List', 'js_composer' ) => 'list',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
						

                    ),
            "description" => "",
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),
	
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		  $add_css_animation,  
    ),

) );
/*------------------------------------------------*/
/* Heading
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Heading", 'js_composer'), 
    "base" => "heading",
    "class" => "",
	"icon" => "spacex_ico_heading",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Title", 'js_composer'),
            "param_name" => "title",
            "value" => __("Title", 'js_composer'),
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textarea_html",
            "heading" => __("Subtitle", 'js_composer'),
            "param_name" => "subtitle",
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Align", 'js_composer'),
            "param_name" => "align",
            "value" => array(
                        'Left' => 'left',
        				'Right' => 'right',
						'Center' => 'center',
                    ),
            "description" => ""
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Type", 'js_composer'),
            "param_name" => "type",
			'admin_label' => true,
            "value" => array(
						'Clean' => '0',
                        'Border Solid Bottom' => '1',
						'Line Through' => '2',
						'Line Through Under' => '5',
						'Underline' => '3',
						'Square' => '4',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Wrapper Tags", "js_composer"),
            "param_name" => "size",
			'admin_label' => true,
            "value" => array(
                        'H2 (Default)' => 'default',
        				'H3' => 'h3',
						'H1' => 'h1',
						
                    ),
            "description" => ""
        ),
		  $add_css_animation,  
    ),

) );

/*------------------------------------------------*/
/* Counter Up
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Counter Up", 'js_composer'), 
    "base" => "counter",
    "class" => "",
	"icon" => "spacex_ico_heading",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Title", 'js_composer'),
            "param_name" => "title",
            "value" => "Title",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", 'js_composer'),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
        				
                    ),
            "description" => "",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", 'js_composer'),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		array(
            "type" => "textfield",
            "heading" => __("Extra Class", "js_composer"),
            "param_name" => "class",
            "description" => ""
        ), 		
		$add_css_animation,    
    ),

) );
/*------------------------------------------------*/
/* Product Category
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Product Category", 'js_composer'), 
    "base" => "xcategory",
    "class" => "",
	"icon" => "spacex_ico_product_category",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
		
		array(
            "type" => "dropdown",
            "heading" => __("Category", "js_composer"),
            "param_name" => "category",
			'admin_label' => true,
            "value" => get_shop_categories(),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" =>	array(
							__('Default', 'js_composer') => 'thumb',
							__('Category, Description', 'js_composer') => 'thumbname',
							),
            "description" => ""
        ), 
		array(
            "type" => "dropdown",
            "heading" => __("Align", "js_composer"),
            "param_name" => "align",
            "value" =>	array(
							__('Left', 'js_composer') => 'left',
							__('Right', 'js_composer') => 'right',
							__('Center', 'js_composer') => 'center',
							),
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Extra Class", "js_composer"),
            "param_name" => "class",
            "description" => ""
        ), 
		$add_css_animation,    
    ),

 )
);		
/*------------------------------------------------*/
/* Taxonomies
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Taxonomies", 'js_composer'), 
    "base" => "xcategories",
    "class" => "",
	"icon" => "spacex_ico_product_category",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
		
		array(
            "type" => "textfield",
            "heading" => __("Title", 'js_composer'),
            "param_name" => "title",
            "value" => "",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Taxonomy", "js_composer"),
            "param_name" => "taxonomy",
			'admin_label' => true,
            "value" =>	array(
							__('Course', 'js_composer') => 'course_cat',
							__('Event', 'js_composer') => 'event_cat',
							__('Product', 'js_composer') => 'product_cat',							
							__('Post', 'js_composer') => 'category',							
							),
            "description" => ""
        ), 
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" =>	array(
							__('Wall', 'js_composer') => 'wall',
							__('Column', 'js_composer') => 'column',
							__('List', 'js_composer') => 'list',							
							),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
						

                    ),
            "description" => "",
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider.",
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Hide Text", "js_composer"),
            "param_name" => "text",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to hide text.",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
        				__( 'Sort alphabetically', 'js_composer' ) => 'cat',
        				__( 'Sort by date', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		array(
            "type" => "textfield",
            "heading" => __("Extra Class", 'js_composer'),
            "param_name" => "class",
            "description" => ""
        ), 
		  $add_css_animation,  
    ),

) );
/*------------------------------------------------*/
/* Benefit
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Benefit", 'js_composer'), 
    "base" => "benefit",
    "class" => "",
	"icon" => "spacex_ico_benefit",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" => array(
                        __( 'Grid', 'js_composer' ) => 'grid',
        				__( 'List', 'js_composer' ) => 'list',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
        				
                    ),
            "description" => "",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Type", "js_composer"),
            "param_name" => "type",
			'admin_label' => true,
            "value" => array(

						'Icon Top Centered, Title, Content Centered' => '1',
						'Icon Left, Title, Content' => '2',
						'Icon Top, Title, Content' => '3',
                        'Thumbnail, Title, Content' => '4',
						'Wall with background color.' => '5',	
        				
                    ),
            "description" => "",
        ),
		
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		
		$add_css_animation,    
    ),

) );
if(class_exists('XCOURSE'))
{
/*------------------------------------------------*/
/* Instructor
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Instructors", 'js_composer'), 
    "base" => "instructors",
    "class" => "",
	"icon" => "spacex_ico_benefit",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
						'12 Columns' => '12',
        				
                    ),
            "description" => "",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" => array(

						'Wall' => 'wall',
						'Column' => 'column',
						'List' => 'list',
        				
                    ),
            "description" => "",
        ),
		
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		
		 $add_css_animation,   
    ),

) );
}
/*------------------------------------------------*/
/* Event
/*------------------------------------------------*/
if(class_exists('XEVENT'))
{
vc_map( array(
    "name" => __("Events", 'js_composer'),
    "base" => "xevents",
    "class" => "",
	"icon" => "spacex_ico_product_list",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
 
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
            "value" => "",
            "description" => ""
        ),
		array(
            "type" => "textfield",
 
            "heading" => __("Number of Posts", "js_composer"),
            "param_name" => "perpage",
            "value" => "5",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
 
            "heading" => __("Category", "js_composer"),
            "param_name" => "category",
			'admin_label' => true,
            "value" => get_event_categories(),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Ajax Filter Dropdown", "js_composer"),
            "param_name" => "filter",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
 
            "heading" => __("Featured", "js_composer"),
            "param_name" => "featured",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "checkbox",
 
            "heading" => __("Latest", "js_composer"),
            "param_name" => "latest",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
 
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
        				__( 'Sort by price', 'js_composer' ) =>  'price'
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ),   
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
			'admin_label' => true,
            "param_name" => "layout",
            "value" =>	array(
							__('Grid', 'js_composer') => 'grid',
							__('List', 'js_composer') => 'list',
							__('Table', 'js_composer') => 'table'),
            "description" => ""
        ),   
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),    
		$add_css_animation,
    ),

) );
}
if(class_exists('XEVENT'))
{
/*------------------------------------------------*/
/* Speaker
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Speakers", 'js_composer'), 
    "base" => "speakers",
    "class" => "",
	"icon" => "spacex_ico_benefit",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offset", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Carousel", "js_composer"),
            "param_name" => "carousel",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => "Enable to display in carousel slider."
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
            "value" => array(
                        '1 Column' => '1',
        				'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4',
						'5 Columns' => '5',
						'6 Columns' => '6',
						'12 Columns' => '12',
        				
                    ),
            "description" => "",
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" => array(

						'Wall' => 'wall',
						'Column' => 'column',
						'List' => 'list',
        				
                    ),
            "description" => "",
        ),
		
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
                        __( 'Default sorting', 'js_composer' ) => 'menu_order',
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		
		 $add_css_animation,   
    ),

) );
}
/*------------------------------------------------*/
/* Separator
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Separator", 'js_composer'), 
    "base" => "divider",
    "class" => "",
	"icon" => "spacex_ico_divider",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
	
		array(
            "type" => "textfield",
            "heading" => __("Height", 'js_composer'),
			'admin_label' => true,
            "param_name" => "height",
            "value" => "30",
            "description" => "px"
        ),
		
		    
    ),

) );
/*------------------------------------------------*/
/* From The Blog
/*------------------------------------------------*/
vc_map( array(
    "name" => __("From The Blog", 'js_composer'), 
    "base" => "fromblogpost",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Title", 'js_composer'),
            "param_name" => "title",
            "value" => "",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Number", 'js_composer'),
            "param_name" => "perpage",
            "value" => "3",
			'admin_label' => true,
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Offet", 'js_composer'),
            "param_name" => "offset",
            "value" => "0",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout", "js_composer"),
            "param_name" => "layout",
			'admin_label' => true,
            "value" => array(
        				__( 'Grid', 'js_composer' ) => 'grid',
        				__( 'List', 'js_composer' ) => 'list',
                    ),
            "description" => ""
        ),
		/*array(
            "type" => "dropdown",
            "heading" => __("Column", 'js_composer'),
            "param_name" => "column",
			'admin_label' => true,
             "value" => array(
        				__( '1 Column', 'js_composer' ) => '1',
        				__( '2 Columns', 'js_composer' ) => '2',
        				__( '3 Columns', 'js_composer' ) => '3',
        				__( '4 Columns', 'js_composer' ) => '4',						
                    ),
            "description" => ""
        ),*/
		array(
            "type" => "checkbox",
            "heading" => __("Post Excerpt", "js_composer"),
            "param_name" => "excerpt",
            "value" => array(__("Enable", "js_composer") => 'yes'),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		array(
            "type" => "textfield",
            "heading" => __("Extra Class", "js_composer"),
            "param_name" => "el_class",
            "value" =>	'',
            "description" => ""
        ), 
		$add_css_animation,
		
		    
    ),

) );
/*------------------------------------------------*/
/* Button
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Spacex Button", 'js_composer'), 
    "base" => "spacexbutton",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "dropdown",
            "heading" => __("Type", "js_composer"),
            "param_name" => "type",
			'admin_label' => true,
            "value" => array(
        				__( 'Border', 'js_composer' ) => 'border',
        				__( 'Background', 'js_composer' ) => 'background',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Color", "js_composer"),
			'admin_label' => true,
            "param_name" => "color",
            "value" => array(
        				__( 'Black', 'js_composer' ) => 'dark',
        				__( 'White', 'js_composer' ) => 'white',
						__( 'Red', 'js_composer' ) => 'red',
						__( 'Green', 'js_composer' ) => 'green',
						__( 'Blue', 'js_composer' ) => 'blue',
						__( 'Orange', 'js_composer' ) => 'orange',
						__( 'Yellow', 'js_composer' ) => 'yellow',
						__( 'Purple', 'js_composer' ) => 'purple',
                    ),
            "description" => ""
        ),		
		array(
            "type" => "textfield",
            "heading" => __("Text", 'js_composer'),
            "param_name" => "text",
            "value" => "",
            "description" => ""
        ),
		array(
            "type" => "textfield",
            "heading" => __("Link", 'js_composer'),
            "param_name" => "link",
            "value" => "#",
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Align", "js_composer"),
            "param_name" => "align",
			'admin_label' => true,
            "value" => array(
        				__( 'Left', 'js_composer' ) => 'left',
        				__( 'Center', 'js_composer' ) => 'center',
						__( 'Right', 'js_composer' ) => 'right',
                    ),
            "description" => ""
        ),		
		array(
            "type" => "dropdown",
            "heading" => __("Size", "js_composer"),
            "param_name" => "size",
			'admin_label' => true,
            "value" => array(
        				__( 'Small', 'js_composer' ) => 'small',
        				__( 'Medium', 'js_composer' ) => 'medium',
						__( 'Large', 'js_composer' ) => 'large',
                    ),
            "description" => ""
        ),		
		 $add_css_animation,   
    ),

) );
/*------------------------------------------------*/
/* Single Product
/*------------------------------------------------*/
/*vc_map( array(
    "name" => __("Single Product", 'js_composer'), 
    "base" => "singleproduct",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => __("Product Id", 'js_composer'),
			'admin_label' => true,
            "param_name" => "id",
            "value" => "",
            "description" => __("Example: 167. Use ',' to select multiple products")
        ),
		    
    ),
	//'js_view' => 'VcSingleProductView'

) );*/
/*------------------------------------------------*/
/* Product Search
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Product Search Box", 'js_composer'), 
    "base" => "productsearch",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => __("Description", 'js_composer'),
			'admin_label' => true,
            "param_name" => "description",
            "value" => "Like our common keyword: shorts, bags,...",
            "description" => ""
        ),
		$add_css_animation,    
    ),
	//'js_view' => 'VcSingleProductView'

) );
/*------------------------------------------------*/
/* X Slider
/*------------------------------------------------*/
vc_map( array(
    "name" => __("X Slider", 'js_composer'), 
    "base" => "xslider",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => __("Number", "js_composer"),
            "param_name" => "perpage",
			'admin_label' => true,
            "value" => "",
            "description" => "",
        ),
		
	
		array(
            "type" => "dropdown",
            "heading" => __("Orderby", "js_composer"),
            "param_name" => "orderby",
            "value" => array(
        				__( 'Sort alphabetically', 'js_composer' ) => 'title',
        				__( 'Sort by most recent', 'js_composer' ) => 'date',
                    ),
            "description" => ""
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            "value" =>	array(
							__('Descending', 'js_composer') => 'desc',
							__('Crescent', 'js_composer') => 'asc'),
            "description" => ""
        ), 
		$add_css_animation,    
    ),
	//'js_view' => 'VcSingleProductView'

) );

/*------------------------------------------------*/
/* Blockquote
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Blockquote", 'js_composer'), 
    "base" => "blockquote",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => __("Text", "js_composer"),
            "param_name" => "sourcename",
			'admin_label' => true,
            "value" => "",
            "description" => "",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Content", "js_composer"),
            "param_name" => "sourcetitle",
			'admin_label' => true,
            "value" => "",
            "description" => "",
        ),
		
		$add_css_animation,    
    ),
	//'js_view' => 'VcSingleProductView'

) );
/*------------------------------------------------*/
/* Pricing Table
/*------------------------------------------------*/
vc_map( array(
    "name" => __("Pricing Table", 'js_composer'), 
    "base" => "pricing_table",
    "class" => "",
	"icon" => "spacex_ico_fromblogpost",
    "category" => __('SpaceX', 'js_composer'),
    "params" => array(
		
		array(
            "type" => "dropdown",
            "heading" => __("Column", "js_composer"),
            "param_name" => "column",
			'admin_label' => true,
            "value" => array(
        				__( '1 Column', 'js_composer' ) => '1',
        				__( '2 Columns', 'js_composer' ) => '2',
        				__( '3 Columns', 'js_composer' ) => '3',						
        				__( '4 Columns', 'js_composer' ) => '4',						
						__( '5 Columns', 'js_composer' ) => '5',						
						__( '6 Columns', 'js_composer' ) => '6',						
                    ),
            "description" => ""
        ),	
		array(
            "type" => "textarea_html",
            "heading" => __("Description", 'js_composer'),
			'admin_label' => true,
            "param_name" => "content",
            "value" => __("[pricing_column title='Basic' price='19$' unit='Monthly' button='Sign up' link='#']
[pricing_row]Condition 1[/pricing_row]
[pricing_row]Condition 2[/pricing_row]
[pricing_row]Condition 3[/pricing_row]
[/pricing_column]

[pricing_column title='Advanced' price='29$' unit='Monthly' button='Sign up' link='#']
[pricing_row]Condition 1[/pricing_row]
[pricing_row]Condition 2[/pricing_row]
[pricing_row]Condition 3[/pricing_row]
[/pricing_column]"),
            "description" => ""
        ),
		 $add_css_animation,   
    ),
	//'js_view' => 'VcSingleProductView'

) );
