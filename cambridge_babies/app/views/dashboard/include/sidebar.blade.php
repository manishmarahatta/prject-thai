<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
	<!-- Sidebar user panel (optional) -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="{{ URL::to(Session::get('userProfile')) }}" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p>{{ Session::get('userName') }}</p>
			<!-- Status -->
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>
	<!-- Sidebar Menu -->
	<ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<!-- Optionally, you can add icons to the links -->

		<li class="<?php if(Session::get('pageCat')=='sliderManagement'){ ?> active<?php } ?> treeview">
			<a href="{{ URL::route('slider_management') }}"><i class="fa fa-file-image-o"></i> <span>Slider Management</span> </a>
		</li>

		<li class="<?php if(Session::get('pageCat')=='pageManagement'){ ?> active<?php } ?> treeview">
			<a href="{{ URL::route('page_management') }}"><i class="fa fa-newspaper-o"></i> <span>Page Management</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li @if(Session::get('pageSubCat')=='pageManagement') class="active" @endif><a href="{{ URL::route('page_management') }}"><i class="fa fa-circle-o"></i> Pages</a></li>
				<li @if(Session::get('pageSubCat')=='subpageManagement') class="active" @endif><a href="{{ URL::route('subpage_management') }}"><i class="fa fa-circle-o"></i> Subpage</a></li>
			</ul>
		</li>

		<li <?php if(Session::get('pageCat')=='trekkingManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('trekking_management') }}">
				<i class="fa fa-map-o"></i> <span>Trekking/Activities</span> <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li @if(Session::get('pageSubCat')=='activitiesManagement') class="active" @endif>
					<a href="{{ URL::route('activities_type_management') }}"><i class="fa fa-circle-o"></i> Activities Type</a>
				</li>
				<li @if(Session::get('pageSubCat')=='trekkingManagement') class="active" @endif>
					<a href="{{ URL::route('trekking') }}"><i class="fa fa-circle-o"></i> Trekking Management</a>
				</li>
			</ul>
		</li>

		<li <?php if(Session::get('pageCat')=='blogManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('blog_management') }}"><i class="fa fa-file-word-o"></i> <span>Blog Management</span></a>
		</li>

		<li <?php if(Session::get('pageCat')=='newsupdateManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('newsupdate_management') }}"><i class="fa fa-file-word-o"></i> <span>News & updates Management</span></a>
		</li>

		<li @if(Session::get('pageCat')=='galleryManagement') class="active" @endif>
			<a href="{{ URL::route('gallery_management') }}"><i class="fa fa-file-o"></i> Gallery Management</a>
		</li>

		<li <?php if(Session::get('pageCat')=='staffProfileManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('staff_profile') }}"><i class="fa fa-users"></i> <span>Staff Management</span></a>
		</li>
		
		<li <?php if(Session::get('pageCat')=='testimonialsManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('testimonials_management') }}"><i class="fa fa-commenting-o"></i> <span>Testimonials Management</span></a>
		</li>

		<li <?php if(Session::get('pageCat')=='contactDetails'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('contactDetails') }}"><i class="fa fa-envelope"></i> <span>Contact Details</span></a>
		</li>

		<li <?php if(Session::get('pageCat')=='faqManagement'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('faq_management') }}"><i class="fa fa-question-circle"></i> <span>FAQ Management</span></a>
		</li>

		<li <?php if(Session::get('pageCat')=='profileMgmt'){ ?>class="active"<?php } ?>>
			<a href="{{ URL::route('profile_mgmt') }}"><i class="fa fa-user"></i> <span>My Profile</span></a>
		</li>
		
		<li>
			<a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a>
		</li>
  	</ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->