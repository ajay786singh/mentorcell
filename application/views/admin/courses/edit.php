<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo 'Edit Course Detail'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_college')); ?>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Course Type</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="stream_id" id="stream_id" >
										  <option value="">Select Type</option>
										  <?php foreach($streams as $type){
											  if($type['stream_id']==@$stream_id['value']){$type_id_seleted="selected";}else{$type_id_seleted="";}
											  echo '<option '.$type_id_seleted.' value="'.$type['stream_id'].'">'.$type['stream_name'].'</option>';
										  } ?>
										  </select>
											</div>
										</div>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="course_name" id="course_name" value="<?php echo @$course_name['value']; ?>" placeholder="Enter Course Name">
										  </div>
										</div>
										
									
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Duration</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="course_duration" id="course_duration" value="<?php echo @$course_duration['value']; ?>" placeholder="Enter Course Duration i.e. 2 Years or 4 Months">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Popular Courses</label>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Main Courses</label>
										  <div class="col-sm-10">
										  <input type="radio" <?php if(@$popular_courses['value'] =='1'){echo 'checked';} ?>  required="" name="popular_courses" id="popular_courses" value="1">Yes
										   <input type="radio" <?php if(@$popular_courses['value'] =='0'){echo 'checked';} ?> required="" name="popular_courses" id="popular_courses" value="0">No
										  </div>
										
										</div>
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Status</label>
										  <div class="col-sm-10">
										  <select name="status">
										  <option value="1" <?php if(@$status['value']==1){echo "selected";} ?>>Active</option>
										  <option value="0" <?php if(@$status['value']==0){echo "selected";} ?>>De-active</option>
										  </select>
										  </div>
										</div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <?php echo form_hidden('id', $courses['course_id']);?>
                                                <?php echo form_hidden($csrf); ?>
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/users', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
