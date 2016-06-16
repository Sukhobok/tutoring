<!-- Footer
===============================-->
<?php
$footer_type = ot_get_option('x_footer_type');
$footer_columns = ot_get_option('x_footer_columns');

//Footer design
$footer_design = ot_get_option('x_footer_design');		
echo spacex_build_design_option('footer' , $footer_design);
?>

<footer class="<?php echo esc_attr($footer_type)?>">

<?php do_action('spacex_before_footer');?>
 <div class="container">  
<?php
if($footer_columns !== 'no')
{
		$footer_right_col = '12';
        $footer_intro = ot_get_option('x_footer_intro');
		
		if($footer_intro !== 'false')
		{
			$footer_right_col = '8';
		}
		
		if($footer_intro == 'left')
		{
		?>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div  id="footer-about" class="main-footer-left">	                	
		<?php
		$footer_intro_content = ot_get_option('x_footer_content');	
		if(!empty($footer_intro_content))
		{
			echo do_shortcode($footer_intro_content);
		}
?>
	
        </div>
         </div>
         
         <?php
		 
		}
		 ?>
        <div class="col-lg-<?php echo esc_attr($footer_right_col)?> col-md-<?php echo esc_attr($footer_right_col)?> col-sm-<?php echo esc_attr($footer_right_col)?> col-xs-12">
        <div class="row  main-footer-right">
        <?php 
		$col = 4;
		if($footer_columns == '1' || $footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4'|| $footer_columns == '5'|| $footer_columns == '6') 
		{
		
		$col = ($footer_columns == 1) ? '12' : $col;
		$col = ($footer_columns == 2) ? '6' : $col;
		$col = ($footer_columns == 3) ? '4' : $col;
		$col = ($footer_columns == 4) ? '3' : $col;
		$col = ($footer_columns == 5) ? 'x5' : $col;
		$col = ($footer_columns == 6) ? '2' : $col;		
			
		for($i=1;$i<=$footer_columns;$i++){
		?>
			<div class="col-lg-<?php echo esc_attr($col)?> col-md-<?php echo esc_attr($col)?> col-sm-<?php echo esc_attr($col)?> col-xs-12"><?php if (is_active_sidebar('footer_widget'.$i)) { dynamic_sidebar('footer_widget'.$i); } ?><div class="clearfix"></div></div>
            
       <?php }
	   
         }
		elseif($footer_columns == '1323')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '2313')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';			
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '1434')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '3414')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '141424')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget3')) {
				echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				dynamic_sidebar('footer_widget3'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '142414')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget3')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget3'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
		}
		elseif($footer_columns == '241414')
		{
			if (is_active_sidebar('footer_widget1')) {
				echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				dynamic_sidebar('footer_widget1'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget2')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget2'); 
				echo '<div class="clearfix"></div>';
				echo '</div>';
			}
			if (is_active_sidebar('footer_widget3')) {
				echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				dynamic_sidebar('footer_widget3'); 
				echo '<div class="clearfix"></div>';
			echo '</div>';
			}
		}
		 ?>
      </div>
      </div>
      
  
 <?php
 
		if($footer_intro == 'right')
		{
		?>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div  id="footer-about" class="main-footer-left">	                	
		<?php
		$footer_intro_content = ot_get_option('x_footer_reseller_content');	
		if(!empty($footer_intro_content))
		{
			echo do_shortcode($footer_intro_content);
		}
		?>
	
        </div>
         </div>
         
         <?php
		 
		}
}

?>  
      </div>
      <!--End Footer Container-->

      
	<?php do_action('spacex_after_footer');?>

  </footer>
  <!-- End Footer-->
</div>
<?php wp_footer(); ?>
</body>
</html>