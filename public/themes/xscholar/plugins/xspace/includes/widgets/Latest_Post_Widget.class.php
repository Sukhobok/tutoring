<?php

add_action( 'widgets_init', 'register_latest_post_widget' );

function register_latest_post_widget() {
	register_widget('Latest_Post_Widget');
}
 
class Latest_Post_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_latest_posts_entries', 'description' => __( "Displays the most latest posts.", "framework" ) );
		parent::__construct('latest-posts', __( 'SpaceX Latest Posts', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_latest_posts_entries';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $post;
		
		$cache = wp_cache_get('widget_latest_posts_entries', 'widget');
		
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
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Popular Posts', "spacex" ) : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
		{
			$number = 10;
		}
		
		$query = new WP_Query( apply_filters( 'widget_posts_args', array('orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true) ) );
		
		if ($query->have_posts()) : ?>
			<?php echo $before_title.$title.$after_title;  ?>
			<?php $posts_sz = count($query->posts);?>
			<?php $i = 1;?>
        
			<ul  class="widget-list-post">
				<?php  while ($query->have_posts()) : $query->the_post(); ?>
				 <li class="clearfix effect-loaded">
                      	<?php
                        if ( has_post_thumbnail() ):
							echo get_the_post_thumbnail(get_the_id(),array(50,50));
						endif;
						?>
                       <a title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" href="<?php the_permalink() ?>"><?php if ( get_the_title() ) echo get_the_title(); else the_ID(); ?></a>
                        <i class="post-time"><?php the_time(get_option('date_format')); ?></i>
                       
                      </li>
		
				<?php endwhile; ?>
			</ul>
            
			<?php
			
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		
		endif; //have_posts()
		
		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_latest_posts_entries', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();
		
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_latest_posts_entries']) )
		{
			delete_option('widget_latest_posts_entries');
		}
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_latest_posts_entries', 'widget');
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