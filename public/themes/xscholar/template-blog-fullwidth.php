<?php
/*
	Template Name: Blog Fullwidth
*/
?>
<?php get_header(); ?>



<section id="main-content" class="main-content blog-flat">
<?php 
 if ( !is_single() ) :
do_action('spacex_before_main_content');
endif;
?>
    <div class="container">
        <div class="row clearfix">
		 <?php
		 if ( !is_single() ) :
		  do_action('spacex_before_content');
		  endif;
		  ?>
          	
            
            <?php

if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
global $query_string;
	$args = array(
		'numberposts'     => '',
		'posts_per_page' => get_option('posts_per_page'),
		'offset'          => 0,
		'cat'        =>  '',
		'orderby'         => 'date',
		'order'           => 'DESC',
		'include'         => '',
		'exclude'         => '',
		'meta_key'        => '',
		'meta_value'      => '',
		'post_type'       => 'post',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'paged'				=> $paged,
		'post_status'     => 'publish'
	);
$blog = new WP_Query( $args );
	
	if ( $blog->have_posts() ) : ?>
	
		<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
            
        	 		
		<?php	get_template_part( 'content', get_post_format() );?>
            
            
            
        <?php endwhile;
		wp_reset_postdata();
	?>
	
		<?php echo the_pagination($blog->max_num_pages);?>
	
	<?php else: ?>
	
		<?php get_template_part( 'no-results' ); ?>
	
	<?php endif; ?>
            
            
            
            
            
            
            
            
            
            
            
            
         <?php do_action('spacex_after_content');?>
        
        </div>
    </div>
    
</section>

<?php get_footer(); ?>