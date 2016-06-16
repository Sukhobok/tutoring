<?php

add_action( 'widgets_init', 'register_minicart_widget' );

function register_minicart_widget() {

	register_widget('Mini_Cart_Widget');
}
 
class Mini_Cart_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_mini_cart', 'description' => __( "Display mini cart.", "framework" ) );
		parent::__construct('mini-cart-widget', __( 'SpaceX Mini Cart', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_mini_cart';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		$cache = wp_cache_get('widget_mini_cart', 'widget');
		
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
			echo do_shortcode('[minicart]');
			echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_mini_cart', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_mini_cart', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		?>
		<p>There is no option for this widget.</p>
		<?php
	}
}
