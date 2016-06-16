<?php
/**
 * Plugin Name: XSpace
 * Description: Plugin required for spacex's theme
 * Version: 1.0.0
 * Author: spacex
 * Author URI: http://themeshield.net
 *
 * @package x-space
 * @author spacex
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'XSPACE' ) ) :

/**
 * Main ShieldCourses Class
 *
 * @class ShieldCourses
 * @version	1.0.0
 */
final class XSPACE {

	/**
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * @var ShieldCourses The single instance of the class
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
	 * Main ShieldCourses Instance
	 *
	 * Ensures only one instance of ShieldCourses is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see WC()
	 * @return ShieldCourses - Main instance
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
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'themeshield' ), '2.1' );
	}

	/**
	 * ShieldCourses Constructor.
	 * @access public
	 * @return ShieldCourses
	 */
	public function __construct() {
		
		// Define Constant
		$this->define_constant();
		// Include required files
		$this->include_files();
		$this->get_styles();
		
		add_action('admin_enqueue_scripts', array($this, 'load_scripts'));	
		
		// Hooks
		add_action( 'after_setup_theme', array( $this, 'setup_themesupport' ) );
		add_action( 'admin_menu', array( $this, 'register_my_custom_menu_page' )  );
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

		define( 'XS_PLUGIN_TEMPLATE', plugin_dir_path(__FILE__) . '/templates' ); 
		define( 'XS_PLUGIN_BASENAME', plugin_basename(__FILE__) );

		define( 'XS_VERSION', $this->version );
		define( 'XSPACE_VERSION', $this->version ); 
				
	}
	
	/**
	 * Load all the required file for Theme Courses
	 */
	public function include_files()
	{
		//Functions
		include_once( plugin_dir_path( __FILE__ ) . 'includes/core-funtions.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/template-loader.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/widgets.php' );
		
		//Classes
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xspace-admin-menu.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xspace-post-types.php' );
		
		//include_once('includes/mashsharer/mashshare.php');
	}
	
	public function register_my_custom_menu_page() {
	
		$main_page = add_menu_page( 'spacex','XSpace', 'manage_options',  'spacex', null, 'dashicons-shield-alt', '52.5' );

	}
	
	public function setup_themesupport()
	{
		
		// Post thumbnail support
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			add_theme_support( 'post-thumbnails' );
		}
		//add_post_type_support( 'product', 'thumbnail' );

		// Add image sizes
		/**$course_thumbnail = sc_get_image_size( 'course_thumbnail' );
		$course_catalog	= sc_get_image_size( 'course_catalog' );
		$course_single	= sc_get_image_size( 'course_single' );

		add_image_size( 'course_thumbnail', $course_thumbnail['width'], $course_thumbnail['height'], $course_thumbnail['crop'] );
		add_image_size( 'course_catalog', $course_catalog['width'], $shop_catalog['height'], $shop_catalog['crop'] );
		add_image_size( 'course_single', $course_single['width'], $course_single['height'], $course_single['crop'] );
		*/
	}
	/**
	 * Init ShieldCourses when WordPress Initialises.
	 */
	public function init() {
		$this->load_plugin_textdomain();
	}
	
	public function load_plugin_textdomain() {
		
		load_plugin_textdomain( 'xspace', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
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
		return apply_filters( 'xspace_template_path', 'xspace/' );
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
		
		//wp_enqueue_style( 'shieldcourses',	plugins_url( 'assets/css/shieldcourses.css' , __FILE__ ) ,	null, false );
	}

	/**
	 * Register/queue frontend scripts.
	 *
	 * @access public
	 * @return void
	 */
	public static function load_scripts() {

			//Use wordpress media upload button.
			wp_enqueue_media();      
			wp_enqueue_style( 'wp-color-picker' );      
		 	wp_enqueue_script( 'custom-script-handle', plugins_url( 'assets/js/custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	}
}

endif;

/**
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  1.0
 * @return ShieldCourses
 */
function XS() {
	return XSPACE::instance();
}

// Global for backwards compatibility.
$GLOBALS['xspace'] = XS();
