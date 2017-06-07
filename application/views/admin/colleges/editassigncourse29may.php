  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Update  Colleges Assign Courses
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
			<?php $college_location_eng2 = $this->common_model->get_single_row("mc_colleges","id",$college_id);?>
<h3><?=$college_location_eng2['name'];?></h3>
<?php 
$course_assigndata = $this->common_model->get_single_row("mc_course_assignment","assigned_id",$assigned_id);
$course_detail = $this->common_model->get_all_rows("mc_courses","stream_id",$course_assigndata['stream_id']);
$speciali_detail = $this->common_model->get_all_rows("mc_specialization","course_id",$course_assigndata['course_id']);

?>
            </div>
            <!-- /.box-header -->
				 <div class="box-body">
					<div class="alert alert-success" id="message" style="display:none;">
					</div>
					<?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_stream'));
					
					?>
					<!--<form action="<?php echo base_url()?>admin/colleges/save_assigncourses" class="form-horizontal" id="form-create_stream">-->
					
					<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Streams</label>
						  <div class="col-sm-10">
						  
						  <select  class="form-control clg_stream_id stren" required="" name="clg_streams_id" id="streams" >
						  <?php 
						 
						   echo '<option  value="">Select Streams</option>';
						  foreach($streams as $stream){ ?>
							<option <?php if($course_assigndata['stream_id']==$stream['stream_id']){echo 'selected';} ?> value="<?=$stream['stream_id']?>"><?=$stream['stream_name'];?></option>
											 
						  <?php } ?></select>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Courses</label>
						  <div class="col-sm-10">
						  
						  <select  class="form-control " required="" name="clg_course_id" id="clg_course_id" >
						  <?php 
						 
						   echo '<option  value="">Select Course</option>';
						  foreach($course_detail as $course){ ?>
						<option <?php if($course_assigndata['course_id']==$course['course_id']){echo 'selected';} ?> value="<?=$course['course_id']?>"><?=$course['course_name']?></option>
											 
						<?php   } ?></select>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Specialization </label>
						  <div id="clg_specialization1" class="col-sm-10">
						  
						  <select  class="form-control "  name="clg_specialization" id="clg_specialization" >
						  <option  value="">Select Specialization </option>
						  <?php   foreach($speciali_detail as $special){ ?>
						<option <?php if($course_assigndata['specialization_id']==$special['specialization_id']){echo 'selected';} ?> value="<?=$special['specialization_id']?>"><?=$special['specialization_name']?></option>
											 
						<?php   } ?>
						   </select>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Status</label>
						  <div class="col-sm-10">
						   <select  class="form-control clg_stream_id" required="" name="clg_status_id" id="clg_status_id" >
						  <?php 
						 
						   echo '<option  value="">Select Course Status</option>';
						  foreach($course_statname as $status_name){ ?>
						<option <?php if($course_assigndata['course_status']==$status_name['name']){echo 'selected';} ?> value="<?=$status_name['name']?>"><?=$status_name['name']?></option>
						 <?php  } ?></select>
						 <!-- <input type="text" class="form-control" required="" name="course_status" id="course_status" value="" placeholder="Enter Course Status">-->
						  </div>
						</div>
						<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label" >Admission Procedure</label>
										  <div class="col-sm-10">
										  <textarea class="conveyer_quota" id="conveyer_quota" name="conveyer_quota"><?=$course_assigndata['conveyer_quota']; ?></textarea>
										  </div>
										</div>
										
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Title</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="title" id="title" value="<?=$course_assigndata['title']; ?>" placeholder="Enter Course Title">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Duration</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control"  name="duration" id="duration" value="<?=$course_assigndata['duration']; ?>" placeholder="Enter Course Duration">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Recognition</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control"  name="recognition" id="recognition" value="<?=$course_assigndata['recognition']; ?>" placeholder="Enter Course Recognition">
						  </div>
						</div>
						<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label" >College Affiliation</label>
										  <div class="col-sm-10">
										  	 <input type="text" class="form-control"  id="management_quota" name="management_quota" placeholder="College Affiliation" value="<?php echo $course_assigndata['management_quota']; ?>">
										  </div>
										</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Fee</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="fee" id="fee" value="<?php echo $course_assigndata['fee']; ?>" placeholder="Enter Course Fee">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Incentive</label>
						  <div class="col-sm-10">
						  <input type="number" class="form-control" required="" name="incentive" id="incentive" value="<?php echo $course_assigndata['incentive']; ?>" placeholder="Enter Course Incentive">
						  </div>
						</div>
						
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College procedure</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="procedure" id="procedure" value="<?php echo $course_assigndata['procedure']; ?>" placeholder="Enter procedure">
						  </div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College eligibility</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" required="" name="eligibility" id="eligibility" value="<?php echo $course_assigndata['eligibility']; ?>" placeholder="Enter eligibility">
						  </div>
						</div>
						<div class="form-group">
						<?php $exams_name = $this->exam_model->get_exams_by_course($course_assigndata['stream_id']); ?>
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Exams</label>
						  <div class="col-sm-10">
							 <select  class="form-control basic-multiple"  name="exam" id="exam" multiple="multiple">
							   <?php
							  if(count($exams_name) > 0){
		echo "<option value=''>-- Choose Exam --</option>";
			foreach($exams_name as $exam_data){
				//echo "<option value='".$exam_data['slug']."'>".$exam_data['exam_name']."</option>";
				echo "<option value='".$exam_data['id']."'>".$exam_data['exam_name']."</option>";
			}
		}else{
			echo "<option value='0'>-- Choose Exam --</option>";
		}
							  ?>
							</select>
		
						  </div>
						</div>
										
							<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<input type="hidden" class="ignoreField" value="<?php echo $college_id; ?>" id="college_id">
									<input type="hidden" class="ignoreField" value="<?=$assigned_id?>" id="assigned_id">
									<?php echo form_button(array('type' => 'submit', 'id' => $college_id, 'class' => 'updateassign_courses btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
								</div>
								<!--<div class="btn-group" style="float:right">
									<?php echo anchor('admin/colleges/course/'.$college_id, 'Back', array('class' => 'btn btn-block btn-primary btn-flat')); ?>
								</div>-->
								
								
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
  