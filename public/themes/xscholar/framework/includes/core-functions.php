<?php
/**
 * Spacex Helper
 *
 * Functions for Whole Theme.
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/* ---------------------------------------------------------------------- */
/*	Count Wishlist Products
/* ---------------------------------------------------------------------- */
function count_wishlist_products() {

   if( spacex_usecookies() ) {
		$cookie = spacex_getcookie( 'spacex_wishlist_products' );
		return count( $cookie );
	} else {
		if( isset( $_SESSION['spacex_wishlist_products'] ) )
			{ return count( $_SESSION['spacex_wishlist_products'] ); }
	}

	return 0;
}
/* ---------------------------------------------------------------------- */
/*	Count Compared Products
/* ---------------------------------------------------------------------- */
function count_compare_products() {

           if( spacex_usecookies() ) {
                $cookie = spacex_getcookie( 'spacex_compared_products' );
                return count( $cookie );
            } else {
                if( isset( $_SESSION['spacex_compared_products'] ) )
        			{ return count( $_SESSION['spacex_compared_products'] ); }
            }

            return 0;
}
/* ---------------------------------------------------------------------- */
/*	Get Cookie Function
/* ---------------------------------------------------------------------- */
if( !function_exists( 'spacex_getcookie' ) ) {
    /**
     * Retrieve the value of a cookie.
     *
     * @param string $name
     * @return mixed
     * @since 1.0.0
     */
    function spacex_getcookie( $name ) {
        if( isset( $_COOKIE[$name] ) )
            { return maybe_unserialize( stripslashes( $_COOKIE[$name] ) ); }

        return array();
    }
}
/* ---------------------------------------------------------------------- */
/*	Dropdown Select Pages in ThemeOptions
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'spacex_themeoptions_dropdown_pages' ) ) {
	/**
     * Retrieve all page.
     *
     * @param $args
     * @return mixed
     * @since 1.0.0
     */
	function spacex_themeoptions_dropdown_pages($args = '') {

		$defaults = array(
			'depth' => 0, 'child_of' => 0,
			'selected' => 0, 'echo' => 1,
			'name' => 'page_id', 'id' => '',
			'show_option_none' => '', 'show_option_no_change' => '',
			'option_none_value' => ''
		);

		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );

		$pages = get_pages($r);


		$output = array();

			$output[] = array(
							'value' => esc_attr( 0 ),
							'label' => esc_attr( ' ' ),
			);
		foreach($pages as $page)
		{
			$page_id = $page->ID;
			$page_title = $page->post_title;

			$output[] = array(
							'value' => esc_attr( $page_id ),
							'label' => esc_attr( $page_title ),
			);

		}


		return $output;

	}
}
/* ---------------------------------------------------------------------- */
/*	is_wishlist()
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'is_wishlist' ) ) {
	/**
     * Retrieve wishlist page id.
     *
     * @return int
     * @since 1.0.0
     */
	function is_wishlist() {
		$page_id = ot_get_option('tt_wishlist_page');
		return is_page( $page_id );
	}
}
/* ---------------------------------------------------------------------- */
/*	is_compare()
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'is_compare' ) ) {
	/**
     * Retrieve compare page id.
     *
     * @return int
     * @since 1.0.0
     */
	function is_compare() {
		$page_id = ot_get_option('tt_compare_page');
		return is_page( $page_id );
	}
}

/* ---------------------------------------------------------------------- */
/* Get Attachment Id From URL
/* ---------------------------------------------------------------------- */
function spacex_get_attachment_id_from_url( $attachment_url = '' ) {

	global $wpdb;
	$attachment_id = false;

	// If there is no url, return.
	if ( '' == $attachment_url )
		return;

	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();

	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

	}

	return $attachment_id;
}
/* ---------------------------------------------------------------------- */
/* Wp Title
/* ---------------------------------------------------------------------- */

function spacex_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'spacex' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'spacex_wp_title', 10, 2 );


/* ---------------------------------------------------------------------- */
/*	Sidebar Position
/* ---------------------------------------------------------------------- */

if ( !function_exists('spacex_check_sidebar_position') ) {

	function spacex_check_sidebar_position() {

		global $post;

		if(isset($post))
		{
			$post_id = $post->ID;
			if (class_exists('Woocommerce')) {
				if ( is_shop() ) {

					$post_id =  woocommerce_get_page_id( 'shop' );

				} else if ( is_product_category() || is_product_tag() ) {

					$post_id =  woocommerce_get_page_id( 'terms' );

				} else if ( is_cart() ) {

					$post_id =  woocommerce_get_page_id( 'cart' );

				} else if ( is_checkout() ) {

					$post_id =  woocommerce_get_page_id( 'checkout' );
				}
			}

			$page_sidebar_position = get_post_meta($post_id, 'tt_sidebar_position', true);
			$sidebar = get_post_meta($post_id, 'tt_sidebar_list', true);


		}

		$site_sidebar_position = ot_get_option('tt_site_sidebar');

		if($site_sidebar_position !== 'fullwidth' || $site_sidebar_position !== '')
		{
			$page_sidebar_position = $site_sidebar_position;
			$sidebar = 'default';
		}

		if( !isset($page_sidebar_position) || $page_sidebar_position == 'nosidebar')
		{
			$page_sidebar_position = $site_sidebar_position;
			$sidebar = 'default';
		}

		if(class_exists( 'bbPress' ) && is_bbpress() && is_active_sidebar('forum_sidebar'))
		{
			$page_sidebar_position = $site_sidebar_position;
			$sidebar = 'forum_sidebar';
		}



		return array($page_sidebar_position, $sidebar);


	}

	//add_filter( 'sidebar_position', 'spacex_check_sidebar_position');
}

function spacex_get_sidebar_type()
{
	$sidebar_display = ot_get_option('tt_site_sidebar_type');
	if($sidebar_display == '')
	{
		$sidebar_display = 'clean';
	}
	return $sidebar_display;
}

add_filter('spacex_sidebar_display', 'spacex_get_sidebar_type');


function custom_wp_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		//Retrieve the post content.
		$text = get_the_content('');

		//Delete all shortcode tags from the content.
		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		//$text = str_replace(']]>', ']]&gt;', $text);

		$allowed_tags = '<p>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
		$text = strip_tags($text, $allowed_tags);

		$excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
		$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

		$excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}

	}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt', 5);






if ( ! function_exists( 'spacex_current_page_url' ) ) {
    /**
     * Retrieve the current complete url
     *
     * @since 1.0
     */
    function spacex_current_page_url() {
    	$pageURL = 'http';
    	if ( isset( $_SERVER["HTTPS"] ) AND $_SERVER["HTTPS"] == "on" )
    		$pageURL .= "s";

    	$pageURL .= "://";

    	if ( isset( $_SERVER["SERVER_PORT"] ) AND $_SERVER["SERVER_PORT"] != "80" )
    		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    	else
    		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

    	return $pageURL;
    }
}

if( !function_exists( 'spacex_setcookie' ) ) {
    /**
     * Create a cookie.
     *
     * @param string $name
     * @param mixed $value
     * @return bool
     * @since 1.0.0
     */
    function spacex_setcookie( $name, $value = array(), $time = null ) {
        $time = $time != null ? $time : time() + 60 * 60 * 24 * 30;

        $value = maybe_serialize( stripslashes_deep( $value ) );
        $expiration = apply_filters( 'spacex_cookie_expiration_time', $time ); // Default 30 days

        return setcookie( $name, $value, $expiration, '/' );
    }
}

if( !function_exists( 'spacex_getcookie' ) ) {
    /**
     * Retrieve the value of a cookie.
     *
     * @param string $name
     * @return mixed
     * @since 1.0.0
     */
    function spacex_getcookie( $name ) {
        if( isset( $_COOKIE[$name] ) )
            { return maybe_unserialize( stripslashes( $_COOKIE[$name] ) ); }

        return array();
    }
}

if( !function_exists( 'spacex_usecookies' ) ) {
    /**
     * Check if the user want to use cookies or not.
     *
     * @return bool
     * @since 1.0.0
     */
    function spacex_usecookies() {
        return ot_get_option( 'tt_use_cookie' ) != 'true' ? false : true;
    }
}

if( !function_exists ( 'spacex_destroycookie' ) ) {
    /**
     * Destroy a cookie.
     *
     * @param string $name
     * @return void
     * @since 1.0.0
     */
    function spacex_destroycookie( $name ) {
        spacex_setcookie( $name, array(), time() - 3600 );
    }
}

function get_product_content_file() {
    ob_start();
    woocommerce_get_template_part( 'content', 'product' );
    return ob_get_clean();
}

function get_product_column($scroll = 0)
{
	$spacex_columns = ot_get_option('tt_product_column');

	if($spacex_columns == '')
	{
		return 4 - $scroll;
	}
	return $spacex_columns - $scroll;
}
function get_shop_categories(){

	global $wpdb, $blog_id, $current_blog;

	wp_reset_postdata();
	$terms = $wpdb->get_results($wpdb->prepare( 'SELECT name, slug FROM ' . $wpdb->prefix . 'terms, ' . $wpdb->prefix . 'term_taxonomy WHERE ' . $wpdb->prefix . 'terms.term_id = ' . $wpdb->prefix . 'term_taxonomy.term_id AND taxonomy = "product_cat" ORDER BY name ASC;'));
	$wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	
	$categories = array();
	$categories['All Categorires'] = __('0', 'spacex');
	if ($terms) :
		foreach ($terms as $cat) :
			$categories[$cat->name] = ($cat->slug);
		endforeach;
	endif;
	return $categories;
}
function get_course_categories(){

	global $wpdb, $blog_id, $current_blog;

	wp_reset_postdata();
	$terms = $wpdb->get_results($wpdb->prepare( 'SELECT name, slug FROM ' . $wpdb->prefix . 'terms, ' . $wpdb->prefix . 'term_taxonomy WHERE ' . $wpdb->prefix . 'terms.term_id = ' . $wpdb->prefix . 'term_taxonomy.term_id AND taxonomy = "course_cat" ORDER BY name ASC;'));

	$categories = array();
	$categories['All Categorires'] = __('0', 'spacex');

	if ($terms) :
		foreach ($terms as $cat) :

		$args = array(
        	'post_type' => 'xcourse',
        	'course_cat' => $cat->slug
    	);
    	$query = new WP_Query( $args );

		if($query->have_posts())
		{
			$categories[$cat->name] = ($cat->slug);
		}


		endforeach;

	endif;
	return $categories;
}
function get_event_categories(){

	global $wpdb, $blog_id, $current_blog;

	wp_reset_postdata();
	$terms = $wpdb->get_results($wpdb->prepare( 'SELECT name, slug FROM ' . $wpdb->prefix . 'terms, ' . $wpdb->prefix . 'term_taxonomy WHERE ' . $wpdb->prefix . 'terms.term_id = ' . $wpdb->prefix . 'term_taxonomy.term_id AND taxonomy = "event_cat" ORDER BY name ASC;'));

	$categories = array();
	$categories['All Categorires'] = __('0', 'spacex');
	if ($terms) :
		foreach ($terms as $cat) :
			$categories[$cat->name] = ($cat->slug);
		endforeach;
	endif;
	return $categories;
}
function spacex_build_dropdown_course_categories_homepage($perpage)
{
	//Get categories for ajax filter
	$product_categories = get_course_categories();
	$list_categories = '<div id="course-filter" class="select_wrapper" data-number="'.$perpage.'"><span class="select_trigger">'.__('All Categorires','spacex').'</span><ul class="select_dropdown">';
	foreach($product_categories as $key => $value)
	{
		$list_categories .= '<li data-value="'.$value.'">'.$key.'</li>';
	}
	$list_categories .='</ul></div>';

	return $list_categories;
}
function spacex_build_dropdown_course_categories()
{
	//Get categories for ajax filter
	$product_categories = get_course_categories();
	$list_categories = '<div class="select_wrapper"><span class="select_trigger">'.__('All Categorires','spacex').'</span><ul class="select_dropdown">';
	foreach($product_categories as $key => $value)
	{
		$list_categories .= '<li data-value="'.$value.'">'.$key.'</li>';
	}
	$list_categories .='</ul></div>';

	return $list_categories;
}
function ts_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/xcourses/slug-name.php
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", X_BASE_DIR . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php
	if ( ! $template && $name && file_exists( X_THEME_TEMPLATE . "/{$slug}-{$name}.php" ) ) {
		$template = TS_PLUGIN_TEMPLATE . "/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/woocommerce/slug.php
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", X_BASE_DIR . "{$slug}.php" ) );
	}

	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'sc_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}
function ts_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = sc_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'ts_get_template', $located, $template_name, $args, $template_path, $default_path );

	include( $located );
}

function ts_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = get_template_directory();
	}

	if ( ! $default_path ) {
		$default_path = X_THEME_TEMPLATE . '/templates/';
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
	return apply_filters('spacex_locate_template', $template, $template_name, $template_path);
}
function spacex_start_wrapper_main_content()
{
		$sidebar = spacex_check_sidebar_position();
		$position = $sidebar[0];
		$name = $sidebar[1];


		switch($position)
		{
			case 'left':
				echo '<div id="primary" class="content-area col-lg-8 col-md-8 col-sm-8  col-xs-12" style="float:right">';
				break;
			case 'right':
				echo '<div id="primary" class="content-area col-lg-8 col-md-8 col-sm-8  col-xs-12" >';
				break;
			case 'fullwidth':
				echo '<div id="primary" class="content-area col-lg-12" >';
				break;
			default:
				echo '<div id="primary" class="content-area col-lg-12" >';
		}
		echo '<div id="content" role="main" class="site-content">';
}

function spacex_end_wrapper_main_content()
{
	echo '</div>';
	echo '</div>';

	$sidebar = spacex_check_sidebar_position();
	$position = $sidebar[0];
	$name = $sidebar[1];
	
	if(empty($name))
	{
		return;
	}

	if(class_exists('Woocommerce') && (is_checkout() || is_cart()))
	{
		return;
	}

	if($position !== 'fullwidth'):

        echo  '<div id="sidebar" role="complementary" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 '.$position.' widget-area">';

	  echo '<div class="sidebar-bg  '.$position.'"></div>';

	  	if (is_active_sidebar($name)) {

	        echo '<div class="sidebar-inner">';

				dynamic_sidebar($name);

	        echo '</div>';
    	}

       	echo '</div>';

	endif;


	echo '<div class="clearfix"></div>';

}

function spacex_move_to_top()
{
	include_once( X_THEME_TEMPLATE .'move-to-top.php');
}


function spacex_site_hero()
{
	include_once( X_THEME_TEMPLATE .'page-hero.php');
}
function spacex_template_sticky_nav()
{
	$sticky_nav = ot_get_option('tt_header_sticky_menu');
	if($sticky_nav == 'true')
	{
		include_once( X_THEME_TEMPLATE .'sticky-nav.php');
	}
}
function spacex_template_page_side_content()
{
	include_once( X_THEME_TEMPLATE .'page-side.php');
}


function spacex_template_page_header()
{
	include_once( X_THEME_TEMPLATE .'page-header.php');
}

function spacex_template_topbar()
{
	include_once( X_THEME_TEMPLATE .'topbar.php');
}

function spacex_template_header_logo()
{
	include_once( X_THEME_TEMPLATE .'logo.php');
}

function spacex_template_header_menu()
{
	$header_type = ot_get_option('tt_header_type');

		include_once( X_THEME_TEMPLATE .'header-menu-default.php');

}

function spacex_topbar_content($position)
{
	$string = 'tt_' . $position . '_topbar';
	$value = ot_get_option($string);

	switch($value)
	{
		case 1:
			$text = ot_get_option('tt_topbar_text');
			echo '<div class="text-topbar">'.$text.'</div>';
		break;

		case 2:
			include_once( X_THEME_TEMPLATE .'topbar-menu.php');
		break;

		case 4:

		break;
	}
}


/* ---------------------------------------------------------------------- */
/* Template Funtions
/* ---------------------------------------------------------------------- */
function spacex_popup_template()
{
	$popup = ot_get_option('tt_pop_up');

	if( spacex_usecookies() ) {
		$cookie = spacex_getcookie( 'spacex_popup');
		if(isset($cookie['visible']) &&  $cookie['visible'] == 'hidden')
		{
			return;
		}
	}
	else
	{
		if(isset($_SESSION['spacex_popup']) && !empty($_SESSION['spacex_popup']))
		{
			$cookie = $_SESSION['spacex_popup'];
			if($cookie == 'hidden')
			{
				return;
			}
		}
	}
	if($popup == 'true')
	{
		include_once( X_THEME_TEMPLATE .'popup.php');
	}
}

/* ---------------------------------------------------------------------- */
/* Template Funtions
/* ---------------------------------------------------------------------- */
function spacex_select_color_scheme( $field_name, $field_value)
{
	$colors = ot_get_option('x_color_scheme');


	   echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_name ) . '" class="option-tree-ui-select">';

        foreach ( $colors as $color ) {
          if ( isset( $color['title'] ) && isset( $color['title'] ) ) {
            echo '<option value="' . esc_attr( $color['color'] ) . '"' . selected( $field_value, $color['color'], false ) . '>' . esc_attr( $color['title'] ) . '</option>';
          }
        }

    echo '</select>';





}


/* ---------------------------------------------------------------------- */
/* Get Course Cat Tax Thumbnail
/* ---------------------------------------------------------------------- */
function get_term_course_cat_thumbnail($term_id)
{
	$image_url 	= '';
	if(empty($term_id) || !isset($term_id))
	return $image_url;

	$thumbnail_id 	= absint( get_option('course_taxonomy_thumbnail'. $term_id, true ) );

	if ( $thumbnail_id )
		$image_url = wp_get_attachment_image( $thumbnail_id, array(470,400) );
	else
		$image_url = '<img src="'.wc_placeholder_img_src().'" alt >';

	return $image_url;

}
/* ---------------------------------------------------------------------- */
/* Get Course Cat Color
/* ---------------------------------------------------------------------- */
function get_term_course_cat_color($term_id)
{
	$color 	= '';
	if(empty($term_id) || !isset($term_id))
	return $color;

	$color 	= get_option('course_taxonomy_color'. $term_id, true );

	return $color;

}
?>
