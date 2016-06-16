<?php

add_filter( 'bbp_get_single_forum_description', 'spacex_remove_forum_description'  );

add_filter( 'bbp_get_single_topic_description', 'spacex_remove_forum_description'  );

function spacex_remove_forum_description() {

	return '';

}


add_filter( 'bbp_get_topic_pagination_count', 'spacex_remove_topic_pagination_count'  );
function spacex_remove_topic_pagination_count() {

	return '';

}

// Add Recent Topics to BBPress
function recent_bbpress_topics() { { ?>
 <?php
 if ( bbp_has_topics( array( 'author' => 0, 'show_stickies' => false, 'order' => 'DESC', 'post_parent' => 'any', 'posts_per_page' => 5 ) ) )
 bbp_get_template_part( 'bbpress/loop', 'topics' );
 ?>
<?php }}
// Hook into action
add_action('bbp_template_after_forums_loop','recent_bbpress_topics');

//create vertical list
function custom_bbp_sub_forum_list() {
  $args['separator'] = '<br>';
  return $args;
}
 add_filter('bbp_before_list_forums_parse_args', 'custom_bbp_sub_forum_list' );

//Show Sticky Label besides each topic. 
function rk_sticky_topics() {
 
   if ( bbp_is_topic_sticky() && !bbp_is_topic_closed() )
      echo '<span class="sticky">[Sticky]</span>';
}
 
add_action( 'bbp_theme_before_topic_title', 'rk_sticky_topics' );

//Show Closed Label besides each topic.
function rk_closed_topics() {
 
   if ( bbp_is_topic_closed() && !bbp_is_topic_sticky() )
      echo '<span class="closed">[Closed]</span>';
}
 
add_action( 'bbp_theme_before_topic_title', 'rk_closed_topics' );

//Show a hot label if the topic has more than 25 replies.
function rk_hot_topics() {
   $reply_count = bbp_get_topic_reply_count();
 
   if ( $reply_count > 25 )
      echo '<span class="hot">[Hot]</span>';
}
 
add_action( 'bbp_theme_before_topic_title', 'rk_hot_topics' );

//Show a “New” label for an hour after the topics creation.
function rk_new_topics() {
$offset = 60*60*1; 
 
   if ( get_post_time() > date('U') - $offset )
      echo '<span class="new">[New]</span>';
}
 
add_action( 'bbp_theme_before_topic_title', 'rk_new_topics' );