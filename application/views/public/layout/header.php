<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('X-Powered-By: MentorCell');
header('X-XSS-Protection: 1');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Vary: Accept-Encoding');

?>
<!DOCTYPE html>
<html>
        <head prefix="og: http://ogp.me/ns#">
        <meta charset="<?php echo $charset; ?>">
        <title>Higher Education - MentorCell</title>
        <meta name="description" content="">
		<?php if ($mobile === FALSE): ?>
				<!--[if IE 8]>
					<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<![endif]-->
		<?php else: ?>
				<meta name="HandheldFriendly" content="true">
		<?php endif; ?>
		<?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
				<meta http-equiv="cleartype" content="on">
		<?php endif; ?>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta property="og:title" content="HOME">
        <meta property="og:type" content="article">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="MentorCell">

			<link href="<?php echo base_url('assets/theme/css/icons.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/fonts.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/jquery.bxslider.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/owl.carousel.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/custom.css?ver=1.0'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/mentorcell.css?ver=1.0'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/customResponsive.css?ver=1.0'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" rel="stylesheet" type="text/css" media="all" />

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">


			<script>
			var base_url = '<?php echo base_url(); ?>';
			var isPasswordRest = <?php echo isset($_GET['setpassword']) ? 1 : 0 ; ?>;
			</script>
			<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-18112004-20', 'auto');
  ga('send', 'pageview');

</script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='https://v2.zopim.com/?4dSSDJndx2wY40w5e54EyssOPbZJHirO';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zendesk Chat Script-->
		</head>
<body>

<div id="mainContainer">
<!-- header start -->
<header id="header-top">
<div class="container-fluid">
<div class="row">
<div class="col-xs-5 col-sm-5 col-md-2 pull-right col-lg-2">

 <?php if(isset($user_login['id']) && ((int)$user_login['id'])>0){ ?>
	<div class="profileNav">
	<h3><?php echo (isset($user_login['firstname']))? $user_login['firstname'] :" "; ?></h3>
	<ul>
		<li><a href="<?php echo site_url('user/profile'); ?>">Profile</a></li>
		<li><a href="<?php echo site_url('user/logout'); ?>">Sign Out</a></li>
	</ul>
	</div>

 <?php }else{ ?>
	<div class="userNav">
	<ul>
		<li class="userLogin" data-toggle="modal" data-target="#loginModal" onClick="document.getElementById('couponClicked').value=0" >Login</li>
		<li class="userReg" data-toggle="modal" data-target="#registerModal">Register</li>
	</ul>
	</div>

 <?php } ?>

</div>
</div>
</div>
</header>
<header id="header">
<div class="container-fluid">
<div class="row">
<div class="col-xs-7 col-sm-7 col-md-2 col-lg-2">
<div class="mobileIcon hidden-xs hidden-sm hidden-lg hidden-md pull-left"><i class="icon-bars"></i></div>
<div class="logo">
	<a href="<?php echo site_url(); ?>">
	<img src="<?php echo base_url('assets/theme/images/logo.png'); ?>" />
	</a>
</div>
</div>

<div class="mobileNavigation">
<nav class="mainMenu">
<ul>
<!--start code for managment-->
<li><a href="#">Management</a>
<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu1">Popular Courses</li>
		<li menu-id="submenu4">College Search By</li>
		<li menu-id="submenu5">Top colleges</li>
		<li menu-id="submenu6">Exams</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu1">
<div class="subMenubox">
<h3>Main Courses</h3>
<div class="links">
<?php 
 $manage_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","37","popular_courses","1");
 if($manage_main_courses){
 foreach($manage_main_courses as $manage_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$manage_main["course_id"]); ?>"><?=$manage_main['course_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu4">
<div class="subMenubox">
<h3>Colleges by Location</h3>
<div class="links">
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=1558">MBA Colleges in Bangalore</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=3659">MBA Colleges in Chennai</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=706">MBA Colleges Delhi/NCR</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=2145">MBA Colleges in Bhopal</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=5583">MBA Colleges in Kolkata</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=2707">MBA Colleges in Mumbai</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=41&location=2763">MBA Colleges in Pune</a></span>
<?php 
/*$get_college = $this->common_model->get_college_detail("mc_course_assignment","stream_id","37");
 if($get_college){
foreach($get_college as $college){
	 $manage_college_location = $this->common_model->get_all_main_course("mc_colleges","id",$college['college_id'],"college_location","1");
	foreach($manage_college_location as $college_location){ ?>
		<span class="sublinks"><a href="<?php echo base_url('course/index/collge_detail/'.$college_location["id"]); ?>"><?=$college_location['name'];?></a></span>
	<?php }
}
 }*/
 ?>


</div>
</div>

</div>

<div class="subMenuHold" id="submenu5">
<div class="subMenubox">
<h3>Popular Colleges</h3>
<div class="links">
<?php 
$get_college1 = $this->common_model->get_college_detail("mc_course_assignment","stream_id","37");
 if($get_college1){
foreach($get_college1 as $college1){
	 $manage_college_location1 = $this->common_model->get_all_main_course("mc_colleges","id",$college1['college_id'],"popular_colleges","1");
	foreach($manage_college_location1 as $college_location1){ ?>
		<span class="sublinks"><a href="<?php echo base_url('home/search?college='.$college_location1["id"]); ?>"><?=$college_location1['name'];?></a></span>
	<?php }
}
 }
 ?>
</div>
</div>

<div class="subMenubox">
<h3>Featured Colleges</h3>
<div class="links">
<?php 
$get_college2 = $this->common_model->get_college_detail("mc_course_assignment","stream_id","37");
 if($get_college2){
foreach($get_college2 as $college2){
$manage_college_location2 = $this->common_model->get_all_main_course("mc_colleges","id",$college2['college_id'],"featured_colleges","1");
	foreach($manage_college_location2 as $college_location2){ ?>
		<span class="sublinks"><a href="<?php echo base_url('home/search?college='.$college_location2["id"]); ?>"><?=$college_location2['name'];?></a></span>
	<?php }
}
 }
 ?>
</div>
</div>

</div>
<div class="subMenuHold" id="submenu6">
<div class="subMenubox">
<h3>Popular Exams</h3>
<div class="links">
<?php 
 $manage_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","37","popular_exam","1");
 if($manage_main_exam){
 foreach($manage_main_exam as $manage_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$manage_exam["id"]); ?>"><?=$manage_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
</div>
</div>
</div>
</li>
<!--end code for managment-->


<!--Start code for engineering-->
<li><a href="#">Engineering</a>
<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu8">Popular Course</li>
		<li menu-id="submenu10">College Search By</li>
		<li menu-id="submenu11">Top colleges</li>
		<li menu-id="submenu12">Exams</li>
		<!--<li menu-id="submenu13">Resource</li>-->
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu8">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $engineer_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","34","popular_courses","1");
 if($engineer_main_courses){
 foreach($engineer_main_courses as $eng_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$eng_main["course_id"]); ?>"><?=$eng_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>
</div>
<div class="subMenuHold" id="submenu10">
<div class="subMenubox">
<h3>Colleges By Location</h3>
<div class="links">
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=1558">Engineering Colleges in Bangalore</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=3659">Engineering Colleges in Chennai</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=706">Engineering Colleges Delhi/NCR</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=2145">Engineering  Colleges in Bhopal</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=5583">Engineering Colleges in Kolkata</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=2707">Engineering  Colleges in Mumbai</a></span>
<span class="sublinks"><a href="<?=base_url();?>home/search?course=164&location=2763">Engineering  Colleges in Pune</a></span>
<?php 
/*$get_college_eng = $this->common_model->get_college_detail("mc_course_assignment","stream_id","34");
 if($get_college_eng){
foreach($get_college_eng as $college_eng){
	 $eng_college_location = $this->common_model->get_all_main_course("mc_colleges","id",$college_eng['college_id'],"college_location","1");
	foreach($eng_college_location as $collegeng_location){ ?>
		<span class="sublinks"><a href="<?php echo base_url('course/index/collge_detail/'.$collegeng_location["id"]); ?>"><?=$collegeng_location['name'];?></a></span>
	<?php }
}
 }*/
 ?>


</div>
</div>
</div>

<div class="subMenuHold" id="submenu11">
<div class="subMenubox">
<h3>Popular Colleges</h3>
<div class="links">
<?php 
$get_college_eng1 = $this->common_model->get_college_detail("mc_course_assignment","stream_id","34");
 if($get_college_eng1){
foreach($get_college_eng1 as $college_eng1){
 $eng_college_location1 = $this->common_model->get_all_main_course("mc_colleges","id",$college_eng1['college_id'],"popular_colleges","1");
	foreach($eng_college_location1 as $college_location_eng1){ ?>
		<span class="sublinks"><a href="<?php echo base_url('home/search?college='.$college_location_eng1["id"]); ?>"><?=$college_location_eng1['name'];?></a></span>
	<?php }
}
 }
 ?>
</div>
</div>

<div class="subMenubox">
<h3>Featured Colleges</h3>
<div class="links">
<?php 
$get_college_eng2 = $this->common_model->get_college_detail("mc_course_assignment","stream_id","34");
 if($get_college_eng2){
foreach($get_college_eng2 as $college_eng2){
$eng_college_location2 = $this->common_model->get_all_main_course("mc_colleges","id",$college_eng2['college_id'],"featured_colleges","1");
	foreach($eng_college_location2 as $college_location_eng2){ ?>
		<span class="sublinks"><a href="<?php echo base_url('home/search?college='.$college_location_eng2["id"]); ?>"><?=$college_location_eng2['name'];?></a></span>
	<?php }
}
 }
 ?>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu12">
<div class="subMenubox">
<h3>Exams</h3>
<div class="links">
<?php 
 $eng_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","34","popular_exam","1");
 if($eng_main_exam){
 foreach($eng_main_exam as $eng_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$eng_exam["id"]); ?>"><?=$eng_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
</div>
<!--right menu close-->
</div>
</div>
<!--submenu close-->
</li>
<!--Start code for engineering-->

<li><a href="#">Other Courses</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu14">Design</li>
		<li menu-id="submenu15">Medicine & Healthcare</li>
		<li menu-id="submenu16">Science</li>
		<li menu-id="submenu17">Hospitality</li>
		<li menu-id="submenu18">Law</li>
		<li menu-id="submenu19">Mass communication</li>
		<li menu-id="submenu20">Commerces</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu14">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $design_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","48","popular_courses","1");
 if($design_main_courses){
 foreach($design_main_courses as $design_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$design_main["course_id"]); ?>"><?=$design_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $design_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","48","popular_exam","1");
 if($design_main_exam){
 foreach($design_main_exam as $design_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$design_exam["id"]); ?>"><?=$design_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu15">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $medical_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","59","popular_courses","1");
 if($medical_main_courses){
 foreach($medical_main_courses as $medical_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$medical_main["course_id"]); ?>"><?=$medical_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $medical_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","59","popular_exam","1");
 if($medical_main_exam){
 foreach($medical_main_exam as $medical_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$medical_exam["id"]); ?>"><?=$medical_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu16">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $science_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","61","popular_courses","1");
 if($science_main_courses){
 foreach($science_main_courses as $science_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$science_main["course_id"]); ?>"><?=$science_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $science_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","61","popular_exam","1");
 if($science_main_exam){
 foreach($science_main_exam as $science_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$science_exam["id"]); ?>"><?=$science_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>



<div class="subMenuHold" id="submenu17">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $hospital_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","40","popular_courses","1");
 if($hospital_main_courses){
 foreach($hospital_main_courses as $hospital_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$hospital_main["course_id"]); ?>"><?=$hospital_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $hospital_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","40","popular_exam","1");
 if($hospital_main_exam){
 foreach($hospital_main_exam as $hospital_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$hospital_exam["id"]); ?>"><?=$hospital_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>

</div>
<div class="subMenuHold" id="submenu18">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $low_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","55","popular_courses","1");
 if($low_main_courses){
 foreach($low_main_courses as $low_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$low_main["course_id"]); ?>"><?=$low_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $low_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","55","popular_exam","1");
 if($low_main_exam){
 foreach($low_main_exam as $low_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$low_exam["id"]); ?>"><?=$low_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu19">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $mass_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","42","popular_courses","1");
 if($mass_main_courses){
 foreach($mass_main_courses as $mass_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$mass_main["course_id"]); ?>"><?=$mass_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $mass_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","42","popular_exam","1");
 if($mass_main_exam){
 foreach($mass_main_exam as $mass_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$mass_exam["id"]); ?>"><?=$mass_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu20">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<?php 
 $commerce_main_courses = $this->common_model->get_all_main_course("mc_courses","stream_id","35","popular_courses","1");
 if($commerce_main_courses){
 foreach($commerce_main_courses as $commerce_main){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('home/search?course='.$commerce_main["course_id"]); ?>"><?=$commerce_main['course_name'];?></a></span>
	 <?php } 
 } ?>
 </div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<?php 
 $commerce_main_exam = $this->common_model->get_all_main_course("mc_exams","course_name","35","popular_exam","1");
 if($commerce_main_exam){
 foreach($commerce_main_exam as $commerce_exam){ ?>
	 <span class="sublinks"><a href="<?php echo base_url('exam/index/'.$commerce_exam["id"]); ?>"><?=$commerce_exam['exam_name'];?></a></span>
	 <?php } 
 }
	 ?>
</div>
</div>
</div>
</div>
<!--right menu close-->
</div>
</div>
<!--submenu close-->
</li>
<li><a href="<?php echo base_url('home/underconstruction'); ?>">Study Abroad</a>

</li>
<li><a href="<?php echo base_url('home/underconstruction'); ?>">Admission 2017</a>


</li>



</li>

<li><a href="<?php echo base_url('page/counselling'); ?>">Counselling</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">

<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>


</ul>
</nav>
</div>

<div class="col-xs-5 col-sm-5 col-md-2 pull-right col-lg-2">
<a href="<?php echo base_url()?>coupon/"><img src="<?php echo base_url('assets/theme/images/btn-cpn.png'); ?>" style="width:80%; float:right"></a>
</div>
</div>
</div>
</header>
<style>
mainMenu .subMenuArea .subMenubox .sublinks a {
   color: #828282;
   font-size: 12px !important;
   font-weight: normal !important;
}
header#header {
   z-index: 13;
}
</style>
<!-- header close -->
