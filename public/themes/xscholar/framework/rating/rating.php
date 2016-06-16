<?php

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function rating_scripts()
{
	wp_enqueue_script('like_post', get_template_directory_uri().'/framework/rating/js/post-like.js', array('jquery'), '1.0', true );
	wp_enqueue_style('like_post', get_template_directory_uri().'/framework/rating/css/style.css');
	wp_localize_script('like_post', 'ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ajax-nonce')
	));
}
add_action( 'wp_enqueue_scripts', 'rating_scripts');	

function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
     
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
         
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "_voted_IP", true);
        $voted_IP = $meta_IP;
 
        if(!is_array($voted_IP))
            $voted_IP = array();
         
        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "_votes_count", true);
 
        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
 
            // Save IP and increase votes count
            update_post_meta($post_id, "_voted_IP", $voted_IP);
            update_post_meta($post_id, "_votes_count", ++$meta_count);
             
            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "_voted_IP", true);
    $voted_IP = $meta_IP;
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}

function getPostLikeLink($post_id)
{
    $themename = "spacex";
 
    $vote_count = get_post_meta($post_id, "_votes_count", true);
 
    $output = '<p class="post-like">';
    if(hasAlreadyVoted($post_id))
        $output .= ' <span title="'.__('I like this article', 'spacex').'" class="like alreadyvoted voted  fa fa-heart"></span>';
    else
        $output .= '<a href="#" data-post_id="'.$post_id.'">
                    <span  title="'.__('I like this article', 'spacex').'"class="qtip like fa fa-heart"></span>
                </a>';
    $output .= '<span class="count">'.$vote_count.'</span> '.__('People love this!', 'spacex').'</p>';
     
    return $output;
}