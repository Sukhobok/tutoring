<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>StudySquare</title>
	{{ HTML::style('//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700') }}
	{{ HTML::style('css/style.css') }}
	<link rel="shortcut icon" href="{{ URL::to('images/favicon_120x120.png') }}" />
</head>

<body>
	@if ($logged_in)
		@include('templates.header')
	@else
		@include('templates.header_logged_out')
	@endif

	{{ $content }}

	@include('templates.footer')
	<div class="ss-modal-bg">{{-- Background for $.ssModal --}}</div>

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
	{{ HTML::script('js/script.min.js') }}
	
	{{-- Tutoring session scripts --}}
	@if (Route::currentRouteName() == 'tutoring_session.start')
		@if (App::environment() == 'local')
			{{ HTML::script('http://studysquare.lh:53101/socket.io/socket.io.js') }}
		@else
			{{ HTML::script('http://studysquare.com:53101/socket.io/socket.io.js') }}
		@endif
		{{-- HTML::script('js/plugins/socket.io-v0.9.16.min.js') --}}

		<script type="text/javascript">
			var environment = '{{{ App::environment() }}}';
		</script>

		{{ HTML::script('js/plugins/paper-v0.9.18.min.js') }}
		{{ HTML::script('js/plugins/tinymce/tinymce-v4.0.26.min.js') }}
		{{ HTML::script('js/plugins/ace/ace.js') }}
		{{ HTML::script('js/tutoring_session/tutoring_session.min.js') }}
		{{ HTML::script('js/tutoring_session/whiteboard.min.js', array('type' => 'text/paperscript', 'canvas' => 'ts-canvas')) }}
	@endif
</body>
</html>
