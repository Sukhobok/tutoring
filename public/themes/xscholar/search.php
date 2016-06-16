<?php get_header(); ?>



<section id="main-content" class="main-content">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
          <?php do_action('spacex_before_content');?>
          <?php    if (have_posts() ) : ?>

		<?php while (have_posts() ) : the_post(); ?>

				<?php	get_template_part( 'content', get_post_format() );?>

	        <?php endwhile;
			wp_reset_postdata();
		?>

		<?php echo the_pagination();?>
		<?php else: ?>

			<?php get_template_part( 'no-results' ); ?>

		<?php endif; ?>

         <?php do_action('spacex_after_content');?>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>