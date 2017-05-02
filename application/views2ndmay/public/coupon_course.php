<section class="bgWhite">
<div class="container">
	<div class="row">
		<div class="containerBox">
			<div class="sectionHeading">Select a course to get a coupon</div>			
			<form name="couponCourse" action="" method="POST" onSubmit="return check();">
				<div class="formcol50">
				<select id="search_course" name="course_id">
				<option value="">Choose a Course to Join</option>
					<?php 
						foreach($courses as $course){			
							echo '<option   value="'.$course['course_id'].'">'.$course['course_name'].'</option>';			
						}
					?>	
				</select>
				</div>
				<input type="hidden" name="coupon_course_submitted" value="1">
				<input type="submit" name="submit1" value='Submit' class='go'>
			</form>
		</div>
	</div>
</div>
</section>
<script>
	function check() {
		if(document.getElementById('search_course').value == "") {
			alert("Kindly select a course!!");
			return false;
		}
		return true;
	}
</script>