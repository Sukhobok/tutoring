<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Tutor Center'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Tutor Center</h1>

					<div class="page-settings-inner">
						<p>Type in and select subjects you want to tutor:</p>
						<br />
						{{ Form::text('ss-complete-subjects', '', array('class' => 'ss-complete-subjects')) }}
						<p>Haven't found your subject? You can send a request below:</p>
						{{ Form::text('ss-request-subject-name', '', array('class' => 'ss-request-subject-name ss-input2')) }}
						<button class="ss-button green bold inline ss-request-subject">Send request</button>

						<p style="margin-top: 25px;">{{ Form::checkbox('tc-available-now', '1', (bool) Auth::user()->available) }} I'm Available Now</p>
						
						<table>
							<tr>
								<td>
									Bio:&nbsp;&nbsp;
								</td>

								<td>
									{{ Form::textarea('tc-bio', Auth::user()->bio, array('style' => 'width: 300px; height: 60px;')) }}
								</td>
							</tr>
						</table>

						<div>
							Please enter your hourly rate:
							<div class="ss-input-with-label-in inline">
								{{ Form::text('tc-hourly-rate', (int) Auth::user()->price, array('class' => 'ss-input3')) }}
								{{ Form::label('tc-hourly-rate', '$') }}
							</div>
						</div>

						<p style="font-style: italic;">Your rate will appear when students are searching for a tutor.</p>
						<br />
						<div>
							Your net rate after StudySquare fees:
							<div class="ss-input-with-label-in inline">
								{{ Form::text('tc-net-rate', Auth::user()->net_price, array('class' => 'ss-input3', 'disabled' => true)) }}
								{{ Form::label('tc-net-rate', '$') }}
							</div>
						</div>

						<p style="font-style: italic;">
							StudySquare fees are 10% + $1 per session.<br />
							ie. if you charge $40/hour and you are hired for 1 Hour, there will be $5 in fees. You will net $35. If you are hired for 2 Hours, you will net $71.
						</p>
					</div>
				</div>

				@if (count($incomingRequests) > 0)
					<div class="ss-section">
						<h1>Incoming requests</h1>
						<div class="page-settings-inner">
							<p>Please review your incoming tutoring requests and choose which day and time works best for your schedule.</p>

							<table class="settings-filled-table">
								<tr>
									<td>Person</td>
									<td>User preferable dates</td>
									<td>Learning Needs</td>
									<td>Action</td>
								</tr>

								@foreach ($incomingRequests as $incomingRequest)
									<tr>
										<td style="width: 100px;">
											<div class="profile-picture">
												{{ HTML::image(HTML::profile_picture($incomingRequest), 'Profile Picture', array('width' => 60)) }}
											</div>
											<br /><br />
											<div>
												{{{ $incomingRequest->userName }}}
											</div>
										</td>

										<td>
											@foreach ($incomingRequest->availableDates as $date)
												<div>
													{{ Form::radio('ss-inc-req-date' . $incomingRequest->id, $date['id']) }}
													<span class="time-ago" data-time="{{ $date['time'] }}"></span>
												</div>
											@endforeach
										</td>
										
										<td style="width: 100px;">
											{{{ $incomingRequest->description }}}
										</td>
										
										<td>
											<button data-hr-id="{{ $incomingRequest->id }}" class="ss-button green bold small-button ss-inc-req-approve">APPROVE</button>
											<br />
											<button data-hr-id="{{ $incomingRequest->id }}" class="ss-button red bold small-button ss-inc-req-decline">DECLINE</button>
										</td>
									</tr>
								@endforeach
								
							</table>
						</div>
					</div>
				@endif

				@if (count($oldSessions) > 0)
					<div class="ss-section">
						<h1>Old Tutoring Sessions</h1>
						<div class="page-settings-inner">
							<p>View all your sessions history here.</p>

							<table class="settings-filled-table">
								<tr>
									<td>Person</td>
									<td>Date</td>
									<td>What you learned</td>
									<td>Actions</td>
								</tr>

								@foreach ($oldSessions as $oldSession)
									<tr>
										<td style="width: 100px;">
											<div class="profile-picture">
												{{ HTML::image(HTML::profile_picture($oldSession), 'Profile Picture', array('width' => 60)) }}
											</div>
											<br /><br />
											<div>
												{{{ $oldSession->userName }}}
											</div>
										</td>

										<td>
											<span class="time-ago" data-time="{{ $oldSession->started_at }}"></span>
										</td>
										
										<td style="width: 100px;">
											{{{ $oldSession->description }}}
										</td>
										
										<td>
											@if ($oldSession->saved == 'yes')
												<button class="ss-button green bold small-button ss-link" data-ss-link="{{{ URL::route('tutoring_session.replay', $oldSession->id) }}}">REPLAY</button>
											@else
												-
											@endif
										</td>
									</tr>
								@endforeach
								
							</table>
						</div>
					</div>
				@endif
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>

<script type="text/javascript">
	var current_user_subjects = {{ json_encode($current_user_subjects) }};
</script>
