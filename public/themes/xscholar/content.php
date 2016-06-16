<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					<?php spacex_post_thumbnail(); ?>
                
                    <header class="entry-header">
                       <?php
					   
					   echo spacex_post_categories_blog();
                
                            if ( is_single() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                            endif;
                        ?>
                
                        <div class="entry-meta">
                        	<?php echo spacex_post_meta()?>   
                        </div><!-- .entry-meta -->
                        
                    </header><!-- .entry-header -->
                
                    <?php if ( is_search() ) : ?>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
                    <?php else : ?>
                    <div class="entry-content">
                        <?php
						if(is_single())
						{
							get_template_part( 'author-bio', get_post_format() ); 
							
                            /* translators: %s: Name of current post */
                            the_content( sprintf(
                                __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'spacex' ),
                                the_title( '<span class="screen-reader-text">', '</span>', false )
                            ) );
                
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'spacex' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
						}
						else
						{
							the_excerpt();
						}
						if(is_single() && shortcode_exists('mashshare'))
						{
							echo do_shortcode('[mashshare]');
						}
						
                        ?>
                          
                    </div><!-- .entry-content -->
                    <?php endif; ?>
                <?php 
				if(is_single())
				{
					the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); 
				}
				?>
                </article><!-- #post-## -->