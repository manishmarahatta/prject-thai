<!-- Logo -->
<a href="{{ URL::route('dashboard') }}" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>C</b>MS</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>Cozy</b>Dream</span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
  	</a>
  	
  	<!-- Navbar Right Menu -->
  	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li>
				<a href="{{ URL::route('home') }}" target="_blank"><i class="fa fa-link"></i> Visit site</a>
			</li>
			<!-- User Account Menu -->
	 		<li class="dropdown user user-menu">
				<!-- Menu Toggle Button -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  			<!-- The user image in the navbar-->
					<img src="{{ URL::to(Session::get('userProfile')) }}" class="user-image" alt="User Image">
					<!-- hidden-xs hides the username on small devices so only the image appears. -->
		 			<span class="hidden-xs">{{ Session::get('userName') }}</span>
				</a>
				<ul class="dropdown-menu">
					<!-- The user image in the menu -->
					<li class="user-header">
						<img src="{{ URL::to(Session::get('userProfile'))  }}" class="img-circle" alt="User Image">
						<p>
						 	{{ Session::get('userName') }}
						 	<small>Member since {{ Session::get('userCreated') }}</small>
						</p>
		 			</li>
		 			
		 			<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="{{ URL::route('profile_mgmt') }}" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
			 				<a href="{{ URL::route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
						</div>
		 			</li>
				</ul>
	 		</li>
		</ul>
  	</div>
</nav>