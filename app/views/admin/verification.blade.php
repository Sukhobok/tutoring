<script type="text/javascript">
$(document).ready(function() {
	// FancyBox
	$('.fancybox').fancybox({
		padding: 0,
		openEffect : 'elastic',
		openSpeed  : 150,
		closeEffect : 'elastic',
		closeSpeed  : 150,
		closeClick : true,
		helpers : {
			overlay : null
		}
	});
});
</script>

<div class="innerAll">
	<h1 class="margin-none pull-left">Verification Requests &nbsp;<i class="fa fa-fw fa-user text-muted"></i></h1>
	<div class="clearfix"></div>

	<!-- Table -->
	<table class="dynamicTable tableTools table table-striped">
		<!-- Table heading -->
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Birthday</th>
				<th>ID</th>
				<th>Req. W9</th>
				<th>Actions</th>
			</tr>
		</thead>
		<!-- // Table heading END -->
		
		<!-- Table body -->
		<tbody>
			@foreach ($verification_requests as $verification_request)
				<!-- Table row -->
				<tr>
					<td>{{{ $verification_request->name }}}</td>
					<td>{{{ $verification_request->email }}}</td>
					<td>{{{ ucfirst($verification_request->gender) }}}</td>
					<td>{{{ $verification_request->birthday['m'] != 0 ? HTML::format_date($verification_request->birthday) : '-' }}}</td>
					<td>
						<a class="fancybox" href="{{{ HTML::get_from_s3($verification_request->path) }}}">
							<img src="{{{ HTML::get_from_s3($verification_request->path) }}}" alt="photo" height="70" />
						</a>
					</td>
					<td class="center">
						<input type="checkbox" name="req_w9_{{{ $verification_request->id }}}">
					</td>
					<td class="center">
						<span data-ss-uid="{{{ $verification_request->id }}}" class="btn btn-block ss-vr-approve btn-success">Approve</span>
						<span data-ss-uid="{{{ $verification_request->id }}}" class="btn btn-block ss-vr-decline btn-danger">Decline</span>
					</td>
				</tr>
				<!-- // Table row END -->
			@endforeach
		</tbody>
		<!-- // Table body END -->
	</table>
	<!-- // Table END -->
</div>
