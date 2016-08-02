@section('content')
<div class="inner-page">
	<div class="page-title">
		<div class="container">
			<h1>News & Updates
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
				<div class="col-sm-8">
					<ul class="news-excerp-list">
							@if($articles)
								@foreach($articles as $row)
								<li>
										<h3><a href="{{ URL::to('news/view/'.$row->id.'/'.preg_replace('/[\s_]/', '-', strtolower($row->title))) }}">{{ $row->title }}</a></h3>
										<p>{{ Str::limit($row->description, 380) }}</p>
										<div class="news-bottom clearfix">
												<div class="author-name">
														<a href="#"><i class="fa fa-aw fa-user"></i> Admin</a>
												</div>
												<div class="date-list">
														<label><i class="fa fa-aw fa-calendar"></i> {{ date('F d, Y', $row->date) }}</label>
												</div>
												<div class="read-btn">
														<a class="btn-default-th" href="{{ URL::to('news/view/'.$row->id.'/'.preg_replace('/[\s_]/', '-', strtolower($row->title))) }}">read more <i class="fa fa-angle-double-right"></i></a>
												</div>
										</div>
								</li>
								@endforeach
						 @endif
					</ul>


												<ul class="pagination pagination-sm">
												 	<li class=""><a href="{{ URL::route('news') }}"><i class="fa fa-angle-double-left"></i></a></li>
													@if($totalRecord)
														<?php for($i = 1; $i<=$totalRecord; $i++){ ?>
														<li @if($i==$pageId)class="active"@endif><a href="{{ URL::to('news/page/'.$i) }}">{{ $i }}</a></li>
														<?php } ?>
													@endif
													<li><a href="{{ URL::to('news/page/'.$totalRecord) }}"><i class="fa fa-angle-double-right"></i></a></li>
												</ul>
										</div>
										<div class="col-sm-4">
												<div class="sidebar">
														<div class="widget-box recent-post">
																<h4>Recent Posts</h4>
																<ul>
																	@if($recentArticles)
																		@foreach($recentArticles as $row)
																			<li><a href="{{ URL::to('news/view/'.$row->id.'/'.preg_replace('/[\s_]/', '-', strtolower($row->title))) }}">{{ $row->title }}</a></li>
																		@endforeach
																	@endif
																</ul>
														</div>
														<div class="widget-box blog-archive">
																<h4>Archives</h4>
																<ul>
																	@if($archive)
																	  @foreach($archive as $row)
																		  <li><a href="{{ URL::to('news/archive/'.$row->archives) }}">{{ date('F, Y', $row->archives) }}</a></li>
																		  @endforeach
																   @endif
																</ul>
														</div>
												</div>
										</div>
								</div>
					 
				</div>
		</div>
</div>
<!-- /.inner-page -->
@stop