$(document).ready(function(){
	$(document).on('click','.articleEdit',function(e){
		$(this).parents('form').submit();
	});

	$(".btnLocation").on('click',function(e){
		e.preventDefault();
		location.replace($(this).attr('data-href'));
	});

	$(document).on('click','.itemTrash',function(e){
		if (confirm("Are you sure you want to delete?")){
			$(this).parents('form').submit();
		}
		else{ return false; }
	});
});