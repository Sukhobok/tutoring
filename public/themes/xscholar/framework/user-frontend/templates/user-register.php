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

         
			<form id="register-form" action="<?php echo uf_get_action_url( 'register' ); ?>" method="post">
            
            	<?php echo apply_filters( 'uf_register_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' ); ?>
            	<?php if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) echo "Please complete the CAPTCHA." ?>
                
				<?php wp_nonce_field( 'register', 'wp_uf_nonce_register' ); ?>
				<div class="inner-user-form">
				<table class="form-table">
					<tr>
						<th><label for="user_login"><?php _e( 'Username', 'spacex' ); ?></label><span class="description"> <?php _e( '*' ,'spacex'); ?></span></th>
						<td><input type="text" name="user_login" id="user_login" class="regular-text" /></td>
					</tr>
					<tr>
						<th><label for="email"><?php _e( 'E-mail', 'spacex' ); ?> <span class="description"><?php _e( '*' ,'spacex'); ?></span></label></th>
						<td><input type="text" name="email" id="email" class="regular-text" /></td>
					</tr>
                     
                      <?php 
					  //Captcha
					  if( function_exists( 'cptch_display_captcha_custom' ) ) { ?>
                      
                      <tr>
						<th><label for="cntctfrm_contact_action"><?php _e( 'Captcha', 'spacex' ); ?> <span class="description"><?php _e( '*' ,'spacex'); ?></span></label></th>
						<td><input type='hidden' name='cntctfrm_contact_action' value='true' /><?php echo cptch_display_captcha_custom(); ?></td>
					  </tr>
                     
					  
					  <?php }?>
                      
                      
				</table>
				
              
                
				<input type="submit" name="submit" id="submit" value="<?php _e( 'Register', 'user-frontend-td' ); ?>">
                
                 <p class="login-register">
                    <label><?php echo __('if you are member', 'spacex');?></label>
					<?php	$loginurl = sprintf( '<a href="%s" class="button">%s</a>', esc_url( home_url( '/user-login/' ) ), __( 'Login','spacex' ) );
						/** This filter is documented in wp-includes/general-template.php */
						echo apply_filters( 'login', $loginurl ); ?>
                  </p>   
                    
				</div>
			</form>

        

    </div>
    
</section>

<?php get_footer(); ?>
