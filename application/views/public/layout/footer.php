<footer class="footerSection">
<div class="container">
<section class="footerTop">

<div class="footerWidget">
<h3>Website Name</h3>
<p>G-130, Sec-63,<br>
Noida, UP<br>
201301</p>
<p>info@mentorcell.com</p>
</div>

<div class="footerWidget">
<h3>About us</h3>
<ul>
<li><a href="#">Company Overview</a></li>
<li><a href="#">What we do</a></li>
<li><a href="#">Testimonial</a></li>
<li><a href="#">Team</a></li>
</ul>
</div>

<div class="footerWidget">
<h3>Services</h3>
<ul>
<li><a href="#">Admission 2017</a></li>
<li><a href="#">Career Profiling test</a></li>
<li><a href="#">Abroad Education</a></li>
<li><a href="#">Counselling</a></li>
<li><a href="#">Counselling Video</a></li>
<li><a href="#">Placement</a></li>
</ul>
</div>

<div class="footerWidget">
<h3>Connect with us</h3>
<ul>
<li><a href="#">Login | Register</a></li>
<li><a href="#">College Login</a></li>
<li><a href="#">Chat</a></li>
<li><a href="#">Blog</a></li>
<li><a href="#">News</a></li>
<li><a href="#">Contact us</a></li>
<li><a href="#">Write reviews</a></li>
</ul>
</div>

<div class="footerWidget">
<h3>Links</h3>
<ul>
<li><a href="#">Search step by step</a></li>
<li><a href="#">Common Application Form</a></li>
<li><a href="#">Value of redeem coupon</a></li>
<li><a href="#">Mobile Apps</a></li>
</ul>
</div>


</section>

<section class="footerBottom">
<p>Copyright © 2017 mentorcell.com. All Rights Reserved</p>
<div class="footerSocial">
<a href="#" class="fbBg"><i class="icon-facebook"></i></a>
<a href="#" class="twBg"><i class="icon-twitter"></i></a>
<a href="#" class="inBg"><i class="icon-linkedin"></i></a>
</div>
</section>
</div>
</footer>

<div class="clearfix"></div>

<!--body ends here -->
</div>


<!-- Login Modal Start -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
      <div class="loginForm">
      	<h3>Want to be a part of it? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Register here</a></h3>
		<div id="login_response"></div>
      	<form>
      	<div class="inputRow">
      		<input type="email" id="login_email" required='' placeholder="Email Address" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">

      		<input type="password" id="login_password" required='' placeholder="Password" name="">
      	</div>

      	<div class="inputRow">
      		<input type="submit" value="Submit" id="login_button" class="go" name="">
      	</div>

      	<h4><input type="checkbox" id="login_remember" name=""> Keep me signed in.</h4>
      	<h5><a data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot password?</a></h5>
		<input type='hidden' id="couponClicked" value='0'>
      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<!-- Login Modal Close -->



<!-- Forgot Password Modal Start -->
<div id="forgotModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
      <div class="loginForm">
      	<h3>Enter Registered Email Address to Recieve Instructions.</h3>
		<div id="forgot_response"></div>
      	<form>
      	<div class="inputRow">
      		<input type="email" id="forgot_email" required='' placeholder="Email Address" name="">
      		<i class="icon-email"></i>
      	</div>
    
      	<div class="inputRow">
      		<input type="submit" value="Submit" id="forgot_button" class="go" name="">
      	</div>
      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<!-- Forgot Password Modal Start -->



<!-- Forgot Password Modal Start -->
<div id="forgotsetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">
      <div class="loginForm">
      	<h3>Enter New Password.</h3>
		<div id="forgotset_response"></div>
      	<form>
      	<div class="inputRow">
      		<input type="password" id="forgotset_password" required='' placeholder="Password" name="">
      		<i class="icon-email"></i>
      	</div>
		<div class="inputRow">
      		<input type="password" id="forgotset_cpassword" required='' placeholder="Confirm Password" name="">
      		<i class="icon-email"></i>
      	</div>
		<input type="hidden" id="forgotset_code" required='' placeholder="Confirm Password" name="" value="<?php echo $_GET['code'];?>">
      	<div class="inputRow">
      		<input type="submit" value="Submit" id="forgotset_button" class="go" name="">
      	</div>
      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<!-- Forgot Password Modal Start -->


<!-- Register Modal Start -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regRight">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register for a new account</h4>
      </div>
      <div class="modal-body">
      <div class="regForm">
      	<h3>Already have an account? <a href="#"  data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a></h3>
		<div id="register_response"></div>
      	<form id="register_form">
		<div class="inputRow">
      		<input type="text" id="register_fname" required='' placeholder="First Name" name="">
      		<i class="icon-email"></i>
      	</div>
		<div class="inputRow">
      		<input type="text" id="register_lname" required='' placeholder="Last Name" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">
      		<input type="email" id="register_email" required='' placeholder="Email Address" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">
      		<input type="number" id="register_phone" required='' placeholder="Mobile Number" name="">
      		<i class="icon-phone-call"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_interest"><option>Education Interests</option>
				<?php 
				$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
				foreach($streams as $stream){
						echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
				} ?>
			
			</select>
      		<i class="icon-education"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_course"><option>Desired Courses</option></select>
      		<i class="icon-course"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_state"><option>Current State</option>
			<?php 
				$states = $this->common_model->get_all_rows("states", "country_id",101);
				foreach($states as $stateeach){
				echo '<option  value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
				//echo '<optgroup label="'.$stateeach['name'].'">';
					$cities = $this->common_model->get_all_rows("cities", "state_id",$stateeach['id']);
					
					//foreach($cities as $city){
						//echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
					//}
					//echo  '</optgroup>';
				} ?>
			
			</select>
			<i class="icon-city"></i>
			</div>
			<div class="inputRow">
			<select id="register_city"><option>Current City</option>
			
			
			</select>
      		<i class="icon-city"></i>
      	</div>

      	<div class="inputRow">
      		<input type="submit" value="Submit" id="register_button" class="go" name="">
      	</div>

      	</form>
		
		
		<form id="otp_form" style='display:none;'>
		<h3>Please enter recieved OTP.</h3>
      	<div class="inputRow">
      		<input type="text" id="register_otp" placeholder="Please Enter OTP" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">
      		<input type="submit" value="Verify" id="register_button_otp" class="go" name="">
      	</div>
		<input type="hidden" id="user_otp" name="user_otp" value="">
      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>
<!-- Register Modal Close -->




<!-- message -->
<!-- Login Modal Start -->
<div id="landingpage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Coming Soon</h2>
      </div>
      <div class="modal-body">
      <div class="loginForm">
		<h3 style="background: #ff9978;
    padding: 30px;">Dear Visitor! This website is under construction and a few features may not work. We are going to launch a national level marketing campaign from 20th February, 2017. By then, all features will be available to the user. Sorry for the inconvenience and thanks for your support! 
		<br/> Team MentorCell</h3>

      </div>
      <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<!-- Login Modal Close -->





<!-- message -->




<!-- JAVASCRIPT FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/theme/js/jquery.min.js'); ?>"><\/script>')</script>
	<!-- script start -->
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/jquery.bxslider.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/custom.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/ajaxcalls.js'); ?>"></script>
	
	<link href="<?php echo base_url('assets/theme/css/chosen.min.css'); ?>" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/chosen.jquery.min.js'); ?>"></script>
	<script type="text/javascript">
	$(".auto-choice").chosen();
	</script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
	
</body>
</html>