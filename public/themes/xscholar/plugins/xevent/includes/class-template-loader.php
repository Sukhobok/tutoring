<?php
/**
 * Template Loader
 *
 * @class 		WC_Template
 * @version		2.2.0
 * @package		WooCommerce/Classes
 * @category	Class
 * @author 		WooThemes
 */
class XEVENT_TEMPLATE_LOADER {

	/**
	 * Hook in methods
	 */
	public static function init() {
		add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
	//	add_filter( 'comments_template', array( __CLASS__, 'comments_template_loader' ) );
	}

	/**
	 * Load a template.
	 *
	 * Handles template usage so that we can use our own templates instead of the themes.
	 *
	 * Templates are in the 'templates' folder. woocommerce looks for theme
	 * overrides in /theme/woocommerce/ by default
	 *
	 * For beginners, it also looks for a woocommerce.php template first. If the user adds
	 * this to the theme (containing a woocommerce() inside) this will be used for all
	 * woocommerce templates.
	 *
	 * @param mixed $template
	 * @return string
	 */
	public static function template_loader( $template ) {
		$find = array( 'xevent.php' );
		$file = '';

		if ( is_single() && get_post_type() == 'xevent' ) {

			$file 	= '/single-xevent.php';
			$find[] = $file;
			$find[] = XT_PLUGIN_TEMPLATE . $file;

		} elseif ( is_event_taxonomy() ) {

			$term   = get_queried_object();

			if ( is_tax( 'event_cat' ) || is_tax( 'event_tag' ) ) {
				$file = 'taxonomy-' . $term->taxonomy . '.php';
			} else {
				$file = '/archive-xevent.php';
			}
			
			$find[] = 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] = XT()->template_path() . 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] = 'taxonomy-' . $term->taxonomy . '.php';
			$find[] = XT()->template_path() . 'taxonomy-' . $term->taxonomy . '.php';
			$find[] = $file;
			$find[] = XT()->template_path() . $file;
			

		} elseif ( is_post_type_archive('xevent') /* || is_page( wc_get_page_id( 'shop' ) ) */) {

			$file 	= '/archive-xevent.php';
			$find[] = $file;
			$find[] = XT_PLUGIN_TEMPLATE . $file;
					

		}
		elseif ( is_single() && get_post_type() == 'speaker' ) {
			$file 	= '/single-speaker.php';
			$find[] = $file;
			$find[] = XT_PLUGIN_TEMPLATE . $file;	

		}
	
		if ( $file ) {
			$template       = locate_template( array_unique( $find ) );
			$status_options = get_option( 'woocommerce_status_options', array() );
			if ( ! $template || ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) ) {
				$template = XT()->plugin_path() . '/templates/' . $file;
			}
		}
		
		return $template;
	}

	/**
	 * comments_template_loader function.
	 *
	 * @param mixed $template
	 * @return string
	 */
	public static function comments_template_loader( $template ) {
		if ( get_post_type() !== 'xevent' )
			return $template;

		if ( file_exists( get_stylesheet_directory() . '/' . XT()->template_path() . 'single-product-reviews.php' ))
			return get_stylesheet_directory() . '/' . XT()->template_path() . 'single-product-reviews.php';
		elseif ( file_exists( get_template_directory() . '/' . XT()->template_path() . 'single-product-reviews.php' ))
			return get_template_directory() . '/' . XT()->template_path() . 'single-product-reviews.php';
		elseif ( file_exists( get_stylesheet_directory() . '/' . 'single-product-reviews.php' ))
			return get_stylesheet_directory() . '/' . 'single-product-reviews.php';
		elseif ( file_exists( get_template_directory() . '/' . 'single-product-reviews.php' ))
			return get_template_directory() . '/' . 'single-product-reviews.php';
		else
			return XT_PLUGIN_TEMPLATE . '/templates/single-product-reviews.php';
	}
	
	
}

XEVENT_TEMPLATE_LOADER::init();
