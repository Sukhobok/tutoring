<?php

add_action( 'widgets_init', 'register_xtaxonomy_widget' );

function register_xtaxonomy_widget() {
	register_widget('X_Taxonomies_Widget');
}
 
class X_Taxonomies_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_x_tax', 'description' => __( "Displays taxonomies of theme.", "spacex" ) );
		parent::__construct('xtaxonomies', __( 'SpaceX Taxonomies', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_x_tax';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $post;
		
		$cache = wp_cache_get('widget_x_tax', 'widget');
		
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
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Title', "spacex" ) : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
		{
			$number = 10;
		}
		
		echo $before_title.$title.$after_title;
		
		$tax = $instance['taxonomy'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
				
				
		echo do_shortcode('[xcategories taxonomy="'.$tax.'" latest="yes" perpage="'.$number.'" layout="list" orderby="'.$orderby.'" order="'.$order.'"][/xcategories]');
		
		echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_x_tax', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['taxonomy'] = strip_tags($new_instance['taxonomy']);
		$instance['orderby'] = strip_tags($new_instance['orderby']);
		$instance['order'] = strip_tags($new_instance['order']);
		$this->flush_widget_cache();
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_x_tax', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : '';
		$featured = isset($instance['taxonomy']) ? esc_attr($instance['taxonomy']) : '';
		$orderby = isset($instance['orderby']) ? esc_attr($instance['orderby']) : 'date';
		$order = isset($instance['order']) ? esc_attr($instance['order']) : 'desc';		
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e( 'Number of posts to show:', "spacex" ); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
         <p>
        <label for="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>"><?php _e('Taxonomies', 'wp_widget_plugin'); ?></label>
        <select name="<?php echo esc_attr($this->get_field_name('taxonomy')); ?>" id="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>" class="widefat">
        <?php
        
        $options = array('course_cat', 'event_cat', 'product_cat', 'category');
        
        foreach ($options as $option) {
        
            echo '<option value="' . $option . '" ', $orderby == $option ? ' selected="selected"' : '', '>', $option, '</option>';
        
        }
        
        ?>
        </select>
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
        <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'wp_widget_plugin'); ?></label>
        <select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order_by'); ?>" class="widefat">
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

