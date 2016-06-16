<?php
$footer_bottom = ot_get_option('tt_footer_extra');
$bottom_columns = ot_get_option('tt_footer_extra_column');

$footer_type = ot_get_option('x_footer_type');
$footer_columns = ot_get_option('x_footer_columns');

if($footer_bottom !== 'false' && $bottom_columns !== 'no')
{?>
<div class="footer-bottom">
	<div class="container">

        	
        <?php 
		$col = 4;
		if($bottom_columns == '1' || $bottom_columns == '2' || $bottom_columns == '3' || $bottom_columns == '4' || $bottom_columns == '5' || $bottom_columns == '6') 
		{
		
		$col = ($bottom_columns == 1) ? '12' : $col;
		$col = ($bottom_columns == 2) ? '6' : $col;
		$col = ($bottom_columns == 3) ? '4' : $col;
		$col = ($bottom_columns == 4) ? '3' : $col;
		$col = ($bottom_columns == 5) ? 'x5' : $col;
		$col = ($bottom_columns == 6) ? '2' : $col;
			
			for($i=1;$i<=$bottom_columns;$i++){
		?>
				<div class="col-lg-<?php echo esc_attr($col)?> col-md-<?php echo esc_attr($col)?> col-sm-<?php echo esc_attr($col)?> col-xs-12">
					<?php 
					if (is_active_sidebar('footer_bottom_widget'.$i)) {
						dynamic_sidebar('footer_bottom_widget'.$i);
					}
					 ?>
                    <div class="clearfix"></div>
                </div>
			<?php
			}
		}
		elseif($bottom_columns == '1323')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
				echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
				dynamic_sidebar('footer_bottom_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
				echo '<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">';
				dynamic_sidebar('footer_bottom_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($bottom_columns == '2313')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
			echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';			
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		elseif($bottom_columns == '1434')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		elseif($bottom_columns == '3414')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
			echo '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		elseif($bottom_columns == '141424')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget3')) {
			echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget3'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		elseif($bottom_columns == '142414')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget3')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget3'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		elseif($bottom_columns == '241414')
		{
			if (is_active_sidebar('footer_bottom_widget1')) {	
			echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget1'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget2')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget2'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
			if (is_active_sidebar('footer_bottom_widget3')) {
			echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
			dynamic_sidebar('footer_bottom_widget3'); 
			echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		?>    

    </div>
</div>
		 
<?php }
		 ?>