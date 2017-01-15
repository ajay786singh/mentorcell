/*containw the ajax requests*/
$(document).ready(function() {
	
	/*registration*/
		$("#register_button").click(function(event) {
			event.preventDefault();
			var email = $("input#register_email").val();
			var password = $("input#register_password").val();
			var phone = $("input#register_phone").val();
			var interest = $("input#register_interest").val();
			var course = $("input#register_course").val();
			var city = $("input#register_city").val();
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/home/register",
				dataType: 'json',
				data: {email:email, password:password, phone:phone, interest:interest, course:course, city: city },
				success: function(res) {
					if (res)
					{
						$('#register_response').html(res.message);
						if(res.status==true){
							$('#register_form').hide();
							$('#otp_form').show();
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
			
			jQuery.ajax({
				type: "POST",
				url: base_url+"index.php/home/verify_otp",
				dataType: 'json',
				data: {otp:register_otp},
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
			var identity = $("input#login_email").val();
			var password = $("input#login_password").val();
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
							setTimeout(function(){window.location.reload(); }, 3000);
							
						}
					}
				}
			});
		});
	/*login*/

	
});