<?php
global $post;
$product_id = get_post_meta($post->ID,'course_selling',true);
$product_obj = wc_get_product( $product_id );



  $instructors =  get_post_meta($post->ID,'course-instructor',true);
 $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_checkbox_query', array( 'post_type' => 'instructor', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any', 'include' => $instructors ), $instructors ) );

	
        if ( $instructors !=='' && is_array( $my_posts ) && ! empty( $my_posts ) ) {
		  echo ' <div class="course-loop-instructor">';	
		  $count = 0;
		  $thumb_instructor = '';
		  $name_instructor = '';
		  
          foreach( $my_posts as $my_post ) {
            $post_title = '' != $my_post->post_title ? $my_post->post_title : 'Untitled';
			
			
				$thumb_instructor .= get_the_post_thumbnail($my_post->ID, array(90, 90));
			
			 $name_instructor .= '<a href="'.get_the_permalink($my_post->ID).'">' . $post_title . '</a>';
			$count++;
     
          }
		 
		  echo $thumb_instructor;
		   if($count == 1)
		  {
			  echo $name_instructor;
		  }
          //echo '<div class="instructor-name">'.$name_instructor.'</div>';

		  echo '</div>';

        }
	

if($product_id != '' && $product_obj->exists())
{
?>
<div class="course-loop-student">
	
    <?php
    $units_sold = get_post_meta( $product_obj->id, 'total_sales', true );
		
	if($units_sold != '' && $units_sold>=0)
	{?>
	<i class="fa fa-users"></i>
    <span>
    <?php
		echo $units_sold;
	}
	?>
    </span>
</div>

<div class="course-loop-price">
	<?php
			
			 if( $product_obj->price != '0' ) {
				if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
					{ echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), '' ); }
				else
					{ echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price() ), '' ); }
			} else {
				echo apply_filters( 'spacex_free_text', __( 'Free!', 'spacex' ) );
			}
			
	?>
</div>

<?php

}
?>



   