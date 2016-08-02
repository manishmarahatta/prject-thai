@section('content')
<section class="content-header">
	<h1>Staff<small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('staff_profile') }}">Staff Management</a></li>
		<li class="active">New Staff</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">New Staff</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('staff_profile') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
						{{ Form::open(array('route'=>'save_staff','files'=>true, 'class'=>'form-horizontal')) }}
					        		{{ Form::token() }}
							<div class="form-group">
								{{ Form::label('name', 'Full Name *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Enter full name', 'required'=>'required"')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('designation', 'Designation *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('designation','', array('class'=>'form-control','placeholder'=>'Enter designation')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image','Profile Image', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::file('image',array('required'=>'required','class'=>'form-control')) }}
									<small>Image size [109*109] px</small>
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('description', 'Description *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('description','',array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
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