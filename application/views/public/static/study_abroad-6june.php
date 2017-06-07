     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <div id="back">
      <div class="container">

      <div class="content-box">
          <!--<h2>ABROAD EDUCATION</h2>-->
         <P>Are you looking to Study Abroad (US, Europe, UK, Australia, Canada, Singapore, New Zealand)</P>
		 
		 <h2>Fill the form for FREE Counseling</h2>
		 <img src="http://ec2-35-154-102-247.ap-south-1.compute.amazonaws.com/assets/theme/images/right_hand.png">
		<p style="font-size:17px !important; margin-top: 19px;">Mentorcell.com will assist you to get admission at the best University with a course of your choice.</p>
      </div><!--end of content box-->

     	  <?php echo form_open_multipart(current_url(), array('class' => 'form-back'));?>

        
            <div class="top-head">
              <h3>Get FREE (Study Abroad)</h3>
            </div><!--end of top head-->

              <div class="main">

              <div class="inner-background">
            
                <div class="form-group col-md-12">
               <label>Name</label>
               <input type="text" class="form-control" name="name" placeholder="Enter your full name" id="name">
               </div>
               

               <div class="form-group col-md-6">
               <label>Email Address</label>
               <input type="email" class="form-control" name="email" placeholder="Enter your ID" id="email">
               </div>

               <div class="form-group col-md-6">
               <label>Mobile No.</label>
               <input type="text" class="form-control" name="phone" placeholder="Contact No" id="phone">
               </div>
			   
			   <div class="form-group col-md-6">
               <label>State</label>
               <select class="register_state form-control" name="state" id="state">
                 <option>State</option>
				 <?php

				$states = $this->common_model->get_all_rows("states", "country_id",101);
				foreach($states as $stateeach){
				echo '<option  value="'.$stateeach['id'].'">'.$stateeach['name'].'</option>';
					$cities = $this->common_model->get_all_rows("cities", "state_id",$stateeach['id']);
				}?>

               </select>
               </div>

               <div class="form-group col-md-6">
               <label>City</label>
               <select class="register_city form-control" name="city" id="city">
                 <option>City</option>
               </select>
               </div>

			   
			  <div class="form-group col-md-6">
               <label>Desire Courses</label>
               <select class="form-control" name="register_course" id="register_course">
			    <option value="">Desire Courses</option>
			   <?php
					$course = $this->common_model->get_all_rows("mc_desire_course", 1,1);
					foreach($course as $courses){
							echo '<option  value="'.$courses['id'].'">'.$courses['name'].'</option>';
					} ?>
               </select>
               </div>
			   
			    <div class="form-group col-md-6">
               <label>Intake</label>
               <select class="register_country form-control" name="intake" id="intake">
                 <option value="">Intake</option>
				 <?php
					$intak = $this->common_model->get_all_rows("mc_intake", 1,1);
					foreach($intak as $intakes){
							echo '<option  value="'.$intakes['id'].'">'.$intakes['name'].'</option>';
					} ?>
               </select>
               </div>
			   
			   <div class="form-group col-md-6">
               <label>Desire Country</label>
               <select class="form-control" name="country" id="country">
                 <option value="">Desire Country</option>
				 <?php
					$countries = $this->common_model->get_all_rows("mc_desire_country", 1,1);
					foreach($countries as $country){
							echo '<option  value="'.$country['id'].'">'.$country['name'].'</option>';
					} ?>
               </select>
               </div>

                <div class="form-group col-md-12">
			     <button class="button-style3" type="submit" btn btn-default id="studyabroad button-sub">SUBMIT</button>
               </div>

               </div><!--end of inner background-->

               </div><!--main form back--> 

               

               

            </form><!--end of form--> 

        </div><!--end of container--> 
          
         </div><!--end of back-->
		   <style type="text/css">
		   
		   
		   /**02-06-17**/
    .content-box img {
    width: 5%;
    position: absolute;
    top: 473px;
    left: 539px;
}
		   
		   
.content-box p {
	font-weight: 300 !important;
    font-size: 47px !important;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
	font-family: 'Open Sans', sans-serif;
}
		   
		   
		   
		   
		   /**25-5-17**/
		   
	blockquote{	   
    font-size: 18px;
    width: 100%;
    margin: 0.25em 0;
    line-height: 1.45;
    position: relative;
    color: #fff;
    border-left: none;
}
blockquote::after {
    font-family: Georgia, serif;
    display: block;
    content: "\201C";
    font-size: 60px;
    position: absolute;
    left: 4px;
    top: -4px;
    color: #fff;
}
blockquote::before {
    font-family: Georgia, serif;
    display: block;
    content: "\201D";
    font-size: 60px;
    position: absolute;
    left: 207px;
    top: 313px;
    color: #fff;
}
.footerTop .footerWidget ul li a:hover{
	text-decoration: none;
}
.userNav:after{
  margin-top: -13px;	
}
.modal-content{
margin-left: 78px;
}	
		   
		   
		   
		   
  	body{
  		margin:0;
  		padding: 0px;
  	}
    header{
      width: 100%;
      height: 70px;
      background:#ccc;
      float: left;
      clear: both;
    }
     #back{
        background-image: url(<?php echo base_url('assets/theme/images/slider-study.jpg'); ?>);
        width: 100%;
        background-repeat: no-repeat;
        float: left;
        height: 1020px;
     }
     .content-box{
      width: 596px;
      background-color: rgba(0,0,0,0.2);
      float: left;
      margin-top: 169px;
      padding: 28px 29px 32px 34px;
     }
     .content-box h2{
      font-family: 'Open Sans', sans-serif;
      font-size: 1.8em;
      color: #fff;
	 line-height: 1.4em;
     }
	 /**
     .content-box p{
      font-family: 'Open Sans', sans-serif;
      font-size: 16px;
      font-weight: 300;
      color: #fff;
      text-align: left;
      line-height: 128%;
      padding: 7px 0px 0px 30px;
     }**/
     .form-back{
      width: 548px;
      height: auto;
      background: #fff;
      float: right;
      margin-top: 168px;

     }
     .top-head{
       width: 549px;
       height: 73px;
       background-color: #ea5c2e;
       float: left;
     }
     .form-group {
    margin-bottom: 18px;
}
.form-control{
  height: 45px;
  border-radius:0;
  border: 1px solid #b8b8b8;
  letter-spacing: 1px;
}
textarea.form-control {
    height: 85px;
    resize: none;
}
button#button-sub {
    width: 106px;
    height: 37px;
    background: #f66132;
    color: #fff;
    border: none;
    outline: none;
    border-radius: 6px;
    margin-top: 20px;
    margin-bottom: 10px;
}
label {
    font-weight: normal;
    color: #333;
}
   

.container{
  padding-right: 0px !important; 
  padding-left: 0px !important; 
}
.top-head h3{
  padding: 6px 0 10px;
  color: #fff;
  font-family: 'Open Sans', sans-serif;
  text-align:center;

}
.form-control:focus {
    border-color: #b8b8b8;
    outline: 0;
    -webkit-box-shadow:none;
    box-shadow:none;
}

.main {
    width: 100%;
    padding: 105px 38px 58px 38px;
}
.inner-background {
    background-color: #f8f8f8;
    display: inline-block;
}
#name{
  background-image: url(<?php echo base_url('assets/theme/images/user.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 35px;
  background-position: 10px 14px;

}
#email{
   background-image: url(<?php echo base_url('assets/theme/images/email.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 35px;
  background-position: 10px 15px;
}
#phone{
   background-image: url(<?php echo base_url('assets/theme/images/phone.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 35px;
  background-position: 10px 14px;
}
#edu{
   background-image: url(book.png);
  background-repeat: no-repeat;
  padding-left: 30px;
  background-position: 10px 14px;
}
#register_course{
   background-image: url(<?php echo base_url('assets/theme/images/course.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 30px;
  background-position: 10px 14px;
}
#state{
  background-image: url(<?php echo base_url('assets/theme/images/state.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 30px;
  background-position: 10px 14px;
}
#city{
  background-image: url(<?php echo base_url('assets/theme/images/state.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 30px;
  background-position: 10px 14px;
}

#country{
  background-image: url(<?php echo base_url('assets/theme/images/state.png'); ?>);
  background-repeat: no-repeat;
  padding-left: 30px;
  background-position: 10px 14px;
}

.button-style3 {
	    width: 106px;
        height: 37px;
		background: #f66132;
    color: #fff !important;
    border: none;
    outline: none;
    border-radius: 6px;
   margin-bottom:10px;
    margin-left: 38px;
	margin-top: 20px;
	transition: all ease-in-out 0.3s;
}
.button-style3:hover {
    background: #172031;
}


  </style>
  
  
  <script>
  $('#studyabroad').click(function(){
	 alert('Studay Abroad Form Add successfully! We will reply you soon.');
  });
  
  </script>
      