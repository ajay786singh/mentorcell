/*containw the ajax requests*/
$(document).ready(function() {
	
	/*registration*/
		$("#register_button").click(function(event) {
			event.preventDefault();
			var fname = $("input#register_fname").val();
			var lname = $("input#register_lname").val();
			var email = $("input#register_email").val();
			var phone = $("input#register_phone").val();
			var interest = $("input#register_interest").val();
			var course = $("input#register_course").val();
			var city = $("input#register_city").val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/home/register",
				dataType: 'json',
				data: {first_name:fname,last_name:lname,email:email, phone:phone, interest:interest, course:course, city: city },
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
				url: base_url+"index.php/home/verify_otp",
				dataType: 'json',
				data: {otp:register_otp,user_id:user_id},
				success: function(res) {
					if (res)
					{
						$('#register_response').html(res.message);
						if(res.status==true){
							$('#register_form').hide();
							$('#otp_form').hide();
							setTimeout(function(){window.location.reload(); }, 3000);
							
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
				url: base_url+"index.php/home/login",
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
							}, 3000);
							
						}
					}
				}
			});
		});
	/*login*/

	
	/**/
	/**/
		$("#register_interest").change(function(){
			jQuery.ajax({
				type: "GET",
				url: base_url+"index.php/home/courses",
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
				url: base_url+"index.php/home/city",
				dataType: 'text',
				data: {state_id:state_id},
				success: function(res) {
					$("#register_city").html(res);
				}
			});
		});
		
	
	
});