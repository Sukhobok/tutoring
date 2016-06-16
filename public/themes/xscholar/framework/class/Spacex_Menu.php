<?php

		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', 'xmenu_add_custom_nav_fields'  );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', 'xmenu_update_custom_nav_fields', 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', 'xmenu_edit_walker', 10, 2 );

	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function xmenu_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->image = get_post_meta( $menu_item->ID, '_menu_item_image', true );
		$menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function xmenu_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( isset($_REQUEST['menu-item-image']) && is_array( $_REQUEST['menu-item-image']) ) {
	        $image_value = $_REQUEST['menu-item-image'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_image', $image_value );
	    }
		if ( isset($_REQUEST['menu-item-icon']) && is_array( $_REQUEST['menu-item-icon']) ) {
	        $icon_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];

			if(substr($icon_value,0,2) !== 'fa')
			$icon_value = 'none';
			
	        update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
	    }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function xmenu_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

	include_once( X_BASE_DIR . '/framework/class/Walker_Nav_Menu.php');
	include_once( X_BASE_DIR . '/framework/class/Walker_Nav_Menu_Edit.php');
