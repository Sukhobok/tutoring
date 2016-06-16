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

<div itemscope class="single-speaker" itemtype="speaker" id="speaker-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    	<div class="row">
        
             
      
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                	<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    	 <div class="speaker-thumbnail">
								<?php
                                 echo get_the_post_thumbnail($post_id, array('260', '260'));
                                ?>
                              
                           </div>
                           <!--End Thumbnail-->
                            <div class="speaker-meta clearfix">
                         	<?php                  
									$meta = get_post_meta($post_id,'speaker-meta',true);
									$list = '';
									
									if(is_array($meta))
									{
									echo '<ul class="event-meta list-style">';
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
                	<!--End left of speaker-->
                    <div id="main-speaker-content" class="col-lg-8 col-md-8 col-xs-12 col-sm-8">
                    	
                                     
                    <div class="speaker-detail">
                      <?php
					  
					$level = get_post_meta($post_id,'speaker-level',true);
					  
                    echo '<div class="speaker-name"><h2>' . get_the_title() . '</h2>';
					
					if(!empty($level))
					{
						echo '<p>'.$level.'</p>';
					}
					echo '</div>';
					?>
                  
					 <?php                  
						$social_icons = get_post_meta($post_id,'speaker-social',true);
						$list = '';
						
						if(is_array($social_icons))
						{
						echo ' <div class="speaker-social clearfix">';
						//echo ' <h2 class="event-heading"><span>More Info</span></h2>';
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
                	<div class="speaker-content">
                    <?php
                    the_content();
					?>
                    </div>

                    
                    </div>
                    <!--End Detail-->
                                        
                   <?php
                    
				$about = get_post_meta($post->ID,'speaker-about',true);
				if(is_array($about))
				{
					echo '<div class="speaker-about">';
					echo '<div class="timeline"></div>';
					foreach($about as $lesson)
					{
						$title = $lesson['title'];
						$desc = $lesson['speaker-description'];
						$icon = $lesson['icon'];	
									
						echo ' <div class="timeline-speaker">';
						
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
       					 <!--End right of speaker-->
                    </div>     
                </div>
                <!--End Col-->
                
               
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="sidebar">
                
     			<div class="event-by-speaker">
                    
                   
                    <?php
					$event_pag = isset( $_GET['event_page'] ) ? (int) $_GET['event_page'] : 1;
                    $args = array(
						'post_type'  => 'xevent',
						'posts_per_page' 	=> 4,
						'paged'	=> $event_pag,
						'orderby'         => 'date',
						'order'           => 'DESC',
						'meta_key'        => 'event-speaker',
						'meta_value'      => $post_id,
						'meta_compare'      => 'LIKE',
						'post_status'     => 'publish',
						'ignore_sticky_posts' => true,
					);
					
					 
					$query_event = new WP_Query( $args );
				
					if ( $query_event->have_posts() ) :
						?>
                        <aside>
                         <h3 class="widget-title"><span><?php echo __('event by','spacex')?> <?php echo get_the_title();?></span></h3>
                        <?php
						
		
			 echo '<ul class="product_list_widget event-list">';
				 while ( $query_event->have_posts() ) : $query_event->the_post(); 	
				
						echo '<li>';
						echo '<a href="'. get_permalink($post->ID) .'" title="'.get_the_title($post->ID).'">';
						echo get_the_post_thumbnail($post->ID, array(240,240));
						echo get_the_title($post->ID);	
						echo '</a>';
						
						//$cat_count = sizeof( get_the_terms( $post->ID, 'event_cat' ) );
					//	echo get_xevent_categories($post->ID, '<span class="posted_in">' . _n( '', 'Categories:', $cat_count, 'spacex' ), '</span>' ); 
						
						echo xevent_get_price() . '  &nbsp;&nbsp; ' . xevent_get_enroll_members();
						
						//echo '<div class="event-excerpt">'.get_post_meta($post->ID,'event-description',true).'</div>';
						
						echo '</li>';
		
				endwhile;
			
			echo '</ul>';

						
						wp_reset_postdata(); 
						
						 $pag_args = array(
							'current'      => max( 1, $event_pag ),
							'total'   => $query_event->max_num_pages,
							'base' => @add_query_arg('event_page','%#%'),
               				'format'   => '?event_page=%#%',
							'type'   => 'list',
							'prev_text'    => __('Prev', 'spacex'),
							'next_text'    => __('Next', 'spacex'),
						);
						echo paginate_links( $pag_args );
						
					endif;
					
					
					?>
                     </aside>
                    </div>
                   
                     <!--End event by speaker-->
        
    				<?php
    				if(is_active_sidebar('event_sidebar'))
    				{
                    	dynamic_sidebar('event_sidebar');
    				}
					?>
                                                
                </div>
                <!--End Col-->
                
        
                <!--End Row-->             
        </div> 
                <!--End Container-->        
           
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #speaker-<?php the_ID(); ?> -->
<!--End speaker-->
<?php //do_action( 'woocommerce_after_single_product' ); ?>

