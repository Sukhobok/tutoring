<?php
/*
	Template Name: Homepage
*/

?>
<?php get_header(); ?>

<section id="main-content" class="main-content home">
<?php do_action('spacex_before_main_content');?>
  		<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); 
			
					the_content();

				endwhile; ?>

		<?php else: ?>
		<?php get_template_part( 'no-results' ); ?>

		<?php endif; ?>
    
</section>

<?php get_footer(); ?>