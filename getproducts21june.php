<?php include('config.php');
$echeck = $_REQUEST['excheck'];
$loccheck = $_REQUEST['loccheck'];
$feecheck = $_REQUEST['feecheck'];
$speccheck = $_REQUEST['speccheck'];
$recogcheck = $_REQUEST['recogcheck'];
$where[] = "(mc_colleges.status != '0' AND mc_colleges.status != '1')";
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
	//echo "SELECT * FROM mc_colleges INNER JOIN mc_course_assignment ON mc_colleges.id = mc_course_assignment.college_id  ".$w." GROUP BY mc_course_assignment.college_id";
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
		<h3><?php echo $college['name'];?></h3>
		<h4><?php echo $college['address']; ?></h4>
		</div>
		<div class="viewCollege"><a target="_blank" href="<?php echo $base_url."search?college=".$college['college_id']; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		
		<div class="col-xs-8">
		
		<?php 
		$cad1 = mysql_fetch_array(mysql_query("SELECT * FROM mc_courses WHERE stream_id = '".$college['stream_id']."'"));
 ?>
		<h3><?php  echo $cad1['course_name'] ?><span>0 Reviews</span></h3>
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

		<a href="#" class="moreCourses">+12 more courses</a>

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