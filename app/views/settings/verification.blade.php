<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Identity Verification'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Identity verification</h1>

					<div class="page-settings-inner">
						<p>
							Verify your identity in order to make withdrawals
						</p>

						<p class="bold" style="margin-top: 15px;">
							Please upload an image (maximum 2MB) representing a copy of your:

							<ul>
								<li>Identity Card</li>
								<li>Driver License</li>
								<li>Passport</li>
							</ul>
						</p>

						<div style="margin-top: 15px;"> 
							{{ Form::open(array('route' => 'settings.verification', 'files' => true)) }}
								{{ Form::file('photo') }}
								<button class="ss-button green bold">Send verification</button>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
