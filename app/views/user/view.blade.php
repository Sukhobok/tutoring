<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			<div class="ss-container">
				<div class="ss-section">
					<div class="center">
						<div class="profile-picture big-profile-picture">
							{{ HTML::image(HTML::profile_picture($user), 'Profile Picture', array('width' => 160)) }}
						</div>

						<h1 class="user-name">{{{ $user->display_name }}}</h1>
					</div>

					@if(Auth::user()->id != $user->id)
						@if($canSendFR)
							<button class="ss-button2 black bold add-friend-button" data-uid="{{{ $user->id }}}">ADD FRIEND</button>
						@endif
						@if($isTutor)
							<button class="ss-button2 green bold hire-user-button">HIRE</button>
						@endif
						<button class="ss-button2 blue bold ss-link" data-ss-link="{{ URL::route('messages', $user->id) }}">SEND A MESSAGE</button>
						<button class="ss-button2 red bold">BLOCK</button>
					@endif
				</div>
			</div>
		</div>

		<div class="layout-main">
			<div class="page-tabs-container">
				<div data-ss-tab="posts" class="page-tab is-active">Posts</div>
				<div data-ss-tab="photos" class="page-tab">Photos</div>
				<div data-ss-tab="friends" class="page-tab">Friends</div>
				<div data-ss-tab="more" class="page-tab">More</div>
				<div class="clear"></div>
			</div>

			<div class="page-tab-component page-tab-posts" style="display: block;">
				@if(Auth::user()->id == $user->id)
					<div id="post_message">
						{{ Form::open(array('route' => 'user.post', 'files' => true)) }}
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

			<div class="page-tab-component page-tab-photos">
				<div class="ss-container">
					@if(Auth::user()->id == $user->id)
						<div class="ss-section">
							{{ Form::ss_file('user_photos[]', array('multiple' => true), 'blue', 'UPLOAD') }}
							<div class="ss-drop-photo"></div>
						</div>
					@endif

					<div class="ss-section photos-container with-padding">
						@foreach($images as $photo)
							<div class="ss-photo">
								{{ HTML::image(HTML::get_from_s3($photo->path), 'Photo') }}

								@if(Auth::user()->id == $user->id)
									<div class="ss-photo-hover"></div>
									<div class="ss-photo-delete" data-ss-photo-id="{{{ $photo->id }}}"></div>
								@endif
							</div>
						@endforeach

						@if(count($user->images) == 0)
							<span class="bold">This user has no photos</span>
						@endif
					</div>
				</div>
			</div>

			<div class="page-tab-component page-tab-friends">
				<div class="ss-container center with-padding"> 
					@foreach($friends as $friend)
						<div class="friend ss-link" data-ss-link="{{ URL::route('user.view', $friend->id) }}">
							<div class="friend-hover"></div>
							{{ HTML::image(HTML::profile_picture($friend), 'Profile Picture', array('width' => 160)) }}
							<span>{{{ $friend->name }}}</span>
						</div>
					@endforeach

					@if(count($friends) == 0)
						<span class="bold">This user has no friends</span>
					@endif
				</div>
			</div>

			<div class="page-tab-component page-tab-more">
				more
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			I want to hire <span class="bold">{{{ $user->name }}}</span> for
			{{ Form::text('ss-hire-hours', '1', array('id' => 'ss-hire-hours')) }}
			hour(s) @ ${{{ (int) $user->price }}}/hour = ${{{ (int) $user->price }}}
		</p>

		<p>
			<table id="ss-hire-time-table">
				<tr>
					<td>1st Choice for Day/Time</td>
					<td>2nd Choice for Day/Time</td>
					<td>3rd Choice for Day/Time</td>
				</tr>

				<tr>
					@for($i = 1; $i <= 3; $i++)
						<td><div id="ss-hire-date{{ $i }}"></div></td>
					@endfor
				</tr>

				<tr>
					@for($i = 1; $i <= 3; $i++)
						<td>
							{{ Form::select(
								'hour' . $i,
								array(
									'0' => '12',
									'1' => '01',
									'2' => '02',
									'3' => '03',
									'4' => '04',
									'5' => '05',
									'6' => '06',
									'7' => '07',
									'8' => '08',
									'9' => '09',
									'10' => '10',
									'11' => '11'
								)
							) }}

							{{ Form::select(
								'minute' . $i,
								array(
									'0' => '00',
									'15' => '15',
									'30' => '30',
									'45' => '45'
								)
							) }}

							{{ Form::select(
								'ap' . $i,
								array(
									'0' => 'AM',
									'1' => 'PM'
								)
							) }}
						</td>
					@endfor
			</table>

			<p id="ss-hire-desc">
				Brief description of what you want to learn:
				<textarea></textarea>
			</p>

			<button class="ss-button blue bold" id="ss-hire-send">Send request</button>
		</p>
	</div>
</div>

<script type="text/javascript">
	var user_view_id = '{{{ $user->id }}}';
</script>
