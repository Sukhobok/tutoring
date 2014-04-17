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
						<p>{{ Form::checkbox('tc-available-now', '1', (bool) Auth::user()->available) }} I'm Available Now</p>
						
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
