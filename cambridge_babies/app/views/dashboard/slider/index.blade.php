@section('content')
<section class="content-header">
	<h1>Slider<small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('slider_management') }}">Slider Management</a></li>
		<li class="active">Sliders</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">All Sliders</h3>
					<div class="pull-right">
						<button class="btn btn-success btnLocation"  data-href="{{ URL::route('new_slider') }}"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add New</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="40px">id</th>
							<!-- 	<th width="200px">TItle</th>
								<th>Caption</th> -->
								<th>Image</th>
								<th width="50px">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($sliders)
								<?php $sn = 1; ?>
								@foreach($sliders as $row)
								<tr>
									<td>{{ $sn }}</td>
								<!-- 	<td>{{ $row->title }}</td>
									<td>{{ Str::limit($row->caption,250) }}</td> -->
									<td><img src="{{ URL::to($row->image) }}" style="height:100px;"></td>
									<td>
										{{ Form::open(array('url'=>'/dashboard/slider_management/edit_slider/','method'=>'post','style'=>'display:inline-block')) }}
											{{ Form::token() }}
											{{ Form::hidden('id',$row->id) }}
											<a href="#"><i class="fa fa-edit articleEdit"></i></a>
										{{ Form::close() }}

										{{ Form::open(array('url' => '/dashboard/slider_management/delete_slider/','method'=>'post','style'=>'display:inline-block')) }}
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
		</div>
 </section>

@stop