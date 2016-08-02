@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Contact <small>Details</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Contact Details</li>
	  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
		@include('dashboard/include/notification')

		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Update Contact Details</h3>
				</div><!-- /.box-header -->
				
				{{ Form::open(array('route'=>'update_contact','method'=>'post', 'class'=>'form-horizontal')) }}
		        		{{ Form::token() }}
			       	{{ Form::hidden('id',base64_encode($contact->id)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="address" name="address"  placeholder="Address" value="{{ $contact->location }}">
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone number" value="{{ $contact->phone }}">
							</div>
						</div>
						<div class="form-group">
							<label for="Email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="Email" name="email"  placeholder="Email" value="{{ $contact->email }}">
							</div>
						</div>
						<div class="form-group">
							<label for="gmap" class="col-sm-2 control-label">Google Map(Embed URL)</label>
							<div class="col-sm-10">
							  <input type="url" class="form-control" id="gmap" name="gmap"  placeholder="Embed URL" value="{{ $contact->gmap }}">
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
					 	<button type="submit" class="btn btn-info pull-right">Update</button>
					</div><!-- /.box-footer -->
				{{ Form::close() }}
			</div><!-- /.box -->
		</div>
	</div>
 </section>
@stop