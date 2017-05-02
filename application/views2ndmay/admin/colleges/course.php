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
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream</label>
						  <div class="col-sm-10">
						   <input type="text" value="<?php foreach($streamdata as $stream){
							  if(!empty($stream['stream_id'])){
								  $strem = $this->college_model->get_strem_data($stream['stream_id']);
								 
							if(!empty($strem->stream_name)){  echo $strem->stream_name; ?>,&nbsp;<?php
							  } } } ?>" class="form-control basic-multiple">

							</div>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course</label>
						  <div class="col-sm-10">
						  <input type="text" value="<?php foreach($coursedata as $ca){
							  if(!empty($ca['course_id'])){
								  $cad = $this->college_model->get_course_data($ca['course_id']);
							  if(!empty($cad->course_name)){echo $cad->course_name; ?>,&nbsp;<?php
							  } }  } ?>" class="form-control basic-multiple">

						  </div>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1" class="col-sm-2 control-label">Specialization</label>
						  <div class="col-sm-10">
						  <input type="text" value="<?php foreach($specializedata as $specialize){
							  if(!empty($specialize['specialization_id'])){
								  $spel = $this->college_model->get_spel_data($specialize['specialization_id']);
							if(!empty($spel->specialization_name)){  echo $spel->specialization_name; ?>,&nbsp;<?php
							  } }  } ?>" class="form-control basic-multiple">
						  </div>
						</div>
						
						
						
						<!--<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<input type="hidden" value="<?php echo $college_id; ?>" id="college_id">
									<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'id'=>'save_courses', 'content' => lang('actions_submit'))); ?>
								</div>
								
								<div class="btn-group" style="float:right">
									
									<?php echo anchor('admin/colleges/view/'.$college_id, 'Back', array('class' => 'btn btn-block btn-primary btn-flat')); ?>
								</div>
								
							</div>
						</div>-->
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
  