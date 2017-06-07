<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<?php $more_course = $this->common_model->get_more_course($college_id); 
$college_location_eng2 = $this->common_model->get_single_row("mc_colleges","id",$college_id);
?>
<div class="sectionHeading">More<span> Courses</span></div>
<a target="_blank" href="<?php echo base_url()."search?college=".$college_id; ?>" ><h3><?=$college_location_eng2['name'];?></h3></a>
<?php 
	foreach($more_course as $shortlist){
$course_detail = $this->common_model->get_single_row("mc_courses","course_id",$shortlist['course_id']);
$stream_detail = $this->common_model->get_single_row("mc_streams","stream_id",$course_detail['stream_id']);
 if($course_detail){
 ?>

<div class="teamRow">
<div class="teamDetail">
<ul>
<li><strong>Stream Name:</strong> <?=$stream_detail['stream_name']?></li>
<li><strong>Course Name:</strong> <?=$course_detail['course_name']?></li>
<li><strong>Course Duration:</strong> <?=$course_detail['course_duration']?></li>
</ul>
</div>
</div>
 <?php } } ?>
</div>
</div>
</div>

<style>
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




