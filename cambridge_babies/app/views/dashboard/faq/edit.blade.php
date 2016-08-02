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
					<h3 class="box-title">Edit FAQ</h3>
					<div class="pull-right">
						<button class="btn btn-danger btnLocation"  data-href="{{ URL::route('faq_management') }}"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back</button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					@if(isset($faq))
						{{ Form::open(array('route'=>'save_faq', 'class'=>'form-horizontal')) }}
				        		{{ Form::token() }}
				        		{{ Form::hidden('id',base64_encode($faq->id)) }}
							<div class="form-group">
								{{ Form::label('question', 'Question *', array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::text('question', $faq->question, array('class'=>'form-control', 'placeholder'=>'Enter question', 'required'=>'required"')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('answer', 'Answer *',array('class'=>'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::textarea('answer',$faq->ans,array('id'=>'editor1','rows'=>'10','cols'=>'80' ,'required'=>'required')) }}
								</div>
							</div>
							<button type="submit" class="pull-right btn btn-success submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
					    {{ Form::close() }}
					 @endif
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		 </div>
		</div>
 </section>

@stop