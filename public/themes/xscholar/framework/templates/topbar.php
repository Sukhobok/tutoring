<?php
$topbar = ot_get_option('tt_header_topbar');
if($topbar == 'false')
{
	return;
}
//topbar design
$topbar_design = ot_get_option('tt_topbar_design');	
echo spacex_build_design_option('#topbar' , $topbar_design);
?>
<div id="topbar">
    <div class="container clearfix">
			<div class="col-lg-12">
                <div class="left-topbar">

					<?php 
          if (is_active_sidebar('left_topbar_sidebar')) {
            dynamic_sidebar('left_topbar_sidebar');
          }
          ?>
                    
                </div>
        
               <div class="right-topbar">
                    <div class="right-tb-content">
                  
					           <?php 
                      if (is_active_sidebar('right_topbar_sidebar')) {
                        dynamic_sidebar('right_topbar_sidebar');
                      }
                     ?>
     
                     </div>  
               </div>
		</div>
    </div>
</div>