<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"><!-- <![endif]-->
<head>
	<title>StudySquare - Admin</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	
	<!--[if lt IE 9]><link rel="stylesheet" href="/themes/flat_kit/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
	<link rel="stylesheet" href="/themes/flat_kit/css/ss_style.min.css" />
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<script src="/themes/flat_kit/components/library/jquery/jquery.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/library/jquery/jquery-migrate.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/library/modernizr/modernizr.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/less-js/less.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/library/jquery-ui/js/jquery-ui.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v2.3.0"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/themes/flat_kit/_fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/themes/flat_kit/_fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>

<body class="document-body ">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid fluid">
		
		<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">
			
			<!-- Content -->
			<div id="content">
				
				<!-- Top navbar -->
				<div class="navbar main hidden-print">
					<!-- Menu Toggle Button -->
					<button type="button" class="btn btn-navbar pull-left visible-xs">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<!-- // Menu Toggle Button END -->
					
					<!-- Full Top Style -->
					<ul class="topnav pull-left">
						<li class="">
							<a href="{{ URL::route('dashboard') }}" class="glyphicons home"><i></i>Go to StudySquare</a>
						</li>
						<li class="{{ $page == 'dashboard' ? 'active' : '' }}">
							<a href="{{ URL::route('admin.dashboard') }}" class="glyphicons dashboard"><i></i>Dashboard</a>
						</li>
						<li class="{{ $page == 'verification' ? 'active' : '' }}">
							<a href="{{ URL::route('admin.verification') }}" class="glyphicons user"><i></i>Verification Requests</a>
						</li>
						<li class="{{ $page == 'withdrawal' ? 'active' : '' }}">
							<a href="/" class="glyphicons money"><i></i>Withdrawal Center</a>
						</li>
						<li class="{{ $page == 'statistics' ? 'active' : '' }}">
							<a href="/" class="glyphicons stats"><i></i>Platform Statistics</a>
						</li>
						<li class="{{ $page == 'wallet' ? 'active' : '' }}">
							<a href="/" class="glyphicons wallet"><i></i>Wallet</a>
						</li>
						<li class="{{ $page == 'complaints' ? 'active' : '' }}">
							<a href="/" class="glyphicons notes_2"><i></i>Complaints</a>
						</li>
					</ul>
					<div class="clearfix"></div>
					
				</div>
				<!-- Top navbar END -->
				
				{{ $content }}
			</div>
			<!-- // Content END -->
			
		</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; {{ date('Y') }} StudySquare - All Rights Reserved</div>
			<!--  End Copyright Line -->
			
		</div>
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '/themes/flat_kit/',
		rootPath = '../',
		DEV = false,
		componentsPath = '/themes/flat_kit/components/';
	
	var primaryColor = '#e5412d',
		dangerColor = '#b55151',
		infoColor = '#5cc7dd',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;
	</script>
	
	<script src="/themes/flat_kit/components/library/bootstrap/js/bootstrap.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/breakpoints/breakpoints.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v2.3.0"></script>
	{{-- <script src="/themes/flat_kit/components/modules/admin/charts/flot/assets/custom/js/flotchart-simple.init.js?v=v2.3.0"></script> --}}
	<script src="/themes/flat_kit/components/modules/admin/gallery/blueimp-gallery/assets/lib/js/blueimp-gallery.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/gallery/blueimp-gallery/assets/lib/js/jquery.blueimp-gallery.min.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/employees/assets/js/employees.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/forms/elements/select2/assets/lib/js/select2.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/forms/elements/select2/assets/custom/js/select2.init.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/holder/holder.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/widgets/widget-chat/assets/js/widget-chat.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/slimscroll/jquery.slimscroll.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v2.3.0"></script>
	{{-- <script src="/themes/flat_kit/components/modules/admin/twitter/assets/js/twitter.js?v=v2.3.0"></script> --}}
	<script src="/themes/flat_kit/components/plugins/jquery.event.move/js/jquery.event.move.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/plugins/jquery.event.swipe/js/jquery.event.swipe.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/core/js/megamenu.js?v=v2.3.0"></script>
	<script src="/themes/flat_kit/components/core/js/core.init.js?v=v2.3.0"></script>

	<script src="/themes/flat_kit/ss_script.js"></script>
</body>
</html>