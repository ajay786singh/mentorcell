<!-- Home Slider start -->
<section class="homeSlider">
<div class="searchArea">
<h3>what are you looking for?</h3>
<div class="searchNav">
<ul>
	<li target-form="form1" class="active">College</li>
	<li target-form="form2">Exam</li>
	<li target-form="form3">Courses</li>
</ul>
</div>

<div class="formHolder">
<div id="form1" class="searchForm active">
<form action="search">
<div class="formcol50">
<select id="search_college" required='' data-placeholder="Choose a College" class="auto-choice" name="college">
<option value="">Choose a College to Join</option>
	<?php 
			foreach($colleges as $college){
				echo '<option value="'.$college['id'].'">'.$college['name'].'</option>';
			}
	?>	
</select>
</div>
<div class="formcol50">
<select id="register_city_location"  class="auto-choice" multiple name="location">
	<?php echo $location; ?>
			
</select>
</div>
		<div  class="extra_filters" style="display:none;">
			<div class="formcol00">
			<select id="stream"  class="auto-choice"  name="stream">
				<?php 

				foreach($streams as $stream){
				  echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
				} ?>
						
			</select>
			</div>
			<div class="formcol00">
			<select id="type" class="auto-choice"  name="type">
				<?php 

				foreach($types as $type){
				  echo '<option  value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
			  } ?>
						
			</select>
			</div>
			<div class="formcol00">
			<select id="course"  class="auto-choice"  name="course_main"> 
			<?php 
				foreach($courses as $course){
					echo '<option  value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
				} ?>
						
			</select>
			</div>
		</div>	
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

<div id="form2" class="searchForm">
<form  action="search">
<div class="formcol50">

<select id="stream_name" required='' data-placeholder="Stream" class="auto-choice" name="stream" onChange="return getExamByCourse(this.value);">
<option value="">Find Stream</option>
	<?php 
			$exam_search = $this->exam_model->get_all_groupby("mc_exams");
foreach($exam_search as $exam_search_data){
				echo '<option value="'.$exam_search_data['course_name'].'">'.$exam_search_data['course_name'].'</option>';
			}
	?>	
</select>
</div>
<div class="formcol50">
<select id="exam_lists"  name="exam_lists">
			
</select>
</div>
<button class="go" onClick="return exam_button();"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

<div id="form3" class="searchForm">
<form action="search">
<div class="formcol50">
<select id="search_course" required='' class="auto-choice" name="course">
<option value="">Choose a Course to Join</option>
	<?php 
		
		foreach($courses as $course){
			
				echo '<option   value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
			
		}
	?>	
</select>
</div>
<div class="formcol50">
<select id="register_city_location"  class="auto-choice" multiple name="location">
	<?php echo $location; ?>
			
</select>
</div>
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

</div>

</div>

<div class="mobileAppIcons hidden-xs"><a href="#"><img src="<?php echo base_url('assets/theme/images/googleplay.jpg'); ?>"></a></div>

<ul class="bxslider">
<li><img src="<?php echo base_url('assets/theme/images/slide1.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/slide1.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/slide1.jpg'); ?>"></li>
</ul>
</section>
<!-- Home Slider close -->

<section class="featureSlider">
<div class="container-fluid">
<div class="row">
<div class="featureHeading"></div>
<ul class="bxslider">
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.png'); ?>"></div> <div class="featureText"><h3>IIBA</h3> <p>Bangalore, Noida, Kolkata</p></div></li>
</ul>
</div>
</div>
</section>

<section class="bgGrey">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">About us</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="careerCol">
<p>MentorCell.com is founded by IIT and IIM Alumni with a vision to extend support and guidance to students at school and college level for the betterment of their academic and professional career and thus contribute towards nation building.</p>
<p>We are providing career counseling to students through researched content and videos. We have provided here researched and precise content on courses, career choices, exams, colleges, fees, reviews, college admission process and scholarships etc. which is simple and quick to understand.</p>
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

<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">How it works?</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step1.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>1</span> Step 1</h3> <p>Register and generate coupon.</p> <a href="#" class="stepButton">Register</a></div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step2.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>2</span> Step 2</h3> <p>College Search & Get Counseling</p> <a href="#" class="stepButton">College search</a></div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step3.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>3</span> Step 3</h3> <p>Take Admission & Redeem Coupon</p> <a href="#" class="stepButton">Generate coupon</a></div>
</div>
</div>



</div>
</div>
</div>
</section>


<section class="bgGrey">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Career counseling video</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer">
<img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>">
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="careerCol">
<p>We are providing career counseling to students through researched content and videos. We have provided here researched and precise video content on courses, career choices etc which is simple and quick to understand. To make the process simpler, we have also put up counseling videos made by experts and educational institutions.</p>
<!--<a href="#" class="counsButton">Get counselling</a>-->
</div>
</div>

<div class="youtubeThumb">
<a href="#" class="viewAll">View All Videos</a>
<ul>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>"></li>
</ul>
</div>

</div>
</div>
</div>
</section>

<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Anything particular?</div>

<div class="col-xs-12 col-sm-12">
<div class="managementArea">
<ul>
<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/management'); ?>"><img src="<?php echo base_url('assets/theme/images/1.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/management'); ?>">Management</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/engineering'); ?>"><img src="<?php echo base_url('assets/theme/images/2.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/engineering'); ?>">Engineering</div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/architecture'); ?>"><img src="<?php echo base_url('assets/theme/images/3.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/architecture'); ?>">Architecture</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/medical'); ?>"><img src="<?php echo base_url('assets/theme/images/4.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/medical'); ?>">Medical</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/dental'); ?>"><img src="<?php echo base_url('assets/theme/images/5.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/dental'); ?>">Dental</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/pharmacy'); ?>"><img src="<?php echo base_url('assets/theme/images/6.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/pharmacy'); ?>">Pharmacy</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/paramedical'); ?>"><img src="<?php echo base_url('assets/theme/images/7.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/paramedical'); ?>">Paramedical</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/hotel_management'); ?>"><img src="<?php echo base_url('assets/theme/images/8.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/hotel_management'); ?>">Hotel Management</a></div>
</li>

<li>
<div class="manageIcon"><a href="<?php echo base_url('course/index/law'); ?>"><img src="<?php echo base_url('assets/theme/images/9.png'); ?>" /></a></div>
<div class="manageText"><a href="<?php echo base_url('course/index/law'); ?>">Law</a></div>
</li>

<li>
<div class="manageIcon"><a href="anything-particular.html"><img src="<?php echo base_url('assets/theme/images/10.png'); ?>" /></a></div>
<div class="manageText"><a href="anything-particular.html">Computer Application</a></div>
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
<li>MBA</li>
<li>BBA</li>
<li>B.E/B.Tech</li>
<li>M.E/M.Tech</li>
<li>MBBS</li>
<li>BDS</li>
<li>B.Com</li>
<li>BCA</li>
<li>MCA</li>
<li>BHM</li>
<li>B.Sc (Nursing)</li>
<li>B.Pharma</li>
<li>B.Sc</li>
<li>B.Arch</li>
<li>B.Sc (Aviation)</li>
<li>B.Sc (Computers)</li>
<li>B.Des.</li>
<li>LLB</li>
<li>Bachelor of Physiotherapy (BPT)</li>
<li>BAMS</li>
<li>BHMS</li>
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
<div class="sectionHeading">Introducing Our Team</div>

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
<p>We help you realise your dream of studying abroad by providing end-to-end support right from student profile analysis and counseling to college selection and admission process in universities abroad.</p>

<ul>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag1.jpg'); ?>" /></div> <div class="abroadName">Germany</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag2.jpg'); ?>" /></div> <div class="abroadName">USA</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag3.jpg'); ?>" /></div> <div class="abroadName">UK</div> </li>
	<li><div class="abroadIcon"><img src="<?php echo base_url('assets/theme/images/flag4.jpg'); ?>" /></div> <div class="abroadName">Canada</div> </li>
</ul>

<h3>Do you want to study in any other country?</h3>
<a href="#" class="findHere">Find here</a>

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
<div class="sectionHeading">Contact us</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="quickContact">
<h3>GET IN TOUCH</h3>
<p>Mon - Sat: 09 AM - 06 PM</p>

<ul>
<li>
<span class="contactIcon"></span>
<span class="contactText">
<h4>ADDRESS</h4>
<p>G-130, Sec-63,<br>
Noida-201307, India</p>
</span>
</li>

<li>
<span class="contactIcon"></span>
<span class="contactText">
<h4>CALL US</h4>
<p>+91 9953862807 / +91 7042387480</p>
</span>
</li>

<li>
<span class="contactIcon"></span>
<span class="contactText">
<h4>E-MAIL</h4>
<p><a href="mailto:info@mentorcell.com">info@mentorcell.com</a> / <a href="mailto:dinesh@mentorcell.com">dinesh@mentorcell.com</a></p>
</span>
</li>

</ul>

<a href="#" class="quickButton">Get a call back</a>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="contactForm">
	<form id="_contact_form">
	<div id="_contact_form_response"></div>
	<ul>
	    <li><input id="_contact_form_name" required='' type="text" name="" placeholder="Full Name"> <i class="icon-name"></i></li>
		<li><input id="_contact_form_email" required='' type="email" name="" placeholder="Email Address"> <i class="icon-email"></i></li>
		<li><input id="_contact_form_phone" required='' type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="" placeholder="Mobile Number"> <i class="icon-phone-call"></i></li>
		<li><textarea id="_contact_form_message" required='' placeholder="Message"></textarea></li>
		<li><input id="_contact_form_send" type="submit" value="Send" class="go" name=""></li>
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

