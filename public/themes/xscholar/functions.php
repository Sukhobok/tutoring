<?php

define( 'X_BASE_DIR', get_template_directory() . '/' );
define( 'X_THEME_TEMPLATE', get_template_directory() . '/framework/templates/' );
define( 'X_BASE_URL', get_template_directory_uri() . '/' );
define( 'X_ADMIN_ASSETS', get_template_directory_uri() . '/framework/assets' );

if ( ! isset( $content_width ) ) $content_width = 900;

require_once ('option-tree/ot-loader.php');





if( !function_exists('spacex_setup') ) {

	function spacex_setup() {

		load_theme_textdomain( 'spacex', get_template_directory() . '/languages' );
		// Post thumbnails
		include_once( get_template_directory() . '/framework/framework.php' );
		
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( "title-tag" );
		add_theme_support( 'custom-header' );
		add_theme_support( "custom-background");
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );

		add_image_size( 'fromtheblog', 400, 400, true );
		add_image_size( 'post-catalog', 500,400, true );
		add_image_size( 'full', 9999 );
		add_image_size( 'client', 480 );
		add_image_size( 'testimonial', 160, 160, true );
		add_image_size( 'recent-project', 640, 420, true );
		add_image_size( 'benefit', 640, 420, true );


	}
}
add_action('after_setup_theme', 'spacex_setup', 10);

/* ---------------------------------------------------------------------- */
/*	Custom Post Type Format
/* ---------------------------------------------------------------------- */
function spacex_register_post_format()
{
	$postType = '';
	if (isset($_GET['post'])) {
		$postType = get_post_type( $_GET['post'] );
	}

	if($postType == 'xgallery' || (isset($_GET['post_type']) && $_GET['post_type'] == 'xgallery' ) )
    {
		add_theme_support( 'post-formats', array( 'gallery', 'video' ) );
        add_post_type_support( 'xgallery', 'post-formats' );
    }
	else
	{
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'audio', 'video', 'quote') );
    }

}
add_action( 'init','spacex_register_post_format' );



/* ---------------------------------------------------------------------- */
/*	Theme Scripts
/* ---------------------------------------------------------------------- */
function spacex_enqueue_scripts()
{
	if( !is_admin() ) {


		//wp_enqueue_script( 'migrate',		X_BASE_URL . 'js/jquery.migrate-1.2.1.min.js',     array('jquery'), false, true );
		wp_enqueue_script( 'bootstrap',		X_BASE_URL . 'js/bootstrap.min.js',                    array('jquery'), false, true );
		wp_enqueue_script( 'flexslider',	X_BASE_URL . 'js/jquery.flexslider.js',            array('jquery'), false, true );
		wp_enqueue_script( 'superfish',		X_BASE_URL . 'js/superfish.js',                   	array('jquery'), false, true );
		wp_enqueue_script( 'mobile',		X_BASE_URL . 'js/jquery.mmenu.min.all.js',                   	array('jquery'), false, true );
		wp_enqueue_script( 'isotope',  		X_BASE_URL . 'js/isotope.pkgd.min.js',             array('jquery'), false, true );
		wp_enqueue_script( 'fancybox',  	X_BASE_URL . 'js/jquery.fancybox.js',           	array('jquery'), false, true );
		wp_enqueue_script( 'custom-woo',		X_BASE_URL . 'js/custom_woo.js',     array('jquery'), false, true );
		wp_enqueue_script( 'custom-scripts', X_BASE_URL . 'js/custom.js',                   	array('jquery'), false, true );
		wp_enqueue_script( 'popup',		X_BASE_URL . 'js/popup.js',     array('jquery'), false, true );


		wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		wp_enqueue_style('js_composer_custom_css');


		if ( is_singular() && get_option('thread_comments') ){
			wp_enqueue_script('comment-reply');
		}
	}


}
add_action('wp_enqueue_scripts', 'spacex_enqueue_scripts');

/* ---------------------------------------------------------------------- */
/*	Theme styles
/* ---------------------------------------------------------------------- */
function spacex_enqueue_styles() {


		wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
		wp_register_style( 'custom-css', X_BASE_URL . 'css/custom.css.php' );
		wp_enqueue_style ('custom-css');

			wp_enqueue_style( 'x-switcher-css', get_template_directory_uri() . '/css/switcher.css' );

		$responsive = ot_get_option('tt_responsive');

		if($responsive !== 'false')
		{
			wp_enqueue_style( 'theme-responive',	X_BASE_URL . 'css/responsive.css',  null, false );
		}

		$layout = ot_get_option('tt_theme_layout');

		if($layout == 'boxed')
		{
			wp_enqueue_style( 'layout',	X_BASE_URL . 'css/layout/boxed.css',	null, false );
		}
		else
		{
			wp_enqueue_style( 'layout',	X_BASE_URL . 'css/layout/fullwidth.css',	null, false );
		}

		spacex_register_google_fonts();
}
add_action('wp_enqueue_scripts', 'spacex_enqueue_styles');

function spacex_register_google_fonts()
{
		$content_font = ot_get_option('tt_content_font');
		$heading_font = ot_get_option('tt_heading_font');

		if(isset($content_font['font-family']))
		{
			$content_font = $content_font['font-family'];
		}
		if(isset($heading_font['font-family']))
		{
			$heading_font = $heading_font['font-family'];
		}

		$fonts = array(
			'content_font' => $content_font,
			'heading_font' => $heading_font
		);
		$temps = array();
		foreach($fonts as $key => $value)
		{
			if(preg_match('/google_/', $value))
			{
				$temp = str_replace('google_','',$value);
				$temps[$key]=$temp;
			}
		}

		if(count($temps > 0 ))
		{
			foreach($temps as $key=>$value)
			{
				//wp_enqueue_style( $key,	'http://fonts.googleapis.com/css?family='.$value.'%3A300%2C400%2C600%2C700&subset=latin,latin-ext', null, false );
				wp_enqueue_style( $key,	'http://fonts.googleapis.com/css?family='.$value.'%3A300%2C400%2C600%2C700', null, false );
			}
		}
}

/* ---------------------------------------------------------------------- */
/*	Enqueue Admin Scripts + Style
/* ---------------------------------------------------------------------- */
function spacex_admin_scripts( $hook ) {

		wp_enqueue_script( 'bootstrapguru-import', X_ADMIN_ASSETS . '/js/bootstrapguru-import.js');
		wp_enqueue_script( 'bootstrap-select', X_ADMIN_ASSETS . '/js/bootstrap-select.js');
		wp_enqueue_script('customize-admin', X_ADMIN_ASSETS . '/js/customize-admin.js');

		wp_enqueue_script( 'bootstrapjs', X_BASE_URL . '/js/bootstrap.min.js');

		wp_enqueue_style('fontawesome', X_BASE_URL . '/css/font-awesome.css');
		wp_enqueue_style('admin-style', X_ADMIN_ASSETS . '/css/style.css');


}
add_action('admin_enqueue_scripts', 'spacex_admin_scripts');


function your_filter_typography_fields( $array, $field_id ) {

    if( $field_id == 'tt_heading_1' ||  $field_id == 'tt_heading_2' || $field_id == 'tt_heading_3' || $field_id == 'tt_heading_4' || $field_id == 'tt_heading_5' || $field_id == 'tt_heading_6')
	{
       $array = array( 'font-size', 'font-weight', 'line-height');
    }
	if( $field_id == 'tt_heading_font' )
	{
		 $array = array( 'font-color', 'font-family', 'font-weight', 'font-style', 'font-variant', 'letter-spacing', 'text-transform', 'text-decoration');
	}

    return $array;

}
add_filter('ot_recognized_typography_fields','your_filter_typography_fields', 10, 2);

function override_page_title()
{
	return false;
}
add_filter('woocommerce_show_page_title','override_page_title');

/* ---------------------------------------------------------------------- */
/*	Pop up
/* ---------------------------------------------------------------------- */
add_action( 'wp_ajax_hidden_popup', 'spacex_hidden_popup' );
add_action( 'wp_ajax_nopriv_hidden_popup', 'spacex_hidden_popup' );

function spacex_hidden_popup()
{
	if($_POST['visible'] == 'hidden')
	{
		if( spacex_usecookies() ) {
			spacex_setcookie( 'spacex_popup', array('visible' => 'hidden') );
		}
		else
		{
			 $_SESSION['spacex_popup']= 'hidden';
		}
	}
	else
	{
		if( spacex_usecookies() ) {
			spacex_destroycookie('spacex_popup');
		}
	}
}


/* ---------------------------------------------------------------------- */
/*	Google Fonts
/* ---------------------------------------------------------------------- */
function spacex_get_google_fonts() {

	if (file_exists(get_template_directory() . '/framework/assets/fonts/google-fonts.JSON')) {

		$default_theme_fonts = array(
					'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
					'"Helvetica Neue", Helvetica, Arial, sans-serif' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
					'Georgia, "Times New Roman", Times, serif' => 'Georgia, "Times New Roman", Times, serif',
					'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
					'"Times New Roman", Times, serif' => '"Times New Roman", Times, serif',
					'"Trebuchet MS", Arial, Helvetica, sans-serif' => '"Trebuchet MS", Arial, Helvetica, sans-serif',
					'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
		);

		$file_url = get_template_directory_uri() . '/framework/assets/fonts/google-fonts.JSON';

		$request = wp_remote_get($file_url);
		$file_content = wp_remote_retrieve_body( $request );

		$google_fonts = json_decode($file_content, true);

		global $fonts;


		$fonts['google_fonts'] = '---Google Web Fonts---';

		foreach ($google_fonts['items'] as $index => $value) {
			$fonts['google_' . $value['family']] = $value['family'];
		}

		$array = array_merge($default_theme_fonts, $fonts);
	}

	return $array;

}
add_filter( 'ot_recognized_font_families', 'spacex_get_google_fonts');


/* ---------------------------------------------------------------------- */
/*	User Contact Info
/* ---------------------------------------------------------------------- */

function spacex_contact_methods( $contact ) {

    $contact['twitter'] = 'Twitter';
    $contact['facebook'] = 'Facebook';
	$contact['googleplus'] = 'Google Plus';
    return $contact;
}
add_filter('user_contactmethods','spacex_contact_methods',10,1);


add_filter('spacex_header_type', 'header_type_function',10,3);
function header_type_function()
{
	$header_type = ot_get_option('tt_header_type');
	if($header_type == '')
	{
		$header_type = 'megashop';
	}
	return $header_type;
}
add_filter('spacex_has_topbar', 'has_topbar_function',10,3);
function has_topbar_function()
{
	$topbar = ot_get_option('tt_header_topbar');
	if($topbar == 'true')
	{
		return 'has-topbar';
	}
}

/* ---------------------------------------------------------------------- */
/*	Update Header Cart Content After Product Added
/* ---------------------------------------------------------------------- */

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {

	global $woocommerce;
	ob_start();

	$cart_type = ot_get_option('tt_header_cart_type');
?>
<div class="header-cart-inside <?php echo $cart_type?>">
<div class="cart-list">
<div class="cart-list-inner">
<?php
	if (sizeof($woocommerce->cart->cart_contents)>0) {
	 foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
		$_product = $cart_item['data'];
		$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		if ($_product->exists() && $cart_item['quantity']>0) {  ?>

		<div class="mini-cart-item clearfix">
			<div class="cart-item-thumb">
				<?php
				$thumbnail = $_product->get_image();
				$link = get_permalink($cart_item['product_id']);

				if(isset($cart_item['spacex_product']))
				{

					$query_event_args = array(
						'post_type'	=> 'xcourse',
						'post_status' => 'publish',
						'posts_per_page'     => 1,
						'meta_key' 		=> 'course_selling',
						'meta_value' 	=>  $product_id,
						'meta_compare' 	=>  '=',
					);

					if($cart_item['spacex_product'] == 'ticket')
					{
						$query_event_args = array(
							'post_type'	=> 'xevent',
							'post_status' => 'publish',
							'posts_per_page'     => 1,
							'meta_key' 		=> 'event_selling',
							'meta_value' 	=>  $product_id,
							'meta_compare' 	=>  '=',
						);

					}

					$events = new WP_Query( $query_event_args );


					if($events->have_posts())
					{

						 while ($events->have_posts() ) : $events->the_post();
						 	$thumbnail = get_the_post_thumbnail($events->ID, array(100,100));
							$link = get_permalink($events->ID);
						 endwhile;
						 wp_reset_postdata();

					}

				}

				echo '<a class="cart-list-product-thumb" href="'.$link.'">' . $thumbnail .'</a>';                                                    ?>
			</div>
			<div class="cart-item"><?php
				 $product_title = $_product->get_title();
				 echo '<a class="cart-list-product-title" href="'.$link.'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a>';

				$meta_cart_item = '';
				if(isset( $cart_item['spacex_product']))
				{
					$meta_cart_item = 'x '.$cart_item['spacex_product'];
				}
				 echo '<div class="cart-list-product-quantity">'.__('Qty', 'spacex').': '.$cart_item['quantity'].' '.$meta_cart_item.'</div>';

			?></div>
			<?php
			 echo '<div class="cart-list-product-price">'.woocommerce_price($_product->get_price()).'</div>';
			?>
			<div class="remove-cart-item">
				<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove-cart-item-link" title="%s"><i class="fa fa-trash-o"></i></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key ); ?>
			</div>


		</div><!-- end row -->

<?php
}
	}


?>
<div class="header-cart-checkout clearfix">
		<?php _e('Cart Subtotal', 'woocommerce'); ?><span><?php echo $woocommerce->cart->get_cart_total(); ?></span>
    </div>

    <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="header-btn-view-cart"><?php _e('View Cart', 'spacex'); ?></a>

    <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="header-btn-check-out"><?php _e('Checkout', 'spacex'); ?></a>
    <div class="clearfix"></div>
    <?php
     }
     else
     {
        echo '<p class="cart-empty">'.__('No products in the cart.','woocommerce').'</p>';
     }
    ?>
    </div><!-- Cart list -->
</div>

 	<?php
		echo '<a class="cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'woothemes').'">';

		$cart_icon = ot_get_option('tt_header_cart_icon');
		if(!empty($cart_icon))
		{
			echo '<img src="'.$cart_icon.'" alt="" class="mini-cart-icon" />';
		}
		else
		{
				echo '<i class="mini-cart-icon fa fa-shopping-cart"></i>';
		}

		echo  '<span class="mini-cart-count">' . $woocommerce->cart->cart_contents_count . '</span>' . '<i class="mini-cart-text">'.__(' items', 'spacex').'</i>';

		echo '</a>';

	?>
</div>

<?php
$fragments['.header-cart-inside'] = ob_get_clean();
return $fragments;
}


add_filter('add_to_cart_fragments', 'woocommerce_sticky_header_add_to_cart_fragment');

function woocommerce_sticky_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<a class="sticky-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
    <i class="fa fa-shopping-cart"></i>
    <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
</a>
<?php
$fragments['.sticky-cart-contents'] = ob_get_clean();
return $fragments;
}

add_filter( 'body_class', 'spacex_theme_body_class' );
function spacex_theme_body_class( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = 'header-'.apply_filters('spacex_header_type', '');
	$classes[] = 'sidebar-'.apply_filters('spacex_sidebar_display','');
	// return the $classes array
	return $classes;
}
