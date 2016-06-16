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
class XSPACE_TEMPLATE_LOADER {

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
		$find = array( 'xgallery.php' );
		$file = '';

		if ( is_single() && get_post_type() == 'xgallery' ) {

			$file 	= '/single-xgallery.php';
			$find[] = $file;
			$find[] = XS_PLUGIN_TEMPLATE . $file;

		} 
		elseif (is_tax( 'xgallery-categories') || is_tax('xgallery-tags') ||  is_post_type_archive('xgallery') ) {

			$file 	= '/archive-xgallery.php';
			$find[] = $file;
			$find[] = XS_PLUGIN_TEMPLATE . $file;
					
		}

		if ( $file ) {
			$template       = locate_template( array_unique( $find ) );
			if ( ! $template && current_user_can( 'manage_options' ) ) {
				$template = XS_PLUGIN_TEMPLATE . $file;
			}
		}

		return $template;
	}

	
	
}

XSPACE_TEMPLATE_LOADER::init();
