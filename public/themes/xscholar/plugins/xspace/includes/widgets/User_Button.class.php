<?php

add_action( 'widgets_init', 'register_user_button_widget' );

function register_user_button_widget() {

	register_widget('User_Button_Widget');
}
 
class User_Button_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_user_button', 'description' => __( "Display button trigger user login", "framework" ) );
		parent::__construct('user-button-widget', __( 'SpaceX User Login Button', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_user_button';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		$cache = wp_cache_get('widget_user_button', 'widget');
		
		if ( !is_array($cache) )
		{
			$cache = array();
		}
		if ( ! isset( $args['widget_id'] ) )
		{
			$args['widget_id'] = $this->id;
		}
		
		if ( isset( $cache[ $args['widget_id'] ] ) )
		{
			echo $cache[ $args['widget_id'] ];
			return;
		}
	
		ob_start();
		extract($args);
		echo $before_widget;
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Random Work', "spacex" ) : $instance['title'], $instance, $this->id_base);
		
		
			echo $before_title.$title.$after_title; 
			
			$echo_trigger = '';
			$echo_content = '';	
			if ( is_user_logged_in() ) {
				$current_user = wp_get_current_user();
				$echo_trigger .= get_avatar( get_the_author_meta( 'email' ), 30 );
				$echo_trigger .= $current_user->display_name;
			}
			else
			{
				$echo_trigger = __('<i class="fa fa-sign-in"></i>Login / Register','spacex');
			}
			
		 ?>
		
		<div id="user-trigger" class="select_wrapper pinned">
			
				
				<?php
				if ( is_user_logged_in() ) {
				?>
                <span class="select_trigger"><?php echo $echo_trigger?></span>	
                <?php
					echo '<div class="select_dropdown">';
					uf_get_current_user_manager_menu();
				}
				else
				{
					?>
                    <span class="select_trigger login_form_open"><?php echo $echo_trigger?></span>	
                    <?php
					echo '<div id="login_form" class="login-form">';
					echo '<h3 style="color:#fff">'.__('Login', 'spacex').'</h3>';
					echo do_shortcode('[loginform]');
					
					echo ' <script>
						jQuery(document).ready(function() {
					
						// Initialize the plugin
						jQuery("#login_form").popup({
							transition: "all 0.3s"
						});
					
						});
					  </script>';
				}
				?>
				</div>
		</div>
			
			<?php
			echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_user_button', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_user_button', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		?>
		<p>There is no option for this widget.</p>
		<?php
	}
}
