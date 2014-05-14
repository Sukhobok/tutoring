<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'My Wallet'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
						<h1>StudySquare Wallet</h1>

						<div class="page-settings-inner">
							<p>Deposit funds into your Wallet to hire tutors, buy books and much more. Here are your funds:</p>
							<div class="ss-money-green">
								0
							</div>
						</div>
				</div>

				<div class="ss-section">
					{{ Form::open(array('route' => 'settings.add_funds')) }}
						<h1>Add Funds</h1>

						<div class="page-settings-inner">
							<p>Adding funds is simple. Just enter your information below. Everything is secure, so  you dont have to worry about anyone stealing your information.</p><br />
							<p class="bold" style="color: #000;">Debit Cards (also called check cards, ATM cards, or banking cards) are accepted if they have a Visa logo. Enter your card number without spaces or dashes.</p>

							<table class="ss-table-add-funds">
								<tr>
									<td width="80">
										First Name
									</td>

									<td>
										{{ Form::text('ss-add-funds-first-name', '', array('class' => 'ss-input3 isFullWidth')) }}
									</td>

									<td width="80">
										Last Name
									</td>

									<td>
										{{ Form::text('ss-add-funds-last-name', '', array('class' => 'ss-input3 isFullWidth')) }}
									</td>
								</tr>

								<tr>
									<td width="80">
										Card Number
									</td>

									<td>
										{{ Form::text('ss-add-funds-card-number', '', array('class' => 'ss-input3 isFullWidth')) }}
									</td>

									<td width="80">
										Zip Code
									</td>

									<td>
										{{ Form::text('ss-add-funds-zip-code', '', array('class' => 'ss-input3 isFullWidth')) }}
									</td>
								</tr>

								<tr>
									<td width="80">
										Expiration Date
									</td>

									<td>
										{{ Form::selectMonth('ss-add-funds-exp-month', '1', array('class' => 'ss-select uppercase')) }}
										{{ Form::selectRange('ss-add-funds-exp-year', date('Y'), date('Y')+10, date('Y'), array('class' => 'ss-select uppercase')) }}
									</td>

									<td width="80">
										CVV Code
									</td>

									<td>
										{{ Form::text('ss-add-funds-cvv-code', '', array('class' => 'ss-input3 isFullWidth')) }}
									</td>
								</tr>
							</table>

							<div>
								How much do you want to deposit? (min $25) &nbsp;
								<div class="ss-input-with-label-in inline">
									{{ Form::text('ss-add-funds-amount', 25, array('class' => 'ss-input3')) }}
									{{ Form::label('ss-add-funds-amount', '$') }}
								</div>
							</div>

							{{ Form::submit('Add Funds', array('class' => 'ss-button blue bold')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
