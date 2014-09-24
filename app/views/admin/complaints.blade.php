<div class="innerAll">
	<h1 class="margin-none pull-left">Complaints &nbsp;<i class="fa fa-fw fa-clipboard text-muted"></i></h1>
	<div class="clearfix"></div>

	<!-- Table -->
	<table class="dynamicTable tableTools table table-striped">
		<!-- Table heading -->
		<thead>
			<tr>
				<th>Name</th>
				<th>E-mail</th>
				<th>Session</th>
				<th>Date</th>
				<th>Actions</th>
			</tr>
		</thead>
		<!-- // Table heading END -->
		
		<!-- Table body -->
		<tbody>
			@foreach ($complaints as $complaint)
				<!-- Table row -->
				<tr>
					<td>{{{ $complaint->name }}}</td>
					<td>{{{ $complaint->email }}}</td>
					<td>
						<a href="{{{ URL::route('tutoring_session.replay', $complaint->id) }}}" class="btn btn-block btn-info">View Session</a>
					</td>
					<td>{{{ $complaint->complaint_created_at->format('M d, Y \a\t H:i:s') }}}</td>
					<td class="center">
						<span data-ss-id="{{{ $complaint->id }}}" class="btn btn-block ss-c-approve btn-success">Refund Student</span>
						<span data-ss-id="{{{ $complaint->id }}}" class="btn btn-block ss-c-decline btn-danger">Release To Tutor</span>
					</td>
				</tr>
				<!-- // Table row END -->
			@endforeach
		</tbody>
		<!-- // Table body END -->
	</table>
	<!-- // Table END -->
</div>
