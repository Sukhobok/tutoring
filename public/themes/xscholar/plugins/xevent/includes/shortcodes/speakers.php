<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Speakers
/* ---------------------------------------------------------------------- */
add_shortcode('speakers', 'spacex_shortcode_speakers');

function spacex_shortcode_speakers( $atts, $content = null ) { 

	$output = $el_class = '';
	
	global $post;
	
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'carousel'			=> '',
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
		'post_type'       => 'speaker',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'post_status'     => 'publish'
	);

	global $post;
		
	$benefit = new WP_Query( $query_args );
	if(empty($columns))
	{
		$columns = 4;
	}
	if ( $benefit->have_posts() ) :
		
		if($carousel == 'yes')
		{
		$output .= '<script>jQuery(document).ready(function() { 
		
				 // store the slider in a local variable
				  var $window = jQuery(window),
					  flexslider;
				 
				  // tiny helper function to add breakpoints
				  function getGridSize() {
					  if(window.innerWidth <= 480)
					  {
						  return 1;
					  }
					  else if(window.innerWidth <= 769 && window.innerWidth > 480)
					  {
						  return 2;
				      }
					  else if(window.innerWidth <= 980 && window.innerWidth > 769)
					  {
						  return 3;
					  }
					  else
					  {
						return '.esc_attr($columns).';						  
					  }
				  }

				jQuery(".sc-speakers").flexslider({
					animation: "slide",            
					easing: "swing",               
					controlNav: true,
					directionNav: false,
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
				
				// check grid size on resize event
			  $window.resize(function() {
				var gridSize = getGridSize();
			 
				flexslider.vars.minItems = gridSize;
				flexslider.vars.maxItems = gridSize;
			  });
			  
			  
			}); </script>';
		}

		$output .= '<div class="sc-speakers sc-flexslider wpb_row vc_row-fluid clearfix '.esc_attr($layout).' sc-'.esc_attr($layout).'">';
		
		if($layout == 'list')
		{
			$output .= '<ul class="list-style blog">';
		}
		else{
			$output .= '<ul class="slides">';
		}
	
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
				case 12:
					$vc_row = '1';		
					break;			
			}
				
		while ( $benefit->have_posts() ) : $benefit->the_post(); 
			
				$job_title = get_post_meta($post->ID,'speaker-level',true);
				
				switch($layout)
				{
			
					case 'wall':

							$output .= '<li  class="vctt-benefit-item  vc_col-sm-'.esc_attr($vc_row).' teacher-wall">';

						
						
						$output .= '<div  class="sc-item">';	
							$output .=	get_the_post_thumbnail($post->ID, array(300,300));
							$output .= '<div  class="sc-meta" href="'.esc_url(get_permalink()).'">';	

							$output .= '</div>';
							
						$output .= '</div>';
						
						
						
						$output .= '</li>';
						

						break;
						
					case 'column':
						$output .= '<li  class="vctt-benefit-item vc_col-sm-'.esc_attr($vc_row).' wpb_column vc_column_container benefit-'.esc_attr($layout).'">';
						$output .=	get_the_post_thumbnail($post->ID, array(300,300));
						$output .= '<div  class="speaker-wrapper">';	
						$output .= '<h3  class="vctt-benefit-title"><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a><span>'.$job_title.'</span></h3>';
						$output .= '<div class="speaker-excerpt">';
						
						
						
						$output .= get_excerpt_max_charlength(100);
						
						$social_icons = get_post_meta($post->ID,'speaker-social',true);
						$list = '';
						
						if(is_array($social_icons))
						{
							$output .= ' <div class="instructor-social clearfix">';
							//echo ' <h2 class="course-heading"><span>More Info</span></h2>';
							foreach($social_icons as $icon)
							{
								$title = $icon['title'];
								$name = $icon['name'];
								$link = $icon['href'];
								
								if(!empty($title))
								{
									$list .= '<li><a href="'.$link.'"><i class="fa fa-'.$title.'"></i></a></li>';
								}
							
							}
							
							$output .= '<ul class="social-icons nocolor" role="tablist">'.$list.'</ul>';
							
							
							$output .= '</div><!-- End Entry Social -->';
							
						}
						
						
					
						
						
						
						$output .='</div>';
						$output .= '</div>';
						$output .= '</li>';
						

						break;
					case 'list':
						
					
							$output .= '<li  class="clearfix">';
					

						$output .= '<div class="instructor-list-item">';
						$output .=	'<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, array(300,300)).'</a>';
						$output .= '<div  class="speaker-wrapper">';	
						$output .= '<h3  class="vctt-benefit-title"><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a>';
						$output .= '</h3>';
							$output .= '<span>'.$job_title.'</span>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</li>';
						

						break;		
				
				}
			
		endwhile;
		
		wp_reset_postdata();
		
		$output .= '</ul>';	
		$output .= '</div>';	
		
	endif;
		
	return $output;	
}
