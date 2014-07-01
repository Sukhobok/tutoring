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

				<div class="ss-section">
					<h1>Withdrawal Funds</h1>

					<div class="page-settings-inner">
						<p>
							Select your method and how much you would like to withdrawal. Please allow 24-48 hours for processing.
						</p>

						<table style="text-align: center;">
							<tr>
								<td style="width: 30%;">All time income</td>
								<td style="width: 30%;">Your Funds</td>
								<td style="width: 40%;">Select withdrawal amount:</td>
							</tr>

							<tr>
								<td><div class="ss-money-green">0</div></td>
								<td><div class="ss-money-white">0</div></td>
								<td><input class="ss-money-input" value="0" /></td>
							</tr>
						</table>

						<button class="ss-button blue bold" style="margin: 0 auto;">WITHDRAWAL</button>
					</div>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
