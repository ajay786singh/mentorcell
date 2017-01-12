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
                                    <h3 class="box-title"><?php echo 'Add New College'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" name="college_name" id="college_name" value="<?php echo @$college_name['value']; ?>" placeholder="Enter First Name">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Location</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" id="location" name="location" value="<?php echo @$location['value'] ; ?>" placeholder="Enter City">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label" >Contact Person Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="<?php echo @$contact_person_name['value']; ?>" placeholder="Enter Last Name">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Official Email address</label>
										  <div class="col-sm-10">
										  <input type="email" class="form-control" id="email_id" value="<?php echo @$email_id['value']; ?>" name="email_id" placeholder="Enter email">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo @$pwd['value']; ?>" name="pwd" placeholder="Password">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Mobile</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php echo @$mobile_number['value']; ?>" placeholder="Enter Mobile">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Status</label>
										  <div class="col-sm-10">
										  <select name="is_active">
										  <option value="1">Active</option>
										  <option value="0">De-active</option>
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
