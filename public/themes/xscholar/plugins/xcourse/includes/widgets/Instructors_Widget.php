<?php

add_action( 'widgets_init', 'register_instructor_widget' );

function register_instructor_widget() {
	register_widget('Instructors_Widget');
}
 
class Instructors_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_featured_instructor', 'description' => __( "Displays instructors.", "spacex" ) );
		parent::__construct('featured-instructors', __( 'SpaceX Instructors', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_featured_instructor';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $post;
		
		$cache = wp_cache_get('widget_featured_instructor', 'widget');
		
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
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Instructors', "spacex" ) : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
		{
			$number = 10;
		}
		
		echo $before_title.$title.$after_title;
		
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		
		echo do_shortcode('[instructors carousel="'.$instance['carousel'].'" latest="yes" perpage="'.$number.'" layout="wall" column="1" orderby="'.$orderby.'" order="'.$order.'"][/instructors]');
		
		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_featured_instructor', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['carousel'] = strip_tags($new_instance['carousel']);
		$instance['orderby'] = strip_tags($new_instance['orderby']);
		$instance['order'] = strip_tags($new_instance['order']);
		$this->flush_widget_cache();
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_featured_instructor', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$carousel = isset($instance['carousel']) ? esc_attr($instance['carousel']) : '';
		$orderby = isset($instance['orderby']) ? esc_attr($instance['orderby']) : 'date';
		$order = isset($instance['order']) ? esc_attr($instance['order']) : 'desc';		
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e( 'Number of posts to show:', "spacex" ); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
        
        <p>
        <input id="<?php echo esc_attr($this->get_field_id('carousel')); ?>" name="<?php echo esc_attr($this->get_field_name('carousel')); ?>" type="checkbox" value="yes" <?php checked( 'yes', $carousel ); ?> />
        
        <label for="<?php echo esc_attr($this->get_field_id('carousel')); ?>"><?php echo __('Carousel', 'spacex'); ?></label>
        
        </p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php _e('Orderby', 'wp_widget_plugin'); ?></label>
        <select name="<?php echo esc_attr($this->get_field_name('orderby')); ?>" id="<?php echo esc_attr($this->get_field_id('orderby')); ?>" class="widefat">
        <?php
        
        $options = array('date', 'title');
        
        foreach ($options as $option) {
        
            echo '<option value="' . $option . '" ', $orderby == $option ? ' selected="selected"' : '', '>', $option, '</option>';
        
        }
        
        ?>
        </select>
        </p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order', 'wp_widget_plugin'); ?></label>
        <select name="<?php echo esc_attr($this->get_field_name('order')); ?>" id="<?php echo esc_attr($this->get_field_id('order_by')); ?>" class="widefat">
        <?php
        
        $options = array('desc', 'asc');
        
        foreach ($options as $option) {
        
            echo '<option value="' . $option . '" id="' . $option . '"', $order == $option ? ' selected="selected"' : '', '>', $option, '</option>';
        
        }
        
        ?>
        </select>
        </p>


		<?php
	}
}

