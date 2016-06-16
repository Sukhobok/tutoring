<?php
/**
 * Single Course Content
 *
 * @author 		spacex
 * @package 	spacex/Templates
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post;
?>
<?php
if($post->post_content !== "") :
?>
<div class="sc-entry-body">
    <div class="sc-entry-content clearfix">
	    <h2 class="course-heading"><span><?php echo __('About This Course', 'spacex')?></span></h2>
    	<?php the_content();?>
    </div>
</div>
<?php endif;?>