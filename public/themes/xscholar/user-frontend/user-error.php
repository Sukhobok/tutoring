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

        <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<p><?php echo apply_filters( 'uf_error_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' ); ?></p>
            
        </div>
        </div>

    </div>
    
</section>

<?php get_footer(); ?>
