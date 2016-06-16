<?php
$credit = ot_get_option('x_footer_credit');

if($credit !== 'true')
return;

	$defaults = array(
	'theme_location'  => 'footer_nav',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => '',
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

?>
<div class="footer-credit">
	<div class="container">
    	<div class="clearfix">
		<div id="copyright">
        <?php
		

		$copyright = ot_get_option('x_footer_copyright');
		if(!empty($copyright))
		{
			echo $copyright;
		}
        ?>
   
        </div>
        <?php
		$social = ot_get_option('x_footer_social');
		if($social == 'true')
		{
			echo do_shortcode('[socialicons]');
		}
        ?>
    </div>
    </div>
</div>