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

	{{-- Large Image Modal --}}
	<div class="ss-modal" id="ss-modal-large-image">
		<div id="ss-modal-large-image-left">
			<img src="http://placehold.it/250x250" />
		</div>

		<div id="ss-modal-large-image-right"></div>
		<div class="clear"></div>
	</div>

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

	{{ HTML::script('//cdn.socket.io/socket.io-1.0.6.js') }}

	{{-- Online/CDN JQuery --}}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}

	{{-- Offline JQuery --}}
	{{--
	{{ HTML::script('js/offline_jquery.min.js') }}
	{{ HTML::script('js/offline_jquery-ui.min.js') }}
	--}}
	{{ HTML::script('js/script.min.js') }}

	{{-- Tutoring Session --}}
	@if (Route::currentRouteName() == 'tutoring_session.start')
		{{ HTML::script('js/plugins/paper-v0.9.18.min.js') }}
		{{ HTML::script('js/plugins/tinymce/tinymce-v4.0.26.min.js') }}
		{{ HTML::script('js/plugins/ace/ace.js') }}
		{{ HTML::script('js/plugins/recorder.js') }}
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

	{{-- Google Analytics --}}
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-43478049-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
