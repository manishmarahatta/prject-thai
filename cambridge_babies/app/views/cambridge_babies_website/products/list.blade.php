@section('content')
<div class="inner-page">
	<div class="page-title">
		<div class="container">
			<h1>{{ $result->title }}
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
			<div class="item-wrapper">
				<div class="row">
					@if($result)
						@foreach($result->trekking as $row)
						<div class="col-sm-6">
							<div class="panel panel-material clearfix">
								<div class="items-images pull-left">
									<img src="images/feature1.png" alt="">
								</div>
								<div class="pull-right items-content">
									<h5>{{ $row->title }}</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua.
									</p>
									<div class="item-info">
										<ul class="list-inline">
											<li><strong>Duration:</strong> 2 Days</li>
											<li><strong>Activities:</strong> Trekking</li>
											<li><strong>Destination:</strong> Nepal</li>
										</ul>
									</div>
									<div class="btn-group ">
										<a class="btn btn-warning btn-sm" href="book-trip.php">Book this Trip</a>
										<a class="btn btn-warning btn-sm" href="trip-detail.php">Trip Details</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.inner-page -->
@stop