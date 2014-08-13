<div class="message-picture profile-picture">
	@if(isset($_message))
		{{ HTML::image(HTML::profile_picture($_message->from_user), 'Profile Picture', array('width' => 50)) }}
	@else
		{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
	@endif
</div>

<div class="message-content">
	<p>{{ isset($_message->message) ? nl2br(e($_message->message)) : '<textarea placeholder="Start typing ..."></textarea>' }}</p>
</div>
<div class="clear"></div>

<div class="message-time time-ago" data-time="{{ $_message->created_at or 0 }}" {{ !isset($_message) ? 'style="display: none;"' : '' }}></div>
<div class="clear"></div>
