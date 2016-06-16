<?php

add_action( 'widgets_init', 'register_single_image_widget' );

function register_single_image_widget() {
	register_widget('Single_Image_Widget');
}
 
class Single_Image_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'ts_widget_single_image', 'description' => __( "Create single image on sidebar.", "framework" ) );
		parent::__construct('ts-single-image', __( 'SpaceX Single Image', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'ts_widget_single_image';
		
		add_action( 'admin_enqueue_scripts', array( $this, 'ts_widget_script') );
		 
			
	}
	function ts_widget_script()
	{
	  	wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
		wp_enqueue_script('customize-admin', X_ADMIN_ASSETS . '/js/customize-admin.js');
	}
	function widget($args, $instance)
	{
		global $post;
		
		$cache = wp_cache_get('ts_widget_single_image', 'widget');
		
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
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		
		$image = isset($instance['image']) ? esc_attr($instance['image']) : '';
		$link = isset($instance['link']) ? esc_attr($instance['link']) : '';
		$target = isset($instance['target']) ? esc_attr($instance['target']) : '';
		
		
		
		$query = new WP_Query( apply_filters( 'widget_posts_args', array('orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $image, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true) ) );
		
		if ($query->have_posts()) :
				echo $before_title.$title.$after_title; 
		
				while ($query->have_posts()) : $query->the_post();
					if($link !== '')
					{
						echo '<a href="'.$link.'" target="'.$target.'">';
					}
					echo '<img src="'.$image.'" alt="'.$title.'" />';				
					if($link !== '')
					{
						echo '</a>';
					}
				endwhile;
			

			
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		
		endif; //have_posts()
		
		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('ts_widget_single_image', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['target'] = strip_tags($new_instance['target']);
		
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('ts_widget_single_image', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$image = isset($instance['image']) ? esc_attr($instance['image']) : '';
		$link = isset($instance['link']) ? esc_attr($instance['link']) : '';
		$target = isset($instance['target']) ? esc_attr($instance['target']) : '';
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id('image'); ?>"><?php _e( 'Image:', "spacex" ); ?></label>
         <input type="text" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php echo $image; ?>" class="widefat" />
         <br>
          <a class="menu_upload_media button" href="#">Choose Image</a>
         
      		<?php 
			if($image != '')
			{
			?>
         <img src="<?php echo esc_url($image)?>" alt="" style="max-width:100%;"/>
         <?php
			}
		 ?>
          </p>

          <p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link:', "spacex" ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></p>
            
            <p><label for="<?php echo $this->get_field_id( 'target' ); ?>"><?php _e("Target",'spacex'); ?> <select class="widefat" id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>"><option <?php if($target=="_blank"){echo 'select = "selected"';}?> value="_blank"><?php _e( 'Current Window', "spacex" ); ?></option><option <?php if($target=="_parent"){echo 'select = "selected"';}?> value="_parent"><?php _e( 'New Window', "spacex" ); ?></option></select></p>
        
	
	
		<?php
	}
}