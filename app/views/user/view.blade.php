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

					@if(Auth::check() && Auth::user()->id != $user->id)
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

				<div class="ss-section">
					<div class="ss-user-info">
						<div class="ss-user-info-title">General Information</div>

						@if ($user->birthday['m'] !== 0)
							<i class="ss-icon ss-birthday"></i> <div class="ss-user-info-subtitle">Birthday: </div> {{{ HTML::format_date($user->birthday) }}}<br />
						@endif

						<i class="ss-icon ss-gender"></i> <div class="ss-user-info-subtitle">Gender: </div> {{{ ucfirst($user->gender) }}}<br />
						{{-- <i class="ss-icon ss-languages"></i> <div class="ss-user-info-subtitle">Languages: </div> ..<br /> --}}
						
						@if ($isTutor)
							<div class="ss-user-info-subtitle">Tutors: </div> {{{ $userSubjects }}}<br />
							<div class="ss-user-info-subtitle">Hourly Rate: </div> ${{{ $user->price }}}<br />
						@endif
					</div>
				</div>

				@if ($userEducation)
					<div class="ss-section">
						<div class="ss-user-info">
							<i class="ss-icon ss-graduation-cap"></i> <div class="ss-user-info-title inline">Education</div><br />

							@foreach ($userEducation as $_userEducation)
								<div class="ss-link" data-ss-link="{{{ Alias::getURL($_userEducation->page_type, $_userEducation->education_id) }}}">
									- {{{ $_userEducation->name }}} ({{{ $_userEducation->from }}}-{{{ $_userEducation->to }}})
								</div>
							@endforeach
						</div>
					</div>
				@endif
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
				@if(Auth::check() && Auth::user()->id == $user->id)
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
					@if(Auth::check() && Auth::user()->id == $user->id)
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

			<button class="ss-button blue bold inline" id="ss-hire-send">Send Request</button>
			<span class="bold" style="margin: 0 25px;"> OR </span>
			<button class="ss-button blue bold inline" id="ss-hire-now">Hire Now</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-3-hours">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			You have to enter a date that is at least 3 hours later.
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-hours-limit">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			You can't take more than 4 hours!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-description">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			Please provide a description!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-time-equal">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			The times can't be identical! Please choose 3 different times!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-money">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			You don't have enough money to send this hire request!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-hire-other">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			Sorry! We couldn't send the hire request! Please try again!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<script type="text/javascript">
	var user_view_id = '{{{ $user->id }}}';
</script>
