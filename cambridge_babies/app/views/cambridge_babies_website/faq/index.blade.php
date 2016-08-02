@section('content')
<div class="inner-page">
    <div class="page-title">
        <div class="container">
            <h1>FAQ's
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
            <div class="faq-wrap">
                <div class="panel-group" id="faq-box">
                    	@if($faq)
                    		<?php $sn = 1; ?>
                    		@foreach($faq as $row)
		                    <div class="panel panel-material panel-rect">
		                        <div class="panel-heading">
		                            <h4 class="panel-title">
		                            <a class="accordion-toggle @if($sn!=1) collapsed @endif" data-toggle="collapse" data-parent="#faq-box" href="#collapse{{  $row->id }}">{{ $sn }}. 
		                            	{{ $row->question }}
		                            </a>
		                            </h4>
		                        </div>
		                        <div id="collapse{{  $row->id }}" class="panel-collapse collapse @if($sn==1) in @endif">
		                            <div class="panel-body">
		                                {{ $row->ans }}
		                            </div>
		                        </div>
		                    </div>
		                    <?php $sn++ ?>
		                    @endforeach
		             @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.inner-page -->
@stop