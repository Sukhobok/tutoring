<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode From Blog Post
/* ---------------------------------------------------------------------- */
add_shortcode('fromblogpost', 'spacex_shortcode_fromblogpost');

function spacex_shortcode_fromblogpost( $atts, $content = null ) { 
global $post;
	$output = $el_class = ''; 
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'title'			=> '',
		'perpage'			=> '',
		'offset'			=> '',
		'layout'			=> '',				
		'column'			=> '',
		'excerpt'			=> '',
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
		'posts_per_page'     => $perpage,
		'offset'          => $offset,
		'cat'        =>  '',
		'orderby'         => $orderby,
		'order'           => $order,
		'include'         => '',
		'exclude'         => '',
		'meta_key'        => '',
		'meta_value'      => '',
		'post_type'       => 'post',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'post_status'     => 'publish',
		'ignore_sticky_posts' => 1
	);
	
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
		default:			
		$vc_row = '3';	
	}
	$vc_row = '3';
	
	global $post;
		
	$blog = new WP_Query( $query_args );
	
	if ( $blog->have_posts() ) :
	
		$output .= '<div class="sc-from-the-blog wpb_row vc_row-fluid '.$el_class.'">';
		
		if (isset($title) && $title != '')
		{
			$output .= '<h3 class="block-heading"><span>'.$title.'</span></h3>';
		}	
		
		$i = 0;		
		
		if($layout == 'list')	
		{
			$output .='<ul class="list-style blog">';			
		}
		while ( $blog->have_posts() ) : $blog->the_post(); 
			
			$i++;
			$cats = array();
			$categories = '';
			$post_categories = wp_get_post_categories( $post->ID );	
			foreach($post_categories as $c){
				$cat = get_category( $c );
				$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'cat_id' => $cat->term_id );
			}
			$categories .= '<span class="post_categories">';
			foreach($cats as $post_category)
			{
				$categories .= '<a href="'.get_category_link($post_category['cat_id']).'">'.$post_category['name'].'</a>' . ' ';
			}			
			$categories .= '</span>';
			
			if($layout == 'list')	
			{
				$output .= '<li class="clearfix">';
				
					//$output .= '<a href="" class="sc-from-the-blog-thumbnail">'.get_the_post_thumbnail($post->ID, 'fromtheblog' ).'</a>';
					$output .='<div class="sc-from-the-blog">';
					$output .= $categories;
					$output .= '<h3><a href="'.get_permalink($post->ID).'" class="sc-from-the-blog-title">'.get_the_title($post->ID).'</a></h3>';
					$output .= '<div class="entry-meta">'.spacex_post_meta().'</div>';
					$output .= '</div>';
				
				$output .= '</li>';
				
			}
			else
			{
				if($i == 3 )	
				{
					$vc_row = (int) $vc_row * 2;
					
					$output .= '<div class="vc_col-sm-'.$vc_row.' wpb_column vc_column_container">';
					$output .= '<div class="sc-from-the-blog-item double">';
					$thumbnail = get_the_post_thumbnail($post->ID, array( 525, 365) );
				}
				else
				{
					
					
					$output .= '<div class="vc_col-sm-'.$vc_row.' wpb_column vc_column_container">';
					$output .= '<div class="sc-from-the-blog-item">';
					$thumbnail = '<a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, array( 470, 400)).'</a>';
				}
				
				
				 if ( has_post_thumbnail()):
				 
				$output .= '<div class="sc-from-the-blog-thumbnail">';
				
					$output .= $thumbnail;
					$output .=	$categories;
				
				$output .= '</div>';
						
				endif;	
				
				
				$output .= '<div class="sc-from-the-blog-excerpt">';
				
			
					$output .= '<h3><a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a></h3>';
		
					$output .= '<div>'.get_excerpt_max_charlength(95).'</div>';
				
				
				if($i == 3 )	
				{
					$output .= '<a href="'.get_permalink().'" class="readmore">'.__('Read More', 'spacex').'</a>';
				}
				$output .= '</div>';
				
				
				
				$output .= '</div>';
				
				$output .= '</div>';
			}
			
		endwhile;
		
		if($layout == 'list')	
		{
			$output .='</ul>';
		}
		$output .= '</div>';	
		
		wp_reset_postdata();
		
	endif;
		
	return $output;	
}
