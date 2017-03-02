/*containw the ajax requests*/
$(document).ready(function() {
	
	/*registration*/
		$("#register_button").click(function(event) {
			event.preventDefault();
			var fname = $("input#register_fname").val();
			var lname = $("input#register_lname").val();
			var email = $("input#register_email").val();
			var phone = $("input#register_phone").val();
			var interest = $("select#register_interest").val();
			var course = $("select#register_course").val();
			var state = $("select#register_state").val();
			var city = $("select#register_city").val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/register",
				dataType: 'json',
				data: {first_name:fname,last_name:lname,email:email, phone:phone, interest:interest, course:course,state:state,city: city },
				success: function(res) {
					if (res)
					{
						$('#register_response').html(res.message);
						if(res.status==true){
							$('#register_form').hide();
							$('#otp_form').show();
							$('#otp_form #user_otp').val(res.user_id);
							console.log(res.user_id);
						}
					}
				}
			});
		});
	/*registration*/
	/*otp verification*/
		$("#register_button_otp").click(function(event) {
			event.preventDefault();
			var register_otp = $("input#register_otp").val();
			var user_id = $('#user_otp').val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/verify_otp",
				dataType: 'json',
				data: {otp:register_otp,user_id:user_id},
				success: function(res) {
					if (res)
					{
						$('#register_response').html(res.message);
						if(res.status==true){
							$('#register_form').hide();
							$('#otp_form').hide();
							setTimeout(function(){window.location.reload(); }, 1500);
							
						}
					}
				}
			});
		});
	/*otp verification*/
	
	/*login*/
		$("#login_button").click(function(event) {
			event.preventDefault();
			var identity 		= $("input#login_email").val();
			var password 		= $("input#login_password").val();
			var couponClicked 	= $("#couponClicked").val();
			var remember = 0;
			if($("input#login_remember").is(':checked')){remember=1;}else{remember=0;}
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/login",
				dataType: 'json',
				data: {identity:identity, password:password, remember:remember},
				success: function(res) {
					if (res)
					{
						$('#login_response').html(res.message);
						if(res.status==true){
							// setTimeout(function(){window.location.reload(); }, 3000);
							setTimeout(function(){
								if(couponClicked == 1) {
									location.href = base_url+"coupon/";
								} else {
									window.location.reload();
								}
							}, 1500);
							
						}
					}
				}
			});
		});
	/*login*/

	
	
	/*forgot password*/
		$("#forgot_button").click(function(event) {
			event.preventDefault();
			var identity = $("input#forgot_email").val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/forgotpassword",
				dataType: 'json',
				data: {identity:identity},
				success: function(res) {
					if (res)
					{
						$('#forgot_response').html(res.message);
						if(res.status==true){
							setTimeout(function(){
								//window.location.reload(); 
								 $('#forgotModal').modal('hide');
							}, 1500);
							
						}
					}
				}
			});
		});
	/*forgot password*/
	
	/*forgot password*/
		$("#forgotset_button").click(function(event) {
			event.preventDefault();
			var password = $("input#forgotset_password").val();
			var cpassword = $("input#forgotset_cpassword").val();
			var code = $("input#forgotset_code").val();
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/setpassword",
				dataType: 'json',
				data: {password:password,cpassword:cpassword,code:code},
				success: function(res) {
					if (res)
					{
						$('#forgotset_response').html(res.message);
						if(res.status==true){
							setTimeout(function(){
								window.location.href=base_url; 
								 //$('#forgotsetModal').modal('hide');
							}, 1500);
							
						}
					}
				}
			});
		});
	/*forgot password*/
	
	
	/*change new password*/
		$("#change_password_save").click(function(event) {
			event.preventDefault();
			var curpassword = $("input#change_curpassword").val();
			var password = $("input#change_password").val();
			var cpassword = $("input#change_cpassword").val();
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/changepassword",
				dataType: 'json',
				data: {curpassword:curpassword,password:password,cpassword:cpassword},
				success: function(res) {
					if (res)
					{
						$('#change_password_response').html(res.message);
						if(res.status==true){
							$("input#change_curpassword").val('');
							$("input#change_password").val('');
							$("input#change_cpassword").val('');
						}
					}
				}
			});
		});
	/*change new password*/
	
	
	/*upload file for student*/
		$("#sacedoc_save").click(function(event) {
			event.preventDefault();

			var file_data = $('#input_savedoc').prop('files')[0];  
			if(file_data=='' || typeof file_data == "undefined" ){$('#savedoc_response').html('Choose a file!');return false;}	
			var form_data = new FormData();                  
			form_data.append('file', file_data);
		
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/savedoc",
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success: function(res) {
					if (res)
					{
						$('#savedoc_response').html(res.message);
						if(res.status==true){
							$('#input_savedoc').val('');
							//setTimeout(function(){
								//window.location.href=base_url; 
								 //$('#forgotsetModal').modal('hide');
							//}, 1500);
							
						}
					}
				}
			});
		});
	/*upload file for student*/
	
	
	/*profile personal informatio*/
		$("#profile_update_button").click(function(event) {
			event.preventDefault();
			var fname = $("#personal-information #profile_fname").val();
			var lname = $("#personal-information #profile_lname").val();
			var email = $("#personal-information #profile_student_email").val();
			var phone = $("#personal-information #profile_phone").val();
			//var interest = $("select#register_interest").val();
			//var course = $("select#register_course").val();
			var state = $("#personal-information .profile_register_state").val();
			var city = $("#personal-information .profile_register_city").val();
			
			var dob = $("#personal-information #profile_dob").val();
			var aboutMe = $("#personal-information #profile_aboutme").val();
			var bio = $("#personal-information #profile_bio").val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/user/profileupdate",
				dataType: 'json',
				data: {first_name:fname,last_name:lname,email:email, phone:phone, dob:dob, aboutme:aboutMe,bio:bio,state:state,city: city },
				success: function(res) {
					if (res)
					{
						$('#profile_response').html(res.message);
						if(res.status==true){
							console.log(res.user_id);
						}
					}
				}
			});
		});
	/*profile personal informatio*/
	
	
	
	
	/**/
	/**/
		$("#register_interest").change(function(){
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/user/courses",
				dataType: 'text',
				data: {stream:$(this).val()},
				success: function(res) {
					$("#register_course").html(res);
				}
			});
		});
	
	/**/
	
	/*Question Answer Submit*/
		$("#question_answer").click(function(event) {
			event.preventDefault();
			var question_ids	= 	$("#question_ids").val();
			var course_id		= 	$("#course_id").val();
			var a_answers		=	Array();
			if(question_ids) {
				a_question_ids	=	question_ids.split(",");
				for(i=0;i<a_question_ids.length;i++) {
					var answer	= 	$("input[name='answer"+a_question_ids[i]+"']:checked").val();
					if(answer != undefined) {
						a_answers.push(a_question_ids[i]+":"+answer);
					}
				}
			}
			if(a_question_ids.length != a_answers.length) {
				alert("Kindly answer all the questions!!");
				return false;
			}
			answers	=	"";
			if(a_answers) {
				var answers	=	a_answers.join(",");
			}
			// 
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"coupon/question_answer_submitted",
				dataType: 'json',
				data: {answers_val:answers,course_id:course_id},
				success: function(res) {
					if (res)
					{
						/* if(res.message.match(/alert-warning/g)){
							$('#iqResult').html(res.message);
						}  */
						$('.iqResult').html(res.message);
						$('#couponTab3').addClass('active');
						$('#couponBox2').removeClass('active');
						$('#couponBox3').addClass('active');
					}
				}
			});
		});
	/*login*/
	
	
	
	$("#register_state").change(function(event) {
			
			var state_id = $(this).val();
			
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/user/city",
				dataType: 'text',
				data: {state_id:state_id},
				success: function(res) {
					$("#register_city").html(res);
				}
			});
		});
		
		
		
		
		$("#search_college").chosen().change(function() {
			var college_id = $(this).val();
			
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/home/clgcity",
				dataType: 'json',
				data: {college_id:college_id},
				success: function(res) {
					console.log(res);
					$("#register_city_location").val(res.city).trigger("chosen:updated").prop('disabled', true).trigger("chosen:updated");
					
					
				}
			});
		});
	
	
});


