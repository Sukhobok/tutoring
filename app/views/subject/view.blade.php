<div class="subject-page-container">
	<div class="subject-header">
		<div class="content">
			<div class="subject-header-left">
				<h2>Search online tutors for</h2>
				<h1>{{{ $subject->name }}}</h1>
				<p>If your looking for an online {{{ $subject->name }}} tutor, Study Square has you covered. Simply schedule a tutoring session using our online tutoring scheduler or hire a tutor immedietely!</p>
			</div>

			<div class="subject-header-right">
				<h3>Get Started Today</h3>
				<div class="box green">
					HIRE TUTOR
				</div>
				<div class="box red">
					CREATE ACCOUNT
				</div>
				<div class="mid">OR</div>
				<h4>and change your future</h4>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="subject-body">
		<div class="content">
			<div class="subject-body-left">
				<div class="subject-bar">
					Displaying {{ $offset + 1 }}-{{ $offset + count($users) }} of {{ $count_users }} tutors
				</div>

				@foreach($users as $user)
					<div class="subject-user">
						<div class="subject-user-profile-picture">
							<div class="profile-picture ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}">
								{{ HTML::image(HTML::profile_picture($user), 'Profile Picture', array('width' => 100)) }}
							</div>
						</div>

						<div class="subject-user-info">
							<h1 class="ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}">{{{ strtoupper($user->name) }}}</h1>
							<h2>{{{ $user->education }}}</h2>
							<p>{{ nl2br(e(HTML::limit($user->bio, 120))) }}</p>
							<!--<h4>TUTORS ALGEBRA, EMERGENCY MEDICINE</h4>-->
							<h5>${{{ $user->price }}}/hour</h5>
						</div>

						<div class="subject-user-info-right">
							<div class="member-since-text">
								member since {{{ $user->created_at }}}
							</div>
							<br />

							<button class="ss-button green bold ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}?hire=true">HIRE {{{ strtoupper($user->short_name) }}}</button>
						</div>

						<div class="clear"></div>
					</div>
				@endforeach

				<div class="subject-bar bottom">
					@if ($offset >= 4)
						<a href="{{{ $base_url }}}&amp;offset={{{ $offset - 4 }}}">Prev</a>
					@endif
					|
					@if ($offset < $count_users - 4)
						<a href="{{{ $base_url }}}&amp;offset={{{ $offset + 4 }}}">Next</a>
					@endif
					&nbsp;&nbsp;&nbsp;
					@for ($i = 0; $i < $pages; $i++)
						<a href="{{{ $base_url }}}&amp;offset={{{ $i * 4 }}}">{{ $i + 1 }}</a>
						&nbsp;
					@endfor
				</div>
			</div>

			<div class="subject-body-right">
				<input type="text" class="search" placeholder="Enter a subject..." />
				<div class="subject-widget-right">
					<h1>Filters:</h1>
					<input type="checkbox" class="ss-link" data-ss-link="{{{ $base_url }}}&amp;offset=0&amp;available_now={{ $filters['available_now'] ? '0' : '1' }}" name="filters[]" value="available_now" {{ $filters['available_now'] ? 'checked' : '' }} /> Available Now<br />
					<input type="checkbox" class="ss-link" data-ss-link="{{{ $base_url }}}&amp;offset=0&amp;filter_20_30={{ $filters['filter_20_30'] ? '0' : '1' }}" name="filters[]" value="filter_20_30" {{ $filters['filter_20_30'] ? 'checked' : '' }} /> $20-$30<br />
					<input type="checkbox" class="ss-link" data-ss-link="{{{ $base_url }}}&amp;offset=0&amp;filter_31_40={{ $filters['filter_31_40'] ? '0' : '1' }}" name="filters[]" value="filter_31_40" {{ $filters['filter_31_40'] ? 'checked' : '' }} /> $31-$40<br />
					<input type="checkbox" class="ss-link" data-ss-link="{{{ $base_url }}}&amp;offset=0&amp;filter_41_50={{ $filters['filter_41_50'] ? '0' : '1' }}" name="filters[]" value="filter_41_50" {{ $filters['filter_41_50'] ? 'checked' : '' }} /> $41-$50<br />
					<input type="checkbox" class="ss-link" data-ss-link="{{{ $base_url }}}&amp;offset=0&amp;filter_51={{ $filters['filter_51'] ? '0' : '1' }}" name="filters[]" value="filter_51" {{ $filters['filter_51'] ? 'checked' : '' }} /> $51+<br />
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var subject_view_id = '{{{ $subject->id }}}';
</script>
