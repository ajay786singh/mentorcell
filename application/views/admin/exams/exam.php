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
        <div class="col-md-6">
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
                  <input type="text"  class="form-control" name="exam_name" id="exam_name" value="<?php echo @$exams_list['exam_name']; ?>" placeholder="">
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
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="impotant_dates" id="impotant_dates"><?php echo @$exams_list['impotant_dates']; ?></textarea>
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
  <!-- /.content-wrapper -->
