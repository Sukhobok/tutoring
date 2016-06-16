<?php
/**
 * spacex Template Functions
 *
 *
 * @author 		spacex
 * @package 	Framework/includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if ( ! function_exists( 'spacex_switcher_style' ) ) {

	function spacex_switcher_style()
	{
		include_once(X_BASE_DIR . 'framework/templates/switcher.php');
	}
}

if ( ! function_exists( 'spacex_header_widget' ) ) {

	function spacex_header_widget()
	{
		include_once(X_BASE_DIR . 'framework/templates/header-widget.php');
	}
}

if ( ! function_exists( 'spacex_mobile_menu_trigger' ) ) {

	function spacex_mobile_menu_trigger()
	{
		echo '<a class="mobile-menu-trigger" href="#page-side-wrapper" rel="nofollow"><i class="fa fa-bars"></i></a>';
	}
}
if ( ! function_exists( 'spacex_user_login_trigger' ) ) {

	function spacex_user_login_trigger()
	{
		include_once(X_BASE_DIR . 'framework/templates/user-trigger.php');
	}
}

if ( ! function_exists( 'spacex_simple_search_form' ) ) {

	function spacex_simple_search_form()
	{
		?>
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) )?>" class="simple-search-form">
			<label class="screen-reader-text" for="s"><a href="#"><i class="fa fa-search"></i></a></label>
			<input type="text" value="<?php echo get_search_query()?>" name="s" class="s" />
			<input type="submit" class="searchsubmit" value="<?php echo esc_attr__( 'Search', 'spacex' )?>" />
			<input type="hidden" name="post_type" value="course" />
		</form>	
        <?php
	}
}
function x_paginate_links() {
	$output = '';
	$output .= '<div class="pagination">';
	$output .= paginate_links();
	$output .= '</div>';
	return $output;
}


/* ---------------------------------------------------------------------- */
/*	Template Sharing Icons
/* ---------------------------------------------------------------------- */
function spacex_sharing_social_template()
{
	global $product;
	$socials = array();
	$socials[] = 'facebook';
	$socials[] = 'twitter';	
	$socials[] = 'google';	
	$socials[] = 'pinterest';	
	$socials[] = 'linkedin';	
	$socials[] = 'tumblr';		
	
	$social_link = array();
	foreach($socials as $social)
	{
		$social_key = 'tt_social_' . $social;
		$check = ot_get_option($social_key);
		
		if($check == 'true')
		{
			$social_link[$social] = ot_get_option($social_key . '_link');
		}
		else
		{
			$social_link[$social] = '';
		}
	}
	
	$output = '<ul class="sharing-social">';
	
		$output .= '<li class="sharing-facebook"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='.get_permalink( get_the_ID() ).'"> <i class="fa fa-facebook"></i> <span>Share on Facebook</span></a></li>';
		$output .= ' <li class="sharing-twitter"><a target="_blank" href="http://twitter.com/share?url='. get_permalink( get_the_ID() ).'&text=Simple Share Buttons"> <i class="fa fa-twitter"></i><span>Twitter</span></a></li>';
		$output .= '  <li class="sharing-googleplus"><a target="_blank" href="https://plus.google.com/share?url='.get_permalink( get_the_ID() ).'"> <i class="fa fa-google-plus"></i><span>G Plus</span></a></li>';
		$output .= ' <li class="sharing-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='. get_permalink( get_the_ID() ).'"> <i class="fa fa-linkedin"></i><span>Linkedin</span></a> </li>';
		$output .= '<li class="sharing-pinterest"><a target="_blank" href="javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());"> <i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>';
		$output .= ' <li class="sharing-tumblr"><a target="_blank" href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink(get_the_ID() )).'&name='.urlencode(get_the_title(get_the_ID() )).'"> <i class="fa fa-tumblr"></i><span>Tumblr</span></a> </li>';
                        	
                           
	$output .= '</ul>';
	
	echo $output;

}
/* ---------------------------------------------------------------------- */
/*	Template Topbar Menu
/* ---------------------------------------------------------------------- */
function spacex_template_topbar_menu()
{
	include_once(X_BASE_DIR . 'framework/templates/topbar-menu.php');
}
/* ---------------------------------------------------------------------- */
/*	Template Header Cart
/* ---------------------------------------------------------------------- */
function spacex_template_header_cart()
{
	global $woocommerce;

	if (class_exists('Woocommerce')) {
		
  	$cart_type = ot_get_option('tt_header_cart_type');
					 
?>
                  <div id="mini-cart-header"> 
                    	<div class="header-cart">
                
                        	<div class="header-cart-inside <?php echo esc_attr($cart_type)?>">
                            <div class="cart-list">
                            <div class="cart-list-inner">
                            <?php global $woocommerce;?> 
  									<?php if ($woocommerce->cart->cart_contents_count == 0) {
										echo '<p class="cart-empty">'.__('No products in the cart.','woocommerce').'</p>';
										?> 
									<?php } else { ?> 
										<div class="cart-loading"></div>
									<?php } ?>
                            </div>    
                            </div>    
                            
                    
 	<?php
   
	switch($cart_type)
	{
		case 'default':
			echo '<span class="css-cart-strap"></span><a class="cart-contents style-text" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'woothemes').'">';
			echo '<div class="mini-cart-text">';
			echo $woocommerce->cart->cart_contents_count;
			echo '</div>';
			
		break;
		case 'bag':
			echo ' <a class="cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'woothemes').'">';
			$cart_icon = ot_get_option('tt_header_cart_icon');
			if(empty($cart_icon))
			{
				echo '<img src="'.get_template_directory_uri().'/images/shopping_bag.png" alt="" class="mini-cart-icon" />';
			}
			else
			{
				echo '<img src="'.$cart_icon.'" alt="" class="mini-cart-icon" />';				
			}
    
			echo '<span class="mini-cart-count">';
			echo $woocommerce->cart->cart_contents_count;
			echo '</span>';
			
		break;
	}
	?>               
    <!--
    -->
   
    
</a>

</div>
                        </div>
                    </div>
                    

<?php }
}

/* ---------------------------------------------------------------------- */
/*	Footer
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'spacex_template_footer_extra' ) ) {

	function spacex_template_footer_extra()
	{
		include_once( X_BASE_DIR . 'framework/templates/footer-extra.php');
	}
}
if ( ! function_exists( 'spacex_template_footer_credit' ) ) {

	function spacex_template_footer_credit()
	{
		include_once( X_BASE_DIR . 'framework/templates/footer-credit.php');
	}
}


function the_page_header_title()
{
	global $woocommerce;
	$page_title = '';
	
	if(is_search())
	{
		$page_title = __('Search results for:', 'spacex') .' '. get_search_query();
	} 
	elseif(is_home())
	{ 
		$page_title = ot_get_option('tt_blog_title')=='' ? 'Blog' : ot_get_option('tt_blog_title');
	 }
	elseif(class_exists('Woocommerce') && (is_shop() || is_cart() || is_checkout()))
	{
		if(is_cart())
		{
		
			$page_title = __('Cart', 'spacex');        
		}
        elseif(is_checkout())
        {
			$page_title = __('Check out', 'spacex');        
       	}
		elseif(is_shop())
        {
			$page_title = __('Shop', 'spacex');        
       	}

	}
	
	elseif(is_page())
	{ 
		$page_title = get_the_title();
	} 
	elseif(is_home() && !is_front_page())
	{ 
		$page_title = get_the_title();
	} 
	
	elseif(class_exists('Woocommerce') && is_product_category())
	{
		$page_title = '<span>'.__('Category','spacex').'</span>'.single_cat_title("", false);
	} 
	elseif(class_exists('Woocommerce') && is_product_tag())
	{
		$page_title = '<span>'.__('Tag','spacex').'</span>'.single_tag_title("", false );
	} 	
	elseif(is_archive() && get_post_type()=='xcourse')
	{
		$page_title = __('All Courses','spacex');
	}
	elseif(is_single() && get_post_type()=='instructor')
	{
		$page_title = __('Instructor','spacex');
	}
	elseif(class_exists('XCOURSE') && is_course_category())
	{
		$page_title = '<span>'.__('Category','spacex').'</span>'.single_cat_title("", false);
	} 
	elseif(class_exists('XCOURSE') && is_course_tag())
	{
		$page_title = '<span>'.__('Tag','spacex').'</span>'.single_tag_title("", false );
	} 
	elseif(is_archive() && get_post_type()=='xevent')
	{
		$page_title = __('All Events','spacex');
	}
	elseif(is_single() && get_post_type()=='speaker')
	{
		$page_title = __('Speaker','spacex');
	}
	elseif(class_exists('XEVENT') && is_event_category())
	{
		$page_title = '<span>'.__('Category','spacex').'</span>'.single_cat_title("", false);
	} 
	elseif(class_exists('XEVENT') && is_event_tag())
	{
		$page_title = '<span>'.__('Tag','spacex').'</span>'.single_tag_title("", false );
	} 
	elseif(is_post_type_archive('xgallery'))
	{
		$page_title = __('Gallery','spacex');		
	}
	elseif(is_single())
	{ 
		$page_title = get_the_title();
	} 
	elseif(is_404())
	{ 
		$page_title = __('Sorry, your page was not found!', 'spacex');
	}
	elseif(class_exists('bbPress') && is_bbpress())
	{
		$page_title = __('Forums', 'spacex');		
	}
	
	
	$user_action = get_query_var( 'uf' );
	switch ($user_action)
	{
		case 'user-action':
			$page_title = __('Login','spacex');
		break;
		case 'user-login':
			$page_title = __('Login','spacex');
		break;
		case 'user-error':
			$page_title = __('Ops! Something went wrong.','spacex');	
		break;
		case 'user-profile':
			$page_title = __('Dashboard','spacex');
		break;
		case 'user-register':
			$page_title = __('Register','spacex');
		break;
		case 'user-reset-password':
			$page_title = __('Reset your password','spacex');
		break;
		case 'user-forgot-password':
			$page_title = __('Forgot password','spacex');
		break;
	}
	
	
	return $page_title;
}
/* ---------------------------------------------------------------------- */
/*	The Breadcrums
/* ---------------------------------------------------------------------- */
if( !function_exists( 'the_breadcrumb' ) ) {

    function the_breadcrumb( $delimiter = '' ) {
	
        global $post;

		$delimiter = ' <em>/</em> ';
		
		
        $home = __( 'Home', 'spacex' ); 
		
        $before = '<span class="current">';
        $after = '</span>';
        
        echo '<div id="spacex-breadcrumb" itemprop="breadcrumb">';
        
        $homeLink = site_url();
        
        if( !is_home() && !is_front_page() )
            echo '<a class="home" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        
        if ( is_single() ) {
		
             $post = get_post( $post->ID );
			
			if (class_exists('Woocommerce') && ( is_product() || is_singular( 'xgallery' ))) {
				

				$terms = get_the_terms( $post->ID, 'product_cat' );
			
						
				if(is_singular( 'xgallery' ))
				{
					$terms = get_the_terms( $post->ID, 'xgallery-categories' );
				}
				if ( $terms && ! is_wp_error( $terms ) ){

					$cats = array();
				
					foreach ( $terms as $term ) {
						$cats[] =  '<a href="'.get_term_link( $term ).'" title="'.__('View all posts in','spacex').' '.$term->name.'" rel="category tag">'.$term->name.'</a>';
					}
										
					$xcats = join( ", ", $cats );
					echo $xcats;
					echo $delimiter.' ';
				}
			}
			elseif (class_exists('XCOURSE') && ( is_course() )) {
				

				$terms = wp_get_post_terms( $post->ID, 'course_cat' );
				
				if ( $terms && ! is_wp_error( $terms ) ){

					$cats = array();
				
					foreach ( $terms as $term ) {
						$cats[] =  '<a href="'.get_term_link( $term ).'" title="'.__('View all posts in','spacex').' '.$term->name.'" rel="category tag">'.$term->name.'</a>';
					}
										
					$xcats = join( ", ", $cats );
					echo $xcats;
					echo $delimiter.' ';
				}
			}
			elseif (class_exists('XEVENT') && ( is_event() )) {
				

				$terms = wp_get_post_terms( $post->ID, 'event_cat' );
				
				if ( $terms && ! is_wp_error( $terms ) ){

					$cats = array();
				
					foreach ( $terms as $term ) {
						$cats[] =  '<a href="'.get_term_link( $term ).'" title="'.__('View all posts in','spacex').' '.$term->name.'" rel="category tag">'.$term->name.'</a>';
					}
										
					$xcats = join( ", ", $cats );
					echo $xcats;
					echo $delimiter.' ';
				}
			}
			elseif(is_singular( 'post' ))
			{
				$cat = get_the_category(); 
				$cat = $cat[0];
				if( !empty( $cat ) ) {
					echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
				}
			}
  
            echo $before . get_the_title() . $after;
        } elseif ( is_category() ) {
                global $wp_query;
				
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ( $thisCat->parent != 0 ) 
                echo get_category_parents( $parentCat, true, ' ' . $delimiter . ' ' );
            
            echo $before . sprintf( __( 'Archive by category "%s"', 'spacex' ), single_cat_title( '', false ) ) . $after;
         } elseif ( is_day() ) {
            echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'd' ) . $after;
        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link( get_the_time( 'Y'  )) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'F' ) . $after;
        } elseif ( is_year() ) {
            echo $before . get_the_time( 'Y' ) . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object( get_post_type() );
                $slug = $post_type->rewrite;
                
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];

                if( !empty( $cat ) ) {
                    echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
                }

                echo $before . get_the_title() . $after;
            }
        } 
		elseif ( is_tax('product_cat') || is_tax('portfolio-categories')) {
			 
			 	 $post_type = get_post_type_object( get_post_type() );

				 echo $before . $post_type->labels->singular_name . $after .' '. $delimiter .' '. $before .single_cat_title( '', false ) . $after;
            
        }
		elseif ( is_tax('course_cat') || is_tax('course_tag')) {
			 
			 	 $post_type = get_post_type_object( get_post_type() );

				 echo $before . $post_type->labels->singular_name . $after .' '. $delimiter .' '. $before .single_cat_title( '', false ) . $after;
            
        }
		elseif ( is_tax('event_cat') || is_tax('event_tag')) {
			 
			 	 $post_type = get_post_type_object( get_post_type() );

				 echo $before . $post_type->labels->singular_name . $after .' '. $delimiter .' '. $before .single_cat_title( '', false ) . $after;
            
        }
		elseif ( is_attachment() ) {
            $parent = get_post( $post->post_parent );

            if( $parent->post_type == 'page' || $parent->post_type == 'post' ) {
                $cat = get_the_category( $parent->ID ); $cat = $cat[0];
                echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
            }

            echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            echo $before . ucfirst( strtolower( get_the_title() ) ) . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while ( $parent_id ) {
                $page = get_page( $parent_id );
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            
            $breadcrumbs = array_reverse( $breadcrumbs );
            foreach ( $breadcrumbs as $crumb ) 
                { echo $crumb . ' ' . $delimiter . ' '; }
                
           echo $before . get_the_title() . $after;
        } 
		 elseif ( is_search() ) {
            echo $before . sprintf( __( 'Search results for "%s"', 'spacex' ), get_search_query() ) . $after;
        } elseif ( is_tag() ) {
            echo $before . sprintf( __( 'Posts tagged "%s"', 'spacex' ), single_tag_title( '', false ) ) . $after;
        }  elseif ( class_exists('Woocommerce') && is_product_tag()) {
            echo $before . sprintf( __( 'Product tagged "%s"', 'spacex' ), single_tag_title( '', false ) ) . $after;
        } 	elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            
            echo $before . sprintf( __( 'Articles posted by %s', 'spacex' ), $userdata->display_name ) . $after;
        } elseif ( is_404() ) {
            echo $before . __( 'Error 404', 'spacex' ) . $after;
        } elseif( is_home() ) {
            echo $before . apply_filters( 'spacex_posts_page_breadcrumb', __( 'Home', 'spacex' ) ) . $after;
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			 	$post_type = get_post_type_object( get_post_type() );
				echo $before . $post_type->labels->singular_name . $after;
		}		
        
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
                { echo ' ('; }
            
            echo $before . __( 'Page', 'spacex' ) . ' ' . get_query_var( 'paged' ) . $after;
            
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
                { echo ')'; }
        }
		
		$user_action = get_query_var( 'uf' );
		switch ($user_action)
		{
			case 'user-action':
				echo __('Login','spacex');
			break;
			case 'user-login':
				echo __('Login','spacex');
			break;
			case 'user-error':
				echo __('Ops! Something went wrong.','spacex');	
			break;
			case 'user-profile':
				echo __('Dashboard','spacex');
			break;
			case 'user-register':
				echo __('Register','spacex');
			break;
			case 'user-reset-password':
				echo __('Reset your password','spacex');
			break;
			case 'user-forgot-password':
				echo __('Forgot password','spacex');
			break;
		}
        
        echo '</div>';
    }
}
/* ---------------------------------------------------------------------- */
/*	The Pagination
/* ---------------------------------------------------------------------- */
if( !function_exists('the_pagination')) {

	function the_pagination($pages = '', $range = 1)
	{  
		 $pagination = "";
		 $item = ($range * 2)+1;  
	
		 global $paged;
		 if(empty($paged)) $paged = 1;
	
		 if($pages == '')
		 {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages)
			 {
				 $pages = 1;
			 }
		 }   
	
		 if(1 != $pages)
		 {
			 $pagination .= "<div class='pagination'><ul class='clearfix'>";
			 if($paged > 2 && $paged > $range+1 && $item < $pages) $pagination .= "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
			 if($paged > 1 && $item < $pages) $pagination .= "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
	
			 for ($i=1; $i <= $pages; $i++)
			 {
				 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $item ))
				 {
					 $pagination .= ($paged == $i)? "<li><a class='disable'>".$i."</a></li>" : "<li><a href=".get_pagenum_link($i).">".$i."</a></li>";
				 }
			 }
	
			 if ($paged < $pages && $item < $pages) $pagination .= "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $item < $pages) $pagination .= "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
			 $pagination .= "</ul></div>\n";
		 }
		 
		 return $pagination;
	}
}
function pagination_nav() {
    global $wp_query;
 
    if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
<?php }
}

/* ---------------------------------------------------------------------- */
/*	Template for comments and pingbacks
/* ---------------------------------------------------------------------- */
if( !function_exists('spacex_comments')) {

	function spacex_comments($comment, $args, $depth) {
		
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>	
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'spacex' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'spacex' ), ' ' ); ?></p>
		<?php
				break;
			default :
		?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        
		<div class="comments clearfix">
                    <div class="avatar"><?php echo get_avatar( $comment, 50 ); ?></div>
                    <div class="comment-des">
                      <div class="comment-by"><strong><?php printf( __('%s', 'spacex'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></strong> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time><i class="fa fa-clock-o"></i>
								<?php printf( __( '%1$s at %2$s', 'spacex' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a></div>
                      <div><?php if ( $comment->comment_approved == '0' ) : ?>
						<p><em><?php _e('Your comment is awaiting moderation.', 'spacex'); ?></em></p>
					<?php endif; ?>
					
					<?php comment_text(); ?>
					
					</div>
                    <span class="reply"><?php comment_reply_link( array_merge( array('before' => '<i class="fa fa-comment-o"></i>'), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?><?php edit_comment_link( __( 'Edit', 'spacex' ), '<i class="fa fa-edit"></i>' ); ?></span>
                    </div>
                  </div> 
		</li>

		<?php  
				break;
		endswitch;
	} 

} 
/* ---------------------------------------------------------------------- */
/*	Modify Defaut Comment Form
/* ---------------------------------------------------------------------- */ 

function spacex_comments_form( $defaults ) {
	global $current_user;
    get_currentuserinfo();
	
	$commenter = wp_get_current_commenter();

	$req = get_option( 'require_name_email' );

	$aria_req = ( $req ? " aria-required='true' required" : '' );

	$defaults['fields']['author'] = '<p>' .
					 '<input id="author" name="author" type="text"  placeholder="Your Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';

	$defaults['fields']['email'] = '<p>' .
					'<input id="email" name="email" type="text"  placeholder="Your Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';

	$defaults['fields']['url'] = ''; // '<p>' . '<input id="url" name="url" type="text" placeholder="Your Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
	  
	$logged = '';			  
	if(is_user_logged_in())
	{
		$logged = 'logged';
	}
	$defaults['comment_field'] = '<p class="comment-textarea '. $logged .'">' .
								 '<textarea class="message-contact-form" name="comment" placeholder="Comment" aria-required="true" required></textarea></p>';

	$defaults['comment_notes_before'] = '';
	
	$defaults['comment_notes_after'] = '';	
	
	
	$defaults['logged_in_as'] = '<p class="logged-in-as">'.get_avatar( '$comment', 32 ).'<span class="author-name">'. $current_user->display_name.'</span></p>';
	
	$defaults['cancel_reply_link'] = ' - ' . __( 'Cancel reply', 'spacex' );

	$defaults['title_reply'] = __( '<h3 class="comment-title">'.__('Leave a comment', 'spacex').'</h3>', 'spacex' );
	
	$defaults['id_form'] = 'commentform';
	
	$defaults['id_submit'] = 'submit';
	$defaults['class_submit'] = 'btn-flat '.$logged; 
	$defaults['id_reset'] = 'reset';

	return $defaults;

}
add_filter('comment_form_defaults', 'spacex_comments_form');

function spacex_search_form()
{
	
$output = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '" class="vs_search_form"><div class="inside clearfix">
			<label class="screen-reader-text" for="s"><i class="fa fa-search"></i></label>
			';
			

$output .= spacex_build_dropdown_product_categories();

$output .='			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Enter Keyword...', 'woocommerce' ) . '" class="vs-product-keyword" /><input type="hidden" value="0" name="product_cat" id="cat" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
			<input type="hidden" name="post_type" value="xcourse" />
			<div class="intruction-search">'.$description.'</div>
		<div class="spacex_ajax_vs_search_result">
		</div>
		</div>
	</form>';



	$filter_result = 'formatResult: resultFormat,';

wp_enqueue_script( 'ajaxsearch',  	X_BASE_URL . 'js/autocomplete.js',  array('jquery'), false, true );


$output .='

<script type="text/javascript">
jQuery(document).ready(function() {
	
 function resultFormat (row, i, num) {
            var result = \'<div class="autocomplete-image">\' + row["image"] + \'</div><div class="autocomplete-title">\' + row["value"] + \'</div><div class="autocomplete-price">\' + row["price"] + \'</div>\';
            return result;
        }
		
    jQuery(\'.vs-product-keyword\').autocomplete({
        minChars: 2,
		params: {product_cat: jQuery(\'#cat\').val()},
		appendTo: \'.spacex_ajax_vs_search_result\',
        serviceUrl: woocommerce_params.ajax_url + \'?action=spacex_ajax_search_products\',
		'.$filter_result.'
      	onSearchStart: function(q){
			q.product_cat = jQuery("#cat").val();
            jQuery(this).css(\'background\', \'url('.X_BASE_URL.'/images/ajax-loader.gif) no-repeat right center\');
			jQuery(this).css(\'background-size\', \'24px 24px\');
			jQuery(".spacex_ajax_vs_search_result").removeClass(\'result_show\');
        },
        onSearchComplete: function(){
            jQuery(this).css(\'background\',\'none\');
			jQuery(".spacex_ajax_vs_search_result").addClass(\'result_show\');
			
        },
        onSelect: function (suggestion) {
            if( suggestion.id != -1 ) {
                window.location.href = suggestion.url;
            }
        }
		
    });

	
	
});
</script>';	
		
	return $output;	
}
/* ---------------------------------------------------------------------- */
/*	Blog
/* ---------------------------------------------------------------------- */
function spacex_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	
	
	if(is_page_template( 'template-blog-fullwidth.php' ) )
	{
		?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
        <?php
		the_post_thumbnail('full');
		?>
        </a>
        <?php
		return;
	}
	
	
	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
	<?php
		if ( is_singular('xgallery')) {
			the_post_thumbnail( array(800,700) );
		}
		 else {
			the_post_thumbnail( array(800,600) );
		}
	?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
	<?php
		
		if (is_tax( 'xgallery-categories' )) {
			the_post_thumbnail( array(800, 600) );
		} else {
			the_post_thumbnail(array(800,600));
		}
	
	?>
	</a>

	<?php endif; // End is_singular()

}
function spacex_post_thumbnail_video() {
	
	global $post;
	$video = get_post_meta($post->ID,'_format_video_embed', true);
	echo do_shortcode($video);
}
function spacex_post_thumbnail_audio() {
	
	global $post;
	$audio = get_post_meta($post->ID,'_format_audio_embed', true);
	echo do_shortcode($audio);
}
function spacex_post_thumbnail_gallery() {
	
	global $post;
	
	$attachment_ids = array();
	$attachment_ids = get_post_meta($post->ID,'_format_gallery',true);
	$attachment_ids = (array) explode( ',', $attachment_ids );

	if($attachment_ids)
	{
	echo '<div class="entry-gallery sc-flexslider">';
		echo '<ul class="slides">';
		
			foreach($attachment_ids as $attachment_id)	
			{
				
				$image = wp_get_attachment_image( $attachment_id, 'full' );
				echo '<li>'.$image.'</li>';
			}
			
		echo '</ul>';
	echo '</div>';
	}

}
function spacex_post_thumbnail_link() {
	
	global $post;
	$audio = get_post_meta($post->ID,'_format_audio_embed', true);
	echo do_shortcode($audio);
}

function spacex_post_thumbnail_quote() {
	
	global $post;
	
	$source_name = get_post_meta($post->ID,'_format_quote_source_name', true);
	$source_url = get_post_meta($post->ID,'_format_quote_source_url', true);	
	$source_title = get_post_meta($post->ID,'_format_quote_source_title', true);	
	$source_date = get_post_meta($post->ID,'_format_quote_source_date', true);		
		
	echo do_shortcode('[blockquote sourcename="'.$source_name.'" sourceurl="'.$source_url.'" sourcetitle="'.$source_title.'" sourcedate="'.$source_date.'"]');
}


function spacex_post_categories_blog() {
	
	global $post;
	$post_categories = wp_get_post_categories( $post->ID );
	$cats = array();
	
	$li = '';	
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$li .=  '<li><a href="'.get_category_link( $cat->cat_ID ).'" title="'.__('View all posts in','spacex').' '.$cat->name.'" rel="category tag">'.$cat->name.'</a></li>';
	}
	
	$output = '<ul class="post-categories">';
	$output .= $li;
	$output .='</ul>';
	
	return $output;
}

/* ---------------------------------------------------------------------- */
/*	The Post Date Time
/* ---------------------------------------------------------------------- */

if( !function_exists('spacex_posted_on')) {

	function spacex_posted_on() {

		return '<span class="month">'.esc_attr( get_the_date('M') ).'</span>'.'<span class="date">'.esc_attr( get_the_date('d') ).'</span>'.'<span class="year">'.esc_attr( get_the_date('Y') ).'</span>' ;

	}

}

/* ---------------------------------------------------------------------- */
/*	The Post Meta
/* ---------------------------------------------------------------------- */

if( !function_exists('spacex_post_meta')) {

	function spacex_post_meta($icon_post_type = NULL) {

		global $post;
		$output = '';
			
				$output .= '<span><i class="fa fa-clock-o"></i>'.spacex_posted_on().' </span>';
				$output .= '<span><a class="post_author" href=""><i class="fa fa-user"></i>'.get_the_author().'</a> </span>';
				if ( comments_open() || ( '0' != get_comments_number() && !comments_open() ) )
					$output .= '<span><a class="post_comment" title="Comment on ' . get_the_title() . '" href="' . get_comments_link() . '"><i class="fa fa-comment-o"></i>' . get_comments_number() . ' '.__('Comments', 'spacex').'</a></span>';

		return $output;

	}

}



 if ( ! function_exists( 'spacex_build_design_option' ) ) {

	function spacex_build_design_option($class , $design)
	{
		$output = '';
		$style = array();
		if(isset($design['font-color']) && $design['font-color'] != '')
		{
			$style[] = 'color:'.$design['font-color'].'!important';
		}
		if(isset($design['background-color']) && $design['background-color'] != '')
		{
			$style[] = 'background-color:'.$design['background-color'];
		}
		if(isset($design['background-image']) && $design['background-image'] != '')
		{
			$style[] = 'background-image:url('.$design['background-image'].')';
		}
		if(isset($design['background-repeat']) && $design['background-repeat'] != '')
		{
			$style[] = 'background-repeat:'.$design['background-repeat'].'';
		}
		if(isset($design['background-attachment']) && $design['background-attachment'] != '')
		{
			$style[] = 'background-attachment:'.$design['background-attachment'].'';
		}
		if(isset($design['background-position']) && $design['background-position'] != '')
		{
			$style[] = 'background-position:'.$design['background-position'].'';
		}
		
		if(isset($design['border-type']) && $design['border-type'] != '')
		{
			$style[] = 'border-style:'.$design['border-type'];	
		}
		if(isset($design['border-color']) && $design['border-color'] != '')
		{
			$style[] = 'border-color:'.$design['border-color'];	
		}
		if(isset($design['border-top']) && $design['border-top'] != '')
		{
			$style[] = 'border-top-width:'.$design['border-top'].'px';	
		}
		if(isset($design['border-bottom']) && $design['border-bottom'] != '')
		{
			$style[] = 'border-bottom-width:'.$design['border-bottom'].'px';	
		}
		if(isset($design['border-left']) && $design['border-left'] != '')
		{
			$style[] = 'border-left-width:'.$design['border-left'].'px';	
		}
		if(isset($design['border-right']) && $design['border-right'] != '')
		{
			$style[] = 'border-right-width:'.$design['border-right'].'px';	
		}
			
		if(isset($design['padding-top']) && $design['padding-top'] != '')
		{
			$style[] = 'padding-top:'.$design['padding-top'].'px';	
		}
		if(isset($design['padding-bottom']) && $design['padding-bottom'] != '')
		{
			$style[] = 'padding-bottom:'.$design['padding-bottom'].'px';	
		}
		if(isset($design['padding-left']) && $design['padding-left'] != '')
		{
			$style[] = 'padding-left:'.$design['padding-left'].'px';	
		}
		if(isset($design['padding-right']) && $design['padding-right'] != '')
		{
			$style[] = 'padding-right:'.$design['padding-right'].'px';	
		}
		
		if(isset($design['margin-top']) && $design['margin-top'] != '')
		{
			$style[] = 'margin-top:'.$design['margin-top'].'px';	
		}
		if(isset($design['margin-bottom']) && $design['margin-bottom'] != '')
		{
			$style[] = 'margin-bottom:'.$design['margin-bottom'].'px';	
		}
		if(isset($design['margin-left']) && $design['margin-left'] != '')
		{
			$style[] = 'margin-left:'.$design['margin-left'].'px';	
		}
		if(isset($design['margin-right']) && $design['margin-right'] != '')
		{
			$style[] = 'margin-right:'.$design['margin-right'].'px';	
		}
		
		if(count($style) > 0)
		{
			$output .= '<style type="text/css" scoped>';
			$output .= $class.'{'.implode(";", $style).'}';
			
			$color = '';
			if($design['schema'] == 'black')
			{
				$color = '#333';
			}
			else
			{
				$color = '#fff';
			}
			$output .= $class.' a{color:'.$color.'}';
			$output .= $class.' h1{color:'.$color.'}';			
			$output .= $class.' h2{color:'.$color.'}';	
			$output .= '</style>';
		}
		return $output;			
	
	}
	
}


function get_excerpt_max_charlength($charlength) {
	
	$excerpt = get_the_excerpt();
	$charlength++;
	$output = '';
	
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$output .= mb_substr( $subex, 0, $excut );
		} else {
			$output .= $subex;
		}
		//$output .= '[...]';
	} else {
		$output .= $excerpt;
	}
	
	return $output;
}

function x_template_redirect() {
	global $wp_query, $wp, $post;

	// When default permalinks are enabled, redirect shop page to post type archive url
	if (class_exists('Woocommerce') && ! empty( $_GET['page_id'] ) && get_option( 'permalink_structure' ) == "" && $_GET['page_id'] == wc_get_page_id( 'shop' ) ) {
		wp_safe_redirect( get_post_type_archive_link('xcourse') );
		exit;
	}
	
	// User Dashboard
	elseif (class_exists('Woocommerce') && is_page( wc_get_page_id( 'myaccount' ) ) ) {
		wp_safe_redirect( home_url( '/user-profile' ) );
		exit;
	}
	
	// If product is used for course or event dont display it
	elseif (class_exists('Woocommerce') && is_product() && is_product_used_for_course()) {
		
		$product = wc_get_product( $wp_query->post );
		$course_id = get_course_by_product_id($post->ID);
		wp_safe_redirect( get_permalink( $course_id ));
		exit;
	}
	// If product is used for course or event dont display it
	elseif (class_exists('Woocommerce') && is_product() && is_product_used_for_event()) {
		
		$product = wc_get_product( $wp_query->post );
		$event_id = get_event_by_product_id($post->ID);
		wp_safe_redirect( get_permalink( $event_id ));
		exit;
	}

	// Redirect to the product page if we have a single product
	/*elseif (class_exists('Woocommerce') && is_search() && is_post_type_archive( 'product' ) && apply_filters( 'woocommerce_redirect_single_search_result', true ) && $wp_query->found_posts == 1 ) {
		$product = wc_get_product( $wp_query->post );

		if ( $product->is_visible() ) {
			wp_safe_redirect( get_permalink( $product->id ), 302 );
			exit;
		}
	}
*/
}
add_action( 'template_redirect', 'x_template_redirect' );