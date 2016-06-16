<?php

			
		 global $post, $woocommerce;	
		
		$product_id = get_post_meta($post->ID,'course_selling',true);
		$product_obj = wc_get_product( $product_id );

		if( $product_obj !== false && $product_obj->exists() )
		{
			echo '<aside class="entry-selling">';
			//echo '<h3 class="selling-course-title">BUY THE TICKET</h3>';
			echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
			?>
            
              <div class="course-loop-student">
	
				<?php
                $units_sold = get_post_meta( $product_obj->id, 'total_sales', true );
                    
                if($units_sold != '' && $units_sold>=0)
                {?>
                <b><?php echo __('Student', 'spacex')?></b>
                <i class="fa fa-users"></i>
                <?php
                    echo $units_sold;
                }
                ?>
            </div>
            
            <?php
			echo 	'<p class="price">';
				
				 if( $product_obj->price != '0' ) {
					if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
						{ echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), '', '' ); }
					else
						{ echo apply_filters( 'woocommerce_cart_item_price_html', '<i class="fa fa-tag"></i> ' . woocommerce_price( $product_obj->get_price() ), $values, '' ); }
				} else {
					echo apply_filters( 'spacex_free_text', __( 'Free!', 'spacex' ) );
				}
				
				echo'</p>';

				echo '<meta itemprop="price" content="'.$product_obj->get_price().'" />
				<meta itemprop="priceCurrency" content="'.get_woocommerce_currency().'" />
		
			</div>';
			
			
			if ( ! $product_obj->is_purchasable() ) return;

	// Availability
	$availability      = $product_obj->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( 		$availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product_obj );

 if ( $product_obj->is_in_stock() ) : 
	echo '<form class="cart" method="post" enctype="multipart/form-data">';
	 		//if ( ! $product_obj->is_sold_individually() )
//				woocommerce_quantity_input( array(
//	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product_obj ),
//	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', 1, $product_obj )
//	 			) );
	 	echo '<input type="hidden" name="add-to-cart" value="'. esc_attr( $product_obj->id ).'" />';
	
	
$checkout_url = $woocommerce->cart->get_checkout_url();		
if(!is_product_in_cart($product_obj->id))
{

echo '<a class="single_add_to_cart_button button alt" href="'.$checkout_url.'">'.__('ENROLL THIS COURSE', 'spacex').'</a>';
echo '<p class="checkout-msg">';

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="%s product_type_%s">%s</a>',
		esc_url( $product_obj->add_to_cart_url() ),
		esc_attr( $product_obj->id ),
		esc_attr( $product_obj->get_sku() ),
		esc_attr( 1 ),
		$product_obj->is_purchasable() && $product_obj->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product_obj->product_type ),
		esc_html( 'Add this course to cart')
	),
$product_obj );

echo '</p>';


}
else
{
	echo '<a class="single_add_to_cart_button button alt" href="'.$checkout_url.'">'.__('GO TO CHECKOUT', 'spacex').'</a>';
	echo '<p class="checkout-msg">You need to checkout the payment to enroll this course.</p>';
}

		
		

	echo '</form>';

	do_action( 'woocommerce_after_add_to_cart_form' );

 endif;

echo '</aside>';

}