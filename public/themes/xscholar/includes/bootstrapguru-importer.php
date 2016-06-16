<?php
add_action( 'wp_ajax_my_action', 'my_action_callback' );
function my_action_callback() 
{
    global $wpdb; 

    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

    // Load Importer API
    require_once ABSPATH . 'wp-admin/includes/import.php';

    if ( ! class_exists( 'WP_Importer' ) ) {
        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
        if ( file_exists( $class_wp_importer ) )
        {
            require $class_wp_importer;
        }
    }

    if ( ! class_exists( 'WP_Import' ) ) {
        $class_wp_importer = get_template_directory() ."/includes/wordpress-importer.php";
        if ( file_exists( $class_wp_importer ) )
            require $class_wp_importer;
    }


    if ( class_exists( 'WP_Import' ) ) 
    { 
        $import_content = get_template_directory() ."/includes/sample-data/sample-data.xml" ; // Get the xml file from directory 
		
        include_once('bootstrapguru-import.php');

        $wp_import_content = new bootstrapguru_import();
        $wp_import_content->fetch_attachments = true;
        $wp_import_content->import($import_content);
        $wp_import_content->check();
		
		

    }
        die(); // this is required to return a proper result
}