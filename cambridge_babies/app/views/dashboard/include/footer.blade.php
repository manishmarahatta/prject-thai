<!-- Main Footer -->
  <footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
	  Powered by <a href="#">InBox</a>
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2015 <a href="{{ URL::route('home') }}" target="_blank">Cozy Dream</a>.</strong> All rights reserved.
  </footer>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('assets/dashboard/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ URL::asset('assets/dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/dashboard/plugins/fastclick/fastclick.min.js') }}"></script>
<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dashboard/dist/js/app.min.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('assets/dashboard/custom/custom.js') }}"></script>
<script type="text/javascript">
	$(function () {
		$("#example1").DataTable();
		CKEDITOR.replace('editor1');
		CKEDITOR.replace('editor2');
		CKEDITOR.replace('editor3');

	});
</script>
  	