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

         
			<?php echo apply_filters( 'uf_activation_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' ); ?>

			<form action="<?php echo uf_get_action_url( 'activation' ); ?>" method="post">
				<?php wp_nonce_field( 'activation', 'wp_uf_nonce_activation' ); ?>

				<p>
					<?php _e( 'Please enter your key.', 'spacex' ) ?>
				</p>
				<p>
					<label for="user_key"><?php _e( 'Key:', 'spacex' ); ?></label>
					<input type="text" name="user_key" id="user_key" value="<?php echo isset( $_GET[ 'key' ] ) ? $_GET[ 'key' ] : ''; ?>">
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="<?php _e( 'Activate','spacex' ); ?>">
				</p>
			</form>
        
        </div>
    
</section>

<?php get_footer(); ?>

