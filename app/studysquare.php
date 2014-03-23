<?php

/*
|--------------------------------------------------------------------------
| StudySquare
|--------------------------------------------------------------------------
|
| Here is the code for some studysquare specific things that will be
| registered before the application loads
|
*/

Form::macro('ss_file', function($name, $attributes = array(), $color = 'green', $text = 'BROWSE')
{
	$file = Form::file($name, $attributes);
	return '<div class="ss-file-wrapper">'
			. '<button class="ss-file ss-button ' . $color . ' bold">'
			. $text
			. $file
			. '</button>'
		. '</div>';
});

HTML::macro('profile_picture', function($user)
{
	if ($user->profile_picture)
	{
		return 'https://s3-us-west-2.amazonaws.com/studysquare/'
			. $user->profile_picture;
	}

	return '/images/default_avatar.jpg';
});

HTML::macro('get_from_s3', function($url)
{
	return 'https://s3-us-west-2.amazonaws.com/studysquare/' . $url;
});

Validator::extend('required_file', function($attribute, $value, $parameters)
{
	return Input::hasFile($attribute);
});
