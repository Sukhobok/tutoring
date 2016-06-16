	<?php
		/**
		 * xcourse_before_main_content hook
		 *
		 * @hooked xcourse_output_content_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'xcourse_before_main_content' );
	?>        
		<?php 

			if ( have_posts() ) : ?>

				<?php do_action('xcourse_before_course_loop'); ?>

				<?php xcourse_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php sc_get_template_part( 'content', 'xcourse' ); ?>

					<?php endwhile;  // end of the loop. ?>

				<?php xcourse_loop_end(); ?>

				<?php do_action('xcourse_after_course_loop'); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-courses.php' ); ?>

			<?php endif;?>
			
      <?php
		/**
		 * xcourse_after_main_content hook
		 *
		 * @hooked xcourse_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'xcourse_after_main_content' );
	?>
