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

/**
 * File wrapper with studysquare button
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

/**
 * Get link from S3
 */
HTML::macro('profile_picture', function($user)
{
	if ($user->profile_picture)
	{
		return 'https://s3-us-west-2.amazonaws.com/studysquare/'
			. $user->profile_picture;
	}

	return '/images/default_avatar.jpg';
});

HTML::macro('school_profile_picture', function($school)
{
	return '/images/default_school_avatar.jpg';
});

HTML::macro('get_from_s3', function($url)
{
	return 'https://s3-us-west-2.amazonaws.com/studysquare/' . $url;
});

/**
 * Limit a string
 */
HTML::macro('limit', function($str, $limit = 20)
{
	if (strlen($str) > $limit)
	{
		return substr($str, 0, $limit - 2) . ' ...';
	}
	else
	{
		return $str;
	}
});

/**
 * Validation: Require a file
 */
Validator::extend('required_file', function($attribute, $value, $parameters)
{
	return Input::hasFile($attribute);
});

/**
 * Validation: Year in correct range
 */
Validator::extend('year_range', function($attribute, $value, $parameters)
{
	$min = (int) date('Y') + (int) $parameters[0];
	$max = (int) date('Y') + (int) $parameters[1];
	return ($value <= $max && $value >= $min);
});
