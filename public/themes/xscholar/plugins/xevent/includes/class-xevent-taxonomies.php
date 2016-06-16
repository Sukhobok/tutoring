<?php
/**
 * Handles taxonomies in admin
 *
 * @class 		XEvent_Taxonomies
 * @version		2.1.0
 * @package		XEvent/includes
 * @category	Class
 * @author 		SpaceX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * WC_Admin_Taxonomies class.
 */
class XEvent_Taxonomies {

	/**
	 * Constructor
	 */
	public function __construct() {

		// Add form
		add_action( 'event_cat_add_form_fields', array( $this, 'add_category_fields' ) );
		add_action( 'event_cat_edit_form_fields', array( $this, 'edit_category_fields' ), 10, 2 );	
		add_action( 'created_event_cat', array( $this, 'save_category_fields' ), 10, 3 );
		add_action( 'edit_event_cat', array( $this, 'save_category_fields' ), 10, 3 );

		// Add columns
		add_filter( 'manage_edit-event_cat_columns', array( $this, 'event_cat_columns' ) );
		add_filter( 'manage_event_cat_custom_column', array( $this, 'event_cat_column' ), 10, 3 );

	}
	
	/**
	 * Category thumbnail fields.
	 *
	 * @access public
	 * @return void
	 */
	public function add_category_fields() {
		?>
        <div class="form-field">
			<label><?php _e( 'Scheme', 'spacex' ); ?></label>
			
				<?php spacex_select_color_scheme('event_cat_color', $value = '');?>

			<div class="clear"></div>
         </div>   
		<div class="form-field">
			<label><?php _e( 'Thumbnail', 'spacex' ); ?></label>
			<div id="event_cat_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo wc_placeholder_img_src(); ?>" width="60px" height="60px" /></div>
			<div style="line-height:60px;">
				<input type="hidden" id="event_cat_thumbnail_id" name="event_cat_thumbnail_id" />
				<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'spacex' ); ?></button>
				<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'spacex' ); ?></button>
			</div>
			<script type="text/javascript">

				 // Only show the "remove image" button when needed
				 if ( ! jQuery('#event_cat_thumbnail_id').val() )
					 jQuery('.remove_image_button').hide();

				// Uploading files
				var file_frame;

				jQuery(document).on( 'click', '.upload_image_button', function( event ){

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( file_frame ) {
						file_frame.open();
						return;
					}

					// Create the media frame.
					file_frame = wp.media.frames.file_frame = wp.media({
						title: '<?php _e( 'Choose an image', 'spacex' ); ?>',
						button: {
							text: '<?php _e( 'Use image', 'spacex' ); ?>',
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						attachment = file_frame.state().get('selection').first().toJSON();

						jQuery('#event_cat_thumbnail_id').val( attachment.id );
						jQuery('#event_cat_thumbnail img').attr('src', attachment.url );
						jQuery('.remove_image_button').show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery(document).on( 'click', '.remove_image_button', function( event ){
					jQuery('#event_cat_thumbnail img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
					jQuery('#event_cat_thumbnail_id').val('');
					jQuery('.remove_image_button').hide();
					return false;
				});

			</script>
			<div class="clear"></div>
		</div>
		<?php
	}
	
	/**
	 * Edit category thumbnail field.
	 *
	 * @access public
	 * @param mixed $term Term (category) being edited
	 * @param mixed $taxonomy Taxonomy of the term being edited
	 */
	public function edit_category_fields( $term, $taxonomy ) {

		$image 			= '';
		$thumbnail_id 	= absint( get_option('event_taxonomy_thumbnail'. $term->term_id, true ) );
		$color 	= get_option('event_taxonomy_color'. $term->term_id, true );
		
		if ( $thumbnail_id )
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		else
			$image = wc_placeholder_img_src();
			
		?>
		 <div class="form-field">
			
			
				

			<div class="clear"></div>
         </div>   
         <tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Scheme', 'spacex' ); ?></label></th>
			<td>
			<?php spacex_select_color_scheme('event_cat_color', $color);?>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Thumbnail', 'spacex' ); ?></label></th>
			<td>
				<div id="event_cat_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo esc_url($image); ?>" width="60px" height="60px" /></div>
				<div style="line-height:60px;">
					<input type="hidden" id="event_cat_thumbnail_id" name="event_cat_thumbnail_id" value="<?php echo esc_attr($thumbnail_id); ?>" />
					<button type="submit" class="upload_image_button button"><?php _e( 'Upload/Add image', 'spacex' ); ?></button>
					<button type="submit" class="remove_image_button button"><?php _e( 'Remove image', 'spacex' ); ?></button>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function(){
					    var file_frame;
 
						jQuery('.upload_image_button').click(function(e) {
					 
							e.preventDefault();
					 
							//If the uploader object has already been created, reopen the dialog
							if (file_frame) {
								file_frame.open();
								return;
							}
					 
							//Extend the wp.media object
							file_frame = wp.media.frames.file_frame = wp.media({
								title: 'Choose Image',
								button: {
									text: 'Choose Image'
								},
								multiple: false
							});
					 
							//When a file is selected, grab the URL and set it as the text field's value
							file_frame.on('select', function() {
								attachment = file_frame.state().get('selection').first().toJSON();
								jQuery('#event_cat_thumbnail_id').val(attachment.id);
								jQuery('#event_cat_thumbnail img').attr('src', attachment.url);
							});
					 
							//Open the uploader dialog
							file_frame.open();
					 
						});

						jQuery(document).on( 'click', '.remove_image_button', function( event ){
							jQuery('#event_cat_thumbnail img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
							jQuery('#event_cat_thumbnail_id').val('');
							jQuery('.remove_image_button').hide();
							return false;
						});
					});	
				</script>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}

	/**
	 * save_category_fields function.
	 *
	 * @access public
	 * @param mixed $term_id Term ID being saved
	 * @param mixed $tt_id
	 * @param mixed $taxonomy Taxonomy of the term being saved
	 * @return void
	 */
	public function save_category_fields( $term_id, $tt_id , $taxonomy ) {

		if ( isset( $_POST['event_cat_thumbnail_id'] ) ) {
			update_option('event_taxonomy_thumbnail'.$term_id, $_POST['event_cat_thumbnail_id']);
		}
		if ( isset( $_POST['event_cat_color'] ) ) {
			update_option('event_taxonomy_color'.$term_id, $_POST['event_cat_color']);
		}
		
		
		
	}


	/**
	 * Thumbnail column added to category admin.
	 *
	 * @access public
	 * @param mixed $columns
	 * @return array
	 */
	public function event_cat_columns( $columns ) {
		$new_columns          = array();
		$new_columns['cb']    = $columns['cb'];
		$new_columns['thumb'] = __( 'Image', 'spacex' );
		$new_columns['color'] = __( 'Color', 'spacex' );

		unset( $columns['cb'] );

		return array_merge( $new_columns, $columns );
	}
	

	/**
	 * Thumbnail column value added to category admin.
	 *
	 * @access public
	 * @param mixed $columns
	 * @param mixed $column
	 * @param mixed $id
	 * @return array
	 */
	public function event_cat_column( $columns, $column, $id ) {

		if ( $column == 'thumb' ) {

			$image 			= '';
			$thumbnail_id 	= absint( get_option('event_taxonomy_thumbnail'. $id, true ) );
		
			if ( $thumbnail_id )
				$image = wp_get_attachment_thumb_url( $thumbnail_id );
			else
				$image = wc_placeholder_img_src();

			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: http://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			$columns .= '<img src="' . esc_url( $image ) . '" alt="' . __( 'Thumbnail', 'spacex' ) . '" class="wp-post-image" height="48" width="48" />';

		}
		if ( $column == 'color' ) {

			$color 	= get_option('event_taxonomy_color'. $id, true );

			$columns .= '<div class="preview_color_scheme" style="width:15px; height:15px; background:'.$color.'"></div>';

		}

		return $columns;
	}


}
new XEvent_Taxonomies();

		
	