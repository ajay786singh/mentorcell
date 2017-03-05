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
   <!-- bootstrap datepicker -->
<script src="<?php echo base_url($plugins_dir . '/datepicker/bootstrap-datepicker.js'); ?>"></script>       
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

<!------- WYSIWYG editor code---------------------------------->

<script src="<?php echo base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $( document ).ready(function() {
    $(".textarea").wysihtml5();
  });
</script>
<!------- WYSIWYG editor code---------------------------------->
<script>
  $(function () {
    $("#example1").DataTable(
	
	/*{
        "processing": true,
        "serverSide": true,
        "ajax": base_url+"index.php/admin/colleges/ajaxindex"
    }*/
	
	);
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
			var clg_course_id = $("#clg_course_id").val();
			var title = $("#title").val();
			var duration = $("#duration").val();
			var recognition = $("#recognition").val();
			var fee = $("#fee").val();
			var incentive = $("#incentive").val();
			var exam = $("#exam").val();
			var assigned_id = $("#assigned_id").val();
			var procedure = $("#procedure").val();
			var eligibility = $("#eligibility").val();
			
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/admin/colleges/save_assigncourses",
				dataType: 'text',
				data: {clg_course_id:clg_course_id,college_id:college_id,title:title,duration:duration,recognition:recognition,fee:fee,incentive:incentive,exam:exam,assigned_id:assigned_id,procedure:procedure,eligibility:eligibility},
				success: function(res) {
					$("#message").show().html('<p>'+res+'</p>');
					setTimeout(function(){
								location.reload();
							},1000);
					
				}
			});
			
		});
		/*save assigned courses*/
		
		
		
		/*get course dropdown*/
		$("#redeem_college_id").change(function(){
			var college_id = ($(this).val());
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/admin/coupons/courses/"+college_id,
				dataType: 'text',
				success: function(res) {
					$("#redeem_search_course").html(res);
				}
			});
			
		});
		/*get course dropdown*/
		
		
	});	
	/*otp verification*/
</script>


<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });</script>
 
   <!-- /.content-wrapper -->
 <script type="text/javascript" language="javascript">

		var field_sr = 1;
	function important_dates(){
			field_sr++;
			var numItems = jQuery('.important_dates_class').length;
			if(numItems <10){
			var field_html = '<p id="important_dates_p_'+field_sr+'"  class="important_dates_class"><input type="text"  id="datepicker" name="important_dates[]"  placeholder="date"  style="width:30%"> <input type="text" name="important_dates_description[]" placeholder="Content" style="width:50%" /> <a onclick = "return delete_field('+field_sr+');"  style="cursor:pointer">Delete</a></p>';
			$("#important_dates_field_reapeater").append(field_html);
			$("#important_dates_limit_msg").html("");
			}else{
				$("#important_dates_limit_msg").html("Max 9 important dates allowed.");
			}
		}
		
	function delete_field(pid){
		$("#important_dates_p_"+pid).remove();
		$("#important_dates_limit_msg").html("");
	}

 $('#datepicker').datepicker({
      autoclose: true
    });
	
	function create_slug(exam_name){
		var slug_name  = exam_name.replace(" ","_");
		var final_slug_name = slug_name.toLowerCase();
		$("#slug").val(final_slug_name);
	}

</script>

    </body>
</html>