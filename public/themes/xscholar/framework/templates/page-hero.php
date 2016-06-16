<?php
	$hero = ot_get_option('tt_hero');
	$hero_home = ot_get_option('tt_hero_homepage');	
	
	if($hero != 'true')	
	{
		return;
	}
	if(is_front_page() && $hero_home !=='true')
	{
		return;
	}
	
	$type = ot_get_option('tt_hero_type');
	$bg_image = ot_get_option('tt_hero_bg_image');
	$bg_color = ot_get_option('tt_hero_bg_color');
	$height = ot_get_option('tt_hero_padding_height');	

	$style = array();
	
	if($bg_color != '')
	{
		$style[] = 'background-color:'.$bg_color;
	}
	
	
	if($height != '' &&  $height != '0')
	{
		$style[] = 'height:'.$height.'px';	
	}

	$style[] = 'background-attachment:fixed';		
	$style[] = 'background-position:center center';		
	$style[] = 'background-repeat:no-repeat';	
	$style[] = 'line-height:0';	
	$style[] = 'overflow: hidden';	
	$style[] = 'position: relative';	
	

?>
<div class="page-hero " style=" <?php echo implode(";", $style)?>">

<?php
if($type == 'slider')
{
$slider = ot_get_option('tt_hero_slider');
$li = '';
if (is_array($slider)) {
	
	foreach ($slider as $slide) {
		
		$li .= '<li>';
		if($slide['slide_link'] != '')
		{
			$li .= '<a href="'.esc_url($slide['slide_link']).'" title="'.esc_attr($slide['title']).'">';
		}
		$li .= '<div class="hero-overlay"></div>';
		$li .= '<img src="'.esc_attr($slide['slide_src']).'" alt="'.esc_attr($slide['title']).'"/>';
		
		if(!empty($slide['slide_content'])){
			$li .= '<div class="flex-caption"><div class="div_table"><div class="div_cell"><h1>'.esc_html($slide['title']).'</h1><h3>'.esc_html($slide['slide_content']).'</h3></div></div></div>';
		}
		if($slide['slide_link'] != '')
		{
			$li .= '</a>';
		}
		$li .= '</li>';

	}
	
}
	
	echo '<div class="page-hero-slider sc-flexslider"><ul class="slides">'.$li.'</ul></div>';
	echo '<script>	jQuery(document).ready(function() { 
	
		jQuery(".page-hero-slider").flexslider({
			animation: "fade",            
			easing: "swing",               
			controlNav: true,
			directionNav: true,
			smoothHeight: true,
			prevText: "<i class=\'fa fa-angle-left\'></i>",
			nextText: "<i class=\'fa fa-angle-right\'></i>"
		});
	}); </script>';
}
elseif($type == 'image')
{
	
$hero_url = ot_get_option('tt_hero_url');

		if($bg_image != '')
		{
			if($hero_url != '')
			{
				echo '<a href="'.esc_url($hero_url).'" title="">';
			}
			echo '<img src="'.esc_attr($bg_image).'" 	alt="">';
			
			if($hero_url != '')
			{
				echo '</a>';
			}
		}
	
}
?>
</div>