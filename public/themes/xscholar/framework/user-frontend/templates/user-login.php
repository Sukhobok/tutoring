<?php
if ( is_user_logged_in() ) {
	wp_safe_redirect( home_url( '/user-profile/' ) );
	exit;
}
?>
<?php get_header(); ?>

<section id="main-content" class="main-content">
<?php do_action('spacex_before_main_content');?>
    <div class="container">

          	
			<?php echo do_shortcode('[loginform]');?>
        

    </div>
    
</section>

<?php get_footer(); ?>


