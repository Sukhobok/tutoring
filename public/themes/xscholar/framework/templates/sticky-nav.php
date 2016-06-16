<?php

	echo '<div id="sticky-nav" class="'.ot_get_option('tt_header_sticky_type').'">';
	
	echo '<div class="container">';
	echo '<div class="col-lg-12">';
	?>
    <?php spacex_mobile_menu_trigger()?>
    <?php
	$logo = ot_get_option('tt_header_sticky_logo');	
	
	if(!empty($logo))
	{
		echo '<div id="sticky-logo"><a href="'.esc_url( home_url( '/' ) ).'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'" class="sticky-logo"></a></div>';
	}
	
	
	?>
            
<div class="main-menu-wrapper">
			
            	<?php

				$defaults = array(
					'theme_location'  => 'primary_nav',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => 'main-menu',
					'container_id'    => '',
					'menu_class'      => 'sf-menu',
					'menu_id'         => '',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 3,
					'walker'          => new XWalker
				);
				
				if ( has_nav_menu( 'primary_nav' ) )
				{
					wp_nav_menu( $defaults );

				}
					
				?>
                <?php spacex_simple_search_form();?>
                  
       

</div>

    <?php
	
	if ( has_nav_menu( 'primary_nav' ) )
				{
			
					
					echo '<div class="select-nav select_wrapper"><span class="select_trigger">Select Menu</span><div class="select_dropdown"></div></div>';
				}
				
				
	echo '</div>';
	echo '</div>';
	echo '</div>';
	


?>