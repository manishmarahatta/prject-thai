@section('content')
<section class="content-header">
	<h1>Activities <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('activities_type_management') }}">Activities Management</a></li>
		<li class="active">Edit Activities </li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit Activities Type</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('activities_type_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
						{{ Form::open(array('route'=>'save_activities_type', 'class'=>'form-horizontal','files'=>'true')) }}
					        	{{ Form::token() }}
					        	{{ Form::hidden('id',base64_encode($result->id)) }}
							<div class="form-group">
								{{ Form::label('name', 'Title *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('name', $result->title, array('class'=>'form-control', 'placeholder'=>'Enter activities type', 'required'=>'required"')) }}
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