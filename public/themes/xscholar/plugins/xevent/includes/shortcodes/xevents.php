<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Course
/* ---------------------------------------------------------------------- */
add_shortcode('xevents', 'spacex_shortcode_xevents');

function spacex_shortcode_xevents( $atts, $content = null ) { 
	
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
        $tax = 'event_cat';
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
        'meta_query' 	=> $meta_query,
		'post_type'	=> 'xevent',
		'meta_key'			=> 'event_date',
		'orderby'			=> 'meta_value',
		'order' => 'ASC',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
    );


	$xevents = new WP_Query( $query_args );

    ob_start();
	
    
    $i = 0;
	$spacex_columns = ot_get_option('tt_product_column');
	if(empty($spacex_columns))
	{
		$spacex_columns = 4;
	}
	if ( $xevents->have_posts() ) :
		
		
		if($carousel == 'yes' && $layout=='grid')
		{

		$output .= '<script>
		
				jQuery(document).ready(function() { 
		
				 // store the slider in a local variable
				  var flexslider_event;
				 
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
						return '.esc_attr($spacex_columns).';						  
					  }
				  }
				
				
				jQuery( document ).ready(function() {
						
					jQuery(".sc-xevents-grid.yes").flexslider({
						animation: "slide",            
						easing: "swing",               
						controlNav: true,
						directionNav: true,
						itemWidth: 210,
						itemMargin: 30,
						minItems: getGridSize(), // use function to pull in initial value
						maxItems: getGridSize(), // use function to pull in initial value			 
						smoothHeight: true,
						prevText: "<i class=\'fa fa-angle-left\'></i>",
						nextText: "<i class=\'fa fa-angle-right\'></i>",
						start: function (slider) {
							flexslider_event = slider; //Initializing flexslider here.
						},
	
					});
				});
				// check grid size on resize event
			  jQuery(window).resize(function() {
				  
				var gridSize = getGridSize();
				flexslider_event.vars.minItems = gridSize;
				flexslider_event.vars.maxItems = gridSize;
				
			  });
			  
			  
			}); </script>';
		}
		
		if (isset($title) && $title != '')
		{
			$output .= '<h3 class="block-heading in-list type-2 align-left"><span>'.$title.'</span></h3>';
		}
		
		if($carousel == 'yes' && $layout=='grid')
		{
			
			$output .= '<aside class="woocommerce clearfix sc-xevents-grid yes sc-flexslider">';
		}
		else
		{
			$output .= '<aside class="woocommerce clearfix sc-xevents-grid sc-flexslider">';
		}
		
		if($filter == 'yes')
		{
			$output .= spacex_build_dropdown_event_categories();
		}
		
		if($layout == 'list' )
		{	
			 $output .= '<ul class="product_list_widget event-list">';
			 while ( $xevents->have_posts() ) : $xevents->the_post(); 
			 	
			 $date_time = get_post_meta(get_the_id(), 'event_date', true);
			 
			 $year = substr($date_time,0,4);	
			 $month = substr($date_time,5,2);	
			 $date = substr($date_time,8,2);	
			 $time = substr($date_time,11,5);				 
			 $event_month = $month;	
			 
				switch($month)
				{
					case '01':
					$event_month = __('Jan', 'spacex');
					break;
					case '02':
					$event_month = __('Feb', 'spacex');
					break;
					case '03':
					$event_month = __('March', 'spacex');
					break;
					case '04':
					$event_month = __('April', 'spacex');
					break;
					case '05':
					$event_month = __('May', 'spacex');
					break;
					case '06':
					$event_month = __('June', 'spacex');
					break;
					case '07':
					$event_month = __('July', 'spacex');
					break;
					case '08':
					$event_month = __('August', 'spacex');
					break;
					case '09':
					$event_month = __('Sep', 'spacex');
					break;
					case '10':
					$event_month = __('Oct', 'spacex');
					break;
					case '11':
					$event_month = __('Nov', 'spacex');
					break;
					case '12':
					$event_month = __('Dec', 'spacex');
					break;
				}
				
			 $output .= '<li class="'.esc_attr($el_class).' clearfix">';
			 
			 if($month != '' && $date != '')
			 {
				 $output .= '<div class="event-date-time">';
				 
					
					$output .= '<span class="event-date">'.$date.'</span>';
					$output .= '<span class="event-month">'.$event_month.'</span>';
					if($time != '')
					{
						$output .= '<span class="event-time">'.$time.'</span>';		
					}
						 
				 $output .= '</div>';
			 }
			 
			 $output .= '<div class="event-wrapper">';
			 $output .= '<h3><a href="'.esc_url( get_permalink($post->ID) ).'" title="'.get_the_title($post->ID).'">';
			
			$output .= get_the_title($post->ID);	
			
			$output .= '</a></h3>';
			
			$description = get_post_meta(get_the_id(), 'event-description', true);
			
				//$output .= '<div class="event-meta">';
				//$output .= xevent_get_price() . '  &nbsp;/&nbsp; <span>' . xevent_get_enroll_members().'</span>';
				
				
				//$cat_count = sizeof( get_the_terms( $post->ID, 'event_cat' ) );
				//$output .= '  &nbsp;/&nbsp; ' . get_xevent_categories($post->ID, ', ', '<span class="posted_in">' . _n( '', 'Categories:', $cat_count, 'spacex' ) . ' ', '</span>' ); 
				
				//$output .= '</div>';
			
			$output .= '<div class="event-description">'.$description.'</div>';
			

			$output .= '</div>';
	
			$output .= '</li>';
	
			endwhile;
			
			$output .= '</ul>';
		   
		}
		elseif($layout == 'table' )
		{	
			 $output .= '<ul class="table list-table">';
			 while ( $xevents->have_posts() ) : $xevents->the_post(); 	
				
				
				$product_id = get_post_meta($post->ID,'event_selling',true);
				$product_obj = wc_get_product( $product_id );
		
		
				$cat_count = sizeof( get_the_terms( $post->ID, 'event_cat' ) );
				
				$output .= '<li class="'.esc_attr($el_class).' table-row">';
				
				$output .= '<div class="table-col col-thumbnail">'.get_the_post_thumbnail($post->ID, array(80,80)).'</div>';
				
				$output .= '<div class="table-col col-title"><h3><a href="'.esc_url( get_permalink($post->ID) ).'" title="'.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a></h3></div>';
				
				$output .= '<div class="table-col col-date">';
					$date = get_post_meta($post->ID,'event-date',true);
					$output .= $date;
				$output .= '</div>';
			
				
				$output .= '<div class="table-col col-price">'.xevent_get_price().'</div>';
				
				$output .= '<div class="table-col col-meta">';
				if($product_obj)
				{
					$output .= xevent_get_enroll_members().__(' People has joined','spacex');
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
						
			
			
			$col = 'product-grid-' . $spacex_columns;
			
			if($carousel == "yes")
			{
				$output .= '<ul data-col="'.$spacex_columns.'" class="slides products '.$col.' '.$el_class.'">';
			}
			else
			{
				$output .= '<ul data-col="'.$spacex_columns.'" class="products '.$col.' '.$el_class.'">';				
			}
			
			while ( $xevents->have_posts() ) : $xevents->the_post(); 		
				$output .= get_event_content_file_grid();
				$i++;
			endwhile; // end of the loop.
			wp_reset_postdata();
			
			$output .= '</ul>';
			
		}	
    $output .= '</aside>';    
	endif;

	
		
	return $output;	
}
