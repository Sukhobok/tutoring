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

$size = 'course_catalog';

$thumbnail = get_the_post_thumbnail( $post->ID, $size );


?>
<div class="course-loop-thumbnail">
	<?php do_action( 'xcourse_inside_course_thumbnail' );?>
	<?php echo '<a href="'.get_permalink().'">'.$thumbnail . '</a>';?>
</div>
