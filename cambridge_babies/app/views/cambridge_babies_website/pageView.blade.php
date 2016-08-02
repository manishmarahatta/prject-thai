@section('content')
<div class="inner-page">
	<div class="page-title">
		<div class="container">
			<h1>{{ $pageDetails->title }}
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
						{{ $pageDetails->description }}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="sidebar-single">
						<ul>
							<?php $subSn = 1; ?>
							@if($subPages)
								@foreach($subPages as $row)
									<li @if($pageId==$row->id)class="active"@endif><a href="our-team.php"><i class="fa fa-angle-right"></i> {{ $row->title }}</a></li>
									@if($row->pageId==3)
										@if($subSn==1)
										<li><a href="{{ URL::route('our-team') }}"><i class="fa fa-angle-right"></i> Our Team</a></li>
										@endif
									@endif
									<?php $subSn++; ?>
								@endforeach
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