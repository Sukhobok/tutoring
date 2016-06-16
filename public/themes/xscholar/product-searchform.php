<?php
$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '" class="tt_search_form">
			<label class="screen-reader-text" for="s"><i class="fa fa-search"></i></label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search...', 'woocommerce' ) . '" class="product-keyword" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
			<input type="hidden" name="post_type" value="xcourse" />
		<div class="spacex_ajax_search_result">
		</div>
	</form>';
echo $form;	

$ajax_search_enable = ot_get_option('tt_header_ajax_search');


if($ajax_search_enable !== 'none')
{
	
$filter_result = '';
if($ajax_search_enable == 'advanced')
{
	$filter_result = 'formatResult: resultFormat,';
}
wp_enqueue_script( 'ajaxsearch',  	X_BASE_URL . 'js/autocomplete.js',  array('jquery'), false, true );

?>
<script type="text/javascript">
jQuery(document).ready(function() {
	
 function resultFormat (row, i, num) {
            var result = '<div class="autocomplete-image">' + row["image"] + '</div><div class="autocomplete-title">' + row["value"] + '</div><div class="autocomplete-price">' + row["price"] + '</div>';
            return result;
        }
	
    jQuery('.product-keyword').autocomplete({
        minChars: 2,
		appendTo: '.spacex_ajax_search_result',
        serviceUrl: woocommerce_params.ajax_url + '?action=spacex_ajax_search_products',
		<?php echo $filter_result;?>
      	onSearchStart: function(){
            jQuery(this).css('background', '#fff url(<?php echo X_BASE_URL?>/images/ajax-loader.gif) no-repeat right center');
			jQuery(this).closest('.screen-reader-text').hide('slow');
			jQuery(this).css('background-size', '24px 24px');
        },
        onSearchComplete: function(){
            jQuery(this).css('background', '#fff');
			jQuery(this).closest('.screen-reader-text').show('slow');			
			
        },
        onSelect: function (suggestion) {
            if( suggestion.id != -1 ) {
                window.location.href = suggestion.url;
            }
        }
		
	    
    });
});
</script>
<?php
}
?>