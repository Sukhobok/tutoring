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

					<button class="ss-button2 black bold">ADD FRIEND</button>
					<button class="ss-button2 green bold">HIRE</button>
					<button class="ss-button2 blue bold">SEND A MESSAGE</button>
					<button class="ss-button2 red bold">BLOCK</button>
				</div>
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
				@foreach($user->posts as $post)
					<article>
						<div class="article-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="article-right">
							<div class="ss-container">
								<div class="article-content ss-section">
									{{{ $post->post }}}

									<div class="article-footer">
										<div class="time-ago ss-highlight gray" data-time="{{ $post->created_at->timestamp }}"></div>
										<div class="article-share ss-highlight green bold">Share</div>
										<div class="thumbs-container">
											<div class="thumb-up">
												..
											</div>
											<div class="thumb-down">
												..
											</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>

								<div class="post-comment ss-section">
									Post a comment ...
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</article>
				@endforeach
			</div>

			<div class="page-tab-component page-tab-photos">
				photos
			</div>

			<div class="page-tab-component page-tab-friends">
				friends
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
