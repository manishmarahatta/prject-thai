@section('content')
<section class="content-header">
	<h1>Testimonials <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('testimonials_management') }}">Testimonials Management</a></li>
		<li class="active">Testimonials List</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit Testimonials</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('testimonials_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					@if(isset($testimonials))
						{{ Form::open(array('route'=>'save_testimonials', 'class'=>'form-horizontal', 'files'=>'true')) }}
					        		{{ Form::token() }}
					        		{{ Form::hidden('id',base64_encode($testimonials->id)) }}
							<div class="form-group">
								{{ Form::label('name', 'Full Name *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('name', $testimonials->name, array('class'=>'form-control', 'placeholder'=>'Enter full name', 'required'=>'required"')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('designation', 'Designation', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('designation', $testimonials->designation, array('class'=>'form-control', 'placeholder'=>'Enter full name')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image','Image', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::file('image', array('class'=>'form-control')) }}
									@if($testimonials->image)
									<a href="{{ URL::to($testimonials->image) }}" class="image-link" target="_blank">Current Image</a></small>
									@endif
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('message', 'Message *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('message',$testimonials->message,array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
								</div>
							</div>
							<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
					    {{ Form::close() }}
					 @endif
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		 </div>
		</div>
 </section>

@stop