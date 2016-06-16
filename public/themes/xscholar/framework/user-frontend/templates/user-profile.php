<?php
if ( !is_user_logged_in() ) {
	wp_safe_redirect( home_url( '/user-login/' ) );
	exit;
}
?>
<?php get_header(); ?>


<?php
$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => '',
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );		

$amount_complete = 0;
$amount_onhold = 0;
$amount_processing = 0;
$all_courses = '';
$all_events = '';

$product_ids = array();

$done_course = array();
$unfinish_course =  array();
$all_done_course = array();
$all_unfinish_course =  array();
$order_row = '<tr><td>'.__('You do not have any payment yet','spacex').'</td></tr>';

if ( $customer_orders ) :
					
			foreach ( $customer_orders as $customer_order ) {
				$order      = wc_get_order();
				$order->populate( $customer_order );
				$item_count = $order->get_item_count();
				
				/* Get order status*/			
				$order_status = $order->get_status();
				switch($order_status)
				{
					case 'completed';
						$amount_complete += (double) $order->get_total();
					break;
					case 'on-hold';
						$amount_onhold += (double) $order->get_total();
					break;
					case 'processing';
						$amount_processing += (double) $order->get_total();
					break;
				}
				
				
				
				/*Prepare to display order*/
				$order_row = '<tr class="order">
					<td class="order-number">
						<a href="'.uf_edit_profile_url('/user-profile/').'?view_order='.$order->id.'">
							'.$order->get_order_number().'
						</a>
					</td>';
				$order_row .= '<td class="order-date">
						<time>'.date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ).'</time>
					</td>';	
				$order_row .= '<td class="order-status" style="text-align:left; white-space:nowrap;">
						<span class="'.$order->get_status().'">'.wc_get_order_status_name( $order->get_status() ).'</span>
					</td>';
				$order_row .= '<td class="order-total">
						'.sprintf( _n( '%s for %s item', '%s for %s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ).'
					</td>';
					
				$order_row .= '<td class="order-actions">';	

		
							$actions = array();

							if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_payment', array( 'pending', 'failed' ), $order ) ) ) {
								$actions['pay'] = array(
									'url'  => $order->get_checkout_payment_url(),
									'name' => __( 'Pay', 'woocommerce' )
								);
							}

							if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
								$actions['cancel'] = array(
									'url'  => $order->get_cancel_order_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
									'name' => __( 'Cancel', 'woocommerce' )
								);
							}

							$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

							if ($actions) {
								foreach ( $actions as $key => $action ) {
									echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
								}
							}
							
					$order_row .= '</td>';		
					$order_row .= '</tr>';		
						
			}



	/* Get Course in Orders
	/* =============================================================== */	
	
	/*Get product in order*/				
	$products = $order->get_items();

	
	if(is_array($products))
	{
		foreach($products as $product)
		{
			$product_ids[] = $product['product_id'];
		}
	}


	
	$query_course_args = array(
		'post_type'	=> 'xcourse',
		'post_status' => 'publish',
		'posts_per_page'     => 5,
		'orderby'         => 'date',
		'order'           => 'DESC',
		'meta_key' 		=> 'course_selling',
		'meta_value' 	=>  $product_ids,
		'meta_compare' 	=>  'IN',
	);
	
	
	$courses = new WP_Query( $query_course_args );
	

	 ob_start();
	
	if ( $courses->have_posts() ) :
		

		while ( $courses->have_posts() ) : $courses->the_post(); 
			
			
			$course_status = get_post_meta(get_the_id(),'course-status', true);
			
			/* Get every course by it status*/
			if($course_status == 'completed')
			{
				$done_course[] = '<li><a href="'.get_permalink().'"><i class="fa fa-graduation-cap"></i>'.get_the_title().'</a></li>';
				$all_done_course[] = '<li><a href="'.get_permalink().'"><i class="fa fa-graduation-cap"></i>'.get_the_title().'</a></li>';				
			}
			elseif($course_status == 'opening')
			{
				$unfinish_course[] = '<li><a href="'.get_permalink().'"><i class="fa fa-graduation-cap"></i>'.get_the_title().'</a></li>';
				$all_unfinish_course[] = '<li><a href="'.get_permalink().'"><i class="fa fa-graduation-cap"></i>'.get_the_title().'</a></li>';					
			}
			
			
			
			
			
		endwhile;	
		
		wp_reset_postdata();	
		
	endif;	
	
	
			

endif;
		?>
		
                        <?php
          /*End get course in order*/
	$coming_event = array();
	$finish_event = array();
	
	$all_coming_event = array();
	$all_finish_event = array();
						

	$event_coming_args['meta_query']['relation'] = 'AND';		
		
	$event_coming_args['meta_query'][] = array(
		'key' 		=> 'event_selling',
		'value' 	=> $product_ids,
		'compare' 	=> 'IN'
	);
	
	$event_coming_args['meta_query'][] = array(
		'key' 		=> 'event_date',
		'value' => date("Y-m-d H:i"), 
		'compare' => '>=',
		'type' => 'DATETIME,'
	);
			
	$coming_event_args = array(
		'post_type'	=> 'xevent',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'numberposts'     => 5,
		'posts_per_page'     => 5,
		'offset'          => 0,
		'orderby'         => 'date',
		'order'           => 'DESC',
		'meta_query' 	=>  $event_coming_args['meta_query'],
	);
	
	$coming_events = new WP_Query( $coming_event_args );
	

	if ( $coming_events->have_posts() ) :
		
				
		while ( $coming_events->have_posts() ) : $coming_events->the_post(); 


			$coming_event[] = '<li><a href="'.get_permalink().'"><i class="fa fa-bullseye"></i>'.get_the_title().'</a></li>';

			$all_coming_event[] = '<li><a href="'.get_permalink().'"><i class="fa fa-bullseye"></i>'.get_the_title().'</a></li>';
			
			
		endwhile;	
		
		wp_reset_postdata();	
		
	endif;	
	
	
	
	$event_finish_args['meta_query']['relation'] = 'AND';		
		
	$event_finish_args['meta_query'][] = array(
		'key' 		=> 'event_selling',
		'value' 	=> $product_ids,
		'compare' 	=> 'IN'
	);
	
	$event_finish_args['meta_query'][] = array(
		'key' 		=> 'event_date',
		'value' => date("Y-m-d H:i"), 
		'compare' => '<',
		'type' => 'DATETIME,'
	);
	$finish_event_args = array(
		'post_type'	=> 'xevent',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'numberposts'     => 5,
		'posts_per_page'     => 5,
		'offset'          => 0,
		'orderby'         => 'date',
		'order'           => 'DESC',
		'meta_query' 	=>  $event_finish_args['meta_query'],
	);
	
	$finish_events = new WP_Query( $finish_event_args );
	


	if ( $finish_events->have_posts() ) :
		
				
		while ( $finish_events->have_posts() ) : $finish_events->the_post(); 


			$finish_event[] = '<li><a href="'.get_permalink().'"><i class="fa fa-bullhorn"></i>'.get_the_title().'</a></li>';

			$all_finish_event[] = '<li><a href="'.get_permalink().'"><i class="fa fa-bullhorn"></i>'.get_the_title().'</a></li>';
			
			
		endwhile;	
		
		wp_reset_postdata();	
		
	endif;	
	
	/*End get event in orders*/
						
						?>
<section id="main-content" class="main-content home">
<?php do_action('spacex_before_main_content');?>
    <div class="container">       

        
        
        <div class="user-dashboard clearfix">
            
            <!--Begin User Manager Col-->
            <div class="user-back-bg"></div>
            <div class="user-manager">
            	<div class="user-avatar clearfix">
                <?php wp_get_current_user(); ?>
                <?php  echo get_avatar( $comment, 32 );?>
	            	 <div class="user-meta">
	                <p class="user-name"><?php echo $current_user->display_name?></p>
                	</div>
                </div>    
                
               	<?php echo uf_get_current_user_manager_menu()?> 
            </div>
            <!--End User Manager Col-->            
         	<!--Begin User Dashboard Content-->
            <div class="dashboard-content">
				<div class="dashboard-body">


            <div class="dashboard-header clearfix">  
            	<!--<div class="dashboard-bar">
               <div class="dashboard-menu">

                        <a class="fa fa-edit" href="http://demo.themeshield.net/xscholar_university/user-action/?action=profile"></a>
                    	<a class="fa fa-sign-out" href="http://demo.themeshield.net/xscholar_university/user-action/?action=logout"></i></a>
                                                
                    </div>
                </div>-->
                <?php
				$user_google = get_user_meta( $current_user->ID, 'googleplus', true); 
				$user_facebook = get_user_meta( $current_user->ID, 'facebook', true); 
				$user_twitter = get_user_meta( $current_user->ID, 'twitter', true); 
				?>
                <div class="user-avatar clearfix">
                <?php  echo get_avatar( $comment, 80 );?>
                                   <div class="user-meta">
	                <p class="user-name"><?php echo $current_user->display_name?><span class="user-role"><?php echo uf_get_current_user_role()?></span></p>
                      <ul class="user-social-icon clearfix">
   <li><a target="_blank" href="<?php echo esc_url($user_twitter)?>" class="fa fa-twitter twitter"></a></li><li><a target="_blank" href="<?php echo esc_url($user_facebook)?>" class="fa fa-facebook facebook"></a></li><li><a target="_blank" href="<?php echo esc_url($user_google)?>" class="fa fa-google-plus google"></a></li>    
  </ul> 
                	</div>
                    
                    
	</div> 
    
    </div>    
    <!--End dashboard header-->
	<div class="ts-tab clearfix" role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs dashboard-tab"  role="tablist">
        	<li role="presentation" class="<?php if(uf_get_current_user_manager_page() == 'dashboard'){echo 'active';}?>"><a href="#dashboard">Dashboard</a></li>
            <li role="presentation" class="<?php if(uf_get_current_user_manager_page() == 'profile'){echo 'active';}?>"><a href="#profile">Profile</a></li>
            <li role="presentation" class="<?php if(uf_get_current_user_manager_page() == 'course'){echo 'active';}?>"><a href="#mycourses">My Courses</a></li>
            <li role="presentation" class="<?php if(uf_get_current_user_manager_page() == 'event'){echo 'active';}?>"><a href="#myevents">My Events</a></li>
            <li role="presentation" class="<?php if(uf_get_current_user_manager_page() == 'order'){echo 'active';}?>"><a href="#myorders">My Orders</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
        	<!--Dashboard Tab-->
            <div role="tabpanel" class="tab-pane <?php if(uf_get_current_user_manager_page() == 'dashboard'){echo 'active';}?>" id="dashboard">
  					<div class="row">
                    
                    <!--Display Course by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block blue">
                        
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#donecourse" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($done_course)?> <span><?php echo __('Done <br>Courses','spacex')?></span></a></li>
                            <li role="presentation"><a href="#unfinish" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($unfinish_course)?> <span><?php echo __('Unfinshed <br>Courses','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="donecourse">
                             	
                             	<ul class="nav-link border">
                                        <?php echo implode('',$done_course)?>                                                      
                                </ul>
                                
                             </div>
                              <div role="tabpanel" class="tab-pane" id="unfinish">
                            		<ul class="nav-link border">
                                         <?php echo implode('',$unfinish_course)?>                                                                                               
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    </div>
                    <!--End Display Course by User-->
                     <!--Display event by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block orange">

                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#comingevent" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($coming_event)?> <span><?php echo __('Coming<br>Events','spacex')?></span></a></li>
                            <li role="presentation"><a href="#finishevent" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($finish_event)?> <span><?php echo __('Finish <br>Events','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="comingevent">
                             	
                             	<ul class="nav-link border">
                                      <?php echo implode('',$coming_event)?>                                                        
                                </ul>
                                
                             </div>
                              <div role="tabpanel" class="tab-pane" id="finishevent">
                            		<ul class="nav-link border">
                                         <?php echo implode('',$finish_event)?>                                                                                              
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    </div>
                    <!--End Display event by User-->
                    
                                     
                   
                   
               
                   
                </div>
                
                <div class="row">
                    <div class="clearfix" style="margin-top:30px;"></div>
                     <!--Latest and featured courses-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    	<div class="db-block blue">
                    		<?php
                            $args = array(
								'post_type'	=> 'xcourse',
								'post_status' => 'publish',
								'ignore_sticky_posts'	=> 1,
								'posts_per_page'     => 5,
								'offset'          => 0,
								'orderby'         => 'date',
								'order'           => 'DESC',
							);
							
							$latest_courses = new WP_Query( $args );
							$echo_latest_courses = '';
							
							if ( $latest_courses->have_posts() ) :
								
								while ( $latest_courses->have_posts() ) : $latest_courses->the_post(); 
								$echo_latest_courses .= '<li><a href="'.get_permalink().'"><i class="fa fa-file-o"></i>'.get_the_title().'</a></li>';
								endwhile;	
								wp_reset_postdata();	
								
							endif;	
							
							$args = array(
								'post_type'	=> 'xcourse',
								'post_status' => 'publish',
								'posts_per_page'     => 5,
								'offset'          => 0,
								'orderby'         => 'date',
								'order'           => 'DESC',
								'meta_key' 		=> '_featured',
								'meta_value' 	=>  'true',
								'meta_compare' 	=>  'LIKE',
								
							);
							
							$featured_courses = new WP_Query( $args );
							$echo_featured_courses = '';
							
							if ( $featured_courses->have_posts() ) :
								
								while ( $featured_courses->have_posts() ) : $featured_courses->the_post(); 
								$echo_featured_courses .= '<li><a href="'.get_permalink().'"><i class="fa fa-bookmark-o"></i>'.get_the_title().'</a></li>';
								endwhile;	
								wp_reset_postdata();	
								
							endif;	
							
							?>
                            <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#lastestcourse" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo $latest_courses->post_count?> <span><?php echo __('Recent <br>Courses','spacex')?></span></a></li>
                            <li role="presentation"><a href="#featuredcourse" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo $featured_courses->post_count?> <span><?php echo __('Featured <br>Courses','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="lastestcourse">
                             	<ul class="nav-link border">
                                <?php echo $echo_latest_courses;?>                             	                                                                                               
                                </ul>
                             </div>
                              <div role="tabpanel" class="tab-pane" id="featuredcourse">
                            		<ul class="nav-link border">
                                  <?php echo $echo_featured_courses;?>                                                                                           
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                            
                        </div>
                    </div>
                   <!--End Latest and featured courses--> 
                   
                    
                  <!--Latest and featured courses-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    	<div class="db-block orange">
                    		<?php
                            $args = array(
								'post_type'	=> 'xevent',
								'post_status' => 'publish',
								'ignore_sticky_posts'	=> 1,
								'posts_per_page'     => 5,
								'offset'          => 0,
								'orderby'         => 'date',
								'order'           => 'DESC',
							);
							
							$latest_events = new WP_Query( $args );
							$echo_latest_events = '';
							
							if ( $latest_events->have_posts() ) :
								
								while ( $latest_events->have_posts() ) : $latest_events->the_post(); 
								$echo_latest_events .= '<li><a href="'.get_permalink().'"><i class="fa fa-file-o"></i>'.get_the_title().'</a></li>';
								endwhile;	
								wp_reset_postdata();	
								
							endif;	
							
							$args = array(
								'post_type'	=> 'xevent',
								'post_status' => 'publish',
								'posts_per_page'     => 5,
								'offset'          => 0,
								'orderby'         => 'date',
								'order'           => 'DESC',
								'meta_key' 		=> '_featured',
								'meta_value' 	=>  'true',
								'meta_compare' 	=>  'LIKE',
								
							);
							
							$featured_events = new WP_Query( $args );
							$echo_featured_events = '';
							
							if ( $featured_events->have_posts() ) :
								
								while ( $featured_events->have_posts() ) : $featured_events->the_post(); 
								$echo_featured_events .= '<li><a href="'.get_permalink().'"><i class="fa fa-bookmark-o"></i>'.get_the_title().'</a></li>';
								endwhile;	
								wp_reset_postdata();	
								
							endif;	
							
							?>
                           <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#lastestevent" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo $latest_events->post_count?> <span><?php echo __('Recent <br>Events','spacex')?></span></a></li>
                            <li role="presentation"><a href="#featuredevent" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo $featured_events->post_count?> <span><?php echo __('Featured <br>Events','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="lastestevent">
                             	<ul class="nav-link border">
                                <?php echo $echo_latest_events;?>                             	                                                                                               
                                </ul>
                             </div>
                              <div role="tabpanel" class="tab-pane" id="featuredevent">
                            		<ul class="nav-link border">
                                  <?php echo $echo_featured_events;?>                                                                                           
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                            
                        </div>
                    </div>
                   <!--End Latest and featured courses--> 
                   
                </div>
                
                <div class="row">
                   
                    <div class="clearfix" style="margin-top:30px;"></div>
                    
                    
                       <!--User Static-->              
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="db-block purple">
                                                        
                        <div class="user-total-spend clearfix">
            
                            <div class="count-order">
                                <h3>Total Spent</h3>
                                <div class="user-order-static green text-color complete-order"><?php echo $amount_complete.' '.  get_woocommerce_currency_symbol();?><span><?php echo __('Completed', 'spacex')?></span></div>
                                <div class="user-order-static text-color orange processing-order"><?php echo $amount_processing.' '.  get_woocommerce_currency_symbol();?><span><?php echo __('Processing', 'spacex')?></span></div>
                                <div class="user-order-static text-color blue onhold-order"><?php echo $amount_onhold.' '.  get_woocommerce_currency_symbol();?><span><?php echo __('On Hold', 'spacex')?></span></div>
                                
                            </div>
                            <br clear="all">
                            <div class="clearfix" style="margin-top:30px;"></div>
                            <div class="count-order">
                                <h3>Static</h3>
                                <ul class="list-style">
                                	<li><?php echo __('Member since:','spacex')?> <?php echo $current_user->user_registered?></li>
                                </ul>
                                
                            </div>
                        
                        </div>
                    
                    </div>
                </div>
      <!--End User Static-->                                  
                    
                    
                     <!--Comments-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    	<div class="db-block red">
                    	<?php
                          $args = array(
							'user_id' => $current_user->ID,
							'number' => 5, // how many comments to retrieve
							'status' => 'approve'
							);
					
						$comments = get_comments( $args );
						
						$approve_comment = array();
						if ( $comments )
						{
							
							foreach ( $comments as $c )
							{
								$approve_comment[] =  '<li><a href="'.get_comment_link( $c->comment_ID ).'"><i class="fa fa-comment"></i>'.$c->comment_content.'</a>, Posted on: '. mysql2date('m/d/Y', $c->comment_date).'"</li>';
							}
					
						}
						
						
						$args = array(
							'user_id' => $current_user->ID,
							'number' => 5, // how many comments to retrieve
							'status' => 'hold'
							);
					
						$comments = get_comments( $args );
						
						$unapprove_comment = array();
						if ( $comments )
						{
							
							foreach ( $comments as $c )
							{
								$unapprove_comment[] =  '<li><a href="'.get_comment_link( $c->comment_ID ).'"><i class="fa fa-comment-o"></i>'.$c->comment_content.'</a>, Posted on: '. mysql2date('m/d/Y', $c->comment_date).'"</li>';
							}
					
						}
						?>
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#comment" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($approve_comment)?> <span><?php echo __('Approved<br>Comments','spacex')?></span></a></li>
                            <li role="presentation"><a href="#reply" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($unapprove_comment)?> <span><?php echo __('Unapproved<br>Comments','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="comment">
                             	<ul class="nav-link border">
                                	<?php echo implode('',$approve_comment)?>                                                            
                                </ul>
                             </div>
                             
                          
                              <div role="tabpanel" class="tab-pane" id="reply">
                            		<ul class="nav-link border">
                                     <?php echo implode('',$unapprove_comment)?>                                                                                             
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                        
                        
                        </div>
                    </div>
                    <!--Counter-->
              
   
                    
                     <div class="clearfix" style="margin-bottom:30px"></div>
                    
                    
                     <!-- User Order-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="db-block">
                     <div class="user-static">
                      <h3><?php echo __('My Orders', 'spacex');?></h3>                  
                        <table class="shop_table my_account_orders">
                               <?php echo $order_row?>
                        </table> 
                        
                    </div>
                            
                        </div>
                    </div>
                   <!-- User Order-->
                   
              
                    
                    
                    
              </div>      
          
            </div>
            <!--End Tab Dashboard-->
            <!--Profile Tab-->
            <div role="tabpanel" class="tab-pane <?php  if(uf_get_current_user_manager_page() == 'profile'){echo 'active';}?>" id="profile">
            <?php
            // get profile user
			$user = get_userdata( get_current_user_id() );
			$user->filter = 'edit';
			$profileuser = $user;
			?>
            	<?php echo apply_filters( 'uf_profile_messages', isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '' ); ?>
                
            	<form id="profile-form" action="<?php echo uf_get_action_url( 'profile' ); ?>" method="post" <?php do_action( 'user_edit_form_tag' ); ?>>
				<?php wp_nonce_field( 'profile', 'wp_uf_nonce_profile' ); ?>

				<h3><?php _e( 'Name','spacex' ) ?></h3>

				<table class="form-table" cellpadding="7">
					<tr>
						<th><label for="user_login"><?php _e( 'Username', 'spacex' ); ?></label></th>
						<td><input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="regular-text" /> <span class="description"><?php _e( 'Usernames cannot be changed.','spacex' ); ?></span></td>
					</tr>

					<tr>
						<th><label for="first_name"><?php _e( 'First Name', 'spacex' ) ?></label></th>
						<td><input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ) ?>" class="regular-text" /></td>
					</tr>

					<tr>
						<th><label for="last_name"><?php _e( 'Last Name' , 'spacex') ?></label></th>
						<td><input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $profileuser->last_name ) ?>" class="regular-text" /></td>
					</tr>

					<tr>
						<th><label for="nickname"><?php _e( 'Nickname', 'spacex' ); ?> <span class="description"><?php _e( '(required)','spacex' ); ?></span></label></th>
						<td><input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ) ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th><label for="display_name"><?php _e( 'Display name publicly as' , 'spacex') ?></label></th>
						<td>
							<select name="display_name" id="display_name">
							<?php
								$public_display = array();
								$public_display[ 'display_nickname' ] = $profileuser->nickname;
								$public_display[ 'display_username' ] = $profileuser->user_login;

								if ( ! empty( $profileuser->first_name ) )
									$public_display[ 'display_firstname' ] = $profileuser->first_name;

								if ( ! empty( $profileuser->last_name ) )
									$public_display[ 'display_lastname' ] = $profileuser->last_name;

								if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
									$public_display[ 'display_firstlast' ] = $profileuser->first_name . ' ' . $profileuser->last_name;
									$public_display[ 'display_lastfirst' ] = $profileuser->last_name . ' ' . $profileuser->first_name;
								}

								if ( ! in_array( $profileuser->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
									$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

								$public_display = array_map( 'trim', $public_display );
								$public_display = array_unique( $public_display );

								foreach ( $public_display as $id => $item ) { ?>
									<option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
								<?php }
							?>
							</select>
						</td>
					</tr>
				</table>

				<h3><?php _e( 'Contact Info','spacex' ) ?></h3>

				<table class="form-table" cellpadding="7">
					<tr>
						<th><label for="email"><?php _e( 'E-mail','spacex' ); ?> <span class="description"><?php _e( '(required)','spacex' ); ?></span></label></th>
						<td><input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ) ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th><label for="url"><?php _e( 'Website','spacex' ) ?></label></th>
						<td><input type="text" name="url" id="url" value="<?php echo esc_attr( $profileuser->user_url ) ?>" class="regular-text code" /></td>
					</tr>
					<?php foreach ( _wp_get_user_contactmethods( $profileuser ) as $name => $desc ) { ?>
					<tr>
						<th><label for="<?php echo esc_attr($name); ?>"><?php echo apply_filters('user_'.$name.'_label', $desc); ?></label></th>
						<td><input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr( $profileuser->$name) ?>" class="regular-text" /></td>
					</tr>
					<?php } ?>
				</table>

				<h3><?php _e( 'About Yourself','spacex' ); ?></h3>

				<table class="form-table" cellpadding="7">
					<tr>
						<th><label for="description"><?php _e( 'Biographical Info','spacex' ); ?></label></th>
						<td><textarea name="description" id="description" rows="5" cols="30"><?php echo $profileuser->description; // textarea_escaped ?></textarea><br />
						<span class="description"><?php _e( 'Share a little biographical information to fill out your profile. This may be shown publicly.','spacex' ); ?></span></td>
					</tr>

					<?php
					$show_password_fields = apply_filters( 'show_password_fields', TRUE, $profileuser );
					if ( $show_password_fields ) { ?>
						<tr id="password">
							<th><label for="pass1"><?php _e( 'New Password','spacex' ); ?></label></th>
							<td><input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" /> <span class="description"><?php _e( 'If you would like to change the password type a new one. Otherwise leave this blank.','spacex' ); ?></span><br />
								<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /> <span class="description"><?php _e( 'Type your new password again.','spacex' ); ?></span><br />
								<div id="pass-strength-result"><?php _e( 'Strength indicator','spacex' ); ?></div>
								<p class="description indicator-hint"><?php _e( 'Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).' ,'spacex'); ?></p>
							</td>
						</tr>
					<?php } ?>
				</table>

				<?php do_action( 'show_user_profile', $profileuser ); ?>
				<br>
                <br>
				<input type="submit" name="submit" id="submit" value="<?php _e( 'Update Profile', 'spacex' ); ?>">

			</form>	
            
			
            </div>
            <!--End Profile Tab-->
            <!--Course Tab-->
            <div role="tabpanel" class="tab-pane <?php  if(uf_get_current_user_manager_page() == 'course'){echo 'active';}?>" id="mycourses">   
            	<div class="row">
                 <!--Display Course by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block blue">
                        
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#donecourse" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($all_done_course)?> <span><?php echo __('Done <br>Courses','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="donecourse">
                             	
                             	<ul class="nav-link border">
                                        <?php echo implode('',$all_done_course)?>                                                      
                                </ul>
                                
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    </div>
                    <!--End Display Course by User-->
                     <!--Display Course by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block purple">
                        
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                         
                            <li role="presentation" class="active"><a href="#unfinish" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($all_unfinish_course)?> <span><?php echo __('Unfinshed <br>Courses','spacex')?></span></a></li>
                            
                        </ul>
                        
                      
                              <div role="tabpanel" class="tab-pane" id="unfinish">
                            		<ul class="nav-link border">
                                         <?php echo implode('',$all_unfinish_course)?>                                                                                               
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    
                    <!--End Display Course by User-->
                    <div class="clearfix" style="margin-bottom:30px;"></div>
              	</div>    
            </div>
            <!--End Course Tab-->
            <!--Event Tab-->
              <div role="tabpanel" class="tab-pane <?php if(uf_get_current_user_manager_page() == 'event'){echo 'active';}?>" id="myevents">   
            	<div class="row">
                 <!--Display event by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block orange">
                        
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#allcomingevents" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($all_coming_event)?> <span><?php echo __('Coming <br>Event','spacex')?></span></a></li>
                            
                        </ul>
                        
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="allcomingevents">
                             	
                             	<ul class="nav-link border">
                                        <?php echo implode('',$all_coming_event)?>                                                      
                                </ul>
                                
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    </div>
                    <!--End Display event by User-->
                     <!--Display event by User-->
                	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
                    	<div class="db-block purple">
                        
                        <div class="quick-tab">
                         <ul class="nav nav-tabs" role="tablist">
                         
                            <li role="presentation" class="active"><a href="#allfinishevent" aria-controls="dashboard" role="tab" data-toggle="tab"><?php echo count($all_finish_event)?> <span><?php echo __('Finish<br>Events','spacex')?></span></a></li>
                            
                        </ul>
                        
                      
                              <div role="tabpanel" class="tab-pane" id="allfinishevent">
                            		<ul class="nav-link border">
                                         <?php echo implode('',$all_finish_event)?>                                                                                               
                                    </ul>
                             </div>
                         </div>
                         
                         </div>
                         
                         
                        
                        </div>
                    
                    <!--End Display event by User-->
                    <div class="clearfix" style="margin-bottom:30px;"></div>
              	</div>    
            </div>
            <!--End Event Tab-->
            <!--Order Tab-->
            <div role="tabpanel" class="tab-pane <?php if(uf_get_current_user_manager_page() == 'order'){echo 'active';}?>" id="myorders">
            	 
               <!--Single Order-->                
               <?php
               if(isset($_GET['view_order']))
			   {
				
                   $order_id = $_GET['view_order'];
				  
                   $order = wc_get_order( $order_id );
?>
<h2><?php _e( 'Order Details', 'woocommerce' ); ?> - <?php echo $order_id?></h2>
<table class="shop_table order_details">
	<thead>
		<tr>
			<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ( sizeof( $order->get_items() ) > 0 ) {

			foreach( $order->get_items() as $item ) {
				$_product     = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
				$item_meta    = new WC_Order_Item_Meta( $item['item_meta'], $_product );

				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
					<td class="product-name">
						<?php
							if ( $_product && ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
							else
								echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );

							echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item );

							$item_meta->display();

							if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

								$download_files = $order->get_item_downloads( $item );
								$i              = 0;
								$links          = array();

								foreach ( $download_files as $download_id => $file ) {
									$i++;

									$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'woocommerce' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
								}

								echo '<br/>' . implode( '<br/>', $links );
							}
						?>
					</td>
					<td class="product-total">
						<?php echo $order->get_formatted_line_subtotal( $item ); ?>
					</td>
				</tr>
				<?php

				if ( $order->has_status( array( 'completed', 'processing' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
					?>
					<tr class="product-purchase-note">
						<td colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>
					</tr>
					<?php
				}
			}
		}

		do_action( 'woocommerce_order_items_table', $order );
		?>
	</tbody>
	<tfoot>
	<?php
		if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
			?>
			<tr>
				<th scope="row"><?php echo $total['label']; ?></th>
				<td><?php echo $total['value']; ?></td>
			</tr>
			<?php
		endforeach;
	?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<header>
	<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
</header>
<dl class="customer_details">
<?php
	if ( $order->billing_email ) echo '<dt>' . __( 'Email:', 'woocommerce' ) . '</dt><dd>' . $order->billing_email . '</dd>';
	if ( $order->billing_phone ) echo '<dt>' . __( 'Telephone:', 'woocommerce' ) . '</dt><dd>' . $order->billing_phone . '</dd>';

	// Additional customer details hook
	do_action( 'woocommerce_order_details_after_customer_details', $order );
?>
</dl>

<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

<div class="col2-set addresses">

	<div class="col-1">

<?php endif; ?>

		<header class="title">
			<h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
		</header>
		<address>
			<?php
				if ( ! $order->get_formatted_billing_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address();
			?>
		</address>

<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

	</div><!-- /.col-1 -->

	<div class="col-2">

		<header class="title">
			<h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
		</header>
		<address>
			<?php
				if ( ! $order->get_formatted_shipping_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address();
			?>
		</address>

	</div><!-- /.col-2 -->

</div><!-- /.col2-set -->

<?php endif; ?>

<div class="clear"></div>

                   
                   <?php
				   
			   }
			   ?>
               <!--End Single Order-->           
              <!--Begin My Orders-->   
           <div class="db-block" style="margin-top:60px; clear:both;">
           	<div class="user-static">
              <h3><?php echo __('My Orders', 'spacex');?></h3>                  
                    <table class="shop_table my_account_orders">
                            <?php echo $order_row?>
                    </table>
                    </div>
            </div>                   
             <!--End My Orders-->               
            </div>
            <!--End Order Tab-->
        </div>
    
	</div>
                    
                    
              
            </div>
            <div class="clearfix"></div>
            </div>
            <!--End User Dashboard Content-->
            
            </div>
            
   
        </div>
    
</section>


<?php get_footer(); ?>            
        