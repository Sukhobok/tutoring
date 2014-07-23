<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Define Charset -->
    <meta charset="utf-8"/>

    <!-- Page Title -->
    <title>StudySquare</title>

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheet
	===================================================================================================	 -->
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements --><!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!-- styles for IE --><!--[if lte IE 8]>
    <link rel="stylesheet" href="/themes/university/css/ie/ie.css" type="text/css" media="screen"/><![endif]-->
	
	<!-- Bootstrap -->
	<link href="/themes/university/css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/themes/university/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
 
	<!-- Grid galery -->
	<noscript><link rel="stylesheet" type="text/css" href="/themes/university/css/grid/fallback.css" /></noscript>	
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="/themes/university/css/grid/fallback.css" /><![endif]-->
		
    <!-- styles radios checkboxes -->    
	<!--[if IE 7]><link rel="stylesheet" href="/themes/university/css/jstyling-ie7Fixes.css" type="text/css" media="screen" /><![endif]-->

	<!-- Custom Template Styles -->
    <link href="/themes/university/css/style.css" rel="stylesheet" media="screen">

	<!-- Media Queries -->
    <link href="/themes/university/css/media-queries.css" rel="stylesheet" media="screen">

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/themes/university/img/icons/favicon.ico">
    <link rel="apple-touch-icon" href="/themes/university/img/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/themes/university/img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/themes/university/img/icons/apple-touch-icon-114x114.png">


</head>


<body>

	<header>
    	<div class="container clearfix">
            <!--logo-->
            <a href="./" id="logo" class="pull-left"> 
                <img src="/images/logo_beta.png" alt="logo">
            </a>
            
            <div class="pull-right">
            	
	            <div id="lang-menu" class="btn-group pull-right">
				  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				    <img src="/themes/university/img/flags/us.png" alt="" />
				    <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a href=""><img src="/themes/university/img/flags/us.png" alt="" />USA</a></li>
				    <li><a href=""><img src="/themes/university/img/flags/es.png" alt="" />Spain</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/br.png" alt="" />Brazil</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/jp.png" alt="" />Japan</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/id.png" alt="" />Indonesia</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/ca.png" alt="" />Canada</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/ro.png" alt="" />Romania</a></li>
                    <li><a href=""><img src="/themes/university/img/flags/fi.png" alt="" />Finland</a></li>
				  </ul>
				</div>
	            
	            <div class="btn-login pull-right">
	            	<a href="#"><span class="toggle"></span><span class="toggleText">Member Login</span></a>
	            	{{ Form::open(array('url' => 'login', 'class' => 'form-inline')) }}
	            	
		            	<div class="input-prepend">
						  <span class="add-on"><i class="icon-user"></i></span>
						  {{ Form::text('email', '', array('placeholder' => 'Email', 'class' => 'span2', 'id' => 'prependedInput')) }}
						</div>
		            	<div class="input-prepend">
						  <span class="add-on"><i class="icon-lock"></i></span>
						  {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'span2 input-small', 'id' => 'prependedInput2')) }}
						</div>
		   			    <button type="submit" class="btn">Sign in</button>
					{{ Form::close() }}
	            </div>
            
            </div>		
            
           
        </div>
    </header>
    
		    
    <!-- Slider -->
    <section class="join-form">
    	<div class="slider-container">
		    <ul class="rslides" id="slider">
			  <li><img src="/themes/university/img/slider/img-1.jpg"  alt="//"/></li>
			  <li><img src="/themes/university/img/slider/img-2.jpg"  alt="//"/></li>
			  <li><img src="/themes/university/img/slider/img-3.jpg"  alt="//"/></li>
		    </ul>
	    </div>
	    <div class="container">
	    	<div class="row-fluid">
	    		<div class="span12">
	    			<div class="form-container pull-right box animated pulse">
	    				{{ Form::open(array('url' => 'signup', 'id' => 'ss-joinForm')) }}
						   <fieldset>
						    
						    <legend class="text-center nb nm"><span>Sign Up</span></legend>
						    <p class="text-center">Create a FREE account</p>
						    
						    
						    <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Name</label>
								    {{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => $input_classes['name'])) }}
						    	</div>
						    </div>

						    <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">E-mail address</label>
								    {{ Form::email('email', Input::old('email'), array('placeholder' => 'E-mail address', 'class' => $input_classes['email'])) }}
						    	</div>
						    </div>

						    <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Password</label>
								    {{ Form::password('password', array('placeholder' => 'Password', 'class' => $input_classes['password'])) }}
						    	</div>
						    </div>

						    <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Retype Password</label>
								    {{ Form::password('password_confirmation', array('placeholder' => 'Retype Password', 'class' => $input_classes['password_confirmation'])) }}
						    	</div>
						    </div>
                            
						    <div class="row-fluid">
						    	<div class="span12">	
						    		<div class="row-fluid">
									    <select name="you_are" class="selectpicker span12">
									    	<option value="" disabled selected>You are a:</option>
										  	<option value="s">Student</option>
										  	<option value="t">Teacher</option>       
										</select>
									</div>
						    	</div>
						    </div>
						    
						    		
				    		<div class="formFoot">
				    			<button type="submit" class="btn">Create Account</button>
				    			<span class="leftSide">
				    				
				    			</span>
				    			<span class="rightSide">
				    				
				    			</span>
				    		</div>
				    		
								    
						    <span class="help-block text-center footForm">By signing up you agree our <a href="#">Terms</a> and <a href="#">Privacy Policy</a></span>

						  </fieldset>
						{{ Form::close() }}
	    			</div>	    			
	    		</div>
	    	</div>
	    </div>
    </section>
    <!-- End Slider -->



    <!--Video List-->
     <section class="video generic-section  text-center">
     	<div class="container">	

        	<h2 class="left">Study Square offers a new social learning environment that promotes higher education for all!</h2>
            <p class="intro-text right"><em>Share your knowledge with the Study Square community by being a part of our exciting tutor program! Build relationships while you help others expand their knowledge and abilities. If you prefer one-on-one tutoring sessions, you have found the right place. Join Study Square for FREE and begin tutoring students who need your help today!</em></p>
	        
		 	<div class="row-fluid">
	        	<div class="span7 left">
	            	<div id="video">
	            		<iframe width="800" height="450" src="//www.youtube.com/embed/zHSeJOJM7mg" frameborder="0" allowfullscreen></iframe>
	                </div>
	            </div>
	            <div class="span5 right">	            	
	            	<ul class="list-features text-left">
	                	<li>Increase Your Gpa</li>
	                    <li>Collaborate With Other Students Around The World</li>
	                    <li>Hire Tutors Immediately</li>
	                    <li>Start Tutoring Sessions Instantly With Your Choice Of Tutor</li>
	                    <li>Record Your Sessions And Watch Anytime</li>
	                </ul>
	            </div>
	        </div> 	
        </div>
     </section>  
     <!--End Video List-->    

    
    
    <!-- Features -->
	<section class="items tips first generic-section  text-center">
		<div class="container">    		
		<h2 class="left">Broaden Horizons by Bringing Your Expertise<br /> to the Study Square Community</h2>
		<p class="intro-text right"><em>Study Square lets you earn income while making a difference in the life of another. Our diverse community knows no geographic boundaries. That means there is someone out there who wants to learn a skill or explore knowledge you have. Join us today and get in touch with ambitious learners who are searching for educators and instructors just like you!</em></p>
		<div class="clear"></div>
		<div class="row-fluid bottom">
        	<div class="span4 item ss-bg first">
            	<span class="ico"></span>
                <h4>Connect with Learners</h4>
                <p>Make new friends while exchanging knowledge and helping others find personal and professional fulfillment through learning.</p>
            </div>
            <div class="span4 item ss-bg second">
            	<span class="ico"></span>
                <h4>Join Groups</h4>
                <p>Participate in groups and explore your favorite subjects or interests with those who share your passion!</p>
            </div>
            <div class="span4 item ss-bg third">
            	<span class="ico"></span>
                <h4>Market Your Skills</h4>
                <p>Tap into a diverse community that wants to learn. Build a reputation and market yourself the cost effective way!</p>
            </div>
        </div>
        </div>
	</section><!-- .container -->
	<!-- end Features -->
    

    <!-- Why -->
	<section class="items tips why generic-section  text-center">
		<div class="container">    		
		<h2 class="left">Online Tutoring</h2>
		<p class="intro-text right"><em>Earn extra cash and expand your reach by supplying instruction to those seeking it!</em></p>
		<div class="clear"></div>
		<div class="row-fluid bottom">
        	<div class="span4 item first">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-1.jpg" alt="//" />
            		<span><em>Flexible Scheduling</em></span>
            	</div>                
                <p>Tutoring sessions fit comfortably into any schedule, no matter how hectic or unusual it may be!</p>
            </div>
            <div class="span4 item second">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-2.jpg" alt="//" />
            		<span><em>Get Paid After Sessions</em></span>
            	</div>                
                <p>Don’t wait weeks for a payout. Tutoring fees are collected as soon as the session is over.</p>
            </div>
            <div class="span4 item third">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-3.jpg" alt="//" />
            		<span><em>Video<br /> Tutoring</em></span>
            	</div>                
                <p>Make the experience personal through face to face interactions via online video tutoring.</p>
            </div>
        </div>

        <div class="row-fluid bottom">
        	<div class="span4 item first">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-4.jpg" alt="//" />
            		<span><em>Learning Tools</em></span>
            	</div>                
                <p>We provide everything you need to make schedule and session management as convenient as possible.</p>
            </div>
            <div class="span4 item second">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-5.jpg" alt="//" />
            		<span><em>Rate and Earn Ratings</em></span>
            	</div>                
                <p>Exchange feedback and make a name for yourself in the Study Square community!</p>
            </div>
            <div class="span4 item third">
            	<div class="avatar">
            		<img src="/themes/university/img/why/img-6.jpg" alt="//" />
            		<span><em>Send Files Instantly</em></span>
            	</div>                
                <p>Homework and study material can be sent in seconds with our built-in file sharing system.</p>
            </div>
        </div>
        </div>
	</section><!-- .container -->
	<!-- end Why -->


     <!--Testimonials-->
     <section class="testimonials">
     	<div class="container">
            <div class="row-fluid bottom">
            	<div class="span12">
                    <ul class="list-testimonials" id="slider2">
                        <li>
                            <img class="img-circle" src="/themes/university/img/testimonials/img-avatar.png" alt="testimonial image" />
                            <p class="comment">“When I was applying to Univeristy, I had so many questions! The admissions department and staff were wonderful”</p>
                            <p class="date"><span></span> RECEIVE SUPPORT 24/7</p>
                        </li>
                        <li>
                            <img class="img-circle " src="/themes/university/img/testimonials/img-avatar-2.png" alt="testimonial image" />
                            <p class="comment">“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy tex”</p>
                            <p class="date"><span></span> RECEIVE SUPPORT 24/7</p>
                        </li>            		            	
                    </ul>
                </div>
            </div>
        </div>
     </section>
     <!--End Testimonials-->
    
    
    
	<!--Image Gallery-->
	<section class="generic-section wall text-center">
		<div class="container">
	        <h2 class="keft">real students arrownd the world</h2>
	        <p class="intro-text right"><em>Donec felis nisl, scelerisque nec porttitor sed, scelerisque sed tortor. Quisque quis nisl neque. Nec lobortis  <br> 
            amet consectetur rem ipsum dolor sit amet, consectetur pisici do eiusmod tempor.</em></p>
		</div>
		<div class="row-fluid">
			<div id="screenshot" class="span12">
				
	   		
				<div class="row-fluid bottom">
					<div class="span12">
						<div id="ri-grid" class="ri-grid ri-grid-size-2">
							<img class="ri-loading-image" src="/themes/university/img/loading.gif" alt="//"/>
							<ul>
								@foreach (DB::table('users')->take(50)->get() as $user)
									<li>
										<a href="{{ URL::route('user.view', $user->id) }}">
											<img src="{{ HTML::profile_picture($user) }}" alt="StudySquare User" />
										</a>
									</li>
								@endforeach

								<!-- <li><a href="#"><img src="/themes/university/img/medium/1.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/2.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/3.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/4.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/5.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/6.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/7.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/8.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/9.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/10.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/11.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/12.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/13.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/14.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/15.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/16.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/17.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/18.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/19.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/20.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/21.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/22.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/23.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/24.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/25.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/26.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/27.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/28.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/29.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/30.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/31.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/32.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/33.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/34.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/35.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/36.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/37.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/38.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/39.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/40.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/41.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/42.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/43.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/44.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/45.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/46.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/47.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/48.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/49.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/50.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/51.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/52.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/53.jpg" alt="//" /></a></li>
								<li><a href="#"><img src="/themes/university/img/medium/54.jpg" alt="//" /></a></li> -->
							</ul>
						</div>
						
					</div>
	    		</div>
			</div>
		</div>
	</section>
	<!-- End Image Gallery-->
    
       
    
    <!--Pricing-->
    <!--
    <section class="pricing text-center generic-section">
    	<div class="container">
		  <h2 class="left">Online Exclusive plans</h2>
		  <p class="intro-text right"><em>Donec felis nisl, scelerisque nec porttitor sed, scelerisque sed tortor. Quisque quis nisl neque. Nec lobortis  <br>
           amet consectetur rem ipsum dolor sit amet, consectetur pisici do eiusmod tempor.</em></p>
       
	      <div class="row-fluid">		
	              
	          <div class="span4 item left">
	              <h3><em>Undergraduate</em></h3>
	              <ul>
	                  <li>Master of Business Administration</li>
	                  <li>Master of Information Technology</li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in Information</li> 
	                  <li>Systems Management</li>
	                  <li>Graduate Certificate in IT </li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in TESOL</li>
	              </ul>
	              <a href="" class="btn btn-large">register now</a>
	          </div>  	
	              
	          <div class="span4 item bottom">
	              <h3><em>Bachelor’s</em></h3>
	              <ul>
	                  <li>Master of Business Administration</li>
	                  <li>Master of Information Technology</li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in Information</li> 
	                  <li>Systems Management</li>
	                  <li>Graduate Certificate in IT </li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in TESOL</li>
	              </ul>
	              <a href="" class="btn btn-large">register now</a>
	          </div>  
	              
	          <div class="span4 item right">
	              <h3><em>Master’s</em></h3>
	              <ul>
	                  <li>Master of Business Administration</li>
	                  <li>Master of Information Technology</li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in Information</li> 
	                  <li>Systems Management</li>
	                  <li>Graduate Certificate in IT </li>
	                  <li>Master of Software Engineering</li>
	                  <li>Graduate Certificate in TESOL</li>
	              </ul>
	              <a href="#" class="btn btn-large">register now</a>
	          </div>  		
	      </div>
      </div>
    </section>
    -->
    <!-- end pricing --> 
    
    
    
    
    <!--Newsletter-->
     <section class="newsletter">
     	<div class="container">
            <div class="row-fluid">
            	<div class="span12">
            		<form id="newsletter" class="formNewsletter nm" action="index_submit" method="post" accept-charset="utf-8">
						<div id="loadingNews" style="display: none" class='alert'>
			  				<a class='close' data-dismiss='alert'>×</a>Loading
						</div>	
		            	<div id="responseNews"></div>
						<div class="row-fluid">
							<div class="span12 fields">
								<label class="left">Stay in touch by email for updates and offers</label>
								<div class="right">
									<input type="text" class="large" placeholder="Your email here..." name="Email" value="" />	
									<input class="btn btn-large btn-primary" type="submit" name="submit" value="SUSCRIBE NOW" id="submit"/>
								</div>
							</div>	
						</div>
					</form>
            	</div>
            </div>
        </div>
     </section>
     <!--End Newsletter-->
    
    <!--Footer-->
	 <div class="footer">
		 <section class="container generic-section">
			<div class="row-fluid">	
            			
	    		<div class="span3 item left">
	    			<h3>About StudySquare</h3>
	    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ligula vel diam 
	    			congue semper.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus</p>
	    			<p>Ligula vel diam congue semper.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus</p>
	    		</div>  	

	    		<div class="span3 item left">
	    			<h3>Contact Us</h3>
	    			
					<p><i class="icon-mail-alt"></i> <a href="mailto:info@company.com?subject=feedback">info@company.com</a><br />
					<i class="icon-phone"></i> (123) 456-7890<br />
					<i class="icon-home"></i> 15465 Stick Street <br />
					New Orleans, LA 626, USA</p>
	    		</div>  	
                	
	    		<div class="span3 item right">
	    			<h3>Popular Subjects</h3>
					<p><a href="#">+ PHP</a></p>
					<p><a href="#">+ Java</a></p>
					<p><a href="#">+ HTML</a></p>
					<p><a href="#">+ Javascript</a></p>
					<p><a href="#">+ Algebra</a></p>	
	    		</div>  
              
	    		<div class="span3 item right">
	    			<h3>Stay in Touch!</h3>
	    			<p>Follow US in our social networks!<br />
					Lorem ipsum dolor sit amet, consectetur and go adipiscing elit.</p>
					<ul class="social">
						<li class="tooltip_hover" title="" data-original-title="Linkedin"><a href="#" class="in">Linked In</a></li>
						<li class="tooltip_hover" title="" data-original-title="Youtube"><a href="#" class="youtube">Linked In</a></li>
						<li class="tooltip_hover" title="" data-original-title="Facebook"><a href="#" class="facebook">Linked In</a></li>
						<li class="tooltip_hover" title="" data-original-title="Twitter"><a href="#" class="twitter">Linked In</a></li>
					</ul>
	    		</div>  		
			</div>
		</section>
	</div>
	<!-- End Footer -->  
        	
    
    <!--Copyright-->
	 <div class="copy">
     	<section class="container">
			<p>© 2013 StudySquare, LLC. All Rights Reserved</p>
		</section>
	</div>
    <!--End Copyright-->
 
    
    
    
	    
	<!-- ======================= JQuery libs =========================== -->
		<script type="text/javascript" src="/themes/university/js/jquery-1.8.2.min.js"></script>
        
        <!-- Bootstrap.js-->
        <script src="/themes/university/js/bootstrap.js" type="text/javascript"></script>
        <script src="/themes/university/js/bootstrap-select.min.js" type="text/javascript"></script>
        
        <!-- Gallery -->
        <script type="text/javascript" src="/themes/university/js/modernizr.custom.26633.js"></script>
        <script type="text/javascript" src="/themes/university/js/jquery.gridrotator.js"></script>
        
        <!-- Slider -->
        <script type="text/javascript" src="/themes/university/js/responsiveslides.min.js"></script>
        
        <!-- Controls styles -->
        <script type="text/javascript" src="/themes/university/js/jquery.jstyling.min.js"></script>
        
        <!-- Video Responsive-->
        <script src="/themes/university/js/jquery.fitvids.min.js" type="text/javascript"></script>
        
        <!-- easing plugin ( optional ) -->
        <script src="/themes/university/js/easing.js" type="text/javascript"></script>
        
        <!-- UItoTop plugin -->
        <script src="/themes/university/js/jquery.ui.totop.min.js" type="text/javascript"></script>
        
        <!--  Waypoints -->
        <script type="text/javascript" src="/themes/university/js/waypoints.min.js"></script>
        
        <!-- Template custom script  -->
        <script type="text/javascript" src="/themes/university/js/jquery-func.js"></script>
	<!-- ======================= End JQuery libs ======================= -->
	    
    
    


</body>
</html>