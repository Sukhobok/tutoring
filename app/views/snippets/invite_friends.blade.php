{{-- Invite friends modal --}}
<div class="ss-modal" id="ss-modal-invite-friends">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<h1 style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">Invite Friends</h1>
		
		<div>
			@if (count($friends) > 0)
				<table style="width: 100%; border-spacing: 0 10px; border-collapse: separate;">
					@foreach ($friends as $i => $friend)
						@if ($i%2 == 0)
							<tr>
						@endif

						<td>
							<div style="float: left; padding-top: 20px; padding-right: 10px;">
								<?php
									$hide_checkbox = false;
									if(in_array($friend->id, $friends_joined)) $hide_checkbox = 'joined';
									if(in_array($friend->id, $friends_invited)) $hide_checkbox = 'invited';
								?>
								<input type="checkbox" class="ss-invite-friends-checkbox-friend" <?php if($hide_checkbox) echo 'style="visibility: hidden;"'; ?> data-ss-fid="{{ $friend->id }}" />
							</div>

							<div class="profile-picture" style="float: left;">
								{{ HTML::image(HTML::profile_picture($friend), 'Profile Picture', array('width' => 50)) }}
							</div>
							<div class="friend_name" style="float: left; margin-left: 15px; padding-top: {{ $hide_checkbox ? '0px' : '17px' }};">
								<p>{{{ $friend->name }}}</p>

								@if ($hide_checkbox === 'joined')
									<p style="background: #468847; color: #fff; padding: 3px 7px; border-radius: 100px; font-weight: 900; font-size: 12px; margin-top: 5px;">Already joined</p>
								@elseif ($hide_checkbox === 'invited')
									<p style="background: #468847; color: #fff; padding: 3px 7px; border-radius: 100px; font-weight: 900; font-size: 12px; margin-top: 5px;">Already invited</p>
								@endif
							</div>
							<div class="clear"></div>
						</td>

						@if ($i%2 == 1)
							</tr>
						@endif
					@endforeach
				</table>
			@else
				You don't have any friends
			@endif
		</div>

		<div id="ss-modal-invite-friends-buttons" style="margin-top: 15px;">
			<button class="ss-button green bold inline ss-modal-invite-friends-send">INVITE</button>
			<button class="ss-button red bold inline ss-modal-invite-friends-cancel">CANCEL</button>
		</div>
	</div>
</div>
