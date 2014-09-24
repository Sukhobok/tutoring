<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'My Profile'))
		</div>

		<div class="layout-main page-settings">
			@foreach ($messages as $message)
				<div style="background: #7bb21b; color: #fff; font-weight: 700; text-align: center; padding: 8px; border-radius: 5px; margin-bottom: 12px;">
					{{ $message }}
				</div>
			@endforeach

			<div class="ss-container">
				<div class="ss-section">
					{{ Form::open(array('route' => 'settings.profile', 'files' => true)) }}
						{{-- Form::submit('Save', array('class' => 'ss-button green bold ss-save')) --}}
						<h1>General information</h1>
						<div class="clear"></div>

						<table>
							<tr>
								<td>First Name</td>
								<td>
									{{ Form::text('first_name', $user->first_name, array('class' => 'ss-input1')) }}
								</td>
							</tr>

							<tr>
								<td>Last Name</td>
								<td>
									{{ Form::text('last_name', $user->last_name, array('class' => 'ss-input1')) }}
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

							{{--
							<tr>
								<td>Languages</td>
								<td>
									{{ Form::text('languages', '', array('class' => 'ss-input1')) }}
								</td>
							</tr>
							--}}

							<tr>
								<td>Profile Picture</td>
								<td>
									{{ Form::ss_file('photo', array('class' => 'ss-picture-upload'), 'blue') }}
									{{ Form::hidden('profile_x', '0') }}
									{{ Form::hidden('profile_y', '0') }}
									{{ Form::hidden('profile_w', '0') }}
									{{ Form::hidden('profile_h', '0') }}
									<div class="ss-picture-preview"></div>
								</td>
						</table>

						{{ Form::submit('Save', array('class' => 'ss-button green bold', 'style' => 'margin: 0 10px 15px 10px;')) }}
					{{ Form::close() }}
				</div>

				{{-- Add education snippet --}}
				<div class="hide snippet-add-education">
					@include('settings.snippets.add_education')
				</div>

				<div class="ss-section">
					{{ Form::open(array('route' => 'settings.save_education')) }}
						{{-- Form::submit('Save', array('class' => 'ss-button green bold ss-save')) --}}
						<h1 style="float: left;">Education</h1>
						{{ Form::button('Add new', array('class' => 'ss-button blue bold ss-add-education')) }}
						<div class="clear"></div>

						<table class="ss-table-education">
							@foreach($education as $_education)
								<tr>
									<td>
										{{{ $_education->type }}} - {{{ $_education->degree }}}<br />
										<span class="bold">{{{ $_education->name }}}</span><br />
										{{{ $_education->from }}}-{{{ $_education->to }}}
										@if($_education->major)
											, Majored in <span class="bold">{{{ $_education->major }}}</span>
										@endif
										{{ Form::button('Delete', array('class' => 'ss-button red bold ss-delete', 'data-ss-id' => $_education->id)) }}
									</td>
								</tr>
							@endforeach
						</table>

						{{ Form::submit('Save', array('class' => 'ss-button green bold', 'style' => 'margin: 0 10px 15px 10px;')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
