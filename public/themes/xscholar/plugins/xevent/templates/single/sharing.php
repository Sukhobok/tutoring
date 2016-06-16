<?php
/**
 * Single Course Sharing
 *
 * @author 		spacex
 * @package 	spacex/Templates
 * @version     1.0
 */
?>

	<?php 
	if(shortcode_exists('mashshare'))
	{?>
    <aside class="sc-entry-sharing">
    <?php
		echo do_shortcode('[mashshare]');
	?>
    </aside>
    <?php	
	}
	?>
