<?php
/**
 * spacex Term Meta API - Update term meta
 *
 * @param mixed $term_id
 * @param string $meta_key
 * @param mixed $meta_value
 * @param string $prev_value (default: '')
 * @return bool
 */
function update_spacex_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {
	return update_metadata( 'spacex_term', $term_id, $meta_key, $meta_value, $prev_value );
}

/**
 * spacex Term Meta API - Add term meta
 *
 * @param mixed $term_id
 * @param mixed $meta_key
 * @param mixed $meta_value
 * @param bool $unique (default: false)
 * @return bool
 */
function add_spacex_term_meta( $term_id, $meta_key, $meta_value, $unique = false ){
	return add_metadata( 'spacex_term', $term_id, $meta_key, $meta_value, $unique );
}

/**
 * spacex Term Meta API - Delete term meta
 *
 * @param mixed $term_id
 * @param mixed $meta_key
 * @param string $meta_value (default: '')
 * @param bool $delete_all (default: false)
 * @return bool
 */
function delete_spacex_term_meta( $term_id, $meta_key, $meta_value = '', $delete_all = false ) {
	return delete_metadata( 'spacex_term', $term_id, $meta_key, $meta_value, $delete_all );
}

/**
 * WooCommerce Term Meta API - Get term meta
 *
 * @param mixed $term_id
 * @param string $key
 * @param bool $single (default: true)
 * @return mixed
 */
function get_spacex_term_meta( $term_id, $key, $single = true ) {
	return get_metadata( 'spacex_term', $term_id, $key, $single );
}