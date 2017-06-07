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

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_college'));
									?>
									
									
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select user</label>
										  <div class="col-sm-10">
										  <select  class="form-control basic-multiple"  name="user_id" id="user_id" multiple="multiple" >
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
										  <input type="text" class="form-control"  name="code" id="code" value="<?php echo @$code['value']; ?>" placeholder="Enter College Code">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Description</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="description" placeholder="Enter College Description"><?php echo @$description['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Upload Brochure</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="brochure" id="brochure" value="" placeholder="Enter College Code">
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
										  <input type="text" class="form-control"  id="contact_person_name" name="contact_person_name" value="<?php echo @$contact_person_name['value']; ?>" placeholder="Enter Contact Person Name">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label" >College Search By</label>
										</div>
										
										<!--<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label" >College By Location</label>
										    <div class="col-sm-10">
										  <input type="radio"  required="" name="college_location" id="college_location" value="1">Yes
										   <input type="radio"  required="" name="college_location" id="college_location" value="0">No
										  </div>
										</div>-->
										
										  <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Top Colleges</label>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Popular Colleges</label>
										  <div class="col-sm-10">
										  <input type="radio"  required="" name="popular_colleges" id="popular_colleges" value="1">Yes
										   <input type="radio"  required="" name="popular_colleges" id="popular_colleges" value="0">No
										  </div>
										
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Featured Colleges</label>
										  <div class="col-sm-10">
										  <input type="radio"  required="" name="featured_colleges" id="featured_colleges" value="1">Yes
										   <input type="radio"  required="" name="featured_colleges" id="featured_colleges" value="0">No
										  </div>
										
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Official Email address</label>
										  <div class="col-sm-10">
										  <input type="email" class="form-control"  id="email_id" value="<?php echo @$email_id['value']; ?>" name="email_id" placeholder="Enter Official Email address">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Website</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control"  name="website" id="website" value="<?php echo @$website['value']; ?>" placeholder="Enter College Website">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Mobile</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control"  id="mobile_number" name="phone" value="<?php echo @$phone['value']; ?>" placeholder="Enter Mobile">
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
										   <select  class="form-control"  name="state" id="college_state" >
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
										   <select  class="form-control"  name="city" id="college_city" >
										   <?php if($city['value']){?>
										   <option value="<?php echo $city['key']; ?>"><?php echo $city['value']; ?></option>
										   <?php }else{ ?>
											  <option value="">Select City</option>
										   <?php } ?>  
											</select>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Pincode</label>
										  <div class="col-sm-10">
										  <input type="number" max="999999" min="100000" class="form-control" id="pincode" name="pincode" value="<?php echo @$pincode['value']; ?>" placeholder="Enter Pincode">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Why Join</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="why_join" placeholder="Enter Why Join"><?php echo @$why_join['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Placement Services</label>
										  <div class="col-sm-10">
										  <textarea class="form-control" name="placement_services" placeholder="Enter Placement Services"><?php echo @$placement_services['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Top Recruiting Companies</label>
										  <div class="col-sm-10">
										  <textarea class="form-control" name="top_recruiting_companies" placeholder="Enter Top Recruiting Companies"><?php echo @$top_recruiting_companies['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Hostel Details</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="hostel_details" placeholder="Enter Hostel Details"><?php echo @$hostel_details['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Infrastructure/Teaching Facilities</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="teaching_facilities" placeholder="Enter Infrastructure/Teaching Facilities"><?php echo @$teaching_facilities['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Top Faculty</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="top_faculty" placeholder="Enter Top Faculty"><?php echo @$top_faculty['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Partner colleges</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="partner_colleges" placeholder="Enter Partner colleges"><?php echo @$partner_colleges['value']; ?></textarea>
										  </div>
										</div>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Rank Holders</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="rank_holders" placeholder="Enter Rank Holders"><?php echo @$rank_holders['value']; ?></textarea>
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Status</label>
										  <div class="col-sm-10">
										  <select name="status">
										  <option value="1" <?php if(@$status['value']==1){echo "selected";} ?>>Active</option>
										  <option value="0" <?php if(@$status['value']==0){echo "selected";} ?>>De-active</option>
										   <option value="2" <?php if(@$status['value']==2){echo "selected";} ?>>Tie Up</option>
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
