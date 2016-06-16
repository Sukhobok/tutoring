<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode MiniCart
/* ---------------------------------------------------------------------- */
add_shortcode('minicart', 'spacex_shortcode_minicart');

function spacex_shortcode_minicart( $atts, $content = null ) { 

	$output = $el_class = '';
	
	extract(shortcode_atts(array(), $atts));
	
	global $woocommerce;

	if (class_exists('Woocommerce')) {
		
  	$cart_type = ot_get_option('tt_header_cart_type');
					 

            $output .= '<div id="mini-cart-header">';
                
            $output .= '<div class="header-cart-inside '.$cart_type.'">';
			
            $output .= '<div class="cart-list">';
            $output .= '<div class="cart-list-inner">';
                       
  			if ($woocommerce->cart->cart_contents_count == 0) {
				$output .= '<p class="cart-empty">'.__('No products in the cart.','woocommerce').'</p>';
			 } else {
				$output .= '<div class="cart-loading"></div>';
			} 
            $output .= '</div></div>';    
                            
   
	
		$output .=  '<a class="cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'woothemes').'">';
		
		$cart_icon = ot_get_option('tt_header_cart_icon');
		if(!empty($cart_icon))
		{
			$output .=  '<img src="'.$cart_icon.'" alt="" class="mini-cart-icon" />';				
		}
		else
		{
				$output .=  '<i class="mini-cart-icon fa fa-shopping-cart"></i>';				
		}
		
		$output .=   '<span class="mini-cart-count">' . $woocommerce->cart->cart_contents_count . '</span>' . '<i class="mini-cart-text">'.__(' items', 'spacex').'</i>';
    
		$output .= '</a>';
		
		$output .= '</div></div>';
                    

 }

return $output;
	
}
