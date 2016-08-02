@section('content')
<section class="content-header">
	<h1>Subpage <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('page_management') }}">Page Management</a></li>
		<li><a href="{{ URL::route('subpage_management') }}">Subpage Management</a></li>
		<li class="active">Page List</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">All Pages</h3>
					<div class="pull-right">
						<button class="btn btn-success btnLocation"  data-href="{{ URL::route('new_subpage') }}"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add New</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>id</th>
								<th width="200px">TItle</th>
								<th >Description</th>
								<th width="200px">Main Page</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($subpages)
								<?php $sn = 1; ?>
								@foreach($subpages as $row)
								<tr>
									<td>{{ $sn }}</td>
									<td>{{ $row->title }}</td>
									<td>{{ Str::limit(strip_tags($row->description,250)) }}</td>
									<td>{{ $row->mainPage['title'] }}</td>
									<td>
										{{ Form::open(array('url'=>'/dashboard/page_management/edit_subpage/','method'=>'post','style'=>'display:inline-block')) }}
											{{ Form::token() }}
											{{ Form::hidden('id',$row->id) }}
											<a href="#"><i class="fa fa-edit articleEdit"></i></a>
										{{ Form::close() }}

											{{ Form::open(array('url' => '/dashboard/page_management/delete_subpage/','method'=>'post','style'=>'display:inline-block')) }}
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