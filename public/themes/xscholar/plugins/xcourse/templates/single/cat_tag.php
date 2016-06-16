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

$cat_count = sizeof( get_the_terms( $post->ID, 'course_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'course_tag' ) );
?>
<div class="sc-entry-cat">


	<?php  echo get_xcourse_categories($post->ID, ', ', '<span class="posted_in">' . _n( 'Category', 'Categories:', $cat_count, 'spacex' ) . ' ', '</span>' ); ?>

	<?php echo get_xcourse_tags($post->ID, ', ', '<span class="tag-links">' . _n( 'Tag', 'Tags:', $tag_count, 'spacex' ) . ' ', '</span>' ); ?>



</div>