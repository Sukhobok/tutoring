<div class="ss-container">
	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'My Profile' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.profile') }}">
		My Profile
	</div>

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Notifications &amp; Security' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.notifications_security') }}">
		Notifications &amp; Security
	</div>

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Invite Friends' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.invite') }}">
		Invite Friends
	</div>

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'My Wallet' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.my_wallet') }}">
		My Wallet
	</div>

	<!--
	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'File Manager' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.profile') }}">
		File Manager
	</div>
	-->

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Tutor Center' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.tutor_center') }}">
		Tutor Center
	</div>

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Financial Center' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.financial') }}">
		Financial Center
	</div>
	{{--
	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Groups Management' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.groups_management') }}">
		Groups Management
	</div>
	--}}

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Classrooms Management' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.classrooms_management') }}">
		Study Rooms Management
	</div>

	<div class="ss-section left-sidebar-section ss-link {{ $selected == 'Identity Verification' ? 'is-selected' : '' }}" data-ss-link="{{ URL::route('settings.verification') }}">
		Identity Verification
	</div>
</div>