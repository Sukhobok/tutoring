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
		
	
	$xevents = get_post_meta($post->ID,'event-meta',true);
                
	if(is_array($xevents))
	{
	echo '<ul class="event-loop-meta">';
	foreach($xevents as $event)
	{
		$before_title = '';
		$after_title = '</a>';
		if(!empty($event['event-link']))
		{
			$before_title = '<a href="'.$event['event-link'].'">';
		}
		else
		{
			$after_title ='';
		}
		$icon = '';
		if($event['event-icon'] != '')
		{
			$icon = '<i class="fa '.$event['event-icon'].'"></i>';
		}
		echo '<li>'.$before_title.$icon.$event['event-description'].$after_title.'</li>';		
	}
	echo '</ul>';

	}