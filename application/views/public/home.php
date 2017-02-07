
<!-- Home Slider start -->
<section class="homeSlider">
<div class="searchArea">
<h3>what are you looking for?</h3>
<div class="searchNav">
<ul>
	<li target-form="form1">College</li>
	<li target-form="form2">Course</li>
	<!--<li target-form="form3">Exam</li>-->
</ul>
</div>

<div class="formHolder">
<div id="form1" class="searchForm">
<form action="search">
<div class="formcol50">
<select id="register_city" multiple class="auto-choice" name="college">
	<?php 
		$colleges = $this->common_model->get_all("mc_colleges");
			foreach($colleges as $college){
				echo '<option value="'.$college['id'].'">'.$college['name'].'</option>';
			}
	?>	
</select>
</div>
<div class="formcol50">
<select id="register_city" class="auto-choice" multiple name="location"><option>Current City</option>
	<?php 
		$states = $this->common_model->get_all_rows("states", "country_id",101);
		foreach($states as $stateeach){
		//echo '<option  value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
		echo '<optgroup label="'.$stateeach['name'].'">';
			$cities = $this->common_model->get_all_rows("cities", "state_id",$stateeach['id']);
			
			foreach($cities as $city){
				echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
			}
			echo  '</optgroup>';
		} ?>
			
</select>
</div>
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

<div id="form2" class="searchForm">
<form action="search">
<div class="formcol50">
<select id="register_city" multiple class="auto-choice" name="course">
	<?php 
		$courses = $this->common_model->get_all("mc_courses");
		foreach($courses as $course){
			
				echo '<option   value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
			
		}
	?>	
</select>
</div>
<div class="formcol50">
<select id="register_city" class="auto-choice" multiple name="location"><option>Current City</option>
	<?php 
		$states = $this->common_model->get_all_rows("states", "country_id",101);
		foreach($states as $stateeach){
		//echo '<option  value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
		echo '<optgroup label="'.$stateeach['name'].'">';
			$cities = $this->common_model->get_all_rows("cities", "state_id",$stateeach['id']);
			
			foreach($cities as $city){
				echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
			}
			echo  '</optgroup>';
		} ?>
			
</select>
</div>
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

<div id="form3" class="searchForm">
<form action="search">
<div class="formcol50">
<select id="register_city" class="auto-choice" name="course"><option>Choose College</option>
	<?php 
		$colleges = $this->common_model->get_all("mc_colleges");
			foreach($colleges as $college){
				echo '<option value="'.$college['id'].'">'.$college['name'].'</option>';
			}
	?>	
</select>
<!--<div class="autoComplete">
<h4>Colleges</h4>
<ul>
<li>Amrita School of Business Amrita Vishwa Vidyapeetham ( ASB Kollam )</li>
<li>AIHM Institute of Hotel Management</li>
<li>NATA Classes</li>
<li>Indian Institute of Information Technology ( IIITA )</li>
</ul>
</div>-->
</div>
<div class="formcol50">
<!--<input type="text" name="" placeholder="Enter location" />-->

<select id="register_city" class="auto-choice" multiple name="location"><option>Current City</option>
	<?php 
		$states = $this->common_model->get_all_rows("states", "country_id",101);
		foreach($states as $stateeach){
		//echo '<option  value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
		echo '<optgroup label="'.$stateeach['name'].'">';
			$cities = $this->common_model->get_all_rows("cities", "state_id",$stateeach['id']);
			
			foreach($cities as $city){
				echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
			}
			echo  '</optgroup>';
		} ?>
			
</select>

<!--<div class="autoComplete">
<h4>Popular Locations</h4>
<ul>
<li>All India</li>
<li>Bangalore</li>
<li>Chandigarh Tricity</li>
<li>Chennai</li>
<li>Delhi / NCR</li>
<li>Hyderabad</li>
<li>Kolkata</li>
<li>Mumbai ( All )</li>
<li>Pune</li>
<li>Cities</li>
<li>Agartala</li>
</ul>
</div>-->
</div>
<button class="go"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>



</div>

</div>

<div class="mobileAppIcons"><a href="#"><img src="<?php echo base_url('assets/theme/images/googleplay.jpg'); ?>"></a> <a href="#"><img src="<?php echo base_url('assets/theme/images/appstore.jpg'); ?>"></a></div>

<ul class="bxslider">
<li><img src="<?php echo base_url('assets/theme/images/slide1.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/slide2.jpg'); ?>"></li>
<li><img src="<?php echo base_url('assets/theme/images/slide3.jpg'); ?>"></li>
</ul>
</section>
<!-- Home Slider close -->

<section class="featureSlider">
<div class="featureHeading"></div>
<ul class="bxslider">
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
<li><div class="featureLogo"><img src="<?php echo base_url('assets/theme/images/feture-logo1.jpg'); ?>"></div> <div class="featureText"><h3>SRM University</h3> <p>Awesome University</p></div></li>
</ul>
</section>

<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">How it works?</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step1.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>1</span> Step 1</h3> <p>Register and generate coupon.</p> <a href="#" class="stepButton">Generate Coupon</a></div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step2.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>2</span> Step 2</h3> <p>College Search & Get Counseling</p> <a href="#" class="stepButton">About counseling</a></div>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="stepsRow">
	<div class="stepIcon"><img src="<?php echo base_url('assets/theme/images/step3.jpg'); ?>" /></div>
	<div class="stepText"><h3><span>3</span> Step 3</h3> <p>Take Admission & Redeem Coupon</p> <a href="#" class="stepButton">About scholarship</a></div>
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
<div class="sectionHeading">Confused regarding career/career?</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer">
<img src="<?php echo base_url('assets/theme/images/youtubeplayer.jpg'); ?>">
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="careerCol">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
<a href="#" class="counsButton">Get counselling</a>
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

<section class="bgManagement">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading whiteColor">Anything particular?</div>

<div class="col-xs-12 col-sm-12">
<div class="managementArea">
<ul>
<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
</li>

<li>
<div class="manageIcon"><img src="<?php echo base_url('assets/theme/images/manage-icon.jpg'); ?>" /></div>
<div class="manageText">Management</div>
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
<li>B.tech</li>
<li>M.tech</li>
<li>MBBS</li>
<li>BDS</li>
<li>MBA</li>
<li>BBA</li>
<li>B.tech</li>
<li>M.tech</li>
<li>MBBS</li>
<li>BDS</li>
<li>MBA</li>
<li>BBA</li>
<li>B.tech</li>
<li>M.tech</li>
<li>MBBS</li>
<li>BDS</li>
<li>MBA</li>
<li>BBA</li>
<li>B.tech</li>
<li>M.tech</li>
<li>MBBS</li>
<li>BDS</li>
<li>MBA</li>
<li>BBA</li>
<li>B.tech</li>
<li>M.tech</li>
<li>MBBS</li>
<li>BDS</li>
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
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>

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
<div class="sectionHeading">Confused regarding career/placement?</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="quickContact">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
<a href="#" class="quickButton">Get a call back</a>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="contactForm">
	<form>
	<ul>
		<li><input type="email" name="" placeholder="Email Address"></li>
		<li><input type="text" name="" placeholder="Full Name"></li>
		<li><input type="tel" name="" placeholder="Mobile Number"></li>
		<li><textarea placeholder="Message"></textarea></li>
		<li><input type="submit" value="Send" class="go" name=""></li>
		</ul>
	</form>
</div>
</div>

</div>
</div>
</div>
</section>