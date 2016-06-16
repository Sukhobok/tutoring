<?php
/* =============================================================== */
/* xcourse Content
/* =============================================================== */
if ( ! function_exists( 'xcourse_content' ) ) {

	/**
	 * Output xcourse content.
	 *
	 * This function is only used in the optional 'xcourse.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function xcourse_content() {

		if ( is_singular( 'instructor' ) ) {
			
			do_action( 'xcourse_before_main_content' );
			
			while ( have_posts() ) : the_post();
			
				sc_get_template_part( 'content', 'single-instructor' );

			endwhile;

		}
		
		if ( is_singular( 'xcourse' ) ) {

			while ( have_posts() ) : the_post();

				sc_get_template_part( 'content', 'single-xcourse' );

			endwhile;

		} elseif(is_post_type_archive( 'xcourse' ) || is_course_taxonomy()) { ?>

			<?php do_action( 'xcourse_before_main_content' );?>
            
			<?php if ( have_posts() ) : ?>
				
                <?php do_action('xcourse_before_course_loop'); ?>
                
				<?php xcourse_loop_start(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php sc_get_template_part( 'content', 'xcourse' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php xcourse_loop_end(); ?>

				<?php do_action('xcourse_after_course_loop'); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php sc_get_template( 'loop/no-courses.php' ); ?>
                
			<?php do_action( 'xcourse_after_main_content' );?>
            
			<?php endif;

		}
	}
}
/* =============================================================== */
/* Loop
/* =============================================================== */
if ( ! function_exists( 'xcourse_loop_start' ) ) {

	/**
	 * Output the start of a product loop. By default this is a UL
	 *
	 * @access public
	 * @param bool $echo
	 * @return string
	 */
	function xcourse_loop_start( $echo = true ) {
		ob_start();
		
		sc_get_template( 'loop/loop-start.php' );
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}
if ( ! function_exists( 'xcourse_loop_end' ) ) {

	/**
	 * Output the end of a product loop. By default this is a UL
	 *
	 * @access public
	 * @param bool $echo
	 * @return string
	 */
	function xcourse_loop_end( $echo = true ) {
		ob_start();

		sc_get_template( 'loop/loop-end.php' );

		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}
if ( ! function_exists( 'xcourse_result_count' ) ) {

	/**
	 * Output the result count text (Showing x - x of x results).
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_result_count() {
		sc_get_template( 'loop/result-count.php' );
	}
}

if ( ! function_exists( 'xcourse_catalog_ordering' ) ) {

	/**
	 * Output the product sorting options.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_catalog_ordering() {
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

		sc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby ) );
	}
}

if ( ! function_exists( 'xcourse_pagination' ) ) {

	/**
	 * Output the pagination.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_pagination() {
		sc_get_template( 'loop/pagination.php' );
	}
}

if ( ! function_exists( 'xcourse_template_loop_meta' ) ) {

	/**
	 * Output the Course Meta.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_template_loop_meta() {
		sc_get_template( 'loop/meta.php' );
	}
}
if ( ! function_exists( 'xcourse_template_loop_description' ) ) {

	/**
	 * Output the Course Description.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_template_loop_description() {
		sc_get_template( 'loop/description.php' );
	}
}
if ( ! function_exists( 'xcourse_template_loop_price' ) ) {

	/**
	 * Output the Course Price.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_template_loop_price() {
		sc_get_template( 'loop/price.php' );
	}
}
if ( ! function_exists( 'xcourse_template_loop_action_button' ) ) {

	/**
	 * Output the Course Action Button.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_template_loop_action_button() {
		sc_get_template( 'loop/action_button.php' );
	}
}
if ( ! function_exists( 'xcourse_template_course_loop_status' ) ) {

	/**
	 * Output the Course Action Button.
	 *
	 * @access public
	 * @subpackage	Loop
	 * @return void
	 */
	function xcourse_template_course_loop_status() {
		
		global $post;
		$status =  get_post_meta($post->ID,'course-status',true);
		
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
			echo '<span class="course-loop-status '.$status.'"><b>'.$status.'</b></span>';
		}
		else
		{
			echo '';
		}
		
	}
}
/* =============================================================== */
/* Single
/* =============================================================== */
if ( ! function_exists( 'xcourse_single_course_instructors' ) ) {


	function xcourse_single_course_instructors() {
		include_once( X_PLUGIN_TEMPLATE . '/single/instructors.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_selling' ) ) {


	function xcourse_single_course_selling() {
		include_once( X_PLUGIN_TEMPLATE . '/single/price.php');
	}
}
	   
if ( ! function_exists( 'xcourse_single_course_meta' ) ) {

	function xcourse_single_course_meta() {
		include_once( X_PLUGIN_TEMPLATE . '/single/meta.php');

	}
}
if ( ! function_exists( 'xcourse_single_course_description' ) ) {


	function xcourse_single_course_description() {
		include_once( X_PLUGIN_TEMPLATE . '/single/description.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_lesson' ) ) {


	function xcourse_single_course_lesson() {
			
		include_once( X_PLUGIN_TEMPLATE . '/single/lesson.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_cat_tag' ) ) {


	function xcourse_single_course_cat_tag() {
			
		include_once( X_PLUGIN_TEMPLATE . '/single/cat_tag.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_content' ) ) {


	function xcourse_single_course_content() {
		
		include_once( X_PLUGIN_TEMPLATE . '/single/content.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_images' ) ) {


	function xcourse_single_course_images() {
		
		include_once( X_PLUGIN_TEMPLATE . '/single/course-images.php');
		
	}
}
if ( ! function_exists( 'xcourse_single_course_sharing' ) ) {


	function xcourse_single_course_sharing() {
		
		include_once( X_PLUGIN_TEMPLATE . '/single/sharing.php');
		
	}
}
if ( ! function_exists( 'xcourse_post_meta' ) ) {


	function xcourse_post_meta() {
		echo '<div class="entry-meta">';
		echo spacex_post_meta();
		echo '</div>';
		
	}
}

/* =============================================================== */
/* Global
/* =============================================================== */
function xcourse_template_page_header()
{
	sc_get_template( 'global/page-header.php' );	
}
if ( ! function_exists( 'xcourse_output_content_wrapper' ) ) {

	/**
	 * Output the start of the page wrapper.
	 *
	 * @access public
	 * @return void
	 */
	function xcourse_output_content_wrapper() {
		sc_get_template( 'global/wrapper-start.php' );
	}
}
if ( ! function_exists( 'xcourse_output_content_wrapper_end' ) ) {

	/**
	 * Output the end of the page wrapper.
	 *
	 * @access public
	 * @return void
	 */
	function xcourse_output_content_wrapper_end() {
		sc_get_template( 'global/wrapper-end.php' );
	}
}

if ( ! function_exists( 'xcourse_get_sidebar' ) ) {

	/**
	 * Get the shop sidebar template.
	 *
	 * @access public
	 * @return void
	 */
	function xcourse_get_sidebar() {
		sc_get_template( 'global/sidebar.php' );
	}
}
if ( ! function_exists( 'xcourse_template_loop_thumbnail' ) ) {
	function xcourse_template_loop_thumbnail()
	{
		echo xcourse_get_product_thumbnail();
	}
}
if ( ! function_exists( 'xcourse_get_product_thumbnail' ) ) {
	function xcourse_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;
		
		if ( has_post_thumbnail() )
			sc_get_template( 'loop/thumbnail.php' );
		elseif ( sc_placeholder_img_src() )
			return sc_placeholder_img( $size );
	}
}
/**
 * Get the placeholder image URL for products etc
 *
 * @access public
 * @return string
 */
function sc_placeholder_img_src() {
	return apply_filters( 'xcourse_placeholder_img_src', SC()->plugin_url() . '/assets/images/placeholder.png' );
}

/**
 * Get the placeholder image
 *
 * @access public
 * @return string
 */
function sc_placeholder_img( $size = 'shop_thumbnail' ) {
	$dimensions = sc_get_image_size( $size );

	return apply_filters('xcourse_placeholder_img', '<img src="' . sc_placeholder_img_src() . '" alt="' . __( 'Placeholder', 'spacex' ) . '" width="' . esc_attr( $dimensions['width'] ) . '" class="spacex-placeholder wp-post-image" height="' . esc_attr( $dimensions['height'] ) . '" />', $size, $dimensions );
}

if ( ! function_exists( 'xcourse_taxonomy_archive_description' ) ) {

	/**
	 * Show an archive description on taxonomy archives
	 *
	 * @access public
	 * @subpackage	Archives
	 * @return void
	 */
	function xcourse_taxonomy_archive_description() {
		if ( is_tax( array( 'course_cat', 'course_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
			$description = wpautop( do_shortcode( term_description() ) );
			if ( $description ) {
				echo '<div class="term-description">' . $description . '</div>';
			}
		}
	}
}
if ( ! function_exists( 'xcourse_course_archive_description' ) ) {

	/**
	 * Show a shop page description on product archives
	 *
	 * @access public
	 * @subpackage	Archives
	 * @return void
	 */
	function xcourse_course_archive_description() {
		if ( is_post_type_archive( 'xcourse' ) && get_query_var( 'paged' ) == 0 ) {
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

if ( ! function_exists( 'get_course_content_file_grid' ) ) {
	function get_course_content_file_grid() {
		ob_start();
		sc_get_template_part( 'content', 'xcourse' );
		return ob_get_clean();
	}
}