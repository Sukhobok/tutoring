<div class="content">
	<div class="layout">
		<div class="layout-main-ext page-cg-create">
			<div class="ss-container">
				{{ Form::open(array('route' => 'group.create', 'files' => true)) }}
					<div class="ss-section">
						<h1>Create a group</h1>
						<p>
							Groups are an easy place for you to socialize with others that have the same interests. Just enter a name, description and upload an image that pertains to the group.
						</p>

						<table>
							<tr>
								<td>Name</td>
								<td>
									{{ Form::text('name', Input::old('name') ?: (Input::get('name') ?: ''), array('class' => $input_classes['name'])) }}
								</td>
							</tr>

							<tr>
								<td>Description</td>
								<td>
									{{ Form::textarea('description', Input::old('description'), array('class' => $input_classes['description'])) }}
								</td>
							</tr>

							<tr>
								<td>Profile Image</td>
								<td>
									{{ Form::ss_file('photo', array('class' => 'ss-picture-upload'), $input_classes['photo'] ?: 'blue') }}
									{{ Form::hidden('profile_x', '0') }}
									{{ Form::hidden('profile_y', '0') }}
									{{ Form::hidden('profile_w', '0') }}
									{{ Form::hidden('profile_h', '0') }}
									<div class="ss-picture-preview"></div>
								</td>
							</tr>
						</table>
					</div>

					<div class="ss-section">
						{{ Form::submit('CREATE GROUP', array('class' => 'ss-button blue bold')) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
