<div class="header-inside clearfix">

<div id="logo">

		<?php
		$logo_type = ot_get_option('tt_logo_type');
		$logo_text = ot_get_option('tt_logo_text');
        $logo_image = ot_get_option('tt_logo_image');
		
        if($logo_type == 'image')
        {
            echo '<div class="logo-wrapper"><a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo('name').'"><img src="'.$logo_image.'" alt="'.get_bloginfo('name').'" class="logo-image"/></a></div>';
        }
        elseif($logo_type == 'text')
        {
            echo '<div class="text-logo"><a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo('name').'">'.$logo_text.'</a></div>';
        }
		else
		{
		     echo '<div class="logo-wrapper"><a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo('name').'"><img src="'.get_template_directory_uri() .'/images/logo.png" alt="'.get_bloginfo('name').'" /></a></div>';	
			
			 	
		}
	

	
        ?>
        

</div>
 <?php do_action( 'spacex_after_logo' );?> 