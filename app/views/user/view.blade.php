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

					<button class="ss-button2 black bold add-friend-button" data-uid="{{{ $user->id }}}">ADD FRIEND</button>
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
				@if(Auth::user()->id == $user->id)
					<div id="post_message">
						{{ Form::open(array('route' => 'user.post', 'files' => true)) }}
							<h2>POST A QUESTION or MESSAGE</h2>
							{{ Form::textarea('post') }}
							{{ Form::submit('POST', array('class' => 'ss-button blue bold')) }}
							{{ Form::ss_file('photos[]', array('multiple' => true)) }}
							<div class="clear"></div>
						{{ Form::close() }}
					</div>
				@endif

				@foreach($posts as $post)
					<article>
						<div class="article-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($user), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="article-right">
							<div class="ss-container">
								<div class="article-content ss-section">
									{{ $post->post }}

									@if($post->images)
										<div class="article-photos">
											@foreach($post->images as $photo)
												<div class="ss-photo">
													{{ HTML::image(HTML::get_from_s3($photo), 'Photo') }}
												</div>
											@endforeach
										</div>
									@endif

									<div class="article-footer">
										<div class="time-ago ss-highlight gray" data-time="{{ $post->created_at }}"></div>
										<div class="article-share ss-highlight green bold">Share</div>
										<div class="thumbs-container">
											<div class="thumb-up" data-pid="{{ $post->id }}">
												<i class="ss-icon ss-thumb-up"></i>
												<span class="thumb-up-count">{{ $post->thumbs_up }}</span>
											</div>
											<div class="thumb-down" data-pid="{{ $post->id }}">
												<i class="ss-icon ss-thumb-down"></i>
												<span class="thumb-down-count">{{ $post->thumbs_down }}</span>
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
				<div class="ss-container">
					@if(Auth::user()->id == $user->id)
						<div class="ss-section">
							{{ Form::ss_file('user_photos[]', array('multiple' => true), 'blue', 'UPLOAD') }}
							<div class="ss-drop-photo"></div>
						</div>
					@endif

					<div class="ss-section photos-container">
						@foreach($images as $photo)
							<div class="ss-photo">
								{{ HTML::image(HTML::get_from_s3($photo->path), 'Photo') }}

								@if(Auth::user()->id == $user->id)
									<div class="ss-photo-hover"></div>
									<div class="ss-photo-delete" data-ss-photo-id="{{{ $photo->id }}}"></div>
								@endif
							</div>
						@endforeach

						@if(count($user->images) == 0)
							<span class="bold">This user has no photos</span>
						@endif
					</div>
				</div>
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
