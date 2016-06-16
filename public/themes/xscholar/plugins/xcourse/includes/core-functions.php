<?php

function is_product_used_for_course()
{
	global $wp_query, $wp;
	
	$product = wc_get_product( $wp_query->post );
	
	 $args = array(
				'post_type'  => 'xcourse',
				'orderby'         => 'date',
				'order'           => 'DESC',
				'meta_key'        => 'course_selling',
				'meta_value'      =>  $product->id,
				'meta_compare'      => '=',
				'post_status'     => 'publish',
	);
									 
	$query_course = new WP_Query( $args );
					
	if ( $query_course->have_posts() ) :
		return true;
	endif;
	
	return false;
}
function get_course_by_product_id($product_id)
{
	
	 $args = array(
				'post_type'  => 'xcourse',
				'orderby'         => 'date',
				'order'           => 'DESC',
				'meta_key'        => 'course_selling',
				'meta_value'      =>  $product_id,
				'meta_compare'      => '=',
				'post_status'     => 'publish',
	);
									 
	$query_course = new WP_Query( $args );
					
	if ( $query_course->have_posts() ) :
		while ( $query_course->have_posts() ) : $query_course->the_post();
			return get_the_id();
		endwhile;
		wp_reset_postdata();
	endif;
	
	return false;
}

function is_product_used_for_event()
{
	global $wp_query, $wp;
	
	$product = wc_get_product( $wp_query->post );
	
	 $args = array(
				'post_type'  => 'xevent',
				'orderby'         => 'date',
				'order'           => 'DESC',
				'meta_key'        => 'event_selling',
				'meta_value'      =>  $product->id,
				'meta_compare'      => '=',
				'post_status'     => 'publish',
	);
									 
	$query_event = new WP_Query( $args );
					
	if ( $query_event->have_posts() ) :
		return true;
	endif;
	
	return false;
}
function get_event_by_product_id($product_id)
{
	
	 $args = array(
				'post_type'  => 'xevent',
				'orderby'         => 'date',
				'order'           => 'DESC',
				'meta_key'        => 'event_selling',
				'meta_value'      =>  $product_id,
				'meta_compare'      => '=',
				'post_status'     => 'publish',
	);
									 
	$query_event = new WP_Query( $args );
					
	if ( $query_event->have_posts() ) :
		while ( $query_event->have_posts() ) : $query_event->the_post();
			return get_the_id();
		endwhile;
		wp_reset_postdata();
	endif;
	
	return false;
}

function xcourse_get_price()
{
	global $post;
	$product_id = get_post_meta($post->ID,'course_selling',true);
	if(!empty($product_id))
	{
		$product_obj = wc_get_product( $product_id );
			
		 if( $product_obj->price != '0' ) {
			if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
				{ return apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), '' ); }
			else
				{ return apply_filters( 'woocommerce_cart_item_price_html', '<span>Price</span> ' . woocommerce_price( $product_obj->get_price() ), '' ); }
		} else {
			return apply_filters( 'spacex_free_text', __( 'Free!', 'spacex' ) );
		}
	}
}
function xcourse_get_enroll_members()
{
	global $post;
	$output = '';
	
	$product_id = get_post_meta($post->ID,'course_selling',true);
		if(!empty($product_id))
		{
		$product_obj = wc_get_product( $product_id );
			
		$units_sold = get_post_meta( $product_obj->id, 'total_sales', true );
						
		if($units_sold != '' && $units_sold>=0)
		{
			$output .= '<i class="fa fa-users"></i>'.$units_sold;
		}
	}
	return $output;
}
	
if ( ! function_exists( 'sc_get_option' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function sc_get_option($id) {
		$filter_option = get_option('option_tree');
		
		if(isset($filter_option[$id]))
		{
			return $filter_option[$id];
		}
	}
}
if ( ! function_exists( 'is_course_taxonomy' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_course_taxonomy() {
		return is_tax( get_object_taxonomies( 'xcourse' ) );
	}
}
if ( ! function_exists( 'is_course_category' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_course_category($term = '') {
		return is_tax( 'course_cat', $term );
	}
}
if ( ! function_exists( 'is_course_tag' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_course_tag($term = '') {
		return is_tax( 'course_tag', $term );
	}
}
if ( ! function_exists( 'is_course' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_course() {
		return is_singular( array( 'xcourse' ) );
	}
}
if ( ! function_exists( 'is_instructor' ) ) {

	/**
	 * is_product_taxonomy - Returns true when viewing a product taxonomy archive.
	 *
	 * @access public
	 * @return bool
	 */
	function is_instructor() {
		return is_singular( array( 'instructor' ) );
	}
}
function sc_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/xcourse/slug-name.php
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", X_PLUGIN_TEMPLATE . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php
	if ( ! $template && $name && file_exists( X_PLUGIN_TEMPLATE . "/{$slug}-{$name}.php" ) ) {
		$template = X_PLUGIN_TEMPLATE . "/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/woocommerce/slug.php
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", X_PLUGIN_TEMPLATE . "{$slug}.php" ) );
	}
	
	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'sc_get_template_part', $template, $slug, $name );
	if ( $template ) {
		load_template( $template, false );
	}
}
function sc_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = sc_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'sc_get_template', $located, $template_name, $args, $template_path, $default_path );

	//do_action( 'woocommerce_before_template_part', $template_name, $template_path, $located, $args );
	
	include( $located );

	//do_action( 'woocommerce_after_template_part', $template_name, $template_path, $located, $args );
}

function sc_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = SC()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = SC()->plugin_path() . '/templates/';
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
	return apply_filters('xcourse_locate_template', $template, $template_name, $template_path);
}

function get_xcourse_categories( $id, $sep = ' ', $before = ' ', $after = ' ' ) {
	return get_the_term_list( $id, 'course_cat', $before, ' ', $after );
}
function get_xcourse_tags( $id, $sep = ' ', $before = ' ', $after = ' ' ) {
	return get_the_term_list( $id, 'course_tag', $before, ' ', $after );
}

function get_product_by_course_id($course_id)
{
	global $woocommerce;
	$product_id = get_post_meta($course_id,'course_selling',true);
	$product_obj = get_product( $product_id );	
	
	return $product_obj;
}

function sc_clean( $var ) {
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
function sc_get_image_size( $image_size ) {
	if ( in_array( $image_size, array( 'course_thumbnail', 'course_catalog', 'course_single' ) ) ) {
		
		$size = sc_get_option($image_size);		

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

	return apply_filters( 'xcourse_get_image_size_' . $image_size, $size );
}
/**
 * Check product in cart
 *
 *
 * @param string $product_id
 * @return true/false
 */
function is_product_in_cart($product_id)
{
	
	if(class_exists('Woocommerce'))
	{
		global $woocommerce;
		
		foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
			
				if( $product_id == $_product->id ) {
					return true;
				}
		}	
	}
	return false;
}

/**
 * Redirect to check out
 *
 * @param none
 * @return checkout_url
 */
 
function woo_redirect_to_checkout() {
  global $woocommerce;
	$checkout_url = $woocommerce->cart->get_checkout_url();
	return $checkout_url;
}
add_filter ('add_to_cart_redirect', 'woo_redirect_to_checkout');

/* ---------------------------------------------------------------------- */
/* Modify Cart Item Data
/* ---------------------------------------------------------------------- */
/**
 * Add meta data to cart item
 *
 * @param none
 * @return $cart_item
 */

function woocommerce_add_cart_item_custom( $cart_item ) {
	return $cart_item; // operation done while item is added to cart
}
add_filter( 'woocommerce_add_cart_item', 'woocommerce_add_cart_item_custom' );

/**
 * Add meta data to cart item
 *
 * @param none
 * @return $cart_item
 */

function add_cart_item_data_custom($cart_item_meta, $product_id){
	
	global $woocommerce;
	
	$query_course_args = array(
		'post_type'	=> 'xcourse',
		'post_status' => 'publish',
		'posts_per_page'     => 1,
		'orderby'         => 'date',
		'order'           => 'DESC',
		'meta_key' 		=> 'course_selling',
		'meta_value' 	=>  $product_id,
		'meta_compare' 	=>  '=',
	);
	
	$courses = new WP_Query( $query_course_args );
	
	
	$cart_item_meta['spacex_product'] = '';
	
	if($courses->have_posts())	
	{
  		$cart_item_meta['spacex_product'] = 'course';
	}
	else
	{
		$query_event_args = array(
			'post_type'	=> 'xevent',
			'post_status' => 'publish',
			'posts_per_page'     => 1,
			'orderby'         => 'date',
			'order'           => 'DESC',
			'meta_key' 		=> 'event_selling',
			'meta_value' 	=>  $product_id,
			'meta_compare' 	=>  '=',
		);
		
		$events = new WP_Query( $query_event_args );
		if($events->have_posts())	
		{
			$cart_item_meta['spacex_product'] = 'ticket';
		}
	
	}

	return $cart_item_meta;
}
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_data_custom', 10, 2 );
/**
 * Load cart data per page
 *
 * @param none
 * @return $cart_item
 */
function get_cart_item_from_session_custom( $cart_item, $values ) {
	
	if (!empty($values['spacex_product'])) :
		$cart_item['spacex_product'] = $values['spacex_product'];
	endif;
	
	$cart_item = woocommerce_add_cart_item_custom( $cart_item );
	
	return $cart_item;
}
add_filter( 'woocommerce_get_cart_item_from_session', 'get_cart_item_from_session_custom', 20, 2 );
/**
 * Display custom data to cart
 *
 * @param none
 * @return $cart_item
 */
function get_item_data_custom( $other_data, $cart_item ) {
	
	$spacex_product = $cart_item['spacex_product'] ? $cart_item['spacex_product'] : '';
	echo '<span class="spacex-product">'.$spacex_product.'</span>';
}
add_filter( 'woocommerce_get_item_data', 'get_item_data_custom', 10, 2 );
/**
 * Add custom data to order
 *
 * @param none
 * @return $cart_item
 */
function add_order_item_meta_custom( $item_id, $values ) {
	
	$spacex_product = $values['spacex_product'] ? $values['spacex_product'] : '';
	woocommerce_add_order_item_meta( $item_id, 'XScholar ', $spacex_product );
	woocommerce_add_order_item_meta( $item_id, 'Product ID  ', $item_id );
	
}
add_action( 'woocommerce_add_order_item_meta', 'add_order_item_meta_custom', 10, 2 );



/* ---------------------------------------------------------------------- */
/*	Product List Ajax Filter
/* ---------------------------------------------------------------------- */
add_action( 'wp_ajax_product_filter_shortcode', 'spacex_filter_shortcode_product' );
add_action( 'wp_ajax_nopriv_product_filter_shortcode', 'spacex_filter_shortcode_product' );

function spacex_filter_shortcode_product()
{	
	$cat = $_POST['cat_id'];
	
	$perpage = 3;
	
	if(isset($_POST['perpage']))
	{
		$perpage = $_POST['perpage'];
	}
    $query_args = array(
        'posts_per_page' 	=> $perpage,
        'post_status' 	=> 'publish',
        'orderby' 		=> 'date',
        'order' 		=> 'DESC',
		'post_type'	=> 'xcourse' ,
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
    );
	       
    if ( ! empty( $cat ) ) {
        $tax = 'course_cat';
        $cat = array_map( 'trim', explode( ',', $cat ) );
        if ( count($cat) == 1 ) 
		{
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => $tax,
					'field' => 'slug',
					'terms' => $cat[0]
				)
			);
		}
    }


	$products = new WP_Query( $query_args );

    ob_start();
	
    
    $output = '';
	if ( $products->have_posts() ) :
	
        while ( $products->have_posts() ) : $products->the_post(); 		
	        $output .= get_course_content_file_grid();
		endwhile; // end of the loop.
		
		wp_reset_postdata();
	endif;

	
	
	$output = json_encode($output);
    echo $output;
	
	die();

	

}	
/* ---------------------------------------------------------------------- */
/*	Add course or event title to product table
/* ---------------------------------------------------------------------- */
add_filter( 'manage_edit-product_columns', 'x_product_columns' );
add_action( 'manage_product_posts_custom_column', 'x_product_column', 2 );
		
function x_product_columns($existing_columns)
{
	$columns          = array();
	$columns['xproduct']        = __( 'Type', 'woocommerce' );
	return array_merge( $columns, $existing_columns );
}
function x_product_column($column)
{
	global $post;

		if ( $column == 'xproduct' ) {
			
			$course_id = get_course_by_product_id($post->ID);
			$event_id = get_event_by_product_id($post->ID);
			if($course_id)
			{
				echo 'Course';
			}
			elseif($event_id)
			{
				echo 'Event';
			}

		}
	
}