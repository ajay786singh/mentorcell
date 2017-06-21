<section class="bgWhite">
<div class="container">
<div class="row">
<div class="container">
<div class="sectionHeading"><span>Get</span> Coupon</div>

<style>
.banner-coupon{
	margin-left: 22px;
    margin-bottom: 60px;
}
.couponHolder .regForm .inputRow {
    margin: 0px 0px 20px 0px;
    }

.couponHolder .regForm .inputRow input.go {

margin:28px 0px 5px 0px;
}
.couponHolder .loginForm {
	margin:23px 15px;
}
</style>

<div class="couponTabs">
<ul>
<li class="<?php echo $couponBox1;?>" id="couponTab1">
<h3><i class="icon-tick"></i> <img style="invert(1) !important" src="<?php echo base_url()?>assets/theme/images/login.png" /></h3>
<h4>Login/Registration</h4>
</li>

<li class="<?php echo $couponBox2;?>" id="couponTab2">
<h3><i class="icon-tick"></i> <img style="invert(1) !important" src="<?php echo base_url()?>assets/theme/images/test1.png" /></h3>
<h4>IQ test</h4>
</li>

<li class="<?php echo $couponBox3;?>" id="couponTab3">
<h3><i class="icon-tick"></i> <img style="invert(1) !important" src="<?php echo base_url()?>assets/theme/images/coupon.png" /></h3>
<h4>Get Coupon</h4>
</li>
</ul>
</div>


<div class="couponHolder">
	<div class="couponRow <?php echo $couponBox1;?>" id="couponBox1">
		<div class="regForm">
            <div class="orline">
            <img src="http://nationproducts.in/mentorcell/assets/theme/images/or-line.png">
            </div>
			<h3>Want to be a part of it?</h3>
			<div id="register_response"></div>
			<form id="register_form">
				<div class="col-md-12 inputRow coupon-detel">
                    <span>First Name</span>
					<input type="text" id="register_fname" required='' placeholder="Enter your full Name" name="">
					<i class="icon-name"></i>
				</div>
				<!--<div class="inputRow coupon-detel">
                    <span>Last Name</span>
					<input type="text" id="register_lname" required='' placeholder="Last Name" name="">
					<i class="icon-name"></i>
				</div>-->
				<div class="col-md-12 inputRow coupon-detel">
                     <span>Email Address</span>
					<input type="email" id="register_email" required='' placeholder="Enter your ID" name="">
					<i class="icon-email"></i>
				</div>
				<div class="col-md-12 inputRow coupon-detel">
                     <span>Mobile Number</span>
					<input type="number" id="register_phone" pattern="/(7|8|9)\d{9}/" required='' placeholder="Contact No" name="">
					<i class="icon-phone-call"></i>
				</div>
				<div class="col-md-6 inputRow coupon-detel">
                    <span>Education Interests</span>
					<select id="register_interest" class="register_interest"><option>Education Interests</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
					<i class="icon-education"></i>
				</div>

				<div class="col-md-6 inputRow coupon-detel">
                     <span>Courses</span>
					<select id="register_course" class="register_course"><option>Courses</option></select>
					<i class="icon-course"></i>
				</div>

				<div class="col-md-6 inputRow coupon-detel">
                     <span>State</span>
					<select id="register_state" class="register_state"><option>State</option>
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
				<div class="col-md-6 inputRow coupon-detel">
                     <span>City</span>
					<select id="register_city" class="register_city"><option>City</option></select>
					<i class="icon-city"></i>
				</div>

                
                <div class="col-md-12 inputRow coupon-detel">
                     <span>Counsellor</span>
					<input type="hidden" value="<?php echo $referral_key;?>"  id="register_refer-key"  name="">
					<i class="icon-city"></i>
                    <select id="register_caller" class="register_caller"><option value="0">Other</option>
				<?php
					$callers = $this->common_model->get_all_rows("mc_caller", 1,1);
					foreach($callers as $caller){
					echo '<option  value="'.$caller['id'].'">'.$caller['name'].'</option>';
					}
				?>
				</select>
				</div>
				

				
				
				<div class="col-md-6 inputRow coupon-detel">
					<input type="button" value="Register"  id="register_button" class="go" name="">
				</div>
			</form>

			<form id="otp_form" style='display:none;'>
			<h3>Please enter recieved OTP.</h3>
			<div class="inputRow">
				<input type="text" id="register_otp" placeholder="Please Enter OTP" name="">
				<i class="icon-email"></i>
			</div>
			<div class="inputRow">
				<input type="Login" value="Verify" id="register_button_otp" class="go" name="">
			</div>
			<input type="hidden" id="user_otp" name="user_otp" value="">
			</form>



        </div>
<?php if(!$loggedIn) { ?>
		<div class="loginForm">
			<h3>Already have an account?</h3>
			<div id="login_response"></div>
			<form>
				<div class="col-md-12 inputRow coupon-detel">
                    <span>Email</span>
					<input type="email" id="login_email" required='' placeholder="Enter your full Name" name="">
					<i class="icon-email"></i>
				</div>
				<div class="col-md-12 inputRow coupon-detel">
                    <span>Password</span>

					<input type="password" id="login_password" required='' placeholder="Enter Your Password" name="">
					<i class="icon-key"></i>
				</div>

				<div class="inputRow">
					<input type="submit" value="Submit" id="login_button" class="go" name="">
				</div>
				<!--<h4><input type="checkbox" id="login_remember" name=""> Keep me signed in.</h4>-->
				<!--<h5><a href='#' data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot password?</a></h5>-->
				<input type='hidden' id="couponClicked" value='0'>
			</form>
		</div>
		<?php } ?>
	</div>

	<?php
	if($loggedIn) {
	?>
	<?php if(!empty($questionnaire_list)){ ?>
	<div class="couponRow <?php echo $couponBox2;?>" id="couponBox2">
		<!-- Time Script-->
			<center><h3 style="font-weight: bold;font-size: 2em;">Time left:  <span id="timer"></span></h3></center>
		<!-- Time Script-->
		
		<div class="iqTest">
		<ol>
			<?php
			$a_question_ids		=	array();
			foreach($questionnaire_list as $k => $ques) {
				$qNo				=	$k+1;
				$question_id		=	$ques['question_id'];
				$a_question_ids[]	=	$question_id;
				$answer_list	= 	$this->common_model->get_all_rows("mc_answers",'question_id',$question_id,'answer_id asc');
				?>
				<li>
					<h3><?php echo $qNo.". ".$ques['question'];?></h3>
					<div class="iqAnsRow">
						<?php
						foreach($answer_list as $kk => $ans) {
							$answer_id	=	$ans['answer_id'];
							$correct	=	$ans['correct'];
							?>
								<div class="iqAnsBox"><input type="radio" name="answer<?php echo $question_id?>" id="ans<?php echo $answer_id;?>" value="<?php echo $answer_id."|".$correct;?>"> <label for="ans<?php echo $answer_id;?>"><?php echo $ans['answer']?></label></div>
							<?php
						}
						?>
					</div>
				</li>
				<?php
			}
			$question_ids		=	"";
			if($a_question_ids) {
				$question_ids	=	implode(",",$a_question_ids);
			}
			?>
		</ol>
		<input type="button" id='question_answer' value="Test Submit" class="go" name="">
		<input type="hidden" id='question_ids' value="<?php echo $question_ids;?>">
		<input type="hidden" id='course_id' value="<?php echo $course_id;?>">
		</div>
	
	</div>
	<?php } ?>
	<div class="couponRow <?php echo $couponBox3;?>" id="couponBox3">
		<div class="iqResult">
		<?php
		if(isset($message)) {
			echo $message;
		}
		?>
		</div>
	</div>
	<?php
	}
?>
</div>

</div>
</div>
</div>
</section>
<style>
@media screen and (max-width: 750px){
	.couponHolder .regForm .inputRow:nth-child(4){
		width: 100% !important;
	}
	}




.couponHolder .regForm .inputRow input, .couponHolder .regForm .inputRow select {
    width: 100%;
    font-size: 13px !important;
    border: 1px solid #c5c5c5;
    height: 45px important;
    border-radius: 0px;
    padding: 0 0px 0px 42px;
    margin-top: 10px;
}
    .couponHolder .regForm i {
    position: absolute;
    top: 44px;
    left: 20px;
    font-size: 16px;
    line-height: 1px;
    color: #bababa;
}
    .couponHolder .regForm {
    background: none;
    border: 1px solid rgba(0,0,0,0.10);
    width: 46%; margin: 2%; border-radius: 2px; padding: 45px 45px;
        
}
    .coupon-detel {
    padding: 0px 4px;
}
    .couponHolder .loginForm {
    background: none;
    border: 1px solid rgba(0,0,0,0.10);width: 46%; margin: 2%; border-radius: 2px;padding: 45px 45px;
        
}
.couponHolder .loginForm .inputRow input.go{width: 115px;background: #ea5c2e;font-size: 14px;
text-transform: uppercase;}
.couponHolder .regForm .inputRow input.go{width: 115px;background: #ea5c2e;font-size: 14px;text-transform: uppercase;}
.couponHolder .loginForm .inputRow input{margin-top: 10px;padding: 0 0px 0px 37px;border-radius: 0px; font-size: 12px;}
.couponHolder .loginForm i{top: 44px;
left: 20px;
font-size: 16px;}
.regForm {
position: relative;}
.orline {
position: absolute;
right: -25px;
top: -17px;
}
.couponTabs ul li h3 img{width: 87%;}
.couponTabs ul li h3{width:45%;background:inherit;border:inherit;}
.couponTabs ul li h3 i{ display: none;}
.couponTabs ul li h4{padding: 20px 0px 0px 0px;font-weight: 600;}
.couponTabs ul li{opacity: 1;}
    .couponHolder{ background: rgba(0,0,0,0.04);margin: 25px 0;}
    .couponHolder .regForm h3{font-weight: 600;}
    .couponHolder .loginForm h3{font-weight: 600;}
    .couponHolder .loginForm .inputRow{float: left;}
	
	.couponTabs ul li h3 img {filter:invert(1);}
	
	.couponTabs ul li.active h3 img{
		filter: invert(0) !important;
	}
</style>
