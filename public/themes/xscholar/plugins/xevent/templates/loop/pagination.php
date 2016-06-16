<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

?>
<nav class="xevent-pagination">
	<?php
		echo paginate_links( apply_filters( 'xevent_pagination_args', array(
			'base'         => esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => __('Prev', 'spacex'),
			'next_text'    => __('Next', 'spacex'),
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
    <p class="shileevent-result-count">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	if ( 1 == $total ) {
		_e( 'Showing the single result', 'spacex' );
	} elseif ( $total <= $per_page || -1 == $per_page ) {
		printf( __( 'Showing all %d results', 'spacex' ), $total );
	} else {
		printf( _x( 'Showing %1$d&ndash;%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'spacex' ), $first, $last, $total );
	}
	?>
</p>
</nav>
