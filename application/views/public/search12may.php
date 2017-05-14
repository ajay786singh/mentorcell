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
<?php $exam_data = $this->college_model->get_sexam_data($cad->stream_id);
 if(!empty($exam_data)){?>
<div class="collegeFilterBox">
<h4>Exam Accepted <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">
<ul>
<?php foreach($exam_data as $examsearch){ ?>
<li><input type="checkbox" name="examcheck" value="<?=$examsearch['id']?>" id="check1<?=$examsearch['id']?>"> <label for="check1<?=$examsearch['id']?>"><?=$examsearch['exam_name']?></label></li>
<?php } ?>
</ul>

</div>

</div>
 <?php } ?>
 <?php
 $collage_id = $this->college_model->get_all_location();
 if(!empty($collage_id)){?>
<div class="collegeFilterBox">
<h4>Location <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">

<ul>
<?php foreach($collage_id as $collageid){ ?>
<li><input type="checkbox" name="locationcheck" value="<?=$collageid['id']; ?>" id="check2<?=$collageid['id']; ?>"> <label for="check2<?=$collageid['id'];?>"><?=$collageid['name'];?></label></li>
<?php } ?>
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
<li><input type="checkbox" name="feecheck" id="check3f1" value="< 1 Lakh"> <label for="check3f1"> < 1 Lakh</label></li>
<li><input type="checkbox" name="feecheck" id="check3f2" value="< 1 Lakh"> <label for="check3f2"> 1 - 2 Lakh</label></li>
<li><input type="checkbox" name="feecheck" id="check3f3" value="< 1 Lakh"> <label for="check3f3"> 2 - 3 Lakh</label></li>
<li><input type="checkbox" name="feecheck" id="check3f4" value="< 1 Lakh"> <label for="check3f4"> 3 - 5 Lakh</label></li>
<li><input type="checkbox" name="feecheck" id="check3f5" value="< 1 Lakh"> <label for="check3f5"> 5 - 7 Lakh</label></li>
<li><input type="checkbox" name="feecheck" id="check3f6" value="< 1 Lakh"> <label for="check3f6"> > 7 Lakh</label></li>
</ul>

</div>
</div>
 <?php } ?>
  <?php $spealata = $this->college_model->get_specialata($cad->course_id);
 if(!empty($spealata)){?>
<div class="collegeFilterBox">
<h4>Specialization <span><!--<i class="icon-cw"></i> Reset--></span></h4>
<div class="filterItems">

<ul>
<?php  foreach($spealata as $spealdata){ ?>
<li><input type="checkbox" name="specialcheck" value="<?=$spealdata['specialization_id'];?>" id="check4<?=$spealdata['specialization_id'];?>"> <label for="check4<?=$spealdata['specialization_id'];?>"><?=$spealdata['specialization_name'];?></label></li>
<?php } ?>
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


<?php foreach($colleges as $college){ 
?>
		<div class="collegeResultBox">
		<div class="collegeTop">
		<div class="collegeThumb"><img src="<?php echo base_url('upload/'.$college->logo); ?>" /></div>
		<div class="collegeName">
		<h3><?php echo $college->name;?></h3>
		<h4><?php echo $college->address; ?></h4>
		</div>
		<div class="viewCollege"><a target="_blank" href="<?php echo base_url()."search?college=".$college->college_id; ?>">View College</a></div>
		</div>

		<div class="collegeMiddle">
		<div class="col-xs-8">
		<?php $cad1 = $this->college_model->get_course_data($college->course_id);
 ?>
		<h3><?php  echo $cad->course_name ?><span>(0 Reviews)</span></h3>
		<h4><?php
		echo $college->duration; ?>
					&bull; <?php echo $college->recognition; ?></h4>
		<ul>
		<li><span>Total Fees(Rs.)</span> <?php echo $college->fee; ?></li>
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

		<!--<a href="#" class="moreCourses">+12 more courses</a>-->

		</div>
		<div class="col-xs-4">
		<?php
		$images = $this->college_model->get_images($college->id);
		$videos = $this->college_model->get_videos($college->id);
		?>
		<ol>
		<li><a target="_blank" href="<?php echo base_url()?>home/gallery"><i class="icon-play-circle"></i> Watch Counselling Video.</a></li>
		<li><a target="_blank" href="<?php echo base_url()."search?college=".$college->college_id; ?>"><i class="icon-camera"></i> <?php echo count($images); ?> photos and <?php echo count($videos); ?> are available.</a></li>
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
<div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
  <p><?php //echo $links; ?></p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/theme/js/productfilter.js"></script>

</div>
<!--college result panel close-->
<style>
	
.collegeResultBox .collegeMiddle h4 {
    font-size: 13px;
    margin: 0px 0px 15px 0px;
    color: rgba(0,0,0,0.54) !important;
}	
	
.collegeResultBox .collegeMiddle h3 span {
    display: inline-block;
    color:#f77a52;
    padding: 0px 0px 0px 5px;
    font-size: 12px;
}	
	
li .catstyle p{
	display:inline-block !important;
	margin:30px;
}
	
	.collegeResultBox .collegeMiddle ul li span {
    display: block;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    color: #555;
}
	li.catstyle a {
    font-size: 12px;
	color: #000;
    font-weight: 500;
}

.collegeResultBox .collegeTop .collegeName h3{
	font-family: 'Open Sans', sans-serif !important;
	font-size: 14px;
    font-weight: 600;
    color: #4c4c4c;
}
.collegeResultBox .collegeTop .collegeName h4{
	font-size:12px;
	color:#999999;
	font-family: 'Open Sans', sans-serif !important;
	line-height:14px;
}
.collegeResultBox .collegeTop .viewCollege a:active{
	text-decoration:none !important;
	color:#fff;
}
.collegeResultBox .collegeMiddle ol li a {
    color: #555 !important;
}
.collegeResultBox .collegeMiddle ol li a:hover{
	color: #f77a52 !important;
	font-family: 'Open Sans', sans-serif !important;
}

.collegeResultBox .collegeBottom ul li a.button2 {
    background: #303a47;
    border-radius: 5px;
    border: 1px solid rgba(0,0,0,0.15);
    color: #fff;
}
.pagination {
    padding: 10px;
    text-align: right;
}

.pagination strong {
    background: #000;
    color: #fff;
    padding: 2px 7px;
    border-radius: 50%;
}

.pagination a {
  	color: #000;
	padding: 5px;
}		
	
.collegeResultBox .collegeBottom ul li a.button2{background:#fff; color: rgba(0,0,0,0.54);}		

.collegeResultBox .collegeBottom ul li a.button3{background:#ffffd4; color: rgba(0,0,0,0.54);}			
	
.collegeResultBox .collegeMiddle ol li a {
    color: #3757ab;
}
	
.collegeResultBox .collegeMiddle ol li a:hover {
     color: #000; 
}



</style>

</div>
</div>
</div>
</section>