<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Client
/* ---------------------------------------------------------------------- */
add_shortcode('client', 'spacex_shortcode_client');

function spacex_shortcode_client( $atts, $content = null ) { 
global $post;
	$output = $el_class = '';
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'carousel'			=> '',
		'column'			=> '',
		'perpage'			=> '',
		'offset'			=> '',
		'orderby'			=> '',
		'order'			=> '',
		'css_animation'			=> '',
	), $atts));
	
	if(empty($offset))
	{
		$offset = 0;
	}
	
	$class = xgetCSSAnimation($css_animation);	
	
	$query_args = array(
		'numberposts'     => '',
		'posts_per_page'     => $perpage,
		'offset'          => $offset,
		'orderby'         => $orderby,
		'order'           => $order,
		'post_type'       => 'client',
		'post_status'     => 'publish'
	);

	global $post;
		
	$benefit = new WP_Query( $query_args );
	
	if ( $benefit->have_posts() ) :
		
		if($carousel == 'yes')
		{
		$output .= '<script>(function() {
		
				 // store the slider in a local variable
				  var $window = jQuery(window),
					  flexslider;
				 
				  // tiny helper function to add breakpoints
				  function getGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : '.$column.';
				  }
				$window.load(function() {
					jQuery(".sc-clients").flexslider({
						animation: "slide",            
						easing: "swing",               
						controlNav: false,
						directionNav: true,
						itemWidth: 210,
						minItems: getGridSize(), // use function to pull in initial value
						maxItems: getGridSize(), // use function to pull in initial value			 
						smoothHeight: true,
						prevText: "<i class=\'fa fa-angle-left\'></i>",
						nextText: "<i class=\'fa fa-angle-right\'></i>",
						start: function (slider) {
							flexslider = slider; //Initializing flexslider here.
						}
					});
				});
				// check grid size on resize event
			  $window.resize(function() {
				var gridSize = getGridSize();
			 
				flexslider.vars.minItems = gridSize;
				flexslider.vars.maxItems = gridSize;
			  });
			  
			  
			}()); </script>';
		}

		$output .= '<div class="sc-clients sc-flexslider wpb_row vc_row vc_row-fluid clearfix '.$class.'">';
		
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
				case 6:
					$vc_row = '2';		
					break;			
			}
				
		while ( $benefit->have_posts() ) : $benefit->the_post(); 
			
			
			
			
			
		$output .= '<li  class="sc-column vc_col-sm-'.$vc_row.' wpb_column vc_column_container">';
		$output .= '<div  class="client-wrapper">';	

			$output .= '<a  class="instructor-excerpt" href="'.esc_url(get_the_content()).'">';	
				$output .=	get_the_post_thumbnail($post->ID);				
			$output .= '</a>';
			
		$output .= '</div>';
		$output .= '</li>';
		

						

				
			
		endwhile;
		
		wp_reset_postdata();
		
		$output .= '</ul>';	
		$output .= '</div>';	
		
	endif;
		
	return $output;	
}
