<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Testimonial
/* ---------------------------------------------------------------------- */

add_shortcode('testimonial', 'spacex_shortcode_testimonial');

function spacex_shortcode_testimonial( $atts, $content = null ) { 
	global $post;
	$output = $el_class = '';
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'carousel'			=> '',
		'type'			=> '',
		'column'			=> '',
		'perpage'			=> '',
		'layout'			=> '',
		'offset'			=> '',
		'orderby'			=> '',
		'order'			=> '',
		'css_animation'			=> '',		
	), $atts));
	
	if(empty($offset))
	{
		$offset = 0;
	}
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$query_args = array(
			'posts_per_page' 	=> $perpage,
			'post_status' 	=> 'publish',
			'post_type' 	=> 'testimonial',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		);
		
	$testimonial = new WP_Query( $query_args );
	
	if ( $testimonial->have_posts() ) :
		
		if($carousel == 'yes')
		{
		$output .= '<script>(function() {
		
				 // store the slider in a local variable
				  var  flexslider_testimonial;
				 
				  // tiny helper function to add breakpoints
				  function getTestimonialGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : '.esc_attr($column).';
				  }
				  
				jQuery( document ).ready(function() {
					jQuery(".sc-testimonial").flexslider({
						animation: "fade",            
						easing: "swing",               
						controlNav: false,
						directionNav: true,
						itemWidth: 210,
						minItems: getTestimonialGridSize(), // use function to pull in initial value
						maxItems: getTestimonialGridSize(), // use function to pull in initial value			 
						smoothHeight: true,
						prevText: "<i class=\'fa fa-angle-left\'></i>",
						nextText: "<i class=\'fa fa-angle-right\'></i>",
						start: function (slider) {
							flexslider_testimonial = slider; //Initializing flexslider here.
						}
					});
				});
				
				  // check grid size on resize event
				  jQuery(window).resize(function() {
					var gridSize = getTestimonialGridSize();
				 
					flexslider_testimonial.vars.minItems = gridSize;
					flexslider_testimonial.vars.maxItems = gridSize;
				  });
			  
			  
			}()); </script>';
		}

		$output .= '<div class="sc-testimonial sc-flexslider wpb_row vc_row-fluid clearfix '.$el_class.'">';
		
		$output .= '<ul class="slides">';
	
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
				case 5:
					$vc_row = '5';	
					break;			
			}
				
	 while ( $testimonial->have_posts() ) : $testimonial->the_post(); 	
			
			$address = get_post_meta($post->ID, 'testimonial_address', true);	
			$company = get_post_meta($post->ID, 'testimonial_company', true);				
			
			$output .= '<li  class="vc_col-sm-'.esc_attr($vc_row).' wpb_column vc_column_container"><div class="testimonial-item clearfix">';
			
			if(has_post_thumbnail())					
			{
				$output .= '<div class="author-avatar">'.get_the_post_thumbnail($post->ID, 'testimonial') . '</div>'; 
			}
			$output .=	'<div class="author"><p class="testimonial">'.get_the_content().'</p>
									<b class="author-name">'.get_the_title().'<br></b>';
			if(!empty($company))						
			{
				$output .= '<span class="author-company"><i class="fa fa-briefcase"></i>'.$company.'</span>';						
			}
			if(!empty($address))						
			{						
				$output .= '<span class="author-address"><i class="fa fa-map-marker"></i>'.$address.'</span>';
			}
			
			$output .= '</div>';
			
			$output .= '</div></li>';
				
	 endwhile;
		
		wp_reset_postdata();
		
		$output .= '</ul>';	
		$output .= '</div>';	
		
	endif;
		
	return $output;	
}


