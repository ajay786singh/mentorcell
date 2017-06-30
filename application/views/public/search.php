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

button.accordion{
		background:#fff;
		cursor: pointer;
		padding: 4px 6px !important;
		font-size: 14px !important;
		border-radius: 3px !important;
		border: 1px solid #ccc !important;
	}
	panel ul li a {
    height: 27px;
    line-height: 27px;
    font-size: 13px;
    margin-left: -12px;
}
.panel ul {
    float: left;
}
study_abroad?course=41:90
ul.ulstyle {
    width: 100%;
    padding: 0px 15px;
}
.panel1 ul.ul-style {
    padding: 0 18px;
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
<?php $course_list = $this->college_model->get_all_courses1();?>
<select class="auto-choice" data-placeholder="Choose a Course" data-placeholder="Choose a Course"  id="course" name="course">
<!--<select  id="course" name="course">-->
<?php foreach($course_list as $couselist){ 
$cadname = $this->college_model->get_course_data($couselist['course_id']);
if($cadname->course_name){
?>
	<option <?php if($couselist['course_id']==$coursename){echo 'selected'; } ?> value="<?=$couselist['course_id']?>"><?=$cadname->course_name?></option>
<?php } } ?>

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
.panel{
	    width: 62%;
    margin-top: 10px;
}
ul.ul-style li{
		width:100%;
		border-left: none !important;
		    border-bottom: 1px solid #ccc;
			    background: #fff;
	}
	.panel ul li{
		border-bottom:1px solid #ccc;
		    border-left: none !important;
			    width: 100%;
	}
	.panel ul li.style li{
		    border-left: none !important;
	}
.panel ul li {
    border-bottom: 1px solid #ccc;
    border-left: none !important;
}
study_abroad?course=41:88
.panel ul li {
    width: 100%;
    margin-bottom: 6px;
}
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
<input type="hidden" id="checkstream" value="<?=$cad->stream_id;?>">
<input type="hidden" id="coursecheck" value="<?=$coursename?>">
<?php 
$exams_data = $this->college_model->get_exam_detail($coursename);
 if(!empty($exams_data)){?>
<div class="collegeFilterBox">
<h4>Exam Accepted <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">	

<ul>

 <?php

 foreach($exams_data as $examsearch){ 
if($examsearch['exam']!=0){
	if(strstr($examsearch['exam'],',')) {
	$examname = explode(',',$examsearch['exam']);
	$a=array("a"=>$examname);
	}else{
		$a=array("a"=>$examsearch['exam']);
	}
}else{
	$a=0;
}
}
if($a!=0){
$examnames = array_unique($a);
foreach($examnames as $examname){
	for($i=0;$i<count($examname);$i++){
			$ename = $this->college_model->get_exam_name($examname[$i]);
				if(!empty($ename)){
?>
<li><input type="checkbox" name="examcheck" value="<?=$ename->id;?>" id="check1<?=$ename->id?>"> <label for="check1<?=$ename->id?>"><?=$ename->exam_name?></label></li>
		<?php 
 }
	}
} }


 ?>
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
<?php  
 foreach($recogniata as $recogdata){ 
 ?>
<li><input type="checkbox" name="recogncheck" value="<?=$recogdata['recognition'];?>" id="check5<?=$recogdata['recognition'];?>"> <label for="check5<?=$recogdata['recognition'];?>"><?=$recogdata['recognition'];?></label></li>

 <?php  
 } 

 ?>
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
	
		<?php $specdats = $this->common_model->get_all_coursespecialization($college->course_id,$college->college_id);
		$cad1 = $this->college_model->get_course_data($college->course_id);
              $streamids = $this->common_model->get_single_row('mc_courses','course_id',$college->course_id);
              $specialids = $this->common_model->get_single_row('mc_course_assignment','course_id',$college->course_id); ?>
		
		
		<h3><button class="accordion"><?=$cad->course_name?>(<?=count($specdats)?>)</button>
		<div class="panel" >
  <ul class="ulstyle">
  <?php foreach($specdats as $specialdada){
$special_data = $this->common_model->get_single_row('mc_specialization','specialization_id',$specialdada['specialization_id']);
$specid = $specialdada['specialization_id'];
  ?>
    <li><a href="<?php echo base_url()."search?college=".$college->college_id."&stream=".$streamids['stream_id']."&type=".$college->course_id."&course_main=".$specid; ?>"><?=$special_data['specialization_name'];?></a></li>
  <?php } ?>
  </ul>
</div><span>0 Reviews</span></h3>
		<h4><?php
		echo $college->duration; ?>
					&bull; <?php echo $college->recognition; ?></h4>
		<ul>
		<?php $maxfee = $this->common_model->get_max_fee($college->college_id,$cad->course_id);
	 $minfee = $this->common_model->get_min_fee($college->college_id,$cad->course_id);
	 if($maxfee==$minfee){ ?>
		 <li><span>Total Fees(Rs.)</span> Rs.  <?php echo $maxfee->fee; ?> </li>
	<?php }else{ ?>
		 <li><span>Total Fees(Rs.)</span> Rs.  <?php echo $maxfee->fee; ?> <b>To</b> <?php echo $minfee->fee; ?></li>
	<?php }
		?>
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
$totalcount = $count_course-1;

if($totalcount > 0){ ?>
	<a class="moreCourses">+<?=$totalcount?> more courses</a>
<?php }
 ?>

		</div>
		<div class="col-xs-12 toggle-details">
		<?php for($i=0; $i<=$totalcount;$i++) {
			if($college->course_id != $more_course[$i]['course_id']){
			?>
			<?php
			$morecoursedata = $this->college_model->get_course_data($more_course[$i]['course_id']);
			
			?>
			<?php if(!empty($morecoursedata->course_name)){
$courid = $more_course[$i]['course_id'];
$streamid = $this->common_model->get_single_row('mc_courses','course_id',$courid);
$specialid = $this->common_model->get_single_row('mc_course_assignment','course_id',$courid);

?>
			<div class="col-xs-12" style="border-top: 1px solid #becad7;">
			<?php $specdat = $this->common_model->get_all_coursespecialization($courid,$college->college_id); ?>
		<h3 style="margin: 9px 0px 5px 0px;"><button class="accordion1"><?=$morecoursedata->course_name?>(<?=count($specdat)?>)</button>
		<div class="panel1" >
  <ul>
  <?php foreach($specdat as $specialdada){
$special_data = $this->common_model->get_single_row('mc_specialization','specialization_id',$specialdada['specialization_id']);
$specid = $specialdada['specialization_id'];
  ?>
    <li><a href="<?php echo base_url()."search?college=".$college->college_id."&stream=".$streamids['stream_id']."&type=".$college->course_id."&course_main=".$specid; ?>"><?=$special_data['specialization_name'];?></a></li>
  <?php } ?>
  </ul>
</div><span>0 Reviews</span></h3>
		<h4> <?=$more_course[$i]['duration']?>	• </h4>
		<ul>
		<?php $maxfeem = $this->common_model->get_max_fee($college->college_id,$more_course[$i]['course_id']);
	 $minfeem = $this->common_model->get_min_fee($college->college_id,$more_course[$i]['course_id']);
	
		 if($maxfeem==$minfeem){ ?>
		 <li><span>Total Fees(Rs.)</span> Rs.  <?php echo $maxfeem->fee; ?> </li>
	<?php }else{ ?>
		 <li><span>Total Fees(Rs.)</span> Rs.  <?php echo $maxfeem->fee; ?> <b>To</b> <?php echo $minfeem->fee; ?></li>
	<?php }
		?>
		<li class="catstyle" style="width:70%;">
		<span>Exam required</span>
		<?php if(!empty($more_course[$i]['exam'])){ $exams = explode(",",$more_course[$i]['exam']);
for($j=0;$j<count($exams);$j++){
	$exam_details = $this->college_model->get_single_exam_detail($exams[$j]); ?>
		<?php if($exam_details->exam_name){ ?>	
		<p>
	 <span class="bulletPoint"></span>  
	 <a target="_blank" href="<?php echo base_url()?>index.php/exam/index/<?=$exams[$j]?>">
 <?php echo $exam_details->exam_name; ?>,
 </a>

 </p>
		<?php } }
 } ?>
		</li>
		</ul>
		</div>
<?php }  } } ?>
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
	div.panel{
	width: 62% !important;
	line-height: 27px;
	}
	div.panel1{
	width: 62% !important;
	}
	.panel1 ul li{
		    border-left: none !important;
			width: 100%;
	}
	button.accordion1 {
    background: #fff;
    cursor: pointer;
    margin-bottom: 28px !important;
    text-align: left;
    outline: none;
    font-size: 13px;
    transition: 0.4s;
}
.panel1 ul li a {
    height: 27px;
    line-height: 27px;
    font-size: 13px;
    margin-left: -12px;
}
.panel1 ul li {
    border-bottom: 1px solid #ccc;
}
.panel1 ul.ul-style {
    padding: 0 18px;
}
study_abroad?course=41:119
.panel1 ul {
    float: left;
}
button.accordion1 {
    background: #fff;
    cursor: pointer;
    padding: 4px 6px !important;
    font-size: 14px !important;
    border-radius: 3px !important;
    border: 1px solid #ccc !important;
}
	
	
	
		.show-less{margin-top:15px; font-size: 12px;}
		.toggle-details {display:none;}
		
		button.accordion {
    background:#fff;
    cursor: pointer;
    padding: 18px;
   /* width: 100%;*/
    border: none;
    text-align: left;
    outline: none;
    font-size: 14px;
    transition: 0.4s;
	border-bottom: 1px solid #eae9e9 !important;
    font-family: 'ubuntumedium';
	color: rgba(0,0,0,0.87);
}

button.accordion1 {
    background:#fff;
    cursor: pointer;
    padding: 18px;
   /* width: 100%;*/
    border: none;
    text-align: left;
    outline: none;
    font-size: 14px;
    transition: 0.4s;
	border-bottom: 1px solid #eae9e9 !important;
    font-family: 'ubuntumedium';
	color: rgba(0,0,0,0.87);
}



button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion1:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

button.accordion1.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
	border:none;
	
}
div.panel1 {
        padding: 0 18px 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
	border:none;
	
}
	</style>
</div>
</div>
</div>
</div>
</section>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = "1000px";
      panel.style.width = "277px";
    } 
  }
}

var acc1 = document.getElementsByClassName("accordion1");
var j;

for (j = 0; j < acc1.length; j++) {
  acc1[j].onclick = function() {
    this.classList.toggle("active");
    var panel1 = this.nextElementSibling;
    if (panel1.style.maxHeight){
      panel1.style.maxHeight = null;
    } else {
      panel1.style.maxHeight = "1000px";
      panel1.style.width = "277px";
    } 
  }
}
</script>
