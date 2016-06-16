<?php get_header(); ?>
<section id="page-content" class="single-post tax_gallery">
<?php do_action('spacex_before_main_content');?>
    <div class="container">

		 <?php do_action('spacex_before_content');?>  

			<?php sc_get_template( 'archive-xgallery.php' );?>
		
        
 <?php do_action('spacex_after_content');?>
        </div>
    
</section>

<?php get_footer(); ?>        
