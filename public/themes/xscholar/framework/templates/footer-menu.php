<?php
	$defaults = array(
	'theme_location'  => 'footer_nav',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'container',
	'container_id'    => '',
	'menu_class'      => 'sf-menu',
	'menu_id'         => 'sf-menu',
	'echo'            => true,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 1,
);
if ( has_nav_menu( 'footer_nav' )) {
	echo '<div class="footer-menu">';
	wp_nav_menu( $defaults );
	echo '</div>';
}
?>