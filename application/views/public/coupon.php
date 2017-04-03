<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Get Coupon</div>

<div class="couponTabs">
<ul>
<li class="<?php echo $couponBox1;?>" id="couponTab1">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>Login/Registration</h4>
</li>

<li class="<?php echo $couponBox2;?>" id="couponTab2">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>IQ test</h4>
</li>

<li class="<?php echo $couponBox3;?>" id="couponTab3">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>Get Coupon</h4>
</li>
</ul>
</div>


<div class="couponHolder">
	<div class="couponRow <?php echo $couponBox1;?>" id="couponBox1">
		<div class="regForm">
			<h3>Want to be a part of it?</h3>
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
					<select id="register_interest" class="register_interest"><option>Education Interests</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
					<i class="icon-education"></i>
				</div>

				<div class="inputRow">
					<select id="register_course" class="register_course"><option>Desired Courses</option></select>
					<i class="icon-course"></i>
				</div>

				<div class="inputRow">
					<select id="register_state" class="register_state"><option>Current State</option>
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
					<select id="register_city" class="register_city"><option>Current City</option></select>
					<i class="icon-city"></i>
				</div>

				<input type="hidden" value="<?php echo $referral_key;?>"  id="register_refer-key"  name="">

				<div class="inputRow">
					<input type="button" value="Submit"  id="register_button" class="go" name="">
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

		<div class="loginForm">
			<h3>Already have an account?</h3>
			<div id="login_response"></div>
			<form>
				<div class="inputRow">
					<input type="email" id="login_email" required='' placeholder="Email Address" name="">
					<i class="icon-email"></i>
				</div>
				<div class="inputRow">

					<input type="password" id="login_password" required='' placeholder="Password" name="">
					<i class="icon-key"></i>
				</div>

				<div class="inputRow">
					<input type="submit" value="Submit" id="login_button" class="go" name="">
				</div>
				<h4><input type="checkbox" id="login_remember" name=""> Keep me signed in.</h4>
				<h5><a href='#' data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot password?</a></h5>
				<input type='hidden' id="couponClicked" value='0'>
			</form>
		</div>
	</div>

	<?php
	if($loggedIn) {
	?>
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
