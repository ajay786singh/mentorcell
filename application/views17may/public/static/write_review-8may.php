<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"> <span class="star-color">Write Your</span><span class="review-color"> Review </span></div>



<div class="couponHolder">
	<div class="couponRow" style='display:block;background-image: url(http://mentorcell1.com/assets/theme/images/counselling.jpg);
    background-size: cover;
    background-size: 100%;background-repeat:no-repeat;
    height:auto'>
		<div class="regForm">
			<div id="register_response"></div>
			<form id="register_form">
				<div class="inputRow">
				<label>College Name</label><br>
	<input type="text" list="collegelist" class="register_interest" id="register_fname" required='' placeholder="Institute of Technology and Science" name="college">
			<?php $college_list = $this->common_model->get_all_rows("mc_colleges",'status','2','name'); ?>
			<datalist id="collegelist"  class="register_interest" >
		<?php	foreach($college_list as $collegelist){ ?>
				  <option value="<?=$collegelist['name'];?>">
		<?php } ?>
		</datalist>
				</div>

				<div class="inputRow">
				   <label>Location</label><br>
					<select id="register_interest" class="register_interest"><option>New Delhi</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
		
				</div>
				
				<div class="inputRow">
				   <label>Course</label><br>
					<select id="register_interest" class="register_interest"><option>Course</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
		
				</div>
			
				
				
				<div class="inputRow">
				<label>Title of Review <span class="star-color">*</span></label><br>
				<textarea class="text-style"></textarea>	
	
				</div>
				
				<div class="inputRow">
				<label>Other Detail <span class="star-color">*</span></label><br>
				<textarea class="text-style"></textarea>	
	
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

  <form action="">
    <input class="star star-5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>
  </form>
</div>


</div>
</div>


<div class="inputRow">
<div class="col-md-7">
<label class="label-style">Colleage And Campus Life </label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">

  <form action="">
    <input class="star star-6" id="star-6" type="radio" name="star"/>
    <label class="star star-6" for="star-6"></label>
    <input class="star star-7" id="star-7" type="radio" name="star"/>
    <label class="star star-7" for="star-7"></label>
    <input class="star star-8" id="star-8" type="radio" name="star"/>
    <label class="star star-8" for="star-8"></label>
    <input class="star star-9" id="star-9" type="radio" name="star"/>
    <label class="star star-9" for="star-9"></label>
    <input class="star star-10" id="star-10" type="radio" name="star"/>
    <label class="star star-10" for="star-10"></label>
  </form>
</div>
</div>
</div>



<div class="inputRow">
  <div class="col-md-7">
		<label class="label-style">Colleage Placements</label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">

  <form action="">
    <input class="star star-11" id="star-11" type="radio" name="star"/>
    <label class="star star-11" for="star-11"></label>
    <input class="star star-12" id="star-12" type="radio" name="star"/>
    <label class="star star-12" for="star-12"></label>
    <input class="star star-13" id="star-13" type="radio" name="star"/>
    <label class="star star-13" for="star-13"></label>
    <input class="star star-14" id="star-14" type="radio" name="star"/>
    <label class="star star-14" for="star-14"></label>
    <input class="star star-15" id="star-15" type="radio" name="star"/>
    <label class="star star-15" for="star-15"></label>
  </form>
</div>
		</div>
		</div>
		
		
		<div class="inputRow">
		<div class="col-md-7">
		<label class="label-style">Campus Facilities</label>
		</div>
		
		
		<div class="col-md-5">
		<div class="stars">

  <form action="">
    <input class="star star-16" id="star-16" type="radio" name="star"/>
    <label class="star star-16" for="star-16"></label>
    <input class="star star-17" id="star-17" type="radio" name="star"/>
    <label class="star star-17" for="star-17"></label>
    <input class="star star-18" id="star-18" type="radio" name="star"/>
    <label class="star star-18" for="star-18"></label>
    <input class="star star-19" id="star-19" type="radio" name="star"/>
    <label class="star star-19" for="star-19"></label>
    <input class="star star-20" id="star-20" type="radio" name="star"/>
    <label class="star star-20" for="star-20"></label>
  </form>
</div>
		</div>
		</div>
		
		
		<div class="inputRow">
		<div class="col-md-7">
		<label class="label-style">Faculty</label>
		</div>
		
		<div class="col-md-5">
		<div class="stars">

  <form action="">
    <input class="star star-21" id="star-21" type="radio" name="star"/>
    <label class="star star-21" for="star-21"></label>
    <input class="star star-22" id="star-22" type="radio" name="star"/>
    <label class="star star-22" for="star-22"></label>
    <input class="star star-23" id="star-23" type="radio" name="star"/>
    <label class="star star-23" for="star-23"></label>
    <input class="star star-24" id="star-24" type="radio" name="star"/>
    <label class="star star-24" for="star-24"></label>
    <input class="star star-25" id="star-25" type="radio" name="star"/>
    <label class="star star-25" for="star-25"></label>
  </form>
</div>
		</div>
		</div>



			<div class="inputRow">
		<h4>Would you recommend others to take admission in your college?</h4><br>
		 <div class="col-md-3">
		  <input type="radio" name="yes" class="radio-style">Yes
		  </div>
		  <div class="col-md-3">
		  <input type="radio" name="yes" class="radio-style">No<br>
		  </div>
		  
		
		</div>
		<br>
		
		<hr>
		<div class="inputRow">
		   <h4>Personal Details</h4><br>
				<label>First Name <span class="star-color">*</span></label><br>
					<input type="text" id="register_fname" required=''  name="">
				
				</div>
				
				<div class="inputRow">
				<label>Last Name <span class="star-color">*</span></label><br>
					<input type="text" id="register_fname" required='' name="">
				
				</div>
				
				
				<div class="inputRow">
				<label>Email ID <span class="star-color">*</span></label><br>
					<input type="text" id="register_fname" required='' name="">
				
				</div>
				
				
				
			


				<div class="inputRow">
					<input type="button" value="Submit"  id="send_query" class="go" value="Send Query" name="send_query">
				</div>
			</form>



		</div>
		<!--
    <div class="col-md-6">
      <!--<img style="width:100%" src="<?php echo base_url('assets/theme/images/counselling.jpg')?>" />
      -->
    </div>


	</div>
	
	
  

</div>




<style>
.couponHolder {
    text-align: center;
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
    padding: 9px 70px !important;
}
</style>

</div>
</div>
</div>
</section>
