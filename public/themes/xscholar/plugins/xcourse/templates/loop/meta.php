<?php
/**
 * Loop Course Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post;
		
	
	$courses = get_post_meta($post->ID,'course-meta',true);
                
	if(is_array($courses))
	{
	echo '<ul class="course-loop-meta">';
	foreach($courses as $course)
	{
		$before_title = '';
		$after_title = '</a>';
		if(!empty($course['course-link']))
		{
			$before_title = '<a href="'.$course['course-link'].'">';
		}
		else
		{
			$after_title ='';
		}
		$icon = '';
		if($course['course-icon'] != '')
		{
			$icon = '<i class="fa '.$course['course-icon'].'"></i>';
		}
		echo '<li>'.$before_title.$icon.$course['course-description'].$after_title.'</li>';		
	}
	echo '</ul>';

	}