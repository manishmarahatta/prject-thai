@section('content')
<section class="content-header">
	<h1>Slider<small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('slider_management') }}">Slider Management</a></li>
		<li class="active">Sliders</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit Slider</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('slider_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
						{{ Form::open(array('route'=>'save_slider','files'=>true, 'class'=>'form-horizontal')) }}
					        		{{ Form::token() }}
					       		{{ Form::hidden('id',base64_encode($slider->id)) }}

						<!-- 	<div class="form-group">
								{{ Form::label('title', 'Title ', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('title', $slider->title, array('class'=>'form-control', 'placeholder'=>'Enter slider title')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('caption', 'Caption', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('caption',$slider->caption, array('class'=>'form-control','placeholder'=>'Enter slider caption')) }}
								</div>
							</div> -->

							<div class="form-group">
								{{ Form::label('Image','Image *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::file('image',array('class'=>'form-control')) }}
									<small><i>
									@if(strlen($slider->image)>0)
									<a href="{{ URL::to($slider->image) }}" target="_blank" class="image-link">Current Image</a>
									@endif</i>
									</small>
								</div>
							</div>
							<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
					    {{ Form::close() }}
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		 </div>
		</div>
 </section>
@stop