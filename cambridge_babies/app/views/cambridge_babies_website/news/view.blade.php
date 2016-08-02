@section('content')
<div class="inner-page">
		<div class="page-title">
				<div class="container">
						<h1>{{ $article->title }}
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
												<div class="content-box">
														<div class="news-bottom clearfix">
																<div class="author-name">
																		<a href="#"><i class="fa fa-aw fa-user"></i> Admin</a>
																</div>
																<div class="date-list">
																		<label><i class="fa fa-aw fa-calendar"></i>  {{ date('F d, Y',$article->date) }}</label>
																</div>
														</div>
													{{ $article->description }}
												</div>

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