<?php
/**
 * Plugin Name: XEvent
 * Description: Selling Event Online Plugin.
 * Version: 1.0.0
 * Author: spacex
 * Author URI: http://themeforest.net/user/spacex
 *
 * @package XEvent
 * @author SpaceX
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'XEVENT' ) ) :

/**
 * Main XEvent Class
 *
 * @class XEvent
 * @version	1.0.0
 */
final class XEVENT {

	/**
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * @var XEvent The single instance of the class
	 * @since 2.1
	 */
	protected static $_instance = null;

	/**
	 * @var WC_Session session
	 */
	public $session = null;

	/**
	 * @var WC_Query $query
	 */
	public $query = null;

	/**
	 * @var WC_Product_Factory $product_factory
	 */
	public $product_factory = null;

	/**
	 * @var WC_Countries $countries
	 */
	public $countries = null;

	/**
	 * @var WC_Integrations $integrations
	 */
	public $integrations = null;

	/**
	 * @var WC_Cart $cart
	 */
	public $cart = null;

	/**
	 * @var WC_Customer $customer
	 */
	public $customer = null;

	/**
	 * @var WC_Order_Factory $order_factory
	 */
	public $order_factory = null;

	/**
	 * Main XEvent Instance
	 *
	 * Ensures only one instance of XEvent is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see WC()
	 * @return XEvent - Main instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 2.1
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'themeshield' ), '2.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 2.1
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'spacex' ), '2.1' );
	}

	/**
	 * XEvent Constructor.
	 * @access public
	 * @return XEvent
	 */
	public function __construct() {
		
		
		// Define Constant
		$this->define_constant();
		// Include required files
		$this->include_files();
	
		add_action( 'wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action( 'wp_enqueue_scripts', array($this, 'get_styles'));		
		
		add_filter( 'body_class', 'xevent_class_names' );
		function xevent_class_names( $classes ) {
			// add 'class-name' to the $classes array
			$classes[] = 'xevent';
			// return the $classes array
			return $classes;
		}
		
		// Hooks
		add_action( 'after_setup_theme', array( $this, 'setup_themesupport' ) );
		//add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		//add_action( 'init', array( $this, 'init' ), 0 );
		//add_action( 'init', array( 'WC_Shortcodes', 'init' ) );
		//add_action( 'widgets_init', array( $this, 'include_widgets' ) );
	}
	
	/**
	 * Defined Constant
	 */
	public function define_constant()
	{
		define( 'XT_PLUGIN_FILE',  __FILE__ ); 
		define( 'XT_PLUGIN_TEMPLATE', plugin_dir_path(__FILE__) . '/templates' ); 
		define( 'XT_PLUGIN_BASENAME', plugin_basename(__FILE__) );

		define( 'XEVENT_VERSION', $this->version ); 
				
	}
	
	/**
	 * Load all the required file for Theme Events
	 */
	public function include_files()
	{
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xevent-post-types.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-template-loader.php' );
				
		include_once( plugin_dir_path( __FILE__ ) . 'includes/template-hooks.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/template-functions.php' );
		
		include_once( plugin_dir_path( __FILE__ ) . 'includes/core-functions.php' );
		
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xevent-query.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xevent-post-types.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xevent-admin-menu.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xevent-taxonomies.php' );
		
		include_once( plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/widget.php' );
		
		//include_once('includes/mashsharer/mashshare.php');
	}
	
	public function setup_themesupport()
	{
		// Post thumbnail support
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			add_theme_support( 'post-thumbnails' );
		}
		//add_post_type_support( 'product', 'thumbnail' );

		// Add image sizes
		$event_thumbnail = xt_get_image_size( 'event_thumbnail' );
		$event_catalog	= xt_get_image_size( 'event_catalog' );
		$event_single	= xt_get_image_size( 'event_single' );

		add_image_size( 'event_thumbnail', $event_thumbnail['width'], $event_thumbnail['height'], $event_thumbnail['crop'] );
		add_image_size( 'event_catalog', $event_catalog['width'], $event_catalog['height'], $event_catalog['crop'] );
		add_image_size( 'event_single', $event_single['width'], $event_single['height'], $event_single['crop'] );
	}
	/**
	 * Init xevent when WordPress Initialises.
	 */
	public function init() {
		$this->load_plugin_textdomain();
	}
	
	public function load_plugin_textdomain() {
		
		load_plugin_textdomain( 'xevent', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	/** Helper functions ******************************************************/

	/**
	 * Get the plugin url.
	 *
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}
	/**
	 * Get the template path.
	 *
	 * @return string
	 */
	public function template_path() {
		return apply_filters( 'xevent_template_path', 'xevent/' );
	}

	/**
	 * Get Ajax URL.
	 *
	 * @return string
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}

	public static function get_styles() {
		
		wp_enqueue_style( 'xevent',	plugins_url( 'assets/css/xevent.css' , __FILE__ ) ,	null, false );
	}

	/**
	 * Register/queue frontend scripts.
	 *
	 * @access public
	 * @return void
	 */
	public static function load_scripts() {
		wp_enqueue_script( 'single-xevent', plugins_url( '/assets/js/single-xevent.js' , __FILE__ ) ,  array('jquery'), false, true );
	}
}

endif;

/**
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  1.0
 * @return xevent
 */
function XT() {
	return XEVENT::instance();
}

// Global for backwards compatibility.
$GLOBALS['xevent'] = XT();
