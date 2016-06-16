<?php
/**
 * Single Course Sharing
 *
 * @author 		spacex
 * @package 	spacex/Templates
 * @version     1.0
 */
?>
<div class="sc-entry-sharing">
	<?php 
	if(shortcode_exists('mashshare'))
	{
		echo do_shortcode('[mashshare]');
	}
	?>
</div>