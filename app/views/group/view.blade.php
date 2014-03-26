<div class="content">
	<div class="layout">
		<div class="layout-sidebar page-cg-view page-group-view">
			<div class="ss-container">
				<div class="ss-section">
					<div class="center">
						<div class="profile-picture big-profile-picture">
							{{ HTML::image(HTML::get_from_s3($group->profile_picture), 'Profile Picture', array('width' => 160)) }}
						</div>

						<h1 class="user-name">{{{ $group->name }}}</h1>
					</div>

					@if(!$isJoined)
						<button class="ss-button2 red bold join-cg" data-what="group" data-id="{{{ $group->id }}}">JOIN</button>
					@endif
				</div>

				<div class="ss-section">
					<div class="center">
						<div class="count-members-container">
							<h2 class="count-members">{{ $group->count_members }}</h2> members
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
						{{ Form::open(array('route' => 'group.post', 'files' => true)) }}
							{{ Form::hidden('id', $group->id) }}
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
