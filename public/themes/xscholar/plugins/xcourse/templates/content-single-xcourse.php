<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;
$post_id = $post->ID;


$video = get_post_meta($post_id, 'course-video', true);
$design = ot_get_option('tt_page_header_design');

$style = array();

if(isset($design['background-image']))
{
	
	if(isset($design['background-color']) && $design['background-color'] != '')
	{
		$style[] = 'background-color:'.$design['background-color'];
	}
	if(isset($design['background-image']) && $design['background-image'] != '')
	{
		$style[] = 'background-image:url('.$design['background-image'].')';
	}
	if(isset($design['background-repeat']) && $design['background-repeat'] != '')
	{
		$style[] = 'background-repeat:'.$design['background-repeat'].'';
	}
	if(isset($design['background-attachment']) && $design['background-attachment'] != '')
	{
		$style[] = 'background-attachment:'.$design['background-attachment'].'';
	}
	if(isset($design['background-position']) && $design['background-position'] != '')
	{
		$style[] = 'background-position:'.$design['background-position'].'';
	}
	$style[] = 'line-height:0';
}

if($video !== '')
{
?>

<div class="course-video" itemprop="video" <?php echo 'style="'.implode(";", $style) . '"'?>>
	<div class="container">

            <div class="col-lg-12 col-md-12- col-sm-12 col-xs-12">
            <?php
            if(strstr($video, ".mp4") || strstr($video, ".ogv") || strstr($video, ".ogg") || strstr($video, ".webm"))
            {
                echo '<video autoplay muted loop controls>';
                echo '<source src="'.esc_url($video).'" type="video/mp4">';
                echo '<source src="'.esc_url($video).'" type="video/ogv">';
                echo '<source src="'.esc_url($video).'" type="video/webm">';
                echo '  Your browser does not support the video tag.
                </video>';						
            }
			elseif(strstr($video, "youtube.com"))
			{
				echo '<iframe width="60%" height="auto" src="'.esc_url($video).'?autoplay=1" frameborder="0"></iframe>';
			}
			elseif(strstr($video, "vimeo.com"))
			{
				echo '<iframe src="//player.vimeo.com/video/'.esc_url($video).'" width="60%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			}
			else
			{
				echo __('Opp! We only support HTML5 video or video source from youtube, vimeo.','spacex');
			}
            ?>
            </div>
                <!--End Col-->            
	</div>
                <!--End Container-->    
</div>
<!--End Video-->
<?php
}
?>

<div itemscope class="single-course course-content" itemtype="course" id="course-<?php the_ID(); ?>">
	
    	<div class="container clearfix">
          
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="course-single-content clearfix">       
                    
                   <div class="sc-entry-title clearfix">

                        <h1><?php echo get_the_title()?></h1> 
                        <?php
                        if(shortcode_exists('mashshare'))
						{
					    echo '<aside class="sc-entry-sharing">';
					    
							echo do_shortcode('[mashshare]');
						
					    echo '</aside>';
					   
						}
						?>
                        
                    </div>
                    
                    <?php do_action('xcourse_after_single_course_title')?>                           
                  
                    <!--End Entry Title-->
                    
                    <?php xcourse_single_course_images();?>
                    <!--End Images-->
                    
                    <?php xcourse_single_course_content();?>
                    <!--End Entry Body-->
                    
                    <?php xcourse_single_course_lesson();?>
                    <!--End Entry Lesson-->
                    
                   
					
                    <?php //xcourse_single_course_cat_tag();?>
                    <!--Tags-->
                    <br/><br/>
					<?php 
					
						
						//Comment
						if ( comments_open() || '0' != get_comments_number() ) 
						{
							comments_template(); 
						}
					?>
			

             		 <!--End Comment Template-->
                    </div>   
                    <!--End Main Course Content-->                             
                </div>
                <!--End Col-->
               <div  id="sidebar" class="right col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="sidebar-bg right"></div>
                
                <div class="sidebar-inner">
                
                <div class="sc-entry-meta">
                 <?php echo getPostLikeLink(get_the_ID()); ?>
					<?php
					
					xcourse_single_course_description();
					xcourse_single_course_meta();
					xcourse_single_course_selling();
					xcourse_single_course_instructors();
	
					if (is_active_sidebar('course_sidebar')) {
						echo '<div class="course-sidebar">';
						dynamic_sidebar('course_sidebar');
						echo '</div>';
					}
					
					?>
                </div>
                
			
                <!--End Instructor-->
                                           
                </div>
                 </div>
                <!--End Col-->
                
               
        </div> 
                <!--End Container-->        
           
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #course-<?php the_ID(); ?> -->
                <!--End Course-->
<?php //do_action( 'woocommerce_after_single_product' ); ?>
