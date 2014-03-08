<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar')
		</div>

		<div class="layout-main page-settings">
			@foreach ($messages as $message)
				<p>{{ $message }}</p>
			@endforeach

			<div class="ss-container">
				<div class="ss-section">
					{{ Form::open(array('name' => 'settings.profile', 'files' => true)) }}
						{{ Form::submit('Save', array('class' => 'ss-button green bold ss-save')) }}
						<h1>General information</h1>
						<div class="clear"></div>

						<table>
							<tr>
								<td>Name</td>
								<td>
									{{ Form::text('name', $user->name, array('class' => 'ss-input1')) }}
								</td>
							</tr>

							<tr>
								<td>Nickname</td>
								<td>
									{{ Form::text('nickname', $user->nickname, array('class' => 'ss-input1')) }}
								</td>
							</tr>

							<tr>
								<td>E-mail</td>
								<td>
									{{ Form::email('email', $user->email, array('class' => 'ss-input1')) }}
								</td>
							</tr>

							<tr>
								<td>Password</td>
								<td>
									Old password:
									{{ Form::password('old_password', array('class' => 'ss-input2')) }}
									<br />
									New password:
									{{ Form::password('password', array('class' => 'ss-input2')) }}
									<br />
									Retype new password:
									{{ Form::password('password_confirmation', array('class' => 'ss-input2')) }}
								</td>
							</tr>

							<tr>
								<td>Birthday</td>
								<td>
									{{ Form::selectRange('b_year', date('Y')-10, date('Y')-100, $user->birthday['y'] ?: '1914', array('class' => 'ss-select uppercase')) }}
									{{ Form::selectMonth('b_month', $user->birthday['m'] ?: '1', array('class' => 'ss-select uppercase')) }}
									{{ Form::selectRange('b_day', 1, 31, $user->birthday['d'] ?: '1', array('class' => 'ss-select uppercase')) }}
									<br />
									{{ Form::checkbox('b_save', '1', (bool) $user->birthday['d']) }} Save birthday
								</td>
							</tr>

							<tr>
								<td>Gender</td>
								<td>
									{{ Form::select('gender', array(
										'unknown' => 'Unknown',
										'male' => 'Male',
										'female' => 'Female'
									), $user->gender, array('class' => 'ss-select')) }}
								</td>
							</tr>

							<tr>
								<td>Languages</td>
								<td>
									{{ Form::text('languages', '', array('class' => 'ss-input1')) }}
								</td>
							</tr>

							<tr>
								<td>Profile Picture</td>
								<td>
									{{ Form::ss_file('photo', array('class' => 'ss-picture-upload'), 'blue') }}
									{{ Form::hidden('profile_x', '0') }}
									{{ Form::hidden('profile_y', '0') }}
									{{ Form::hidden('profile_w', '0') }}
									{{ Form::hidden('profile_h', '0') }}
									<div id="ss-picture-preview"></div>
								</td>
						</table>
					{{ Form::close() }}
				</div>

				<div class="ss-section">
					{{ Form::submit('Save', array('class' => 'ss-button green bold ss-save')) }}
					<h1 style="float: left;">Education</h1>
					{{ Form::button('Add new', array('class' => 'ss-button blue bold ss-add-education')) }}
					<div class="clear"></div>

					<div class="hide snippet-add-education">
						@include('settings.snippets.add_education')
					</div>

					<table class="ss-table-education">
						<tr>
							<td>
								High School - N/A<br />
								<span class="bold">School name here</span><br />
								2005-2009, Majored in <span class="bold">asd</span>
								{{ Form::button('Delete', array('class' => 'ss-button red bold ss-delete')) }}
							</td>
						</tr>
						<?php for($i = 1; $i <= 2; $i++): ?>
							<tr>
								<td>
									@include('settings.snippets.add_education')
								</td>
							</tr>
						<?php endfor; ?>
					</table>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
