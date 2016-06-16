<?php
/**
 * Setup menus in WP admin.
 *
 * @author 		WooThemes
 * @category 	Admin
 * @package 	WooCommerce/Admin
 * @version     2.2.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'TS_Admin_Menus' ) ) :

/**
 * WC_Admin_Menus Class
 */
class TS_Admin_Menus {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		// Add menus
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 9 );
		add_action( 'admin_menu', array( $this, 'status_menu' ), 60 );
		add_action( 'admin_head', array( $this, 'menu_highlight' ) );

	}

	/**
	 * Add menu items
	 */
	public function admin_menu() {
		global $menu;

		if ( current_user_can( 'manage_options' ) ) {
			$menu[] = array( '', 'read', 'separator-course', '', 'wp-menu-separator course' );
		}
		//$main_page = add_menu_page( __( 'ThemeShield', 'themeshield' ), __( 'ThemeShield', 'themeshield' ), 'manage_options',  'themeshield', null, 'dashicons-welcome-learn-more', '52.5' );
	}

	/**
	 * Add menu item
	 */
	public function status_menu() {
		add_submenu_page( 'woocommerce', __( 'WooCommerce Status', 'woocommerce' ),  __( 'System Status', 'woocommerce' ) , 'manage_woocommerce', 'wc-status', array( $this, 'status_page' ) );
		register_setting( 'woocommerce_status_settings_fields', 'woocommerce_status_options' );
	}


	/**
	 * Highlights the correct top level admin menu item for post type add screens.
	 *
	 * @return void
	 */
	public function menu_highlight() {
		global $menu, $submenu, $parent_file, $submenu_file, $self, $post_type, $taxonomy;

		$to_highlight_types = array( 'shop_order', 'shop_coupon' );

		if ( isset( $post_type ) ) {
			if ( in_array( $post_type, $to_highlight_types ) ) {
				$submenu_file = 'edit.php?post_type=' . esc_attr( $post_type );
				$parent_file  = 'woocommerce';
			}

			if ( 'shieldcourse' == $post_type ) {
				$screen = get_current_screen();

				if ( $screen->base == 'edit-tags' && taxonomy_is_product_attribute( $taxonomy ) ) {
					$submenu_file = 'product_attributes';
					$parent_file  = 'edit.php?post_type=' . esc_attr( $post_type );
				}
			}
		}

		if ( isset( $submenu['woocommerce'] ) && isset( $submenu['woocommerce'][1] ) ) {
			$submenu['woocommerce'][0] = $submenu['woocommerce'][1];
			unset( $submenu['woocommerce'][1] );
		}

		if ( isset( $submenu['woocommerce'] ) && current_user_can( 'manage_woocommerce' ) ) {
			foreach ( $submenu['woocommerce'] as $key => $menu_item ) {
				if ( 0 === strpos( $menu_item[0], _x( 'Orders', 'Admin menu name', 'woocommerce' ) ) ) {

					$menu_name = _x( 'Orders', 'Admin menu name', 'woocommerce' );
					if ( $order_count = wc_processing_order_count() ) {
						$menu_name .= ' <span class="awaiting-mod update-plugins count-' . $order_count . '"><span class="processing-count">' . number_format_i18n( $order_count ) . '</span></span>';
					}

					$submenu['woocommerce'][ $key ] [0] = $menu_name;
					break;
				}
			}
		}
	}

}

endif;

return new TS_Admin_Menus();
