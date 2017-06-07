<!-- Home Slider start -->
<section class="homeSlider">
<div class="searchArea">

<div class="searchNav">
<ul>
	<li target-form="form1" class="active">College</li>
	<li target-form="form2">Exam</li>
	<li target-form="form3">Courses</li>
</ul>
</div>

<div class="formHolder">
<div id="form1" class="sas active">
   <form action="search" style="width: 60%;margin: 0 auto;">
   <select class="col-to-join" id="search_college" required='' data-placeholder="Choose a College" class="auto-choice search_college" name="college">
<option value="">Choose a College to Join</option>
	<?php
			foreach($colleges as $college){
				echo '<option value="'.$college['id'].'">'.$college['name'].'</option>';
			}
	?>
</select>
  <select style="width: 40%; border-bottom: solid 1px #fff; margin-left: 2%; height: 40px;" id="register_city_location"  class="auto-choice" multiple name="location">
	<?php echo $location; ?>

</select>
  
  
  <div  class="extra_filters" style="display:none;">
			<div class="formcol00">
			<input type="hidden" id="streamcol" value="">
			<select id="stream"  class="auto-choice"  name="stream">
				<?php

				foreach($streams as $stream){
				  echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
				} ?>

			</select>
			</div>
			<div class="formcol00">
			<input type="hidden" id="streamtype" value="">
			<select id="type" required class="auto-choice"  name="type">
			<option value='0'>-- Select Course --</option>
				<?php

				/*foreach($types as $type){
				  echo '<option  value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
			  } */?>

			</select>
			</div>
			<div class="formcol00">
			<select id="course" required  class="auto-choice"  name="course_main">
			<option value='0'>-- Select Specialization --</option>
			<?php
				/*foreach($courses as $course){
					echo '<option  value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
				}*/ ?>

			</select>
			</div>
		</div>
  
  
  
  
   <!--<input type="submit" value="Search" style="
    width: 16%;
    background: #ff551a;
    color: #fff;
    padding: 5px;
    display: inline-block;
    margin-left: 1%;
    height: 40px;
">-->
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div> 
<div id="form2" class="sas">
<form  action="search">
   <select id="stream_name" required='' data-placeholder="Stream" class="auto-choice" name="stream" onChange="return getExamByCourse(this.value);">
<option value="">Find Stream</option>
	<?php
			$exam_search = $this->college_model->get_all_stream();
foreach($exam_search as $exam_search_data){
				echo '<option value="'.$exam_search_data['stream_id'].'">'.$exam_search_data['stream_name'].'</option>';
			}
	?>
</select>

<select id="exam_lists" required  name="exam_lists">

</select>

<button class="go" onClick="return exam_button();"><span class="glyphicon glyphicon-search"></span></span></button>
</form>
</div> 
<div id="form3" class="sas">
  <form action="search">
   <select id="search_course" required='' class="auto-choice" name="course">
<option value="">Choose a Course to Join</option>
	<?php

		foreach($courses as $course){

				echo '<option   value="'.$course['course_id'].'">'.$course['course_name'].'</option>';

		}
	?>
</select>
<select id="city_loc"  class="auto-choice"  name="location">
	<?php //echo $location; ?>

</select>
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div> 
</div>

</div>
	<style>
	
	
	
	
	/**24-05-2017**/
	.top-head{
		display:none;
	}
	
	.featureSlider{
		border-bottom: 1px solid #ccc;
	}
	
	
	
	.studyAbroad blockquote {
    font-size: 18px;
font-style: italic;
width: 100%;
margin: 0.25em 0;
padding: 0.25em 40px;
line-height: 1.45;
position: relative;
color: #fff;
border-left:none;
}
.studyAbroad blockquote::before{
	font-family: Georgia, serif;
	display: block;
content: "\201C";
font-size: 60px;
position: absolute;
left:18px;
top: -14px;
color: #fff;
}
.studyAbroad blockquote::after{
	font-family: Georgia, serif;
	display: block;
content: "\201D";
font-size: 60px;
position: absolute;
right: 252px;
top: 51px;
color: #ffffff;
}
	
	
	
	
	
	
	
	
	#main-slider .owl-prev{
		left: -49px !important;
		filter:grayscale(100%);
	}
	#main-slider .owl-prev:hover{
		left: -49px !important;
		filter:grayscale(0);
	}
	#main-slider .owl-next{
		filter:grayscale(100%);
	}
	#main-slider .owl-next{
		filter:grayscale(0);
	}
	
	.owl-prev{
		top: 34% !important;
	}
	
	.owl-next{
		top: 34% !important;
	}
	li.item p {
    text-align: center !important;
}
	.modal-content {
	margin-left:70px !important;
}
		.sas{display:none;}
		.sas.active{display:block;}
		div#form2 {
    width: 60%;
    margin: 0 auto;
}
	div#form3 {
    width: 60%;
    margin: 0 auto;
}	
		
	select#search_course {
    width: 40%;
    display: inline-block !important;
    color: #fff;
    border-bottom: 1px solid #fff;
	background: #172031;
}

		
	select#city_loc {
    width: 40%;
    display: inline-block !important;
    color: #fff;
    border-bottom: 1px solid #fff;
	background: #172031;
}

		
		select#stream_name {
    width: 40%;
    display: inline-block !important;
    color: #fff;
    border-bottom: 1px solid #fff;
			background: #172031;
}
		select#exam_lists {
    margin-right: 15px;
    width: 40%;
    color: #fff;
	background: #172031;		
    border-bottom: solid 1px #fff;
}
.featureSlider .featureText h3{
	font-weight: 600;
	font-size:16px;
}
.featureSlider .featureText p{
    color: #333;
    font-size: 13px;
    font-weight: 300;
}


.careerCol .counsButton{
	width:200px;
	margin-left:40%;
}






/**media queries**/



@media (max-width: 768px){
	
	.item p {
    text-align: center !important;
}
.sectionHeading:before{
	    left: 49%;
		width: 100%
}
.col-xs-6 {
    width: 100%;
}
.contactForm ul li input.go{
	width: 100%;
}
#main-slider .owl-next{
	right: -60px !important;
}
	
	
	
	
}






	</style>
<div class="containerBox" style="padding: 0px 70px; width: 80% !important; margin: 0 10% !important;">
<div class="owl-carousel owl-theme" id="main-slider" style="float:left; margin-top:30px; margin-bottom:30px;">
    <div class="item"><img src="<?php echo base_url('assets/theme/images/abroad_banner.jpg'); ?>"/></div>
    <div class="item"><img src="<?php echo base_url('assets/theme/images/admi_banner.jpg'); ?>"/></div>
    <div class="item"><img src="<?php echo base_url('assets/theme/images/career_banner.jpg'); ?>"/></div>
    <div class="item"><img src="<?php echo base_url('assets/theme/images/colleges_banner.jpg'); ?>"/></div>
    <div class="item"><img src="<?php echo base_url('assets/theme/images/courses_banner.jpg'); ?>"/></div>
</div>
</div>

</section>
<!-- Home Slider close -->

<section class="featureSlider">
<div class="container-fluid">
<div class="row">
<div class="featureHeading"></div>
<ul class="bxslider">
<?php $home_logo = $this->college_model->get_all_home_logo();
foreach($home_logo as $logo){
	$location_id = $this->college_model->get_location($logo['college_name']);
	?>
<li><a href="<?php echo base_url('home/search?college='.$logo["college_name"]); ?>" target="_blank"> <div class="featureText"><h3 style="font-size:15px;"><?=$location_id[0]['name']?></h3> <p><?=$logo['college_url']?>,</br> <?=$logo['college_detail']?></p></div></a></li>
<?php } ?>
</ul>
</div>
</div>
</section>

<section class="bgGrey" style="padding:40px 0;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><span>About</span> us</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="careerCol">
<p>MentorCell.com is founded by IIT and IIM Alumni with a vision to extend support and guidance to students at school and college level for the betterment of their academic and professional career and thus contribute towards nation building.</p>
<p> We are providing career counseling to students through researched content and videos. We have provided here researched and precise content on courses, career choices, exams, colleges, fees, reviews, college admission process and scholarships etc. which is simple and quick to understand.</p>
<p>We aim that all students get rightly educated and take the right step towards building their career.
</p>
</div>
</div>

<!--div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer">
<video id="introductionVideo" controls preload=auto>
<source src="https://s3.ap-south-1.amazonaws.com/assets.mentorcell/WhatIsMentorcell.mp4" type='video/mp4'/>
</video>
</div>
</div-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer1">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/4YbMmXui48M" frameborder="0" allowfullscreen></iframe>
</div>
</div>

</div>
</div>
</div>
</section>

<section class="bgWhite" style="padding:40px 0;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><span>How it</span> works?</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step1.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>1</span> Step 1</h3> <p>Register and generate coupon.</p>
		<a href="#" data-toggle="modal" data-target="#registerModal" class="stepButton">Register</a>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step2.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>2</span> Step 2</h3> <p>College Search & Get Counseling</p> <a href="<?php echo base_url()?>home/search?course=41" class="stepButton">College search</a></div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step3.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>3</span> Step 3</h3> <p>Take Admission & Redeem Coupon</p>
		<a href="<?php echo base_url()?>coupon/" class="stepButton">Generate coupon</a>
	</div>
</div>
</div>



</div>
</div>
</div>
</section>


<section class="bgGrey" style="padding:40px 0; background:url('<?php echo base_url('assets/theme/images/bg-1.jpg'); ?>') center fixed no-repeat; background-size:cover;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading whiteColor">Career counseling video</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center col-lg-12">
<div class="careerCol">
<p class="whiteColor" style="color: #fff;"><blockquote> We are providing career counseling to students through researched content and videos. We have provided here researched and precise video content on courses, career choices etc which is simple and quick to understand. To make the process simpler, we have also put up counseling videos made by experts and educational institutions.</blockquote></p>
</div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center col-lg-12">
<div class="youtubeThumb">
<ul>
<div class="owl-carousel owl-theme">

<?php foreach($counselling_video as $video){ 
	$video_image = 'https://img.youtube.com/vi/'.$video['video'].'/default.jpg';
	$video_url = base_url()."upload/".$video['video'];
	echo "<li class='item'>
	<a class='various fancybox fancybox.iframe' href='".$video_url."'>
	<video width='320' height='100'>
    <source src=".$video_url.">
</video>
	<img class='play-img' src='assets/theme/images/video-p.png'>
	</a>
	<p style='text-align:left; font-size:16px;text-transform: capitalize; color:#fff; margin:5px 5px;'>".$video['title']."</p></li>";
}
?>
</div>
</ul>
</div>
</div>
<style>
blockquote{
	font-size: 18px;
font-style: italic;
width: 100%;
margin: 0.25em 0;
padding: 0.25em 40px;
line-height: 1.45;
position: relative;
color: #fff;
border-left:none;
}
blockquote::before{
	font-family: Georgia, serif;
	display: block;
content: "\201C";
font-size: 60px;
position: absolute;
left:27px;
top: -14px;
color: #fff;
}
blockquote::after{
	font-family: Georgia, serif;
	display: block;
content: "\201D";
font-size: 60px;
position: absolute;
right: 378px;
top: 77px;
color: #ffffff;
}






	
.homeSlider .searchArea {
    float: left;
    margin-top: 0px;
    background: #172031;
    width: 100%;
	position: relative;
    z-index: 12;
	padding:4px 0 20px;
    top: 0;
    left: 0;
    transform: none;
    transition: none;
}	

	
	
img.play-img {
    position: absolute;
    top: 20%;
    width: 60px !important;
    left: 33% !important;
}
	
.searchArea ul {
    width: 100%;
    float: left;
    text-align: center;
}
	
.searchArea ul li{display:inline-block; float:none;}
.bx-wrapper{
margin-left:none !important; 
}	
	
	
	</style>
<div class="col-xs-12 col-sm-12 text-center col-md-12 text-center col-lg-12" style="margin-top: 30px;">
<div class="careerCol">
<a href="<?php echo base_url()?>home/gallery" class="counsButton">View More</a>
</div>
</div>



</div>
</div>
</div>
</section>

<section class="bgWhite" style="padding: 40px 0;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><span>Anything</span> particular?</div>

<div class="col-xs-12 col-sm-12">
<div class="managementArea">
<ul>
<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/3"><img src="<?php echo base_url('assets/theme/images/1.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/3">Management</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/4"><img src="<?php echo base_url('assets/theme/images/2.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/4">Engineering</div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/5"><img src="<?php echo base_url('assets/theme/images/3.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/5">Architecture</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/6"><img src="<?php echo base_url('assets/theme/images/4.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/6">Medical</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/7"><img src="<?php echo base_url('assets/theme/images/5.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/7">Dental</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/8"><img src="<?php echo base_url('assets/theme/images/6.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/8">Pharmacy</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/9"><img src="<?php echo base_url('assets/theme/images/7.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/9">Paramedical</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/10"><img src="<?php echo base_url('assets/theme/images/8.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/10">Hotel Management</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/11"><img src="<?php echo base_url('assets/theme/images/9.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/11">Law</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url()?>index.php/page/management/12"><img src="<?php echo base_url('assets/theme/images/10.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url()?>index.php/page/management/12">Computer Application</a></div>
</li>

</ul>

</div>

</div>

</div>
</div>
</div>
</section>


<section class="bgCourses">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading whiteColor">Popular Courses</div>

<div class="col-xs-12 col-sm-12">
<div class="popularCourses">
<ul>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=41">MBA</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=147">BBA</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=70">B.E/B.Tech</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=71">M.E/M.Tech</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=218">MBBS</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=149">B.Com</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=146">BCA</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=145">MCA</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=192">B.Sc (Nursing)</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=216">B.Pharma</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=243">B.Sc</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=199">B.Arch</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=175">B.Sc (Animation)</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=361">B.Sc (Computers)</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=260">B.Des.</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=115">LLB</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=270">Bachelor of Physiotherapy (BPT)</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=43">PGDM</a></li>
<li><a style="color:#eee;" href="<?php echo base_url()?>home/search?course=231">MD</a></li>
</ul>

</div>

</div>

</div>
</div>
</div>
</section>


<section class="bgWhite" style="padding: 40px 0;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Introducing Our <span>Team</span></div>

<div class="col-xs-12 col-sm-12">
<div class="teamArea">
<ul>

<li>
<div class="teamIcon"><img src="<?php echo base_url('assets/theme/images/ak-gupta.jpg'); ?>" /></div>
<div class="teamText">
<h3>Amit Kumar Gupta</h3>
<h4>Co-Founder</h4>
<p>Amit Kumar Gupta did his Bachelors and Masters in Mechanical Engineering...</p>
<a href="#" data-toggle="modal" data-target="#teamModal1" class="teamDetail">Detail</a>
</div>
</li>

<li>
<div class="teamIcon"><img src="<?php echo base_url('assets/theme/images/sanjeev-singh.jpg'); ?>" /></div>
<div class="teamText">
<h3>Sanjeev Singh</h3>
<h4>Co-Founder</h4>
<p>Sanjeev Singh holds a Masters in Computer Science from USC, Columbia...</p>
<a href="#" data-toggle="modal" data-target="#teamModal2" class="teamDetail">Detail</a>
</div>
</li>

<li>
<div class="teamIcon"><img src="<?php echo base_url('assets/theme/images/p-chaudhuri.jpg'); ?>" /></div>
<div class="teamText">
<h3>Pranab Chaudhuri</h3>
<h4>Co-Founder</h4>
<p>Pranab Chaudhuri holds a Bachelors and Masters in Maths & Computing from...</p>
<a href="#" data-toggle="modal" data-target="#teamModal3" class="teamDetail">Detail</a>
</div>
</li>

<li>
<div class="teamIcon"><img src="<?php echo base_url('assets/theme/images/d-mishra.jpg'); ?>" /></div>
<div class="teamText">
<h3>Dinesh Mishra</h3>
<h4>Co-Founder</h4>
<p>Dinesh Mishra did his Graduation in Hotel Management and MBA in Hospitality</p>
<a href="#" data-toggle="modal" data-target="#teamModal4" class="teamDetail">Detail</a>
</div>
</li>

</ul>

</div>

</div>

</div>
</div>
</div>
</section>


<section class="bgAbroad">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading whiteColor">Want to study abroad?</div>

<div class="col-xs-12 col-sm-12">
<div class="studyAbroad">
<p><blockquote>We help you realise your dream of studying abroad by providing end-to-end support right from student profile analysis and counseling to college selection and admission process in universities abroad.</blockquote></p>

<ul>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag1.jpg'); ?>" /></div> <div class="abroadName">Germany</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag2.jpg'); ?>" /></div> <div class="abroadName">USA</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag3.jpg'); ?>" /></div> <div class="abroadName">UK</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag4.jpg'); ?>" /></div> <div class="abroadName">Canada</div> </li>
</ul>

<h3>Do you want to study in any other country?</h3>
<a href="<?php echo base_url()?>page/study_abroad" class="findHere">Find here</a>

</div>

</div>

</div>
</div>
</div>
</section>


<section class="bgWhite" style="padding:40px 0px;">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><span>Contact</span> us</div>



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="contactForm">
	<form id="_contact_form">
	<div id="_contact_form_response"></div>
	<ul>
	   <div class="col-xs-6"> <li><input id="_contact_form_name" required="required" type="text" name="" placeholder="Full Name"> <i class="icon-name"></i></li>
		<li><input id="_contact_form_email" required="required" type="email" name="" placeholder="Email Address"> <i class="icon-email"></i></li>
		<li><input id="_contact_form_phone" required="required" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="" placeholder="Mobile Number"> <i class="icon-phone-call"></i></li>
		</div>
        <div class="col-xs-6">
        <li><textarea id="_contact_form_message" required placeholder="Message"></textarea></li>
        </div>
        <div class="col-xs-12 text-center">
		<li><input id="_contact_form_send" type="submit" value="Send" class="go pull-right" name="go"></li>
        </div>
		</ul>
	</form>
</div>
</div>

</div>
</div>
</div>
</section>





<!-- team 1 start -->
<div id="teamModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regRight">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Amit Kumar Gupta</h4>
      </div>
      <div class="modal-body">
      <div class="teamPopup">
      <div class="teamImg"><img src="<?php echo base_url('assets/theme/images/ak-gupta.jpg'); ?>"></div>
      <h5>Co-Founder</h5>
      <p>Amit Kumar Gupta did his Bachelors and Masters in Mechanical Engineering from IIT Kharagpur and holds a laurea Magistrale in Industrial Engineering & Management from University of Udine, Italy.  He has more than ten years of experience in Manufacturing Industry in the field of Supply Chain, in India and Italy. During his job tenure, he has been continuously guiding, training and developing teams working under him. He has a deep interest in Mentoring and high belief in moral education.</p>
      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>
<!-- team 1 Close -->

<!-- team 2 start -->
<div id="teamModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regRight">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sanjeev Singh</h4>
      </div>
      <div class="modal-body">
      <div class="teamPopup">
      <div class="teamImg"><img src="<?php echo base_url('assets/theme/images/sanjeev-singh.jpg'); ?>"></div>
      <h5>Co-Founder</h5>
      <p>Sanjeev Singh holds a Masters in Computer Science from USC, Columbia, USA and Bachelors & Masters in Maths and Computing from IIT Kharagpur. He has over 10 years of experience in industry and academia. He has worked as a web and app developer, and was involved in research in mobile computing, particularly in smartphone assisted safe driving.</p>
      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>
<!-- team 2 Close -->

<style>
.owl-prev:hover{
	color:#f77a52 !important;
}
.owl-next:hover{
	color:#f77a52 !important;
}
.bx-pager {
    display: none;
}
	.bx-wrapper{
		max-width:100% !important;
		margin-left: 0px !important;
		border: 1px solid #ccc;
	}
	ul.bxslider li{
		width: 252px !important;
	}
	select#stream{
		    color: #fff;
	}
	select#type{
		color: #fff;
	}
	select#course{
		color: #fff;
	}
	.featureSlider .bx-wrapper .bx-controls-direction a{
		    height: 106px;
			margin:none !important;
	}
	
	
	
	
</style>
	


<!-- team 3 start -->
<div id="teamModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regRight">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pranab Chaudhuri</h4>
      </div>
      <div class="modal-body">
      <div class="teamPopup">
      <div class="teamImg"><img src="<?php echo base_url('assets/theme/images/p-chaudhuri.jpg'); ?>"></div>
      <h5>Co-Founder</h5>
      <p>Pranab Chaudhuri holds a Bachelors and Masters in Maths & Computing from IIT Kharagpur. He has around 11 years of experience in industry working with High Tech companies like Oracle and VMware. He underwent training in 3D immersive visualization at NASA John C Stennis Space Center, Mississippi. He has worked in various domains like cloud, SAAS, Analystics etc.</p>
      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>
<!-- team 3 Close -->

<!-- team 4 start -->
<div id="teamModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regRight">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dinesh Mishra</h4>
      </div>
      <div class="modal-body">
      <div class="teamPopup">
      <div class="teamImg"><img src="<?php echo base_url('assets/theme/images/d-mishra.jpg'); ?>"></div>
      <h5>Co-Founder</h5>
      <p>Dinesh Mishra did his Graduation in Hotel Management and MBA in Hospitality Management. He has almost 13 years of experience in Hospitality industry in India and abroad. He also has more than ten years of experience in educational consultancy sector and founded Edu Mantra Educational Society in the year 2009.</p>
      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>

<!-- team 4 Close -->
