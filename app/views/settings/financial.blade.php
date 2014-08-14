<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Financial Center'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Financial Center</h1>

					<div class="page-settings-inner">
						<p>
							Please fill out the following method of payment that you would like to receive payments.
						</p>

						<ul class="ss-financial">
							@foreach ($dwolla_accounts as $dwolla_account)
								<li>
									DWOLLA: {{{ HTML::limit($dwolla_account->email, 30) }}}
									<span class="ss-delete-financial ss-financial-delete-dwolla" data-ss-dwolla-id="{{{ $dwolla_account->id }}}">
										Delete
									</span>
								</li>
							@endforeach
						</ul>

						<div style="margin-top: 15px;">
							<button class="ss-button green bold inline ss-financial-add-dwolla">Add a Dwolla Account</button>
						</div>
					</div>
				</div>

				<div class="ss-section">
					<h1>Withdrawal Funds</h1>

					<div class="page-settings-inner">
						<p>
							We only accept Dwolla withdrawals for now. Please select the amount you want to withdrawal:
						</p>

						<table style="text-align: center;">
							<tr>
								<td style="width: 30%;">All time income</td>
								<td style="width: 30%;">Your Funds</td>
								<td style="width: 40%;">Select withdrawal amount:</td>
							</tr>

							<tr>
								<td><div class="ss-money-green">{{{ $all_time_income }}}</div></td>
								<td><div class="ss-money-white ss-money-withdrawal-your-funds">{{{ $withdrawal_available }}}</div></td>
								<td><input class="ss-money-input ss-money-withdrawal-input" value="0" /></td>
							</tr>
						</table>

						<button class="ss-button blue bold ss-money-withdrawal-button" style="margin: 0 auto;">WITHDRAWAL</button>
					</div>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>

<div class="ss-modal" id="ss-modal-withdrawal-error">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			You don't have enough money to withdraw!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-withdrawal-error2">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			There was an error with your withdrawal! Check if you have your account verified and try again!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-withdrawal-success">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			Your money have been withdrawn!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-withdrawal">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			<div style="color: #82bb1f; font-size: 50px; font-weight: 900;"  class="ss-modal-withdrawal-amount">
				$0
			</div>

			<div style="margin-top: 25px;">
				Select a payment option:
			</div>

			<div style="margin-top: 15px;">
				<ul class="bold" style="font-size: 18px;">
					@foreach ($dwolla_accounts as $dwolla_account)
						<li class="ss-modal-withdrawal-method" data-ss-method-id="{{{ $dwolla_account->id }}}">
							DWOLLA: {{{ HTML::limit($dwolla_account->email, 30) }}}
						</li>
					@endforeach
				</ul>
			</div>
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close inline">Cancel</button>
		</p>
	</div>
</div>

<div class="ss-modal" id="ss-modal-add-dwolla">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			<div style="margin-bottom: 25px;">
				Please enter your Dwolla E-mail address:
			</div>

			<div>
				<input class="ss-input3" name="ss-add-dwolla-email" type="text" value="" style="width: 350px;">
			</div>
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close inline ss-modal-add-dwolla-save" style="margin-right: 25px;">Save</button>
			<button class="ss-button blue bold ss-modal-close inline">Cancel</button>
		</p>
	</div>
</div>
