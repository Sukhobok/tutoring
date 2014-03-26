<div class="ss-container">
	<div class="ss-section">
		<div class="center">
			<div class="profile-picture big-profile-picture">
				{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 160)) }}
			</div>

			<h1 class="user-name">{{{ Auth::user()->display_name }}}</h1>
		</div>
	</div>

	<div class="ss-section left-sidebar-section">
		My Profile
	</div>

	<div class="ss-section left-sidebar-section">
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
					<li>{{{ $classroom->name }}}</li>
				@endforeach
			</ul>
		@endif
	</div>

	<div class="ss-section left-sidebar-section group-color">
		Groups
		@if(count($groups) > 0)
			<ul class="group_list">
				@foreach($groups as $group)
					<li>{{{ $group->name }}}</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
