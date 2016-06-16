<div class="post-author">
  <div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?> </div>
  <div class="author-meta">
  <h4 class="author-name"><?php printf( __( '%s', 'spacex' ), get_the_author() ); ?></h4>
  
  
    
  <p>
    <?php the_author_meta( 'description' ); ?></p>
  
      <ul class="author-social-icon clearfix social-icon">
   <?php 
   		echo '<li><a target="_blank" href="http://twitter.com/'.get_the_author_meta( 'twitter' ).'" class="fa fa-twitter twitter"></a></li>';
		echo '<li><a target="_blank" href="'.get_the_author_meta( 'facebook' ).'" class="fa fa-facebook facebook"></a></li>';
		echo '<li><a target="_blank" href="'.get_the_author_meta( 'googleplus' ).'" class="fa fa-google-plus google"></a></li>';
    ?>
    
  </ul> 
    <h3><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo __('View All', 'spacex')?></a></h3>
    
    </div>
	<div class="clearfix"></div>

</div>
