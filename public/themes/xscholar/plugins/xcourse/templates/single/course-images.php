 <?php
 
	global $post;	
	$attachment_ids = array();

	$attachment_ids = get_post_meta($post->ID,'course-gallery',true);
	$attachment_ids = (array) explode( ',', $attachment_ids );

?>
<br clear="all">
 <div class="entry-thumbnail">
                	
	<?php
      echo get_the_post_thumbnail($post->ID, 'full');
      
    ?>
<?php    
$cat_count = sizeof( get_the_terms( $post->ID, 'course_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'course_tag' ) );
?>
<div class="sc-entry-cat">


	<?php  echo get_xcourse_categories($post->ID, ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'spacex' ) . ' ', '</span>' ); ?>

	<?php echo get_xcourse_tags($post->ID, ', ', '<span class="tag-links">' . _n( 'Tag:', 'Tags:', $tag_count, 'spacex' ) . ' ', '</span>' ); ?>



</div>
    
</div>

                	
	<?php
	echo '<div class="entry-gallery">';
     if ( $attachment_ids ) {
	
	echo '<div class="course-images thumbnails">';

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( '' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			$single_product_image = wp_get_attachment_image_src ( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" rel="gallery" title="%s" data-small="%s">%s</a>', $single_product_image[0],  $image_title, $single_product_image[0], $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

	echo '</div>';
	
}
echo '</div>';    
    ?>

<br clear="all">