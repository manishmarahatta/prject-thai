<noscript>
	<div class="alert alert-danger no-js"><strong>Oh Snap! It seems that Javascript is disabled on your browser. Please enable it for a better browsing experience.</strong></div>
</noscript>
<!--end of no script-->
<div id="outdated">
	<h6>Your browser is out-of-date!</h6>
	<p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
	<p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
</div>
 
<!-- section header start -->

<nav class="navbar-default navbar-fixed-top" role="navigation">
<div class="container">
			 <!-- <div class="logo">
				<a href="{{ URL::route('home') }}">
					<img src="{{ URL::asset('assets/website/img/logo.png') }}" class="logo-img" alt="Share center Logo">
				</a>
			 </div> -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" 
					 data-target="#example-navbar-collapse">
					 <span class="sr-only">Toggle navigation</span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand white" href="#">
                       		 <img src="{{ URL::asset('assets/website/img/logo.png')  }}">
                       	</a>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav navbar-nav pull-right menu">
					<li @if(Session::get('page')=='home')class="active"@endif><a href="{{ URL::route('home') }}">Home</a></li>
					<li @if(Session::get('page')=='about')class="active"@endif><a href="{{ URL::to('about-us') }}">Aboutus</a></li>
					<li @if(Session::get('page')=='services')class="active"@endif><a href="{{ URL::to('services') }}">Services</a></li>
					<li @if(Session::get('page')=='product')class="active"@endif><a href="{{ URL::to('product') }}">Products</a></li>
					<li @if(Session::get('page')=='doctor')class="active"@endif><a href="{{ URL::to('doctor') }}">Doctors</a></li>
					<li @if(Session::get('page')=='contact')class="active"@endif><a href="{{ URL::to('contact') }}">Contactus</a></li>
				 </ul>
			</div>
		</div>
		</nav>
<!-- <section class="header">
	<div class="nav ">
		<div class="container">
		<nav class="navbar-default navbar-fixed-top" role="navigation">
			 <!-- <div class="logo">
				<a href="{{ URL::route('home') }}">
					<img src="{{ URL::asset('assets/website/img/logo.png') }}" class="logo-img" alt="Share center Logo">
				</a>
			 </div> -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" 
					 data-target="#example-navbar-collapse">
					 <span class="sr-only">Toggle navigation</span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav navbar-nav pull-right menu">
					<li @if(Session::get('page')=='home')class="active"@endif><a href="{{ URL::route('home') }}">Home</a></li>
					<li @if(Session::get('page')=='about')class="active"@endif><a href="{{ URL::to('about-us') }}">Aboutus</a></li>
					<li @if(Session::get('page')=='services')class="active"@endif><a href="{{ URL::to('services') }}">Services</a></li>
					<li @if(Session::get('page')=='product')class="active"@endif><a href="{{ URL::to('product') }}">Products</a></li>
					<li @if(Session::get('page')=='doctor')class="active"@endif><a href="{{ URL::to('doctor') }}">Doctors</a></li>
					<li @if(Session::get('page')=='contact')class="active"@endif><a href="{{ URL::to('contact') }}">Contactus</a></li>
				 </ul>
			</div>
		</nav>
		</div>
	</div>
</section> -->
<!-- section header end -->
