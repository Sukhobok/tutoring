
<div class="header-widget">
<!--User manager widget-->
<?php

$header_user = ot_get_option('tt_header_user_manager');
if($header_user == 'true')	
{
	$echo_trigger = '';
	$echo_content = '';	
	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();
		$echo_trigger .= get_avatar( get_the_author_meta( 'email' ), 30 );
		$echo_trigger .= $current_user->display_name;
	}
	else
	{
		$echo_trigger = __('Login','spacex');
	}
	
 ?>

<div id="user-trigger" class="select_wrapper pinned">
	<span class="select_trigger"><?php echo $echo_trigger?></span>
    	
		<?php
		if ( is_user_logged_in() ) {
			echo '<div class="select_dropdown">';
        	uf_get_current_user_manager_menu();
		}
		else
		{
			echo '<div class="select_dropdown login-form">';
			echo do_shortcode('[loginform]');
		}
		?>
        </div>
</div>
<?php }?>

<!--End user manager widget-->

<!--Header text widget-->
<?php
$header_text_widgets = ot_get_option('tt_header_text');
$text_widgets = ot_get_option('tt_header_text_widget');

if(is_array($text_widgets) && $header_text_widgets =='true')
{
	echo '<div class="header-text-widget">';
	foreach($text_widgets as $text)
	{
		echo '<div class="text-widget-item">';
			echo '<i class="fa '.$text['icon'].'"></i>';
			
			echo '<div class="text-widget-excerpt">';
				echo '<span>'.$text['title'].'<br />'.'</span>';
				echo $text['description'];
			echo '</div>';	
			
		echo '</div>';
	}
	echo '</div>';
}
?>
<!--End header text widget-->
</div>
<!--End header widget-->