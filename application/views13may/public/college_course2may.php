<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeQuick">
<h4><?php echo $college->address; ?><?php echo $college->city; ?>, <?php echo $college->state; ?><br/><?php echo $college->country; ?> <?php echo $college->pincode; ?> <span class="reviewRating"><b>(4.5/5)</b> 37 Reviews</span></h4>
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
<p> <?php foreach($exams_name as $exam_name){ ?><span class="bulletPoint"></span>  <a href="#"><?php echo $exam_name['exam_name'];?></a><?php } ?></p>
</div>

<div class="informationList">
<h3>COURSE FEES</h3>
<p><?php if($fees){
		 echo $fees->fee;
 } ?></p>
</div>

<div class="informationList" id="eligibility">
<h3>AFFILIATION</h3>
<p><?php if($fees){ echo $fees->recognition; } ?></p>
</div>

<div class="informationList" id="course-details">
<h3>COURSE STATUS</h3>
<p>Affiliated to Visvesvaraya Technological University (Indian University) Eligibility</p>
</div>
<?php //print_r($college); ?>
<div class="informationList">
<h3>ELIGIBILITY</h3>
<p><?php if($fees){ echo $fees->eligibility; } ?></p>
</div>


<div class="informationList" id="admissionProcedure">
<h3>ADMISSION PROCEDURE</h3>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For conveyer quota:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div>
</div>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For management quota:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div>
</div>

<div class="addmisionProcedure">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">For international students:</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div>
</div>

</div>

<div class="informationList" id="duration">
<h3>DURATION</h3>
<p><?php if($fees){ echo $fees->duration; } ?></p>
</div>

</div>
</div>
<div class="sectionGap">
<div class="heading1" id="collegereviews">College Reviews</div>
<div class="collegeReviewTop">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
<span class="averageRating">Average Alumni Rating</span>
<span class="ratingBox green"><i class="icon-star-1"></i> 4.0</span>
<span class="recommendThis"><i class="icon-thumbs-up"></i> 6 Students Recommend This Cource</span>
</div>



</div>


<div class="collegeReviewBox">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<span class="ratingName">Sarfaraz Khan</span>
<span class="ratingClass">Class of 2016</span>
<span class="ratingBox green"><i class="icon-star-1"></i> 4.0</span>
<span class="recommendThis"><i class="icon-thumbs-up"></i> 6 Students Recommend This Cource</span>
</div>
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>

<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
<ul>
<li>
<span class="ratingLabel">Worth the money</span>
<span class="ratingstars">
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1"></i>
</span>
</li>

<li>
<span class="ratingLabel">College and campus life</span>
<span class="ratingstars">
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1"></i>
</span>
</li>

<li>
<span class="ratingLabel">College placements</span>
<span class="ratingstars">
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1"></i>
</span>
</li>

<li>
<span class="ratingLabel">Campus Facilities</span>
<span class="ratingstars">
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1"></i>
</span>
</li>

<li>
<span class="ratingLabel">Faculty</span>
<span class="ratingstars">
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1 fill"></i>
<i class="icon-star-1"></i>
</span>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xs-12 col-md-8">
<div class="heading1" id="collegereviews">Write Reviews</div>
	<form>
		<div class="col-xs-12 col-md-6">
			<input type="text" placeholder="Name">
		</div>
		<div class="col-xs-12 col-md-6">
			<input type="email" placeholder="Email">
		</div>
		<div class="col-xs-12">
			<textarea placeholder="Message"></textarea>
		</div>
	</form>
</div>
<div class="col-xs-12 col-md-8">
<div class="heading1" id="collegereviews">Write Reviews</div>
	<form class="review-form">
		<div class="col-xs-12 col-md-6">
			<input type="text" placeholder="Name">
		</div>
		<div class="col-xs-12 col-md-6">
			<input type="email" placeholder="Email">
		</div>
		<div class="col-xs-12">
			<textarea placeholder="Message"></textarea>
		</div>
	</form>
</div>
<div class="col-xs-12 col-md-4">
	
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

<a href="#" class="downloadBro"><i class="icon-download"></i> Download Brochure</a>

<!--<a href="#" class="askQuestion">Ask question to college</a>-->

</div>
</div>

</div>
</div>
</div>
</section>
<style>
	.review-form input{width: 100%; padding: 10px; border: solid 1px #ccc; }
</style>