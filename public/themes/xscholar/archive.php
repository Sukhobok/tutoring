<?php get_header(); ?>



<section id="main-content" class="main-content display-<?php echo apply_filters('spacex_sidebar_display','')?>">
<?php do_action('spacex_before_main_content');?>
    <div class="container">
        <div class="row clearfix">
         <?php do_action('spacex_before_content');?>
          <?php get_template_part('content','loop');?>
         <?php do_action('spacex_after_content');?>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>