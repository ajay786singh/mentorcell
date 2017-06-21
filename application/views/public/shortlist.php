<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><h3>Shortlist<span> Colleges</span></h3></div>


<div class="col-xs-12">
<!--loop box start-->
<?php $shortlistdata = $this->common_model->get_all_rows("tbl_shortlist","userid",$user_login['id']);

 foreach($shortlistdata as $shortlist){ 
 $college = $this->common_model->get_single_row("mc_colleges","id",$shortlist['collegeid']);
?>
		<div class="collegeResultBox">
		<div class="collegeTop">
		<div class="collegeThumb"><img src="<?php echo base_url('upload/'.$college['logo']); ?>" /></div>
		<div class="collegeName">
		<h3><a target="_blank" href="<?php echo base_url()."search?college=".$college['id']; ?>"><?php echo $college['name'];?></a></h3>
		<h4><?php echo $college['address']; ?></h4>
		</div>
		<div class="viewCollege"><a target="_blank" href="<?php echo base_url()."search?college=".$college['id']; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		<div class="col-xs-8">
		<?php
              $courseassign_data = $this->common_model->get_course_row($shortlist['course_id'],$shortlist['collegeid']); 	
		$cad1 = $this->college_model->get_course_data($shortlist['course_id']);
 ?>
		<h3>Course: &nbsp;<a target="" href="<?php echo base_url();?>home/search?course=<?=$shortlist['course_id']?>"><?php  echo $cad1->course_name ?></a>|Course Status: <?php echo $courseassign_data->course_status; ?>|<span>0 Reviews</span></h3>
		<h4><?php
		echo $cad1->course_duration; ?>
					&bull; <?php echo $courseassign_data->recognition; ?></h4>
		<ul>
		<li><span>Total Fees(Rs.)</span> Rs.  <?php echo $courseassign_data->fee; ?></li>
		<li class="catstyle" style="width:70%;"><span>Exam required</span>  <?php if(!empty($courseassign_data->exam)){ $exam = explode(",",$courseassign_data->exam);
for($i=0;$i<count($exam);$i++){
	$exam_detail = $this->college_model->get_single_exam_detail($exam[$i]); ?>
			
		<p>
	 <span class="bulletPoint"></span>  
	 <a target="_blank" href="<?php echo base_url()?>index.php/exam/index/<?=$exam[$i]?>">
 <?php echo $exam_detail->exam_name; ?>,
 </a>

 </p>
<?php }
 } ?></li>
		</ul>
<?php $more_course = $this->common_model->get_more_course($shortlist['collegeid']);
$count_course = count($more_course);
if($count_course > 0){ ?>
	<a href="<?php echo base_url()?>index.php/home/more_course?id=<?=$shortlist['collegeid']?>" class="moreCourses">+<?=$count_course?> more courses</a>
<?php }
 ?>
		

		</div>
		<div class="col-xs-4">
		<?php
		$images = $this->college_model->get_images($shortlist['collegeid']);
		$videos = $this->college_model->get_videos($shortlist['collegeid']);
		?>
		<ol>
		<li><a target="_blank" href="<?php echo base_url()?>home/gallery"><i class="icon-play-circle"></i> Watch Counselling Video.</a></li>
		<li><a target="_blank" href="<?php echo base_url()."search?college=".$shortlist['collegeid']; ?>"><i class="icon-camera"></i> <?php echo count($images); ?> photos and <?php echo count($videos); ?> videos are available.</a></li>
		</ol>
		</div>
		</div>

		<div class="collegeBottom">
		<ul>
		 <?php if(!isset($user_login['id']) && ((int)$user_login['id'])<0){ ?>
		<li><a href="#" data-toggle="modal" data-target="#registerModal" class="button1">Apply Online</a></li>
		 <?php } ?>
		<li><a href="<?php if(!empty($college->brochure)){ echo base_url()."upload/".$college->brochure;} else{ ?> # <?php } ?>" <?php if(!empty($college->brochure)){ ?> download <?php } ?> class="button3"><i class="icon-download"></i> Download Brochure</a></li>
		
		</ul>
		</div>
			
		</div>
<?php } ?>

</div>


</div>
</div>
</div>

</section>
<style>
.sectionHeading h3 {
    font-size: 18px;
    font-weight: 600;
}
</style>




