<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Shortlist<span> Colleges</span></div>
<?php 
$shortlistdata = $this->common_model->get_all_rows("tbl_shortlist","userid",$user_login['id']);
	foreach($shortlistdata as $shortlist){
$college = $this->common_model->get_single_row("mc_colleges","id",$shortlist['collegeid']);
?>

<div class="teamRow">
<div class="teamPic"><img src="<?php echo base_url('upload/'.$college['logo']); ?>"></div>
<div class="teamDetail">
<a target="_blank" href="<?php echo base_url()."search?college=".$college['id']; ?>" ><h3><?=$college['name'];?></h3></a>
<h4><?php echo $college['address']; ?><?php echo $college['city']; ?>, <?php echo $college['state']; ?>,<?php echo $college['country']; ?> <?php echo $college['pincode']; ?></h4>

<div class="collegeMiddle">
		<div class="col-xs-8">
		<?php
		$courseassign_data = $this->common_model->get_course_row($shortlist['course_id'],$shortlist['collegeid']); 		
		?>
		<?php $cad1 = $this->college_model->get_course_data($shortlist['course_id']);
 ?>
		<p>Course: <a target="" href="<?php echo base_url();?>home/search?course=<?=$shortlist['course_id']?>"><?php  echo $cad1->course_name ?></a> |<span>Title: <?=$courseassign_data->title;?></span></p>
		<p>Duration: <?php echo $cad1->course_duration; ?></p>
		
		<p>Total Fees(Rs.):  <?php echo $courseassign_data->fee; ?></p>
		
		<p><span>Recognition: <?=$courseassign_data->recognition;?></span></p>
		<p>Exam required:  <?php if(!empty($courseassign_data->exam)){ $exam = explode(",",$courseassign_data->exam);
for($i=0;$i<count($exam);$i++){
	$exam_detail = $this->college_model->get_single_exam_detail($exam[$i]); 
	if($exam_detail->exam_name!='null'){
	?>
			
	 <a target="_blank" href="<?php echo base_url()?>index.php/exam/index/<?=$exam[$i]?>">
 <?php echo $exam_detail->exam_name; ?>,
 </a>

 
	<?php } }
 } ?>|<span>Course Status: <?=$courseassign_data->course_status;?></span></p>

		<p><span>Eligibility: <?=$courseassign_data->eligibility;?></span></p>

		</div>
		
		</div>
</div>
</div>
 <?php
}
 ?>
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




