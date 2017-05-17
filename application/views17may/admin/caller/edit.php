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
                                    <h3 class="box-title"><?php echo 'Edit Caller Detail'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_caller')); ?>
										
                                       
										
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Caller Name</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="name" id="name" value="<?php echo @$name['value']; ?>" placeholder="Enter Name">
										  </div>
										</div>
										
										 <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Caller Phone</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="phone" id="name" value="<?php echo @$phone['value']; ?>" placeholder="Enter phone">
										  </div>
										</div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <?php echo form_hidden('id', $id);?>
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
