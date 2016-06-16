<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Recent Projects
/* ---------------------------------------------------------------------- */
add_shortcode('xgallery', 'spacex_shortcode_gallery');

function spacex_shortcode_gallery( $atts, $content = null ) { 
	global $post;
	$output = $el_class = '';
	
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'column'			=> '',
		'perpage'			=> '',
		'carousel'			=> '',
		'layout'			=> '',
		'offset'			=> '',
		'orderby'			=> '',
		'order'			=> '',
		'css_animation'			=> '',
	), $atts));
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	if(empty($offset))
	{
		$offset = 0;
	}
	$query_args = array(
		'numberposts'     => '',
		'offset'          => $offset,
		'posts_per_page'     => $perpage,
		'meta_query' => array(array('key' => '_thumbnail_id')),
		'orderby'         => $orderby,
		'order'           => $order,
		'post_type'       => 'xgallery',
		'post_status'     => 'publish'
	);


	global $post;
		
	$benefit = new WP_Query( $query_args );
	
	if ( $benefit->have_posts() ) :
		
		if($carousel == 'yes')
		{
		$output .= '<script>
		
				(function ( $ ) { 
		
				 // store the slider in a local variable
				  var flexslider_gallery;
				 
				  // tiny helper function to add breakpoints
				  function getGalGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : '.esc_attr($column).';
				  }
				 
				jQuery( document ).ready(function() {
					
					jQuery(".sc-gallery").flexslider({
						animation: "slide",            
						easing: "swing",               
						controlNav: false,
						directionNav: true,
						itemWidth: 210,
						itemMargin: 0,
						minItems: getGalGridSize(), // use function to pull in initial value
						maxItems: getGalGridSize(), // use function to pull in initial value			 
						smoothHeight: true,
						prevText: "<i class=\'fa fa-angle-left\'></i>",
						nextText: "<i class=\'fa fa-angle-right\'></i>",
						start: function (slider) {
							flexslider_gallery = slider; //Initializing flexslider here.
						}
					});
				});
				// check grid size on resize event
			  jQuery(window).resize(function() {
				var gridSize = getGalGridSize();
			 
				flexslider_gallery.vars.minItems = gridSize;
				flexslider_gallery.vars.maxItems = gridSize;
			  });
			  
			  
			})(jQuery); </script>';
		}
		
		$output .= '<div class="sc-gallery sc-flexslider wpb_row vc_row-fluid clearfix sc-'.esc_attr($layout).' '.$el_class.'">';
		
		
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
				case 12:
					$vc_row = '1';		
					break;			
			}
				
		while ( $benefit->have_posts() ) : $benefit->the_post(); 
			
		
				switch($layout)
				{
			
					case 'wall':
						
						$terms = get_the_terms( $post->ID, 'xgallery-categories' );
												
						if ( $terms && ! is_wp_error( $terms ) ) : 
						
							$draught_links = array();
						
							foreach ( $terms as $term ) {
								$draught_links[] = $term->name;
							}
												
							$gallery_cats = join( ", ", $draught_links );
						endif;
						
						$output .= '<li  class="sc-column vc_col-sm-'.esc_attr($vc_row).' wpb_column vc_column_container">';
						$output .= '<div  class="sc-item">';	
							$output .=	get_the_post_thumbnail($post->ID, array(500,400));
							$output .= '<a  class="sc-meta" href="'.get_permalink().'">';	
								$output .= '<div class="sc-table">';
										$output .= '<div class="sc-cell">';
									
								if(isset($gallery_cats))
								{
									$output .= '<span class="sc-categories">'.$gallery_cats.'</span>';
								}
								$output .= '<h3 class="sc-title">'.get_the_title().'</h3>';
								$output .= '<div class="sc-excerpt">'.get_excerpt_max_charlength(90).'</div>';
									$output .= '</div>';
								$output .= '</div>';	
							$output .= '</a>';
							
						$output .= '</div>';
						$output .= '</li>';
						

						break;
						
					case 'columns':
						$output .= '<li  class="vctt-benefit-item vc_col-sm-'.esc_attr($vc_row).' wpb_column vc_column_container benefit-'.esc_attr($type).'">';
						$output .= '<i class="vtcc-benefit-icon fa '.esc_attr($icon).' '.esc_attr($icon_size).'"></i>';
						$output .= '<div class="vtcc-benefit-wrapper">';
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						$output .= '<div  class="vctt-benefit-excerpt">'.get_the_excerpt().'</div>';
						if(!empty($link))
						{
							$output .= '<a href="'.esc_url($link).'" class="vc_read_more" target="_blank">'.__('Readmore', 'spacex').'</a>';
						}
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
