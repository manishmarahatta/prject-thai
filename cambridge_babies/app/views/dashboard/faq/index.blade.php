@section('content')
<section class="content-header">
	<h1>FAQ <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('faq_management') }}">FAQ Management</a></li>
		<li class="active">FAQ List</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">All FAQ's</h3>
					<div class="pull-right">
						<button class="btn btn-success btnLocation"  data-href="{{ URL::route('new_faq') }}"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add New</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50px">id</th>
								<th>Question</th>
								<th>Answer</th>
								<th width="50px">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($faq)
								<?php $sn = 1; ?>
								@foreach($faq as $row)
								<tr>
									<td>{{ $sn }}</td>
									<td>{{ $row->question }}</td>
									<td>{{ Str::limit($row->ans,250) }}</td>
									<td>
										{{ Form::open(array('url'=>'/dashboard/faq_management/edit_faq/','method'=>'post','style'=>'display:inline-block')) }}
											{{ Form::token() }}
											{{ Form::hidden('id',$row->id) }}
											<a href="#"><i class="fa fa-edit articleEdit"></i></a>
										{{ Form::close() }}

										{{ Form::open(array('url' => '/dashboard/faq_management/delete_faq/','method'=>'post','style'=>'display:inline-block')) }}
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