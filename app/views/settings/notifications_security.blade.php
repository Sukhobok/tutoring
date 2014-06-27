<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Notifications &amp; Security'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Notifications</h1>

					<table>
						<tr>
							<td>
								Who can send you notifications
							</td>
							<td>
								Friend requests:{{ Form::select(
									'notifications_friend_requests',
									array(
										'Everybody' => 'Everybody',
										'Friends of Friends' => 'Friends of Friends',
										'Nobody' => 'Nobody'
									),
									Auth::user()->notifications_friend_requests,
									array('class' => 'ss-select ss-ns-change', 'data-ss-ns-change' => 'notifications_friend_requests')) }}

								<br />
								
								Messages: {{ Form::select(
									'notifications_messages',
									array(
										'Everybody' => 'Everybody',
										'Friends of Friends' => 'Friends of Friends',
										'Only Friends' => 'Only Friends'
									),
									Auth::user()->notifications_messages,
									array('class' => 'ss-select ss-ns-change', 'data-ss-ns-change' => 'notifications_messages')) }}
							</td>
						</tr>

						<tr>
							<td>
								Time until next appointment
							</td>
							<td>
								Hours early: {{ Form::select(
									'notifications_hours_early',
									array(
										'1' => '1 Hour',
										'2' => '2 Hours',
										'3' => '3 Hours',
										'4' => '4 Hours',
										'5' => '5 Hours',
										'12' => '12 Hours',
										'24' => '24 Hours'
									),
									Auth::user()->notifications_hours_early,
									array('class' => 'ss-select ss-ns-change', 'data-ss-ns-change' => 'notifications_hours_early')) }}
							</td>
						</tr>
					</table>
				</div>

				<div class="ss-section">
					<h1>Security</h1>

					<table>
						<tr>
							<td>
								Who can see your profile
							</td>
							<td>
								{{ Form::select(
									'security_see_profile',
									array(
										'Everybody' => 'Everybody',
										'Friends of Friends' => 'Friends of Friends',
										'Only Friends' => 'Only Friends'
									),
									Auth::user()->security_see_profile,
									array('class' => 'ss-select ss-ns-change', 'data-ss-ns-change' => 'security_see_profile')) }}
							</td>
						</tr>

						<tr>
							<td>
								Do you want search engines to link your profile?
							</td>
							<td>
								{{ Form::select(
									'security_search_engine',
									array(
										'Yes' => 'Yes',
										'No' => 'No'
									),
									Auth::user()->security_search_engine,
									array('class' => 'ss-select ss-ns-change', 'data-ss-ns-change' => 'security_search_engine')) }}
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
