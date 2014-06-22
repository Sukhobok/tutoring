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
		@if(count($tutors) > 0)
			<ul class="tutor_list">
				@foreach($tutors as $tutor)
					<li class="ss-link" data-ss-link="{{{ Alias::getURL('User', $tutor->id) }}}">{{{ HTML::limit($tutor->name) }}}</li>
				@endforeach
			</ul>
		@endif
	</div>

	<div class="ss-section left-sidebar-section classroom-color">
		Classrooms
		@if(count($classrooms) > 0)
			<ul class="classroom_list">
				@foreach($classrooms as $classroom)
					<li class="ss-link" data-ss-link="{{{ Alias::getURL('Classroom', $classroom->id) }}}">{{{ HTML::limit($classroom->name) }}}</li>
				@endforeach
			</ul>
		@endif

		{{ Form::text('search', '', array(
			'placeholder' => 'Enter a classroom ...',
			'class' => 'ss-search classroom-autocomplete'
		)) }}
		<a href="#" class="create-classroom">Create</a>
	</div>

	<div class="ss-section left-sidebar-section group-color">
		Groups
		@if(count($groups) > 0)
			<ul class="group_list">
				@foreach($groups as $group)
					<li class="ss-link" data-ss-link="{{{ Alias::getURL('Group', $group->id) }}}">{{{ HTML::limit($group->name) }}}</li>
				@endforeach
			</ul>
		@endif

		{{ Form::text('search', '', array(
			'placeholder' => 'Enter a group ...',
			'class' => 'ss-search group-autocomplete'
		)) }}
		<a href="#" class="create-group">Create</a>
	</div>
</div>
