<?php
/**
 * Course Loop Start
 *
 * @author 		spacex
 * @package 	xcourse/loop
 * @version     1.0.0
 */
$spacex_columns = sc_get_option('tt_product_column');
$col = 'product-grid-' . $spacex_columns;
?>
<ul data-col="<?php echo esc_attr($spacex_columns)?>" class="products <?php echo esc_attr($col)?>">