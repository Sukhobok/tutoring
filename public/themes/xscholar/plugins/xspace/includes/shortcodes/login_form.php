<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Login Form
/* ---------------------------------------------------------------------- */
add_shortcode('loginform', 'spacex_shortcode_loginform');

function spacex_shortcode_loginform( $atts, $content = null ) { 

	$output = $el_class = '';
	
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'register'			=> '',
		'css_animation'			=> '',
		
	), $atts));
	
	$el_class .= xgetCSSAnimation($css_animation);	
	
	$output .= '<form id="loginform" action="'.uf_get_action_url( 'login' ).'" method="post" class="'.$el_class.'">';
            
  
                    
	$output .= apply_filters( 'login_form_top', '', uf_login_form_args() );
                
    $output .= '<div class="inner-user-form">';
	
	  $output .= apply_filters( 'uf_login_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' );
                 
	$output .= wp_nonce_field( 'login', 'wp_uf_nonce_login', true, false );
	
	$output .= isset( $_GET[ 'redirect_to' ] ) ? '<input type="hidden" name="redirect_to" value="' . esc_url( $_GET[ 'redirect_to' ] ) . '">' : ''; 
	
	$output .= '<p class="login-username">';
	$output .= '<label for="user_login">'. __( 'Username', 'user-frontend-td' ).'</label>';
	$output .= '<input type="text" name="user_login" id="user_login" placeholder="'.__('Username','spacex').'">';
	$output .= '</p>';
	
	$output .= '<p class="login-password">
					<label for="user_pass">'. __( 'Password', 'user-frontend-td' ).'</label>
					<input type="password" name="user_pass" id="user_pass" placeholder="'.__('Password','spacex').'">
				</p>';
		
                
    $output .= apply_filters( 'login_form_middle', '', uf_login_form_args() );
	
	$output .= '<p class="login-button">
					<input type="submit" name="submit" id="submit" value="'. __( 'Submit', 'user-frontend-td' ).'">
				</p>
                <p class="login-footer">
                 <label class="login-remember" for="rememberme"><input type="checkbox" name="rememberme" id="rememberme">'.__( 'Remember Me', 'user-frontend-td' ).'</label>
                    <a class="user_forgot" href="'. home_url( '/user-forgot-password/' ).'">'. __( 'Forgot Password?', 'user-frontend-td' ).'</a>
                </p>';
                
     
					if ( get_option( 'users_can_register') /*&& ( is_multisite() && get_site_option( 'registration' ) != 'none' ) */) :
						$output .= '<p class="login-register">
						<label>'. __('or you can', 'spacex').'</label>';
						
						$registration_url = sprintf( '<a class="button" href="%s">%s</a>', esc_url( home_url( '/user-register/' ) ), __( 'Register', 'spacex' ) );
						
							/** This filter is documented in wp-includes/general-template.php */
						$output .= apply_filters( 'register', $registration_url );
						
						$output .= '</p>';    
					
					endif;
				
                    
                
                
                $output .= '</div>';
				$output .= apply_filters( 'login_form_bottom', '', uf_login_form_args() );
				
	$output .= '</form>';
	
	return $output;

}
