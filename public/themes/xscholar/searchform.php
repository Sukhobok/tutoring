<?php
$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
			<label class="screen-reader-text" for="s"><i class="fa fa-search"></i></label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search...', 'woocommerce' ) . '" />
	</form>';
echo $form;	
?>
