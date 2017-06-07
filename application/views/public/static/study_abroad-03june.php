     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <div id="back">
      <div class="container">

      <div class="content-box">
          <h2>ABROAD EDUCATION</h2>
         <blockquote><P>Educations.com has a wide variety of different education levels including diplomas, bachelors degrees, masters degrees, doctorates and PhD courses, distance learning and summer courses. Good luck with finding your future education abroad.</P></blockquote>
      </div><!--end of content box-->

     	  <?php echo form_open_multipart(current_url(), array('class' => 'form-back'));?>

        
            <div class="top-head">
              <p>Fill this form.</p>
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
		   
		   /**25-5-17**/
		   
	blockquote{	   
    font-size: 18px;
    font-style: italic;
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
    left: 25px;
    top: -7px;
    color: #fff;
}
blockquote::before {
    font-family: Georgia, serif;
    display: block;
    content: "\201D";
    font-size: 60px;
    position: absolute;
    left: 508px;
    top: 67px;
    color: #fff;
}
.footerTop .footerWidget ul li a:hover{
	text-decoration: none;
}
.userNav:after{
  margin-top: -11px;	
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
      background-color: rgba(0,0,0,0.3);
      float: left;
      margin-top: 169px;
      padding: 28px 29px 32px 12px;
     }
     .content-box h2{
      font-family: 'Open Sans', sans-serif;
      font-size: 33px;
      font-weight: bold;
      color: #fff;
      padding: 7px 0px 0px 30px;
     }
     .content-box p{
      font-family: 'Open Sans', sans-serif;
      font-size: 16px;
      font-weight: regular;
      color: #fff;
      text-align: left;
      line-height: 128%;
      padding: 7px 0px 0px 30px;
     }
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
.top-head p{
  color: #fff;
  font-size: 18px;
  font-family: 'Open Sans', sans-serif;
  line-height: 73px;
  margin-left: 52px;

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
      