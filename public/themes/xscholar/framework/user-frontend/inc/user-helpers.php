<?php
/**
 * Feature Name: Helpers
 * Author:       HerrLlama for wpcoding.de
 * Author URI:   http://wpcoding.de
 * Licence:      GPLv3
 */

/**
 * loads the action url for the forms
 *
 * @return	string
 */
 
function uf_get_current_user_role()
{
   $current_user = wp_get_current_user();
	$role = $current_user->roles;
	$user_title = '';
	if(isset($role[0]) && $role[0] != '')
	{
		$user_title = $role[0];
		if($role[0] == 'subscriber')
		{
			$user_title = __('Member','spacex');
		}
		elseif($role[0] == 'administrator')
		{
			$user_title = __('Admin','spacex');
		}
		
	}
	return  $user_title;
}
add_filter('uf_current_user_role_title', 'uf_get_current_user_role');
if ( ! function_exists( 'get_course_content_file_grid' ) ) {
	function get_course_content_file_grid() {
		ob_start();
		sc_get_template_part( 'content', 'xcourse' );
		return ob_get_clean();
	}
}
if ( ! function_exists( 'get_event_content_file_grid' ) ) {
	function get_event_content_file_grid() {
		ob_start();
		xt_get_template_part( 'content', 'xevent' );
		return ob_get_clean();
	}
}
function uf_get_current_user_manager_menu()
{

	$active_class = 'class="active"';
	$dashboard = uf_get_current_user_manager_page();
	
			global $woocommerce;
			$cart_url = is_woocommerce_activated() ? $woocommerce->cart->get_cart_url() : '';
			$checkout_url = is_woocommerce_activated() ? $woocommerce->cart->get_checkout_url() : '';

?>
	<div class="user-links">
        <ul class="nav-link">
            <li><a <?php echo  $dashboard=='' ? $active_class : ''?> href="<?php echo uf_edit_profile_url('/user-profile/')?>"><i class="fa fa-dashboard"></i><span><?php echo __('Dashboard','spacex')?></span></a></li>
            <li><a <?php echo  $dashboard=='profile' ? $active_class : ''?> href="<?php echo uf_edit_profile_url('/user-profile/'). '?dashboard=profile'?>"><i class="fa fa-user"></i><span><?php echo __('Profile','spacex')?></span></a></li>   
            <li><a <?php echo  $dashboard=='course' ? $active_class : ''?> href="<?php echo uf_edit_profile_url('/user-profile/'). '?dashboard=course'?>"><i class="fa fa-calendar-o"></i><span><?php echo __('My Courses','spacex')?></span></a></li>                      
            <li><a <?php echo  $dashboard=='cart' ? $active_class : ''?> href="<?php echo esc_url($cart_url);?>"><i class="fa fa-shopping-cart"></i><span><?php echo __('My Cart','spacex')?></span></a></li>
            <li><a <?php echo  $dashboard=='checkout' ? $active_class : ''?> href="<?php echo esc_url($checkout_url);?>"><i class="fa fa-check"></i><span><?php echo __('Check Out','spacex')?></span></a></li> 
            <li><a <?php echo  $dashboard=='order' ? $active_class : ''?> href="<?php echo uf_edit_profile_url('/user-profile/'). '?dashboard=order'?>"><i class="fa fa-credit-card"></i><span><?php echo __('My Orders','spacex')?></span></a></li>             <li><a href="<?php echo uf_logout_url( home_url( '/' ));?>"><i class="fa fa-sign-out"></i><span><?php echo __('Sign Out','spacex')?></span></a></li>				                                                                                         
        </ul>
	</div> 
<?php
}
function uf_get_current_user_manager_page()
{
	$dashboard = 'dashboard';
	if(isset($_GET[ 'dashboard' ] ))
	{
		$dashboard = $_GET[ 'dashboard' ];
	}
	if(isset($_GET['view_order']))
	{
		$dashboard = 'order';
	}
	if(isset($_GET['message']))
	{
		$dashboard = 'profile';
	}	
	return $dashboard;
}

