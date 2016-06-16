<?php
/**
 * spacex Custom WooCommerce
 *
 * Custom Woocommerce Funtions
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */
 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* ---------------------------------------------------------------------- */
/*	Wocommerce General
/* ---------------------------------------------------------------------- */

function loop_columns() {
	
	$spacex_columns = ot_get_option('tt_product_column');
	if(empty($spacex_columns))
	{
		$spacex_columns = 4;
	}

	return $spacex_columns;
}
add_filter('loop_shop_columns', 'loop_columns', 999);
/* ---------------------------------------------------------------------- */
/*	Custom Ajax Loader Icon
/* ---------------------------------------------------------------------- */
add_filter('woocommerce_ajax_loader_url', 'spacex_custom_ajax_loader');
function spacex_custom_ajax_loader() {
	
	$icon = ot_get_option('tt_preload_icon');
	if(!empty($icon))
	{
	return $icon;
	}
}
/* ---------------------------------------------------------------------- */
/* Product Loop
/* ---------------------------------------------------------------------- */
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');

add_action( 'woocommerce_before_shop_loop_item_title', 'product_thumbnail_wrapper_start', 5);
add_action( 'woocommerce_before_shop_loop_item_title', 'product_thumbnail_flip', 15);
add_action( 'woocommerce_before_shop_loop_item_title', 'wrapper_product_meta', 25);
add_action( 'woocommerce_before_shop_loop_item_title', 'product_thumbnail_wrapper_end', 20);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_get_product_action_button', 20);
add_action( 'woocommerce_after_shop_loop_item_title', 'end_wrapper_product_meta', 25);
add_action( 'spacex_before_theme_content', 'product_catalog_sharing', 30);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_templte_loop_category', 22);
 
function wrapper_product_meta()
{
	echo '<div class="product-loop-meta">';
}
function end_wrapper_product_meta()
{
	echo '</div>';
}
 if ( ! function_exists( 'product_catalog_sharing' ) ) {
 
	function product_catalog_sharing() {
		
		global $product;

		echo '
		<div class="md-modal md-effect-1 modal-1">
			<div class="md-content">
				<h3>Sharing Product</h3>
				<div><div class="md-append"></div>';
				
		echo	'<div class="md-close">x</div>
				</div>
			</div>
		</div>';
		
		
	} 
 }		
 if ( ! function_exists( 'product_thumbnail_wrapper_start' ) ) {
 
	function product_thumbnail_wrapper_start() {
	
		
		echo '<div class="product-thumbnail-wrapper effect-zoe">';
		echo '<a href="'.get_permalink().'" >';
		
		
	} 
 }
 
 if ( ! function_exists( 'product_thumbnail_wrapper_end' ) ) {
 
	function product_thumbnail_wrapper_end() {
		
			global $product, $woocommerce;
			
			$button_cart = ot_get_option('tt_product_action_cart');		
			$button_wishlist = ot_get_option('tt_product_action_wishlist');			
			$button_compare = ot_get_option('tt_product_action_compare');				
			$button_detail = ot_get_option('tt_product_action_detail');					
			$view_compare = get_page_link(ot_get_option('tt_compare_page'));
			$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
			
			
			echo '</a>';
					
		$type = ot_get_option('tt_product_action');
		if($type=='default')		
		{
			template_product_action_button_default();
		}
		
		echo '</div>';
	
	
	} 
 }
 
 if ( ! function_exists( 'product_thumbnail_flip' ) ) {
	
	function product_thumbnail_flip( $size = 'shop_catalog' ) {
		
		global $post;
				
		$flip_image_url = get_post_meta( $post->ID, 'tt_flip_product_image', true);
		$output  = '';
		
		if(!empty($flip_image_url))
		{
			
			$attachmentId = spacex_get_attachment_id_from_url($flip_image_url);
			$flip_image = wp_get_attachment_image_src ( $attachmentId, 'shop_catalog' );					
			
			$output .= '<img class="flip-product" src="'. $flip_image[0] .'" alt="'. get_the_title() .'" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
			
		}
			
			echo $output;
	}
}
 if ( ! function_exists( 'woocommerce_get_product_action_button' ) ) {
	
	function woocommerce_get_product_action_button() {
		
		$type = ot_get_option('tt_product_action');
		switch($type)
		{
			case 'megashop':
			template_product_action_button_megashop();
			break;
			case 'diamond':
			template_product_action_button_diamond();
			break;
			case 'tech':
			template_product_action_button_tech();
			break;
			case 'block':
			template_product_action_button_block();
			break;
			
		}
	}
}
function template_product_action_button_default()
{
	global $product, $woocommerce;
	$view_compare = get_page_link(ot_get_option('tt_compare_page'));
	$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
	
	$output = '<div class="product_action_button default">
					<figure>
					
						<figcaption>';
						
			if ($product->is_in_stock() && $product->price != '' && $button_cart != 'false')
				{
					$output .=  apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a title="'.__('Add to cart', 'spacex').'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_action_button add_to_cart %s product_type_%s">'.__('Add to cart', 'spacex').'</a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type )
								
							),
						$product );
				}				
						
				$output .= '<p class="icon-links">';
				if( $button_detail != 'false')
				{	
					$output .= '<a href="javascript:void(0)" class="share_product md-trigger" data-modal="modal-1" data-product-id="'.get_the_id().'" data-link="'.get_permalink().'" data-product-type="simple" title="'.__('Share this product', 'spacex').'"><span class="fa fa-share-square-o"></span></a>';					
				}	
				if( $button_compare != 'false')
				{	
					$output .= '<a href="#" class="compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'"><span class="fa fa-files-o"></span></a>';					
					$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'"><span class="fa fa-files-o"></span></a>';
				}	
				if( $button_wishlist != 'false')
				{	
					$output .= '<a href="#" class="add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to wishlist', 'spacex').'"><span class="fa fa-heart-o"></span></a>';					
					$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View wishlist', 'spacex').'"><span class="fa fa-heart-o"></span></a>';
				}				
				$output .='</p>
						</figcaption>			
					</figure>
					</div>
				';
				
	echo $output;			
}
//Type Complex
function template_product_action_button_megashop()
{
	global $product, $woocommerce;
		
		$view_compare = get_page_link(ot_get_option('tt_compare_page'));
		$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
		$view_cart = $woocommerce->cart->get_cart_url();
		
		$button_cart = ot_get_option('tt_product_action_cart');		
		$button_wishlist = ot_get_option('tt_product_action_wishlist');			
		$button_compare = ot_get_option('tt_product_action_compare');				
		$button_detail = ot_get_option('tt_product_action_detail');		
	
		$output = '<div class="product-action-wrapper type-megashop clearfix"><div class="product-action-wrapper-inside clearfix">';
			
			
			if ($product->is_in_stock() && $product->price != '' && $button_cart != 'false')
				{
					$output .= '<div class="product_action_button clearfix">';
					$output .=  apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a title="'.__('Add to cart', 'spacex').'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s"><i class="fa fa-shopping-cart"></i><span class="text">'.__('Add to cart', 'spacex').'</span></a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type )
								
							),
						$product );
					$output .= '<a href="'.esc_url($view_cart).'" class="view_cart" title="'.__('View Cart', 'spacex').'"><i class="fa fa-shopping-cart"></i>'.__('View Wishlist', 'spacex' ).'</a>';	
					$output .= '</div>'; 	
				}
			if( $button_detail != 'false')
			{
			$output .= '<a href="javascript:void(0)" class="share_product md-trigger" data-modal="modal-1" data-product-id="'.get_the_id().'" data-link="'.get_permalink().'" data-product-type="simple" title="'.__('Share this product', 'spacex').'"><span class="fa fa-share-square-o"></span></a>';	
			}	
			if( $button_wishlist != 'false')
			{	
			$output .= '<div class="product_action_button">';
			$output .= '<a href="#" class="add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to wishlist', 'spacex').'"><i class="fa fa-heart-o"></i>'.__('Add to wishlist', 'spacex' ).'</a>';
			$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View wishlist', 'spacex').'"><i class="fa fa-heart-o-o"></i>'.__('View wishlist', 'spacex' ).'</a>';
			$output .= '</div>'; 
			}
			if( $button_compare != 'false')
			{
			$output .= '<div class="product_action_button">';
			$output .= '<a href="#" class="compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'"><i class="fa fa-files-o"></i>'.__('Add to compare', 'spacex').'</a>';
			$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'"><i class="fa fa-files-o"></i>'.__('View compare', 'spacex').'</a>';
			$output .= '</div>'; 
			}
			
		$output .= '</div>';	
		
		echo $output;	
}

//Type Diamond
function template_product_action_button_diamond()
{
	global $product, $woocommerce;
	
	$button_cart = ot_get_option('tt_product_action_cart');		
	$button_wishlist = ot_get_option('tt_product_action_wishlist');			
	$button_compare = ot_get_option('tt_product_action_compare');				
	$button_detail = ot_get_option('tt_product_action_detail');		
	
	$view_compare = get_page_link(ot_get_option('tt_compare_page'));
	$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
			
			
		
		
			if ($product->is_in_stock() && $product->price != '' && $button_cart != 'false')
				{
					$output .=  apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a title="'.__('Add to cart', 'spacex').'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_action_button add_to_cart %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type )
								
							),
						$product );
				}
			$output .= '<div class="product-action-wrapper type-diamond">';
			if( $button_wishlist != 'false')
			{	
			$output .= '<div class="product_action_button wishlist">';
			$output .= '<a href="#" class="add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to Wishlist', 'spacex').'"><i class="fa fa-heart-o"></i></a>';
			$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View wishlist', 'spacex').'"><i class="fa fa-heart-o"></i></a>';
			$output .= '</div>'; 
			}
			
			if( $button_compare != 'false')
			{
			$output .= '<div class="product_action_button compare">';
			$output .= '<a href="#" class="compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'"><i class="fa  fa-files-o"></i></a>';
			$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'"><i class="fa  fa-files-o"></i></a>';
			$output .= '</div>'; 
			}
			if( $button_detail != 'false')
				{	
					$output .= '<div class="product_action_button share">';
					$output .= '<a href="javascript:void(0)" class="share_product md-trigger" data-modal="modal-1" data-product-id="'.get_the_id().'" data-link="'.get_permalink().'" data-product-type="simple" title="'.__('Share this product', 'spacex').'"><span class="fa fa-share-square-o"></span></a>';	
					$output .= '</div>'; 				
				}	
			

			
		$output .= '</div>';	
		
		echo $output;	
}
//Type Tech
function template_product_action_button_tech()
{
	global $product, $woocommerce;
	
	$button_cart = ot_get_option('tt_product_action_cart');		
	$button_wishlist = ot_get_option('tt_product_action_wishlist');			
	$button_compare = ot_get_option('tt_product_action_compare');				
	$button_detail = ot_get_option('tt_product_action_detail');		
	
	$view_compare = get_page_link(ot_get_option('tt_compare_page'));
	$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
			
			
		
		
			
			$output .= '<div class="product-action-wrapper type-tech">';
			
			
			if( $button_compare != 'false')
			{
			$output .= '<div class="product_action_button compare">';
			$output .= '<a href="#" class="compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'"><i class="fa fa-star"></i></a>';
			$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'"><i class="fa fa-star"></i></a>';
			$output .= '</div>'; 
			}	
			if( $button_wishlist != 'false')
			{	
			$output .= '<div class="product_action_button wishlist">';
			$output .= '<a href="#" class="add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to Wishlist', 'spacex').'"><i class="fa fa-heart-o"></i></a>';
			$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View wishlist', 'spacex').'"><i class="fa fa-heart-o"></i></a>';
			$output .= '</div>'; 
			}
			
			if ($product->is_in_stock() && $product->price != '' && $button_cart != 'false')
				{
					$output .=  apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a title="'.__('Add to cart', 'spacex').'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_action_button add_to_cart %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type )
								
							),
						$product );
			}
			if( $button_detail != 'false')
				{	
					$output .= '<div class="product_action_button share">';
					$output .= '<a href="javascript:void(0)" class="share_product md-trigger" data-modal="modal-1" data-product-id="'.get_the_id().'" data-link="'.get_permalink().'" data-product-type="simple" title="'.__('Share this product', 'spacex').'"><span class="fa fa-share-square-o"></span></a>';	
					$output .= '</div>'; 				
				}	
			

			
		$output .= '</div>';	
		
		echo $output;	
}
//Type Block
function template_product_action_button_block()
{
	global $product, $woocommerce;
	
	$button_cart = ot_get_option('tt_product_action_cart');		
	$button_wishlist = ot_get_option('tt_product_action_wishlist');			
	$button_compare = ot_get_option('tt_product_action_compare');				
	$button_detail = ot_get_option('tt_product_action_detail');		
	
	$view_compare = get_page_link(ot_get_option('tt_compare_page'));
	$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
			
			$output .= '<div class="product-action-wrapper type-block">';
			
			if ($product->is_in_stock() && $product->price != '' && $button_cart != 'false')
			{
					$output .=  apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a title="'.__('Add to cart', 'spacex').'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_action_button add_to_cart %s product_type_%s">ADD TO CART</a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type )
								
							),
						$product );
			}
			
			$output .= '<div class="pab-block">';
			if( $button_wishlist != 'false')
			{	
			$output .= '<div class="product_action_button">';
			$output .= '<a href="#" class="add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to Wishlist', 'spacex').'"><i class="fa fa-heart-o"></i></a>';
			$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View wishlist', 'spacex').'"><i class="fa fa-heart"></i></a>';
			$output .= '</div>'; 
			}
			
			if( $button_compare != 'false')
			{
			$output .= '<div class="product_action_button compare">';
			$output .= '<a href="#" class="compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'"><i class="fa fa-star-o"></i></a>';
			$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'"><i class="fa fa-star"></i></a>';
			$output .= '</div>'; 
			}	
			if( $button_detail != 'false')
				{	
					$output .= '<div class="product_action_button share">';
					$output .= '<a href="javascript:void(0)" class="share_product md-trigger" data-modal="modal-1" data-product-id="'.get_the_id().'" data-link="'.get_permalink().'" data-product-type="simple" title="'.__('Share this product', 'spacex').'"><span class="fa fa-share-square-o"></span></a>';	
					$output .= '</div>'; 				
				}	
			
		$output .= '</div>'; 
			
		$output .= '</div>';	
		
		echo $output;	
}
//Loop Category
function woocommerce_templte_loop_category()
{
	global $product, $woocommerce;
	
	$product_cats = strip_tags($product->get_categories('|', '', '')); 
	
	$catlog_category = ot_get_option('tt_catalog_category');
	if($catlog_category !== 'true'){
		return;
	}
	
	if(!empty($product_cats))
	{
	
		echo '<p class="loop-category">';
		list($firstpart) = explode('|', $product_cats); 
		echo $firstpart;
		echo '</p>';
	
	}
}
//Rating
function woocommerce_template_loop_rating()
{
	global $product;
	if($product->get_average_rating())
	{
	$width = $product->get_average_rating() / 5 * 100;
	echo '<div class="spacex-rating clearfix">
		<div class = "total-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
		<div class = "rated" style = "width:'.esc_attr($width).'%;"><i class="fa fa-star first"></i><i class="fa fa-star second"></i><i class="fa fa-star third"></i><i class="fa fa-star fourth"></i><i class="fa fa-star fifth"></i></div>
	</div>';
	}
}
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
$catalog_rating = ot_get_option('tt_catalog_rating');
if($catalog_rating != 'false')
{
	$type = ot_get_option('tt_product_action');
	if($type == 'tech')
	{
		add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	}
	else
	{
		add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );
	}
	
}

//Sale Flash
add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);

function my_custom_sale_flash() {

  global $product;	
  
  $badge = ot_get_option('tt_product_sale_badge');
  
  if ( !$product->is_in_stock() )
  {
  	return '<div class="onsale sold '.esc_attr($badge) .'"><span>'.__('Out of Stock!', 'woocommerce').'</span></div>'; 
  }	
  return '<div class="onsale '.esc_attr($badge) .'"><span>'.__('Sale!', 'woocommerce').'</span></div>'; 
}
$catalog_sale = ot_get_option('tt_catalog_sale');
if($catalog_sale == 'false')
{
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
}

/* ---------------------------------------------------------------------- */
/* Single Product
/* ---------------------------------------------------------------------- */
//Rating
function woocommerce_template_single_rating()
{
	global $product;
	if($product->get_average_rating())
	{
	$width = $product->get_average_rating() / 5 * 100;
	
	$count   = $product->get_rating_count();
	$average = $product->get_average_rating();
	
	echo '<div class="single-product-rating"><div class="spacex-rating">
		<div class = "total-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
		<div class = "rated" style = "width:'.esc_attr($width).'%;"><i class="fa fa-star first"></i><i class="fa fa-star second"></i><i class="fa fa-star third"></i><i class="fa fa-star fourth"></i><i class="fa fa-star fifth"></i>
		</div>
		
		
	</div><a href="#reviews" class="woocommerce-review-link" rel="nofollow">' . $count . __(' customer reviews','woocommerce').'</a></div><div class="clearfix"></div>';
	}
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 35 );

$product_rating = ot_get_option('tt_product_rating');
if($product_rating == 'false')
{
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 35 );
}

//Sale Flash
$product_sale = ot_get_option('tt_product_sale_flash');
if($product_sale == 'false')
{
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
}
//Breadcrum
$breadcumb = ot_get_option('tt_product_single_breadcrumb');
if($breadcumb !=='false' ) 
{
	add_action( 'woocommerce_single_product_summary', 'the_breadcrumb', 1 );	
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );	
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );	
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 37 );	
//Single Product Action
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_product_action', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 55);

function woocommerce_template_single_product_action()
{
	
	$view_compare = get_page_link(ot_get_option('tt_compare_page'));
	$view_wishlist = get_page_link(ot_get_option('tt_wishlist_page'));
	$type = ot_get_option('tt_product_single_display');
	
	$output = '<div class="product-action-wrapper product-wrapper single-product-action '.esc_attr($type).'">';
			$output .= '<a href="#" class="product_action_button add_to_wishlist" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Add to wishlist', 'spacex').'">'.__('Add to Wishlist', 'spacex').'</a>';
			$output .= '<a href="'.esc_url($view_wishlist).'" class="view_wishlist" title="'.__('View Wishlist', 'spacex').'">'.__('View Wishlist', 'spacex').'</a>';
			$output .= '<a href="#" class="product_action_button compare_product" data-product-id="'.get_the_id().'" data-product-type="simple" title="'.__('Compare this product', 'spacex').'">'.__('Add to Compare', 'spacex').'</a>';
			$output .= '<a href="'.esc_url($view_compare).'" class="view_compare" title="'.__('View Compare', 'spacex').'">'.__('View Compare', 'spacex').'</a>';
			
			
		$output .= '</div>';	
		
		echo $output;
}
//Sharing
function woocommerce_template_single_sharing()
{
	$sharing = ot_get_option('tt_product_sharing');
	if($sharing == 'false')
	{
		return false;
	}
	spacex_sharing_social_template();
}
//Clearfix in entry-summary
add_action( 'woocommerce_after_single_product_summary', 'clearfix', 5 );
function clearfix()
{
	echo '<div class="clearfix"></div>';
}
add_action( 'woocommerce_single_product_summary', 'clearfix', 35 );

//Wrapper Entry Summary
add_action( 'woocommerce_single_product_summary', 'sumary_wrapper_start', 1 );
add_action( 'woocommerce_single_product_summary', 'sumary_wrapper_end', 99 );

function sumary_wrapper_start()
{

	echo '<div class="entry_summary_inside">';
	
}
function sumary_wrapper_end()
{ 
	echo '</div>';
}
add_action( 'woocommerce_single_product_summary', 'single_product_featured', 100);

//Featured products in single product
function single_product_featured()
{
	$featured = ot_get_option('tt_product_single_featured');
	if($featured == 'true')
	{
			$feature_products = '[productlist title="Featured Products" perpage="4" featured="no" latest="yes" best_sellers="no" on_sale="no" category="" orderby="date" order="DESC" layout="list"]';
						
			echo '<div class="single_featured_product"><div class="single_featured_product_inside">';
			echo do_shortcode( $feature_products ); 
			echo '</div></div>';	  
	}
}
add_action( 'woocommerce_after_single_product_summary', 'after_sumary_wrapper_star', 1 );
add_action( 'woocommerce_after_single_product_summary', 'after_sumary_wrapper_end', 99 );

//Wrapper after-summary content				  
function after_sumary_wrapper_star()
{
	echo '<div class="after_entry_summary">';
}
function after_sumary_wrapper_end()
{
	echo '</div>';
}
//Sidebar in after entry summary
add_action( 'woocommerce_after_single_product_summary', 'after_sumary_sidebar', 100 );
function after_sumary_sidebar()
{
	$sidebar_underneath = ot_get_option('tt_product_single_sidebar_position');
	$sidebar_display = ot_get_option('tt_site_sidebar_type');
	
	if($sidebar_underneath != 'true')
	{
		return;
	}
		echo  '<div id="sidebar" class="col-lg-3 col-md-3 col-xs-12 '.esc_attr($sidebar_display).'">';
	  	
	  	$sidebar = ot_get_option('tt_product_single_sidebar');

	  	if(is_active_sidebar($sidebar))
	  	{
			echo '<div class="sidebar-inner">';
				
				dynamic_sidebar($sidebar); 
			  
			echo '</div>';
	  	}
	  	
	  	echo '</div>';
}

//Script Zoom
add_action( 'woocommerce_before_single_product_summary', 'single_product_zoom_script', 19 );
function single_product_zoom_script()
{
	$zoom = ot_get_option('tt_product_zoom');
	$inner = ot_get_option('tt_product_zoom_responsive');
	
	if($zoom !== 'false')
	{
		if($inner == 'true')
		{
			$inner = 'inner';
		}
		else
		{
			$inner = 'standard';
		}
		echo '<script>
		  
			
		jQuery(document).ready(function() {
			
	
			jQuery(".fancy_products").bind("click",function(){
		
            var fancyImage = [];

			
			if(jQuery(".yith_magnifier_zoom").attr("href")){
				fancyImage.unshift({
					href:  jQuery(".yith_magnifier_zoom").attr("href"),
					title: jQuery(".yith_magnifier_zoom").attr("title")
				});	
			}
			
			jQuery("#gallery-zoom a").each(function(){
				
					var img_src = "";
					
					if(jQuery(this).attr("href")){
						
						img_src = jQuery(this).attr("href");
						
						fancyImage.push({
							href: img_src,
							title: jQuery(this).attr("title")
						});
					}
				
			});
			
			
			jQuery.fancybox(fancyImage); 				
							
			
		    });
			
			 });</script>';

	}
}
//Get product variation data for zoom
function available_variation( $data, $wc_prod, $variation ) {

		$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
		$attachment = wp_get_attachment_image_src( $attachment_id, 'full' );

		$data['product_zoom'] = $attachment ? current( $attachment ) : '';
		return $data;
}
add_filter( 'woocommerce_available_variation', 'available_variation', 10, 3);

