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
                                    <h3 class="box-title"><?php echo lang('users_create_user'); ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
                                        <div class="form-group">
                                            <?php echo lang('users_firstname', 'first_name', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($first_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_lastname', 'last_name', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($last_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_college', 'company', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php //echo form_input($company);?>
												<select  class="form-control basic-multiple"  name="college_id[]" id="college_id" multiple="multiple">
												  <?php foreach($college_lists as $college){
																	  echo '<option  value="'.$college['id'].'">'.$college['name'].'</option>';
												   } ?>
												</select>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="college_name" class="col-sm-2 control-label">College Name<br/> (if college not listed)</label>
                                            <div class="col-sm-10">
                                               <?php echo form_input($college_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_email', 'email', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($email);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_phone', 'phone', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($phone);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_password', 'password', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password);?>
                                                <div class="progress" style="margin:0">
                                                    <div class="pwstrength_viewport_progress"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password_confirm);?>
                                            </div>
                                        </div>
										
										<?php if ($this->ion_auth->is_admin()): ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><?php echo lang('users_member_of_groups');?></label>
                                            <div class="col-sm-10">
											<?php foreach ($groups as $group):?>
											<?php
												$gID     = $group['id'];
												$checked = NULL;
												$item    = NULL;
											?>
										<div class="checkbox">
										<label>
										<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>">
										<?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
										</label>
										</div>
										<?php endforeach?>
										</div>
										</div>
										<?php endif ?>
										
										
										
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
