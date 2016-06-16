<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Product Categories
/* ---------------------------------------------------------------------- */
add_shortcode('xcategories', 'spacex_shortcode_productcategories');

function spacex_shortcode_productcategories( $atts, $content = null ) { 
	$output = '';
	 extract(shortcode_atts(array(
                'title' => '',
				'taxonomy'	=> '',
				'perpage' => '',
				'layout' => '',
				'carousel' => '',
				'column' => '',
				'text' => '',
				'orderby' => '',
				'order'	=> '',  
				'el_class' => '',
				'css_animation'			=> '',
	), $atts));
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	if(empty($taxonomy) || !isset($taxonomy))
	{
		$taxonomy = 'course_cat';
	}
	if(empty($perpage))
	{
		$perpage = 10;
	}
	$args = array(
		'number'       => $perpage, 
		'orderby'       => $orderby, 
		'order'         => $order,
		'hide_empty'    => false, 
		'fields'        => 'all', 
		'slug'          => '', 
		'parent'         => '',
		'hierarchical'  => true, 
		'child_of'      => 0, 
		'pad_counts'    => false, 
		'search'        => '', 
		'cache_domain'  => 'core'
	); 


    $terms = get_terms( 'course_cat', $args );

    if (count($terms) > 0) {
	
		if (isset($title) && $title != '')
		{
			$output .= '<h3 class="block-heading"><span>'.$title.'</span></h3>';
		}	
		
		
		if($carousel == 'yes')
		{
			$output .= '<script>jQuery(document).ready(function() {
		
				 // store the slider in a local variable
				  var $window_cat = jQuery(window),
					  flexslider_cat;
				 
				  // tiny helper function to add breakpoints
				  function getGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : '.esc_attr($column).';
				  }
				 
				$window_cat.load(function() {
					jQuery(".sc-tax").flexslider({
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
							flexslider_cat = slider; //Initializing flexslider here.
						}
					});
				});
				
				// check grid size on resize event
			  $window_cat.resize(function() {
				var gridSize = getGridSize();
			 
				flexslider_cat.vars.minItems = gridSize;
				flexslider_cat.vars.maxItems = gridSize;
			  });
			  
			  
			}); </script>';
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
			}
				
		if($layout == 'list')
		{
			$vc_row = '0';			
		}
		$output .= '<div class="sc-flexslider sc-tax wpb_row vc_row-fluid clearfix sc-'.esc_attr($layout).' grid '.$el_class.' '.$carousel.'">';
		$output .= '<ul class="slides">';
		foreach ($terms as $term) {

			$term = sanitize_term( $term, $taxonomy );
			$term_link = get_term_link( $term, $taxonomy );
			
			$output .= '<li  class="sc-column vc_col-sm-'.esc_attr($vc_row).' wpb_column vc_column_container">';
			
				$output .= '<div  class="sc-item">';	

					$args = array(
						'post_type' => 'xcourse',
						'numberposts' => -1,
						'post_status' => 'published',
						'tax_query' => array(
							array(
								'taxonomy' => 'course_cat',
								'field' => 'slug',
								'terms' => $term->slug
							)
						)
					);

					$num = count( get_posts( $args ) );		
					
					if($layout == 'wall')
					{
						$output .= '<a href="'.$term_link.'" target="_blank"" style="background:'.get_term_course_cat_color($term->term_id).'">';
							
							$output .= '<div class="sc-meta">';	
	
										
										if($text != 'yes')
										{
											$output .= '<h3>' . $term->name . '<span class="count-tax">'.$num.'</span></h3>';		
	
										}
										
	
							$output .= '</div>';
							
							$output .= get_term_course_cat_thumbnail($term->term_id);
							
					
						$output .= '</a>';
					}
					elseif($layout == 'column')
					{
						$output .= '<a href="'.$term_link.'" target="_blank"" style="background:'.get_term_course_cat_color($term->term_id).'">';
							
							$output .= get_term_course_cat_thumbnail($term->term_id);
							
					
						$output .= '</a>';
						$output .= '<div class="sc-meta">';	
	
										
										if($text != 'yes')
										{
											$output .= '<h3>' . $term->name . '<span class="count-tax">'.$num.'</span></h3>';		
	
										}
										
	
							$output .= '</div>';
					}
					elseif($layout == 'list')
					{
							
							$output .= '<h3><a href="'.$term_link.'" target="_blank"">' . $term->name . '<span class="count-tax">'.$num.'</span></a></h3>';	
							
					
					
					}
				$output .= '</div>';
			$output .= '</li>';
	
		}
    	$output .= '</ul>';
		$output .= '</div>';
	}
	return $output;
}

