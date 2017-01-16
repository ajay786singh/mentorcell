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
                                    <h3 class="box-title"><?php echo 'Edit College Detail'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_college')); ?>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select user</label>
										  <div class="col-sm-10">
										  <select  class="form-control" required="" name="user_id" id="user_id" >
										  <option value="">Select User</option>
										  <?php foreach($users as $user){
											  if($user['id']==@$user_id['value']){$user_id_seleted="selected";}else{$user_id_seleted="";}
											  echo '<option '.$user_id_seleted.' value="'.$user['id'].'">'.$user['email'].'</option>';
										  } ?>
										  </select>
										  </div>
										</div>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="name" id="college_name" value="<?php echo @$name['value']; ?>" placeholder="Enter College Name">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Code</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="code" id="code" value="<?php echo @$code['value']; ?>" placeholder="Enter College Code">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Description</label>
										  <div class="col-sm-10">
										  <textarea class="form-control" required="" name="description" placeholder="Enter College Description"><?php echo @$description['value']; ?></textarea>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Logo</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="logo" id="code" value="" placeholder="Enter College Code">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Banner</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="banner" id="banner"  placeholder="Enter College Code">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label" >Contact Person Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" id="contact_person_name" name="contact_person_name" value="<?php echo @$contact_person_name['value']; ?>" placeholder="Enter Contact Person Name">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Official Email address</label>
										  <div class="col-sm-10">
										  <input type="email" class="form-control" required="" id="email_id" value="<?php echo @$email_id['value']; ?>" name="email_id" placeholder="Enter Official Email address">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Mobile</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" id="mobile_number" name="phone" value="<?php echo @$phone['value']; ?>" placeholder="Enter Mobile">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Address</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" id="address" name="address" value="<?php echo @$address['value']; ?>" placeholder="Enter Address">
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">State</label>
										  <div class="col-sm-10">
										   <select  class="form-control" required="" name="state" id="college_state" >
											  <option value="">Select State</option>
											  <?php 
											  foreach($states as $stateeach){
												  if(intval($stateeach['id'])==$state['value']){$state_seleted="selected";}else{$state_seleted="";}
												  echo '<option '.$state_seleted.' value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
											  } ?>
											</select>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">City</label>
										  <div class="col-sm-10" id="college_city_box">
										   <select  class="form-control" required="" name="city" id="college_city" >
											  <option value="<?php echo $city['key']; ?>"><?php echo $city['value']; ?>
											</select>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Pincode</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo @$pincode['value']; ?>" placeholder="Enter Pincode">
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
                                                <?php echo form_hidden('id', $colleges['id']);?>
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
