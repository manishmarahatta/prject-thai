@section('content')
<section class="content-header">
	<h1>Gallery <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('gallery_management') }}">Gallery Management</a></li>
		<li class="active">Albums</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	@include('dashboard/include/notification')
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit Albums</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					{{ Form::open(array('route'=>'save_gallery','files'=>true)) }}
					    	{{ Form::token() }}
					  	{{ Form::hidden('id',base64_encode($album->id)) }}

						<div class="form-group">
							{{ Form::label('title', 'Title *') }}
							{{ Form::text('title', $album->title, array('class'=>'form-control', 'placeholder'=>'Enter album title', 'required'=>'required"')) }}
						</div>


						<div class="form-group">
							{{ Form::label('date', 'Date *') }}
							<input type="date" class="form-control" required="required" value="{{ $album->date }}" name="date" placeholder="mm-dd-yyyy">
						</div>

						<div class="form-group">
							{{ Form::label('images','Cover Image *') }}
							@if(!empty($album->cover_image))
								/(<i><a href="{{ URL::to($album->cover_image) }}" target="_blank" class="image-link">Current Image</a></i>)
							@endif
							{{ Form::file('images',array('class'=>'form-control')) }}
						</div>

					   
					    <div class="box-footer">
					      		<button class=" btn btn-danger btnLocation" style="height:35px"  data-href="{{ URL::route('gallery_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					        <button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
					    </div>
					{{ Form::close() }}
				</div><!-- /.box -->
			</div>
		</div>
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header">
					<div class="row">
						<div class="col-md-9"><h3 class="box-title">Album Images</h3></div>
						<div class="col-md-3">
							 <div class="rightControll">
					                               	<button class="btn btn-success" data-toggle="modal" data-target="#newImages"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;New Images</button>
					                          </div>
					              </div>
					</div>
				</div><!-- /.box-header -->
				
				<div class="box-body">
					<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50px">S.No</th>
								<th>Image</th>
								<th width="50px">Actions</th>
							</tr>
						</thead> 
						<tbody>
						@if(isset($albumImages))
							<?php $i=1; ?>
							@foreach($albumImages as $row)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ HTML::Image($row->image,'', array('width'=>'50px')) }}</td>
									<td>
										{{ Form::open(array('url' => '/dashboard/activities_management/delete_gallery_image/','method'=>'post','style'=>'display:inline-block')) }}
											{{ Form::token() }}
											{{ Form::hidden('id',$row->id) }}
											{{ Form::hidden('albumId',$row->album_id) }}
											<a href="#"><i class="fa fa-trash-o itemTrash"></i></a>
										{{ Form::close() }}
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div><!-- /.box-body-->
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="newImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Album Images</h4>
			</div>
			{{ Form::open(array('route'=>'save_album_images','files'=>true)) }}
				<div class="modal-body">
						{{ Form::token() }}
						{{ Form::hidden('id', $album->id) }}
						<div class="form-group">
		                                	{{ Form::label('images', 'Images *', array('class'=>'col-sm-2 control-label')) }}
		                                	<div class="col-sm-10">
		                                		{{ Form::file('images[]', array('multiple'=>true,'form-control','required'=>'required')) }}
		                                	</div>
		                          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop