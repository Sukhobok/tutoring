<?php
/*
	Template Name: Homepage with Sidebar
*/
?>
<?php get_header(); ?>

<section id="main-content" class="main-content" style="margin-top:40px;">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
        	<?php do_action('spacex_before_content');?>
            
			<?php
                        
            $wishlist_page = ot_get_option('tt_wishlist_page');
            $compare_page = ot_get_option('tt_compare_page');	  
            
            if( have_posts() ) :
            
                while( have_posts() ) : the_post();
                   if(get_the_id() == $wishlist_page)
                    {
                        include_once( X_THEME_TEMPLATE .'wishlist.php');
                    }
                    elseif(get_the_id() == $wishlist_page)
                    {
                        include_once( X_THEME_TEMPLATE .'compared.php');
                    }
                    else
                    {
                        the_content();
                    }
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