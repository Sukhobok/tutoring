<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Course
/* ---------------------------------------------------------------------- */
add_shortcode('courses', 'spacex_shortcode_courses');

function spacex_shortcode_courses( $atts, $content = null ) { 
	
	global $post;
	 extract(shortcode_atts(array(
                'title' => '',
				'perpage' => '',
				'category' => '',
				'featured' => '',
				'latest' => '',
				'bestsellers' => '',
				'onsale' => '',
				'orderby' => '',
				'order'	=> '',
				'layout'	=> '',
				'carousel'			=> '',
				'class' => '',
				'filter' => '',
				'css_animation'			=> '',					
	), $atts));
	
   	if(empty($perpage) || !isset($perpage))
	{
		$perpage = 3;
	}
   	$el_class = xgetCSSAnimation($css_animation);	
	
	$output = '';
	
	if ( ! empty( $category ) && empty( $cat ) )
        $cat = $category;  
  	
  	if ( isset( $latest ) && $latest == 'yes' ) {
        $orderby = 'date';
        $order = 'desc'; 
    }
	
	$meta_query = '';

    if(isset( $featured) && $featured == 'yes' ){
		
		 $meta_query = array(
            'key' 		=> '_featured',
            'value' 	=> 'true'
        );
    }
	if ( ! empty( $cat ) ) {
        $tax = 'course_cat';
        $cat = array_map( 'trim', explode( ',', $cat ) );
        if ( count($cat) == 1 ) $cat = $cat[0];
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => $tax,
                'field' => 'slug',
                'terms' => $cat
            )
        );
    }

    $query_args = array(
        'posts_per_page' 	=> $perpage,
        'orderby' 		=> $orderby,
        'order' 		=> $order,
        'meta_query' 	=> $meta_query,
		'post_type'	=> 'xcourse',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
    );


	$courses = new WP_Query( $query_args );

    ob_start();
	
    
    $i = 0;
	$spacex_columns = ot_get_option('tt_product_column');
	if(empty($spacex_columns))
	{
		$spacex_columns = 4;
	}
	if ( $courses->have_posts() ) :
		
		
		if($carousel == 'yes' && $layout=='grid')
		{
		$output .= '<script>(function() {
		
				 // store the slider in a local variable
				  var $window = jQuery(window),
					  flexslider_course;
				 
				  // tiny helper function to add breakpoints
				  function getCourseGridSize() {
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
						return '.esc_attr($spacex_columns).';						  
					  }

				  }
				  
				jQuery( document ).ready(function() {
					
					var myslider = jQuery(".sc-courses-grid").flexslider({
						animation: "slide",            
						easing: "swing",               
						controlNav: true,
						directionNav: true,
						itemWidth: 210,
						itemMargin: 30,
						minItems: getCourseGridSize(), // use function to pull in initial value
						maxItems: getCourseGridSize(), // use function to pull in initial value			 
						smoothHeight: true,
						prevText: "<i class=\'fa fa-angle-left\'></i>",
						nextText: "<i class=\'fa fa-angle-right\'></i>",
						start: function (slider) {
							flexslider_course = slider; //Initializing flexslider here.
						},

					});
					
				});
				

			 // check grid size on resize event
			  $window.resize(function() {
				
				var gridSize = getCourseGridSize();
			 
				flexslider_course.vars.minItems = gridSize;
				flexslider_course.vars.maxItems = gridSize;
			  });
			  
			  
			  
			}()); </script>';
		}
		
		if (isset($title) && $title != '')
		{
			$output .= '<h3 class="block-heading in-list type-2 align-left"><span>'.$title.'</span></h3>';
		}
		
		
		$output .= '<aside class="woocommerce clearfix sc-courses-grid sc-flexslider">';
		
		
		if($filter == 'yes')
		{
			$output .= spacex_build_dropdown_course_categories_homepage($perpage);
		}
		
		if($layout == 'list' )
		{	
			 $output .= '<ul class="product_list_widget course-list">';
			 while ( $courses->have_posts() ) : $courses->the_post(); 	
			
			 $output .= '<li class="'.esc_attr($el_class).'">';
			 
			// $cat_count = sizeof( get_the_terms( $post->ID, 'course_cat' ) );
 			//$output .= get_xcourse_categories($post->ID, '<span class="posted_in">' . _n( '', 'Categories:', $cat_count, 'spacex' ), '</span>' ); 
			
			 $output .= '<a href="'. get_permalink($post->ID) .'" title="'.get_the_title($post->ID).'">';
			 $output .= get_the_post_thumbnail($post->ID, array(120,120));
			
			$output .= get_the_title($post->ID);	
			$output .= '</a>';
			$output .= xcourse_get_price() . '  &nbsp;&nbsp; ' . xcourse_get_enroll_members();
			
			
	
			$output .= '</li>';
	
			endwhile;
			
			$output .= '</ul>';
		   
		}
		elseif($layout == 'table' )
		{	
			 $output .= '<ul class="table list-table">';
			 while ( $courses->have_posts() ) : $courses->the_post(); 	
				
				
				$product_id = get_post_meta($post->ID,'course_selling',true);
				$product_obj = wc_get_product( $product_id );
		
		
				$cat_count = sizeof( get_the_terms( $post->ID, 'course_cat' ) );
				
				$output .= '<li class="'.esc_attr($el_class).' table-row">';
				
				$output .= '<div class="table-col col-thumbnail">'.get_the_post_thumbnail($post->ID, array(80,80)).'</div>';
				
				$output .= '<div class="table-col col-title"><h3><a href="'. get_permalink($post->ID) .'" title="'.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a></h3></div>';
				
				$output .= '<div class="table-col col-cat">'. get_xcourse_categories($post->ID, ', ', '<span class="posted_in">' . _n( '', '', $cat_count, 'spacex' ) . ' ', '</span>' ).'</div>';
				
				$output .= '<div class="table-col col-price">'.xcourse_get_price().'</div>';
				
				$output .= '<div class="table-col col-meta">';
				if($product_obj)
				{
					$output .= xcourse_get_enroll_members().__(' People has joined','spacex');
				}
				$output .= '</div>';
				
				if($product_obj)
				{
				$output .= '<div class="table-col col-button">'.apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="%s product_type_%s">%s</a>',
							esc_url( $product_obj->add_to_cart_url() ),
							esc_attr( $product_obj->id ),
							esc_attr( $product_obj->get_sku() ),
							esc_attr( 1 ),
							$product_obj->is_purchasable() && $product_obj->is_in_stock() ? 'add_to_cart_button' : '',
							esc_attr( $product_obj->product_type ),
							esc_html( 'Add to cart')
						),
					$product_obj ).'</div>';
				}
				else
				{
					$output .= '<div class="table-col col-button"></div>';
				}
						
			
	
			$output .= '</li>';
	
			endwhile;
			
			$output .= '</ul>';
		   
		}
		else
		{
						
			
			$spacex_columns = ot_get_option('tt_product_column');
			$col = 'product-grid-' . $spacex_columns;
			
			if($carousel == "yes")
			{
				$output .= '<ul data-col="'.esc_attr($spacex_columns).'" class="slides products '.esc_attr($col).'">';
			}
			else
			{
				$output .= '<ul data-col="'.esc_attr($spacex_columns).'" class="products '.esc_attr($col).' '.esc_attr($el_class).'">';				
			}
			
			while ( $courses->have_posts() ) : $courses->the_post(); 		
				$output .= get_course_content_file_grid();
				$i++;
			endwhile; // end of the loop.
			wp_reset_postdata();
			
			$output .= '</ul>';
					
			$output .= ' 
						<script>
			
			</script>';
			
		}	
    $output .= '</aside>';    
	endif;

	
		
	return $output;	
}
