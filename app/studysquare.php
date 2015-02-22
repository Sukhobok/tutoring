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
HTML::macro('profile_picture', function($object)
{
	if ($object->profile_picture)
	{
		return Config::get('s3.url')
			. $object->profile_picture;
	}

	return '/images/default_avatar.jpg';
});

HTML::macro('school_profile_picture', function($school)
{
	return '/images/default_school_avatar.jpg';
});

HTML::macro('get_from_s3', function($url)
{
	return Config::get('s3.url') . $url;
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
 * Format date
 */
HTML::macro('format_date', function($date, $format = 'F d Y')
{
	$date = mktime(0, 0, 0, $date['m'], $date['d'], $date['y']);
	return date($format, $date);
});

/**
 * Parse Links
 */
HTML::macro('parse_links', function($message)
{
	$message = preg_replace_callback('#(?:https?://\S+)|(?:www.\S+)|(?:\S+\.\S+)#', function($arr)
	{
		// Add http:// for links that don't have http:// or https://
		if ((strpos($arr[0], 'http://') !== 0) && (strpos($arr[0], 'https://') !== 0))
		{
			$arr[0] = 'http://' . $arr[0];
		}
		
		return '<a href="' . $arr[0] . '">' . $arr[0] . '</a>';
	}, $message);

	return $message;
});

/**
 * Parse Youtube Videos
 */
function parse_youtube_links($message)
{
	preg_match_all('@https?://(www\.)?youtube.com/.[^\s.,"\']+@i', $message, $matches);

	$pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
	$pattern .= '(?:www\.)?';         #  Optional www subdomain.
	$pattern .= '(?:';                #  Group host alternatives:
	$pattern .=   'youtu\.be/';       #    Either youtu.be,
	$pattern .=   '|youtube\.com';    #    or youtube.com
	$pattern .=   '(?:';              #    Group path alternatives:
	$pattern .=     '/embed/';        #      Either /embed/,
	$pattern .=     '|/v/';           #      or /v/,
	$pattern .=     '|/watch\?v=';    #      or /watch?v=,    
	$pattern .=     '|/watch\?.+&v='; #      or /watch?other_param&v=
	$pattern .=   ')';                #    End path alternatives.
	$pattern .= ')';                  #  End host alternatives.
	$pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
	$pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.
	
	$return = array();
	foreach ($matches[0] as $match)
	{
		preg_match($pattern, $match, $matches2);
		$return[] = (isset($matches2[1])) ? $matches2[1] : false;
	}

	return array_values(array_filter($return));
}

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

/**
 * Error Pages
 */
App::error(function($exception, $code)
{
	switch ($code) {
		case 404:
			return View::make('layouts.default',
				array(
					'dark_body' => true,
					'content' => View::make('errors.404')
				));
			break;
	}
});

/**
 * StudySquare array_diff (faster)
 */
function ss_array_diff($a, $b)
{
	$map = array();
	foreach ($a as $val)
		$map[$val] = 1;
	foreach ($b as $val)
		unset($map[$val]);

	return array_keys($map);
}
