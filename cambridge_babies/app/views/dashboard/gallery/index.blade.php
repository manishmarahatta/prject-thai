@section('content')
<section class="content-header">
	<h1>Gallery <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('gallery_management') }}">Gallery Management</a></li>
		<li class="active">Images</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="row">
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">All Images</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="50px">id</th>
										<th>Image</th>
										<th width="100px">Action</th>
									</tr>
								</thead>
								<tbody>
									@if($images)
										<?php $sn = 1; ?>
										@foreach($images as $row)
										<tr>
											<td>{{ $sn }}</td>
											<td><img src="{{ URL::asset($row->image) }}" width="150px"></td>
											<td>
												{{ Form::open(array('url' => '/dashboard/activities_management/delete_gallery_image/','method'=>'post','style'=>'display:inline-block')) }}
													{{ Form::token() }}
													{{ Form::hidden('id',$row->id) }}
													<a href="#"><i class="fa fa-trash-o itemTrash"></i></a>
												{{ Form::close() }}
											</td>
										</tr>
										<?php $sn++ ?>
										@endforeach
									@endif
								</tbody>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box box-danger">
						<div class="box-header">
							<h3 class="box-title">Add New Images</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
								{{ Form::open(array('route'=>'save_album_images','files'=>true)) }}
									<div class="modal-body">
											{{ Form::token() }}
											<div class="form-group">
							                                	{{ Form::label('images', 'Images *', array('class'=>'col-sm-3 control-label')) }}
							                                	<div class="col-sm-9">
							                                		{{ Form::file('images[]', array('multiple'=>true,'form-control','required'=>'required')) }}
							                                	</div>
							                          </div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
									</div>
								{{ Form::close() }}
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
		 </div>
		</div>
 </section>

@stop