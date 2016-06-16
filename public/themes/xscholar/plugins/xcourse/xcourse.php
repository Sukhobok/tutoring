<?php
/**
 * Plugin Name: XCourse
 * Description: Learning Manager System & Selling Ticket Online Plugin.
 * Version: 1.0.0
 * Author: spacex
 * Author URI: http://themeshield.net
 *
 * @package XCourse
 * @author ThemeShield
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'XCOURSE' ) ) :

/**
 * Main XCourse Class
 *
 * @class XCourse
 * @version	1.0.0
 */
final class XCOURSE {

	/**
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * @var XCourse The single instance of the class
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
	 * Main XCourse Instance
	 *
	 * Ensures only one instance of XCourse is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see WC()
	 * @return XCourse - Main instance
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
	 * XCourse Constructor.
	 * @access public
	 * @return XCourse
	 */
	public function __construct() {


		// Define Constant
		$this->define_constant();
		// Include required files
		$this->include_files();

		add_action( 'wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action( 'wp_enqueue_scripts', array($this, 'get_styles'));

		add_filter( 'body_class', 'my_class_names' );
		function my_class_names( $classes ) {
			// add 'class-name' to the $classes array
			$classes[] = 'xcourse';
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
		define( 'XS_PLUGIN_FILE',  __FILE__ );
		define( 'X_PLUGIN_TEMPLATE', plugin_dir_path(__FILE__) . '/templates' );
		define( 'X_PLUGIN_BASENAME', plugin_basename(__FILE__) );

		define( 'TS_VERSION', $this->version );
		define( 'SHIELDCOURSE_VERSION', $this->version );

	}

	/**
	 * Load all the required file for Theme Courses
	 */
	public function include_files()
	{
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xcourse-post-types.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-template-loader.php' );

		include_once( plugin_dir_path( __FILE__ ) . 'includes/template-hooks.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/template-functions.php' );

		include_once( plugin_dir_path( __FILE__ ) . 'includes/core-functions.php' );

		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xcourse-query.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xcourse-post-types.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xcourse-admin-menu.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/class-xcourse-taxonomies.php' );

		include_once( plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'includes/widgets.php' );




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
		$course_thumbnail = sc_get_image_size( 'course_thumbnail' );
		$course_catalog	= sc_get_image_size( 'course_catalog' );
		$course_single	= sc_get_image_size( 'course_single' );

		add_image_size( 'course_thumbnail', $course_thumbnail['width'], $course_thumbnail['height'], $course_thumbnail['crop'] );
		add_image_size( 'course_catalog', $course_catalog['width'], $course_catalog['height'], $course_catalog['crop'] );
		add_image_size( 'course_single', $course_single['width'], $course_single['height'], $course_single['crop'] );
	}
	/**
	 * Init xcourse when WordPress Initialises.
	 */
	public function init() {
		$this->load_plugin_textdomain();
	}

	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'xcourse', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
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
		return apply_filters( 'xcourse_template_path', 'xcourse/' );
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

		wp_enqueue_style( 'xcourse',	plugins_url( 'assets/css/xcourse.css' , __FILE__ ) ,	null, false );
	}

	/**
	 * Register/queue frontend scripts.
	 *
	 * @access public
	 * @return void
	 */
	public static function load_scripts() {
		wp_enqueue_script( 'single-course', plugins_url( '/assets/js/single-course.js' , __FILE__ ) ,  array('jquery'), false, true );
	}
}

endif;

/**
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  1.0
 * @return xcourse
 */
function SC() {
	return XCOURSE::instance();
}

// Global for backwards compatibility.
$GLOBALS['xcourse'] = SC();
