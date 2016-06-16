<?php

add_action( 'widgets_init', 'register_testimonial_widget' );

function register_testimonial_widget() {
	register_widget('Testimonial_Widget');
}
 
class Testimonial_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_testimonial', 'description' => __( "Displays the testimonial.", "framework" ) );
		parent::__construct('testimonial', __( 'SpaceX Testimonial', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_testimonial';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $post;
		
		$cache = wp_cache_get('widget_testimonial', 'widget');
		
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
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Testimonials', "spacex" ) : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
		{
			$number = 10;
		}
		
		echo $before_title.$title.$after_title; 
		
		echo do_shortcode('[testimonial carousel="yes" type="grid" column="0" perpage="'.$number.'" orderby="date" order="desc"]');

		
		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_testimonial', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();
		
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_testimonial']) )
		{
			delete_option('widget_testimonial');
		}
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_testimonial', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to show:', "spacex" ); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<?php
	}
}