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
                                    <h3 class="box-title"><?php echo 'Add New Course'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>
									
									<?php 
										echo '<font color="green">'.$this->session->flashdata('message').'</font>';
										echo '<font color="red">'.$this->session->flashdata('error_message').'</font>';				
										echo '<font color="red">'.validation_errors().'</font>';				
										if(!empty($error)){
											echo '<font color="red">'.$error.'</font>';
										}
				
									?>

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_stream'));
									
									?>
									
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Course Type</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="type_id" id="type_id" >
										  <option value="">Select Type</option>
										  <?php foreach($types as $type){
											  if($type['type_id']==@$type_id['value']){$type_id_seleted="selected";}else{$type_id_seleted="";}
											  echo '<option '.$type_id_seleted.' value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
										  } ?>
										  </select>
											</div>
										</div>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="course_name" id="course_name" value="<?php echo @$course_name['value']; ?>" placeholder="Enter College Name">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Code</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="course_code" id="course_code" value="<?php echo @$course_code['value']; ?>" placeholder="Enter College Code">
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