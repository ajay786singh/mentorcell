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
                                    <h3 class="box-title"><?php echo 'Update Counseling Video'; ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php //echo $message;?>

                                    <?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-update_counseling_video'));
									?>
									
									
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Counseling Title</label>
										  <div class="col-sm-10">
										  <input type="text" class="form-control" required="" name="title" id="title" value="<?php echo $counceling_video1['title']; ?>" placeholder="title">
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Counseling Video</label>
										  <div class="col-sm-10">
										  <input type="file" class="form-control"  name="video" id="video" value="" placeholder="Add Stream Logo">
										   <?php if(!empty($counceling_video1['video'])){?>
											  <video width="320" height="240" controls>
    <source src="<?php echo base_url()."upload/".$counceling_video1['video']?>">
</video>
										 <?php }  ?>
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Status</label>
										  <div class="col-sm-10">
										  <select name="status">
										  <option value="1" <?php if($counceling_video1['status']==1){echo "selected";} ?>>Active</option>
										  <option value="0" <?php if($counceling_video1['status']==0){echo "selected";} ?>>De-active</option>
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
