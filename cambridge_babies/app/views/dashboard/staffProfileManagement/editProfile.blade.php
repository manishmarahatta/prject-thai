@section('content')
<section class="content-header">
	<h1>Staff<small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('staff_profile') }}">Staff Management</a></li>
		<li class="active">Staff List</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				@if(isset($profile))
					<div class="box-header">
						<h3 class="box-title">Edit Staff | {{ $profile->name }}</h3>
						<div class="pull-right">
							<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('staff_profile') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						{{ Form::open(array('route'=>'save_staff','files'=>true, 'class'=>'form-horizontal')) }}
					        		{{ Form::token() }}
					       		{{ Form::hidden('id',base64_encode($profile->id)) }}
							<div class="form-group">
								{{ Form::label('name', 'Full Name *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('name', $profile->name, array('class'=>'form-control', 'placeholder'=>'Enter full name', 'required'=>'required"')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('designation', 'Designation *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('designation',$profile->designation, array('class'=>'form-control','placeholder'=>'Enter designation')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image','Profile Image', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::file('image',array('class'=>'form-control')) }}
									<small>Image size 200*320] px 
									@if($profile->image)
									/ <a href="{{ URL::to($profile->image) }}" class="image-link" target="_blank">Current Image</a></small>
									@endif
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('description', 'Description *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('description',$profile->description,array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
								</div>
							</div>

							<div class="box-footer">
								<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
							</div>
					   	 {{ Form::close() }}
					</div><!-- /.box-body -->
				@endif
			</div><!-- /.box -->
		 </div>
	</div>
 </section>
@stop