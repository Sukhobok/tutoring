<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--Favicon-->
<link href="<?php echo get_template_directory_uri()?>/images/favicon/apple-touch-icon-144.png" sizes="144x144" rel="apple-touch-icon-precomposed" />
<link href="<?php echo get_template_directory_uri()?>/images/favicon/apple-touch-icon-114.png" sizes="114x114" rel="apple-touch-icon-precomposed" />
<link href="<?php echo get_template_directory_uri()?>/images/favicon/apple-touch-icon-72.png" sizes="72x72" rel="apple-touch-icon-precomposed" />
<link href="<?php echo get_template_directory_uri()?>/images/favicon/apple-touch-icon-57.png" rel="apple-touch-icon-precomposed" />
<?php
$favicon = ot_get_option('tt_favicon') ;
if(ot_get_option('tt_favicon') == ''){
	$favicon = get_template_directory_uri() .'/images/favicon/favicon.png';
}
?>
<link href="<?php echo esc_url($favicon);?>" rel="shortcut icon" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
			var spacex_ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var spacex_base_url = '<?php echo X_BASE_URL?>';
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class('woocommerce'); ?>>
<div id="preloader">
<?php
$preload_icon = ot_get_option('tt_preload_icon');
if(empty($preload_icon))
{
	$preload_icon = get_template_directory_uri()."/images/svg-loaders/puff.svg";
}
?>
 <img src="<?php echo esc_url($preload_icon)?>" width="50" alt="">
</div>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery("#preloader").fadeOut("slow");
})
</script>

<?php do_action('spacex_popup');?>

<div class="wrapper header-<?php echo apply_filters('spacex_header_type', '')?>">

<?php do_action('spacex_before_theme_content');?>

<!-- Header
===============================-->
<?php
do_action( 'spacex_before_site_header' );

//Header design
$header_design = ot_get_option('tt_header_design');
echo spacex_build_design_option('#main-header' , $header_design);

$header_type = 'class="' . apply_filters('spacex_header_type', '').'"';

echo '<header id="main-header" '.$header_type.'>';
	spacex_template_topbar();
	echo '<div class="container">';
			echo '<div class="col-lg-12">';
					do_action( 'spacex_inner_site_header' );
			echo '</div>';
	echo '</div>';

echo '</header>';
