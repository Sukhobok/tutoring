<header>
	<div class="content">
		<div class="header-logo">
			{{ HTML::image('images/logo_beta.png', 'StudySquare', array(
				'class' => 'ss-link',
				'data-ss-link' => '/'
			)) }}
		</div>

		<div class="header-notice">
			{{-- Notice, if any, here --}}
		</div>

		<div class="header-right">
			<div class="header-icon header-friend-icon">
				{{ HTML::image('images/header/friend.png') }}
			</div>
			
			<div class="header-icon header-notif-icon">
				{{ HTML::image('images/header/notification.png') }}
			</div>

			<div class="header-icon header-chat-icon">
				{{ HTML::image('images/header/chat.png') }}
			</div>

			<div class="header-icon header-settings-icon">
				{{ HTML::image('images/header/settings.png') }}
			</div>
		</div>
		<div class="clear"></div>

		<div class="header-extended header-friend-extended">
			<div class="header-extended-in">
				@foreach($friend_requests as $friend_request)
					<div class="header-extended-item">
						<div class="header-extended-img">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($friend_request), 'Profile Picture', array('width' => 55)) }}
							</div>
						</div>

						<div class="header-extended-content">
							<p>
								<span class="bold">{{{ $friend_request->name }}}</span> sent you a friend request
							</p>
							<p>
								<button class="ss-button green bold small-button inline accept-friendship-request" data-uid="{{{ $friend_request->id }}}">Accept Request</button>
								<button class="ss-button red bold small-button inline decline-friendship-request" data-uid="{{{ $friend_request->id }}}">Decline Request</button>
							</p>
							<p class="header-extended-date time-ago" data-time="{{ $friend_request->created_at }}"></p>
						</div>
						<div class="clear"></div>
					</div>
				@endforeach

				@if(count($friend_requests) == 0)
					<div class="header-extended-item bold no-new">
						No new friend requests
					</div>
				@endif
			</div>
		</div>

		<div class="header-extended header-notif-extended">
			<div class="header-extended-in">
				<div class="header-extended-item bold no-new">
					No new notifications
				</div>
			</div>
		</div>

		<div class="header-extended header-chat-extended">
			<div class="header-extended-in">
				@foreach($unread_messages as $unread_message)
					<div class="header-extended-item">
						<div class="header-extended-img">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($unread_message), 'Profile Picture', array('width' => 55)) }}
							</div>
						</div>

						<div class="header-extended-content">
							<p>
								<span class="bold">{{{ $unread_message->name }}}</span> sent you a message:<br />
								{{{ HTML::limit($unread_message->message, 55) }}}
							</p>
							<p class="header-extended-date time-ago" data-time="{{ $unread_message->created_at }}"></p>
						</div>
						<div class="clear"></div>
					</div>
				@endforeach

				@if(count($unread_messages) == 0)
					<div class="header-extended-item bold no-new">
						No new messages
					</div>
				@endif
			</div>
		</div>

		<div class="header-settings-extended">
			<div style="float: left; width: 200px;">
				<ul>
					<li class="ss-link" data-ss-link="{{ URL::route('settings.my_wallet') }}">
						<i class="ss-icon ss-money"></i> My Wallet
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('file_manager') }}">
						<i class="ss-icon ss-file-manager"></i> File Manager
					</li>

					<li class="ss-link" data-ss-link="{{ URL::route('settings.tutor_center') }}">
						<i class="ss-icon ss-star"></i> Tutor Center
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/my_accounts') }}">
						<i class="ss-icon ss-money"></i> Financial Center
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/verification') }}">
						<i class="ss-icon ss-person"></i> Identity verification
					</li>
				</ul>
			</div>

			<div style="float: left; width: 200px;">
				<ul>
					<li class="ss-link" data-ss-link="{{ URL::route('settings.profile') }}">
						<i class="ss-icon ss-person"></i> My Profile
					</li>

					<li class="ss-link" data-ss-link="{{ URL::route('settings.notifications_security') }}">
						<i class="ss-icon ss-notifications"></i> Notifications &amp; Security
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/invite') }}">
						<i class="ss-icon ss-person"></i> Invite Friends
					</li>

					<li class="ss-link" data-ss-link="{{ URL::route('settings.groups_management') }}">
						<i class="ss-icon ss-list"></i> Groups Management
					</li>

					<li class="ss-link" data-ss-link="{{ URL::route('settings.classrooms_management') }}">
						<i class="ss-icon ss-classroom"></i> Classrooms Management
					</li>

					<li class="ss-link" data-ss-link="{{ URL::route('logout') }}">
						<i class="ss-icon ss-locker"></i> Logout
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>
