<?php

// uncomment this line for testing
//set_site_transient( 'update_plugins', null );

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Allows plugins to use their own update API.
 *
 * @author Pippin Williamson, René Hermenau
 * @version 1.6
 */
class MASHSB_SL_Plugin_Updater {
    private $api_url    = '';
    private $api_data   = array();
    private $name       = '';
    private $slug       = '';
    private $version    = '';

    /**
     * Class constructor.
     *
     * @uses plugin_basename()
     * @uses hook()
     *
     * @param string  $_api_url     The URL pointing to the custom API endpoint.
     * @param string  $_plugin_file Path to the plugin file.
     * @param array   $_api_data    Optional data to send with API calls.
     */
    function __construct( $_api_url, $_plugin_file, $_api_data = null ) {
        $this->api_url  = trailingslashit( $_api_url );
        $this->api_data = $_api_data;
        $this->name     = plugin_basename( $_plugin_file );
        $this->slug     = basename( $_plugin_file, '.php' );
        $this->version  = $_api_data['version'];
        $this->item_name = sanitize_title($_api_data['item_name']); //rhe return the item name words separated by hyphens

        // Set up hooks.
        $this->init();
        add_action( 'admin_init', array( $this, 'show_changelog' ) );
    }

    /**
     * Set up WordPress filters to hook into WP's update process.
     *
     * @uses add_filter()
     *
     * @return void
     */
    public function init() {

        add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_update' ) );
        add_filter( 'plugins_api', array( $this, 'plugins_api_filter' ), 10, 3 );

        add_action( 'after_plugin_row_' . $this->name, array( $this, 'show_update_notification' ), 10, 2 );
    }

    /**
     * Check for Updates at the defined API endpoint and modify the update array.
     *
     * This function dives into the update API just when WordPress creates its update array,
     * then adds a custom API call and injects the custom plugin data retrieved from the API.
     * It is reassembled from parts of the native WordPress plugin update code.
     * See wp-includes/update.php line 121 for the original wp_update_plugins() function.
     *
     * @uses api_request()
     *
     * @param array   $_transient_data Update array build by WordPress.
     * @return array Modified update array with custom plugin data.
     */
    function check_update( $_transient_data ) {

        global $pagenow;

        if( ! is_object( $_transient_data ) ) {
            $_transient_data = new stdClass;
        }

        if( 'plugins.php' == $pagenow && is_multisite() ) {
            return $_transient_data;
        }
        

        if ( empty( $_transient_data->response ) || empty( $_transient_data->response[ $this->name ] ) ) {

            $version_info = $this->api_request( 'plugin_latest_version', array( 'slug' => $this->slug) );
                               
            /*echo "<pre>check_update() line 74 in MASHSB_SL_Plugin_Updater";
            echo " slug: " . $this->slug;
            echo " version info: " . $version_info->slug;
            echo " new version :" . $version_info->new_version;
            echo " item_name: " . $this->item_name;
            exit;*/

            if ( false !== $version_info && is_object( $version_info ) && isset( $version_info->new_version ) ) {

                if( version_compare( $this->version, $version_info->new_version, '<' ) ) {

                    $_transient_data->response[ $this->name ] = $version_info;
                }
                $_transient_data->last_checked = time();
                $_transient_data->checked[ $this->name ] = $this->version;
            }
        }
        return $_transient_data;
    }
    

    /**
     * show update nofication row -- needed for multisite subsites, because WP won't tell you otherwise!
     *
     * @param string  $file
     * @param array   $plugin
     */
    public function show_update_notification( $file, $plugin ) {

        if( ! current_user_can( 'update_plugins' ) ) {
            return;
        }

        if( ! is_multisite() ) {
            return;
        }

        if ( $this->name != $file ) {
            return;
        }

        // Remove our filter on the site transient
        remove_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_update' ), 10 );

        $update_cache = get_site_transient( 'update_plugins' );

        if ( ! is_object( $update_cache ) || empty( $update_cache->response ) || empty( $update_cache->response[ $this->name ] ) ) {

            $cache_key    = md5( 'mashsb_plugin_' .sanitize_key( $this->name ) . '_version_info' );
            $version_info = get_transient( $cache_key );

            if( false === $version_info ) {
                $version_info = $this->api_request( 'plugin_latest_version', array( 'slug' => $this->slug) );
                set_transient( $cache_key, $version_info, 3600 );
            }


            if( ! is_object( $version_info ) ) {
                return;
            }

            if( version_compare( $this->version, $version_info->new_version, '<' ) ) {

                $update_cache->response[ $this->name ] = $version_info;

            }

            $update_cache->last_checked = time();
            $update_cache->checked[ $this->name ] = $this->version;

            set_site_transient( 'update_plugins', $update_cache );

        } else {

            $version_info = $update_cache->response[ $this->name ];

        }

        // Restore our filter
        add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_update' ) );

        if ( ! empty( $update_cache->response[ $this->name ] ) && version_compare( $this->version, $version_info->new_version, '<' ) ) {

            // build a plugin list row, with update notification
            $wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );
            echo '<tr class="plugin-update-tr"><td colspan="' . $wp_list_table->get_column_count() . '" class="plugin-update colspanchange"><div class="update-message">';

            $changelog_link = self_admin_url( 'index.php?edd_sl_action=view_plugin_changelog&plugin=' . $this->name . '&slug=' . $this->slug . '&TB_iframe=true&width=772&height=911' );

            if ( empty( $version_info->download_link ) ) {
                printf(
                    __( 'There is a new version of %1$s available. <a target="_blank" class="thickbox" href="%2$s">View version %3$s details</a>.', 'mashsb' ),
                    esc_html( $version_info->name ),
                    esc_url( $changelog_link ),
                    esc_html( $version_info->new_version )
                );
            } else {
                printf(
                    __( 'There is a new version of %1$s available. <a target="_blank" class="thickbox" href="%2$s">View version %3$s details</a> or <a href="%4$s">update now</a>.', 'mashsb' ),
                    esc_html( $version_info->name ),
                    esc_url( $changelog_link ),
                    esc_html( $version_info->new_version ),
                    esc_url( wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $this->name, 'upgrade-plugin_' . $this->name ) )
                );
            }

            echo '</div></td></tr>';
        }
    }

    
    /**
     * Updates information on the "View version x.x details" page with custom data.
     *
     * @uses get_transient()
     * @uses api_request()
     *
     * @param mixed   $_data
     * @param string  $_action
     * @param object  $_args
     * @return object $_data
     */
    
    function plugins_api_filter( $_data, $_action = '', $_args = null ) {


        if ( $_action != 'plugin_information' ) {

            return $_data;

        }

        if ( ! isset( $_args->slug ) || ( $_args->slug != $this->slug ) ) {

            return $_data;

        }

        $to_send = array(
            'slug'   => $this->slug,
            'is_ssl' => is_ssl(),
            'fields' => array(
                'banners' => false, // These will be supported soon hopefully
                'reviews' => false
            )
        );
        // rhe get plugin information from transient storage cache
        $api_response = $this->get_plugin_transient($this->slug);
        if (empty($api_response)){     
            $api_response = $this->api_request( 'plugin_information', $to_send );
        }


        if ( false !== $api_response ) {
            $_data = $api_response;
        }

        return $_data;
    }


    /**
     * Disable SSL verification in order to prevent download update failures
     *
     * @param array   $args
     * @param string  $url
     * @return object $array
     */
    function http_request_args( $args, $url ) {
        // If it is an https request and we are performing a package download, disable ssl verification
        if ( strpos( $url, 'https://' ) !== false && strpos( $url, 'edd_action=package_download' ) ) {
            $args['sslverify'] = false;
        }
        return $args;
    }

    /**
     * Calls the API and, if successfull, returns the object delivered by the API.
     * 
     * 
     * @uses get_bloginfo()
     * @uses wp_remote_post()
     * @uses is_wp_error()
     *
     * @param string  $_action The requested action.
     * @param array   $_data   Parameters for the API action.
     * @return false|object
     */
    private function api_request( $_action, $_data ) {

        global $wp_version;

        $data = array_merge( $this->api_data, $_data );

        if ( $data['slug'] != $this->slug )
            return;
        

        //if ( empty( $data['license'] ) )
            //return;
        
        //if ( empty( $data['[item_name]'] ) ) 
            //return; //rhe

        if( $this->api_url == home_url() ) {
            return false; // Don't allow a plugin to ping itself
        }

        $api_params = array(
            'edd_action' => 'get_version',
            'license'    => $data['license'],
            'item_name'  => $this->item_name, //rhe
            'item_id'    => isset( $data['item_id'] ) ? $data['item_id'] : false,
            'slug'       => $data['slug'],
            'author'     => $data['author'],
            'url'        => home_url()
        );
        /*echo "<pre>api_requests() line 277 MASHSB_SL_Plugin_Updater. api params";
        echo " item name: " . $this->name;
        var_dump($api_params);
        exit;*/

        $request = wp_remote_post( $this->api_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
        /*echo "<pre>api_requests() line 277 MASHSB_SL_Plugin_Updater requests:";
        var_dump(wp_remote_retrieve_body($request));
        exit;*/

        if ( ! is_wp_error( $request ) ) {
            $request = json_decode( wp_remote_retrieve_body( $request ) );
            }

        if ( $request && isset( $request->sections ) ) {
            $request->sections = maybe_unserialize( $request->sections );
        } else {
            $request = false;
        }

        return $request;
    }

    public function show_changelog() {


        if( empty( $_REQUEST['edd_sl_action'] ) || 'view_plugin_changelog' != $_REQUEST['edd_sl_action'] ) {
            return;
}

        if( empty( $_REQUEST['plugin'] ) ) {
            return;
        }

        if( empty( $_REQUEST['slug'] ) ) {
            return;
        }

        if( ! current_user_can( 'update_plugins' ) ) {
            wp_die( __( 'You do not have permission to install plugin updates', 'mashsb' ), __( 'Error', 'mashsb' ), array( 'response' => 403 ) );
        }

        $response = $this->api_request( 'plugin_latest_version', array( 'slug' => $_REQUEST['slug'] ) );

        if( $response && isset( $response->sections['changelog'] ) ) {
            echo '<div style="background:#fff;padding:10px;">' . $response->sections['changelog'] . '</div>';
        }


        exit;
    }
    
    /* Get result of transient by slug
     * 
     * 
     * @author René Hermenau   
     * @scince x.x.x
     * @param $response string      
     */

    public function get_plugin_transient($slug) {
        $result = get_transient($slug . '_update_info');
        $result = json_decode($result);

        if ($result && isset($result->sections)) {
            $result->sections = maybe_unserialize($result->sections);
        } 
        return $result;
    }

}
