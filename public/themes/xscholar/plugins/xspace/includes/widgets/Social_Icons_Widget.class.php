<?php

add_action( 'widgets_init', 'register_social_icons_widget' );

function register_social_icons_widget() {

	register_widget('Social_Icons_Widget');
}
 
class Social_Icons_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_social_icons_item', 'description' => __( "Display social icons activated in theme options", "framework" ) );
		parent::__construct('social-widget', __( 'SpaceX Social Icons Widget', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_social_icons_item';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		$cache = wp_cache_get('widget_social_icons_item', 'widget');
		
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
			
			?>
			<ul class="social-icons clearfix">
				<?php if (!empty($instance['facebook'])): ?>
					<li><a href="<?php echo esc_attr($instance['facebook']); ?>"><i class="fa fa-facebook facebook"></i></a></li>
				<?php endif;?>
				<?php if (!empty($instance['twitter'])): ?>
					<li><a href="<?php echo esc_attr($instance['twitter']); ?>"><i class="fa fa-twitter twitter"></i></a></li>
				<?php endif;?>
				<?php if (!empty($instance['tumblr'])): ?>
					<li><a href="<?php echo esc_attr($instance['tumblr']); ?>"><i class="fa fa-tumblr tumblr"></i></a></li>
				<?php endif;?>
                <?php if (!empty($instance['gplus'])): ?>
					<li><a href="<?php echo esc_attr($instance['tumblr']); ?>"><i class="fa fa-google-plus google"></i></a></li>
				<?php endif;?>
                <?php if (!empty($instance['skype'])): ?>
					<li><a href="<?php echo esc_attr($instance['skype']); ?>"><i class="fa fa-skype skype"></i></a></li>
				<?php endif;?>
			</ul>
			<?php
			echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_social_icons_item', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['gplus'] = strip_tags($new_instance['gplus']);
		$instance['tumblr'] = strip_tags($new_instance['tumblr']);
		$instance['skype'] = strip_tags($new_instance['skype']);
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_social_icons_item', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
		$gplus = isset($instance['gplus']) ? esc_attr($instance['gplus']) : '';
		$twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
		$tumblr = isset($instance['tumblr']) ? esc_attr($instance['tumblr']) : '';
		$skype = isset($instance['skype']) ? esc_attr($instance['skype']) : '';
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e( 'Facebook:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e( 'Twitter:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e( 'Google Plus:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo $gplus; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e( 'Tumblr:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo $tumblr; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e( 'Skype:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $skype; ?>" /></p>
		<?php
	}
}
