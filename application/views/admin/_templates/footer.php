<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('footer_version'); ?></b> 1.0.0
                </div>
                <strong><?php echo lang('footer_copyright'); ?> &copy; 2016-<?php echo date('Y'); ?> <a href="#" target="_blank">Mentor Cell</a> <?php echo lang('footer_all_rights_reserved'); ?>.
            </footer>
        </div>

        <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
        
        <!-- DataTables -->
<script src="<?php echo base_url($frameworks_dir . '/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url($frameworks_dir . '/datatables/dataTables.bootstrap.min.js'); ?>"></script>
   <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/datatables/dataTables.bootstrap.css'); ?>">

<script src="<?php echo base_url($frameworks_dir . '/dropzone/dropzone.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/dropzone/dropzone.css'); ?>">
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
 $(".basic-multiple").select2();
</script>
  
  
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  
  /*otp verification*/
	$(document).ready(function(){
	
		
		$("#college_state").change(function(event) {
			
			var state_id = $(this).val();
			
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/admin/colleges/city",
				dataType: 'text',
				data: {state_id:state_id},
				success: function(res) {
					$("#college_city_box").html(res);
				}
			});
		});
		
		
		
		/**/
		$("#clg_stream_id").change(function(){
			var college_id = ($("#college_id").val());
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/admin/colleges/course_type",
				dataType: 'text',
				data: {streams:$(this).val().join(),college_id:college_id},
				success: function(res) {
					$("#clg_type_id").html(res);
				}
			});
		});
		
		$("#clg_type_id").change(function(){
			var college_id = ($("#college_id").val());
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/admin/colleges/courses",
				dataType: 'text',
				data: {types:$(this).val().join(),college_id:college_id},
				success: function(res) {
					$("#clg_course_id").html(res);
				}
			});
			
		});
		/**/
		
		/**/
		$("#save_courses").click(function(e){
			e.preventDefault();
			var college_id = ($("#college_id").val());
			var streams = ($("#clg_stream_id").val()==null)? '' :$("#clg_stream_id").val().join();
			var types = ($("#clg_type_id").val()==null)? '' :$("#clg_type_id").val().join();
			var courses = ($("#clg_course_id").val()==null)? '' :$("#clg_course_id").val().join();
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/admin/colleges/save_courses",
				dataType: 'text',
				data: {streams:streams,types:types,courses:courses,college_id:college_id},
				success: function(res) {
					$("#message").show().html('<p>'+res+'</p>');
				}
			});
			
		});
		/**/
		
		
		
		/*save assigned courses*/
		$("#assign_courses").click(function(e){
			e.preventDefault();
			var college_id = $("#college_id").val();
			var title = $("#title").val();
			var duration = $("#duration").val();
			var recognition = $("#recognition").val();
			var fee = $("#fee").val();
			var exam = $("#exam").val();
			var assigned_id = $("#assigned_id").val();
			
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/admin/colleges/save_assigncourses",
				dataType: 'text',
				data: {college_id:college_id,title:title,duration:duration,recognition:recognition,fee:fee,exam:exam,assigned_id:assigned_id},
				success: function(res) {
					$("#message").show().html('<p>'+res+'</p>');
				}
			});
			
		});
		/*save assigned courses*/
		
		
	});	
	/*otp verification*/
</script>
    </body>
</html>