<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Classrooms Management'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Study Rooms</h1>

					<table>
						<tr>
							@foreach($classrooms as $i => $classroom)
								<td>
									<div class="settings-cg-avatar" style="height: 50px;"></div>

									<div class="settings-cg-content">
										<div class="classroom-color bold ss-link" data-ss-link="{{ URL::route('classroom.view', $classroom->id) }}">{{{ HTML::limit($classroom->name) }}}</div>
										<div>
											{{{ $classroom->count_members }}} members
										</div>
										<button class="ss-button blue bold small-button cg-leave-button" data-cg-id="{{{ $classroom->id }}}" data-cg-type="classroom">LEAVE</button>
									</div>

									<div class="clear"></div>
								</td>

								@if($i % 2 == 1)
									</tr>

									@if(count($classrooms) != $i + 1)
										<tr>
									@endif
								@endif
							@endforeach

							@if(count($classrooms) % 2 == 1)
								<td>&nbsp;</td>
								</tr>
							@endif
					</table>

					<div style="text-align: center;"> 
						{{ Form::text('search', '', array(
							'placeholder' => 'Enter a study room ...',
							'class' => 'ss-search classroom-autocomplete'
						)) }}
					</div>
				</div>

				@if($suggested)
					<div class="ss-section">
						<h1>Suggested Study Rooms</h1>

						<table>
							<tr>
								@foreach($suggested as $i => $classroom)
									<td>
										<div class="settings-cg-avatar" style="height: 50px;"></div>

										<div class="settings-cg-content">
											<div class="classroom-color bold ss-link" data-ss-link="{{ URL::route('classroom.view', $classroom->id) }}">{{{ HTML::limit($classroom->name) }}}</div>
											<div>
												{{{ $classroom->count_members }}} members
											</div>
											<button class="ss-button blue bold small-button cg-join-button" data-cg-id="{{{ $classroom->id }}}" data-cg-type="classroom">JOIN</button>
										</div>

										<div class="clear"></div>
									</td>

									@if($i % 2 == 1)
										</tr>

										@if(count($suggested) != $i + 1)
											<tr>
										@endif
									@endif
								@endforeach

								@if(count($suggested) % 2 == 1)
									<td>&nbsp;</td>
									</tr>
								@endif
						</table>
					</div>
				@endif
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
