<link href="<?php echo base_url('assets/theme/css/jquery.mCustomScrollbar.css');?>" rel="stylesheet" type="text/css" media="all" />
<?php
$cad = $this->college_model->get_course_data($coursename);

?>
<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeSearch">
<form>
<input type="text" name="" value="<?=$cad->course_name;?>" placeholder="">
<input type="submit" name="" value="Search">
</form>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeNav">
<ul>
<li><a href="#" class="active">College</a></li>
<!--<li><a href="#">Specialization</a></li>
<li><a href="#">Course</a></li>-->
</ul>
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
<div class="col-xs-6">
<div class="collegeSearchCount"><strong><?=$count_res;?></strong> result for <strong>"<?=$cad->course_name;?>"</strong></div>
</div>
<div class="col-xs-6">
<div class="collegeSort pull-right">
<label>Sort by:</label>
<div class="customSelect">
<i class="icon-down"></i>
<select>
<option>Lowest Fees First</option>
<option>Highest Fees First</option>
</select>
</div>
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
<!--college filter start-->
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeFilter">
<h3>Filters</h3>
<?php $exam_data = $this->college_model->get_exam_data($cad->stream_id);
 if(!empty($exam_data)){?>
<div class="collegeFilterBox">
<h4>Exam Accepted <span><i class="icon-cw"></i> <!--Reset--></span></h4>
<div class="filterItems">
<ul>
<?php foreach($exam_data as $examsearch){ ?>
<li><input type="checkbox" name="check1<?=$examsearch['id']?>" id="check1<?=$examsearch['id']?>"> <label for="check1<?=$examsearch['id']?>"><?=$examsearch['exam_name']?></label></li>
<?php } ?>
</ul>

</div>
</div>
 <?php } ?>
 <?php $collage_id = $this->college_model->get_collageid($cad->course_id);
 if(!empty($collage_id)){?>
<div class="collegeFilterBox">
<h4>Location <span><i class="icon-cw"></i> Reset</span></h4>
<!--<div class="locationSearch">
<form>
<input type="text" name="">
<input type="submit" name="" value="">
</form>
</div>-->
<div class="filterItems">

<ul>
<?php foreach($collage_id as $collageid){
$location_id = $this->college_model->get_location($collageid['college_id']);
$city_name = $this->college_model->get_city_name($location_id[0]['city']);

	?>
<li><input type="checkbox" name="check19<?=$collageid['college_id']?>" id="check19<?=$collageid['college_id']?>"> <label for="check19<?=$collageid['college_id']?>"><?=$city_name->name;?></label></li>
<?php } ?>
</ul>

</div>
</div>
 <?php } ?>
 <?php $feedata = $this->college_model->get_feedata($cad->course_id);
 if(!empty($feedata)){?>
<div class="collegeFilterBox">
<h4>Total Fee(in Rs.) <span><i class="icon-cw"></i> Reset</span></h4>
<div class="filterItems">
<ul>
<?php foreach($feedata as $fee_data){ ?>
<li><input type="checkbox" name="check25<?=$fee_data['assigned_id'];?>" id="check25<?=$fee_data['assigned_id'];?>"> <label for="check25<?=$fee_data['assigned_id'];?>"><?=$fee_data['fee'];?></label></li>
 <?php } ?>
</ul>

</div>
</div>
 <?php } ?>
  <?php $spealata = $this->college_model->get_specialata($cad->course_id);
 if(!empty($spealata)){?>
<div class="collegeFilterBox">
<h4>Specialization <span><i class="icon-cw"></i> Reset</span></h4>
<div class="filterItems">

<ul>
<?php  foreach($spealata as $spealdata){ ?>
<li><input type="checkbox" name="" id="check31"> <label for="check31"><?=$spealdata['specialization_name'];?></label></li>
<?php } ?>
</ul>
</div>
</div>
 <?php } ?>
 
 
 
  <?php $recogniata = $this->college_model->get_recognize($cad->course_id);
 if(!empty($recogniata)){?>
<div class="collegeFilterBox">
<h4>Recognition <span><i class="icon-cw"></i> Reset</span></h4>
<div class="filterItems">
<ul>
<?php  foreach($recogniata as $recogdata){ ?>
<li><input type="checkbox" name="" id="check31"> <label for="check31"><?=$recogdata['recognition'];?></label></li>
<?php } ?>
</ul>
</div>
</div>
 <?php } ?>
 
</div>
</div>
<!--college filter close-->

<!--college result panel start-->
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
<!--loop box start-->


<?php foreach($colleges as $college){ 
//echo "<pre>";
//print_r($college);
?>
		<div class="collegeResultBox">
		<div class="collegeTop">
		<div class="collegeThumb"><img src="<?php echo base_url('upload/'.$college->logo); ?>" /></div>
		<div class="collegeName">
		<h3><?php echo $college->name; echo $college->college_id;?></h3>
		<h4><?php echo $college->address; ?></h4>
		</div>
		<div class="viewCollege"><a href="<?php echo base_url()."search?college=".$college->college_id; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		<div class="col-xs-8">
		<?php $cad1 = $this->college_model->get_course_data($college->course_id);
 ?>
		<h3><?=$cad1->course_name;?><span>0 Reviews</span></h3>
		<h4><?php
		echo $college->duration; ?>
					&bull; <?php echo $college->recognition; ?></h4>
		<ul>
		<li><span>Total Fees(Rs.)</span> <?php echo $college->fee; ?></li>
		<li><span>Exam required</span> <?php echo $college->exam; ?></li>
		</ul>

		<a href="#" class="moreCourses">+12 more courses</a>

		</div>
		<div class="col-xs-4">
		<ol>
		<li><a href="#"><i class="icon-play-circle"></i> Watch Counselling Video.</a></li>
		<li><a href="#"><i class="icon-camera"></i> 16 photos and videos are available.</a></li>
		</ol>
		</div>
		</div>

		<div class="collegeBottom">
		<ul>
		<li><a href="#" class="button1">Apply Online</a></li>
		<li><a href="#" class="button2"><i class="icon-star"></i> Shortlist</a></li>
		<li><a href="#" class="button3"><i class="icon-download"></i> Download Brochure</a></li>
		</ul>
		</div>
			
		</div>
<?php } ?>
<!--loop box close-->


<!--<div class="pagination">
<ul>
<li><span class="active">1</span></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#">6</a></li>
<li><a href="#">7</a></li>
<li><a href="#">8</a></li>
<li><a href="#">9</a></li>
</ul>
</div>-->

</div>
<!--college result panel close-->


</div>
</div>
</div>
</section>