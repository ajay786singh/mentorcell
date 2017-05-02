<?php include('layout/header.php') ?>

            <div class="login-logo">
                <a href="#"><b>Student Register</b></a>
            </div>

			<div class="box-body">
				<?php echo $message;?>

				<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First Name</label>
						<?php //echo lang('users_firstname', 'first_name', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10">
							<?php echo form_input($first_name);?>
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last Name</label>
						<?php //echo lang('users_lastname', 'last_name', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10">
							<?php echo form_input($last_name);?>
						</div>
					</div>
					<div class="form-group">
						<?php //echo lang('users_company', 'company', array('class' => 'col-sm-2 control-label')); ?>
						<label for="company" class="col-sm-2 control-label">Company</label>
						<div class="col-sm-10">
							<?php echo form_input($company);?>
						</div>
					</div>
					<div class="form-group">
						<?php //echo lang('users_email', 'email', array('class' => 'col-sm-2 control-label')); ?>
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<?php echo form_input($email);?>
						</div>
					</div>
					<div class="form-group">
						<?php //echo lang('users_phone', 'phone', array('class' => 'col-sm-2 control-label')); ?>
						<label for="phone" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10">
							<?php echo form_input($phone);?>
						</div>
					</div>
					<div class="form-group">
						<?php //echo lang('users_password', 'password', array('class' => 'col-sm-2 control-label')); ?>
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<?php echo form_input($password);?>
							<div class="progress" style="margin:0">
								<div class="pwstrength_viewport_progress"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<?php //echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
						<label for="password_confirm" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<?php echo form_input($password_confirm);?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="btn-group">
								<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => 'Sign Up')); ?>
								<?php //echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
								<?php //echo anchor('admin/users', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
<?php include('layout/footer.php') ?>