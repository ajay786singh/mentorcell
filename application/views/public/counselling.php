<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading" style="margin-bottom: 10px;">Counselling</div>



<div class="couponHolder">
	<div class="couponRow" style='display:block;
  
    background-size: 100%;background-repeat:no-repeat;
    height: 400px;'>
		<div class="regForm">
			<div id="register_response"></div>
			<form id="register_form">
				<div class="inputRow">
					<input type="text" id="register_fname" required='' placeholder="Name" name="">
					<i class="icon-name"></i>
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
					<input type="button" value="Submit"  id="send_query" class="go" value="Send Query" name="send_query">
				</div>
			</form>



		</div>
    <div class="col-md-6">
      <h5 style="margin-top:30px;font-size:20px;line-height:32px">
Having a team of expert career counselors and founders with rich experience in education sector, Mentorcell.com aims to provide counseling to students helping them chose the best suitable career path. Write to us and we promise to get back to you at the earliest.
  </h5>
    </div>


	</div>
 

</div>

</div>
</div>
</div>
<style>

</style>
</section>


