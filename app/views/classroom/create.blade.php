<div class="content">
	<div class="layout">
		<div class="layout-main-ext page-cg-create">
			<div class="ss-container">
				{{ Form::open(array('route' => 'classroom.create')) }}
					<div class="ss-section">
						<h1>Create a classroom</h1>
						<p>
							Classrooms are a place where students can come together from all around the world and interact, socialize and collaborate about a specific class. Just enter the class name. Avoid names like Bio 121. For example, use Introduction to Biology.
						</p>

						<table>
							<tr>
								<td>Name</td>
								<td>
									{{ Form::text('name', '') }}
								</td>
							</tr>

							<tr>
								<td>Description</td>
								<td>
									{{ Form::textarea('description') }}
								</td>
							</tr>
						</table>
					</div>

					<div class="ss-section">
						{{ Form::submit('CREATE CLASSROOM', array('class' => 'ss-button blue bold')) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
