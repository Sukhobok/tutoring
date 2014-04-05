<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar')
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Groups</h1>

					<table>
						<tr>
							@foreach($groups as $i => $group)
								<td>
									<div class="settings-cg-avatar ss-link" data-ss-link="{{ URL::route('group.view', $group->id) }}">
										<div class="profile-picture">
											{{ HTML::image(HTML::get_from_s3($group->profile_picture), 'Group Picture', array('width' => 50)) }}
										</div>
									</div>

									<div class="settings-cg-content">
										<div class="group-color bold ss-link" data-ss-link="{{ URL::route('group.view', $group->id) }}">{{{ HTML::limit($group->name) }}}</div>
										<div>
											{{{ $group->count_members }}} members
										</div>
										<button class="ss-button blue bold small-button">LEAVE</button>
									</div>

									<div class="clear"></div>
								</td>

								@if($i % 2 == 1)
									</tr>

									@if(count($groups) != $i + 1)
										<tr>
									@endif
								@endif
							@endforeach

							@if(count($groups) % 2 == 1)
								<td>&nbsp;</td>
								</tr>
							@endif
					</table>

					<div style="text-align: center;"> 
						{{ Form::text('search', '', array(
							'placeholder' => 'Enter a group ...',
							'class' => 'ss-search group-autocomplete'
						)) }}
					</div>
				</div>

				<!-- <div class="ss-section">
					<h1>Suggested Groups</h1>
				</div> -->
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
