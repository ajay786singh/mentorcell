<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"> <span class="star-color">Write Your</span><span class="review-color"> Review </span></div>

<div class="sectionHeading1"><p>Your college review can help thousands of students make an informed college decision.<br>

To increase your chances of having your review accepted on Shiksha, make your review HONEST and DETAILED by giving specifics on Placements, Internships, Infrastructure, Curriculum and Faculty.<p>
<h4>We will reject your review if:<h4<br>
 <ol>
   <li> It is too short and vague, without any useful information</li>
   <li> You have copied text from anywhere on the internet</li>
   <li> You have used junk characters, SMS language, slang or abusive words in your review</li>
   <li> Your personal details could not be verified</li>
 <ol>
 </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="couponHolder">
	<div class="couponRow" style='display:block;background-image: url(http://mentorcell1.com/assets/theme/images/counselling.jpg);
    background-size: cover;
    background-size: 100%;background-repeat:no-repeat;
    height:auto'>
		<div class="regForm">
			<div id="register_response"></div>
			 <?php if(!empty($message)){ echo $message; } ?>
			<?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_stream'));
									?>
				<div class="inputRow">
				<label>College Name</label><br>
	<select class="collegeserh register_interest" id="college_name" required='' name="college_name">
	<option value="">Select</option>
			<?php $college_list = $this->common_model->get_all_rows("mc_colleges",'status','2','name'); ?>
		<?php	foreach($college_list as $collegelist){ ?>
				  <option  value="<?=$collegelist['id'];?>"><?=$collegelist['name'];?></option>
		<?php } ?>
		</select>
				</div>

				<div class="inputRow">
				   <label>Stream</label><br>
				   <input type="hidden" id="strcole" value="">
					<select id="stream_name" name="stream_name" class="stremdat register_interest">
					<option value="">Select</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
		
				</div>
				
				<div class="inputRow">
				   <label>Course</label><br>
					<select id="course_name" name="course_name" class="courdat register_interest"><option>Course</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
		
				</div>
			
				
				
				<div class="inputRow">
				<label>Title of Review <span class="star-color">*</span></label><br>
				<textarea class="text-style" id="review_title" name="review_title"></textarea>	
	
				</div>
				
				<div class="inputRow">
				<label>Other Detail <span class="star-color">*</span></label><br>
				<textarea class="text-style" id="review_detail" name="review_detail"></textarea>	
	
				</div>
				
				<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="col-xs-12 col-md-8">

        <div class="inputRow">
		<h4>Rate Your College On The Following Parameters</h4><br>
		<div class="col-md-7">
		<label class="label-style">Worth The Money</label>
		</div>
		<div class="col-md-5">
          <div class="stars">
<input type="hidden" name="worth_money" value="0" id="worth_money">
    <input class="star star-5" id="star-5" value="5" type="radio" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" value="4" type="radio" />
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" value="3" type="radio" />
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" value="2" type="radio" />
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" value="1" type="radio" />
    <label class="star star-1" for="star-1"></label>
</div>


</div>
</div>


<div class="inputRow">
<div class="col-md-7">
<label class="label-style">Colleage And Campus Life </label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">
<input type="hidden" name="campus_life" value="0" id="campus_life">
    <input class="star star-6" id="star-6" value="5" type="radio" />
    <label class="star star-6" for="star-6"></label>
    <input class="star star-7" id="star-7" value="4" type="radio" />
    <label class="star star-7" for="star-7"></label>
    <input class="star star-8" id="star-8" value="3" type="radio" />
    <label class="star star-8" for="star-8"></label>
    <input class="star star-9" id="star-9" value="2" type="radio" />
    <label class="star star-9" for="star-9"></label>
    <input class="star star-10" id="star-10" value="1" type="radio" />
    <label class="star star-10" for="star-10"></label>
</div>
</div>
</div>




<div class="inputRow">
  <div class="col-md-7">
		<label class="label-style">Colleage Placements</label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">
<input type="hidden" name="college_placment" value="0" id="college_placment">
    <input class="star star-11" id="star-11" value="5" type="radio" />
    <label class="star star-11" for="star-11"></label>
    <input class="star star-12" id="star-12" value="4" type="radio" />
    <label class="star star-12" for="star-12"></label>
    <input class="star star-13" id="star-13" value="3" type="radio" />
    <label class="star star-13" for="star-13"></label>
    <input class="star star-14" id="star-14" value="2" type="radio" />
    <label class="star star-14" for="star-14"></label>
    <input class="star star-15" id="star-15" value="1" type="radio" />
    <label class="star star-15" for="star-15"></label>
</div>
		</div>
		</div>
		
		
		<div class="inputRow">
		<div class="col-md-7">
		<label class="label-style">Campus Facilities</label>
		</div>
		
		
		<div class="col-md-5">
		<div class="stars">
<input type="hidden" name="campus_facility" value="0" id="campus_facility">

    <input class="star star-16" id="star-16" value="5" type="radio" />
    <label class="star star-16" for="star-16"></label>
    <input class="star star-17" id="star-17" value="4" type="radio" />
    <label class="star star-17" for="star-17"></label>
    <input class="star star-18" id="star-18" value="3" type="radio" />
    <label class="star star-18" for="star-18"></label>
    <input class="star star-19" id="star-19" value="2" type="radio" />
    <label class="star star-19" for="star-19"></label>
    <input class="star star-20" id="star-20" value="1" type="radio" />
    <label class="star star-20" for="star-20"></label>
</div>
		</div>
		</div>
		
		
		<div class="inputRow">
		<div class="col-md-7">
		<label class="label-style">Faculty</label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">
<input type="hidden" name="faculty" value="0" id="faculty">

    <input class="star star-21" id="star-21" value="5" type="radio" />
    <label class="star star-21" for="star-21"></label>
    <input class="star star-22" id="star-22" value="4" type="radio" />
    <label class="star star-22" for="star-22"></label>
    <input class="star star-23" id="star-23" value="3" type="radio" />
    <label class="star star-23" for="star-23"></label>
    <input class="star star-24" id="star-24" value="2" type="radio" />
    <label class="star star-24" for="star-24"></label>
    <input class="star star-25" id="star-25" value="1" type="radio" />
    <label class="star star-25" for="star-25"></label>
</div>
		</div>
		</div>



			<div class="inputRow">
		<h4>Would you recommend others to take admission in your college?</h4><br>
		 <div class="col-md-3">
		  <input type="radio" id="college_recomd" name="college_recomd" value="Yes" class="radio-style">Yes
		  </div>
		  <div class="col-md-3">
		  <input type="radio" id="college_recomd" name="college_recomd" value="No" class="radio-style">No<br>
		  </div>
		  
		
		</div>
		<br>
		
		<hr>
		<div class="inputRow">
		   <h4>Personal Details</h4><br>
				<label>First Name <span class="star-color">*</span></label><br>
					<input type="text" id="fname" required=''  name="fname">
				
				</div>
				
				<div class="inputRow">
				<label>Last Name <span class="star-color">*</span></label><br>
					<input type="text" id="lname" required='' name="lname">
				
				</div>
				
				
				<div class="inputRow">
				<label>Email ID <span class="star-color">*</span></label><br>
					<input type="text" id="email" required='' name="email">
				
				</div>
				
				<div class="inputRow">
					<input type="submit" id="send_query" class="go" value="Send Query" >
				</div>
		<?php echo form_close();?>



		</div>
		<!--
    <div class="col-md-6">
      <!--<img style="width:100%" src="<?php echo base_url('assets/theme/images/counselling.jpg')?>" />
      -->
    </div>


	</div>
	
	
  

</div>




<style>
.sectionHeading.sec2 p {
    font-size: 18px;
}
.sectionHeading.sec2 {
    text-transform: capitalize;
    font-size: 24px;
    display: block;
    position: relative;
    text-align: center;
    margin: 0px 0px 0px 0px;
    color: #15202f;
    font-weight: 600;
    margin-bottom: 65px;
}


.sectionHeading1 p {
    font-size: 14px !important;
    text-align: left;
    color: #333;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600 !important;
}
.sectionHeading1 h4{
	font-size: 18px;
    font-weight: bold;
	font-family: 'Open Sans', sans-serif;
}
.sectionHeading1 ol li {
    font-size: 14px;
    list-style-type: decimal;
    margin: 10px 5px 5px 18px;
}
.sectionHeading.sec2 p {
    text-align: center;
}


.couponHolder {
    text-align: center;
	margin-top: 35px;
}
.sectionHeading{
	margin:28px 0px 40px 0px;
}
.couponHolder .regForm .inputRow input, .couponHolder .regForm .inputRow select {
    
     padding: 0px 0px 0px 0px; 
}
label{
	float:left;
}
.couponHolder .regForm .inputRow input, .couponHolder .regForm .inputRow select {
    padding: 0px 49px 0px 8px;
}
.text-style{
	width:100%;
	border-radius:6px;
}

<!--rating star-->
div.stars {
  width: 270px;
  display: inline-block;
}
input.star { display: none; }
label.star {
  float: right;
  padding: 10px;
  font-size: 27px;
  color: #444;
  transition: all .2s;
  margin-left: -11px;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
.col-md-8 {
    width: 100% !important;
}
label.star {
    padding: 3px;
    font-size: 23px;
    margin-left: 0px; 
	}
	
	.couponHolder .regForm .inputRow {
    margin: 0px 0px 21px 0px;
    position: relative;
   
}

.stars {
    display: inline-block;
}
.label-style{
	padding-top:10px;
}
.radio-style{
  height:16px !important;
  position:absolute;
  right:25px;
}
h4, .h4 {
    text-align: left;
}
.couponHolder .regForm .inputRow input.go{
	float:left;
}

hr {
    margin-top: 0px; 
    border-top: 1px solid #f77a52;
}
.star-color{
	color:#f77a52;
}
.review-color{
	color:#15202f !important;
}
.sectionHeading span{
	color:none;
}
.inputRow{width:100%; float:left;}
.inputRow h4{line-height:auto;
}
	
	.couponHolder .regForm {
    margin: -37px 0px !important;
	}
	.footerSection {
		margin-top:43px;
	}
	.containerBox {
    padding: 9px 70px;
}


.sectionHeading p{
	font-size:14px;
	text-align:left;
	color:#333;
}
.sectionHeading h4 {
    font-size: 18px;
    font-weight: bold;
}
.sectionHeading ol li {
    font-size: 14px;
	list-style-type: decimal;
	margin:10px 5px 5px 18px;
}
.couponHolder .regForm{
	width:100% !important;
}
.text-style{
	height:80px;
	resize:none;
}
		
</style>
  
<script>
$(document).ready(function(){
$(".collegeserh").change(function(){
	var college_id = $(".collegeserh").val();
	$.ajax({
		url: base_url+"index.php/home/get_stream_by_college/"+college_id,
		data:"",
		async:false,
		success: function(html){
			$(".stremdat").html(html);
			$("#strcole").val(college_id);
		}
	});
		
});

$(".stremdat").change(function(){
	var stream_name  = $(".stremdat").val();
	var college_id = $("#strcole").val();
		$.ajax({
		url: base_url+"index.php/home/get_coursetype_list_by_stream/"+stream_name+"/"+college_id,
		data:"",
		async:false,
		success: function(html){
			$(".courdat").html(html);
		}
	});
});
});
</script>
<script>
$(document).ready(function(){
$("#star-5").click(function(){
	var starrate5 = $("#star-5").val();
			$("#worth_money").val(starrate5);
});
$("#star-4").click(function(){
	var starrate4 = $("#star-4").val();
			$("#worth_money").val(starrate4);
});
$("#star-3").click(function(){
	var starrate3= $("#star-3").val();
			$("#worth_money").val(starrate3);
});
$("#star-2").click(function(){
	var starrate2= $("#star-2").val();
			$("#worth_money").val(starrate2);
});
$("#star-1").click(function(){
	var starrate1= $("#star-1").val();
			$("#worth_money").val(starrate1);
});
$("#star-6").click(function(){
	var starrate6 = $("#star-6").val();
			$("#campus_life").val(starrate6);
});
$("#star-7").click(function(){
	var starrate7 = $("#star-7").val();
			$("#campus_life").val(starrate7);
});
$("#star-8").click(function(){
	var starrate8= $("#star-8").val();
			$("#campus_life").val(starrate8);
});
$("#star-9").click(function(){
	var starrate9= $("#star-9").val();
			$("#campus_life").val(starrate9);
});
$("#star-10").click(function(){
	var starrate10= $("#star-10").val();
			$("#campus_life").val(starrate10);
});
$("#star-11").click(function(){
	var starrate11 = $("#star-11").val();
			$("#college_placment").val(starrate11);
});
$("#star-12").click(function(){
	var starrate12 = $("#star-12").val();
			$("#college_placment").val(starrate12);
});
$("#star-13").click(function(){
	var starrate13= $("#star-13").val();
			$("#college_placment").val(starrate13);
});
$("#star-14").click(function(){
	var starrate14= $("#star-14").val();
			$("#college_placment").val(starrate14);
});
$("#star-15").click(function(){
	var starrate15= $("#star-15").val();
			$("#college_placment").val(starrate15);
});
$("#star-16").click(function(){
	var starrate16 = $("#star-16").val();
			$("#campus_facility").val(starrate16);
});
$("#star-17").click(function(){
	var starrate17 = $("#star-17").val();
			$("#campus_facility").val(starrate17);
});
$("#star-18").click(function(){
	var starrate18= $("#star-18").val();
			$("#campus_facility").val(starrate18);
});
$("#star-19").click(function(){
	var starrate19= $("#star-19").val();
			$("#campus_facility").val(starrate19);
});
$("#star-20").click(function(){
	var starrate20= $("#star-20").val();
			$("#campus_facility").val(starrate20);
});
$("#star-21").click(function(){
	var starrate21 = $("#star-21").val();
			$("#faculty").val(starrate21);
});
$("#star-22").click(function(){
	var starrate22 = $("#star-22").val();
			$("#faculty").val(starrate22);
});
$("#star-23").click(function(){
	var starrate23= $("#star-23").val();
			$("#faculty").val(starrate23);
});
$("#star-24").click(function(){
	var starrate24= $("#star-24").val();
			$("#faculty").val(starrate24);
});
$("#star-25").click(function(){
	var starrate25= $("#star-25").val();
			$("#faculty").val(starrate25);
});
});
</script>

</div>
</div>
</div>
</section>
