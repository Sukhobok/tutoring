<?php
/**
 * License handler for Mashshare Add-Ons
 *
 * This class should simplify the process of adding license information
 * to new MASHSB extensions.
 *
 * @version 1.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'MASHSB_License' ) ) :

/**
 * MASHSB_License Class
 */
class MASHSB_License {
	private $file;
	private $license;
	private $item_name;
	private $item_shortname;
	private $version;
	private $author;
	private $api_url = 'https://www.mashshare.net/edd-sl-api/';

	/**
	 * Class constructor
	 *
	 * @global  array $mashsb_options
	 * @param string  $_file
	 * @param string  $_item_name
	 * @param string  $_version
	 * @param string  $_author
	 * @param string  $_optname
	 * @param string  $_api_url
	 */
	function __construct( $_file, $_item_name, $_version, $_author, $_optname = null, $_api_url = null ) {
		global $mashsb_options;

		$this->file           = $_file;
		$this->item_name      = $_item_name;
		$this->item_shortname = 'mashsb_' . preg_replace( '/[^a-zA-Z0-9_\s]/', '', str_replace( ' ', '_', strtolower( $this->item_name ) ) );
		$this->version        = $_version;
		$this->license        = isset( $mashsb_options[ $this->item_shortname . '_license_key' ] ) ? trim( $mashsb_options[ $this->item_shortname . '_license_key' ] ) : '';
		$this->author         = $_author;
		$this->api_url        = is_null( $_api_url ) ? $this->api_url : $_api_url;

		/**
		 * Allows for backwards compatibility with old license options,
		 * i.e. if the plugins had license key fields previously, the license
		 * handler will automatically pick these up and use those in lieu of the
		 * user having to reactive their license.
		 */
		if ( ! empty( $_optname ) ) {
			$opt = mashsb_get_option( $_optname, false );

			if( isset( $opt ) && empty( $this->license ) ) {
				$this->license = trim( $opt );
                    }
		}
                 
		// Setup hooks
		$this->includes();
		$this->hooks();
		//$this->auto_updater();
	}

	/**
	 * Include the updater class
	 *
	 * @access  private
	 * @return  void
	 */
	private function includes() {
		if ( ! class_exists( 'MASHSB_SL_Plugin_Updater' ) ) require_once 'MASHSB_SL_Plugin_Updater.php';         
	}

	/**
	 * Setup hooks
	 *
	 * @access  private
	 * @return  void
	 */
	private function hooks() {

		// Register settings
		add_filter( 'mashsb_settings_licenses', array( $this, 'settings' ), 1 );

		// Activate license key on settings save
		add_action( 'admin_init', array( $this, 'activate_license' ) );

		// Deactivate license key
		add_action( 'admin_init', array( $this, 'deactivate_license' ) );

		// Updater
		add_action( 'admin_init', array( $this, 'auto_updater' ), 0 );

		add_action( 'admin_notices', array( $this, 'notices' ) );
	}

	/**
	 * Auto updater
	 *
	 * @access  private
	 * @global  array $mashsb_options
	 * @return  void
	 */
	public function auto_updater() {

		//if ( 'valid' !== get_option( $this->item_shortname . '_license_active' ) )
			//return;
            //rhe
 
            $test = array(
				'version'   => $this->version,
				'license'   => $this->license,
				'item_name' => $this->item_name,
				'author'    => $this->author
			);


		// Setup the updater
		$mashsb_updater = new MASHSB_SL_Plugin_Updater(
			$this->api_url,
			$this->file,
			array(
				'version'   => $this->version,
				'license'   => $this->license,
				'item_name' => $this->item_name,
				'author'    => $this->author
			)
		);
	}


	/**
	 * Add license field to settings
	 *
	 * @access  public
	 * @param array   $settings
	 * @return  array
	 */
	public function settings( $settings ) {
		$mashsb_license_settings = array(
			array(
				'id'      => $this->item_shortname . '_license_key',
				'name'    => sprintf( __( '%1$s License Key', 'mashsb' ), $this->item_name ),
				'desc'    => '',
				'type'    => 'license_key',
				'options' => array( 'is_valid_license_option' => $this->item_shortname . '_license_active' ),
				'size'    => 'regular'
			)
		);

		return array_merge( $settings, $mashsb_license_settings );
	}


	/**
	 * Activate the license key
	 *
	 * @access  public
	 * @return  void
	 */
	public function activate_license() {
		if ( ! isset( $_POST['mashsb_settings'] ) ) {
			return;
		}

		if ( ! isset( $_POST['mashsb_settings'][ $this->item_shortname . '_license_key'] ) ) {
			return;
		}

		foreach( $_POST as $key => $value ) {
			if( false !== strpos( $key, 'license_key_deactivate' ) ) {
				// Don't activate a key when deactivating a different key
				return;
			}
		}

		if( ! wp_verify_nonce( $_REQUEST[ $this->item_shortname . '_license_key-nonce'], $this->item_shortname . '_license_key-nonce' ) ) {
		
			wp_die( __( 'Nonce verification failed', 'mashsb' ), __( 'Error', 'mashsb' ), array( 'response' => 403 ) );
                
		}
                
               if( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( 'valid' === get_option( $this->item_shortname . '_license_active' ) ) {
			return;
		}

		$license = sanitize_text_field( $_POST['mashsb_settings'][ $this->item_shortname . '_license_key'] );

		if( empty( $license ) ) {
			return;
		}

		// Data to send to the API
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url()
		);

		// Call the API
		$response = wp_remote_post(
			$this->api_url,
			array(
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params
			)
		);

		// Make sure there are no errors
		if ( is_wp_error( $response ) ) {
			return;
		}

		// Tell WordPress to look for updates
		set_site_transient( 'update_plugins', null );

		// Decode license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		update_option( $this->item_shortname . '_license_active', $license_data->license );

		if( ! (bool) $license_data->success ) {
			set_transient( 'mashsb_license_error', $license_data, 1000 );
		} else {
			delete_transient( 'mashsb_license_error' );
                }
	}


	/**
	 * Deactivate the license key
	 *
	 * @access  public
	 * @return  void
	 */
	public function deactivate_license() {

		if ( ! isset( $_POST['mashsb_settings'] ) )
			return;

		if ( ! isset( $_POST['mashsb_settings'][ $this->item_shortname . '_license_key'] ) )
			return;

		if( ! wp_verify_nonce( $_REQUEST[ $this->item_shortname . '_license_key-nonce'], $this->item_shortname . '_license_key-nonce' ) ) {
		
			wp_die( __( 'Nonce verification failed', 'mashsb' ), __( 'Error', 'mashsb' ), array( 'response' => 403 ) );
                
		}
                
                if( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// Run on deactivate button press
		if ( isset( $_POST[ $this->item_shortname . '_license_key_deactivate'] ) ) {

			// Data to send to the API
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $this->license,
				'item_name'  => urlencode( $this->item_name ),
				'url'        => home_url()
			);

			// Call the API
			$response = wp_remote_post(
				$this->api_url,
				array(
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params
				)
			);

			// Make sure there are no errors
			if ( is_wp_error( $response ) ) {
				return;
			}

			// Decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			delete_option( $this->item_shortname . '_license_active' );

			if( ! (bool) $license_data->success ) {
				set_transient( 'mashsb_license_error', $license_data, 1000 );
			} else {
				delete_transient( 'mashsb_license_error' );
		}
	}
}


	/**
	 * Admin notices for errors
	 *
	 * @access  public
	 * @return  void
	 */
	public function notices() {

		if( ! isset( $_GET['page'] ) || 'mashsb-settings' !== $_GET['page'] ) {
			return;
		}

		if( ! isset( $_GET['tab'] ) || 'licenses' !== $_GET['tab'] ) {
			return;
		}

		$license_error = get_transient( 'mashsb_license_error' );

		if( false === $license_error ) {
			return;
		}

		if( ! empty( $license_error->error ) ) {

			switch( $license_error->error ) {

				case 'item_name_mismatch' :

					$message = __( 'This license does not belong to the product you have entered it for.', 'mashsb' );
					break;

				case 'no_activations_left' :

					$message = __( 'This license does not have any activations left', 'mashsb' );
					break;

				case 'expired' :

					$message = __( 'This license key is expired. Please renew it.', 'mashsb' );
					break;

				default :

					$message = sprintf( __( 'There was a problem activating your license key, please try again or contact support. Error code: %s', 'mashsb' ), $license_error->error );
					break;

			}

		}

		if( ! empty( $message ) ) {

			echo '<div class="error">';
				echo '<p>' . $message . '</p>';
			echo '</div>';

		}

		delete_transient( 'mashsb_license_error' );

	}
}

endif; // end class_exists check
