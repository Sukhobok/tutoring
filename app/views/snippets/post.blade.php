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
