<?php

			
		 global $post, $woocommerce, $product;	
		
		$product_id = get_post_meta($post->ID,'event_selling',true);
		$product_obj = wc_get_product( $product_id );

		if( $product_obj !== false && $product_obj->exists() )
		{
			echo '<aside class="entry-selling">';
			//echo '<h3 class="selling-event-title">BUY THE TICKET</h3>';
			echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
			?>
            
              <div class="event-loop-student">
	
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
	 		if ( ! $product_obj->is_sold_individually() )
				woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product_obj ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max',  $product_obj->backorders_allowed() ? '' : $product_obj->get_stock_quantity(), $product_obj )
	 			) );
	 	echo '<input type="hidden" name="add-to-cart" value="'. esc_attr( $product_obj->id ).'" />';
		
		
	 	echo '<button type="submit" class="single_add_to_cart_button button alt">'.__('BUY THE TICKET', 'spacex').'</button>';
		
		

	echo '</form>';
	
	do_action( 'woocommerce_after_add_to_cart_form' );

 endif;

echo '</aside>';
		}