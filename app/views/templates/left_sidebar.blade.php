<div class="ss-container">
	<div class="ss-section ss-link" data-ss-link="{{{ URL::route('user.view', Auth::user()->id) }}}">
		<div class="center">
			<div class="profile-picture big-profile-picture">
				{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 160)) }}
			</div>

			<h1 class="user-name">{{{ Auth::user()->display_name }}}</h1>
		</div>
	</div>

	<div class="ss-section left-sidebar-section ss-link" data-ss-link="{{{ URL::route('user.view', Auth::user()->id) }}}">
		My Profile
	</div>

	<div class="ss-section left-sidebar-section ss-link" data-ss-link="{{{ URL::route('dashboard') }}}">
		Dashboard
	</div>

	<div class="ss-section left-sidebar-section tutor-color">
		Tutors
		<ul class="tutor_list">
			<li>1</li>
			<li>2</li>
		</ul>
	</div>

	<div class="ss-section left-sidebar-section classroom-color">
		Classrooms
		@if(count($classrooms) > 0)
			<ul class="classroom_list">
				@foreach($classrooms as $classroom)
					<li class="ss-link" data-ss-link="{{{ URL::route('classroom.view', $classroom->id) }}}">{{{ HTML::limit($classroom->name) }}}</li>
				@endforeach
			</ul>
		@endif
	</div>

	<div class="ss-section left-sidebar-section group-color">
		Groups
		@if(count($groups) > 0)
			<ul class="group_list">
				@foreach($groups as $group)
					<li class="ss-link" data-ss-link="{{{ URL::route('group.view', $group->id) }}}">{{{ HTML::limit($group->name) }}}</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
