<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); 

			the_content();
	
	endwhile; ?>


<?php else: ?>
<?php get_template_part( 'no-results' ); ?>

<?php endif; ?>