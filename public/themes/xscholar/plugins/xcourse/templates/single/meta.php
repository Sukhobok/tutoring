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
		
	
	$courses = get_post_meta($post->ID,'course-meta',true);
                
	if(is_array($courses))
	{
	echo '<aside>';
	echo '<ul class="course-meta list-style">';
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
		echo '<li class="clearfix"><b class="label">'.$icon.$course['title'].'</b><span>'.$before_title.$course['course-description'].$after_title.'</span></li>';		
	}
	echo '</ul>';
	echo '</aside>';

	}