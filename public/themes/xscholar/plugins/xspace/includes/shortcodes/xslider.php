<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode XSlider
/* ---------------------------------------------------------------------- */
add_shortcode('xslider', 'spacex_shortcode_xslider');

function spacex_shortcode_xslider( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'content'			=> '',
		'heading'			=> '',
		'perpage'			=> '',
		'orderby'			=> '',
		'order'			=> '',
		'css_animation'			=> '',		
	), $atts));
	
	$output .= '<div class="xslider sc-flexslider">';
	
	$args = array(
        'posts_per_page' 	=> $perpage,
        'orderby' 		=> $orderby,
        'order' 		=> $order,
		'post_type'	=> 'xslider',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
    );


	$slides = new WP_Query( $args );
	
	if ( $slides->have_posts() ) :
		
		$sliders = '';
		$nav = '';
		$output .= '<ul class="slides">';
		$col = '';
		if($slides->post_count == 1)
		{
			$col = 12;
		}
		elseif($slides->post_count == 2)
		{
			$col = 6;			
		}
		elseif($slides->post_count == 3)
		{
			$col = 4;			
		}
		elseif($slides->post_count == 4)
		{
			$col = 3;			
		}
		elseif($slides->post_count == 5)
		{
			$col = 5;			
		}
		elseif($slides->post_count == 6)
		{
			$col = 2;			
		}
		while ( $slides->have_posts() ) : $slides->the_post(); 		
		
			$heading = get_post_meta(get_the_id(),'slide-heading',true);
			$content = get_post_meta(get_the_id(),'slide-content',true);
			$link = get_post_meta(get_the_id(),'slide-link',true);
			$icon = get_post_meta(get_the_id(),'slide-icon',true);
			$nav_desc = get_post_meta(get_the_id(),'slide-desc',true);
			
			if($link !== '')
			{	
				$sliders .= '<li class="has-button">';
			}
			else
			{
				$sliders .= '<li>';
			}
				$sliders .= get_the_post_thumbnail(get_the_id(), 'full');
				$sliders .= '<div class="slide_text">
								<div class="container">
									<div class="slide_text_content">
										<div class="sc-table">
											<div class="sc-cell">
												<h2 class="slide_title">'.$heading.'</h2>
												<div class="slide_byline wpb_text_column">'.$content.'</div>';
												if($link !== '')
												{
													$sliders .= '<a class="xslider-readmore" href="'.$link.'">'.__('Read More', 'spacex').'</a>';
												}
			$sliders .= '					</div>	
										</div>
									</div>
								</div>
						 	  </div>';
			$sliders .= '</li>';
			
			
			
			
			if(!empty($icon))
			{
				$nav .= '<li class="col-lg-'.$col.' col-xs-12 col-md-'.$col.' col-sm-'.$col.' has-icon">';
				$nav .= '<i class="fa '.$icon.'"></i>';				
			}
			else
			{
				$nav .= '<li class="col-lg-'.$col.' col-xs-12 col-md-'.$col.' col-sm-'.$col.' ">';			
			}
			$nav .= '<h3>';
			$nav .= $heading.'</h3>';
			$nav .= '<p class="wpb_text_column">'.$nav_desc.'</p>';
			
			$nav .= '</li>';
										
		endwhile; // end of the loop.
			
		wp_reset_postdata();
		
		$output .= $sliders;	
		$output .= '</ul>';
		
				
	endif;
		

	$output .= '</div>';
	$output .= '<div class="xslider-control flexslider-controls">
				  <ol class="flex-control-nav container">';
		$output .= $nav;
		$output .= '</ol>
		</div>';
		
		$output .= '<script>jQuery(document).ready(function() { 
		
				jQuery(".xslider").flexslider({
					animation: "slide",            
					easing: "swing",               
					smoothHeight: true,
					manualControls: ".flex-control-nav li",		 					
					useCSS: false /* Chrome fix*/
				});
			  
			}); </script>';
		
	return $output;	
}
