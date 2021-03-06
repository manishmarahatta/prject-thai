@section('content')
<div class="big-slider-wrap">
	@if($slider)
		<ul class="big-slider">
			@foreach($slider as $row)
				<li><img src="{{ URL::asset($row->image) }}" alt=""></li>
		   @endforeach
		</ul>
	@endif

	<div class="trip-search">
		<div class="container">
			<form action="search-result.php">
				<div class="trip-entry-header clearfix">
					<h5>Trip Search</h5>
				</div>
				
				<div class="trip-box">
					<div class="row">
						<div class="col-sm-2">
							<select class="form-control">
								<option>By Destination</option>
								<option>Nepal</option>
								<option>India</option>
								<option>Tibet</option>
								<option>Bhutan</option>
							</select>
						</div>
						<div class="col-sm-2">
							<select class="form-control">
								<option>By Activity</option>
								<option>Bird Watching</option>
								<option>Pick Climbing</option>
								<option>Trekking</option>
								<option>Cultural Tour</option>
								<option>Rafting</option>
								<option>Safari</option>
								<option>Kayaking</option>
							</select>
						</div>
						<div class="col-sm-3">
							<select class="form-control">
								<option>By Duration</option>
								<option>1-5 Days</option>
								<option>6-10 Days</option>
								<option>11-15 Days</option>
								<option>16-25 Days</option>
								<option>26-30 Days</option>
							</select>
						</div>
						<div class="col-sm-3">
							<input class="form-control" type="text" placeholder="By Keywords">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-black"><i class="fa fa-aw fa-search"></i> Search</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END OF TRIP SEARCH -->
</div>
<!-- END OF BIG SLIDER -->
<div class="info-mark">
        <div class="container">
            <h2>Do you wish to plan your trip?</h2>
            <p>We have amazing trip planner.</p>
            <a class="btn btn-success btn-lg" href="#" data-original-title="" title="">Trip Planner</a>
        </div>
</div>
<div class="item-packages clearfix">
    <div class="container">
        <div class="block-header">
            <h3>Featured Packages</h3>
        </div>
        <div class="item-wrapper">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-material clearfix">
                        <div class="items-images pull-left">
                            <img src="{{ URL::asset('assets/website/images/feature1.png') }}" alt="">
                        </div>
                        <div class="pull-right items-content">
                            <h5>Makalu Base Camp</h5>
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
                <div class="col-sm-6">
                    <div class="panel panel-material clearfix">
                        <div class="items-images pull-left">
                            <img src="{{ URL::asset('assets/website/images/feature1.png') }}" alt="">
                        </div>
                        <div class="pull-right items-content">
                            <h5>Upper Mustang</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <div class="item-info">
                                <ul class="list-inline">
                                    <li><strong>Duration:</strong> 23 Days</li>
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
                <div class="col-sm-6">
                    <div class="panel panel-material clearfix">
                        <div class="items-images pull-left">
                            <img src="{{ URL::asset('assets/website/images/feature1.png') }}" alt="">
                        </div>
                        <div class="pull-right items-content">
                            <h5>Chulu East Expedition</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <div class="item-info">
                                <ul class="list-inline">
                                    <li><strong>Duration:</strong> 20 Days</li>
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
                <div class="col-sm-6">
                    <div class="panel panel-material clearfix">
                        <div class="items-images pull-left">
                            <img src="{{ URL::asset('assets/website/images/feature1.png') }}" alt="">
                        </div>
                        <div class="pull-right items-content">
                            <h5>Dhaulagiri Circuit Trek</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <div class="item-info">
                                <ul class="list-inline">
                                    <li><strong>Duration:</strong> 12 Days</li>
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
            </div>
        </div>
    </div>
</div>
    <div class="booking-reason clearfix">
        <div class="container">
            <div class="reason-head text-center">
                <h2>Why should you book with us?</h2>
                <p>Here are 5 reasons why you should book with us.</p>
            </div>
            <div class="tab-wrapper">
                <!-- tabs left -->
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <li><a href="#a" data-toggle="tab">100% Price Beat Guarantee <span class="triangle"></span></a></li>
                        <li class="active"><a href="#b" data-toggle="tab">Personal service and Tour Consultant <span class="triangle"></span></a>
                    </li>
                    <li><a href="#c" data-toggle="tab">Unique Iteneraries <span class="triangle"></span></a></li>
                    <li><a href="#d" data-toggle="tab">Holiday Packages & Destinations <span class="triangle"></span></a></li>
                    <li><a href="#e" data-toggle="tab">Amazing Trip Planner <span class="triangle"></span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="a">
                        <h4>100% Price Beat Guarantee</h4>
                        <p>
                            Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate.
                        </p>
                    </div>
                    <div class="tab-pane active" id="b">
                        <h4>Personal service and Tour Consultant</h4>
                        <p>
                            Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </p>
                        <p>
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
                        </p>
                        <div class="tab-img-wrap">
                            <img src="{{ URL::asset('assets/website/images/girl.png') }}" alt="" width="569px" height="127px;">
                        </div>
                    </div>
                    <div class="tab-pane" id="c">
                        <h4>Unique Iteneraries</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullam.
                        </p>
                    </div>
                    <div class="tab-pane" id="d">
                        <h4>Holiday Packages & Destinations</h4>
                        <p>
                            Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae.
                        </p>
                    </div>
                    <div class="tab-pane" id="e">
                        <h4>Amazing Trip Planner</h4>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /tabs -->
        </div>
    </div>
</div>
<!-- end of booking reason -->
<div class="testimonial-wrapper">
    <div class="container">
        <div class="block-header">
            <h3>Testimonials</h3>
        </div>
        	<ul class="testimonial-slider">
	            @if($testimonials)
	            		@foreach($testimonials as $row)
		            <li>
		                <div class="profil-img">
		                    <img src="{{ URL::asset($row->image) }}" alt="">
		                </div>
		                <div class="testimonial-content">
		                   {{ $row->message }}
		                    <div class="profile-detail">
		                        <span class="quote-icon"><i class="fa fa-aw fa-quote-left"></i></span>
		                        <div class="profile-content">
		                            <span><strong>{{ $row->name }}</strong></span>
		                            <span>{{ $row->designation }}</span>
		                        </div>
		                    </div>
		                </div>
		            </li>
		            @endforeach
		       @endif
        	</ul>
    </div>
</div>
<!-- END OF TESTIMMONIAL SLIDER -->
@stop