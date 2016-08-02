@section('contactFooter')
	<div class="col-md-3 col-sm-6">
		<h4 class="testimonial-header">Recent Health Tips</h4>
		<div>
			<div class="media">
				<div class="media-body">
					@if($healthTipsFooter)
						@foreach($healthTipsFooter as $row)
						<span class="media-heading">
							<a href="{{ URL::to('tips-view') }}/{{ $row->id }}"><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;{{ Str::limit($row->title,50) }}</a>
							<!-- <small class="muted">Posted {{ $row->date }}</small> -->
						</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>  
	</div><!--/.col-md-3-->

	<div class="col-md-4 col-sm-6">
		<h4 class="testimonial-header">Contact us</h4>
		<ul class="list-unstyled contact-list">
			 <li><i class="fa fa-map-marker"></i>&nbsp; {{ $contactFooter->location }}</li>
			 <li><i class="fa fa-phone"></i>&nbsp;{{ $contactFooter->phone }}</li>
			 <li><i class="fa fa-skype"></i>&nbsp;{{ $contactFooter->skype }}</li>
			 <li><i class="fa fa-envelope"></i>&nbsp;{{ $contactFooter->email }}</li>
		</ul>
	</div> <!--/.col-md-3-->
@stop