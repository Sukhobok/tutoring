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
						@if ($validator_errors)
							<div style="margin-bottom: 15px;" class="ss-highlight red">The form was not saved! All fields are required!</div>
						@endif

						@if (Auth::user()->verified == 'not sent')
							{{-- Ask for the ID --}}
							<p>
								Verify your identity in order to make withdrawals
							</p>

							<p class="bold" style="margin-top: 15px;">
								Please upload an image (maximum 4MB) representing a copy of your:

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
						@elseif (Auth::user()->verified == 'pending')
							{{-- Tell the user that he needs to wait for the confirmation --}}
							<p style="margin-bottom: 15px;">You have uploaded the following document: </p>
							{{ HTML::image(HTML::get_from_s3($verification_id->path), 'Verification Id', array('width' => 450)) }}

							<p class="bold" style="margin-top: 15px;">Your ID is pending verification.</p>
							<p>
								As soon as you are verified, you will receive a notification with further instructions.
								<br />
								Please allow up to 24 hours.
							</p>
						@else
							{{-- He is verified, we need to check for W9 --}}
							@if (Auth::user()->w9 == 'required')
								<p class="bold">Your account is verified! You just need to complete the following W-9 form!</p>
								@include('settings.w9_form')
							@elseif (Auth::user()->w9 == 'complete')
								<p class="bold">Your account is verified! You can change your W-9 form below!</p>
								@include('settings.w9_form', compact('old_w9'))
							@else
								<p class="bold">
									Your account has been verified and we don't need any additional information!
									<br />
									Thank you for using StudySquare!
								</p>
							@endif
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
