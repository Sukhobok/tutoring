<?php
/**
 * Loop Course Action Button
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;	

$product_id = get_post_meta($post->ID,'course_selling',true);
$product_obj = wc_get_product( $product_id );


	echo '<div class="course-loop-action">';
	
		if($product_id != '' && $product_obj->exists())
		{
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
					esc_url( $product_obj->add_to_cart_url() ),
					esc_attr( $product_obj->id ),
					esc_attr( $product_obj->get_sku() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					$product_obj->is_purchasable() && $product_obj->is_in_stock() ? 'add_to_cart_button' : '',
					esc_attr( $product_obj->product_type ),
					esc_html( $product_obj->add_to_cart_text() )
				),
			$product_obj );
		}
		
		echo '<a class="course-loop-btn-detail" href="'.get_permalink().'">'.__('View Detail', 'spacex').'</a>';
	
	echo '</div>';
