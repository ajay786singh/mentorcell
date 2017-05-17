
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
						<h3 class="box-title"><?php echo 'Add Global Coupon Minimum and Maximum Values'; ?></h3>
					</div>
					<div class="box-body">
						<?php 
							echo '<font color="green">'.$this->session->flashdata('message').'</font>';
							echo '<font color="red">'.$this->session->flashdata('error_message').'</font>';				
							echo '<font color="red">'.validation_errors().'</font>';				
							if(!empty($error)){
								echo '<font color="red">'.$error.'</font>';
							}
	
						?>

						<?php echo form_open_multipart(current_url(), array('method'=>'post', 'class' => 'form-horizontal', 'answer_id' => 'form-create_stream'));
						?>
						
						<div class="form-group">
							<label for="exampleInputEmail1" class="col-sm-2 control-label">Minimum Value</label>
							<div class="col-sm-5">	
							<input type="text" class="form-control" name="min" value="<?php echo $min;?>" placeholder="Enter Minimum Global Value">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1" class="col-sm-2 control-label">Maximum Value</label>
							<div class="col-sm-5">	
							<input type="text" class="form-control" name="max" value="<?php echo $max;?>" placeholder="Enter Maximum Global Value">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
									<?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
									<?php echo anchor('admin/coupons', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
