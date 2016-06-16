<?php get_header(); ?>



<section id="main-content" class="main-content">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
        <div class="col-lg-12">

       <?php get_template_part( 'no-results' ); ?>
        
          
         
        </div>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>