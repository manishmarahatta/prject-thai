<!DOCTYPE html>
<html>
  <head>
	@include('dashboard/include/head')
	<title>@if(Session::get('pageTitlte')) {{ Session::get('pageTitlte') }}  | @endif Dashboard</title>
  </head>
  <body class="skin-blue sidebar-mini fixed">
	<div class="wrapper">
	 	<!-- Main Header -->
	 	<header class="main-header">
	 		@include('dashboard/include/header')
	  	</header>

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			@include('dashboard/include/sidebar')
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div><!-- /.content-wrapper -->

		@include('dashboard/include/footer')
	</div><!-- ./wrapper -->
</body>
</html>