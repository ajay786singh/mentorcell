
<section class="bgWhite profileHead">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="col-xs-12 col-sm-3 col-md-2"><div class="profileThumb"></div></div>
<div class="col-xs-12 col-sm-9 col-md-10">
<div class="profileQuick">
<h2><?php echo $user_login['firstname']." ".$user_login['lastname']; ?></h2>
<h3>Beginner-Level 2 | 30 points</h3>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="profileTab">
<ul>
<li><a href="#profileTab1" class="active">Profile</a></li>
<li><a href="#profileTab2">Activity</a></li>
<li><a href="#profileTab3">Account Settings</a></li>
<li><a href="#profileTab4">Coupon Value</a></li>
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
<div class="col-xs-12 col-sm-12 col-md-12">

<div class="profileSection">
<!--Profle tab1 start-->
<div class="profileHolder active" id="profileTab1">

	<div class="profileBox">
	<h3>PERSONAL INFORMATION <span form-target="personal-information" class="addEdit">Edit</span></h3>
	<ul>
		<li><h5><i class="icon-phone-call"></i><?php echo $user_login['phone']; ?></h5></li>
 		<li><h5><i class="icon-email"></i><?php echo $user_login['email']; ?></h5></li>
 		<li><h5><i class="icon-location"></i> <?php echo $city." ".$state; ?>, India</h5></li>
	</ul>

<form class="detailForm" id="personal-information">

<div id="profile_response" ></div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>First Name <b>*</b></label>
<input type="text" name="" id="profile_fname" value="<?php echo $user_login['firstname']; ?>" placeholder="First Name">
</div>

<div class="col-xs-6 col-sm-6">
<label>Last Name <b>*</b></label>
<input type="text" name="" id="profile_lname" value="<?php echo $user_login['lastname']; ?>" placeholder="Last Name">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Email ID <b>*</b></label>
<input type="text" readonly name="" value="<?php echo $user_login['email']; ?>" readonly>
</div>

<div class="col-xs-6 col-sm-6">
<label>Student Email ID</label>
<input type="text" id="profile_student_email" name="" placeholder="Email ID provided by your college">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Country</label>
<select><option>India (+91)</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Mobile No. <b>*</b></label>
<input type="tel" id="profile_phone" name="" value="<?php echo $user_login['phone']; ?>" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Resident State <b>*</b></label>
<select required id="register_state" class="profile_register_state">
<?php 
				$states = $this->common_model->get_all_rows("states", "country_id",101);
				foreach($states as $stateeach){
					if($stateeach['id']==$state_id){$selected = 'selected';}else{$selected = '';}
				echo '<option  '.$selected.' value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
				}?>
</select>
</div>
<div class="col-xs-6 col-sm-6">
<label>Resident City <b>*</b></label>
<select id="register_city" class="profile_register_city"><option value="<?php echo $city_id; ?>"><?php echo $city; ?></option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Date Of Birth</label>
<input type="text" name="" placeholder="DD-MM-YY" value="<?php echo $dob; ?>" id="profile_dob">
</div>
</div>

<div class="form-group">
<div class="col-xs-12 col-sm-12">
<label>About Me</label>
<input class="fullWidth" type="text" name="" value="<?php echo $about_me; ?>" id="profile_aboutme" placeholder="Your brief introduction">
</div>
</div>

<div class="form-group">
<div class="col-xs-12 col-sm-12">
<label>Bio</label>
<textarea class="fullWidth" id="profile_bio" placeholder="Detailed information about you. You may write about your achievements in education, work and other areas"><?php echo $bio; ?></textarea>
</div>
</div>

<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name=""  class="cancelButton">
<input type="submit" value="Save" name="" id="profile_update_button" class="saveButton">
</div>
</div>

</form>

<span form-target="personal-information" class="addButton"><span>+</span> Add Personal Information</span>

	</div>


	<div class="profileBox">
	<h3>EDUCATION BACKGROUND <span form-target="edit-education-background" class="addEdit">Edit</span></h3>
	<ul>
		<li>
		<h4><i class="icon-graduation-cap"></i> Class XII</h4>
		<h5>Class of 2015</h5>
		</li>
 		<li>
		<h4><i class="icon-graduation-cap"></i> Under Graduation</h4>
		<h5>Class of 2015</h5>
		</li>
	</ul>

<form class="detailForm" id="edit-education-background">
<span class="deleteEntry">Delete</span>
<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Level <b>*</b></label>
<select><option>XII</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>School Name <b>*</b></label>
<input type="text" name="" value="">
</div>

</div>



<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Completion Year</label>
<select><option>2015</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Board</label>
<select><option>Select Board</option></select>
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Stream</label>
<select><option>Select Stream</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Marks</label>
<select><option>Select Marks</option></select>
</div>
</div>

<hr>

<span class="deleteEntry">Delete</span>
<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Level <b>*</b></label>
<select><option>UG</option></select>
</div>

</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>University Name</label>
<input type="text" name="" value="">
</div>

<div class="col-xs-6 col-sm-6">
<label>College Name <b>*</b></label>
<input type="text" name="">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Degree/Diploma Name <b>*</b></label>
<input type="text" name="" value="">
</div>

<div class="col-xs-6 col-sm-6">
<label>Specialization</label>
<input type="text" name="">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Completion Year</label>
<select><option>2015</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Marks</label>
<select><option>Select Marks</option></select>
</div>
</div>

<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>


<form class="detailForm" id="add-education-background">

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Level <b>*</b></label>
<select><option>Select</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>School Name <b>*</b></label>
<input type="text" name="" value="">
</div>

</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Course Completion Year</label>
<select><option>Select Year</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Board</label>
<select><option>Select Board</option></select>
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Marks</label>
<select><option>Select Marks</option></select>
</div>
</div>


<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>

<span form-target="add-education-background" class="addButton"><span>+</span> Add Education Background</span>

	</div>

	<div class="profileBox">
	<h3>WORK EXPERIENCE <span form-target="edit-work-experience" class="addEdit">Edit</span></h3>

<ul>
	
</ul>

<form class="detailForm" id="edit-work-experience">

<span class="deleteEntry">Delete</span>
<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Total Work Experience</label>
<select><option>No Experience</option></select>
</div>

</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Employer Name <b>*</b></label>
<input type="text" name="" value="abcd">
</div>

<div class="col-xs-6 col-sm-6">
<label>Designation <b>*</b></label>
<input type="text" name="" value="Manager">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Function/Department <b>*</b></label>
<input type="text" name="" value="IT">
</div>

<div class="col-xs-6 col-sm-6">
<label>Is this your Current Job? <b>*</b></label>
<div class="radioBut"><input type="radio" name="one"> yes</div>
<div class="radioBut"><input type="radio" name="one"> No</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Marks</label>
<select><option>Select Marks</option></select>
</div>
</div>


<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>


<form class="detailForm" id="add-work-experience">

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Total Work Experience</label>
<select><option>No Experience</option></select>
</div>

</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Employer Name <b>*</b></label>
<input type="text" name="">
</div>

<div class="col-xs-6 col-sm-6">
<label>Designation <b>*</b></label>
<input type="text" name="">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Function/Department <b>*</b></label>
<input type="text" name="">
</div>

<div class="col-xs-6 col-sm-6">
<label>Is this your Current Job? <b>*</b></label>
<div class="radioBut"><input type="radio" name="one"> yes</div>
<div class="radioBut"><input type="radio" name="one"> No</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Marks</label>
<select><option>Select Marks</option></select>
</div>
</div>


<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>


<span form-target="add-work-experience" class="addButton"><span>+</span> Add Work Experience</span>

	</div>

	<div class="profileBox">
	<h3>EDUCATION PREFERENCES <span form-target="edit-education-preferences" class="addEdit">Edit</span></h3>

<ul>
	<li>
		<h4><i class="icon-graduation-cap"></i> India</h4>
		<h5>Interested in studying <b>B.E./B.Tech</b></h5>
		</li>
 		<li>
		<h5>Exam(s) Taken: <b>CAT (65)</b></h5>
		</li>
</ul>


<form class="detailForm" id="edit-education-preferences">

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Your Desired Study Location</label>
<div class="radioBut"><input type="radio" name="study"> India</div>
<div class="radioBut"><input type="radio" name="study"> Abroad</div>
</div>

</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Education Interest</label>
<select><option>Science & Engineering</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Desired Course</label>
<select><option>B.E./B.Tech</option></select>
</div>
</div>

<hr>

<span class="deleteEntry">Delete</span>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Exam Name</label>
<select><option>Other</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Other Exam Name</label>
<input type="text" value="CAT" name="">
</div>
</div>

<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Rank/Score</label>
<input type="text" value="65" name="">
</div>
</div>


<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>

<form class="detailForm" id="add-education-preferences">


<div class="form-group">
<div class="col-xs-6 col-sm-6">
<label>Exam Name</label>
<select><option>Exam Name</option></select>
</div>

<div class="col-xs-6 col-sm-6">
<label>Rank/Score</label>
<input type="text" name="" placeholder="Exam Score">
</div>
</div>

<div class="form-group">
<div class="col-xs-12 col-sm-12">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>
</div>

</form>

<span form-target="add-education-preferences" class="addButton"><span>+</span> Add Educational Preferences</span>

	</div>


</div>
<!--Profle tab1 close-->

<!--Profle tab2 start-->
<div class="profileHolder" id="profileTab2">

<div class="profileBox">
<h3>ACTIVITY STATS</h3>
<div class="col-xs-6">
<div class="row">
<ul>
<li><h4>IQ test</h4> 

		<?php 
		if($coupon['coupon_id']){
			echo "<h5>Your IQ score is ".$coupon['score']."</h5>";
			echo "<div class='iqResult'><h6>Your Coupon code is : ".$coupon['coupon']."</h6></div>";
	    }else{
			echo "<h5>IQ test not given</h5>";
		}
		
		?>


</li>
</ul>
</div>
</div>

<div class="col-xs-6">
<div class="row">

<h4 style="margin:15px 0px 5px 20px; font-size:16px;">Upload registration form</h4>
<form class="settingForm" enctype="multipart/form-data">
<div id="savedoc_response"></div>
<div class="form-group">
<input type="file" id="input_savedoc" name="">
</div>

<div class="form-group">
<input type="button" value="Cancel" name=""  class="cancelButton">
<input type="submit" value="Save" name="" id="sacedoc_save" class="saveButton">
</div>

</form>

</div>
</div>

</div>
	
</div>
<!--Profle tab2 close-->

<!--Profle tab3 start-->
<div class="profileHolder" id="profileTab3">

<div class="profileBox">
<h3>CHANGE PASSWORD</h3>
<form class="settingForm">
<div id="change_password_response"></div>

<div class="form-group">
<label>Current Password</label> <input type="password" id="change_curpassword" name="">
</div>

<div class="form-group">
<label>New Password</label> <input type="password" id="change_password" name="">
</div>

<div class="form-group">
<label>Re Type New Password</label> <input type="password" id="change_cpassword" name="">
</div>

<div class="form-group">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" id="change_password_save" class="saveButton">
</div>


</form>
</div>


<div class="profileBox">
<h3>COMMUNICATION PREFERENCE</h3>
<form class="settingForm">
<div class="form-group">
<input type="checkbox" name=""> <label>I want to receive emails from mentorcell.com</label>
</div>

<div class="form-group">
<input type="button" value="Cancel" name="" class="cancelButton">
<input type="submit" value="Save" name="" class="saveButton">
</div>


</form>
</div>

</div>
<!--Profle tab3 close-->




<!--Profle tab4 start-->
<div class="profileHolder" id="profileTab4">

<div class="profileBox">
<h3>Check Coupon Value</h3>
<form class="settingForm">
<div id="redeem_result"></div>

<div class="form-group">
<label>Select College</label>
<input type="hidden" value="<?php echo $user_login['id']; ?>" id="userid">
	<select id="redeem_college_ids" name="college_id">
		<option value="">Choose a College to apply coupon</option>
		<?php
			/*if($college_lists) {
				foreach($college_lists as $k => $college_list){
					echo '<option value="'.$college_list['id'].'">'.$college_list['name'].'</option>';			
				}
			}*/
			foreach($colleges as $college){
				echo '<option value="'.$college['id'].'">'.$college['name'].'</option>';
			}
		?>	
	</select>
</div>

<div class="form-group">
<label>Select Course</label> 

	<select id="redeem_search_course" name="course_id">						
		<option value="">Choose a course to apply coupon</option>
	</select>
</div>

<!--<div class="form-group">
<label>Select Specialization</label> 

	<select id="redeem_search_special" name="course_id">						
		<option value="">Choose a specialization to apply coupon</option>
	</select>
</div>-->

<div class="form-group">
<input type="button" value="Cancel" class="cancelButton">
<input type="button" value="Save" id="show_coupon_values" class="saveButton">
</div>


</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#redeem_college_ids").change(function(){
		var colllege_id = $("#redeem_college_ids").val();
		$.ajax({
type: "POST",
url: base_url+"index.php/user/select_special",
data: {colllege_id:colllege_id},
cache: false,
success: function(result){
$("#redeem_search_course").html(result);
}
});
	});
        $("#show_coupon_values").click(function(){	
            var colllege_id   = $("#redeem_college_ids").val();
			var coupon_course = $("#redeem_search_course").val();
			var userid = $("#userid").val();
				$.ajax({
type: "POST",
url: base_url+"index.php/user/redeemcoupon",
data: {colllege_id:colllege_id,coupon_course:coupon_course,userid:userid},
cache: false,
success: function(results){
$("#redeem_result").html(results);
}
});
			

		});
		});
		
</script>
</div>


</div>
<!--Profle tab4 close-->



</div>

</div>
</div>
</div>
</section>

