 <?php get_header(); ?>

<?php
global $post;
remove_action( 'spacex_before_main_content', 'spacex_template_page_header', 5 );
?>

<section id="page-content" class="single-post single-xgallery">
<?php do_action('spacex_before_main_content');?>
    <div class="container">

		 <?php do_action('spacex_before_content');?>  
 
 <?php 
 if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
            
            	<div class="gallery-left">
                	<?php
                    if(get_post_format()=='video')
					{
						spacex_post_thumbnail_video();
					}
					elseif(get_post_format()=='gallery')
					{
						spacex_post_thumbnail_gallery();	
					}
					else
					{
						spacex_post_thumbnail();
					}
					//get the term
					$terms = get_the_terms( $post->ID, 'xgallery-categories' );
					if ( $terms && ! is_wp_error( $terms ) ) : 

						$cats = array();
					
						foreach ( $terms as $term ) {
							$cats[] =  '<a href="'.get_term_link( $term ).'" title="'.__('View all posts in','spacex').' '.$term->name.'" rel="category tag">'.$term->name.'</a>';
						}
											
						$xcats = join( " ", $cats );
					?>
					
					<span class="post_categories">
						<?php echo $xcats; ?>
					</span>
					
					<?php endif; ?>

                </div>
                <div class="gallery-right">
                	 <header class="entry-header">
                       <?php
					    $meta = get_post_meta(get_the_id(),'spacex_gallery_meta', true);
						$link = get_post_meta(get_the_id(),'spacex_gallery_link', true);
                        
						//gellery title 
                        the_title( '<h1 class="entry-title clearfix">', '</h1>' );
						the_breadcrumb();
						//share button
						if(shortcode_exists('mashshare'))
						{
                        	echo do_shortcode('[mashshare]');
						}
						//gallery meta
						?>
                        <div class="clearfix"></div>
                        <?php
						if(is_array($meta))  
						{
							echo '<ul class="gallery-meta list-style clearfix">';
								foreach($meta as $item)
								{
									echo '<li>';
										if(!empty($item['meta-icon']))
										{
											echo '<i class="fa '.$item['meta-icon'].'"></i>';
										}
										echo '<b class="label">'.$item['title'].'</b>';
										echo '<span>'.$item['meta-text'].'</span>';
									echo '</li>';
								}
							echo '</ul>';
						}
						
                        ?>
                       
                    </header><!-- .entry-header -->
                
                     <div class="entry-content">
                        <?php
						the_content();
                        ?>
                          
                    </div><!-- .entry-content -->
                <?php 
					//readmore button
					if(!empty($link))
					{
						echo '<a class="readmore" href="'.$link.'">'.__('Read more','themeshield').'</a>';
					}
			
				?>
                
                </div>
 
                </article><!-- #post-## -->

            
			<?php endwhile; 
			wp_reset_postdata();
			?>
			<!--Relate post-->
         	<?php 
			$args=array(
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 10,
				'post_status'     => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'         => 'date',
				'order'           => 'DESC',
				'post_type'       => 'xgallery',
			);

            $related_posts = new WP_Query( $args );
			
            ?>

             <?php 
			
			if ( $related_posts->have_posts() ) :				
			
			echo '<br clear="all"><h3 class="comment-title">'.__('Other Gallery', 'spacex').'</h3>';
			?>
            <script>jQuery(document).ready(function() { 
		
				 // store the slider in a local variable
				  var $window = jQuery(window),
					  flexslider;
				 
				  // tiny helper function to add breakpoints
				  function getGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : 4;
				  }

				jQuery(".relate-xgallery").flexslider({
					animation: "slide",            
					easing: "swing",               
					controlNav: false,
					directionNav: true,
					itemWidth: 210,
					minItems: getGridSize(), // use function to pull in initial value
					maxItems: getGridSize(), // use function to pull in initial value			 
					smoothHeight: true,
					prevText: "<i class=\'fa fa-angle-left\'></i>",
					nextText: "<i class=\'fa fa-angle-right\'></i>",
					start: function (slider) {
						flexslider = slider; //Initializing flexslider here.
					}
				});
				
				// check grid size on resize event
			  $window.resize(function() {
				var gridSize = getGridSize();
			 
				flexslider.vars.minItems = gridSize;
				flexslider.vars.maxItems = gridSize;
			  });
			  
			  
			}); </script>
            <div class="relate-post no-padding row clearfix relate-xgallery sc-flexslider">
             <ul class="slides">
            
            <?php
			 while ( $related_posts->have_posts() ) : $related_posts->the_post(); 	
			 		
				echo '<li>';	
				
						if( has_post_thumbnail() ):
								
				echo '<div class="relate-thumb">
                   <div class="block-img">';
                 						   
                    echo '<p><a href="'.get_permalink().'" class="big-thumb" title="'.get_the_title().'"> ';
					echo get_the_post_thumbnail($post->ID, 'post-catalog');
					
					echo '</a></p>
                                </div>';
					
					
				$cats = array();
				$post_categories = wp_get_post_categories( get_the_id() );	
				foreach($post_categories as $c){
					$cat = get_category( $c );
					$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'cat_id' => $cat->term_id );
				}
				echo'<span class="post-categories">';
				foreach($cats as $post_category)
				{
					echo '<a href="'.get_category_link($post_category['slug']).'">'.$post_category['name'].'</a>' . ' ';
				}			
				echo '</span>';
				
				echo '<h3 class="relate-post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';		
				
					echo '<div class="entry-meta">'.spacex_post_meta().'</div>'; 
					
			  echo '</div>';
			  
			else:
				echo '<h3><a href="'.get_permalink().'" class="block-post-title">'.get_the_title().'</a></h3>';					
			endif;
					echo '</li>';
			 		endwhile;
					wp_reset_postdata();
					endif;
			 ?>
             </ul>	
             </div>
		
			
        <!--End relate post-->
            
		<?php else: ?>
		
			<?php get_template_part( 'no-results' ); ?>

		<?php endif; ?>
		
        
 <?php //do_action('spacex_after_content');?>
        </div>
    
</section>

<?php get_footer(); ?>        