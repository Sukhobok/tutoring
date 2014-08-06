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
	<h1 class="margin-none pull-left">Statistics &amp; Goals &nbsp;<i class="fa fa-fw fa-dashboard text-muted"></i></h1>
	<div class="clearfix"></div>
</div>
<!-- Stats Widgets -->
<div class="row row-merge margin-none border-none">
	<div class="col-md-3 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-default widget-stats-4">
				<span class="txt">Tutoring Sessions</span>
				<span class="count">{{ $tutoring_sessions }}</span>
				<span class="glyphicons imac"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
	<div class="col-md-3 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-primary widget-stats-4">
				<span class="txt">Progress until 1K users</span>
				<span class="count">{{ $goal_users }}%</span>
				<span class="glyphicons cup"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
	<div class="col-md-3 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-default widget-stats-4">
				<span class="txt">Classrooms</span>
				<span class="count">{{ $classrooms }}</span>
				<span class="glyphicons lightbulb"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
	<div class="col-md-3 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-inverse widget-stats-4">
				<span class="txt">Groups</span>
				<span class="count">{{ $groups }}</span>
				<span class="glyphicons group"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
</div>
<div class="row row-merge margin-none border-none">
	<div class="col-md-4 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-info widget-stats-4">
				<span class="txt">StudySquare Wallet</span>
				<span class="count">${{ $ss_wallet }}</span>
				<span class="glyphicons money"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
	<div class="col-md-4 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-gray widget-stats-4">
				<span class="txt">&nbsp;</span>
				<span class="count">{{ $users }}<span>Users</span></span>
				<span class="glyphicons user"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
	<div class="col-md-4 innerAll">
		<div class=" padding-bottom-none-phone">
			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-inverse widget-stats-4">
				<span class="txt">&nbsp;</span>
				<span class="count">{{ $tutors }}<span>Teachers</span></span>
				<span class="glyphicons user"><i></i></span>
				<div class="clearfix"></div>
				<i class="icon-play-circle"></i>
			</a>
			<!-- // Stats Widget END -->
		</div>
	</div>
</div>
<!-- // Stats Widgets END -->
<div class="separator bottom"></div>
<div class="innerLR innerB">
	<div class="row">
		<div class="col-md-6 tablet-column-reset">
			<h1 class="margin-none pull-left">Verification Requests &nbsp;<i class="fa fa-fw fa-user text-muted"></i></h1>

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

		<div class="col-md-6 tablet-column-reset">
			<h1 class="margin-none pull-left">Withdrawal Requests &nbsp;<i class="fa fa-fw fa-money text-muted"></i></h1>
		</div>
	</div>
</div>