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
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="stream_name" id="stream_name" value="<?php echo @$stream_name['value']; ?>" placeholder="Enter Stream Name i.e. science & engineering">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream Code</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="stream_code" id="stream_code" value="<?php echo @$stream_code['value']; ?>" placeholder="Enter Stream Code or same as name">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream Description</label>
										  <div class="col-sm-10">
										  <textarea class="form-control"  name="stream_description" placeholder="Enter Stream Description"><?php echo @$stream_description['value']; ?></textarea>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream Logo</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="stream_logo" id="stream_logo" value="" placeholder="Add Stream Logo">
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
                                                <?php echo form_hidden('id', $streams['stream_id']);?>
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
