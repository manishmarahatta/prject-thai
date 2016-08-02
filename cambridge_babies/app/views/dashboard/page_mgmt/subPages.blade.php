@section('content')
<section class="content-header">
	<h1>Page <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('page_management') }}">Page Management</a></li>
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
					<div class="box-tools pull-right">
			                   <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add New</button></a>
			                  </div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Rendering engine</th>
								<th>Browser</th>
								<th>Platform(s)</th>
								<th>Engine version</th>
								<th>CSS grade</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		 </div>
		</div>
 </section>

@stop