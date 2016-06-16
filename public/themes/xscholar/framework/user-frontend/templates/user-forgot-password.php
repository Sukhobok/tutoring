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

         
			<?php echo apply_filters( 'uf_forgot_password_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' ); ?>

			<form action="<?php echo uf_get_action_url( 'forgot_password' ); ?>" method="post">
				<?php wp_nonce_field( 'forgot_password', 'wp_uf_nonce_forgot_password' ); ?>
				<p>
					<?php _e( 'Please enter your username or email address. You will receive a link to create a new password via email.','spacex' ) ?>
				</p>
				<p>
					<label for="user_login"><?php _e( 'Username or E-mail:','spacex' ); ?></label>
					<input type="text" name="user_login" id="user_login">
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="<?php _e( 'Get New Password','spacex' ); ?>">
				</p>
			</form>
        
    </div>
    
</section>

<?php get_footer(); ?>
