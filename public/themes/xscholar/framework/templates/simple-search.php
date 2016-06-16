<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) )?>" class="simple-search-form">
			<label class="screen-reader-text" for="s"><i class="fa fa-search"></i></label>
			<input type="text" value="<?php echo get_search_query()?>" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search', 'spacex' )?>" />
			<input type="hidden" name="post_type" value="xcourse" />
</form>