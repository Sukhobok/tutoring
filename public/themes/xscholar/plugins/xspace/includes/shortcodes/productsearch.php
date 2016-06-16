<?php
/* ---------------------------------------------------------------------- */
/*	Shortcode Product Search Box
/* ---------------------------------------------------------------------- */
add_shortcode('productsearch', 'spacex_shortcode_productsearch');

function spacex_shortcode_productsearch( $atts, $content = null ) { 

	$output = $el_class = '';
	extract(shortcode_atts(array(
		'description'			=> '',
		'css_animation'			=> '',
		
	), $atts));
	
$el_class .= xgetCSSAnimation($css_animation);	
	

$output = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '" class="ajax_search_form '.$el_class.'"><div class="inside">
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' .$description. '" class="vs-product-keyword" />';
			

$output .= spacex_build_dropdown_course_categories();

$output .='			<input type="hidden" value="0" name="course_cat" id="cat" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
			<input type="hidden" name="post_type" value="xcourse" />
			
		<div class="spacex_ajax_vs_search_result">
		</div>
		</div>
	</form>';


$ajax_search_enable = ot_get_option('tt_header_ajax_search');


$filter_result = '';
if($ajax_search_enable == 'advanced')
{
	$filter_result = 'formatResult: resultFormat,';
}
wp_enqueue_script( 'ajaxsearch',  	X_BASE_URL . 'js/autocomplete.js',  array('jquery'), false, true );


$output .='

<script type="text/javascript">
jQuery(document).ready(function() {
	
 function resultFormat (row, i, num) {
            var result = \'<div class="autocomplete-image">\' + row["image"] + \'</div><div class="autocomplete-title">\' + row["value"] + \'</div><div class="autocomplete-price">\' + row["price"] + \'</div>\';
            return result;
        }
		
    jQuery(\'.vs-product-keyword\').autocomplete({
        minChars: 2,
		params: {course_cat: jQuery(\'#cat\').val()},
		appendTo: \'.spacex_ajax_vs_search_result\',
        serviceUrl: woocommerce_params.ajax_url + \'?action=spacex_ajax_search_products\',
		'.$filter_result.'
      	onSearchStart: function(q){
			q.course_cat = jQuery("#cat").val();
            jQuery(this).css(\'background\', \'#fff url('.X_BASE_URL.'/images/ajax-loader.gif) no-repeat right center\');
			jQuery(this).css(\'background-size\', \'24px 24px\');
			jQuery(".spacex_ajax_vs_search_result").removeClass(\'result_show\');
        },
        onSearchComplete: function(){
            jQuery(this).css(\'background\',\'#fff\');
			jQuery(".spacex_ajax_vs_search_result").addClass(\'result_show\');
			
        },
        onSelect: function (suggestion) {
            if( suggestion.id != -1 ) {
                window.location.href = suggestion.url;
            }
        }
		
    });

	
	
});
</script>';



	
	
	
		
	return $output;	
}
