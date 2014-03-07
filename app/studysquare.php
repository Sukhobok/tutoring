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

Form::macro('ss_file', function($name, $attributes = array(), $color = 'green')
{
	$file = Form::file($name, $attributes);
	return '<div class="ss-file-wrapper">'
			. '<button class="ss-file ss-button ' . $color . ' bold">'
			. 'BROWSE'
			. $file
			. '</button>'
		. '</div>';
});
