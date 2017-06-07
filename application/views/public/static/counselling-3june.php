  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <div id="back">

      <div class="container">

      <div class="content-box">
          <h2>COUNSELLING</h2>
		  
          <blockquote><P>Having a team of expert career counselors and founders with rich experience in education sector, Mentorcell.com aims to provide counseling to students helping them chose the best suitable career path. Write to us and we promise to get back to you at the earliest.</P></blockquote>
      </div><!--end of content box-->

	  <?php echo form_open_multipart(current_url(), array('class' => 'form-back'));
									?>
									
        
            <div class="top-head">
              <p>Fill this form</p>
            </div><!--end of top head-->

              <div class="main">

              <div class="inner-background">
            
                <div class="form-group col-md-12">
               <label>Name</label>
               <input type="text"  id ="name" class="form-control" name="name" placeholder="Enter your full name">
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
               <label>Education Interests</label>
			   <select id="register_interest" name="register_interest" class="register_interest form-control">
			   <option>Education Interests</option>
					<?php
					$streams = $this->common_model->get_all_rows("mc_streams", 1,1);
					foreach($streams as $stream){
							echo '<option  value="'.$stream['stream_id'].'">'.$stream['stream_name'].'</option>';
					} ?>

					</select>
               </div>

               <div class="form-group col-md-6">
               <label>Courses</label>
			   <select id="register_course" name="register_course" class="form-control register_course">
					<option>Courses</option>
					</select>
               </div>

               <div class="form-group col-md-12">
               <label>Message</label>
               <textarea class="form-control" rows="5" name="message" id="message" placeholder="Text Area"></textarea>
               </div>

               </div><!--end of inner background-->

               </div><!--main form back--> 

               <div class="form-group col-md-6">
               <button class="button-style3" type="submit" btn btn-default id="button-sub counselling_form">SUBMIT</button>
               </div>

               

            </form><!--end of form--> 

        </div><!--end of container--> 
          
         </div><!--end of back-->
		 <style type="text/css">
		 
		 
		 
		 /**25-05-17**/
	.content-box blockquote p{	 
    font-size: 18px;
    font-style: italic;
    width: 100%;
    margin: 0.25em 0;
    line-height: 1.45;
    position: relative;
} 
.content-box blockquote {
    border-left: none;
}
.content-box blockquote p::before{
	font-family: Georgia, serif;
    display: block;
    content: "\201C";
    font-size: 60px;
    position: absolute;
    left: 5px;
    top: -14px;
    color: #fff;
}
.content-box blockquote p::after{
	font-family: Georgia, serif;
    display: block;
    content: "\201D";
    font-size: 60px;
    position: absolute;
    left: 300px;
    top: 105px;
    color: #fff;
}
.footerTop .footerWidget ul li a:hover{
	text-decoration: none;
}
#registerModal .modal-content{
  margin-left: 70px !important;
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
        background-image: url(<?php echo base_url('assets/theme/images/counselling.jpg'); ?>);
        width: 100%;
        height:809px;
        background-repeat: no-repeat;
        background-position: center;
        float: left;
     }
     .content-box{
      width: 569px;
      height: 297px;
      background-color: rgba(0,0,0,0.4);
      float: left;
      margin-top: 169px;
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
      font-size: 18px;
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
#button-sub {
    width: 106px;
    height: 37px;
    background: #f66132;
    color: #fff;
    border: none;
    outline: none;
    border-radius: 6px;
    margin-top: 20px;
    margin-bottom: 10px;
    margin-left: 38px;
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
  margin-left: 50px;

}
.form-control:focus {
    border-color: #b8b8b8;
    outline: 0;
    -webkit-box-shadow:none;
    box-shadow:none;
}
.main {
    width: 100%;
}
.main {
    width: 100%;
    padding: 105px 38px 0px 38px;
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
#register_interest{
   background-image: url(<?php echo base_url('assets/theme/images/book.png'); ?>);
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
.userNav ul {
margin-bottom: 0;
}

background-size:cover
.top-head p{
    margin-left: 53px;
}
#back{
 background-size: cover;
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
    margin-left: 55px;
	margin-top: 20px;
	transition: all ease-in-out 0.3s;
}
.button-style3:hover {
    background: #172031;
}






/**media queries**/



@media (max-width: 768px){

a img {
    width: 100% !important;
}
.userNav{
  height: 68px;
  margin-top: 12px;
}
.content-box{
  width: 100% !important;
  height: auto !important;
  float: none !important;
  padding: 10px 10px;
}
.content-box h2 {
    text-align: center;

}
.content-box p{
  padding: 10px 10px !important;
  text-align: justify !important;
}
.main{
  padding:none !important;
}
.footerSection{
  margin-top: 557px;
}
.inner-background{
         width: 100% !important;
}
.footerTop .footerWidget{
	padding: 0px 0px 15px 15px !important;
}
.form-back{
	width: 100% !important;
}
.main{
	width:100% !important;
}
.top-head{
  width: 100%;
}
.footerSection{
	margin-top: 581px;
}



}</style>
