
        
<div class="main-menu-wrapper">
			<?php do_action( 'spacex_before_main_menu' );?>
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
					wp_nav_menu( $defaults );
					echo '<div class="select-nav select_wrapper"><span class="select_trigger">Select Menu</span><div class="select_dropdown"></div></div>';
					
				?>
                <?php do_action( 'spacex_after_main_menu' );?>
                  
            </div>

</div>
