<footer>
	<div class="content">
		<div style="float: left; width: 320px;">
			<a href="{{ URL::to('/') }}">
				{{ HTML::image('images/logo.jpg', 'StudySquare') }}
			</a>
			<br /><br />
			Works best in <br />
			<a href="http://www.google.com/chrome">
				{{ HTML::image('images/chrome.png', 'Google Chrome') }}
			</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Legal</b></p><br />

			<a href="{{ URL::to('site/terms') }}">Terms of service</a><br />
			<a href="{{ URL::to('site/privacy') }}">Privacy policy</a><br />
			<a href="{{ URL::to('site/cookie') }}">Cookie policy</a><br />
			<a href="http://support.studysquare.com/contact-us/">Contact Us</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>About Us</b></p><br />

			<a href="#">Get to know us</a><br />
			<a href="#">In the news</a><br />
			<a href="#">Our Mission</a><br />
			<a href="#">Testimonials</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Resources</b></p><br />

			<a href="http://blog.studysquare.com/">Blog</a><br />
			<a href="http://support.studysquare.com/">Support Cener</a><br />
			<a href="http://support.studysquare.com/become-a-study…representative/‎">Become a University Rep</a><br />
			<a href="{{ URL::to('settings/tutor_center') }}">Start Tutoring</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Connect with us</b></p><br />

			<a href="https://www.facebook.com/studysquareusa">Facebook</a><br />
			<a href="https://twitter.com/studysquareusa">Twitter</a><br />
			<a href="https://plus.google.com/+Studysquareusa/">Google +</a><br />
			<a href="http://www.youtube.com/TheStudySquare">YouTube</a>
		</div>
		<div class="clear"></div>

		<br /><hr><br />

		<div style="float: left; width: 160px;">
			<p><b>Math Tutors</b></p><br />

			<a href="link-to(1, 6)">Algebra Tutors</a><br />
			<a href="link-to(2, 6)">Calculus Tutors</a><br />
			<a href="link-to(3, 6)">Statistics Tutors</a><br />
			<a href="link-to(4, 6)">Geometry Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Computer Tutors</b></p><br />

			<a href="link-to(102, 6)">HTML Tutors</a><br />
			<a href="link-to(118, 6)">PHP Tutors</a><br />
			<a href="link-to(1, 6)">Objective C Tutors</a><br />
			<a href="link-to(110, 6)">Javascript Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Science Tutors</b></p><br />

			<a href="link-to(32, 6)">Biology Tutors</a><br />
			<a href="link-to(29, 6)">Chemistry Tutors</a><br />
			<a href="link-to(30, 6)">Physics Tutors</a><br />
			<a href="link-to(40, 6)">Psychology Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Language Tutors</b></p><br />

			<a href="link-to(50, 6)">Spanish Tutors</a><br />
			<a href="link-to(53, 6)">German Tutors</a><br />
			<a href="link-to(52, 6)">French Tutors</a><br />
			<a href="link-to(56, 6)">Chinese Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>English Tutors</b></p><br />

			<a href="link-to(17, 6)">Writing Tutors</a><br />
			<a href="link-to(16, 6)">Reading Tutors</a><br />
			<a href="link-to(20, 6)">Essay Tutors</a><br />
			<a href="link-to(19, 6)">Grammar Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Business Tutors</b></p><br />

			<a href="link-to(84, 6)">Economics Tutors</a><br />
			<a href="link-to(81, 6)">Accounting Tutors</a><br />
			<a href="link-to(87, 6)">Marketing Tutors</a><br />
			<a href="link-to(93, 6)">Human Resources Tutors</a>
		</div>
		<div class="clear"></div>

		<div style="font-size: 12px; text-align: right; padding-top: 32px;">
			&copy; 2013 Study Square, LLC. All Rights Reserved
		</div>
	</div>
</footer>

{{-- For testing only: --}}
<script src="/js/plugins/socket.io-v0.9.16.min.js"></script>
<script type="text/javascript">
	var socket = io.connect('http://192.168.0.100:53101');
</script>
