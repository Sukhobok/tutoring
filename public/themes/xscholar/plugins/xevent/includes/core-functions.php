<?php
function xevent_get_price()
{
	global $post;
	$product_id = get_post_meta($post->ID,'event_selling',true);
	$product_obj = wc_get_product( $product_id );
		
	 if( $product_obj !== false && $product_obj->exists() && $product_obj->price != '0' ) {
		if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
			{ return apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), '' ); }
		else
			{ return apply_filters( 'woocommerce_cart_item_price_html', '<span>Price</span> ' . woocommerce_price( $product_obj->get_price() ), '' ); }
	} else {
		return apply_filters( 'spacex_free_text', __( 'Free!', 'spacex' ) );
	}		
}
function xevent_get_enroll_members()
{
	global $post;
	$output = '';
	
	$product_id = get_post_meta($post->ID,'event_selling',true);
	$product_obj = wc_get_product( $product_id );
	
	if( $product_obj !== false)	
	{
		$units_sold = get_post_meta( $product_obj->id, 'total_sales', true );
						
		if($units_sold != '' && $units_sold>=0)
		{
	
			$output .= '<i class="fa fa-users"></i>'.$units_sold;
		}
	}
	return $output;
}
	
if ( ! function_exists( 'xt_get_option' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function xt_get_option($id) {
		$filter_option = get_option('option_tree');
		if(isset($filter_option[$id]))
		{
			return $filter_option[$id];
		}
		else
		{
			return false;
		}
	}
}
if ( ! function_exists( 'is_event_taxonomy' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_event_taxonomy() {
		return is_tax( get_object_taxonomies( 'xevent' ) );
	}
}
if ( ! function_exists( 'is_event_category' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_event_category($term = '') {
		return is_tax( 'event_cat', $term );
	}
}
if ( ! function_exists( 'is_event_tag' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_event_tag($term = '') {
		return is_tax( 'event_tag', $term );
	}
}
if ( ! function_exists( 'is_event' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_event() {
		return is_singular( array( 'xevent' ) );
	}
}
if ( ! function_exists( 'is_speaker' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_speaker() {
		return is_singular( array( 'speaker' ) );
	}
}
function xt_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/xevent/slug-name.php
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", XT_PLUGIN_TEMPLATE . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php
	if ( ! $template && $name && file_exists( XT_PLUGIN_TEMPLATE . "/{$slug}-{$name}.php" ) ) {
		$template = XT_PLUGIN_TEMPLATE . "/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/woocommerce/slug.php
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", XT_PLUGIN_TEMPLATE . "{$slug}.php" ) );
	}
	
	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'xt_get_template_part', $template, $slug, $name );
	if ( $template ) {
		load_template( $template, false );
	}
}
function xt_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = xt_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'xt_get_template', $located, $template_name, $args, $template_path, $default_path );

	//do_action( 'woocommerce_before_template_part', $template_name, $template_path, $located, $args );
	
	include( $located );

	//do_action( 'woocommerce_after_template_part', $template_name, $template_path, $located, $args );
}

function xt_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = XT()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = XT()->plugin_path() . '/templates/';
	}
	

	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);

	// Get default template
	if ( ! $template ) {
		$template = $default_path . $template_name;
	}

	// Return what we found
	return apply_filters('xevent_locate_template', $template, $template_name, $template_path);
}

function get_xevent_categories( $id, $sep = ' ', $before = ' ', $after = ' ' ) {
	return get_the_term_list( $id, 'event_cat', $before, ' ', $after );
}
function get_xevent_tags( $id, $sep = ' ', $before = ' ', $after = ' ' ) {
	return get_the_term_list( $id, 'event_tag', $before, ' ', $after );
}

function get_product_by_event_id($event_id)
{
	global $woocommerce;
	$product_id = get_post_meta($event_id,'event_selling',true);
	$product_obj = get_product( $product_id );	
	
	return $product_obj;
}

function xt_clean( $var ) {
	return sanitize_text_field( $var );
}
/**
 * Get an image size.
 *
 * Variable is filtered by woocommerce_get_image_size_{image_size}
 *
 * @param string $image_size
 * @return array
 */
function xt_get_image_size( $image_size ) {
	if ( in_array( $image_size, array( 'event_thumbnail', 'event_catalog', 'event_single' ) ) ) {
		
		$size = xt_get_option($image_size);		

		$size['width']  = isset( $size['width'] ) ? $size['width'] : '300';
		$size['height'] = isset( $size['height'] ) ? $size['height'] : '300';
		$size['crop']   = isset( $size['crop'] ) ? $size['crop'] : 1;
	} else {
		$size = array(
			'width'  => '300',
			'height' => '300',
			'crop'   => 1
		);
	}

	return apply_filters( 'xevent_get_image_size_' . $image_size, $size );
}