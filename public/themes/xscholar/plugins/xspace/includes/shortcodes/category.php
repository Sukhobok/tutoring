<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Product Category
/* ---------------------------------------------------------------------- */
add_shortcode('productcategory', 'spacex_shortcode_productcategory');

function spacex_shortcode_productcategory( $atts, $content = null ) { 

	 extract(shortcode_atts(array(
                'category' => '',
				'layout' => '',
				'align' => '',
				'class' => '',
				'css_animation'			=> '',
	), $atts));
	
   
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$args = array(
		'orderby'       => 'date', 
		'order'         => 'desc',
		'hide_empty'    => true, 
		'exclude'       => array(), 
		'exclude_tree'  => array(), 
		'include'       => array(),
		'number'        => '', 
		'fields'        => 'all', 
		'slug'          => '', 
		'parent'         => '',
		'hierarchical'  => true, 
		'child_of'      => 0, 
		'get'           => '', 
		'name__like'    => '',
		'pad_counts'    => false, 
		'offset'        => '', 
		'search'        => '', 
		'cache_domain'  => 'core'
	); 
	$output = '';
    $terms = get_terms( 'product_cat', $args );

    $count = count($terms); 

    if ($count > 0) {
	
		foreach ($terms as $term) {
			
			if($term->slug == $category)
			{
				$output .= '<div class="vctt-single-category '.$align.' '.$class.' '.$el_class.'">';
				$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if ( $image ) {
				
					$term = sanitize_term( $term, 'product_cat' );
	
					$term_link = get_term_link( $term, 'product_cat' );
					
					
						$output .= '<a class="vctt-category-thumb" href="'.$term_link.'">';
						$count_product = __('products', 'themetan');
						if($term->count == 0 || $term->count == 1)
						{
							$count_product = __('product', 'themetan');
						}
						$output .= '<figure class="effect-ming">
						<img src="' . $image . '" alt="" />';
						
						if($layout !== 'thumb')
						{
							$output .= '<figcaption><div class="div_table">
								<div class="div_cell">
								<div class="term-name">'.$term->name.'</div>
								<p class="term-desc">'.$term->description.'</p></div></div>
							</figcaption>';	
						}	
								
					$output .= '</figure>
					</a>';
					
					
				}	
				$output .= '</div>';
			}
		}
    
	}
	
	return $output;

}

