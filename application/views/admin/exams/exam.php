<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Exam Details
        <small>Beta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php 
			
			if(!@$form_data){
				$form_type =  "create";
			}else{$form_type = "edit/".$form_data;}?>
            <form role="form" method="post" action="<?php echo base_url()."admin/exams/".$form_type;?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Course Name</label>
                  <input type="text"  class="form-control" name="course_name" id="course_name" value="<?php echo @$exams_list['course_name']; ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Exam Name</label>
                  <input type="text"  class="form-control" name="exam_name" id="exam_name" value="<?php echo @$exams_list['exam_name']; ?>" placeholder="" onBlur="return create_slug(this.value);">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text"  class="form-control" name="slug" id="slug" value="<?php echo @$exams_list['slug']; ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Overview</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="overview" id="overview"><?php echo @$exams_list['overview']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Eligibility</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="eligibility" id="eligibility"><?php echo @$exams_list['eligibility']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Process</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="process" id="process"><?php echo @$exams_list['process']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pattern</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="pattern" id="pattern"><?php echo @$exams_list['pattern']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Syllabus</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="syllabus" id="syllabus"><?php echo @$exams_list['syllabus']; ?></textarea>
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Information</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="contact_information" id="contact_information"><?php echo @$exams_list['contact_information']; ?></textarea>
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Important Dates</label>
                  <label for="smashing-post-class"><a onclick="return important_dates();"> Add New</a></label>
                  <div id="important_dates_field_reapeater">
  <?php  
  $important_date =$exams_list['impotant_dates'];
  $imp_date_exp = explode("@@",$important_date);
  $imp_date_name  = unserialize($imp_date_exp[0]);
  $imp_date_content = unserialize($imp_date_exp[1]);
  for( $bsi=0;$bsi<count($imp_date_name);$bsi++){?>
  
  <p id="important_dates_p_<?php echo $bsi+1; ?>" class="important_dates_class"><input type="text" id="datepicker" name="important_dates[]"   style="width:30%" placeholder="date" value="<?php echo $imp_date_name[$bsi]; ?>"> <input type="text" name="important_dates_description[]" placeholder="Link to the website" style="width:50%"   value="<?php echo @$imp_date_content[$bsi]; ?>" /> <a onclick = "return delete_field(<?php echo $bsi+1; ?>);" style="cursor:pointer">Delete</a></p>
  
  <?php  
  }?>
  
  </div>
  <p id="important_dates_limit_msg" style="color:red"></p>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Results</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="results" id="results"><?php echo @$exams_list['results']; ?></textarea>
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="is_active">
                  <option value="1">Active</option>
                  <option value="0">De-active</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo @$exams_list['id']; ?>" />
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



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
		$("#slug").val(slug_name);
	}

</script>
