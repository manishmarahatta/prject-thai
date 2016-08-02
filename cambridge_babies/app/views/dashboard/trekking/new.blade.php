@section('content')
<section class="content-header">
	<h1>Trekking <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('activities_type_management') }}">Trekking Management</a></li>
		<li class="active">New Trekking</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">New Trekking</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('trekking') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
						{{ Form::open(array('route'=>'save_trekking', 'class'=>'form-horizontal','files'=>'true')) }}
					        		{{ Form::token() }}
			        	        	<div class="form-group">
			        				{{ Form::label('activitiesId', 'Activity Type *', array('class'=>'col-sm-2 control-label')) }}
			        				<div class="col-sm-10">
			        					<select class="form-control" name="activitiesId" required="required">
			        						<option value="">Select Activity Type</option>
			        						@if($results)
			        							@foreach($results as $row)
			        								<option value="{{ $row->id }}">{{ $row->title }}</option>
			        							@endforeach
			        						@endif
			        					</select>
			        				</div>
			        			</div>
							<div class="form-group">
								{{ Form::label('title', 'Title *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('title', '', array('class'=>'form-control','required'=>'required')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('duration', 'Duration', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('duration', '', array('class'=>'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('destination', 'Destination', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('destination', '', array('class'=>'form-control')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('favourable_seasons', 'Favourable Seasons', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('favourable_seasons', '', array('class'=>'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('start_end', 'Start - End', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('start_end', '', array('class'=>'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('cost', 'Cost', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('cost', '', array('class'=>'form-control')) }}
									<br/>
									<i>*USD/Person</i>
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Overview *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('description','',array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('Itinerary', 'Itinerary', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('itinerary', '', array('id'=>'editor2', 'rows'=>'10','cols'=>'80')) }}
								</div>
							</div>
							
							<div class="form-group">
								{{ Form::label('costDetails','Cost Include & Exclude', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('costDetails', '', array('id'=>'editor3', 'rows'=>'10','cols'=>'80')) }}
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