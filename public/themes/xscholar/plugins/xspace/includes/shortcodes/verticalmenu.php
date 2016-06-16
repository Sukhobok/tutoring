<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Vertical Menu
/* ---------------------------------------------------------------------- */
add_shortcode('verticalmenu', 'spacex_shortcode_verticalmenu');

function spacex_shortcode_verticalmenu( $atts, $content = null ) { 

	$output = $el_class = '';
	
	extract(shortcode_atts(array(
		'el_class'			=> '',
		'perpage'			=> '',
		'orderby'			=> '',
		'order'				=> '',
	), $atts));
	
	
	              $defaults = array(
					'theme_location'  => 'vertical',
					'menu'            => '',
					'container'       => 'nav',
					'container_class' => 'expand',
					'container_id'    => 'vertical_menu',
					'menu_class'      => 'sf-menu',
					'menu_id'         => '',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '', 
					'link_after'      => '',
					'items_wrap'      => '<h3 class="vertical_menu_title">'.__('SHOP BY CATEGORY', 'spacex').'</h3><ul id="%1$s" class="%2$s sf-vertical">%3$s</ul>',
					'depth'           => 3,
					'walker'          => new XWalker
				);
				
				if ( has_nav_menu( 'vertical' ) ) {
					 wp_nav_menu( $defaults );
				}

}