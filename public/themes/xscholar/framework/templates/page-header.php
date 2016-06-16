<?php 
if(is_front_page())
return;

global $post;

if(isset($post))
{
	
	$post_id = $post->ID;
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
		$type = ot_get_option('tt_page_header_type');
		$page_header_design = ot_get_option('tt_page_header_design');		
	}
	
	if((is_search() || is_archive()) && class_exists('Woocommerce') && !is_shop())	
	{
		$type = ot_get_option('tt_page_header_type');
		$page_header_design = ot_get_option('tt_page_header_design');
		
	}

}
else
{
	$type = ot_get_option('tt_page_header_type');
	$page_header_design = ot_get_option('tt_page_header_design');			
}	
if(is_home())
{
	$type = ot_get_option('tt_page_header_type');
	$page_header_design = ot_get_option('tt_page_header_design');			
}
if($type == 'no')
{
	return;
}

//page header design
echo spacex_build_design_option('.page-header-wrapper' , $page_header_design);
?>

<div class="page-header-wrapper">

<div class="container">

<!-- Page Header
===============================-->
<div class="row">
<div class="col-lg-12">

<div class="page-header page-header-type<?php echo esc_attr($type)?> clearfix">
  
	<?php 
	
	do_action( 'xcourse_before_page_header' );
	
	
	
?>
	<?php 
        do_action( 'xcourse_before_page_header_title' );
    ?>
    <h1><?php echo the_page_header_title();?></h1>
    <?php 
        do_action( 'xcourse_after_page_header_title' );
    ?>    

</div>
</div>
</div>

	<div class="xbreadcrumb-bar clearfix">
    	<?php 
		if(class_exists('bbPress') && is_bbpress())
		{
			$args = array('sep'=>'<em>/</em>');
			
			bbp_breadcrumb($args);
			
			$args2 = array('before'=>'');
			echo '<div class="right-of-breadcrumb">';
			bbp_user_subscribe_link($args2);
			echo '</div>';
		}
		else
		{
			echo the_breadcrumb();
		}
		?>
        <?php
		echo '<div class="right-of-breadcrumb">';
			if(is_post_type_archive( 'xcourse' ) || is_tax( get_object_taxonomies( 'xcourse' ) ) )
			{
       	 		xcourse_catalog_ordering();
			}
			if(is_post_type_archive( 'xevent' ) || is_tax( get_object_taxonomies( 'xevent' ) ) )
			{
       	 		xevent_catalog_ordering();
			}
		echo '</div>';	
		?>
    </div>
    
    
</div>
</div>