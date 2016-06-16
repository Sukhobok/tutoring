<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$modules = get_post_meta($post->ID,'event-module',true);


if(is_array($modules))
{
		
	echo '<div class="xevent-entry-modules">';
	//echo '<h2 class="event-heading"><span>Course\'s Lessons</span></h2>';
	echo ' <div class="module-wrapper">';
	echo ' <div class="module-line"></div>';
	foreach($modules as $module)
	{
		$title = $module['title'];
		$content = $module['description'];
		$time = $module['time'];
		$icon = $module['icon'];
		
		?>
        <div class="module-item clearfix">
        	<div class="module-time"><time><?php echo $time?></time></div>
        	<div class="module-content">
            <?php echo '<h3>'.$title.'</h3>';?>
            <?php echo $content?>
            </div>            
            <div class="module-icon tli-icon"><i class="fa <?php echo esc_attr($icon)?>"></i></div>            
        </div>
        
        <?php	
	
		
	}

	echo '</div>';
	echo '</div><!-- End Entry Lesson -->';
}
?>
