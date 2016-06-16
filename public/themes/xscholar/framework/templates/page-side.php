<?php
$socials = (array) ot_get_option('tt_social_links');
$output = '';

if(is_array($socials))
{
	foreach($socials as $item)
	{
		if(isset($item['title']) && isset($item['href']))
		$output .= '"<a class=\'fa fa-'.esc_attr($item['title']).'\' href=\''.esc_attr($item['href']).'\'></a>",';
	}
}
?>
<script type="text/javascript">
	 jQuery(document).ready(function( $ ) {
		$("#page-side-wrapper").mmenu({
			"extensions": [
                  "theme-dark"
           ],
		   "counters": true,
		   "navbars": [
			  {
				 "position": "top",
				 "content": [
					"prev",
					"title",
					"close"
				 ]
			  },
			  {
				 "position": "bottom",
				 "content": [
				 	<?php echo $output?>
					//"<a class='fa fa-facebook' href='#/'></a>"
				 ]
			  }
		   ],
		   "searchfield": false
		});

		var custom_content = jQuery('#mm-custom').html();
		jQuery('.mm-opened').append(custom_content);
	 });
</script>
<?php
	$defaults = array(
		'theme_location'  => 'primary_nav',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_id'         => '',
		'echo'            => true,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 3,
		'walker'          => ''
	);
	echo '<nav id="page-side-wrapper">';

	if ( has_nav_menu( 'primary_nav' ) ) {
		wp_nav_menu( $defaults );
	}
	else
	{
		echo '<ul><li></li></ul>';
		echo '<style type="text/css" scoped>.mm-navbar.mm-navbar-top.mm-navbar-top-1 .mm-title{opacity:0}</style>';
	}



if(class_exists('SPACEX'))
{
	echo ' <div id="mm-custom">';

		if ( is_user_logged_in() )
		{
			$current_user = wp_get_current_user();
			//echo '<span class="mm-title">'.__('Hello','spacex').' '.$current_user->display_name.'</span>';
			$active_class = 'class="active"';
			$dashboard = '';
			if(isset($_GET[ 'dashboard' ] ))
			{
				$dashboard = $_GET[ 'dashboard' ];
			}
			if(isset($_GET['view_order']))
			{
				$dashboard = 'order';
			}
			if(isset($_GET['message']))
			{
				$dashboard = 'profile';
			}

		?>
		<div class="author-meta clearfix">

            <div class="user-meta">
                 <p class="user-name"><?php echo $current_user->display_name; echo '<span class="user-role">'.apply_filters('uf_current_user_role_title', '').'</span>'; ?></p>
                              <ul class="user-social-icon clearfix">
                <?php
                echo '<li><a target="_blank" href="http://twitter.com/'.get_the_author_meta( 'twitter' ).'" class="twitter"><i class="fa fa-twitter"></i></a></li>';
                echo '<li><a target="_blank" href="'.get_the_author_meta( 'facebook' ).'" class="facebook"><i class="fa fa-facebook"></i></a></li>';
                echo '<li><a target="_blank" href="'.get_the_author_meta( 'googleplus' ).'" class="google"><i class="fa fa-google-plus"></i></a></li>';
                ?>

                </ul>
            </div>
            <?php echo get_avatar( get_the_author_meta( 'email' ), 70 ); ?>


		</div>

		<span class="mm-title"><?php echo __('My Account', 'spacex');?></span>
		 <?php uf_get_current_user_manager_menu();?>
		<?php
	}

	if (is_active_sidebar('page_slide_sidebar')) {
		dynamic_sidebar('page_slide_sidebar');
	}


    echo '</div>';
}
	echo '</nav>';
