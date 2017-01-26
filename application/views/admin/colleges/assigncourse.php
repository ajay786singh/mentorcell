  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Colleges Assign Courses
        <small>(Beta 1.0)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
                 <h3 class="box-title"><?php echo $message; ?></h3>
            </div>
            <!-- /.box-header -->
				 <div class="box-body">
					<div class="alert alert-success" id="message" style="display:none;">
					</div>
					<?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_stream'));
					
					?>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Courses</label>
						  <div class="col-sm-10">
						  
						  <select  class="form-control " required="" name="clg_course_id" id="clg_course_id" >
						  <?php foreach($courses as $course){
											  if(in_array($course['course_id'],@$course_id)){$course_id_seleted="selected";}else{$course_id_seleted="";}
											  echo '<option '.$course_id_seleted.' value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
						   } ?></select>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Title</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="title" id="title" value="" placeholder="Enter Course Title">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Duration</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="duration" id="duration" value="" placeholder="Enter Course Duration">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Recognition</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="recognition" id="recognition" value="" placeholder="Enter Course Recognition">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Fee</label>
						  <div class="col-sm-10">
						  <input type="number" class="form-control" required="" name="fee" id="fee" value="" placeholder="Enter Course Fee">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Exams</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="exam" id="exam" value="" placeholder="Enter Exams">
						  </div>
						</div>
										
										
										
						
						
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<input type="hidden" class="ignoreField" value="<?php echo $college_id; ?>" id="college_id">
									<input type="hidden" class="ignoreField" value="" id="assigned_id">
									<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'id'=>'assign_courses', 'content' => lang('actions_submit'))); ?>
								</div>
							</div>
						</div>
					<?php echo form_close();?>
				</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  <!-- Content Wrapper. Contains page content -->
  