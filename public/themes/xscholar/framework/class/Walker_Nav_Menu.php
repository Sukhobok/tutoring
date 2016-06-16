<?php
/* ---------------------------------------------------------------------- */
/*	Walker Main Nav
/* ---------------------------------------------------------------------- */ 
class XWalker extends Walker_Nav_Menu
{
	 function start_lvl(&$output, $depth = 0, $args = array()){
	
        $display_depth = ($depth + 1);
		
        if($display_depth == '1')
		{ 
			$class_names = 'sf-mega';
		}
		else 
		{
			$class_names = 'sf-column';
		}
		
        $indent = str_repeat("\t", $depth);
		 $output .= "\n" . $indent . '<div class="' . $class_names . '">'."<ul>\n";

    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0) {
		
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		

		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'menu-depth-' . $depth;
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		
		if($depth==1)
		{
			$background = 'background-image:url('.$item->image.');';
			$background .= 'background-repeat:no-repeat;';
			$background .= 'background-position:right bottom;';
			$output = str_replace('<div class="sf-mega">', '<div class="sf-mega" style="'.$background.'"><span></span>',$output);
		}
		
		
		$output .= $indent;
		$output .= '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	
		
		
		if ( has_nav_menu( 'primary_nav' ) ) {
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			if(!empty($item->icon) && $item->icon !== 'none')
			{
				$item_output .= '<i class="menu-icon fa '.$item->icon.'"></i>';
			}
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}	
  } 
}

/* ---------------------------------------------------------------------- */
/*	Walker Main Nav
/* ---------------------------------------------------------------------- */ 
class X_Topnav_Walker extends Walker_Nav_Menu
{


    function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0) {
		
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		
		
		
		$output .= $indent;
		$output .= '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	
		if ( has_nav_menu( 'top_nav' ) || has_nav_menu( 'short_nav' ) ) {
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			if(!empty($item->icon) && $item->icon != 'none')
			{
				$item_output .= '<i class="menu-icon fa '.$item->icon.'"></i>';
			}
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}	
  } 
}