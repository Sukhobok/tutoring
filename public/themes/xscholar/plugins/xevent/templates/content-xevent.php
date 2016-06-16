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

global $post, $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4);


// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
// Default - $classes = array();
// For ajax load product
$classes = array('product', 'event');

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>


<li <?php post_class( $classes ); ?>>
<div class="event-wrapper">
	<?php do_action( 'xevent_before_shop_loop_item' ); ?>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked xevent_show_product_loop_sale_flash - 10
			 * @hooked xevent_template_loop_product_thumbnail - 10
			 */
			do_action( 'xevent_before_shop_loop_item_title' );

		?>

		<h3 class="event-loop-title"><a href="<?php echo get_permalink($post->ID)?>" title="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID); ?></a></h3>
		<div class="course-loop-meta clearfix">
		<?php
			/**
			 * xevent_after_shop_loop_item_title hook
			 *
			 * @hooked xevent_template_loop_rating - 5
			 * @hooked xevent_template_loop_price - 10
			 */
			do_action( 'xevent_after_shop_loop_item_title' );
		?>
		</div>

	<?php  do_action( 'xevent_after_shop_loop_item' ); ?>
</div>
</li>