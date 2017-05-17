<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">

                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo 'View Review Detail'; ?></h3>
                                </div>
                                <div class="box-body">
 <?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_college')); ?>
                                        <div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">College Name</label>
										  <div class="col-sm-10">
										<?php $college_name = $this->common_model->get_single_var('name', 'mc_colleges', 'id', $review_list['college_name']); ?>
										  <input Disabled class="form-control" value="<?php echo $college_name; ?>">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Stream Name</label>
										  <div class="col-sm-10">
										  <?php
                      $stream_name = $this->common_model->get_single_var('stream_name', 'mc_streams', 'stream_id', $review_list['stream_name']); ?>
										  <input Disabled class="form-control" value="<?php echo $stream_name; ?>">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Course Name</label>
										  <div class="col-sm-10">
										  <?php
$course_name = $this->common_model->get_single_var('course_name', 'mc_courses', 'course_id', $review_list['course_name']); ?>
										 <input Disabled class="form-control" value="<?php echo $course_name; ?>">
										  </div>
										  </div>
									
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Review Title</label>
										  <div class="col-sm-10">
										  <input Disabled class="form-control" value="<?=$review_list['review_title']?>" >
										  </div>
										</div>
										
										
										<!--link-->
										<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
										
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Review Detail</label>
										  
										  <div class="col-sm-10">
										  
										  <input Disabled class="form-control" value="<?=$review_list['review_detail']?>" >
										  </div>
										  
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Worth The Money</label>
										  
										  <div class="col-sm-10">
										  <?php if($review_list['worth_money']==0){ ?>
											   <img src="<?php echo base_url('assets/theme/images/star-1.png')?>">
										<?php  }else if($review_list['worth_money']==1){ ?>
											<img src="<?php echo base_url('assets/theme/images/star-2.png')?>">
									<?php }else if($review_list['worth_money']==2){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-3.png')?>">
									<?php }else if($review_list['worth_money']==3){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-4.png')?>">
									<?php }else if($review_list['worth_money']==4){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-5.png')?>">
									<?php }else if($review_list['worth_money']==5){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-6.png')?>">
									<?php } ?>
										 
										 </div> 
										  
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Colleage And Campus Life</label>
										  <div class="col-sm-10">
										  <?php if($review_list['campus_life']==0){ ?>
											   <img src="<?php echo base_url('assets/theme/images/star-1.png')?>">
										<?php  }else if($review_list['campus_life']==1){ ?>
											<img src="<?php echo base_url('assets/theme/images/star-2.png')?>">
									<?php }else if($review_list['campus_life']==2){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-3.png')?>">
									<?php }else if($review_list['campus_life']==3){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-4.png')?>">
									<?php }else if($review_list['campus_life']==4){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-5.png')?>">
									<?php }else if($review_list['campus_life']==5){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-6.png')?>">
									<?php } ?>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Colleage Placements</label>
										  <div class="col-sm-10">
										  <?php if($review_list['college_placment']==0){ ?>
											   <img src="<?php echo base_url('assets/theme/images/star-1.png')?>">
										<?php  }else if($review_list['college_placment']==1){ ?>
											<img src="<?php echo base_url('assets/theme/images/star-2.png')?>">
									<?php }else if($review_list['college_placment']==2){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-3.png')?>">
									<?php }else if($review_list['college_placment']==3){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-4.png')?>">
									<?php }else if($review_list['college_placment']==4){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-5.png')?>">
									<?php }else if($review_list['college_placment']==5){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-6.png')?>">
									<?php } ?>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Campus Facilities</label>
										  <div class="col-sm-10">
										  <?php if($review_list['campus_facility']==0){ ?>
											   <img src="<?php echo base_url('assets/theme/images/star-1.png')?>">
										<?php  }else if($review_list['campus_facility']==1){ ?>
											<img src="<?php echo base_url('assets/theme/images/star-2.png')?>">
									<?php }else if($review_list['campus_facility']==2){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-3.png')?>">
									<?php }else if($review_list['campus_facility']==3){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-4.png')?>">
									<?php }else if($review_list['campus_facility']==4){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-5.png')?>">
									<?php }else if($review_list['campus_facility']==5){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-6.png')?>">
									<?php } ?>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Faculty</label>
										  <div class="col-sm-10">
										    <?php if($review_list['faculty']==0){ ?>
											   <img src="<?php echo base_url('assets/theme/images/star-1.png')?>">
										<?php  }else if($review_list['faculty']==1){ ?>
											<img src="<?php echo base_url('assets/theme/images/star-2.png')?>">
									<?php }else if($review_list['faculty']==2){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-3.png')?>">
									<?php }else if($review_list['faculty']==3){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-4.png')?>">
									<?php }else if($review_list['faculty']==4){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-5.png')?>">
									<?php }else if($review_list['faculty']==5){ ?>
										<img src="<?php echo base_url('assets/theme/images/star-6.png')?>">
									<?php } ?>
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Would you recommend others to take admission in your college?</label>
										  <div class="col-sm-10">
										  <input Disabled class="form-control" value="<?=$review_list['college_recomd']?>" >
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">First Name</label>
										  <div class="col-sm-10">
										  <input Disabled class="form-control" value="<?=$review_list['fname']?>" >
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Last Name</label>
										  <div class="col-sm-10">
										  <input Disabled class="form-control" value="<?=$review_list['lname']?>" >
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="exampleInputEmail1" class="col-sm-2 control-label">Email</label>
										  <div class="col-sm-10">
										  <input Disabled class="form-control" value="<?=$review_list['email']?>" >
										  </div>
										</div>
                                       
										 <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
