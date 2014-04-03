<div class="message-picture profile-picture">
	@if(isset($_selected_conversation))
		{{ HTML::image(HTML::profile_picture($_selected_conversation->from_user), 'Profile Picture', array('width' => 50)) }}
	@else
		{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
	@endif
</div>

<div class="message-content">
	<p>{{ isset($_selected_conversation->message) ? nl2br(e($_selected_conversation->message)) : 'message' }}</p>
</div>
<div class="clear"></div>

<div class="message-time time-ago" data-time="{{ $_selected_conversation->created_at or 0 }}">

</div>
<div class="clear"></div>
