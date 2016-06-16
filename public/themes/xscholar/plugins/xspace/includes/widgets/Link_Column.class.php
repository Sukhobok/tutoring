<?php

add_action( 'widgets_init', 'register_footer_link_widget' );

function register_footer_link_widget() {

	register_widget('Footer_Link_Widget');
}
 
class Footer_Link_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_footer_link_item', 'description' => __( "Create link in column", "framework" ) );
		parent::__construct('link-column', __( 'SpaceX Links Column', "spacex" ), $widget_ops);
		
		$this-> alt_option_name = 'widget_footer_link_item';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		$cache = wp_cache_get('widget_footer_link_item', 'widget');
		
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
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Links', "spacex" ) : $instance['title'], $instance, $this->id_base);
		
		
			echo $before_title.$title.$after_title; 
			
			?>
			<div class="footer-link-widget"><ul class="footer-link list-style">
				<?php if (!empty($instance['text1'])): ?>
					<li><a href="<?php echo esc_attr($instance['link1']); ?>"><?php echo esc_attr($instance['text1']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text2'])): ?>
					<li><a href="<?php echo esc_attr($instance['link2']); ?>"><?php echo esc_attr($instance['text2']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text3'])): ?>
					<li><a href="<?php echo esc_attr($instance['link3']); ?>"><?php echo esc_attr($instance['text3']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text4'])): ?>
					<li><a href="<?php echo esc_attr($instance['link4']); ?>"><?php echo esc_attr($instance['text4']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text5'])): ?>
					<li><a href="<?php echo esc_attr($instance['link5']); ?>"><?php echo esc_attr($instance['text5']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text6'])): ?>
					<li><a href="<?php echo esc_attr($instance['link6']); ?>"><?php echo esc_attr($instance['text6']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text7'])): ?>
					<li><a href="<?php echo esc_attr($instance['link7']); ?>"><?php echo esc_attr($instance['text7']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text8'])): ?>
					<li><a href="<?php echo esc_attr($instance['link8']); ?>"><?php echo esc_attr($instance['text8']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text9'])): ?>
					<li><a href="<?php echo esc_attr($instance['link9']); ?>"><?php echo esc_attr($instance['text9']); ?></a></li>
				<?php endif;?>
                <?php if (!empty($instance['text10'])): ?>
					<li><a href="<?php echo esc_attr($instance['link10']); ?>"><?php echo esc_attr($instance['text10']); ?></a></li>
				<?php endif;?>
				
			</ul>
            </div>
			<?php
			echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_footer_link_item', $cache, 'widget');
	}
	
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text1'] = strip_tags($new_instance['text1']);
		$instance['text2'] = strip_tags($new_instance['text2']);
		$instance['text3'] = strip_tags($new_instance['text3']);
		$instance['text4'] = strip_tags($new_instance['text4']);
		$instance['text5'] = strip_tags($new_instance['text5']);
		$instance['text6'] = strip_tags($new_instance['text6']);
		$instance['text7'] = strip_tags($new_instance['text7']);
		$instance['text8'] = strip_tags($new_instance['text8']);
		$instance['text9'] = strip_tags($new_instance['text9']);
		$instance['text10'] = strip_tags($new_instance['text10']);
		$instance['link1'] = strip_tags($new_instance['link1']);
		$instance['link2'] = strip_tags($new_instance['link2']);
		$instance['link3'] = strip_tags($new_instance['link3']);
		$instance['link4'] = strip_tags($new_instance['link4']);
		$instance['link5'] = strip_tags($new_instance['link5']);
		$instance['link6'] = strip_tags($new_instance['link6']);
		$instance['link7'] = strip_tags($new_instance['link7']);
		$instance['link8'] = strip_tags($new_instance['link8']);
		$instance['link9'] = strip_tags($new_instance['link9']);
		$instance['link10'] = strip_tags($new_instance['link10']);
		return $instance;
	}
	
	function flush_widget_cache()
	{
		wp_cache_delete('widget_footer_link_item', 'widget');
	}
	
	function form( $instance )
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
		$link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
		$link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
		$link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
		$link5 = isset($instance['link5']) ? esc_attr($instance['link5']) : '';
		$link6 = isset($instance['link6']) ? esc_attr($instance['link6']) : '';
		$link7 = isset($instance['link7']) ? esc_attr($instance['link7']) : '';
		$link8 = isset($instance['link8']) ? esc_attr($instance['link8']) : '';
		$link9 = isset($instance['link9']) ? esc_attr($instance['link9']) : '';
		$link10 = isset($instance['link10']) ? esc_attr($instance['link10']) : '';
		$text1 = isset($instance['text1']) ? esc_attr($instance['text1']) : '';
		$text2 = isset($instance['text2']) ? esc_attr($instance['text2']) : '';
		$text3 = isset($instance['text3']) ? esc_attr($instance['text3']) : '';
		$text4 = isset($instance['text4']) ? esc_attr($instance['text4']) : '';
		$text5 = isset($instance['text5']) ? esc_attr($instance['text5']) : '';
		$text6 = isset($instance['text6']) ? esc_attr($instance['text6']) : '';
		$text7 = isset($instance['text7']) ? esc_attr($instance['text7']) : '';
		$text8 = isset($instance['text8']) ? esc_attr($instance['text8']) : '';
		$text9 = isset($instance['text9']) ? esc_attr($instance['text9']) : '';
		$text10 = isset($instance['text10']) ? esc_attr($instance['text10']) : '';
		
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e( 'Text 1:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo $text1; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e( 'Link 1:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" /></p>
         <p><label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e( 'Text 2:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo $text2; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e( 'Link 2:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e( 'Text 3:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>" type="text" value="<?php echo $text3; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e( 'Link 3:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" /></p>
         <p><label for="<?php echo $this->get_field_id('text4'); ?>"><?php _e( 'Text 4:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text4'); ?>" name="<?php echo $this->get_field_name('text4'); ?>" type="text" value="<?php echo $text4; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e( 'Link 4:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text5'); ?>"><?php _e( 'Text 5:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text5'); ?>" name="<?php echo $this->get_field_name('text5'); ?>" type="text" value="<?php echo $text5; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link5'); ?>"><?php _e( 'Link 5:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link5'); ?>" name="<?php echo $this->get_field_name('link5'); ?>" type="text" value="<?php echo $link5; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text6'); ?>"><?php _e( 'Text 6:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text6'); ?>" name="<?php echo $this->get_field_name('text6'); ?>" type="text" value="<?php echo $text6; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link6'); ?>"><?php _e( 'Link 6:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link6'); ?>" name="<?php echo $this->get_field_name('link6'); ?>" type="text" value="<?php echo $link6; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text7'); ?>"><?php _e( 'Text 7:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text7'); ?>" name="<?php echo $this->get_field_name('text7'); ?>" type="text" value="<?php echo $text7; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link7'); ?>"><?php _e( 'Link 7:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link7'); ?>" name="<?php echo $this->get_field_name('link7'); ?>" type="text" value="<?php echo $link7; ?>" /></p>
         <p><label for="<?php echo $this->get_field_id('text8'); ?>"><?php _e( 'Text 8:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text8'); ?>" name="<?php echo $this->get_field_name('text8'); ?>" type="text" value="<?php echo $text8; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link8'); ?>"><?php _e( 'Link 8:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link8'); ?>" name="<?php echo $this->get_field_name('link8'); ?>" type="text" value="<?php echo $link8; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('text9'); ?>"><?php _e( 'Text 9:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text9'); ?>" name="<?php echo $this->get_field_name('text9'); ?>" type="text" value="<?php echo $text9; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link9'); ?>"><?php _e( 'Link 9:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link9'); ?>" name="<?php echo $this->get_field_name('link9'); ?>" type="text" value="<?php echo $link9; ?>" /></p>
         <p><label for="<?php echo $this->get_field_id('text10'); ?>"><?php _e( 'Text 10:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text10'); ?>" name="<?php echo $this->get_field_name('text10'); ?>" type="text" value="<?php echo $text10; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('link10'); ?>"><?php _e( 'Link 10:', "spacex" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link10'); ?>" name="<?php echo $this->get_field_name('link10'); ?>" type="text" value="<?php echo $link10; ?>" /></p>
        
      
		<?php
	}
}
