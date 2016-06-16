 <?php get_header(); ?>



<section id="page-content" class="single-post">
<?php //do_action('spacex_before_main_content');?>
    <div class="container">

		 <?php do_action('spacex_before_content');?>


 <?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part('content', get_post_format());?>

			<?php
			//Comment
			if ( comments_open())
			{
				comments_template();
			}

            ?>

			<?php endwhile;
			wp_reset_postdata();
			?>
		<!--Relate post-->
         <?php
			 $tags = wp_get_post_tags(get_the_id());

			if ($tags) :

				$first_tag = $tags[0]->term_id;
				$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=>5,
					'post_status'     => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'         => 'date',
					'order'           => 'DESC',
					'post_type'       => 'post',
				);
			else:
				$args=array(
					'post__not_in' => array($post->ID),
					'posts_per_page'=>5,
					'post_status'     => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'         => 'date',
					'order'           => 'DESC',
					'post_type'       => 'post',
				);
			endif;



            $related_posts = new WP_Query( $args );



			if ( $related_posts->have_posts() ) :
				echo '<br clear="all"><h3 class="comment-title">'.__('Relate Posts', 'spacex').'</h3>';
			else :
				$args=array(
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 10,
					'post_status'     => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'         => 'date',
					'order'           => 'DESC',
					'post_type'       => 'post',
				);
				$related_posts = new WP_Query( $args );
				echo '<br clear="all"><h3 class="comment-title">'.__('Most Recent Posts', 'spacex').'</h3>';

			endif;

            ?>
             <script>jQuery(document).ready(function() {

				 // store the slider in a local variable
				  var $window = jQuery(window),
					  flexslider;

				  // tiny helper function to add breakpoints
				  function getGridSize() {
					return (window.innerWidth < 600) ? 2 :
						   (window.innerWidth < 900) ? 3 : 3;
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

			if ( $related_posts->have_posts() ) :


			function custom_excerpt_length_single( $length ) {
				return 15; // numbers of word
			}
			add_filter( 'excerpt_length', 'custom_excerpt_length_single', 999 );



			 while ( $related_posts->have_posts() ) : $related_posts->the_post();

				echo '<li>';

						if( has_post_thumbnail() ):

				echo '<div class="relate-thumb">
                   <div class="block-img">';

                    echo '<p><a href="'.get_permalink().'" class="big-thumb" title="'.get_the_title().'"> '.get_the_post_thumbnail(get_the_id(), 'post-catalog').'</a></p>
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


 <?php do_action('spacex_after_content');?>
        </div>

</section>

<?php get_footer(); ?>
