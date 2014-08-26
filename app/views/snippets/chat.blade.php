<div id="ss-chat-inner" style="display: none;">
	<div class="ss-chat-main">
		<h1 class="ss-chat-title">
			Categories
		</h1>

		<div class="ss-chat-category is-active" data-ss-chat-category="tutors">
			<span class="ss-chat-category-bull is-green">&#x25cf;</span>
			Tutors
		</div>

		<div class="ss-chat-category" data-ss-chat-category="friends">
			<span class="ss-chat-category-bull is-blue">&#x25cf;</span>
			Friends
		</div>

		<div class="ss-chat-category" data-ss-chat-category="latest">
			<span class="ss-chat-category-bull is-red">&#x25cf;</span>
			Latest Conversations
		</div>

		{{-- Categories Content --}}
		<div class="ss-chat-category-items" data-ss-chat-category="tutors">
			@foreach($chat_tutors as $subject)
				<h1 class="ss-chat-title is-green">
					{{{ HTML::limit($subject->name, 18) }}} Tutors
				</h1>

				<div class="ss-chat-item-list">
					@foreach ($subject->users['data'] as $user)
						<div class="ss-chat-item" data-ss-uid="{{{ $user->id }}}">
							<div class="ss-chat-item-left">
								<div class="profile-picture">
									{{ HTML::image(HTML::profile_picture($user), 'Profile Picture', array('width' => 50)) }}
								</div>
							</div>

							<div class="ss-chat-item-right">
								<h2 class="ss-chat-item-name">{{{ HTML::limit($user->name) }}}</h2>
								<span class="ss-chat-item-info">${{{ $user->price }}}/hour</span>
							</div>
							<div class="clear"></div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>

		<div class="ss-chat-category-items" data-ss-chat-category="friends" style="display: none;">
			<h1 class="ss-chat-title is-blue">
				Friends
			</h1>
			<div class="ss-chat-item-list">
				@foreach ($chat_friends as $friend)
					<div class="ss-chat-item" data-ss-uid="{{{ $friend->id }}}">
						<div class="ss-chat-item-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($friend), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="ss-chat-item-right">
							<h2 class="ss-chat-item-name">{{{ HTML::limit($friend->name) }}}</h2>
							<span class="ss-chat-item-info">{{{ $friend->education }}}</span>
						</div>
						<div class="clear"></div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="ss-chat-category-items" data-ss-chat-category="latest" style="display: none;">
			<h1 class="ss-chat-title is-red">
				Latest Conversations
			</h1>
			<div class="ss-chat-item-list">
				@foreach ($chat_conversations as $conversation)
					<div class="ss-chat-item" data-ss-uid="{{{ $conversation->id }}}">
						<div class="ss-chat-item-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($conversation), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="ss-chat-item-right" style="margin-top: 0;">
							<h2 class="ss-chat-item-name">{{{ HTML::limit($conversation->name) }}}</h2>
							<span class="ss-chat-item-info">
								<span style="font-size: 12px;" class="time-ago" data-time="{{{ $conversation->created_at }}}"></span>
								<br />
								{{{ HTML::limit($conversation->message) }}}
							</span>
						</div>
						<div class="clear"></div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	{{-- One conversation --}}
	<div class="ss-chat-conversation" style="display: none;" data-ss-uid="">
		<div class="chat-conversation-container is-red">
			<!-- Content here -->

			<div class="sent-message ss-chat-conversation-write">
				@include('snippets.chat_message')
			</div>
		</div>
		<button class="ss-button2 black bold ss-chat-conversation-back">BACK</button>
	</div>
</div>
