<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
			
		 global $post;	
		 
	     $speakers_id =  get_post_meta($post->ID,'event-speaker',true);
					
		 $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_checkbox_query', array( 'post_type' => 'speaker', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any', 'include' => $speakers_id ), $speakers_id ) );
?>

<?php
        /* has posts */
        if ( $speakers_id !=='' && is_array( $my_posts ) && ! empty( $my_posts ) ) {
		
		  echo '<aside class="sc-entry-speaker clearfix">';
			  echo '<h3 class="widget-title">'.__('Speakers', 'spacex').'</h3>';	
			  echo '<ul class="speakers clearfix">';	
			  foreach( $my_posts as $my_post ) {
				$post_title = '' != $my_post->post_title ? $my_post->post_title : 'Untitled';
				echo '<li>';
				if( has_post_thumbnail() ){
					echo get_the_post_thumbnail($my_post->ID, array(90, 90));
				}
				
				$level = get_post_meta($my_post->ID,'speaker-level',true);
				
				$level = '<em>'.$level.'</em>';
				
				
				echo '<h3 class="speaker-name"><a href="'.get_the_permalink($my_post->ID).'">' . $post_title . '</a>';
				$job_title = get_post_meta($my_post->ID,'speaker-job-title',true);
				if(!empty($job_title))
				{
					echo '<p>'.$job_title.'</p>';
				}
				
				echo '</h3>';
				echo $level;
				echo '</li>';           
			  }
			   echo '</ul>';
		   echo '</aside>';

        }
?>
		