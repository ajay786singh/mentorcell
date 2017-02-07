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
                                    <h3 class="box-title"><?php echo 'Add Answers and chose radio button to select a correct answers'; ?></h3>
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

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'answer_id' => 'form-create_stream'));
									$k=0;
									if($answer_list) {
										foreach($answer_list as $j => $val) {
											$k =$j+1;
											$required	=	"";
											$checked	=	"";
											if($val['correct'] == 1) {
												$required	=	"required=''";
												$checked	=	"checked";
											}
											?>
												<div class="form-group">
												  <label for="exampleInputEmail1" class="col-sm-2 control-label">Answer <?php echo $k?> <input type='radio' name='correct' value='<?php echo $k?>' <?php echo $checked;?>></label>
												  <div class="col-sm-10">										  
												  <input type="text" class="form-control" <?php echo $required?> name="answer<?php echo $k?>" answer_id="answer" value="<?php echo $val['answer']; ?>" placeholder="Enter Answer">
												  <input type='hidden' name='answer_id<?php echo $k?>' value='<?php echo $val['answer_id']?>'>
												  </div>
												</div>
											<?php
										}
									} 
									for($i=$k+1;$i<=5;$i++) {
										$required	=	"";
										$checked	=	"";
										if($i == 1) {
											$required	=	"required=''";
											$checked	=	"checked";
										}
									?>
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Answer <?php echo $i?> <input type='radio' name='correct' value='<?php echo $i?>' <?php echo $checked;?>></label>
										  <div class="col-sm-10">										  
										  <input type="text" class="form-control" <?php echo $required?> name="answer<?php echo $i?>" answer_id="answer" value="<?php echo @$answer['value']; ?>" placeholder="Enter Answer">
										  </div>
										</div>
									<?php
									}									
									?>
									
									
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<div class="btn-group">
												<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
												<?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
												<?php echo anchor('admin/questionnaire', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
											</div>
										</div>
									</div>
									<input type='hidden' name='question_id' value="<?php echo $question_id;?>">
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
