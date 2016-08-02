@section('content')
<section class="content-header">
	<h1>Trekking <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('activities_type_management') }}">Trekking Management</a></li>
		<li class="active">Edit Trekking </li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-8">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit Trekking</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('trekking') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					{{ Form::open(array('route'=>'save_trekking', 'class'=>'form-horizontal','files'=>'true')) }}
				        	{{ Form::token() }}
				        	{{ Form::hidden('id',base64_encode($result->id)) }}
		        	        	<div class="form-group">
		        				{{ Form::label('activitiesId', 'Activity Type *', array('class'=>'col-sm-2 control-label')) }}
		        				<div class="col-sm-10">
		        					<select class="form-control" name="activitiesId" required="required">
		        						@if($activities)
		        							@foreach($activities as $row)
		        							<option value="{{ $row->id }}" @if($result->activities_type==$row->id) selected="selected" @endif >{{ $row->title }}</option>
		        							@endforeach
		        						@endif
		        					</select>
		        				</div>
		        			</div>
						<div class="form-group">
							{{ Form::label('title', 'Title *', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('title', $result->title, array('class'=>'form-control','required'=>'required')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('duration', 'Duration', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('duration', $result->duration, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('destination', 'Destination', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('destination', $result->destination, array('class'=>'form-control')) }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('favourable_seasons', 'Favourable Seasons', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('favourable_seasons', $result->favourable_seasons, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('start_end', 'Start - End', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('start_end', $result->start_end, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('cost', 'Cost', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('cost', $result->cost, array('class'=>'form-control')) }}
								<br/>
								<i>*USD/Person</i>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Overview *',array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('description',$result->overview,array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('Itinerary', 'Itinerary', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('itinerary', $result->itinerary, array('id'=>'editor2', 'rows'=>'10','cols'=>'80')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('costDetails','Cost Include & Exclude', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('costDetails', $result->cost_include, array('id'=>'editor3', 'rows'=>'10','cols'=>'80')) }}
							</div>
						</div>
						


						<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
				    {{ Form::close() }}
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		 </div>
		<div class="col-xs-4">
			<div class="box box-primary">
				<div class="box-header">
					<div class="row">
						<div class="col-md-8"><h3 class="box-title">Slider Images</h3></div>
						<div class="col-md-4">
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
											{{ Form::open(array('url' => '/dashboard/trekking_management/trekking/slider/delete','method'=>'post','style'=>'display:inline-block')) }}
												{{ Form::token() }}
												{{ Form::hidden('id',$row->id) }}
												{{ Form::hidden('trekkingId',$row->trekking_id) }}
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
 				<h4 class="modal-title" id="myModalLabel">Slider Image</h4>
 			</div>
 			{{ Form::open(array('route'=>'save_trekking_slider','files'=>true)) }}
 				<div class="modal-body">
 						{{ Form::token() }}
 						{{ Form::hidden('id', $result->id) }}
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