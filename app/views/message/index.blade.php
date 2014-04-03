<div class="content">
	<div class="layout">
		<div class="layout-sidebar message-page">
			<div class="message-container-left">
				@if(!$conversation_before && $selected_user)
					<div class="conversation-item is-selected">
						<div class="conversation-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($selected_user), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="conversation-right">
							<div class="conversation-name">
								{{{ $selected_user->name }}}
							</div>

							<div class="conversation-last">

							</div>

							<div class="conversation-time time-ago" data-time="">

							</div>
						</div>

						<div class="clear"></div>
					</div>
				@endif

				@if($selected_user)
					@foreach($conversations as $conversation)
						<div class="conversation-item{{ ($conversation->id == $selected_user->id) ? ' is-selected' : '' }}" data-uid="{{ $conversation->id }}">
							<div class="conversation-left">
								<div class="profile-picture">
									{{ HTML::image(HTML::profile_picture($conversation), 'Profile Picture', array('width' => 50)) }}
								</div>
							</div>

							<div class="conversation-right">
								<div class="conversation-name">
									{{{ $conversation->name }}}
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
				@endif
			</div>
		</div>

		<div class="layout-main message-page">
			<div class="hide snippet-message">
				@include('message.snippets.message')
			</div>

			<div class="message-container-main">
				@foreach ($selected_conversation as $_selected_conversation)
					<div class="{{ $_selected_conversation->type }}-message"> {{-- sent-message / received-message --}}
						@include('message.snippets.message', compact('_selected_conversation'))
					</div>
				@endforeach
			</div>

			@if($selected_user)
				<div class="message-new">
					<div class="message-picture profile-picture">
						{{ HTML::image(HTML::profile_picture(Auth::user()), 'Profile Picture', array('width' => 50)) }}
					</div>

					<textarea></textarea>
					<div class="clear"></div>
					<button class="ss-button blue bold message-send" data-uid="{{ $selected_user->id }}">SEND</button>
				</div>
			@endif
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
