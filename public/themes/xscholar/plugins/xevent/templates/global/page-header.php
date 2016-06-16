<?php 

global $post;


if(isset($post))
{
	
	$post_id = $post->ID;
	$style = array();
	$type = '';
	$align = '';
	$color = '';
	
	if (class_exists('Woocommerce')) {
	
	if ( is_shop() ) {
	
		$post_id =  woocommerce_get_page_id( 'shop' );
		
	} else if ( is_product_category() || is_product_tag() ) {
	
		$post_id =  woocommerce_get_page_id( 'terms' );
		
	} else if ( is_cart() ) {
	
		$post_id =  woocommerce_get_page_id( 'cart' );
		
	} else if ( is_checkout() ) {
	
		$post_id =  woocommerce_get_page_id( 'checkout' );
	}
	}
	
	$follow = get_post_meta($post_id,'tt_page_header_type_follow',true);
	
	if($follow == 'false')
	{
		$type = get_post_meta($post_id,'tt_page_header_type',true);
		$page_header_design = get_post_meta($post_id,'tt_page_header_design',true);
	}
	else
	{
		$type = xt_get_option('tt_page_header_type');
		$page_header_design = xt_get_option('tt_page_header_design');		
	}
	
	if((is_search() || is_archive()) && class_exists('Woocommerce') && !is_shop())	
	{
		$type = xt_get_option('tt_page_header_type');
		$page_header_design = xt_get_option('tt_page_header_design');
		
	}

}
else
{
	$type = xt_get_option('tt_page_header_type');
	$page_header_design = xt_get_option('tt_page_header_design');			
}	
if(is_home())
{
	$type = xt_get_option('tt_page_header_type');
	$page_header_design = xt_get_option('tt_page_header_design');			
}
if($type == 'no')
{
	return;
}

//page header design
echo spacex_build_design_option('.page-header-wrapper' , $page_header_design);
?>

<div class="page-header-wrapper" style=" <?php echo esc_attr($style)?>">

<div class="container">

<!-- Page Header
===============================-->
<div class="row">
<div class="col-lg-12">

<div class="page-header page-header-type<?php echo esc_attr($type)?> clearfix">
  
	<?php 
	
	do_action( 'xevent_before_page_header' );
	
	$page_title = '';
	
	if(is_search())
	{
		$page_title = __('Search results for:', 'spacex') .' '. get_search_query();
	} 
	elseif(is_home())
	{ 
		$page_title = xt_get_option('tt_blog_title')=='' ? 'Blog' : xt_get_option('tt_blog_title');
		//the_breadcrumb();
	 }
	
	elseif(is_page())
	{ 
		$page_title = get_the_title();
		//the_breadcrumb();
	} 
	elseif(is_home() && !is_front_page())
	{ 
		$page_title = get_the_title();
		//the_breadcrumb();
	} 
	elseif(is_404())
	{ 
		$page_title = __('Sorry, your page was not found!', 'spacex');
	} 
	elseif(is_archive() && get_post_type()=='xevent')
	{
		$page_title = __('All Events','spacex');
	}
	elseif(is_singular('speaker'))
	{
		$page_title = __('Speaker','spacex');
		//the_breadcrumb();	
	}
	elseif(is_event_category())
	{
		$page_title = '<span>'.__('Category','spacex').'</span>'.single_cat_title("", false);
		//the_breadcrumb();
	} 
	elseif(is_event_tag())
	{
		$page_title = '<span>'.__('Tag','spacex').'</span>'.single_tag_title("", false );
		//the_breadcrumb();	
	} 
?>
<?php 
	do_action( 'xevent_before_page_header_title' );
?>
	<h1><?php echo apply_filters('xevent_page_header_title', $page_title);?></h1>
<?php 
	do_action( 'xevent_after_page_header_title' );
?>    

</div>
</div>
</div>


</div>
</div>