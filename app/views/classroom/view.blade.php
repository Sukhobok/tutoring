<div class="content">
	<div class="layout">
		<div class="layout-sidebar page-cg-view page-classroom-view">
			<div class="ss-container">
				<div class="ss-section">
					<div class="center">
						<h1 class="user-name">{{{ $classroom->name }}}</h1>
					</div>

					@if(!$isJoined)
						<button class="ss-button2 red bold join-cg" data-what="classroom" data-id="{{{ $classroom->id }}}">JOIN</button>
					@endif
				</div>

				<div class="ss-section">
					<div class="center">
						<div class="count-members-container">
							<h2 class="count-members">{{ $classroom->count_members }}</h2> members
						</div>

						<button class="ss-button2 blue bold">INVITE FRIENDS</button>
					</div>
				</div>
			</div>
		</div>

		<div class="layout-main">
			<div class="page-tab-component page-tab-posts" style="display: block;">
				@if($isJoined)
					<div id="post_message">
						{{ Form::open(array('route' => 'classroom.post', 'files' => true)) }}
							{{ Form::hidden('id', $classroom->id) }}
							<h2>POST A QUESTION or MESSAGE</h2>
							{{ Form::textarea('post') }}
							{{ Form::submit('POST', array('class' => 'ss-button blue bold')) }}
							{{ Form::ss_file('photos[]', array('multiple' => true)) }}
							<div class="clear"></div>
						{{ Form::close() }}
					</div>
				@endif

				@foreach($posts as $post)
					@include('snippets.post', array('post' => $post))
				@endforeach
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
