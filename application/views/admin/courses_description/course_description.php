
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Description Page Name
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
            <form role="form" method="post" action="<?php echo base_url()."admin/course_detail/$form_type";?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Course Description Page Name</label>
                  <input type="text"  class="form-control" name="course_description_page_name" id="course_description_page_name" value="<?php echo @$course_description_page_name_list['course_description_page_name']; ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">About Study</label>
                  <input type="text"  class="form-control" name="about_study" id="about_study" value="<?php echo @$course_description_page_name_list['about_study']; ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Eligibility</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="eligibility" id="eligibility"><?php echo @$course_description_page_name_list['eligibility']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Course</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="course" id="course"><?php echo @$course_description_page_name_list['course']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Exam</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="exam" id="exam"><?php echo @$course_description_page_name_list['exam']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Famous Alumni</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="famous_alumni" id="famous_alumni"><?php echo @$course_description_page_name_list['famous_alumni']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Placement Trends</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="placement_trends" id="placement_trends"><?php echo @$course_description_page_name_list['placement_trends']; ?></textarea>
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Key criteria to choose right B-School</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="key_criteria_to_choose" id="key_criteria_to_choose"><?php echo @$course_description_page_name_list['key_criteria_to_choose']; ?></textarea>
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Value Coupon(s)</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="value_coupon" id="value_coupon"><?php echo @$course_description_page_name_list['value_coupon']; ?></textarea>
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
              <input type="hidden" name="id" value="<?php echo @$course_description_page_name_list['id']; ?>" />
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
  <!-- /.content-wrapper -->


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