@section('content')
<section class="content-header">
	<h1>Testimonials <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('testimonials_management') }}">Testimonials Management</a></li>
		<li class="active">Testimonials List</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">All Testimonials</h3>
					<div class="pull-right">
						<button class="btn btn-success btnLocation"  data-href="{{ URL::route('new_testimonials') }}"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add New</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50px">id</th>
								<th>Name</th>
								<th>Message</th>
								<th width="50px">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($testimonials)
								<?php $sn = 1; ?>
								@foreach($testimonials as $row)
								<tr>
									<td>{{ $sn }}</td>
									<td>{{ $row->name }}</td>
									<td>{{ Str::limit($row->message,250) }}</td>
									<td>
										{{ Form::open(array('url'=>'/dashboard/testimonials_management/edit_testimonials/','method'=>'post','style'=>'display:inline-block')) }}
											{{ Form::token() }}
											{{ Form::hidden('id',$row->id) }}
											<a href="#"><i class="fa fa-edit articleEdit"></i></a>
										{{ Form::close() }}

										{{ Form::open(array('url' => '/dashboard/testimonials_management/delete_testimonials/','method'=>'post','style'=>'display:inline-block')) }}
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