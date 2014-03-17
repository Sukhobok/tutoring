<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.left_sidebar')
		</div>

		<div class="layout-main">
			<div id="post_message">
				{{ Form::open(array('route' => 'user.post', 'files' => true)) }}
					<h2>POST A QUESTION or MESSAGE</h2>
					{{ Form::textarea('post') }}
					{{ Form::submit('POST', array('class' => 'ss-button blue bold')) }}
					{{ Form::ss_file('photos[]', array('multiple' => true)) }}
					<div class="clear"></div>
				{{ Form::close() }}
			</div>

			@foreach(Auth::user()->profilePosts as $post)
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
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
