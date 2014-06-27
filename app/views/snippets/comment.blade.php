<div class="profile-picture posted-comment-picture">
	@if(isset($comment))
		{{ HTML::image(HTML::profile_picture($comment), 'Profile Picture', array('width' => 50)) }}
	@else
		{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
	@endif
</div>

<div class="posted-comment-body">
	<span class="bold ss-link" data-ss-link="{{ isset($comment) ? Alias::getURL('User', $comment->author_id) : Alias::getURL('User', Auth::user()->id) }}">
		{{{ $comment->name or Auth::user()->name }}}
	</span>

	<div class="posted-comment-message">
		{{ isset($comment) ? nl2br(e($comment->comment)) : 'comment' }}
	</div>

	<div class="posted-comment-time time-ago" data-time="{{ $comment->created_at or 0 }}"></div>
</div>
<div class="clear"></div>
