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
                                    <h3 class="box-title"><?php echo 'Add New Logo'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_logo'));
									?>
									
									
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Select College</label>
										  <div class="col-sm-10">
										  <select required=""  class="form-control"  name="college_name" id="college_name">
										  <option value="">Select College</option>
										  <?php foreach($collages as $collages){
											  if($collages['id']==@$user_id['collage']){$user_id_seleted="selected";}else{$user_id_seleted="";}
											  echo '<option '.$user_id_seleted.' value="'.$collages['id'].'">'.$collages['name'].'</option>';
										  } ?>
										  </select>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label">College URL</label>
										  <div class="col-sm-10">
										  <input type="text" required="" class="form-control"  name="college_url" id="college_url" value="" placeholder="Enter College Code">
										  </div>
										</div>

										
										<!--<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label">College Logo</label>
										  <div class="col-sm-10">
										  <input type="file" required="" class="form-control"  name="logo" id="logo" value="" placeholder="Enter College Code">
										  </div>
										</div>-->
										
										<div class="form-group">
										  <label for="exampleInputEmail1"  class="col-sm-2 control-label">College Deatil</label>
										  <div class="col-sm-10">
										  <input type="text" required="" class="form-control"  name="college_detail" id="college_detail" value="" placeholder="Enter College Deatil">
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
