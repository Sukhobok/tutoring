<?php
/* =============================================================== */
/* xevent Content
/* =============================================================== */
if ( ! function_exists( 'xevent_content' ) ) {

	/**
	 * Output xevent content.
	 *
	 * This function is only used in the optional 'xevent.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function xevent_content() {

		if ( is_singular( 'speaker' ) ) {
			
			do_action( 'xevent_before_main_content' );
			
			while ( have_posts() ) : the_post();
			
				xt_get_template_part( 'content', 'single-speaker' );

			endwhile;

		}/* else { ?>

			<?php if ( have_posts() ) : ?>


					<?php while ( have_posts() ) : the_post(); ?>

						<?php xt_get_template_part( 'content', 'speaker' ); ?>

					<?php endwhile; // end of the loop. ?>


			<?php else: ?>
				<?php xt_get_template( 'loop/no-xevents.php' ); ?>

			<?php endif;

		}
		*/
		if ( is_singular( 'xevent' ) ) {

			while ( have_posts() ) : the_post();

				xt_get_template_part( 'content', 'single-xevent' );

			endwhile;

		} elseif(is_post_type_archive( 'xevent' ) || is_event_taxonomy()) { ?>

			<?php do_action( 'xevent_before_main_content' );?>
			<?php if ( have_posts() ) : ?>
				
                <?php do_action('xevent_before_event_loop'); ?>
                
				<?php xevent_loop_start(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php xt_get_template_part( 'content', 'xevent' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php xevent_loop_end(); ?>

				<?php do_action('xevent_after_event_loop'); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php xt_get_template( 'loop/no-xevents.php' ); ?>
			<?php do_action( 'xevent_after_main_content' );?>
			<?php endif;

		}
	}
}
/* =============================================================== */
/* Loop
/* =============================================================== */
if ( ! function_exists( 'xevent_loop_start' ) ) {

	/**
	 * Output the start of a product loop. By default this is a UL
	 *
	 * @access public
	 * @param bool $echo
	 * @return string
	 */
	function xevent_loop_start( $echo = true ) {
		ob_start();
		
		xt_get_template( 'loop/loop-start.php' );
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}
if ( ! function_exists( 'xevent_loop_end' ) ) {

	/**
	 * Output the end of a product loop. By default this is a UL
	 *
	 * @access public
	 * @param bool $echo
	 * @return string
	 */
	function xevent_loop_end( $echo = true ) {
		ob_start();

		xt_get_template( 'loop/loop-end.php' );

		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}
if ( ! function_exists( 'xevent_result_count' ) ) {

	/**
	 * Output the result count text (Showing x - x of x results).
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_result_count() {
		xt_get_template( 'loop/result-count.php' );
	}
}

if ( ! function_exists( 'xevent_catalog_ordering' ) ) {

	/**
	 * Output the product sorting options.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_catalog_ordering() {
		global $wp_query;
		
		if ( 0 == $wp_query->found_posts) {
			return;
		}

		$orderby = isset( $_GET['orderby'] ) ? sc_clean( $_GET['orderby'] ) : 'date' ;

		$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
			'popularity' => __( 'Sort by popularity', 'woocommerce' ),
			'rating'     => __( 'Sort by average rating', 'woocommerce' ),
			'date'       => __( 'Sort by newness', 'woocommerce' ),
			'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
			'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
		) );

		if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
			unset( $catalog_orderby_options['rating'] );
		}

		xt_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby ) );
	}
}

if ( ! function_exists( 'xevent_pagination' ) ) {

	/**
	 * Output the pagination.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_pagination() {
		xt_get_template( 'loop/pagination.php' );
	}
}

if ( ! function_exists( 'xevent_template_loop_meta' ) ) {

	/**
	 * Output the Course Meta.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_loop_meta() {
		xt_get_template( 'loop/meta.php' );
	}
}
if ( ! function_exists( 'xevent_template_loop_description' ) ) {

	/**
	 * Output the Course Description.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_loop_description() {
		xt_get_template( 'loop/description.php' );
	}
}
if ( ! function_exists( 'xevent_template_loop_price' ) ) {

	/**
	 * Output the Course Price.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_loop_price() {
		xt_get_template( 'loop/price.php' );
	}
}
if ( ! function_exists( 'xevent_template_loop_action_button' ) ) {

	/**
	 * Output the Course Action Button.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_loop_action_button() {
		xt_get_template( 'loop/action_button.php' );
	}
}
if ( ! function_exists( 'xevent_template_event_loop_status' ) ) {

	/**
	 * Output the Course Action Button.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_event_loop_status() {
		
		global $post;
		$status =  get_post_meta($post->ID,'event-status',true);
		
		switch($status)
		{
			case 'opening';
			$status = __('Opening', 'spacex');
			break;
			case 'closed';
			$status = __('Completed', 'spacex');
			break;
			case 'coming-soon';
			$status = __('Coming', 'spacex');
			break;
		}
		if($status != '')
		{
			echo '<span class="event-loop-status '.$status.'"><b>'.$status.'</b></span>';
		}
		else
		{
			echo '';
		}
		
	}
}

if ( ! function_exists( 'xevent_template_event_date_time' ) ) {

	/**
	 * Output the Course Action Button.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xevent_template_event_date_time() {
		
				global $post;

    	$date_time = get_post_meta($post->ID, 'event_date', true);
			 
			 $year = substr($date_time,0,4);	
			 $month = substr($date_time,5,2);	
			 $date = substr($date_time,8,2);	
			 $time = substr($date_time,11,5);				 
			 $event_month = $month;	
			 
				switch($month)
				{
					case '01':
					$event_month = __('Jan', 'spacex');
					break;
					case '02':
					$event_month = __('Feb', 'spacex');
					break;
					case '03':
					$event_month = __('March', 'spacex');
					break;
					case '04':
					$event_month = __('April', 'spacex');
					break;
					case '05':
					$event_month = __('May', 'spacex');
					break;
					case '06':
					$event_month = __('June', 'spacex');
					break;
					case '07':
					$event_month = __('July', 'spacex');
					break;
					case '08':
					$event_month = __('August', 'spacex');
					break;
					case '09':
					$event_month = __('Sep', 'spacex');
					break;
					case '10':
					$event_month = __('Oct', 'spacex');
					break;
					case '11':
					$event_month = __('Nov', 'spacex');
					break;
					case '12':
					$event_month = __('Dec', 'spacex');
					break;
				}
				
			 
			 if($month != '' && $date != '')
			 {
				 echo '<div class="event-date-time">';
				 
					
					echo '<span class="event-date">'.$date.'</span>';
					echo '<span class="event-month">'.$event_month.'</span>';
					if($time != '')
					{
						echo '<span class="event-time">'.$time.'</span>';		
					}
						 
				 echo '</div>';
			 }
		
	}
}
/* =============================================================== */
/* Single
/* =============================================================== */
if ( ! function_exists( 'xevent_single_event_speakers' ) ) {


	function xevent_single_event_speakers() {
		include_once( XT_PLUGIN_TEMPLATE . '/single/speakers.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_selling' ) ) {


	function xevent_single_event_selling() {
		include_once( XT_PLUGIN_TEMPLATE . '/single/price.php');
	}
}
	   
if ( ! function_exists( 'xevent_single_event_meta' ) ) {

	function xevent_single_event_meta() {
		include_once( XT_PLUGIN_TEMPLATE . '/single/meta.php');

	}
}
if ( ! function_exists( 'xevent_single_event_description' ) ) {


	function xevent_single_event_description() {
		include_once( XT_PLUGIN_TEMPLATE . '/single/description.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_lesson' ) ) {


	function xevent_single_event_lesson() {
			
		include_once( XT_PLUGIN_TEMPLATE . '/single/modules.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_cat_tag' ) ) {


	function xevent_single_event_cat_tag() {
			
		include_once( XT_PLUGIN_TEMPLATE . '/single/cat_tag.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_content' ) ) {


	function xevent_single_event_content() {
		
		include_once( XT_PLUGIN_TEMPLATE . '/single/content.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_images' ) ) {


	function xevent_single_event_images() {
		
		include_once( XT_PLUGIN_TEMPLATE . '/single/event-images.php');
		
	}
}
if ( ! function_exists( 'xevent_single_event_sharing' ) ) {


	function xevent_single_event_sharing() {
		
		include_once( XT_PLUGIN_TEMPLATE . '/single/sharing.php');
		
	}
}
if ( ! function_exists( 'xevent_post_meta' ) ) {


	function xevent_post_meta() {
		echo '<div class="entry-meta">';
		echo spacex_post_meta();
		echo '</div>';
		
	}
}
/* =============================================================== */
/* Global
/* =============================================================== */
function xevent_template_page_header()
{
	xt_get_template( 'global/page-header.php' );	
}
if ( ! function_exists( 'xevent_output_content_wrapper' ) ) {

	/**
	 * Output the start of the page wrapper.
	 *
	 * @access public
	 * @return void
	 */
	function xevent_output_content_wrapper() {
		xt_get_template( 'global/wrapper-start.php' );
	}
}
if ( ! function_exists( 'xevent_output_content_wrapper_end' ) ) {

	/**
	 * Output the end of the page wrapper.
	 *
	 * @access public
	 * @return void
	 */
	function xevent_output_content_wrapper_end() {
		xt_get_template( 'global/wrapper-end.php' );
	}
}

if ( ! function_exists( 'xevent_get_sidebar' ) ) {

	/**
	 * Get the shop sidebar template.
	 *
	 * @access public
	 * @return void
	 */
	function xevent_get_sidebar() {
		xt_get_template( 'global/sidebar.php' );
	}
}
if ( ! function_exists( 'xevent_template_loop_thumbnail' ) ) {
	function xevent_template_loop_thumbnail()
	{
		echo xevent_get_product_thumbnail();
	}
}
if ( ! function_exists( 'xevent_get_product_thumbnail' ) ) {
	function xevent_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;
		
		if ( has_post_thumbnail() )
			xt_get_template( 'loop/thumbnail.php' );
		elseif ( xt_placeholder_img_src() )
			return xt_placeholder_img( $size );
	}
}
/**
 * Get the placeholder image URL for products etc
 *
 * @access public
 * @return string
 */
function xt_placeholder_img_src() {
	return apply_filters( 'xevent_placeholder_img_src', XT()->plugin_url() . '/assets/images/placeholder.png' );
}

/**
 * Get the placeholder image
 *
 * @access public
 * @return string
 */
function xt_placeholder_img( $size = 'shop_thumbnail' ) {
	$dimensions = xt_get_image_size( $size );

	return apply_filters('xevent_placeholder_img', '<img src="' . xt_placeholder_img_src() . '" alt="' . __( 'Placeholder', 'spacex' ) . '" width="' . esc_attr( $dimensions['width'] ) . '" class="spacex-placeholder wp-post-image" height="' . esc_attr( $dimensions['height'] ) . '" />', $size, $dimensions );
}

if ( ! function_exists( 'xevent_taxonomy_archive_description' ) ) {

	/**
	 * Show an archive description on taxonomy archives
	 *
	 * @access public
	 * @subpackage	Archives
	 * @return void
	 */
	function xevent_taxonomy_archive_description() {
		if ( is_tax( array( 'event_cat', 'event_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
			$description = wpautop( do_shortcode( term_description() ) );
			if ( $description ) {
				echo '<div class="term-description">' . $description . '</div>';
			}
		}
	}
}
if ( ! function_exists( 'xevent_event_archive_description' ) ) {

	/**
	 * Show a shop page description on product archives
	 *
	 * @access public
	 * @subpackage	Archives
	 * @return void
	 */
	function xevent_event_archive_description() {
		if ( is_post_type_archive( 'xevent' ) && get_query_var( 'paged' ) == 0 ) {
			$shop_page   = get_post( wc_get_page_id( 'shop' ) );
			if ( $shop_page ) {
				$description = wpautop( do_shortcode( $shop_page->post_content ) );
				if ( $description ) {
					echo '<div class="page-description">' . $description . '</div>';
				}
			}
		}
	}
}

if ( ! function_exists( 'get_event_content_file_grid' ) ) {
	function get_event_content_file_grid() {
		ob_start();
		xt_get_template_part( 'content', 'xevent' );
		return ob_get_clean();
	}
}