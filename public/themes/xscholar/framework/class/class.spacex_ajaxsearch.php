<?php
/**
 * SPACEX AJAX SEARCH CLASS
 *
 * Based on YIT Ajax Search
 *
 * @author spacex
 * @package Framework/class
 * @version 1.0.0
 */



if( !class_exists( 'SPACEX_AJAX_SEARCH' ) ) {
    /**
     * SPACEX_AJAX_SEARCH
     *
     * @since 1.0.0
     */
    class SPACEX_AJAX_SEARCH {
        
        /**
         * Plugin object
         *
         * @var string
         * @since 1.0.0
         */
        public $obj = null;

		/**
		 * Constructor
		 * 
		 * @return mixed
		 * @since 1.0.0
		 */
		public function __construct() {
			
			// actions
			add_action( 'init', array( $this, 'init' ) );

            add_action( 'wp_ajax_spacex_ajax_search_products', array( $this, 'ajax_search_products') );
            add_action( 'wp_ajax_nopriv_spacex_ajax_search_products', array( $this, 'ajax_search_products') );

		}     
		
		
		/**
		 * Init method:
		 *  - default options
		 * 
		 * @access public
		 * @since 1.0.0
		 */
		public function init() {}

        /**
         * Perform jax search products
         */
        public function ajax_search_products() {
			
            global $woocommerce, $product;

            $search_keyword = esc_attr($_REQUEST['query']);

            $ordering_args = $woocommerce->query->get_catalog_ordering_args( 'title', 'asc' );
            $products = array();

            $args = array(
                's'                     => apply_filters('spacex_ajax_search_products_search_query', $search_keyword),
                'post_type'				=> 'xcourse',
                'post_status' 			=> 'publish',
                'ignore_sticky_posts'	=> 1,
                'orderby' 				=> $ordering_args['orderby'],
                'order' 				=> $ordering_args['order'],
                'posts_per_page' 		=> apply_filters('spacex_ajax_search_products_posts_per_page', 5),
            );
				
             if( isset( $_GET['course_cat'] ) && ($_GET['course_cat'] != '') && ($_GET['course_cat'] != '0') ){
                $args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'course_cat',
                        'field' => 'slug',
                        'terms' => $_REQUEST['course_cat']
                    ));
            }

            $products_query = new WP_Query( $args );

            if ( $products_query->have_posts() ) {
                while ( $products_query->have_posts() ) {
                    $products_query->the_post();

                    $products[] = array(
                        'id' => get_the_ID(),
						'image' => get_the_post_thumbnail( get_the_ID(),  apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail')  ) ,
						'value' => get_the_title(),
						'price' => get_woocommerce_currency_symbol(). ' ' .get_post_meta( get_the_ID(), '_regular_price', true),
                        'url' => get_permalink()
                    );
                }
            } else {
                $products[] = array(
                    'id' => -1,
					'image' => '' ,
                    'value' => __('No results', 'spacex'),
					'price' => '',
                    'url' => ''
                );
            }
            wp_reset_postdata();


            $products = array(
                'suggestions' => $products
            );


            echo json_encode( $products );
            die();
        }
	}
}