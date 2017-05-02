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
</div><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="col-xs-12 col-md-8">
<div class="heading1" id="collegereviews">Write Reviews</div>
	<form>
		<div class="col-xs-12 col-md-12">             <label>Name</label><br>
			 <input type="text" placeholder="Name...">
		</div>       
		<div class="col-xs-12 col-md-12">            <label>Email</label><br>
			<input type="email" placeholder="Email...">
		</div>
		<div class="col-xs-12 col-md-12">            <label>Message</label><br>
			<textarea placeholder="Message..."></textarea>
		</div>				<div class="col-xs-12 col-md-12">		<label>Worth The Money</label><br>		 <div class="stars">  <form action="">    <input class="star star-5" id="star-5" type="radio" name="star"/>    <label class="star star-5" for="star-5"></label>    <input class="star star-4" id="star-4" type="radio" name="star"/>    <label class="star star-4" for="star-4"></label>    <input class="star star-3" id="star-3" type="radio" name="star"/>    <label class="star star-3" for="star-3"></label>    <input class="star star-2" id="star-2" type="radio" name="star"/>    <label class="star star-2" for="star-2"></label>    <input class="star star-1" id="star-1" type="radio" name="star"/>    <label class="star star-1" for="star-1"></label>  </form></div>		      		</div>				<div class="col-xs-12 col-md-12">		<label>Colleage And Campus Life </label><br>				<div class="stars">  <form action="">    <input class="star star-6" id="star-6" type="radio" name="star"/>    <label class="star star-6" for="star-6"></label>    <input class="star star-7" id="star-7" type="radio" name="star"/>    <label class="star star-7" for="star-7"></label>    <input class="star star-8" id="star-8" type="radio" name="star"/>    <label class="star star-8" for="star-8"></label>    <input class="star star-9" id="star-9" type="radio" name="star"/>    <label class="star star-9" for="star-9"></label>    <input class="star star-10" id="star-10" type="radio" name="star"/>    <label class="star star-10" for="star-10"></label>  </form></div>		</div>				<div class="col-xs-12 col-md-12">		<label>Colleage Placements</label><br>				<div class="stars">  <form action="">    <input class="star star-11" id="star-11" type="radio" name="star"/>    <label class="star star-11" for="star-11"></label>    <input class="star star-12" id="star-12" type="radio" name="star"/>    <label class="star star-12" for="star-12"></label>    <input class="star star-13" id="star-13" type="radio" name="star"/>    <label class="star star-13" for="star-13"></label>    <input class="star star-14" id="star-14" type="radio" name="star"/>    <label class="star star-14" for="star-14"></label>    <input class="star star-15" id="star-15" type="radio" name="star"/>    <label class="star star-15" for="star-15"></label>  </form></div>		</div>				<div class="col-xs-12 col-md-12">		<label>Campus Facilities</label><br>				<div class="stars">  <form action="">    <input class="star star-16" id="star-16" type="radio" name="star"/>    <label class="star star-16" for="star-16"></label>    <input class="star star-17" id="star-17" type="radio" name="star"/>    <label class="star star-17" for="star-17"></label>    <input class="star star-18" id="star-18" type="radio" name="star"/>    <label class="star star-18" for="star-18"></label>    <input class="star star-19" id="star-19" type="radio" name="star"/>    <label class="star star-19" for="star-19"></label>    <input class="star star-20" id="star-20" type="radio" name="star"/>    <label class="star star-20" for="star-20"></label>  </form></div>		</div>				<div class="col-xs-12 col-md-12">		<label>Faculty</label><br>				<div class="stars">  <form action="">    <input class="star star-21" id="star-21" type="radio" name="star"/>    <label class="star star-21" for="star-21"></label>    <input class="star star-22" id="star-22" type="radio" name="star"/>    <label class="star star-22" for="star-22"></label>    <input class="star star-23" id="star-23" type="radio" name="star"/>    <label class="star star-23" for="star-23"></label>    <input class="star star-24" id="star-24" type="radio" name="star"/>    <label class="star star-24" for="star-24"></label>    <input class="star star-25" id="star-25" type="radio" name="star"/>    <label class="star star-25" for="star-25"></label>  </form></div>		</div>		<div class="col-xs-12 col-md-4">             			 <button type="submit" class="button-style">Submit </button>		</div>
	</form>
</div>
<div class="col-xs-12 col-md-8">

	
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
	.review-form input{width: 100%; padding: 10px; border: solid 1px #ccc; }			input, button, select, textarea{		width:100%;		height:32px;	}		div.stars {  width: 270px;  display: inline-block;}input.star { display: none; }label.star {  float: right;  padding: 10px;  font-size: 27px;  color: #444;  transition: all .2s;  margin-left: -11px;}input.star:checked ~ label.star:before {  content: '\f005';  color: #FD4;  transition: all .25s;}input.star-5:checked ~ label.star:before {  color: #FE7;  text-shadow: 0 0 20px #952;}input.star-1:checked ~ label.star:before { color: #F62; }label.star:hover { transform: rotate(-15deg) scale(1.3); }label.star:before {  content: '\f006';  font-family: FontAwesome;}		label{   font-weight:bold;		}.col-md-8 {    border: 1px solid #b8b8b8;    border-radius: 6px;	border-bottom:none;}.heading1{	background:none;}button{width: 100%;    height: 32px;    margin-top: 10px;	background:#f77a52;	border:none;	border-radius:6px;}button:hover{	background:#000;	border-radius:6px;	border:none;	color:#fff;}
</style>