<?php 

				$defaults = array(
					'theme_location'  => 'top_nav',
					'menu'            => '',
					'container'       => 'nav',
					'container_class' => 'topnav',
					'container_id'    => '',
					'menu_class'      => 'sf-menu',
					'menu_id'         => 'sf-menu',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '', 
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 2,
					'walker'          => new X_Topnav_Walker
				);
				
				if ( has_nav_menu( 'top_nav' ) ) {
					wp_nav_menu( $defaults );
				}
