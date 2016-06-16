<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Counter
/* ---------------------------------------------------------------------- */
add_shortcode('counter', 'spacex_shortcode_counter');

function spacex_shortcode_counter( $atts, $content = null ) { 

	$output = $el_class = '';
	
	global $post;
	
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'column'			=> '',
		'perpage'			=> '',
		'offset'			=> '',
		'orderby'			=> '',
		'order'				=> '',
		'layout'				=> '',
		'type'				=> '',
		'css_animation'			=> '',
		
	), $atts));
	$el_class .= xgetCSSAnimation($css_animation);	
	
		wp_enqueue_script( 'counter',  	X_BASE_URL . 'js/counter.js',          			array('jquery'), false, true );
		wp_enqueue_script( 'waypoint',			'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js',         			array('jquery'), false, true );
		
	$handle = 'counter.js';
   	$list = 'enqueued';
	
	if (wp_script_is( $handle, $list )) {
		
	} else {
		wp_register_script( 'waypoint',		'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js',  array('jquery'), false, true );
		//wp_enqueue_script( 'waypoint');
		wp_register_script( 'counter',  	X_BASE_URL . 'js/counter.js',          			array('jquery'), false, true );
		wp_enqueue_script( 'counter');

	}	
	
	 $output .='<script>
        jQuery(document).ready(function() {
            jQuery(\'.counter-value\').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>';
	
	
	
	
	
		$query_args = array(
		'numberposts'     => '',
		'posts_per_page'     => $perpage,
		'offset'          => $offset,
		'cat'        =>  '',
		'orderby'         => $orderby,
		'order'           => $order,
		'include'         => '',
		'exclude'         => '',
		'meta_key'        => '',
		'meta_value'      => '',
		'post_type'       => 'counter',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'post_status'     => 'publish'
	);

	global $post;
		
	$counter = new WP_Query( $query_args );
	
	if ( $counter->have_posts() ) :
	
		$output .= '<div class="vctt-counter wpb_row vc_row-fluid clearfix '.$layout.' '.$el_class.'">';
		
		$vc_row = '';
		
			switch($column)
			{
				case 1:
					$vc_row = '12';
					break;
				case 2:
					$vc_row = '6';
					break;
				case 3:
					$vc_row = '4';
					break;
				case 4:
					$vc_row = '3';
					break;			
			}
				
		while ( $counter->have_posts() ) : $counter->the_post(); 
		

			$icon = get_post_meta($post->ID, 'spacex_counter_icon', true);
			$custom_icon = get_post_meta($post->ID, 'spacex_counter_custom_icon', true);
			$icon_size = get_post_meta($post->ID, 'spacex_counter_custom_icon_size', true);
			
			$output .= '<div  class="vctt-counter-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container counter-'.$type.'">';
			
			if(empty($custom_icon))
			{
				$output .= '<div class="counter-icon"><i class="fa '.$icon.'"></i></div>';	
			}
			else
			{
				$output .= '<div class="counter-icon"><img src="'.$custom_icon.'" alt="'.get_the_title().'"></div>';
			}
			
			$output .= '<div class="counter-value">'.get_the_content().'</div>';
			$output .= '<h3>'.get_the_title().'</h3>';
			$output .= '</div>';	
			
		endwhile;
		wp_reset_postdata();
		$output .= '</div>';	
		
	endif;
	
	return $output;

}
