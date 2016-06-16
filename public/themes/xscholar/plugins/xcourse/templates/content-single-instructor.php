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

?>

<div itemscope class="single-instructor" itemtype="instructor" id="instructor-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    	<div class="row">
        
             
      
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                	<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    	 <div class="instructor-thumbnail">
								<?php
                                 echo get_the_post_thumbnail($post_id, array('260', '260'));
                                ?>
                              
                           </div>
                           <!--End Thumbnail-->
                            <div class="instructor-meta clearfix">
                         	<?php                  
									$meta = get_post_meta($post_id,'instructor-meta',true);
									$list = '';
									
									if(is_array($meta))
									{
									echo '<ul class="course-meta list-style">';
									foreach($meta as $item)
									{
										$label = $item['title'];
										$desc = $item['description'];
										$icon = '';
										if($item['icon'] != '')
										{
											$icon = '<i class="fa '.esc_attr($item['icon']).'"></i>';
										}
										echo '<li class="clearfix"><b class="label">'.$icon.$label.'</b><span>'.$desc.'</span></li>';		

									
									}
									
									echo '</ul>';
									
									
									}
									//End Social Icon
									?> 
                         </div>
                    	<!--End meta-->
                            
                    </div>
                	<!--End left of instructor-->
                    <div id="main-instructor-content" class="col-lg-8 col-md-8 col-xs-12 col-sm-8">
                    	
                                     
                    <div class="instructor-detail">
                      <?php
					  
					$level = get_post_meta($post_id,'instructor-level',true);
					  
                    echo '<div class="instructor-name"><h2>' . get_the_title() . '</h2>';
					
					if(!empty($level))
					{
						echo '<p>'.$level.'</p>';
					}
					echo '</div>';
					?>
                    
                   <?php                  
					$social_icons = get_post_meta($post_id,'instructor-social',true);
					$list = '';
					
					if(is_array($social_icons))
					{
					echo ' <div class="instructor-social clearfix">';
					//echo ' <h2 class="course-heading"><span>More Info</span></h2>';
					foreach($social_icons as $icon)
					{
						$title = $icon['title'];
						$name = $icon['name'];
						$link = $icon['href'];
						
						if(!empty($title))
						{
							$list .= '<li><a href="'.esc_url($link).'"><i class="fa fa-'.esc_attr($title).'"></i></a></li>';
						}
					
					}
					
					echo '<ul class="social-icons" role="tablist">'.$list.'</ul>';
					
					
					echo '</div><!-- End Entry Social -->';
					}
					//End Social Icon
					?> 
		
				
                	<div class="instructor-content">
                    <?php
                    the_content();
					?>
                    </div>

                    
                    </div>
                    <!--End Detail-->
                                        
                   <?php
                    
				$about = get_post_meta($post->ID,'instructor-about',true);
				if(is_array($about))
				{
					echo '<div class="instructor-about">';
					echo '<div class="timeline"></div>';
					foreach($about as $lesson)
					{
						$title = $lesson['title'];
						$desc = $lesson['instructor-description'];
						$icon = $lesson['icon'];	
									
						echo ' <div class="timeline-instructor">';
						
						if(!empty($icon))
						{
							echo '<span class="tli-icon"><i class="fa '.esc_attr($icon).'"></i></span>';
						}
						echo ' <h3>'.$title.'</h3>';
				
						echo '<div class="panel-content">'.$desc.'</div>';
						echo '</div>';
					}
					echo '</div><!-- End Entry About -->';	
				}
				
				?>
                <!--End About-->
               

                    </div>
       					 <!--End right of instructor-->
                    </div>     
                </div>
                <!--End Col-->
                
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="sidebar">
                
     			<div class="course-by-instructor">
                    
                   
                    <?php
					$course_pag = isset( $_GET['course_page'] ) ? (int) $_GET['course_page'] : 1;
                    $args = array(
						'post_type'  => 'xcourse',
						'posts_per_page' 	=> 4,
						'paged'	=> $course_pag,
						'orderby'         => 'date',
						'order'           => 'DESC',
						'meta_key'        => 'course-instructor',
						'meta_value'      => $post_id,
						'meta_compare'      => 'LIKE',
						'post_status'     => 'publish',
						'ignore_sticky_posts' => true,
					);
					
					 
					$query_course = new WP_Query( $args );
				
					if ( $query_course->have_posts() ) :
						?>
                        <aside>
                         <h3 class="widget-title"><span><?php echo __('Course by','spacex')?> <?php echo get_the_title();?></span></h3>
                        <?php
						
						
						
						
						
						
						
						
			 echo '<ul class="product_list_widget course-list">';
				 while ( $query_course->have_posts() ) : $query_course->the_post(); 	
				
						echo '<li>';
						
						
						
						echo '<a href="'.esc_url( get_permalink($post->ID) ).'" title="'.get_the_title($post->ID).'">';
						echo get_the_post_thumbnail($post->ID, array(240,240));
						echo get_the_title($post->ID);	
						echo '</a>';
						
						//$cat_count = sizeof( get_the_terms( $post->ID, 'course_cat' ) );
					//	echo get_xcourse_categories($post->ID, '<span class="posted_in">' . _n( '', 'Categories:', $cat_count, 'spacex' ), '</span>' ); 
						
						echo xcourse_get_price() . '  &nbsp;&nbsp; ' . xcourse_get_enroll_members();
						
						//echo '<div class="course-excerpt">'.get_post_meta($post->ID,'course-description',true).'</div>';
						
						echo '</li>';
		
				endwhile;
			
			echo '</ul>';

						
						wp_reset_postdata(); 
						
						 $pag_args = array(
							'current'      => max( 1, $course_pag ),
							'total'   => $query_course->max_num_pages,
							'base' => @add_query_arg('course_page','%#%'),
               				'format'   => '?course_page=%#%',
							'type'   => 'list',
							'prev_text'    => __('Prev', 'spacex'),
							'next_text'    => __('Next', 'spacex'),
						);
						echo paginate_links( $pag_args );
						
					endif;
					
					
					?>
                     </aside>
                    </div>
                   
                     <!--End course by instructor-->
                <?php
              /*   $skills = get_post_meta($post->ID,'instructor-skill',true);
                
                if(is_array($skills))
                {
                echo ' <div class="instructor-skill">';
				
                echo ' <h3 class="widget-title"><span>SKILLS</span></h3>';
                foreach($skills as $skill)
                {
				echo '<div class="progress-wrapper">';	
				echo '<p><b>'.$skill['title'].'</b><em>'.$skill['skill-value'].'</em></p>';
                echo '<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="'.$skill['skill-value'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$skill['skill-value'].'%;"></div>
</div>';
				echo '</div>';
				}
                
                
                echo '</div><!-- End Skills -->';
                }*/
				
				/*echo '<div class="course-sidebar">';
					 dynamic_sidebar('course_sidebar');
				echo '</div>';*/
				if (is_active_sidebar('course_sidebar')) {
					dynamic_sidebar('course_sidebar');
				}
				?>
    
        
                
                                                
                </div>
                <!--End Col-->
                
        
                <!--End Row-->             
        </div> 
                <!--End Container-->        
           
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #instructor-<?php the_ID(); ?> -->
<!--End instructor-->
<?php //do_action( 'woocommerce_after_single_product' ); ?>

