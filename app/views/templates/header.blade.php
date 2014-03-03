<header>
	<div class="content">
		<div class="header-logo">
			{{ HTML::image('images/logo_beta.png', 'StudySquare') }}
		</div>

		<div class="header-right">
			<div class="header-icon">
				{{ HTML::image('images/header/friend.png') }}
			</div>
			
			<div class="header-icon">
				{{ HTML::image('images/header/notification.png') }}
			</div>

			<div class="header-icon">
				{{ HTML::image('images/header/chat.png') }}
			</div>

			<div class="header-icon header-settings-icon">
				{{ HTML::image('images/header/settings.png') }}
			</div>
		</div>
		<div class="clear"></div>

		<div class="header-settings-extended">
			<div style="float: left; width: 200px;">
				<ul>
					<li class="ss-link" data-ss-link="{{ URL::to('settings/wallet') }}">
						<i class="ss-icon ss-money"></i> My Wallet
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('file_manager') }}">
						<i class="ss-icon ss-file-manager"></i> File Manager
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/tutor_center') }}">
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

					<li class="ss-link" data-ss-link="{{ URL::to('settings/notifications_security') }}">
						<i class="ss-icon ss-notifications"></i> Notifications &amp; Security
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/invite') }}">
						<i class="ss-icon ss-person"></i> Invite Friends
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/groups_management') }}">
						<i class="ss-icon ss-list"></i> Groups Management
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('settings/classrooms_management') }}">
						<i class="ss-icon ss-classroom"></i> Classrooms Management
					</li>

					<li class="ss-link" data-ss-link="{{ URL::to('account/logout') }}">
						<i class="ss-icon ss-locker"></i> Logout
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>
