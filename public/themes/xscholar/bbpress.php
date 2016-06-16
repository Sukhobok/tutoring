<?php get_header(); ?>

<section id="main-content" class="main-content">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
        	<?php do_action('spacex_before_content');?>
            
			<?php  
            
            if( have_posts() ) :
            
                while( have_posts() ) : the_post();

                        the_content();
                endwhile;
                wp_reset_postdata();
				
          	else:
				get_template_part( 'no-results' );    
            endif;        
			?>
            
         <?php do_action('spacex_after_content');?>   
        </div>
    </div>
    
</section>

<?php get_footer(); ?>