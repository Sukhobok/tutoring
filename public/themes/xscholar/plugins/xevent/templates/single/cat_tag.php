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

$cat_count = sizeof( get_the_terms( $post->ID, 'event_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'event_tag' ) );
?>
<div class="sc-entry-cat">


	<?php // echo get_xevent_categories($post->ID, ', ', '<span class="posted_in">' . _n( '', 'Categories:', $cat_count, 'spacex' ) . ' ', '</span>' ); ?>

	<?php echo get_xevent_tags($post->ID, ', ', '<span class="tag-links">' . _n( '', 'Tags:', $tag_count, 'spacex' ) . ' ', '</span>' ); ?>



</div>