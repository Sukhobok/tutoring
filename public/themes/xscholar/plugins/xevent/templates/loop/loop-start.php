<?php
/**
 * Course Loop Start
 *
 * @author 		spacex
 * @package 	xevent/loop
 * @version     1.0.0
 */
$spacex_columns = xt_get_option('tt_product_column');
$col = 'product-grid-' . $spacex_columns;
?>
<ul data-col="<?php echo $spacex_columns?>" class="products <?php echo $col?>">