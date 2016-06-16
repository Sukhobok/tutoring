<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

register_sidebar( array(
			'name' => __( 'Event Sidebar', 'spacex' ),
			'id' => 'event_sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
include_once('widget/Events_Widget.php' );
include_once('widget/Speakers_Widget.php' );