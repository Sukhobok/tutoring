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

			<a href="{{ Alias::getURL('Subject', 1) }}">Algebra Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 2) }}">Calculus Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 3) }}">Statistics Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 4) }}">Geometry Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Computer Tutors</b></p><br />

			<a href="{{ Alias::getURL('Subject', 102) }}">HTML Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 118) }}">PHP Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 1) }}">Objective C Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 110) }}">Javascript Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Science Tutors</b></p><br />

			<a href="{{ Alias::getURL('Subject', 32) }}">Biology Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 29) }}">Chemistry Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 30) }}">Physics Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 40) }}">Psychology Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Language Tutors</b></p><br />

			<a href="{{ Alias::getURL('Subject', 50) }}">Spanish Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 53) }}">German Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 52) }}">French Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 56) }}">Chinese Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>English Tutors</b></p><br />

			<a href="{{ Alias::getURL('Subject', 17) }}">Writing Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 16) }}">Reading Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 20) }}">Essay Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 19) }}">Grammar Tutors</a>
		</div>
		<div style="float: left; width: 160px;">
			<p><b>Business Tutors</b></p><br />

			<a href="{{ Alias::getURL('Subject', 84) }}">Economics Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 81) }}">Accounting Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 87) }}">Marketing Tutors</a><br />
			<a href="{{ Alias::getURL('Subject', 93) }}">Human Resources Tutors</a>
		</div>
		<div class="clear"></div>

		<div style="font-size: 12px; text-align: right; padding-top: 32px;">
			&copy; 2013 Study Square, LLC. All Rights Reserved
		</div>
	</div>
</footer>
