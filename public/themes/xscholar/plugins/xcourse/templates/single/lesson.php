<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$lessons = get_post_meta($post->ID,'course-lesson',true);
$tab = '';
$desc = '';
$isActive = true;
$activeClass = '';
if(is_array($lessons))
{
	$toggle = $content ='';
	
	echo '<div class="sc-entry-lesson">';
	echo '<h2 class="course-heading"><span>Course\'s Lessons</span></h2>';
	foreach($lessons as $lesson)
	{
		$title = $lesson['title'];
		
		echo '<a class="lesson-toggler collapsed" data-toggle="collapse" href="#'.sanitize_title_with_dashes($title).'" aria-controls="'.sanitize_title_with_dashes($title).'"  aria-expanded="false"><i class="fa fa-file-text-o"></i>'.$title.'</a>';
		echo '<div class="collapse" id="'.sanitize_title_with_dashes($title).'"><div class="lesson-content">'.esc_html($lesson['course-description']).'</div></div>';
		
	}
	
	echo $toggle;
	echo $content;
	
	echo '</div><!-- End Entry Lesson -->';
}
?>
