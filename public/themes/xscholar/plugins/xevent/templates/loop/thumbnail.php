<?php
/**
 * Loop Thumbnaul
 *
 *
 * @author 		spacex
 * @package 	spacex/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$size = 'event_catalog';

$thumbnail = get_the_post_thumbnail( $post->ID, $size );


?>
<div class="event-loop-thumbnail">
	<?php do_action( 'xevent_inside_event_thumbnail' );?>
	<?php echo '<a href="'.get_permalink().'">'.$thumbnail . '</a>';?>
</div>