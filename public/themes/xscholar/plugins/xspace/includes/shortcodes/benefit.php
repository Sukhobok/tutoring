<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Benefit
/* ---------------------------------------------------------------------- */
add_shortcode('benefit', 'spacex_shortcode_benefit');

function spacex_shortcode_benefit( $atts, $content = null ) { 
global $post;
	$output = $el_class = '';
	extract(shortcode_atts(array(
		'el_class'			=> '',
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
		'post_type'       => 'benefit',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'post_status'     => 'publish'
	);

	global $post;
		
	$benefit = new WP_Query( $query_args );
	
	if ( $benefit->have_posts() ) :
	
		$output .= '<div class="vtcc-benefit wpb_row vc_row  vc_row-fluid clearfix '.$layout.' benefit-'.$type.' '.$el_class.'">';
		
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
				
		while ( $benefit->have_posts() ) : $benefit->the_post(); 
		
			$link = get_post_meta($post->ID, 'spacex_benefit_link', true);
			$icon = get_post_meta($post->ID, 'spacex_benefit_icon', true);
			$custom_icon = get_post_meta($post->ID, 'spacex_benefit_custom_icon', true);
			$icon_size = get_post_meta($post->ID, 'spacex_benefit_custom_icon_size', true);
			$has_custom_icon = '';
			
				switch($type)
				{
			
					case 1:
						$output .= '<div  class="vctt-benefit-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container benefit-'.$type.'">';
						if(empty($custom_icon))
						{
							$output .= '<i class="vtcc-benefit-icon fa '.$icon.' '.$icon_size.'"></i>';
						}
						else
						{
							$output .= '<img src="'.$custom_icon.'" alt="" class="'.$icon_size.' vtcc-benefit-icon">';
							$has_custom_icon = 'has-custom-icon';
						}
						$output .= '<div class="vtcc-benefit-wrapper '.$has_custom_icon.'">';
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						$output .= '<div  class="vctt-benefit-excerpt">'.get_excerpt_max_charlength(110).'</div>';
						if(!empty($link))
						{
							$output .= '<a href="'.$link.'" class="vc_read_more" target="_blank">'.__('Readmore', 'spacex').'</a>';
						}
						$output .= '</div>';
						

						break;
					case 2:
						$output .= '<div  class="vctt-benefit-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container benefit-'.$type.'">';
						if(empty($custom_icon))
						{
							$output .= '<i class="vtcc-benefit-icon fa '.$icon.' '.$icon_size.'"></i>';
						}
						else
						{
							$output .= '<img src="'.$custom_icon.'" alt="" class="'.$icon_size.' vtcc-benefit-icon">';
							$has_custom_icon = 'has-custom-icon';
						}
						$output .= '<div class="vtcc-benefit-wrapper '.$has_custom_icon.'">';
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						if($column == 4)
						{
							$output .= '<div  class="vctt-benefit-excerpt">'.get_excerpt_max_charlength(120).'</div>';
						}
						else
						{
							$output .= '<div  class="vctt-benefit-excerpt">'.get_excerpt_max_charlength(140).'</div>';							
						}
						if(!empty($link))
						{
							$output .= '<a href="'.$link.'" class="vc_read_more" target="_blank">'.__('Readmore', 'spacex').'</a>';
						}
						$output .= '</div>';
						

						break;
					case 3:
						$output .= '<div  class="vctt-benefit-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container benefit-'.$type.'">';
						
						$output .= '<div class="vtcc-benefit-wrapper '.$has_custom_icon.'">';
						if(empty($custom_icon))
						{
							$output .= '<i class="vtcc-benefit-icon fa '.$icon.' '.$icon_size.'"></i>';
						}
						else
						{
							$output .= '<img src="'.$custom_icon.'" alt="" class="'.$icon_size.' vtcc-benefit-icon">';
						}
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						$output .= '<div  class="vctt-benefit-excerpt">'.get_the_excerpt().'</div>';
						if(!empty($link))
						{
							$output .= '<a href="'.$link.'" class="vc_read_more" target="_blank">'.__('Readmore', 'spacex').'</a>';
						}
						$output .= '</div>';
						

						break;
					case 4:
						
						$output .= '<div  class="vctt-benefit-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container">';
						$output .= '<div  class="vctt-benefit-thumb">'.get_the_post_thumbnail(get_the_id(), 'benefit').'</div>';
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						$output .= '<div  class="vctt-benefit-excerpt">'.get_the_excerpt().'</div>';
						if(!empty($link))
						{

							$output .= do_shortcode('[spacexbutton type="background" color="green" align="left" size="small" text="'.__('Detail', 'spacex').'" link="'.$link.'"]');
						}
						break;						
						
					case 5:
						$output .= '<div  class="vctt-benefit-item vc_col-sm-'.$vc_row.' wpb_column vc_column_container benefit-'.$type.'">';
						$output .= '<div class="vtcc-benefit-wrapper '.$has_custom_icon.'">';
						if(empty($custom_icon))
						{
							$output .= '<i class="vtcc-benefit-icon fa '.$icon.' '.$icon_size.'"></i>';
						}
						else
						{
							$output .= '<img src="'.$custom_icon.'" alt="" class="'.$icon_size.' vtcc-benefit-icon">';
						}
						$output .= '<h3  class="vctt-benefit-title">'.get_the_title().'</h3>';
						$output .= '<div  class="vctt-benefit-excerpt">'.get_the_excerpt().'</div>';
						if(!empty($link))
						{
							$output .= '<a href="'.$link.'" class="vc_read_more" target="_blank">'.__('Readmore', 'spacex').'</a>';
						}
						$output .= '</div>';
				}
		
			
			
			$output .= '</div>';	
			
		endwhile;
		wp_reset_postdata();
		$output .= '</div>';	
		
	endif;
		
	return $output;	
}
