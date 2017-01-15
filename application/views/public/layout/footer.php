
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
      		<input type="email" id="login_email" placeholder="Email Address" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">

      		<input type="password" id="login_password" placeholder="Password" name="">
      	</div>

      	<div class="inputRow">
      		<input type="submit" value="Submit" id="login_button" class="go" name="">
      	</div>

      	<h4><input type="checkbox" id="login_remember" name=""> Keep me signed in.</h4>
      	<h5><a href="#">Forgot password?</a></h5>

      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<!-- Login Modal Close -->



<!-- Register Modal Start -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="regLeft">
    <h3>Why Signup?</h3>
    <ul>
    	<li>Will get assistance from now till getting your placement.</li>
    	<li>IQ test and redeem coupon</li>
    	<li>Researched material and video of different courses.</li>
    	<li>View College Brochures.</li>
    	<li>Counseling video of different colleges.</li>
    	<li>Ask Questions to Counselors</li>
    </ul>
    </div>
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
      		<input type="email" id="register_email" placeholder="Email Address" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">
      		<input type="password" id="register_password" placeholder="Password" name="">
      		<i class="icon-email"></i>
      	</div>
      	<div class="inputRow">
      		<input type="text" id="register_phone" placeholder="Mobile Number" name="">
      		<i class="icon-phone-call"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_interest"><option>Education Interests</option></select>
      		<i class="icon-education"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_course"><option>Desired Courses</option></select>
      		<i class="icon-course"></i>
      	</div>

      	<div class="inputRow">
      		<select id="register_city"><option>Current City</option></select>
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

      	</form>

      </div>
      <div class="clearfix"></div>
      </div>
      </div>


    </div>

  </div>
</div>
<!-- Register Modal Close -->



<!-- JAVASCRIPT FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/theme/js/jquery.min.js'); ?>"><\/script>')</script>
	<!-- script start -->
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/jquery.bxslider.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/custom.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/theme/js/ajaxcalls.js'); ?>"></script>
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