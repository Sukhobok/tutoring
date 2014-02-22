<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.left_sidebar')
		</div>

		<div class="layout-main">
			<div id="post_message">
				{{ Form::open(array('url' => '/', 'files' => true)) }}
					<h2>POST A QUESTION or MESSAGE</h2>
					{{ Form::textarea('post') }}
					{{ Form::submit('POST', array('class' => 'ss-button blue bold')) }}
					{{ Form::ss_file('photos', array('multiple' => '')) }}
					<div class="clear"></div>
				{{ Form::close() }}
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
