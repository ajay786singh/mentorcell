<?php include('config.php');
if($_REQUEST['stream']){
	$streamcheck = $_REQUEST['stream'];
}else{
	$streamcheck = 37;
}
if($_REQUEST['course']){
	$coursecheck = $_REQUEST['course'];
}else{
	$coursecheck = 41;
}
//print_r($_REQUEST);
$echeck = $_REQUEST['excheck'];
$loccheck = $_REQUEST['loccheck'];
$feecheck = $_REQUEST['feecheck'];
$speccheck = $_REQUEST['speccheck'];
$recogcheck = $_REQUEST['recogcheck'];
$where[] = "(mc_course_assignment.stream_id = $streamcheck AND mc_course_assignment.course_id = $coursecheck AND mc_colleges.status != '0' AND mc_colleges.status != '1')";
if(!empty($echeck)){
	$where[] = "mc_course_assignment.exam LIKE '%$echeck%'";
}
if(!empty($loccheck)) {
	if(strstr($loccheck,',')) {
		$data1 = explode(',',$loccheck);
		$locationarray = array();
		foreach($data1 as $loc) {
			$locationarray[] =  "mc_colleges.city = '$loc'";
		
		}
		//$location = $locationarray;
			//$where[] = "mc_colleges.city = '$locationarray'";
$where[] = '('.implode(' OR ',$locationarray).')';
	} else {
		//$location = $loccheck;
		$where[] = "mc_colleges.city = '$loccheck'";
	}
	
}

//print_r($w);die;
if(!empty($feecheck)) {
	if(strstr($feecheck,',')) {
		$data2 = explode(',',$feecheck);
		$feearray = array();
		foreach($data2 as $fees) {
			$feearray[] =  $fees;
		}
		$fee = $feearray;
		if($fee[0]==99999 OR $fee[1]==99999 OR $fee[2]==99999 OR $fee[3]==99999 OR $fee[4]==99999 OR $fee[5]==99999){
		$where[] = " OR (mc_course_assignment.fee < '10000')";
	}
	
	if($fee[0]==200000 OR $fee[1]==200000 OR $fee[2]==200000 OR $fee[3]==200000 OR $fee[4]==200000 OR $fee[5]==200000){
		$where[] = " OR (mc_course_assignment.fee BETWEEN '100000' AND '200000')";
	}
	
	if($fee[0]==300000 OR $fee[1]==300000 OR $fee[2]==300000 OR $fee[3]==300000 OR $fee[4]==300000 OR $fee[5]==300000){
		$where[] = " OR (mc_course_assignment.fee BETWEEN '200000' AND '300000')";
	}
	
	if($fee[0]==50000 OR $fee[1]==50000 OR $fee[2]==50000 OR $fee[3]==50000 OR $fee[4]==50000 OR $fee[5]==50000){
		$where[] = " OR (mc_course_assignment.fee BETWEEN '300000' AND '500000')";
	}
	
	if($fee[0]==700000 OR $fee[1]==700000 OR $fee[2]==700000 OR $fee[3]==700000 OR $fee[4]==700000 OR $fee[5]==700000){
		$where[] = " OR (mc_course_assignment.fee BETWEEN '500000' AND '700000')";
	}
	
	if($fee[0]==1200000 OR $fee[1]==1200000 OR $fee[2]==1200000 OR $fee[3]==1200000 OR $fee[4]==1200000 OR $fee[5]==1200000){
		$where[] = " OR (mc_course_assignment.fee > '700000')";
	}
	} else {
		$fee = $feecheck;
		if($fee==99999){
		$where[] = "mc_course_assignment.fee < '10000'";
	}
	
	if($fee==200000){
		$where[] = "mc_course_assignment.fee BETWEEN '100000' AND '200000'";
	}
	
	if($fee==300000){
		$where[] = "mc_course_assignment.fee BETWEEN '200000' AND '300000'";
	}
	
	if($fee==50000){
		$where[] = "mc_course_assignment.fee BETWEEN '300000' AND '500000'";
	}
	
	if($fee==700000){
		$where[] = "mc_course_assignment.fee BETWEEN '500000' AND '700000'";
	}
	
	if($fee==1200000){
		$where[] = "mc_course_assignment.fee > '700000'";
	}
	}
	
	//$where .= "AND mc_course_assignment.fee LIKE '%$fee%'";
}

if(!empty($speccheck)) {
	if(strstr($speccheck,',')) {
		$data3 = explode(',',$speccheck);
		$specarray = array();
		foreach($data3 as $spec) {
			//$specarray[] =  $spec;
			$specarray[] = "mc_course_assignment.specialization_id LIKE '%$spec%'";
		}
		$where[] = '('.implode(' OR ',$specarray).')';
	} else {
		//$speclizetion = $speccheck;
		$where[] = "mc_course_assignment.specialization_id LIKE '%$speccheck%'";
	}
	
}


if(!empty($recogcheck)) {
	if(strstr($recogcheck,',')) {
		$data4 = explode(',',$recogcheck);
		$recogarray = array();
		foreach($data4 as $recog) {
			//$recogarray[] =  $recog;
			$recogarray[] = "mc_course_assignment.recognition LIKE '%$recog%'";
		}
			$where[] = '('.implode(' OR ',$recogarray).')';
	} else {
		//$recognizetion = $recogcheck;
		$where[] = "mc_course_assignment.recognition LIKE '%$recogcheck%'";
	}
	
}
$w = implode(' AND ',$where);
if(!empty($w))$w = 'WHERE '.$w;
	$sql = mysql_query("SELECT * FROM mc_colleges INNER JOIN mc_course_assignment ON mc_colleges.id = mc_course_assignment.college_id   ".$w." GROUP BY mc_course_assignment.college_id");
	$count = mysql_num_rows($sql);
?>
<section class="bgWhite">
<div class="row">
<div class="containerBox" style="padding: 0 0 20px;">
<div class="col-xs-6">
<div class="collegeSearchCount"><strong><?=$count;?></strong> Result Found</div>



<style>
     .collegeResultBox h2{
		 text-align:left;
		 font-size:18px;
	 }
	 .collegeResultBox{
		 border:none !important;
	 }
</style>




</div>
<div class="col-xs-6">
<div class="collegeSort pull-right">
<label>Sort by:</label>
<div class="customSelect">
<i class="icon-down"></i>
<select name="serchbysort" id="serchbysort">
<option value="">Select</option>
<option value="0">Lowest Fees First</option>
<option value="1">Highest Fees First</option>
</select>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="collegeResultBox">
<?php if($count>0){ ?>
<?php while($college = mysql_fetch_array($sql)){  ?>
		<div class="collegeTop">

		<div class="collegeThumb">
		<?php if(empty($college['logo'])){?>
			<img src="<?php echo $base_url.'assets/theme/images/thumbImg.jpg'?>" />
		<?php }else{ ?>
		<img src="<?php echo $base_url.'upload/'.$college['logo']; ?>" />	
		<?php } ?>
		
		</div>
		<div class="collegeName">
		<h3><a target="_blank" href="<?php echo $base_url."search?college=".$college['college_id']; ?>"><?php echo $college['name'];?></a></h3>
		<h4><?php echo $college['address']; ?></h4>
		</div>
		<div class="viewCollege"><a target="_blank" href="<?php echo $base_url."search?college=".$college['college_id']; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		
		<div class="col-xs-8">
		
		<?php 
		$cad1 = mysql_fetch_array(mysql_query("SELECT * FROM mc_courses WHERE course_id = '".$coursecheck."'"));
		$specdats = mysql_query("SELECT * FROM mc_course_assignment WHERE course_id = '".$coursecheck."' AND college_id = '".$college['college_id']."' GROUP BY specialization_id");
		$specdats_count = mysql_num_rows($specdats);
		$streamids = $streamcheck;
 ?>
		<h3><button class="accordion"><?=$cad1['course_name']?>(<?=$specdats_count?>)</button>
			<div class="panel" >
  <ul class="ulstyle">
  <?php  while($specialdada = mysql_fetch_array($specdats)){
	  $specid = $specialdada['specialization_id'];
$special_data = mysql_fetch_array(mysql_query("SELECT * FROM mc_specialization WHERE specialization_id = '".$specid."'"));

  ?>
 <li><a href="<?php echo $base_url."search?college=".$college['college_id']."&stream=".$streamids."&type=".$coursecheck."&course_main=".$specid; ?>"><?=$special_data['specialization_name'];?></a></li>
  <?php }  ?>
  </ul>
</div>
		<span>0 Reviews</span></h3>
		<h4><?php
		echo $college['duration']; ?>
					&bull; <?php echo $college['recognition']; ?></h4>
		<ul>
		
		<li><span>Total Fees(Rs.)</span> <?php echo $college['fee']; ?></li>
		<li><span>Exam required</span>  <?php if(!empty($college['exam'])){ $exam = explode(",",$college['exam']);
for($i=0;$i<count($exam);$i++){
$exam_detail = mysql_fetch_array(mysql_query("SELECT * FROM mc_exams WHERE id = '".$exam[$i]."'"));
	?>
			
		<p>
	 <span class="bulletPoint"></span>  
	 <a target="_blank" href="<?php echo $base_url?>index.php/exam/index/<?=$exam[$i]?>">
 <?php echo $exam_detail['exam_name']; ?>
 </a>

 </p>
<?php }
 } ?></li>
		</ul>

		

		</div>
		<div class="col-xs-4">
		<?php
		
		$images = mysql_query("SELECT * FROM mc_college_image WHERE college_id = '".$college['college_id']."' AND asset_type = 'image'");
		$videos = mysql_query("SELECT * FROM mc_college_image WHERE college_id = '".$college['college_id']."' AND asset_type = 'video'");
		?>
		<ol>
		<li><a target="_blank" href="<?php echo $base_url?>home/gallery"><i class="icon-play-circle"></i> Watch Counselling Video.</a></li>
		<li><a target="_blank" href="<?php echo $base_url."search?college=".$college['college_id']; ?>"><i class="icon-camera"></i> <?php echo count($images); ?> Photos and <?php echo count($videos); ?> Videos are available.</a></li>
		</ol>
		</div>
		</div>
		
		
		<!--morecoursedata start-->
		<div class="collegeMiddle" >
		<div class="toggle-title col-xs-12" style="margin-bottom: 15px;">
			<?php $more_course1 = mysql_query("SELECT * FROM mc_course_assignment WHERE college_id = '".$college['college_id']."' GROUP BY course_id"); 
$count_course = mysql_num_rows($more_course1);
$totalcount = $count_course-1;
if($totalcount > 0){ ?>
	<a class="moreCourses">+<?=$totalcount?> more courses</a>
<?php } ?>

		</div>
		<div class="col-xs-12 toggle-details">
		<?php 
		while($more_course = mysql_fetch_array($more_course1)){
			if($coursecheck != $more_course['course_id']){
		$morecoursedata = mysql_fetch_array(mysql_query("SELECT * FROM mc_courses WHERE course_id = '".$more_course['course_id']."'"));
		
		if(!empty($morecoursedata['course_name'])){
			$courid = $more_course['course_id'];
			$streamid = mysql_fetch_array(mysql_query("SELECT * FROM mc_courses WHERE course_id = '".$courid."'"));
$specialid = mysql_fetch_array(mysql_query("SELECT * FROM mc_course_assignment WHERE course_id = '".$courid."'")); ?>
<div class="col-xs-12" style="border-top: 1px solid #becad7;">
<?php $specdat = mysql_query("SELECT * FROM mc_course_assignment WHERE course_id = '".$courid."' AND college_id = '".$college['college_id']."' GROUP BY specialization_id"); ?>
<h3 style="margin: 9px 0px 5px 0px;"><button class="accordion1"><?=$morecoursedata['course_name']?>(<?=count($specdat)?>)</button>
		<div class="panel1" >
  <ul>
  <?php while($specialdada = mysql_fetch_array($specdat)){
$special_data = mysql_fetch_array(mysql_query("SELECT * FROM mc_specialization WHERE specialization_id = '".$specialdada['specialization_id']."'"));
$specid = $specialdada['specialization_id'];
  ?>
    <li><a href="<?php echo $base_url."search?college=".$college['college_id']."&stream=".$streamids."&type=".$cad1['course_id']."&course_main=".$specid; ?>"><?=$special_data['specialization_name'];?></a></li>
  <?php } ?>
  </ul>
</div><span>0 Reviews</span></h3>
<h4><?=$more_course['duration']?>	• </h4>
		
		
		<ul>
		<li><span>Total Fees(Rs.)</span> Rs. <?=$more_course['fee']?></li>
		<li class="catstyle" style="width:70%;">
		<span>Exam required</span>
		<?php if(!empty($more_course['exam'])){ $exams = explode(",",$more_course['exam']);
for($j=0;$j<count($exams);$j++){
	$exam_details = mysql_fetch_array(mysql_query("SELECT * FROM mc_exams WHERE id = '".$exams[$j]."'"));
?>
		<?php if($exam_details['exam_name']){ ?>	
		<p>
	 <span class="bulletPoint"></span>  
	  <a target="_blank" href="<?php echo $base_url?>index.php/exam/index/<?=$exam[$j]?>">
  <?php echo $exam_detail['exam_name']; ?>,
 </a>

 </p>
		<?php } }
 } ?>
		</li>
		</ul>

</div>
			
		<?php }
			}
		}
		?>
		
		   <div class="toggle-title show-less col-xs-12">
       <p>- Show Less</p>
		</div>
		</div>
     
        </div>
		<!--morecoursedata end-->

		<div class="collegeBottom">
		<ul>
		<li><a href="#" class="button1">Apply Online</a></li>
		<li><a href="#" class="button2"><i class="icon-star"></i> Shortlist</a></li>
		<li><a href="<?php if(!empty($college['brochure'])){ echo $base_url."upload/".$college['brochure'];} else{ ?> # <?php } ?>" <?php if(!empty($college['brochure'])){ ?> download <?php } ?> class="button3"><i class="icon-download"></i> Download Brochure</a></li>
		</ul>
		</div>
<?php } 
} else{ ?>
	<h2>Record Not Available.<h2>
<?php }
?>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		$(".toggle-title").click(function () {
		$(".toggle-details").hide();
		$(this).next(".toggle-details").show();
});
	</script>
	<style>
	.panel1 ul.ul-style {
    padding: 0 18px;
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
	}
	.panel ul li.style li{
		    border-left: none !important;
	}
	.panel ul{
		float:left;
	}
	.panel{
		    width: 57% !important;
			margin: 10px 0px;
    border-bottom: 1px solid #ccc;
	}
	
	.panel1 ul li{
		border-bottom:1px solid #ccc;
	}
	.panel1 ul li.style li{
		    border-left: none !important;
	}
	.panel1 ul{
		float:left;
	}
	
	.panel1{
		    width: 57% !important;
    border-bottom: 1px solid #ccc;
	}
	.panel ul li a {
    height: 27px;
    line-height: 27px;
    font-size: 13px;
    margin-left: -12px;
}

.panel1 ul li a {
    height: 27px;
    line-height: 27px;
    font-size: 13px;
    margin-left: -12px;
}
	button.accordion{
		background:#fff;
		cursor: pointer;
		padding: 4px 6px !important;
		font-size: 14px !important;
		border-radius: 3px !important;
		border: 1px solid #ccc !important;
	}
		.show-less{margin-top:15px; font-size: 12px;}
		.toggle-details {display:none;}
		
		button.accordion {
    cursor: pointer;
    padding: 18px;
   /* width: 100%;*/
    border: none;
    text-align: left;
    outline: none;
    font-size: 14px;
    transition: 0.4s;
	
    font-family: 'ubuntumedium';
	color: #666;
}

button.accordion1 {
    background:#fff;
    cursor: pointer;
    margin-bottom: 28px !important;
    text-align: left;
    outline: none;
    font-size: 13px;
    transition: 0.4s;
	
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
	width:100%;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
	border:none;
	
}

div.panel1 {
	width:100%;
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