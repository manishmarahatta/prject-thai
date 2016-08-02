@section("header")
<header>
	<div class="header">
		<div class="top-nav-bar">
			<div class="container">
				<div class="left-top-nav">
					<ul>
						<li>
							<p>Quick Contact: <span>{{ $contactDtl->phone }}</span></p>
						</li>
					</ul>
				</div>
				<div class="right-top-nav">
					<ul class="pull-right">
						<li>
							<a href="{{ URL::route('faq') }}"><i class="fa fa-fw fa-question-circle"></i> FAQs</a>
						</li>
						<li>
							<a href="{{ URL::route('gallery') }}"><i class="fa fa-fw fa-picture-o"></i> Gallery</a>
						</li>
						<li>
							<a href="{{ URL::route('news') }}"><i class="fa fa-fw fa-globe"></i> News & Updates</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container header-main">
			<div class="header-middle clearfix">
				<div class="brand-identity">
					<a href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/website/images/logo.png') }}" alt="Cozy Dream"></a>
				</div>
				<div class="header-right-content">
					<ul class="pull-right">
						<li class="dropdown">
							<div class="online-book">
								<a class="btn btn-success btn-lg" href="book-trip.php"><i class="fa fa-aw fa-desktop"></i>
								Book Online </a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="sticky_navigation_wrapper" class="main-menu clearfix">
			<div id="sticky_navigation" class="nav">
				<div class="container">
					<div class="logo-small">
						<a href="index.php"><img src="{{ URL::asset('assets/website/images/logo.png') }}"></a>
					</div>
					<ul id="nav" class="nav-menu nav-list menuNav">
						<li><a @if(Session::get('page')=='home')class="current-nav"@endif href="{{ URL::route('home') }}"><i class="fa fa-aw fa-home"></i></a></li>
						
						@if($pagesNav)
							<?php $sn = 1; ?>
							@foreach($pagesNav as $row)
							<li class="dropdown">
								<a @if(Session::get('page')==$row->title)class="current-nav"@endif href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $row->title }} <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									<?php $subSn = 1; ?>
									@foreach($row->Subpages as $subRow)
									<li><a href="{{ URL::to('page/view/'.$subRow->id.'/'.$subRow->title) }}">{{ $subRow->title }}</a></li>
										@if($sn==1 && $subSn==1)
										<li><a href="{{ URL::route('our-team') }}">Our Team</a></li>
										@endif
										<?php $subSn++; ?>
									@endforeach
								</ul>
							</li>
							@if($sn==2)
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									@if($activitiesNav)
										@foreach($activitiesNav as $row)
										<li><a href="{{ URL::to('activities/'.$row->id.'/'.strtolower(preg_replace('/-+/', '-', preg_replace('/[^\wáéíóú]/', '-',$row->title)))) }}">{{ $row->title }}</a></li>
										@endforeach
									@endif
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Trekking <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
								@if($trakkingNav)
									@foreach($trakkingNav as $row)
									<li><a href="{{ URL::to('trekking/'.$row->id.'/'.strtolower(preg_replace('/-+/', '-', preg_replace('/[^\wáéíóú]/', '-',$row->title)))) }}">{{ $row->title }}</a></li>
									@endforeach
								@endif
								</ul>
							</li>
							@endif
							<?php $sn++ ?>
							@endforeach
						@endif
					
						<li><a @if(Session::get('page')=='blog')class="current-nav" @endif href="{{ URL::route('blog') }}">Blog</a></li>
						<li><a href="{{ URL::route('contact') }}">Contact us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- END OF HEADER -->
@stop