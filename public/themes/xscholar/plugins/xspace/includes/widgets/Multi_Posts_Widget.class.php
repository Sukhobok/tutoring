<?php

add_action( 'widgets_init', 'register_multi_posts_widget' );

function register_multi_posts_widget() {

	register_widget('Multi_Posts_Widget');
}

class Multi_Posts_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_multi_posts', 'description' => __( "Displays tabs with most popular posts, recent posts and comments","spacex" ) );
		parent::__construct('multi-posts', __( 'SpaceX Multi Posts', "spacex" ), $widget_ops);

		$this-> alt_option_name = 'widget_multi_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $comment;

		$cache = wp_cache_get('widget_multi_posts', 'widget');

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
		$rand = rand(1000,2000);
		?>
        
        <aside id="" class="multi-post">
        <div class="horizotal-tabs clearfix" id="multi-posts-<?php echo esc_attr($rand); ?>">
        
        	<ul class="nav nav-tabs" id="mp-tabs-<?php echo esc_attr($rand); ?>">
              <li class="active"><a href="#tab1"> <?php _e('Popular','spacex'); ?></a></li>
              <li><a href="#tab2"><?php _e('Recent','spacex'); ?></a></li>
              <li><a href="#tab3"><i class="icon-comment"> </i><?php _e('Comments','spacex'); ?></a></li>
            </ul>
            
			<div class="tab-content">
              <div class="tab-pane active fade in" id="tab1">
               
               
               <ul  class="widget-list-post">
               <?php
					$number = 5;
					$query = new WP_Query( apply_filters( 'widget_posts_args', array('orderby' => 'comment_count DESC', 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => 1) ) );
					if ($query->have_posts()) : ?>
						<?php $posts_sz = count($query->posts);?>
						<?php $i = 0;?>
							<?php  while ($query->have_posts()) : $query->the_post(); ?>
                            
                      <li class="clearfix">
                      	<?php
                        if ( has_post_thumbnail() ):
							the_post_thumbnail('small-thumb');
						endif;
						?>
                       <a title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" href="<?php the_permalink() ?>"><?php if ( get_the_title() ) echo get_the_title(); else the_ID(); ?></a>
                        <i class="post-time"><?php the_time(get_option('date_format')); ?></i>
                       
                      </li>
                      <?php endwhile; ?>
                      <?php
						// Reset the global $the_post as this query will have stomped on it
						wp_reset_postdata();
					endif; //have_posts()
					?>
              </ul>
	               
              </div>
              <div class="tab-pane fade" id="tab2">
              
              
              <ul  class="widget-list-post">
              <?php
					$number = 5;
					$query = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true  ) ) );
					if ($query->have_posts()) : ?>
						<?php $posts_sz = count($query->posts);?>
						<?php $i = 0;?>
							<?php  while ($query->have_posts()) : $query->the_post(); ?>
              
                      <li class="clearfix effect-loaded">
                      	<?php
                        if ( has_post_thumbnail() ):
							the_post_thumbnail('small-thumb');
						endif;
						?>
                       <a title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" href="<?php the_permalink() ?>"><?php if ( get_the_title() ) echo get_the_title(); else the_ID(); ?></a>
                        <i class="post-time"><?php the_time(get_option('date_format')); ?></i>
                       
                      </li>
                      
                       <?php endwhile; ?>
                      <?php
						// Reset the global $the_post as this query will have stomped on it
						wp_reset_postdata();
					endif; //have_posts()
					?>
                      
               </ul>
              
              </div>
              <div class="tab-pane fade" id="tab3">
              
              
               <ul  class="widget-list-post">
              
              <?php
					$number = 5;
					$comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) ) );
					$i = 0;
					if ( $comments ):
						foreach ( (array) $comments as $comment) {

							?>
                      <li class="clearfix effect-loaded">
                       <a href='<?php echo esc_url( get_comment_link($comment->comment_ID) ); ?>'><?php echo $comment->comment_content; ?></a>
                        <i class="post-time"><?php the_time(get_option('date_format')); ?></i>
                       
                      </li>
                      
                       <?php } ?>
                      <?php
						// Reset the global $the_post as this query will have stomped on it
						wp_reset_postdata();
					endif; //have_posts()
					?>
                      
               </ul>
              </div>
            </div>
          </aside>  

		
		<?php

		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_multi_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
		{
			delete_option('widget_recent_entries');
		}
		return $instance;
	}

	function flush_widget_cache()
	{
		wp_cache_delete('widget_multi_posts', 'widget');
	}

	function form( $instance )
	{
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
		?>
		<p><?php _e('No options here','spacex');?></p>
		<?php
	}
}