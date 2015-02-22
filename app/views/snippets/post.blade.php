<article>
	<div class="article-left">
		<div class="profile-picture">
			{{ HTML::image($post->author['profile_picture'], 'Profile Picture', array('width' => 50)) }}
		</div>
		
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

	<div class="article-right">
		<div class="ss-container">
			<div class="article-content ss-section">
				<div class="article-title">
					<span class="bold ss-link" data-ss-link="{{ Alias::getURL('User', $post->author['id']) }}">
						{{{ $post->author['name'] }}}
					</span>
					
					@if($post->withContext)
						@if($post->postable_type == "Classroom")
							- <span class="classroom-color bold ss-link" data-ss-link="{{ Alias::getURL('Classroom', $post->postable_id) }}">
								{{{ $post->postable_name }}}
							</span>
						@elseif($post->postable_type == "Group")
							- <span class="group-color bold ss-link" data-ss-link="{{ Alias::getURL('Group', $post->postable_id) }}">
								{{{ $post->postable_name }}}
							</span>
						@endif
					@endif
				</div>

				<div class="article-content-text">{{ HTML::parse_links($post->post) }}</div>

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

			@if (Auth::check())
				<div class="post-comment ss-section">
					<div class="profile-picture"> 
						{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
					</div>

					<textarea class="post-comment-textarea" placeholder="Write a comment ..." data-ss-pid="{{ $post->id }}"></textarea>

					<div class="post-comment-bottom">
						<div class="post-comment-pressing-enter">
							{{ Form::checkbox('post-comment-pressing-enter-cb', '1', true, array('class' => 'post-comment-pressing-enter-cb')) }}
							Send by pressing enter
						</div>
						<button class="ss-button blue bold small-button inline post-comment-button" data-ss-pid="{{ $post->id }}">POST</button>
					</div>
				</div>
			@endif

			<div class="posted-comments" data-ss-pid="{{ $post->id }}">
				@foreach($post->comments as $comment)
					<div class="posted-comment ss-section"> 
						@include('snippets.comment', array('comment' => $comment))
					</div>
				@endforeach

				@if (count($post->comments) > 2)
					<div class="center">
						<button class="ss-button blue bold inline show-more">Show more</button>
					</div>
				@endif
			</div>
		</div>
	</div>

	<div class="clear"></div>
</article>
