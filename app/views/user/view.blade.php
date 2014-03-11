<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.left_sidebar')
		</div>

		<div class="layout-main">
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
									<div class="time_ago" data-time="{{ $post->created_at->timestamp }}"></div>
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
