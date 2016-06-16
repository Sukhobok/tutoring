<?php
class XImportSampleDataPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_submenu_page(
			'spacex',
            'SpaceX Import Sample Data', 
            'Sample Data', 
            'edit_theme_options', 
            'my-import-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h2>SpaceX Import Sample Data</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );   
                do_settings_sections( 'my-setting-admin' );
                //submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Click Button Below to Install Demo Content', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

/*        add_settings_field(
            'id_number', // ID
            'ID Number', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); */  
		 add_settings_field(
            'message', 
            '', 
            array( $this, 'message_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );   
		 add_settings_field(
            'clickbutton', 
            '', 
            array( $this, 'clickbutton_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );     
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'For Copyright Issue No Images Will Be Imported.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
	 public function message_callback()
    {
        printf(
            '<div class="import_message"></div>',
            isset( $this->options['message'] ) ? esc_attr( $this->options['message']) : ''
        );
    }
	public function clickbutton_callback()
    {
        printf(
            '
			<div class="bootstrapguru_import">Install Content</div> <style  type="text/css" scoped>.bootstrapguru_import
{
	background: #2ea2cc;
	border-color: #0074a2;
	-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
	color: #fff;
	text-decoration: none;
	padding:7px 15px;
	display:inline-block;
	cursor:pointer;
	border-radius:2px;
}
.bootstrapguru_import:hover
{
	background: #222;
}
.import_loading {background:url('.X_ADMIN_ASSETS.'/images/sf_loading.gif); background-size:24px 24px; width:24px; height:24px; float:left; margin-right:20px}
</style>',
            isset( $this->options['clickbutton'] ) ? esc_attr( $this->options['clickbutton']) : ''
        );
    }
}

if( is_admin() )
    $import_sample_data_page = new XImportSampleDataPage();