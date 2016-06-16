<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Team Members
/* ---------------------------------------------------------------------- */
add_shortcode('team', 'spacex_shortcode_team');

function spacex_shortcode_team( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'perpage'			=> '',
		'column'			=> '',
	), $atts));
	
	$query_args = array(
			'posts_per_page' 	=> $perpage,
			'post_status' 	=> 'publish',
			'post_type' 	=> 'team',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		);
		
	$team = new WP_Query( $query_args );
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	global $post;
		
		if ( $team->have_posts() ) :
			
			$class = '';
			
			$class .= 'vctt-column'.$column;
			
			
			$output .= '<div class="vctt-team column'.$column.' clearfix '.$class.' wpb_row vc_row-fluid">';
			
			 while ( $team->have_posts() ) : $team->the_post(); 	
			
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
			
			
			$pos = get_post_meta($post->ID, 'spacex_team_position', true);
			$desc = get_post_meta($post->ID, 'spacex_team_description', true);
			$facebook = get_post_meta($post->ID, 'spacex_team_facebook_url', true);
			$twitter = get_post_meta($post->ID, 'spacex_team_twitter_url', true);
			$skype = get_post_meta($post->ID, 'spacex_team_skype_username', true);
			
			$output .= '<div class="vctt-team-member vc_span'.$vc_row.' wpb_column column_container ">
							<p class="team-avatar">'.get_the_post_thumbnail(get_the_id(), 'client').'</p>
							<p class="team-name">'.get_the_title().'</p>
							<p class="team-position">- '.$pos.' -</p>
							<p class="team-desc">'.$desc.'</p>';
							
							$output .= '<p>';
							if(!(empty($facebook)))
							{
								$output .= '<a href="'.$facebook.'" class="team-icon"><i class="fa fa-facebook"></i></a>';
							}
							if(!(empty($twitter)))
							{
								$output .= '<a href="'.$twitter.'" class="team-icon"><i class="fa fa-twitter"></i></a>';
							}
							if(!(empty($skype)))
							{
								$output .= '<a href="'.$skype.'" class="team-icon"><i class="fa fa-skype"></i></a>';
							}	
							$output .= '</p>';
							
			$output .=			'</div>';
				
			 endwhile;
			 
			 $output .= '</div>';
			 
		endif;	 
	
	
	wp_reset_postdata();
		
	return $output;	
}
