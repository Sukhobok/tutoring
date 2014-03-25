<div class="content">
	<div class="layout page-school-view">
		<div class="layout-sidebar">
			<div class="ss-container">
				<div class="ss-section">
					<div class="center">
						<div class="profile-picture big-profile-picture">
							{{ HTML::image(HTML::school_profile_picture($highschool), 'Profile Picture', array('width' => 160)) }}
						</div>

						<h1 class="user-name">{{{ $highschool->name }}}</h1>
					</div>
				</div>

				<div class="ss-section left-padded-box">
					<i class="ss-icon ss-graduation-cap"></i> <h2 class="box-title">Address:</h2>
					<p class="box-content">
						{{{ $highschool->address }}}, {{{ $highschool->city }}}, {{{ $highschool->state }}}<br /><br />
						Zip: <b class="bold">{{{ $highschool->zip }}}</b>
					</p>
				</div>

				<div class="ss-section left-padded-box">
					<i class="ss-icon ss-contact"></i> <h2 class="box-title">Contact:</h2>
					<p class="box-content">
						Phone: <b class="bold">{{{ $highschool->phone }}}</b>
					</p>
				</div>
			</div>
		</div>

		<div class="layout-main">
			<div class="page-tab-component page-tab-posts" style="display: block;">
				<article>
					<div class="article-left">
						<div class="profile-picture">
							{{ HTML::image(HTML::school_profile_picture($highschool), 'Profile Picture', array('width' => 50)) }}
						</div>
					</div>

					<div class="article-right">
						<div class="ss-container">
							<div class="article-content ss-section">
								<b class="bold">{{{ $highschool->name }}}</b> is an institution located in {{{ $highschool->city }}}, {{{ $highschool->state }}}. You can reach the university by going to {{{ $highschool->address }}}
								<br /><br />
								There are <b class="bold">0</b> users on StudySquare that go to <b class="bold">{{{ $highschool->name }}}</b>.
							</div>
						</div>
					</div>

					<div class="clear"></div>
				</article>

				@if(count($posts) == 0)
					<div class="pending-moderation">
						This institution page isn't moderated yet. Please come back later to see updates from the institution owners here
					</div>
				@endif

				@foreach($posts as $post)
					@include('snippets.post', array('post' => $post))
				@endforeach
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
