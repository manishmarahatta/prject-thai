
@if(Session::has('success-message'))
    	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-check"></i>   {{ Session::get('success-message') }}
	</div>
@endif


@if(Session::has('warning-message'))
 	<div class="alert alert-warning alert-dismissable">
	             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	              <i class="icon fa fa-warning"></i> 
        		{{ Session::get('warning-message') }}
             </div>
@endif

@if ( $errors->count() > 0 )
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-info"></i>
		<b>NOTICE!!</b>     
	            <ul>
	                @foreach( $errors->all() as $message )
	                <li>{{ $message }}</li>
	                @endforeach
	            </ul>
             </div>
@endif
