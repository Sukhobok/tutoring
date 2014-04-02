<div class="content">
	<div class="layout">
		<div class="layout-sidebar message-page">
			<div class="message-container">
				@foreach($conversations as $conversation)
					<div class="conversation-item{{ ($conversation->id == $uid) ? ' is-selected' : '' }}">
						<div class="conversation-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($conversation), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="conversation-right">
							<div class="conversation-name">
								{{ $conversation->name }}
							</div>

							<div class="conversation-last">
								{{{ HTML::limit($conversation->message) }}}
							</div>

							<div class="conversation-time time-ago" data-time="{{ $conversation->created_at }}">

							</div>
						</div>

						<div class="clear"></div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="layout-main message-page">
			<div class="message-container">
				@foreach ($selected_conversation as $_selected_conversation)
					<div class="{{ $_selected_conversation->type }}-message"> {{-- sent-message / received-message --}}
						<div class="message-picture profile-picture">
							{{ HTML::image(HTML::profile_picture($_selected_conversation->from_user), 'Profile Picture', array('width' => 50)) }}
						</div>

						<div class="message-content">
							<p>{{{ $_selected_conversation->message }}}</p>
						</div>
						<div class="clear"></div>
						
						<div class="message-time time-ago" data-time="{{ $_selected_conversation->created_at }}">

						</div>
						<div class="clear"></div>
					</div>
				@endforeach
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
