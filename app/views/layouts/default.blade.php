<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>StudySquare</title>
	{{ HTML::style('//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700') }}

	@if (in_array(Route::getCurrentRoute()->getName(), $outer_pages))
		{{ HTML::style('css/index.css') }}
	@else
		{{ HTML::style('css/style.css') }}
	@endif

	<link rel="shortcut icon" href="http://support.studysquare.com/wp-content/uploads/2013/12/120x120.png" />
</head>

<body>
	@if ($logged_in)
		@include('templates.header')
	@else
		@include('templates.header_logged_out')
	@endif

	{{ $content }}

	@include('templates.footer')

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
	@if (in_array(Route::getCurrentRoute()->getName(), $outer_pages))
		{{ HTML::script('js/index.js') }}
	@else
		{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
		{{ HTML::script('js/script.min.js') }}
	@endif
	
	
</body>
</html>