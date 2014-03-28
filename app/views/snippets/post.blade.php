<article>
	<div class="article-left">
		<div class="profile-picture">
			{{ HTML::image($post->author['profile_picture'], 'Profile Picture', array('width' => 50)) }}

			@if($post->withContext)
				@if($post->postable_type == "Classroom")
					<div class="article-category classroom-category">
						Classroom
					</div>
				@elseif($post->postable_type == "Group")
					<div class="article-category group-category">
						Group
					</div>
				@endif
			@endif
		</div>
	</div>

	<div class="article-right">
		<div class="ss-container">
			<div class="article-content ss-section">
				<div class="article-title">
					<span class="bold ss-link" data-ss-link="{{ URL::to('/user/' . $post->author['id']) }}">
						{{{ $post->author['name'] }}}
					</span>
					
					@if($post->withContext)
						@if($post->postable_type == "Classroom")
							- <span class="classroom-color bold ss-link" data-ss-link="{{ URL::to('/classroom/' . $post->postable_id) }}">
								{{{ $post->postable_name }}}
							</span>
						@elseif($post->postable_type == "Group")
							- <span class="group-color bold ss-link" data-ss-link="{{ URL::to('/group/' . $post->postable_id) }}">
								{{{ $post->postable_name }}}
							</span>
						@endif
					@endif
				</div>

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
