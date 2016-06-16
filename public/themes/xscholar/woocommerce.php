<?php get_header(); ?>


<?php 
if(!is_product())
{
do_action('spacex_before_main_content');
}
?>
<section id="main-content" class="main-content woocommerce-section">

    <div class="container">
        <div class="row clearfix">

        <?php do_action('spacex_before_content');?>
        <?php
			woocommerce_content();
		?>
         <?php do_action('spacex_after_content');?>   
         
        </div>
    </div>
    
</section>

<?php get_footer(); ?>