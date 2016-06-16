<section id="comments">

	<?php if ( post_password_required() ): ?>

		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'spacex' ); ?></p>

	<?php return; endif; ?>

	<?php if ( have_comments() ): ?>

		<h3 class="widget-title comment-title">
			<?php printf( _n( 'Comments <span class="comment-number">%1$s</span>', 'Comments <span class="comment-number">%1$s</span>', get_comments_number(), 'spacex'), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
		</h3>

		<ol class="commentlist clearfix">
			<?php wp_list_comments( array( 'callback' => 'spacex_comments', 'max_depth' => 2 ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
			<nav class="pagination comments-pagination">
				<?php paginate_comments_links(); ?>
			</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'spacex' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
    

</section>