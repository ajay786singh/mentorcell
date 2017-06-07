<link href="<?php echo base_url('assets/theme/css/jquery.mCustomScrollbar.css');?>" rel="stylesheet" type="text/css" media="all" />



<style>
 .chosen-container-single .chosen-single span{
	 color:#333;
 }
 .collegeSort .customSelect select{
	 color:#333;
 }
 a {
    color: #333;
}
</style>

<?php
$cad = $this->college_model->get_course_data($coursename);
?>
<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeSearch">
<form action="search">
<?php $course_list = $this->college_model->get_all_courses();?>
<select class="auto-choice" data-placeholder="Choose a Course" data-placeholder="Choose a Course"  id="course" name="course">
<!--<select  id="course" name="course">-->
<?php foreach($course_list as $couselist){ ?>
	<option <?php if($couselist['course_id']==$coursename){echo 'selected'; } ?> value="<?=$couselist['course_id']?>"><?=$couselist['course_name']?></option>
<?php } ?>

</select>
<!--<input type="text" id="cname" value="<?=$cad->course_name;?>" placeholder="">-->
<button class="go">Search</button>
</form>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeNav">
<ul>
<li><a href="#" class="active">College</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<style>

button.go {
   position: relative;
   left: -1px;
   top: 0px;
   color:#fff;
   width: 108px;
   height: 40px;
   background: #f77a52;;
   border:none;
}

.chosen-container-single .chosen-single span {
display: block;
overflow: hidden;
margin-right: 26px;
text-overflow: ellipsis;
white-space: nowrap;
line-height: 40px !important;
border: 1px solid #a4a9b5;
height: 40px;
width: 100%;
padding: 0px 10px;
margin:3px;
}
.chosen-container.chosen-with-drop .chosen-drop{
left:11px !important;
width:97%;
top:44px;
}
#course {
    width: 450px;
    height: 40px;
}
.chosen-container .chosen-results{
  width:100%;
}
</style>
<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<!--college filter start-->
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeFilter">
<h3>Filters</h3>
<?php 
//$exam_data = $this->college_model->get_sexam_data($cad->stream_id);
$exams_data = $this->college_model->get_exam_detail($coursename);
//print_r($exams_data);
 if(!empty($exams_data)){?>
<div class="collegeFilterBox">
<h4>Exam Accepted <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">
<ul>
<?php foreach($exams_data as $examsearch){ 
if($examsearch['exam']!=0){
	$examname = explode(',',$examsearch['exam']);
	for($i=0;$i<count($examname);$i++){
		$ename = $this->college_model->get_exam_name($examname[$i]);
		if($ename!='null'){
?>
<li><input type="checkbox" name="examcheck" value="<?=$ename->id;?>" id="check1<?=$ename->id?>"> <label for="check1<?=$ename->id?>"><?=$ename->exam_name?></label></li>
		<?php } } } } ?>
</ul>

</div>

</div>
 <?php } ?>
  <?php $collage_id = $this->college_model->get_collageid($cad->course_id);
 if(!empty($collage_id)){?>
<div class="collegeFilterBox">
<h4>Location <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">

<ul>
<li>
<?php foreach($collage_id as $collageid){
$location_id = $this->college_model->get_location($collageid['college_id']);
if(!empty($location_id[0]['city'])){
$city_name = $this->college_model->get_city_name($location_id[0]['city']);

	?>
<li><input type="checkbox" name="locationcheck" value="<?=$city_name->id; ?>" id="check2<?=$collageid['college_id']?>"> <label for="check2<?=$collageid['college_id']?>"><?=$city_name->name;?></label></li>
<?php } } ?>
</ul>

</div>
</div>
<?php } ?>
 <?php $feedata = $this->college_model->get_feedata($cad->course_id);
 if(!empty($feedata)){?>
<div class="collegeFilterBox">
<h4>Total Fee(in Rs.) <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">
<ul>
<li><input type="radio" name="feecheck" id="check3f1" value="99999"> <label for="check3f1"> < 1 Lakh</label></li>
<li><input type="radio" name="feecheck" id="check3f2" value="200000"> <label for="check3f2"> 1 - 2 Lakh</label></li>
<li><input type="radio" name="feecheck" id="check3f3" value="300000"> <label for="check3f3"> 2 - 3 Lakh</label></li>
<li><input type="radio" name="feecheck" id="check3f4" value="50000"> <label for="check3f4"> 3 - 5 Lakh</label></li>
<li><input type="radio" name="feecheck" id="check3f5" value="700000"> <label for="check3f5"> 5 - 7 Lakh</label></li>
<li><input type="radio" name="feecheck" id="check3f6" value="1200000"> <label for="check3f6"> > 7 Lakh</label></li>
</ul>

</div>
</div>
 <?php } ?>
  <?php $spealata = $this->college_model->get_specialatabycourse($cad->course_id);
 if(!empty($spealata)){?>
<div class="collegeFilterBox">
<h4>Specialization <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">
<ul>
<?php  foreach($spealata as $spealdata){
$spes_name = $this->college_model->get_streamname_byid($spealdata['specialization_id']);
if($spealdata['specialization_id']){	?>
<li><input type="checkbox" name="specialcheck" value="<?=$spealdata['specialization_id'];?>" id="check4<?=$spealdata['specialization_id'];?>"> <label for="check4<?=$spealdata['specialization_id'];?>"><?=$spes_name->specialization_name;?></label></li>
<?php } } ?>
</ul>
</div>
</div>
 <?php } ?>
 
 
 
  <?php $recogniata = $this->college_model->get_recognize($cad->course_id);
 if(!empty($recogniata)){?>
<div class="collegeFilterBox">
<h4>Recognition <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">
<ul>
<?php  foreach($recogniata as $recogdata){ ?>
<li><input type="checkbox" name="recogncheck" value="<?=$recogdata['recognition'];?>" id="check5<?=$recogdata['recognition'];?>"> <label for="check5<?=$recogdata['recognition'];?>"><?=$recogdata['recognition'];?></label></li>
<?php } ?>
</ul>
</div>
</div>
 <?php } ?>
 
</div>
</div>
<!--college filter close-->
 <div class="loader"></div>
<!--college result panel start-->
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" id="results">
<!--loop box start-->
<section class="bgWhite">
<div class="row">
<div class="containerBox" style="padding: 0 0 20px;">
<div class="col-xs-6">
<div class="collegeSearchCount"><strong><?=$count_res;?></strong> result for <strong>"<?=$cad->course_name;?>"</strong></div>

</div>
<div class="col-xs-6">
<div class="collegeSort pull-right">
<label>Sort by:</label>
<div class="customSelect">
<i class="icon-down"></i>
<select name="serchbysort" id="serchbysort">
<option value="0">Lowest Fees First</option>
<option value="1">Highest Fees First</option>
</select>
</div>
</div>
</div>
</div>
</div>
</section>


<?php foreach($colleges as $college){ 
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
		<h3><?php  echo $cad->course_name ?><span>0 Reviews</span></h3>
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
		<div class="collegeMiddle" >
		<div class="toggle-title col-xs-12" style="margin-bottom: 15px;">
			<?php $more_course = $this->common_model->get_more_course($college->college_id);
$count_course = count($more_course);
if($count_course > 0){ ?>
	<a class="moreCourses">+<?=$count_course?> more courses</a>
<?php }
 ?>

		</div>
		<div class="col-xs-12 toggle-details">
		<h3>MBA<span>0 Reviews</span></h3>
		<h4> 2 years	• </h4>
		<ul>
		<li><span>Total Fees(Rs.)</span> Rs. 500000</li>
		<li class="catstyle" style="width:70%;">
		<span>Exam required</span>
		<p><span class="bulletPoint"></span>
		<a target="_blank" href="http://ec2-35-154-102-247.ap-south-1.compute.amazonaws.com/index.php/exam/index/1"> CAT, </a></p>
		<p><span class="bulletPoint"></span>
		<a target="_blank" href="http://ec2-35-154-102-247.ap-south-1.compute.amazonaws.com/index.php/exam/index/3"> MAT, </a></p>
		<p><span class="bulletPoint"></span>
		<a target="_blank" href="http://ec2-35-154-102-247.ap-south-1.compute.amazonaws.com/index.php/exam/index/11"> XAT, </a></p>
		</li>
		</ul>
		   <div class="toggle-title show-less col-xs-12">
       <p>- Show Less</p>
		</div>
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
<?php } ?>
<div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/theme/js/productfilter.js"></script>
<script>
$(document).ready(function(){
	$("#serchbysort").change(function(){
		var serchbysort = $("#serchbysort").val();
		 $.ajax({
			type: "POST",
			url: base_url+"getproductsort.php",
			data: {sort: serchbysort}, 
			cache: false,
			beforeSend: function() {
				$("#results").html('');
              $('.loader').html('<img src="'+base_url+'assets/theme/images/bx_loader.gif" alt="" width="50" style="margin: 10% 0% 0% 30%;" >');
              },
			success: function(html){
				$("#results").html(html);
                $('.loader').html('');
             }
			});
	});
});
</script>
<script>
$(document).ready(function(){
	$('.shortlist').click(function(){
		var ID = $(this).attr('id');
		var colegid = $("#" + ID).siblings("input[name=shortdata]").val();
			var userids = $("#" + ID).siblings("input[name=userids]").val();
			var courseid = $("#" + ID).siblings("input[name=courseid]").val();
		 $.ajax({
			type: "POST",
			url: base_url+"shortlist.php",
			data: {sort: colegid,userids: userids,courseid: courseid}, 
			cache: false,
			beforeSend: function() {
              $('.loader').html('<img src="'+base_url+'assets/theme/images/bx_loader.gif" alt="" width="50" style="margin: 10% 0% 0% 30%;" >');
              },
			success: function(html){
				alert(html);
                $('.loader').html('');
             }
			});
	});
	
});
</script>
<script>
		$(".toggle-title").click(function () {
		$(".toggle-details").hide();
		$(this).next(".toggle-details").show();
});
	</script>
	<style>
		.show-less{margin-top:15px; font-size: 12px;}
		.toggle-details {display:none;}
	</style>
</div>
</div>
</div>
</div>
</section>
