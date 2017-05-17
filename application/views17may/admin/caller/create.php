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
                                    <h3 class="box-title"><?php echo 'Add New Caller'; ?></h3>
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

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-Caller'));
									
									?>
									
						
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
