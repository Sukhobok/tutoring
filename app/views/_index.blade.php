<div id="index_top">
	<div class="content">
		<div class="description">
			<p>Study Square offers a new social learning</p><br />
			<p>environment that promotes higher </p><br />
			<p>education for all!</p><br />
		</div>

		<div class="video_tour">
			<iframe width="361" height="203" src="//www.youtube.com/embed/zHSeJOJM7mg" frameborder="0" allowfullscreen></iframe>			
		</div>

		{{ Form::open(array('url' => '/', 'class' => 'create-account')) }}
			<h3>CREATE A NEW ACCOUNT</h3>

			<div class="input_wrap">
				<label for="name" class="name"></label>
				{{ Form::text('name', Input::old('name'), array('placeholder' => 'YOUR NAME*', 'class' => $input_classes['name'])) }}
			</div>

			<div class="input_wrap">
				<label for="nickname" class="name"></label>
				{{ Form::text('nickname', Input::old('nickname'), array('placeholder' => 'YOUR NICKNAME', 'class' => $input_classes['nickname'])) }}
			</div>

			<div class="input_wrap">
				<label for="email" class="email"></label>
				{{ Form::email('email', Input::old('email'), array('placeholder' => 'E-MAIL ADDRESS*', 'class' => $input_classes['email'])) }}
			</div>

			<div class="input_wrap">
				<label for="password" class="password"></label>
				{{ Form::password('password', array('placeholder' => 'PASSWORD*', 'class' => $input_classes['password'])) }}
			</div>

			<div class="input_wrap">
				<label for="password_confirmation" class="password"></label>
				{{ Form::password('password_confirmation', array('placeholder' => 'RETYPE PASSWORD*', 'class' => $input_classes['password_confirmation'])) }}
			</div>

			<div class="input-checkbox {{ $input_classes['agree'] }}">
				<input name="agree" value="yes" type="checkbox" /> I agree with the Terms and Conditions
			</div><br />

			<input type="submit" value="CREATE ACCOUNT"><br />
			<a href="/account/facebook">
				<img style="margin-top: 15px;" width="250" src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-ash3/851558_153968161448238_508278025_n.png" />
			</a>
		</form>	
	</div>
</div>

<div id="index_mid">
	<div class="content">
		<h2>Are you ready to tutor and start a new career?</h2>
		<p>Share your knowledge with the Study Square community by being a part of our exciting tutor program! Build relationships while you help others expand their knowledge and abilities. If you prefer one-on-one tutoring sessions, you have found the right place. Join Study Square for FREE and begin tutoring students who need your help today!</p>

		<button onclick="javascript:window.location.href='http://studysquare.lh/site/take_a_tour';">
			<span class="big_bold">TAKE A TOUR</span><br />
			And see how you can earn money
		</button>
		<button onclick="javascript:window.location.href='http://studysquare.lh/how-it-works';">
			<span class="big_bold">HOW IT WORKS</span><br />
			Watch how easy it is
		</button>
	</div>
</div>
