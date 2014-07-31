<div class="ss-w9-form">
	{{ Form::open(array('route' => 'settings.send_w9')) }}
		{{-- Step 1 --}}
		<div class="w9-step">
			<span class="ss-highlight gray">1</span>
			&nbsp; Your contact information
		</div>

		<div>
			Legal name of Individual or Business:
			<br />
			{{ Form::text('name', (isset($old_w9) ? $old_w9->name : ''), array('class' => 'w9-input')) }}
			<br />
			* Must match Name as shown on your income tax return
		</div>

		<div>
			Address:
			<br />
			{{ Form::text('address', (isset($old_w9) ? $old_w9->address : ''), array('class' => 'w9-input')) }}
		</div>

		<div>
			City:
			<br />
			{{ Form::text('city', (isset($old_w9) ? $old_w9->city : ''), array('class' => 'w9-input')) }}
		</div>

		<div>
			State:
			<br />
			{{ Form::text('state', (isset($old_w9) ? $old_w9->state : ''), array('class' => 'w9-input')) }}
		</div>

		<div>
			Zip code:
			<br />
			{{ Form::text('zip', (isset($old_w9) ? $old_w9->zip : ''), array('class' => 'w9-input')) }}
		</div>

		{{-- Step 2 --}}
		<div class="w9-step">
			<span class="ss-highlight red">2</span>
			&nbsp; Your tax status
		</div>

		<div>
			{{ Form::radio('tax_status', '1', (isset($old_w9) ? $old_w9->tax_status == '1' : false)) }}
			&nbsp; Individual/Sole Proprietor
		</div>

		<div>
			{{ Form::radio('tax_status', '2', (isset($old_w9) ? $old_w9->tax_status == '2' : false)) }}
			&nbsp; Corporation
		</div>

		<div>
			{{ Form::radio('tax_status', '3', (isset($old_w9) ? $old_w9->tax_status == '3' : false)) }}
			&nbsp; Partnership
		</div>

		<div>
			{{ Form::radio('tax_status', '4', (isset($old_w9) ? $old_w9->tax_status == '4' : false)) }}
			&nbsp; Exempt Payee
		</div>

		<div>
			Limited Liability Company
			
			<div style="margin-left: 30px;">
				<div>
					{{ Form::radio('tax_status', '5', (isset($old_w9) ? $old_w9->tax_status == '5' : false)) }}
					&nbsp; Limited Liability Company - D (Disregarded entity)
				</div>

				<div>
					{{ Form::radio('tax_status', '6', (isset($old_w9) ? $old_w9->tax_status == '6' : false)) }}
					&nbsp; Limited Liability Company - C (corporation)
				</div>

				<div>
					{{ Form::radio('tax_status', '7', (isset($old_w9) ? $old_w9->tax_status == '7' : false)) }}
					&nbsp; Limited Liability Company - P (partnership)
				</div>
			</div>
		</div>

		{{-- Step 3 --}}
		<div class="w9-step">
			<span class="ss-highlight light-green">3</span>
			&nbsp; Enter your Taxpayer Identification Number (TIN) and Type
		</div>

		<div>
			{{ Form::radio('tin_type', '1', (isset($old_w9) ? $old_w9->tin_type == '1' : false)) }}
			&nbsp; Social Security Number (SSN)
		</div>

		<div>
			{{ Form::radio('tin_type', '2', (isset($old_w9) ? $old_w9->tin_type == '2' : false)) }}
			&nbsp; Employer Identification Number (EIN)
		</div>

		<div>
			Taxpayer Identification Number:
			<br />
			{{ Form::text('tin', (isset($old_w9) ? $old_w9->tin : ''), array('class' => 'w9-input')) }}
		</div>

		{{-- Step 4 --}}
		<div class="w9-step">
			<span class="ss-highlight green">4</span>
			&nbsp; Certification
		</div>

		<div>
			{{ Form::checkbox('correct_tin', '1', isset($old_w9)) }}
			&nbsp; The number shown on this form is my correct taxpayer identification number (or I am waiting for a number to be issued to me).
		</div>

		<div>
			{{ Form::checkbox('backup_witholding', '1', isset($old_w9)) }}
			&nbsp; I am not subject to backup withholding because: I am exempt from backup withholding, or I have not been notified by the Internal Revenue Service (IRS) that I am subject to backup withholding as a result of a failure to report all interest or dividends, or the IRS has notified me that I am no longer subject to backup withholding.
		</div>

		<div>
			{{ Form::checkbox('us_citizen', '1', isset($old_w9)) }}
			&nbsp; I am a U.S. citizen or other U.S. person.
		</div>

		{{ Form::submit('Send my W-9 form details', array('class' => 'ss-button red bold')) }}
	{{ Form::close() }}
</div>
