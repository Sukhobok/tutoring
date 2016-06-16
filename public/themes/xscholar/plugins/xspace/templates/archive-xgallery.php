<?php get_header(); ?>
<section id="page-content" class="archive-xgallery">
<?php do_action('spacex_before_main_content');?>
    <div class="container">

		 <?php do_action('spacex_before_content');?>  

 <?php 
 if ( have_posts() ) : ?>
 <ul class="slides row xgallery-post">
			<?php while ( have_posts() ) : the_post(); ?>
           

	<?php
	
	echo '<li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';	
				
						if( has_post_thumbnail() ):
								
				echo '<div class="relate-thumb">
                   <div class="block-img">';
                 						   
                    echo '<p><a href="'.get_permalink().'" class="big-thumb" title="'.get_the_title().'"> ';
					the_post_thumbnail($post->ID, 'post-catalog');
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
					
	?>

            
			<?php endwhile; 
			wp_reset_postdata();
			?>	
        <!--End relate post-->
            </ul>
		<?php else: ?>
		
			<?php get_template_part( 'no-results' ); ?>

		<?php endif; ?>
		
        
 <?php do_action('spacex_after_content');?>
        </div>
    
</section>

<?php get_footer(); ?>        