<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeQuick">
	<?php
	$reviewcount = $this->college_model->get_review_databy_college($college->id);
	$worth_moneydata = $this->college_model->get_review_databy_collegedataworth_money($college->id,$courseid,$streamid);
	$campus_lifedata = $this->college_model->get_review_databy_collegedatacampus_life($college->id,$courseid,$streamid);
	$college_placmentdata = $this->college_model->get_review_databy_collegedatacollege_placment($college->id,$courseid,$streamid);
	$campus_facilitydata = $this->college_model->get_review_databy_collegedatacampus_facility($college->id,$courseid,$streamid);
	$facultydata = $this->college_model->get_review_databy_collegedatafaculty($college->id,$courseid,$streamid);
	$college_recomd = $this->college_model->get_review_databy_collegedatacollege_recomd($college->id,$courseid,$streamid);
	$countreview = $worth_moneydata+$campus_lifedata+$college_placmentdata+$campus_facilitydata+$facultydata;
	if(!empty($countreview)){
		$totalreview = $countreview/5;
	}else{
		$totalreview = 0;
	}
	
	?>
<h4><?php echo $college->address; ?><?php echo $college->city; ?>, <?php echo $college->state; ?><br/><?php echo $college->country; ?> <?php echo $college->pincode; ?> <span class="reviewRating"><b>(<?=$totalreview?>/5)</b> <?=$reviewcount?> Reviews</span></h4>
<h5><?php echo $college->name; ?> <!--<a href="#">view all courses</a>--></h5>
</div>
</div>



</div>
</div>
</div>
</section>
<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">


<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">


<div class="sectionGap">
<div class="heading1" id="information">Information</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="informationList">
<h3>EXAMS REQUIRED</h3>
 <?php if(!empty($college_detail->exam)){ $exam = explode(",",$college_detail->exam);
for($i=0;$i<count($exam);$i++){
	$exam_detail = $this->college_model->get_single_exam_detail($exam[$i]); ?>
			
		<p>
	 <span class="bulletPoint"></span>  
	 <a target="_blank" href="<?php echo base_url()?>index.php/exam/index/<?=$exam[$i]?>">
 <?php echo $exam_detail->exam_name; ?>
 </a>

 </p>
<?php }
 }
 ?>
</div>

<div class="informationList">
<h3>COURSE FEES</h3>
<?php  //echo "<pre>";
//print_r($fees);
 ?>
<p><?php if($college_detail OR !empty($college_detail->fee)){
		 echo $college_detail->fee;
 } ?></p>
</div>

<div class="informationList" id="eligibility">
<h3>AFFILIATION</h3>
<p>
 
 <?php if($college_detail OR !empty($college_detail->recognition)){
		 echo $college_detail->recognition;
 } ?></p>
</div>

<div class="informationList" id="course-details">
<h3>COURSE STATUS</h3>
<p><?php if($college_detail OR !empty($college_detail->course_status)){
		 echo $college_detail->course_status;
 } ?></p>
</div>
<?php //print_r($college); ?>
<div class="informationList">
<h3>ELIGIBILITY</h3>
<p><?php if($college_detail OR !empty($college_detail->eligibility)){
		 echo $college_detail->eligibility;
 } ?></p>
</div>


<div class="informationList" id="admissionProcedure">
<h3>ADMISSION PROCEDURE</h3>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For conveyer quota:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p><?php if($college_detail OR !empty($college_detail->conveyer_quota)){
		 echo $college_detail->conveyer_quota;
 } ?></p></div>
</div>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For management quota:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p><?php if($college_detail OR !empty($college_detail->management_quota)){
		 echo $college_detail->management_quota;
 } ?></p></div>
</div>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For international students:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p><?php if($college_detail OR !empty($college_detail->international_quota)){
		 echo $college_detail->international_quota;
 } ?></p></div>
</div>

</div>

<div class="informationList" id="duration">
<h3>DURATION</h3>
<p><?php if($college_detail OR !empty($college_detail->duration)){
		 echo $college_detail->duration;
 } ?></p>
</div>

</div>
</div>
<div class="sectionGap">
<div class="heading1" id="collegereviews">College Reviews</div>
<div class="collegeReviewTop">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
<span class="averageRating">Average Alumni Rating</span>
<span class="ratingBox green"><i class="icon-star-1"></i> <?=$totalreview;?></span>
<span class="recommendThis"><i class="icon-thumbs-up"></i> <?=$college_recomd;?> Students Recommend This Cource</span>
</div>



</div>
<?php if(!empty($recomd_data)){
foreach($recomd_data as $reviedata){
	?>
<div class="collegeReviewBox">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<span class="ratingName"><?=$reviedata['fname'];?> <?=$reviedata['lname'];?></span>
<span class="ratingClass"></span>
<?php
$tcount = $reviedata['worth_money']+$reviedata['campus_life']+$reviedata['college_placment']+$reviedata['campus_facility']+$reviedata['faculty'];
$treview = $tcount/5;
?>
<span class="ratingBox green"><i class="icon-star-1"></i> <?=$treview?></span>
<span class="recommendThis"><i class="icon-thumbs-up"></i> <?=$recomd_count;?> Students Recommend This Cource</span>
</div>
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
<h1 style="font-size: 20px;font-weight: bold;"><?=$reviedata['review_title'];?></h1>
<p><?=$reviedata['review_detail'];?></p>
</div>

<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
<ul>
<li>
<span class="ratingLabel">Worth the money</span>
<span class="ratingstars">
 <?php if($reviedata['worth_money']==0){ ?>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i>
<?php  }else if($reviedata['worth_money']==1){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['worth_money']==2){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['worth_money']==3){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['worth_money']==4){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['worth_money']==5){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i><?php } ?>

</span>
</li>

<li>
<span class="ratingLabel">College and campus life</span>
<span class="ratingstars">
 <?php if($reviedata['campus_life']==0){ ?>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i>
<?php  }else if($reviedata['campus_life']==1){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_life']==2){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_life']==3){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_life']==4){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_life']==5){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i><?php } ?>
</span>
</li>

<li>
<span class="ratingLabel">College placements</span>
<span class="ratingstars">
<?php if($reviedata['college_placment']==0){ ?>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i>
<?php  }else if($reviedata['college_placment']==1){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['college_placment']==2){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['college_placment']==3){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['college_placment']==4){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['college_placment']==5){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i><?php } ?>
</span>
</li>

<li>
<span class="ratingLabel">Campus Facilities</span>
<span class="ratingstars">
 <?php if($reviedata['campus_facility']==0){ ?>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i>
<?php  }else if($reviedata['campus_facility']==1){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_facility']==2){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_facility']==3){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_facility']==4){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['campus_facility']==5){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i><?php } ?>
</span>
</li>

<li>
<span class="ratingLabel">Faculty</span>
<span class="ratingstars">
 <?php if($reviedata['faculty']==0){ ?>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i>
<?php  }else if($reviedata['faculty']==1){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['faculty']==2){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['faculty']==3){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['faculty']==4){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 "></i>
<i class="icon-star-1"></i><?php }else if($reviedata['faculty']==5){ ?>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i><?php } ?>
</span>
</li>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>
</div>


</div>
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeSidenav">
<ul>
<li><a href="#information">Information</a></li>
<li><a href="#course-details">Course Status</a></li>
<li><a href="#eligibility">Eligibility</a></li>
<li><a href="#admissionProcedure">Admission Procedure</a></li>
<li><a href="#duration">Duration</a></li>
<li><a href="#collegereviews">College Reviews</a></li>
</ul>

<a href="<?php if(!empty($college->brochure)){ echo base_url()."upload/".$college->brochure;} else{ ?> # <?php } ?>" <?php if(!empty($college->brochure)){ ?> download <?php } ?>  class="downloadBro"><i class="icon-download"></i> Download Brochure</a>

<!--<a href="#" class="askQuestion">Ask question to college</a>-->

</div>
</div>

</div>
</div>
</div>
</section>
<style>
	.review-form input{width: 100%; padding: 10px; border: solid 1px #ccc; }			input, button, select, textarea{		width:100%;		height:32px;	}		div.stars {  width: 270px;  display: inline-block;}input.star { display: none; }label.star {  float: right;  padding: 10px;  font-size: 27px;  color: #444;  transition: all .2s;  margin-left: -11px;}input.star:checked ~ label.star:before {  content: '\f005';  color: #FD4;  transition: all .25s;}input.star-5:checked ~ label.star:before {  color: #FE7;  text-shadow: 0 0 20px #952;}input.star-1:checked ~ label.star:before { color: #F62; }label.star:hover { transform: rotate(-15deg) scale(1.3); }label.star:before {  content: '\f006';  font-family: FontAwesome;}		label{   font-weight:bold;		}.col-md-8 {    border: 1px solid #b8b8b8;    border-radius: 6px;	border-bottom:none;}.heading1{	background:none;}button{width: 100%;    height: 32px;    margin-top: 10px;	background:#f77a52;	border:none;	border-radius:6px;}button:hover{	background:#000;	border-radius:6px;	border:none;	color:#fff;}
</style>