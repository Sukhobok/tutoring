<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar')
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>General information</h1>

					<table>
						<tr>
							<td>Name</td>
							<td>
								{{ Form::text('name', Auth::user()->name, array('class' => 'ss-input1', 'data-ss-settings-change' => 'name')) }}
							</td>
						</tr>

						<tr>
							<td>Nickname</td>
							<td>
								{{ Form::text('nickname', Auth::user()->nickname, array('class' => 'ss-input1', 'data-ss-settings-change' => 'nickname')) }}
							</td>
						</tr>

						<tr>
							<td>E-mail</td>
							<td>
								{{ Form::email('email', Auth::user()->email, array('class' => 'ss-input1', 'data-ss-settings-change' => 'email')) }}
							</td>
						</tr>

						<tr>
							<td>Password</td>
							<td data-ss-settings-expand="password_o">
								{{ Form::password('password', array('class' => 'ss-input1', 'data-ss-settings-expand' => 'password')) }}
							</td>
							<td data-ss-settings-expand="password_e" style="display: none;">
								asd
							</td>
						</tr>

						<tr>
							<td>Birthday</td>
							<td data-ss-settings-expand="birthday_o">
								{{ Form::text('birthday', Auth::user()->birthday, array('class' => 'ss-input1', 'data-ss-settings-expand' => 'birthday')) }}
							</td>
							<td data-ss-settings-expand="birthday_e" style="display: none;">
								asd2
							</td>
						</tr>

						<tr>
							<td>Gender</td>
							<td data-ss-settings-expand="gender_o">
								{{ Form::text('gender', ucfirst(Auth::user()->gender), array('class' => 'ss-input1', 'data-ss-settings-expand' => 'gender')) }}
							</td>
							<td data-ss-settings-expand="gender_e" style="display: none;">
								asd3
							</td>
						</tr>

						<tr>
							<td>Language</td>
							<td data-ss-settings-expand="language_o">
								{{ Form::text('language', '', array('class' => 'ss-input1', 'data-ss-settings-expand' => 'language')) }}
							</td>
							<td data-ss-settings-expand="language_e" style="display: none;">
								asd2
							</td>
						</tr>
					</table>

					Profile Image: ...
				</div>

				<div class="ss-section">
					<h1>Education</h1>

					<table border="">
						<tr>
							<td>High school</td>
							<td class="settings_extend" data-settings-extend="high_s">
								<input class="" type="text" value="" />
							</td>
						</tr>

						<tr><td colspan="2"><hr style="border:none;border-bottom:1px dashed #ddd;" /></td></tr>

						<tr>
							<td>
								College 
								<br />
								Add new
							</td>
							<td class="settings_extend" data-settings-extend="college">
								<input class="" type="text" value="" />
							</td>
						</tr>

						<tr><td colspan="2"><hr style="border:none;border-bottom:1px dashed #ddd;" /></td></tr>

						<tr>
							<td>
								Graduation School
								<br />
								Add new
							</td>
							<td class="settings_extend" data-settings-extend="graduation_s">
								<input class="" type="text" value="" />
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
