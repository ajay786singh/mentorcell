<?php session_start();
 include('config.php');
$sort = $_REQUEST['sort'];
if($sort == 0){
	$sql = mysql_query("SELECT * FROM mc_colleges INNER JOIN mc_course_assignment ON mc_colleges.id = mc_course_assignment.college_id WHERE mc_colleges.status = '2' GROUP BY mc_course_assignment.college_id ORDER BY mc_course_assignment.fee ASC");
}else if($sort == 1){
	$sql = mysql_query("SELECT * FROM mc_colleges INNER JOIN mc_course_assignment ON mc_colleges.id = mc_course_assignment.college_id WHERE mc_colleges.status = '2' GROUP BY mc_course_assignment.college_id ORDER BY mc_course_assignment.fee DESC");
}	
	$count = mysql_num_rows($sql);
?>
<section class="bgWhite">
<div class="row">
<div class="containerBox" style="padding: 0 0 20px;">
<div class="col-xs-6">
<div class="collegeSearchCount"><strong><?=$count;?></strong> Result Found</div>

</div>
<div class="col-xs-6">
<div class="collegeSort pull-right">
<label>Sort by:</label>
<div class="customSelect">
<i class="icon-down"></i>
<select name="serchbysort" id="serchbysort">
<option value="">Select</option>
<option <?php if($sort==0){echo 'selected';} ?> value="0">Lowest Fees First</option>
<option <?php if($sort==1){echo 'selected';} ?> value="1">Highest Fees First</option>
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