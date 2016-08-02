@section('content')
<div class="inner-page">
	<div class="page-title">
		<div class="container">
			<h1>Photo Gallery
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
			<div id="grid-photos">
				@if($images)
					@foreach($images as $row)
					<div class="panel-pinto panel panel-default">
						<a href="{{ URL::asset($row->image) }}" class="fancybox-thumbs" data-fancybox-group="thumb">
							<div class="thumbnail">
								<img src="{{ URL::asset($row->image) }}">
							</div>
						</a>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
<!-- /.inner-page -->
@stop