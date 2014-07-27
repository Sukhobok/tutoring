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

		{{-- Hire Now Notify modal --}}
		<div class="hide ss-modal" id="ss-modal-hire-now-notify">
			<div class="ss-modal-top ss-modal-type-exclam"></div>
			<div class="ss-modal-body">
				<h1>Tutoring Request</h1>
				<div id="ss-modal-hire-now-notify-person">
					<div class="profile-picture">
						{{ HTML::image('image', 'Profile Picture', array('width' => 100, 'height' => 100)) }}
					</div>
					<h2>Name</h2>
				</div>

				<div id="ss-modal-hire-now-notify-buttons" data-ss-request-id="0">
					<button class="ss-button green bold inline" id="ss-modal-hire-now-notify-accept">ACCEPT</button>
					<button class="ss-button red bold inline" id="ss-modal-hire-now-notify-decline">DECLINE</button>
				</div>

				<p>
					Duration requested:
					<span class="bold"><span id="ss-modal-hire-now-hours">1</span> hour/s</span>
					@ $<span id="ss-modal-hire-now-price">20.00</span>/hour
				</p>

				<p id="ss-modal-hire-now-description">
					Description here
				</p>

				<p id="ss-modal-hire-now-expire">
					The request will expire in <span class="bold">01:00</span> minutes!
				</p>
			</div>
		</div>
	@endif

	{{-- Javascript --}}
	<script type="text/javascript">
		var environment = '{{{ App::environment() }}}';
	</script>

	@if (App::environment() == 'local')
		{{ HTML::script('http://studysquare.lh:53100/socket.io/socket.io.js') }}
	@else
		{{ HTML::script('http://test232.studysquare.com:53100/socket.io/socket.io.js') }}
	@endif

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
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
</body>
</html>
