  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Colleges Courses
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
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Stream</label>
						  <div class="col-sm-10">
						  <select  class="form-control basic-multiple" required="" name="clg_stream_id" id="clg_stream_id" multiple="multiple">
						  <?php foreach($streams as $stream){
											  if(in_array($stream['stream_id'],@$stream_id)){$stream_id_seleted="selected";}else{$stream_id_seleted="";}
											  echo '<option '.$stream_id_seleted.' value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
						   } ?>
						  </select>
							</div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Course Type</label>
						  <div class="col-sm-10">
						 <select  class="form-control basic-multiple" required="" name="clg_type_id" id="clg_type_id" multiple="multiple">
						 <?php foreach($types as $type){
											  if(in_array($type['type_id'],@$type_id)){$type_id_seleted="selected";}else{$type_id_seleted="";}
											  echo '<option '.$type_id_seleted.' value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
						   } ?>
						 </select>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Courses</label>
						  <div class="col-sm-10">
						  
						  <select  class="form-control basic-multiple" required="" name="clg_course_id" id="clg_course_id" multiple="multiple">
						  <?php foreach($courses as $course){
											  if(in_array($course['course_id'],@$course_id)){$course_id_seleted="selected";}else{$course_id_seleted="";}
											  echo '<option '.$course_id_seleted.' value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
						   } ?></select>
						  </div>
						</div>
						
						
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<input type="hidden" value="<?php echo $college_id; ?>" id="college_id">
									<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'id'=>'save_courses', 'content' => lang('actions_submit'))); ?>
								</div>
								
								<div class="btn-group" style="float:right">
									
									<?php echo anchor('admin/colleges/view/'.$college_id, 'Back', array('class' => 'btn btn-block btn-primary btn-flat')); ?>
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
  