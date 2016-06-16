<?php

$banner = ot_get_option('tt_pop_up_banner');
$text = ot_get_option('tt_pop_up_text');
$background = ot_get_option('tt_pop_up_background');
$height = ot_get_option('tt_pop_up_height');
$width = ot_get_option('tt_pop_up_width');
$color = ot_get_option('tt_pop_up_color');
$donotshow = ot_get_option('tt_pop_up_donot');
if(empty($donotshow))
{
	$donotshow = 'Do not show this again!';
}

?>
<div class="spacex_popup_wrapper open">
	<div class="popup_overlay"></div>
	<div class="popup_container">
    	<div class="popup_inside">
        	<div class="popup_close">x</div>
            <div class="popup_content">
            
            	<?php
                if(!empty($banner))
				{
					echo '<div class="popup_banner"><img src="'.esc_attr($banner).'" alt=""/></div>';
				}
				?>
                <?php
                if(!empty($text))
				{
					echo '<div class="popup_text">';
					echo do_shortcode( $text );
					echo '</div>';
				}
				?>
                <div class="clearfix"></div>
              
            </div>
            <!--End Popup Content-->
        </div>
       <!--End Popup Inside--> 
         <form class="hidden_popup_checkbox">
                <input type="checkbox" value="true" class="hidden_popup" name="hidden_popup"/>
                <label class="donot"><?php echo $donotshow;?></label>
         </form>
    </div>
   <!--End Popup Container--> 
</div>
<!--End Popup Wrapper-->
<script>
jQuery(document).ready(function() {

	jQuery(".popup_close").click(function(){
		jQuery('.spacex_popup_wrapper').remove().animate({opacity:'0'});	
	});
	jQuery(".popup_overlay").click(function(){
		
		if(jQuery('.spacex_popup_wrapper').hasClass('open'))
		{
			jQuery('.spacex_popup_wrapper').remove().animate({opacity:'0'});	
		}
		
	});
	
	 jQuery('input.hidden_popup').click(function(){
		 
			var popup_visible = 'show';
			if(jQuery(this).is(':checked'))
			{
				popup_visible = 'hidden';
			}
			
			 jQuery.ajax({
				type: 'POST',
				url: spacex_ajaxurl,
				data: {
					action: 'hidden_popup',
					visible: popup_visible,
					
				},
				success: function( response ) {

				}
			});
     })
	
});
</script>
<style id="popup" type="text/css" scoped>
<?php
  if(!empty($banner))
  {
	  echo '.popup_text{padding-left:53%;}';
  }
?>
.spacex_popup_wrapper form.hidden_popup_checkbox {position:absolute; bottom:10px;}

.popup_container
{
	<?php
		$res_width = $width;
		if(!empty($height))
		{
			echo 'height:'.$height.'px;';
			$height = $height/2;
			echo 'margin-top:-'.$height.'px;';
		}
		if(!empty($width))
		{
			echo 'width:'.$width.'px;';
			$width = $width/2;
			echo 'margin-left:-'.$width.'px;';
		}
		if(!empty($color))
		{
			echo 'color:'.$color.' !important;';
		}
		
		if(isset($background['background-color']) && !empty($background['background-color']))
		{
			echo 'background-color:'.$background['background-color'].';';
		}
		if(isset($background['background-attachment']))
		{
			echo 'background-attachment:'.$background['background-attachment'].';';
		}
		if(isset($background['background-image']))
		{
			echo 'background-image:url('.$background['background-image'].');';
		}
		if(isset($background['background-position']))
		{
			echo 'background-position:'.$background['background-position'].';';
		}
		if(isset($background['background-repeat']))
		{
			echo 'background-repeat:'.$background['background-repeat'].';';
		}
	?>
}
<?php
if(!empty($color))
{
	echo '.popup_container h1, 
.popup_container h2,
.popup_container h3,
.popup_container h4,
.popup_container h5,
.popup_container h6{color: '.$color.'}';
}

if(empty($res_width))
{
	$res_width = '600';
}
?>

@media (max-width: 759px) {
	.popup_container
	{
		width:<?php echo $width?>px;
		height:<?php echo $height?>px;
		margin-top:-<?php echo $height/2?>px;
		margin-left:-<?php echo $width/2?>px;;
	}
}
</style>