<!doctype html>
<html lang="en">
	<head>
       	<title>Cambridge Babies</title>
		@include('website/include/head')
	</head>
<body class="noJS" id="top">
	@yield('header')
	
	<div class="main-wrapper home-pattern">
		@yield('content')
	</div>
	<!-- END OF MAIN WRAPPER -->
	@include('website/include/footer')
</body>
</html>
