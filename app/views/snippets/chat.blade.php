<div id="ss-chat-inner">
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
						<div class="ss-chat-item" data-ss-uid="{{{ $user->id }}}" data-ss-name="{{{ $user->name }}}">
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
					<div class="ss-chat-item" data-ss-uid="{{{ $friend->id }}}" data-ss-name="{{{ $friend->name }}}">
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
					<div class="ss-chat-item" data-ss-uid="{{{ $conversation->id }}}" data-ss-name="{{{ $conversation->name }}}">
						<div class="ss-chat-item-left">
							<div class="profile-picture">
								{{ HTML::image(HTML::profile_picture($conversation), 'Profile Picture', array('width' => 50)) }}
							</div>
						</div>

						<div class="ss-chat-item-right" style="margin-top: 0;">
							<h2 class="ss-chat-item-name">{{{ HTML::limit($conversation->name) }}}</h2>
							<span class="ss-chat-item-info">
								<span style="font-size: 10px;" class="time-ago" data-time="{{{ $conversation->created_at }}}"></span>
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
</div>

{{-- One conversation New --}}
<div class="layout-chat-right">
	<div class="layout-chat-right-window layout-chat-right-window-model">
		<div class="person-online-check"></div>
		<h1>name</h1>
		<span class="close-chat-window">X</span>
		<span class="minimize-chat-window">_</span>
		<span class="chat-window-hire">Hire</span>
		<div class="layout-chat-right-window-content">
			<div class="typing">
				...
			</div>
			
			<div class="left_message">
				<div style="float: left;">
					<div class="profile-picture message-picture"><img src="/" height="36" /></div>
				</div>
				<div style="float: left;" class="message">
					<p>message</p>
				</div>
				<div class="clear"></div>
				<div class="message_time"><span class="time-ago" data-time="1"></span></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>

			<div class="right_message">
				<div style="float: left;" class="message">
					<p>message</p>
				</div>
				<div class="clear"></div>
				<div class="message_time"><span class="time-ago" data-time="1"></span></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="layout-chat-right-window-input">
			<textarea></textarea>
		</div>
	</div>
</div>

