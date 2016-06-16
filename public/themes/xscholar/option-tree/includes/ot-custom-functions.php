<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );
/**
 * OptionTree Custom Functions
 *
 * @package   OptionTree
 * @author	  spacex
 * @copyright Copyright (c) 2015, spacex
 * @since     2.0
 */
function menu_spacex()
{
	return 'spacex';
}
add_filter( 'ot_theme_options_parent_slug', 'menu_spacex' );



function spacex_ot_header_version_text()
{
	return ' ';
}
add_filter( 'ot_header_version_text', 'spacex_ot_header_version_text');
function spacex_ot_header_logo()
{
	return '<img src="'.get_template_directory_uri().'/framework/assets/images/spacex-logo-white.png" alt="SpaceX Themes">';
}
add_filter( 'ot_header_logo_link', 'spacex_ot_header_logo');
/**
 * Recognized Border Type
 *
 * Returns an array of all recognized background position values.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_border_type' ) ) {

  function ot_recognized_border_type( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_border_type', array(
      "none"      => "None",
      "hidden"      => "hidden",
	  "dotted"      => "dotted",
	  "dashed"      => "dashed",
	  "solid"      => "solid",
      "double"      => "double",
	  "groove"      => "groove",
	  "ridge"      => "ridge",
	  "inset"      => "inset",
	  "outset"      => "outset",
	  "initial"      => "initial",
	  "inherit"      => "inherit",
	  
    ), $field_id );
    
  }

}
/**
 * Recognized schema
 *
 * Returns an array of all recognized background repeat values.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_schema' ) ) {
  
  function ot_recognized_schema( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_schema', array(
      'black' => 'Black',
      'white'    => 'White',
    ), $field_id );
    
  }
  
}
/**
 * spacex switch type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_switch' ) ) {
  
  function ot_type_switch( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-checkbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';    
      
        /* build checkbox */

        
			echo '<div class="switch_options">';
			
			$on_label = 'On';
			$off_label = 'Off';
			
			foreach ( (array) $field_choices as $key => $choice ) {
				if ( isset( $choice['on_label'] ) ) {
					$on_label = esc_attr( $choice['on_label'] );
				}
				if ( isset( $choice['off_label'] ) ) {
					$off_label = esc_attr( $choice['off_label'] );
				}
			}
			
			echo '<span class="switch_button"></span>';

              echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="scheme_val ' . esc_attr( $field_class ) . '" />';
             
			  echo '</div>';
        
          
   
      
      echo '</div>';

    echo '</div>';
    
  }
  
}

/**
 * spacex Scheme Color.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_scheme' ) ) {
  
  function ot_type_scheme( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );

    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-checkbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';    
      
        /* build checkbox */

        
			echo '<div class="scheme_options clearfix">';
			
			
			$selected = '';
			foreach ( (array) $field_choices as $choice ) {
			 	
			  if ( isset( $choice['value'] ) ) {
				
				if($field_value == $choice['value'] )  
				{
					$selected = 'selected';
				}
				else
				{
					$selected = '';
				}
				
				echo '<span id="' . esc_attr( $choice['value'] ) . '" class="' . $selected . '" style="background:'.$choice['value'].'"></span>';
				
			  }
			}
			
			
              echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="scheme_val ' . esc_attr( $field_class ) . '" />';
             
			  echo '</div>';
        
          
   
      
      echo '</div>';

    echo '</div>';
    
  }
  
}
/**
 * Icon option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_icon' ) ) {
  
  function ot_type_icon( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      	
		 $icons = spacex_config_icons();
		
		 echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
             
              echo '<option value="">' . __( 'select-icon', 'option-tree' ) . '</option>';
              foreach ( $icons as $key ) {
              
                echo '<option value="' . esc_attr( $key['value'] ) . '" ' . selected( $key['value'], $field_value, false ) . '>' . esc_attr( $key['value'] ) . '</option>';
                
              }
              
            echo '</select>';
			

        
      echo '</div>';
    
    echo '</div>';
    
  }
  
}
/**
 * spacex Design Option.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_design' ) ) {
  
  function ot_type_design( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );


    /* format setting outer wrapper */
    echo '<div class="format-setting type-design no-desc">';

      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';    
	  
	   /* left col */
      echo '<div class="option-tree-ui-alignment">';
			
			/* margin */
			echo '<div class="option-tree-ui-margin">';
				 echo '<span class="option-tree-ui-margin-label">Margin</span>';			
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-top]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['margin-top'] ) ? esc_attr( $field_value['padding-top'] ) : '' ) . '" class="option-tree-ui-margin-top"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-bottom]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['margin-bottom'] ) ? esc_attr( $field_value['padding-bottom'] ) : '' ) . '" class="option-tree-ui-margin-bottom"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-left]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['margin-left'] ) ? esc_attr( $field_value['padding-left'] ) : '' ) . '" class="option-tree-ui-margin-left"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-right]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['margin-right'] ) ? esc_attr( $field_value['padding-right'] ) : '' ) . '" class="option-tree-ui-margin-right"/>';
			echo '</div>';
			
			/* border */
			echo '<div class="option-tree-ui-border">';
				 echo '<span class="option-tree-ui-border-label">Border</span>';			
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-top]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['border-top'] ) ? esc_attr( $field_value['border-top'] ) : '' ) . '" class="option-tree-ui-border-top"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-bottom]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['border-bottom'] ) ? esc_attr( $field_value['border-bottom'] ) : '' ) . '" class="option-tree-ui-border-bottom"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-left]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['border-left'] ) ? esc_attr( $field_value['border-left'] ) : '' ) . '" class="option-tree-ui-border-left"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[margin-right]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['border-right'] ) ? esc_attr( $field_value['border-right'] ) : '' ) . '" class="option-tree-ui-border-right"/>';
			echo '</div>';
			
			/* padding */
			echo '<div class="option-tree-ui-padding">';
				 echo '<span class="option-tree-ui-padding-label">Padding</span>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[padding-top]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['padding-top'] ) ? esc_attr( $field_value['padding-top'] ) : '' ) . '" class="option-tree-ui-padding-top"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[padding-bottom]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['padding-bottom'] ) ? esc_attr( $field_value['padding-bottom'] ) : '' ) . '" class="option-tree-ui-padding-bottom"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[padding-left]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['padding-left'] ) ? esc_attr( $field_value['padding-left'] ) : '' ) . '" class="option-tree-ui-padding-left"/>';
				 echo '<input type="text" name="' . esc_attr( $field_name ) . '[padding-right]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['padding-right'] ) ? esc_attr( $field_value['padding-right'] ) : '' ) . '" class="option-tree-ui-padding-right"/>';
			echo '</div>';
			
	  echo '</div>';
	  
	   /* right col */
      echo '<div class="option-tree-ui-alignment-right">';
			
          $ot_recognized_background_fields = apply_filters( 'ot_recognized_background_fields', array( 
          'background-color',
          'background-repeat', 
          'background-attachment', 
          'background-position',
          'background-size',
          'background-image',
		  'border-type',
		  'border-color',
		  'schema'
        ), $field_id );
         /* build font color */
        if ( in_array( 'schema', $ot_recognized_background_fields ) ) {
           echo '<div class="format-setting-label"><h3 class="label">Schema Color</h3></div>';
          /* build colorpicker */  
          echo '<div class="option-tree-ui-colorpicker-input-wrap">';
		  
             $schema = isset( $field_value['schema'] ) ? esc_attr( $field_value['schema'] ) : '';
            echo '<select name="' . esc_attr( $field_name ) . '[schema]" id="' . esc_attr( $field_id ) . '-schema" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
              
              echo '<option value="">' . __( 'schema', 'option-tree' ) . '</option>';
              foreach ( ot_recognized_schema( $field_id ) as $key => $value ) {
              
                echo '<option value="' . esc_attr( $key ) . '" ' . selected( $schema, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                
              }
              
            echo '</select>';
          
          
          echo '</div>';
		  echo '<div class="clearfix"></div>';
        
        }
        echo '<div class="ot-background-group">';
        echo '<div class="format-setting-label"><h3 class="label">Background</h3></div>';
          /* build background color */
          if ( in_array( 'background-color', $ot_recognized_background_fields ) ) {
          
            echo '<div class="option-tree-ui-colorpicker-input-wrap">';
              
              /* colorpicker JS */      
              echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id ) . '-picker"); });</script>';
              
              /* set background color */
              $background_color = isset( $field_value['background-color'] ) ? esc_attr( $field_value['background-color'] ) : '';
              
              /* input */
              echo '<input type="text" name="' . esc_attr( $field_name ) . '[background-color]" id="' . $field_id . '-picker" value="' . $background_color . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';
            
            echo '</div>';
          
          }
      
          /* build background repeat */
          if ( in_array( 'background-repeat', $ot_recognized_background_fields ) ) {
          
            $background_repeat = isset( $field_value['background-repeat'] ) ? esc_attr( $field_value['background-repeat'] ) : '';
            
            echo '<select name="' . esc_attr( $field_name ) . '[background-repeat]" id="' . esc_attr( $field_id ) . '-repeat" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
              
              echo '<option value="">' . __( 'background-repeat', 'option-tree' ) . '</option>';
              foreach ( ot_recognized_background_repeat( $field_id ) as $key => $value ) {
              
                echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_repeat, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                
              }
              
            echo '</select>';
          
          }
          
          /* build background attachment */
          if ( in_array( 'background-attachment', $ot_recognized_background_fields ) ) {
          
            $background_attachment = isset( $field_value['background-attachment'] ) ? esc_attr( $field_value['background-attachment'] ) : '';
            
            echo '<select name="' . esc_attr( $field_name ) . '[background-attachment]" id="' . esc_attr( $field_id ) . '-attachment" class="option-tree-ui-select ' . $field_class . '">';
              
              echo '<option value="">' . __( 'background-attachment', 'option-tree' ) . '</option>';
              
              foreach ( ot_recognized_background_attachment( $field_id ) as $key => $value ) {
              
                echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_attachment, $key, false ) . '>' . esc_attr( $value ) . '</option>';
              
              }
              
            echo '</select>';
          
          }
          
          /* build background position */
          if ( in_array( 'background-position', $ot_recognized_background_fields ) ) {
          
            $background_position = isset( $field_value['background-position'] ) ? esc_attr( $field_value['background-position'] ) : '';
            
            echo '<select name="' . esc_attr( $field_name ) . '[background-position]" id="' . esc_attr( $field_id ) . '-position" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
              
              echo '<option value="">' . __( 'background-position', 'option-tree' ) . '</option>';
              
              foreach ( ot_recognized_background_position( $field_id ) as $key => $value ) {
                
                echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_position, $key, false ) . '>' . esc_attr( $value ) . '</option>';
              
              }
            
            echo '</select>';
          
          }
  
          /* Build background size  */
          if ( in_array( 'background-size', $ot_recognized_background_fields ) ) {
            
            /**
             * Use this filter to create a select instead of an text input.
             * Be sure to return the array in the correct format. Add an empty 
             * value to the first choice so the user can leave it blank.
             *
                array( 
                  array(
                    'label' => 'background-size',
                    'value' => ''
                  ),
                  array(
                    'label' => 'cover',
                    'value' => 'cover'
                  ),
                  array(
                    'label' => 'contain',
                    'value' => 'contain'
                  )
                )
             *
             */
            $choices = apply_filters( 'ot_type_background_size_choices', '', $field_id );
            
            if ( is_array( $choices ) && ! empty( $choices ) ) {
            
              /* build select */
              echo '<select name="' . esc_attr( $field_name ) . '[background-size]" id="' . esc_attr( $field_id ) . '-size" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
              
                foreach ( (array) $choices as $choice ) {
                  if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                    echo '<option value="' . esc_attr( $choice['value'] ) . '"' . selected( ( isset( $field_value['background-size'] ) ? $field_value['background-size'] : '' ), $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';
                  }
                }
        
              echo '</select>';
            
            } else {
            
              echo '<input type="text" name="' . esc_attr( $field_name ) . '[background-size]" id="' . esc_attr( $field_id ) . '-size" value="' . ( isset( $field_value['background-size'] ) ? esc_attr( $field_value['background-size'] ) : '' ) . '" class="widefat ot-background-size-input option-tree-ui-input ' . esc_attr( $field_class ) . '" placeholder="' . __( 'background-size', 'option-tree' ) . '" />';
              
            }
          
          }
        
        echo '</div>';

        /* build background image */
        if ( in_array( 'background-image', $ot_recognized_background_fields ) ) {
			
		/* If an attachment ID is stored here fetch its URL and replace the value */
		if ( isset( $field_value['background-image'] ) && wp_attachment_is_image( $field_value['background-image'] ) ) {
		
		  $attachment_data = wp_get_attachment_image_src( $field_value['background-image'], 'original' );
		  
		  /* check for attachment data */
		  if ( $attachment_data ) {
		  
			$field_src = $attachment_data[0];
			
		  }
		  
		}
		
          echo '<div class="option-tree-ui-upload-parent">';
            
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '[background-image]" id="' . esc_attr( $field_id ) . '-image" value="' . ( isset( $field_value['background-image'] ) ? esc_attr( $field_value['background-image'] ) : '' ) . '" class="widefat option-tree-ui-upload-input ' . esc_attr( $field_class ) . '" placeholder="' . __( 'background-image', 'option-tree' ) . '" />';
            
            /* add media button */
            echo '<a href="javascript:void(0);" class="ot_upload_media option-tree-ui-button button button-primary light" rel="' . $post_id . '" title="' . __( 'Add Media', 'option-tree' ) . '"><span class="icon ot-icon-plus-circle"></span>' . __( 'Add Media', 'option-tree' ) . '</a>';
          
          echo '</div>';
          
          /* media */
          if ( isset( $field_value['background-image'] ) && $field_value['background-image'] !== '' ) {
            
            /* replace image src */
            if ( isset( $field_src ) )
              $field_value['background-image'] = $field_src;
          
            echo '<div class="option-tree-ui-media-wrap" id="' . esc_attr( $field_id ) . '_media">';
            
              if ( preg_match( '/\.(?:jpe?g|png|gif|ico)$/i', $field_value['background-image'] ) )
                echo '<div class="option-tree-ui-image-wrap"><img src="' . esc_url( $field_value['background-image'] ) . '" alt="" /></div>';
              
              echo '<a href="javascript:(void);" class="option-tree-ui-remove-media option-tree-ui-button button button-secondary light" title="' . __( 'Remove Media', 'option-tree' ) . '"><span class="icon ot-icon-minus-circle"></span>' . __( 'Remove Media', 'option-tree' ) . '</a>';
              
            echo '</div>';
            
          }
        
        }
		echo '<div class="clearfix"></div>';
		echo '<div class="format-setting-label"><h3 class="label">Border</h3></div>';
		 /* build border type */
          if ( in_array( 'border-type', $ot_recognized_background_fields ) ) {
          
            $border_type = isset( $field_value['border-type'] ) ? esc_attr( $field_value['border-type'] ) : '';
            
            echo '<select name="' . esc_attr( $field_name ) . '[border-type]" id="' . esc_attr( $field_id ) . '-border-type" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
              
              echo '<option value="">' . __( 'border-type', 'option-tree' ) . '</option>';
              
              foreach ( ot_recognized_border_type( $field_id ) as $key => $value ) {
                
                echo '<option value="' . esc_attr( $key ) . '" ' . selected( $border_type, $key, false ) . '>' . esc_attr( $value ) . '</option>';
              
              }
            
            echo '</select>';
          
          }
		  if ( in_array( 'border-color', $ot_recognized_background_fields ) ) {
          
            echo '<div class="option-tree-ui-colorpicker-input-wrap">';
              
              /* colorpicker JS */      
              echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id ) . '-border-picker"); });</script>';
              
              /* set background color */
              $border_color = isset( $field_value['border-color'] ) ? esc_attr( $field_value['border-color'] ) : '';
              
              /* input */
              echo '<input type="text" name="' . esc_attr( $field_name ) . '[border-color]" id="' . $field_id . '-border-picker" value="' . $border_color . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';
            
            echo '</div>';
          
          }

        echo '</div>';
          
   
       /* end format setting inner wrapper */
      echo '</div>';
	 /* end format setting outer wrapper */
    echo '</div>';
    
  }
  
}





/**
 * Social Links option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.4.0
 */
if ( ! function_exists( 'ot_type_color_scheme' ) ) {
  
  function ot_type_color_scheme( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* Load the default social links */
    if ( empty( $field_value ) && apply_filters( 'ot_type_color_scheme_load_defaults', true, $field_id ) ) {
      
      $field_value = apply_filters( 'ot_type_color_scheme_defaults', array(
         array(
          'title'    => __( 'CLOUDS', 'option-tree' ),
          'color'    => '#ecf0f1'
        ),
        array(
          'title'    => __( 'SILVER', 'option-tree' ),
          'color'   => '#bdc3c7',
        ),
        array(
          'title'    => __( 'CONCRETE', 'option-tree' ),
          'color'   => '#95a5a6',
        ),
        array(
          'title'    => __( 'ASBESTOS', 'option-tree' ),
          'color'    => '#7f8c8d'
        ),
		
		 array(
          'title'    => __( 'TURQUOISE', 'option-tree' ),
          'color'    => '#1ABC9C'
        ),
		 array(
          'title'    => __( 'GREEN SEA', 'option-tree' ),
          'color'    => '#16A085'
        ),
		 array(
          'title'    => __( 'EMERALD', 'option-tree' ),
          'color'    => '#2ECC71'
        ),
		 array(
          'title'    => __( 'NEPHRITIS', 'option-tree' ),
          'color'    => '#27AE60'
        ),
		 array(
          'title'    => __( 'PETER RIVER', 'option-tree' ),
          'color'    => '#3498DB'
        ),
		 array(
          'title'    => __( 'BELIZE HOLE', 'option-tree' ),
          'color'    => '#2980B9'
        ),
		 array(
          'title'    => __( 'AMETHYST', 'option-tree' ),
          'color'    => '#9B59B6'
        ),
		 array(
          'title'    => __( 'WISTERIA', 'option-tree' ),
          'color'    => '#8E44AD'
        ),
		 array(
          'title'    => __( 'WET ASPHALT', 'option-tree' ),
          'color'    => '#34495E'
        ),
		
		 array(
          'title'    => __( 'MIDNIGHT BLUE', 'option-tree' ),
          'color'    => '#2C3E50'
        ),
		 array(
          'title'    => __( 'SUN FLOWER', 'option-tree' ),
          'color'    => '#F1C40F'
        ),
		 array(
          'title'    => __( 'ORANGE', 'option-tree' ),
          'color'    => '#F39C12'
        ),
		 array(
          'title'    => __( 'CARROT', 'option-tree' ),
          'color'    => '#E67E22'
        ),
		 array(
          'title'    => __( 'PUMPKIN', 'option-tree' ),
          'color'    => '#D35400'
        ),
		 array(
          'title'    => __( 'ALIZARIN', 'option-tree' ),
          'color'    => '#E74C3C'
        ),
		 array(
          'title'    => __( 'POMEGRANATE', 'option-tree' ),
          'color'    => '#C0392B'
        ),
		 array(
          'title'    => __( 'WET ASPHALT', 'option-tree' ),
          'color'    => '#34495E'
        ),
      ), $field_id );
      
    }
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;

    /* format setting outer wrapper */
    echo '<div class="format-setting type-social-list-item ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
        
        /* pass the settings array arround */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( serialize( $field_settings ) ) . '" />';
        
        /** 
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metabox settings.
         */
        if ( ! isset( $get_option ) )
          $get_option = '';
          
        /* build list items */
        echo '<ul class="option-tree-setting-wrap option-tree-sortable" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';
        
        if ( is_array( $field_value ) && ! empty( $field_value ) ) {
        
          foreach( $field_value as $key => $link ) {
            
            echo '<li class="ui-state-default list-list-item">';
              ot_color_scheme_view( $field_id, $key, $link, $post_id, $get_option, $field_settings, $type );
            echo '</li>';
            
          }
          
        }
        
        echo '</ul>';
        
        /* button */
        echo '<a href="javascript:void(0);" class="option-tree-color-scheme-add option-tree-ui-button button button-primary right hug-right" title="' . __( 'Add New', 'option-tree' ) . '">' . __( 'Add New', 'option-tree' ) . '</a>';
        
        /* description */
        echo '<div class="list-item-description">' . apply_filters( 'ot_social_links_description', __( 'You can re-order with drag & drop, the order will update after saving.', 'option-tree' ), $field_id ) . '</div>';
      
      echo '</div>';

    echo '</div>';
    
  }
  
}

/**
 * Helper function to display social links.
 *
 * This function is used in AJAX to add a new list items
 * and when they have already been added and saved.
 *
 * @param     string    $name The form field name.
 * @param     int       $key The array key for the current element.
 * @param     array     An array of values for the current list item.
 *
 * @return    void
 *
 * @access    public
 * @since     2.4.0
 */
if ( ! function_exists( 'ot_color_scheme_view' ) ) {

  function ot_color_scheme_view( $name, $key, $list_item = array(), $post_id = 0, $get_option = '', $settings = array(), $type = '' ) {
    
    /* if no settings array load the filterable social links settings */
    if ( empty( $settings ) ) {
      $settings = ot_color_scheme_settings( $name ); 
    }
    echo '
    <div class="option-tree-setting">
      <div class="open"><div class="preview_color_scheme" style="background:'. (isset( $list_item['color']) ? esc_attr($list_item['color'])  : '').'"></div>' . ( isset( $list_item['title'] ) ? esc_attr( $list_item['title'] ) : '' ) . '</div>
      <div class="button-section">
        <a href="javascript:void(0);" class="option-tree-setting-edit option-tree-ui-button button left-item" title="' . __( 'Edit', 'option-tree' ) . '">
          <span class="icon ot-icon-pencil"></span>' . __( 'Edit', 'option-tree' ) . '
        </a>
        <a href="javascript:void(0);" class="option-tree-setting-remove option-tree-ui-button button button-secondary light right-item" title="' . __( 'Delete', 'option-tree' ) . '">
          <span class="icon ot-icon-trash-o"></span>' . __( 'Delete', 'option-tree' ) . '
        </a>
      </div>
      <div class="option-tree-setting-body">';
        
      foreach( $settings as $field ) {
        
        // Set field value
        $field_value = isset( $list_item[$field['id']] ) ? $list_item[$field['id']] : '';
        
        /* set default to standard value */
        if ( isset( $field['std'] ) ) {  
          $field_value = ot_filter_std_value( $field_value, $field['std'] );
        }
          
        /* make life easier */
        $_field_name = $get_option ? $get_option . '[' . $name . ']' : $name;
             
        /* build the arguments array */
        $_args = array(
          'type'              => $field['type'],
          'field_id'          => $name . '_' . $field['id'] . '_' . $key,
          'field_name'        => $_field_name . '[' . $key . '][' . $field['id'] . ']',
          'field_value'       => $field_value,
          'field_desc'        => isset( $field['desc'] ) ? $field['desc'] : '',
          'field_std'         => isset( $field['std'] ) ? $field['std'] : '',
          'field_rows'        => isset( $field['rows'] ) ? $field['rows'] : 10,
          'field_post_type'   => isset( $field['post_type'] ) && ! empty( $field['post_type'] ) ? $field['post_type'] : 'post',
          'field_taxonomy'    => isset( $field['taxonomy'] ) && ! empty( $field['taxonomy'] ) ? $field['taxonomy'] : 'category',
          'field_min_max_step'=> isset( $field['min_max_step'] ) && ! empty( $field['min_max_step'] ) ? $field['min_max_step'] : '0,100,1',
          'field_class'       => isset( $field['class'] ) ? $field['class'] : '',
          'field_condition'   => isset( $field['condition'] ) ? $field['condition'] : '',
          'field_operator'    => isset( $field['operator'] ) ? $field['operator'] : 'and',
          'field_choices'     => isset( $field['choices'] ) && ! empty( $field['choices'] ) ? $field['choices'] : array(),
          'field_settings'    => isset( $field['settings'] ) && ! empty( $field['settings'] ) ? $field['settings'] : array(),
          'post_id'           => $post_id,
          'get_option'        => $get_option
        );
        
        $conditions = '';
        
        /* setup the conditions */
        if ( isset( $field['condition'] ) && ! empty( $field['condition'] ) ) {
          
          /* doing magic on the conditions so they work in a list item */
          $conditionals = explode( ',', $field['condition'] );
          foreach( $conditionals as $condition ) {
            $parts = explode( ':', $condition );
            if ( isset( $parts[0] ) ) {
              $field['condition'] = str_replace( $condition, $name . '_' . $parts[0] . '_' . $key . ':' . $parts[1], $field['condition'] );
            }
          }

          $conditions = ' data-condition="' . $field['condition'] . '"';
          $conditions.= isset( $field['operator'] ) && in_array( $field['operator'], array( 'and', 'AND', 'or', 'OR' ) ) ? ' data-operator="' . $field['operator'] . '"' : '';

        }
          
        /* option label */
        echo '<div id="setting_' . $_args['field_id'] . '" class="format-settings"' . $conditions . '>';
          
          /* don't show title with textblocks */
          if ( $_args['type'] != 'textblock' && ! empty( $field['label'] ) ) {
            echo '<div class="format-setting-label">';
              echo '<h3 class="label">' . esc_attr( $field['label'] ) . '</h3>';
            echo '</div>';
          }
          
          /* only allow simple textarea inside a list-item due to known DOM issues with wp_editor() */
          if ( $_args['type'] == 'textarea' )
            $_args['type'] = 'textarea-simple';
          
          /* option body, list-item is not allowed inside another list-item */
          if ( $_args['type'] !== 'list-item' && $_args['type'] !== 'slider' && $_args['type'] !== 'color-scheme' ) {
            echo ot_display_by_type( $_args );
          }
        
        echo '</div>';
      
      }
        
      echo '</div>';
    
    echo '</div>';
    
  }
  
}

if ( ! function_exists( 'ot_color_scheme_settings' ) ) {

  function ot_color_scheme_settings( $id ) {
    
    $settings = apply_filters( 'ot_color_scheme_settings', array(
      array(
        'id'        => 'title',
        'label'     => 'Title',
        'desc'      => __( 'Name of color', 'option-tree' ),
        'type'      => 'text'
      ),
      array(
        'id'        => 'color',
        'label'     => 'Color',
        'desc'      =>  __( 'Color picker', 'option-tree' ),
        'type'      => 'colorpicker',
      )
    ), $id );
    
    return $settings;
  
  }

}

add_action( 'wp_ajax_add_color_scheme', 'add_color_scheme'  );

function add_color_scheme() {
      ot_color_scheme_view( $_REQUEST['name'], $_REQUEST['count'], array(), $_REQUEST['post_id'], $_REQUEST['get_option'], unserialize( ot_decode( $_REQUEST['settings'] ) ), $_REQUEST['type'] );
      die();
}