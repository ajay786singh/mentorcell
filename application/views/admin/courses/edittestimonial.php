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
                                    <h3 class="box-title"><?php echo 'Add New Testimonial'; ?></h3>
                                </div>
                                <div class="box-body">
                                      <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_stream'));
									
									?>
									
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">User Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" value="<?php echo $testimonial_data['username']; ?>" name="username" id="username" placeholder="Enter User Name">
										  </div>
										</div>
										
										   <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">User Image</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="image" id="image">
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Title</label>
										  <div class="col-sm-10">
										  <input type="text" value="<?php echo $testimonial_data['title']; ?>" class="form-control" required="" name="title" id="title"  placeholder="EnterTestimonial Title">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Description</label>
										  <div class="col-sm-10">
										  <textarea name="description" id="description"><?php echo $testimonial_data['description']; ?></textarea>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Status</label>
										  <div class="col-sm-10">
										  <select name="status">
										  <option value="1" <?php if($testimonial_data['status']==1){echo "selected";} ?>>Active</option>
										  <option value="0" <?php if($testimonial_data['status']==0){echo "selected";} ?>>De-active</option>
										  </select>
										  </div>
										</div>
										
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
											 <?php echo form_hidden('id', $testimonial_data['id']);?>
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
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
