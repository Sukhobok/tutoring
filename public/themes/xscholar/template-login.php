<?php
/*
	Template Name: Login Page
*/
?>
<?php get_header(); ?>



<section id="main-content" class="main-content blog">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
		 <?php do_action('spacex_before_content');?>
        	
	      <?php echo do_shortcode('[loginform]');?>
            
         <?php do_action('spacex_after_content');?>
        
        </div>
    </div>
    
</section>

<?php get_footer(); ?>