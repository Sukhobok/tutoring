<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Financial Center'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<!--
				<div class="ss-section">
					<h1>Financial Center</h1>

					<div class="page-settings-inner">
						<p>
							Please choose fill out the following method of payment that you would like to receive payments.
						</p>

						<ul class="ss-financial">
							<li>CHECK*1 REPUBLIC <span class="ss-delete-financial">Delete</span></li>
						</ul>

						<div style="margin-top: 15px;">
							<button class="ss-button green bold inline">Add a check</button>
							<button class="ss-button green bold inline">Add a bank account</button>
						</div>
					</div>
				</div>
				-->

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
				Your money will go to you Dwolla account ({{{ Auth::user()->email }}})!
			</div>
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-withdrawal-confirm inline">OK</button>
			<button class="ss-button blue bold ss-modal-close inline" style="margin-left: 20px;">Cancel</button>
		</p>
	</div>
</div>
