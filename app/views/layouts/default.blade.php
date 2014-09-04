<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@if (isset($meta))
		@foreach($meta as $_meta)
			<meta name="{{{ $_meta['name'] }}}" content="{{{ $_meta['content'] }}}">
		@endforeach
	@endif
	<title>{{{ isset($title) ? $title : 'StudySquare' }}}</title>
	{{ HTML::style('//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700') }}
	{{ HTML::style('css/style.css') }}
	<link rel="shortcut icon" href="{{ URL::to('images/favicon_120x120.png') }}" />
</head>

<body {{ isset($dark_body) ? 'class="is-dark"' : '' }}>
	@if ($logged_in)
		@include('templates.header')
	@else
		@include('templates.header_logged_out')
	@endif

	{{ $content }}

	@include('templates.footer')
	
	{{-- Audio Alert --}}
	<audio id="ss-audio-alert">
		<source src="{{ URL::to('alert.ogg') }}" type="audio/ogg">
		<source src="{{ URL::to('alert.mp3') }}" type="audio/mpeg">
	</audio>

	{{-- Background for $.ssModal --}}
	<div class="ss-modal-bg"></div>

	@if (Auth::check())
		{{-- Include the comment snippet --}}
		<div class="hide snippet-comment ss-section">
			@include('snippets.comment')
		</div>

		{{-- Hire Now modals --}}
		@include('snippets.hire_now_modals')

		{{-- Duplicate Session modal --}}
		<div class="ss-modal" id="ss-modal-duplicate-session">
			<div class="ss-modal-top ss-modal-type-exclam"></div>
			<div class="ss-modal-body">
				<h1 style="font-size: 22px; font-weight: 700; margin-bottom: 22px;">There is a problem!</h1>
				<p>You are already connected somewhere else! You can't be connected in more than one place!</p>
			</div>
		</div>

		{{-- StudySquare Chat --}}
		@include('snippets.chat')
	@endif

	{{-- Javascript --}}
	<script type="text/javascript">
		var environment = '{{{ App::environment() }}}';
	</script>

	@if (App::environment() == 'local')
		{{ HTML::script('http://studysquare.lh:53100/socket.io/socket.io.js') }}
	@else
		{{ HTML::script('http://studysquare.com:53100/socket.io/socket.io.js') }}
	@endif

	{{-- Online/CDN JQuery --}}
	{{--
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
	--}}

	{{-- Offline JQuery --}}
	{{ HTML::script('js/offline_jquery.min.js') }}
	{{ HTML::script('js/offline_jquery-ui.min.js') }}
	{{ HTML::script('js/script.min.js') }}

	{{-- Tutoring Session --}}
	@if (Route::currentRouteName() == 'tutoring_session.start')
		{{ HTML::script('js/plugins/paper-v0.9.18.min.js') }}
		{{ HTML::script('js/plugins/tinymce/tinymce-v4.0.26.min.js') }}
		{{ HTML::script('js/plugins/ace/ace.js') }}
		{{ HTML::script('js/plugins/RecordRTC-v1.8.js') }}
		{{ HTML::script('js/tutoring_session/tutoring_session.min.js') }}
		{{ HTML::script('js/tutoring_session/whiteboard.min.js', array('type' => 'text/paperscript', 'canvas' => 'ts-canvas')) }}
	@endif

	{{-- Tutoring Session Replay --}}
	@if (Route::currentRouteName() == 'tutoring_session.replay')
		{{ HTML::script('js/plugins/paper-v0.9.18.min.js') }}
		{{ HTML::script('js/plugins/tinymce/tinymce-v4.0.26.min.js') }}
		{{ HTML::script('js/plugins/ace/ace.js') }}
		{{ HTML::script('js/tutoring_session/replay.min.js') }}
		{{ HTML::script('js/tutoring_session/replay_whiteboard.min.js', array('type' => 'text/paperscript', 'canvas' => 'ts-canvas')) }}
	@endif
</body>
</html>
