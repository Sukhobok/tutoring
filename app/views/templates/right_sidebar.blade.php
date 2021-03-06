<div class="ss-container">
	<div class="ss-section">
		<div class="center">
			{{ Form::text('search', '', array(
				'placeholder' => 'Search anything',
				'class' => 'ss-search ss-search-anything'
			)) }}
		</div>
	</div>

	<div class="ss-section">
		<div id="right-calendar"></div>

		<script type="text/javascript">
			var futureSessionDates = new Array();
		</script>
		<div class="right-future-sessions">
			@foreach ($futureSessions as $futureSession)
				<div class="right-future-session">
					<script type="text/javascript">
						futureSessionDates.push({{ $futureSession->session_date*1000 }});
					</script>
					<span class="ss-calendar-when time-ago" data-time="{{ $futureSession->session_date }}"></span>
					<p class="ss-calendar-what">
						<span class="bold">{{{ $futureSession->description }}}</span>
						with
						<span class="ss-green-link ss-link" data-ss-link="{{{ URL::route('user.view', $futureSession->partnerId) }}}">
							{{{ HTML::limit($futureSession->partnerName) }}}
						</span>
					</p>
				</div>
			@endforeach
		</div>

		<button class="ss-button green find-tutor-button ss-link" data-ss-link="{{{ URL::route('tutor.search') }}}">
			<span class="bold">FIND A TUTOR</span><br />
			Search for the perfect tutor
		</button>

		<h1>New members</h1>
		@foreach($new_members as $new_member)
			<div class="profile-picture ss-new-member ss-link" data-ss-link="{{{ Alias::getURL('User', $new_member->id) }}}">
				{{ HTML::image(HTML::profile_picture($new_member), 'Profile Picture', array('width' => 56)) }}
			</div>
		@endforeach
		<div class="ss-invite-friends">
			<a href="{{ URL::route('settings.invite') }}">Invite Friends</a>
		</div>
		{{--
		<h1>New groups</h1>
		@foreach($new_groups as $new_group)
			<div class="profile-picture ss-new-group ss-link" data-ss-link="{{{ Alias::getURL('Group', $new_group->id) }}}">
				{{ HTML::image(HTML::profile_picture($new_group), 'Profile Picture', array('width' => 56)) }}
			</div>
		@endforeach
		--}}
	</div>
</div>
