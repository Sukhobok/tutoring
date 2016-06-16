<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
$spacex_columns = ot_get_option('tt_product_column');
$col = 'product-grid-' . $spacex_columns;
?>
<ul data-col="<?php echo esc_attr($spacex_columns)?>" class="products <?php echo esc_attr($col)?>">