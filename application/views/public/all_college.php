<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><h3><?php if($streamid==37){ echo 'Management'; }else if($streamid==34){echo 'Engineering';} ?></br><span><?php if($type == 'popular'){echo '(Popular Colleges)';}else if($type == 'featured'){ echo '(Featured Colleges)';} ?></span><h3></div>
<?php
if($streamid==37){
	$course_id = '41';
}else if($streamid==34){
	$course_id = '70';
}
 $colleges = $this->college_model->populat_college_result($course_id);
if($type=='popular'){
	$types = 'popular_colleges';
}else if($type=='featured'){
	$types = 'featured_colleges';
}
 if($colleges){
	/* foreach($get_college_eng2 as $college_eng2){
 $eng_college_location2 = $this->common_model->get_all_main_course("mc_colleges","id",$college_eng2['college_id'],$types,"1");
foreach($eng_college_location2 as $college_location_eng2){ ?>

<div class="teamRow">
<div class="teamPic"><img src="<?php echo base_url('upload/'.$college_location_eng2['logo']); ?>"></div>
<div class="teamDetail">
<a target="_blank" href="<?php echo base_url()."search?college=".$college_eng2['college_id']; ?>" ><h3><?=$college_location_eng2['name'];?></h3></a>
<h4><?php echo $college_location_eng2['address']; ?><?php echo $college_location_eng2['city']; ?>, <?php echo $college_location_eng2['state']; ?>,<?php echo $college_location_eng2['country']; ?> <?php echo $college_location_eng2['pincode']; ?></h4>
<p><?=$college_location_eng2['description'];?></p>
</div>
</div>
 <?php
}
	 }*/
	 
	foreach($colleges as $college){ 
?>
		<div class="collegeResultBox">
		<div class="collegeTop">
		<div class="collegeThumb"><img src="<?php echo base_url('upload/'.$college->logo); ?>" /></div>
		<div class="collegeName">
		<h3><a target="_blank" href="<?php echo base_url()."search?college=".$college->college_id; ?>"><?php echo $college->name;?></a></h3>
		<h4><?php echo $college->address; ?></h4>
		</div>
		<div class="viewCollege"><a target="_blank" href="<?php echo base_url()."search?college=".$college->college_id; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		<div class="col-xs-8">
		<?php $cad1 = $this->college_model->get_course_data($college->course_id);
 ?>
		<h3><?php  echo $cad1->course_name ?><span>0 Reviews</span></h3>
		<h4><?php
		echo $college->duration; ?>
					&bull; <?php echo $college->recognition; ?></h4>
		<ul>
		<li><span>Total Fees(Rs.)</span> Rs.  <?php echo $college->fee; ?></li>
		<li class="catstyle" style="width:70%;"><span>Exam required</span>  <?php if(!empty($college->exam)){ $exam = explode(",",$college->exam);
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
<?php $more_course = $this->common_model->get_more_course($college->college_id);
$count_course = count($more_course);
if($count_course > 0){ ?>
	<a href="<?php echo base_url()?>index.php/home/more_course?id=<?=$college->college_id?>" class="moreCourses">+<?=$count_course?> more courses</a>
<?php }
 ?>
		

		</div>
		<div class="col-xs-4">
		<?php
		$images = $this->college_model->get_images($college->id);
		$videos = $this->college_model->get_videos($college->id);
		?>
		<ol>
		<li><a target="_blank" href="<?php echo base_url()?>home/gallery"><i class="icon-play-circle"></i> Watch Counselling Video.</a></li>
		<li><a target="_blank" href="<?php echo base_url()."search?college=".$college->college_id; ?>"><i class="icon-camera"></i> <?php echo count($images); ?> photos and <?php echo count($videos); ?> videos are available.</a></li>
		</ol>
		</div>
		</div>

		<div class="collegeBottom">
		<ul>
		 <?php if(!isset($user_login['id']) && ((int)$user_login['id'])<0){ ?>
		<li><a href="#" data-toggle="modal" data-target="#registerModal" class="button1">Apply Online</a></li>
		 <?php } ?>
		<li>
		 <?php if(isset($user_login['id']) && ((int)$user_login['id'])>0){ ?> 
		 <input type="hidden" name="shortdata" id="shortdata" value="<?=$college->college_id;?>">
		 <input type="hidden" name="courseid" id="courseid" value="<?=$college->course_id;?>">
		 <input type="hidden" name="userids" id="userids" value="<?=$user_login['id'];?>">
		<a  class="button2 shortlist" style="cursor:pointer;" id="<?=$college->college_id;?>"><i class="icon-star"></i> Shortlist</a>
		 <?php }else{ ?>
			 <a data-toggle="modal" data-target="#loginModal" onClick="document.getElementById('couponClicked').value=0" class="button2"><i class="icon-star"></i> Shortlist</a>
		 <?php } ?>
		</li>
		<li><a href="<?php if(!empty($college->brochure)){ echo base_url()."upload/".$college->brochure;} else{ ?> # <?php } ?>" <?php if(!empty($college->brochure)){ ?> download <?php } ?> class="button3"><i class="icon-download"></i> Download Brochure</a></li>
		</ul>
		</div>
			
		</div>
<?php } 
 } ?>
</div>
</div>
</div>

<style>
.sectionHeading h3 {
    font-size: 18px;
    font-weight: 600;
    
}
  .teamRow .teamPic {
    
    height: auto !important;
     border:none !important;
    border-radius:0px !important;
}
.teamRow .teamPic img {
	border-radius:0px !important;
}
</style>
</section>




