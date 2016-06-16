	<?php
		/**
		 * xevent_before_main_content hook
		 *
		 * @hooked xevent_output_content_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'xevent_before_main_content' );
	?>        
		<?php 

			if ( have_posts() ) : ?>

				<?php do_action('xevent_before_event_loop'); ?>

				<?php xevent_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php xt_get_template_part( 'content', 'xevent' ); ?>

					<?php endwhile;  // end of the loop. ?>

				<?php xevent_loop_end(); ?>

				<?php do_action('xevent_after_event_loop'); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-xevents.php' ); ?>

			<?php endif;?>
			
      <?php
		/**
		 * xevent_after_main_content hook
		 *
		 * @hooked xevent_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'xevent_after_main_content' );
	?>
