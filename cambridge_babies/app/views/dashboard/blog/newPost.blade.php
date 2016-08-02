@section('content')
<section class="content-header">
	<h1>Blog<small>Managment</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::route('blog_management') }}">Blog Management</a></li>
		<li class="active">New Article</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">New Article</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('blog_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
						{{ Form::open(array('route'=>'save_blog_article', 'class'=>'form-horizontal')) }}
					        	{{ Form::token() }}
							<div class="form-group">
								{{ Form::label('title', 'Title *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('title', '', array('class'=>'form-control', 'placeholder'=>'Enter article title', 'required'=>'required"')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('date', 'Date *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									<input type="date" class="form-control" name="date" required="required"> 
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('fulltext', 'Full Text *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('fulltext','',array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
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