@section('content')
<div class="inner-page">
	<div class="page-title">
		<div class="container">
			<h1>Our Team
			<div class="social-share pull-right">
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_googleplus_hcount' displayText='Google +'></span>
			</div>
			</h1>
		</div>
	</div>
	<div class="inner-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="page-single">
						<div class="team-list">
							@if($ourTeams)
								@foreach($ourTeams as $row)
								<div class="panel panel-material">
									<div class="row">
										<div class="col-sm-3 col-lg-2">
											<img src="{{ URL::asset($row->image) }}">
										</div>
										<div class="col-sm-9 col-lg-10">
											<div class="team-content">
												<h3>{{ $row->name }}</h3>
												<small>{{ $row->designation }}</small>
												<div class="team-desc">
													{{ $row->description }}
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="sidebar-single">
						<ul>
							<?php $sn= 1;  ?>
							@if($rightNav)
								@foreach($rightNav as $row)
									<li><a href="company-profile.php"><i class="fa fa-angle-right"></i> {{ $row->title }}</a></li>
									@if($sn==1)
									<li class="active"><a href="{{ URL::route('our-team') }}"><i class="fa fa-angle-right"></i> Our Team</a></li>
									@endif
									<?php $sn++; ?>
								@endforeach
							@else
								<li class="active"><a href="{{ URL::route('our-team') }}"><i class="fa fa-angle-right"></i> Our Team</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.inner-page -->
@stop