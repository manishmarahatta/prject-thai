@section('content')
<section class="content-header">
	<h1>Page <small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('page_management') }}">Page Management</a></li>
		<li class="active">Edit Page</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@include('dashboard/include/notification')
		
			<div class="box box-primary">
				@if($page)
				<div class="box-header">
					<h3 class="box-title">Edit Page | {{ $page->title }}</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('page_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					{{ Form::open(array('route'=>'save_page','files'=>true, 'class'=>'form-horizontal')) }}
				        		{{ Form::token() }}
					       	{{ Form::hidden('id',base64_encode($page->id)) }}

						<div class="form-group">
							{{ Form::label('title', 'Title *', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('title', $page->title, array('class'=>'form-control', 'placeholder'=>'Enter title', 'required'=>'required"')) }}
							</div>
						</div>
<!-- 
						<div class="form-group">
							{{ Form::label('image','Image', array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::file('image') }}
								<small><i>
								@if(strlen($page->image)>0)
								<a href="{{ URL::to($page->image) }}" target="_blank" class="image-link">Current Image</a>
								@endif</i>
								</small>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('description', 'Description *',array('class'=>'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('description',$page->description,array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
							</div>
						</div>
 -->
						<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
					{{ Form::close() }}
				</div><!-- /.box-body -->
				@endif
			</div><!-- /.box -->
		 </div>
		</div>
 </section>
@stop