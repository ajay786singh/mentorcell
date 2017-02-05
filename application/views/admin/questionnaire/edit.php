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
                                    <h3 class="box-title"><?php echo 'Edit Questionnaire Detail'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'question_id' => 'form-edit_college')); ?>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Category</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="category_id" question_id="category_id" >
										  <option value="">Select</option>
										  <?php foreach($categories as $type){
											  if($type['category_id']==@$category_id['value']){$type_id_seleted="selected";}else{$type_id_seleted="";}
											  echo '<option '.$type_id_seleted.' value="'.$type['category_id'].'">'.$type['category_name'].'</option>';
										  } ?>
										  </select>
											</div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Level</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="level_id" question_id="level_id" >
										  <option value="">Select</option>
										  <?php foreach($levels as $type){
											  if($type['level_id']==@$level_id['value']){$type_id_seleted="selected";}else{$type_id_seleted="";}
											  echo '<option '.$type_id_seleted.' value="'.$type['level_id'].'">'.$type['level'].'</option>';
										  } ?>
										  </select>
											</div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select Type</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="type" question_id="type" >
										  <option value="">Select</option>
										  <?php foreach($types as $t_type){
											  if($t_type==@$questionnaire['type']){$seleted="selected";}else{$seleted="";}
											  echo '<option '.$seleted.' value="'.$t_type.'">'.$t_type.'</option>';
										  } ?>
										  </select>
											</div>
										</div>
										
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Question</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="question" question_id="question" value="<?php echo @$question['value']; ?>" placeholder="Enter Question Name">
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
                                                <?php echo form_hidden('question_id', $questionnaire['question_id']);?>
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
