
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
							<label for="exampleInputEmail1" class="col-sm-2 control-label">Select Course</label>
							<div class="col-sm-5">	
								<select id="search_course" name="course_id">
								<option value="">Choose a Course to apply coupon</option>
									<?php
										if($courses) {
											foreach($courses as $course){
												$sel = '';
												if($course_id	==	$course['course_id']) {
													$sel = 'selected';
												}
												echo '<option value="'.$course['course_id'].'" '.$sel.'>'.$course['course_name'].'</option>';			
											}
										}
									?>	
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1" class="col-sm-2 control-label">Enter Coupon</label>
							<div class="col-sm-5">	
							<input type="text" class="form-control" name="coupon" value="<?php echo $coupon;?>" placeholder="Enter Coupon">
							</div>
						</div>
						
						<?php
						$submitText	=	"Enquiry";
						if(isset($course_fee)) {
							$submitText	=	"Redeem Now";
							echo "<input type='hidden' name='redeem_submitted' value='1'>";
						?>
						<div class="form-group">
							<div class="col-sm-2">	</div>
							<div class="col-sm-10">	
								<?php
									echo "<strong>Course Actual Fee:</strong> ".$course_fee;
									echo "<input type='hidden' name='course_fee' value='$course_fee'>";
									echo "<br>";
									echo "<strong>Discount given after coupon applied: </strong>".$total_disc;
									echo "<input type='hidden' name='total_disc' value='$total_disc'>";
									echo "<br>";
									echo "<strong>Revised fee after discount: </strong>".$total_disc_fee;
									echo "<input type='hidden' name='total_disc_fee' value='$total_disc_fee'>";
								?>
							</div>
						</div>
						<?php
						}
						?>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="btn-group">
									<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => $submitText)); ?>
									<?php
									if(!isset($course_fee)) {
										echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); 
										echo anchor('admin/coupons/redeem', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); 
									}
									?>
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
