@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	  <h1>
		Profile 
		<small>Management</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profile Management</li>
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
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Update Profile</h3>
				</div><!-- /.box-header -->
				
				{{ Form::open(array('route'=>'update_profile','files'=>true,'method'=>'post', 'class'=>'form-horizontal')) }}
			        		{{ Form::token() }}
				       	{{ Form::hidden('id',base64_encode($profileInfo->id)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="username" name="username" required="required" placeholder="Username" value="{{ $profileInfo->username }}">
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="name" name="name"  required="required"  placeholder="Name" value="{{ $profileInfo->name }}">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control" id="email" name="email"  required="required"  placeholder="Email" value="{{ $profileInfo->email }}">
							</div>
						</div>
						<div class="form-group">
							<label for="inputProfile" class="col-sm-3 control-label">Profile Image</label>
							<div class="col-sm-9">
							 	<input type="file" class="form-control" name="image" id="image">
								<small>Image size [215x215] px 
								@if($profileInfo->profile)
								/ <a href="{{ URL::to($profileInfo->profile) }}" class="image-link" target="_blank">Current Image</a></small>
								@endif
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
					 	<button type="submit" class="btn btn-info pull-right">Update</button>
					</div><!-- /.box-footer -->
				{{ Form::close() }}
			</div><!-- /.box -->
		</div>
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Change Password</h3>
				</div><!-- /.box-header -->
				
					{{ Form::open(array('route'=>'update_password','method'=>'post', 'class'=>'form-horizontal')) }}
				        		{{ Form::token() }}
					       	{{ Form::hidden('id',base64_encode($profileInfo->id)) }}
						<div class="box-body">
							<div class="form-group">
								<label for="oldPassword" class="col-sm-3 control-label">Old Password *</label>
								<div class="col-sm-9">
								  <input type="password" class="form-control" name="oldPassword" id="inputPassOld" placeholder="Old Password" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="newPassword" class="col-sm-3 control-label">New Password *</label>
								<div class="col-sm-9">
								  	<input type="password" class="form-control" name="newPassword" id="passNew" placeholder="New Password" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="retypeNewPassword" class="col-sm-3 control-label">Retype New Password *</label>
								<div class="col-sm-9">
								  	<input type="password" class="form-control" name="retypeNewPassword" id="retypeNewPassword" placeholder="Retype Password" required="required">
								</div>
							</div>
						</div><!-- /.box-body -->
						<div class="box-footer">
						 	<button type="submit" class="btn btn-info pull-right">Update</button>
						</div><!-- /.box-footer -->
					{{ Form::close() }}
				</form>
			</div><!-- /.box -->
		</div>
	</div>
 </section>
 @stop