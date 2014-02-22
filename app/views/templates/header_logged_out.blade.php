<div id="top-login">
	<div class="content">
		<h1>Sign In</h1>
		{{ Form::open(array('url' => 'login')) }}
			{{ Form::text('email', '', array('placeholder' => 'Email address')) }}
			{{ Form::password('password', array('placeholder' => 'Password')) }}
			{{ Form::submit('Log In', array('class' => 'ss-button blue bold')) }}
		{{ Form::close() }}

		<h2>Forgot password?</h2>
		
		{{ HTML::image('images/close.png', 'Close', array('id' => 'close-top-login')) }}
	</div>
</div>

<header>
	<div class="content">
		<div class="header-logo">
			<img src="http://studysquare.lh/images/logo-beta.png" />
		</div>

		<div class="header-button">
			<button class="ss-button blue bold">
				LOGIN
			</button>
		</div>
	</div>
</header>
