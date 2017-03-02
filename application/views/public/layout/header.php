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
        <title>MentorCell</title>
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
        <meta property="og:title" content="Mentorcell::HOME">
        <meta property="og:type" content="MentorCell::HOME">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="MentorCell">

			<link href="<?php echo base_url('assets/theme/css/icons.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/fonts.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/jquery.bxslider.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/custom.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/customResponsive.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<script>
			var base_url = '<?php echo base_url(); ?>';
			var isPasswordRest = <?php echo isset($_GET['setpassword']) ? 1 : 0 ; ?>;
			</script>
			
		</head>
<body>

<div id="mainContainer">
<!-- header start -->
<header id="header">
<div class="container-fluid">
<div class="row">
<div class="col-xs-7 col-sm-7 col-md-2 col-lg-2">
<div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/theme/images/logof-01.jpg'); ?>" /></a></div>	
</div>

<div class="col-xs-2 hidden-sm hidden-xs col-md-8 col-lg-8">
<nav class="mainMenu">
<ul>
<li><a href="#">Management</a>
<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu1">Popular Courses</li>
		<li menu-id="submenu2">About Course</li>
		<!--<li menu-id="submenu3">Counseling videos</li>-->
		<li menu-id="submenu4">College Search By</li>
		<li menu-id="submenu5">Top colleges</li>
		<li menu-id="submenu6">Exams</li>
		<!--<li menu-id="submenu7">Resource</li>-->
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu1">
<div class="subMenubox">
<h3>Main Courses</h3>
<div class="links">
<span class="sublinks"><a href="<?php echo base_url('course/index/mba-pgdm'); ?>">MBA/PGDM</a></span>
<span class="sublinks"><a href="<?php echo base_url('course/index/bba-bbm'); ?>">BBA/BBM</a></span>
</div>
</div>


</div>

<div class="subMenuHold" id="submenu2">
<div class="subMenubox">
<h3>Courses</h3>
<div class="links">
<?php
///$management_course  = $this->common_model->get_all_rows("mc_course_description","course_name","Management");
//print_r($management_course); exit;
//if(count($management_course)>0){
	//foreach($management_course as $management_course_data){
 ?>
<span class="sublinks"><a href="#"><?php //echo ucwords($management_course_data['course_name']); ?></a></span>
<?php //}}?>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu3">
<div class="subMenubox">
<h3>colleges by Location</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA Colleges in India</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Bangalore</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Chennai</a></span>
<span class="sublinks"><a href="#">MBA Colleges Delhi/NCR</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Hyderabad</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Kolkata</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Mumbai</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Pune</a></span>
<span class="sublinks"><a href="#">MBA Colleges in All location</a></span>
</div>
</div>
</div>


<div class="subMenuHold" id="submenu4">
<div class="subMenubox">
<h3>colleges by Location</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA Colleges in India</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Bangalore</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Chennai</a></span>
<span class="sublinks"><a href="#">MBA Colleges Delhi/NCR</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Hyderabad</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Kolkata</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Mumbai</a></span>
<span class="sublinks"><a href="#">MBA Colleges in Pune</a></span>
<span class="sublinks"><a href="#">MBA Colleges in All location</a></span>
</div>
</div>

</div>

<div class="subMenuHold" id="submenu5">
<div class="subMenubox">
<h3>Popular Colleges</h3>
<div class="links">
<span class="sublinks"><a href="#">IIM Ahmadabad</a></span>
<span class="sublinks"><a href="#">ISB Hydrabad</a></span>
<span class="sublinks"><a href="#">IIM Bangalore</a></span>
<span class="sublinks"><a href="#">IIM Kolkata</a></span>
<span class="sublinks"><a href="#">FMS</a></span>
<span class="sublinks"><a href="#">XLRI</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Featured Colleges</h3>
<div class="links">
<span class="sublinks"><a href="#">International Institute of business  studies ( Bangalore)</a></span>
</div>
</div>

</div>
<div class="subMenuHold" id="submenu6">
<div class="subMenubox">
<h3>Popular Exams</h3>
<div class="links">
<?php $exam_menu  = $this->common_model->get_all_rows("mc_exams","course_name","MBA");
if(count($exam_menu)>0){
	foreach($exam_menu as $exam_menu_data){
 ?>
<span class="sublinks"><a href="<?php echo base_url()."exam/index/".$exam_menu_data['slug']; ?>"><?php echo $exam_menu_data['exam_name']; ?></a></span>
<?php }}?>
</div>
</div>
</div>




</div>
<!--right menu close-->

</div>
</div>
<!--submenu close-->
</li>

<li><a href="#">Engineering</a>
<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu8">About Course</li>
		<!--<li menu-id="submenu9">Counseling videos</li>-->
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
<span class="sublinks"><a href="#">B.E./B.Tech</a></span>
<span class="sublinks"><a href="#">M.E./M.Tech</a></span>
<span class="sublinks"><a href="#">Diploma</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu9">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu10">
<div class="subMenubox">
<h3>Colleges</h3>
<div class="links">
<span class="sublinks"><a href="#">Engineering  Colleges in India</a></span>
<span class="sublinks"><a href="#">Engineering Colleges in Bangalore</a></span>
<span class="sublinks"><a href="#">Engineering Colleges in Chennai</a></span>
<span class="sublinks"><a href="#">Engineering Colleges Delhi/NCR</a></span>
<span class="sublinks"><a href="#">Engineering  Colleges in Hyderabad</a></span>
<span class="sublinks"><a href="#">Engineering Colleges in Kolkata</a></span>
<span class="sublinks"><a href="#">Engineering  Colleges in Mumbai</a></span>
<span class="sublinks"><a href="#">Engineering  Colleges in Pune</a></span>
<span class="sublinks"><a href="#">Engineering  Colleges in All location</a></span>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu11">
<div class="subMenubox">
<h3>Colleges</h3>
<div class="links">
<span class="sublinks"><a href="#">IIT kharagpur</a></span>
<span class="sublinks"><a href="#">IIT Kanpur</a></span>
<span class="sublinks"><a href="#">IIT Delhi</a></span>
<span class="sublinks"><a href="#">IIT Mumbai</a></span>
<span class="sublinks"><a href="#">IIT Chennai</a></span>
<span class="sublinks"><a href="#">IIT Roorkee</a></span>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu12">
<div class="subMenubox">
<h3>Exams</h3>
<div class="links">
<span class="sublinks"><a href="#">JEE Mains</a></span>
<span class="sublinks"><a href="#">WBJEE</a></span>
<span class="sublinks"><a href="#">UPSEE</a></span>
<span class="sublinks"><a href="#">COMEDK</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu13">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

</div>




</div>
<!--right menu close-->

</div>
</div>
<!--submenu close-->
</li>

<li><a href="#">Other Courses</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu14">Design</li>
		<li menu-id="submenu15">Medicine & Healthcare</li>
		<li menu-id="submenu16">Science & Engineering</li>
		<li menu-id="submenu17">Information Technology</li>
		<li menu-id="submenu18">Hospitality</li>
		<li menu-id="submenu19">Law & Arts & Teaching</li>
		<li menu-id="submenu20">Media & Mass communication</li>
		<li menu-id="submenu21">Commerces</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu14">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">Fashion & Textile Design</a></span>
<span class="sublinks"><a href="#">Graphic Design</a></span>
<span class="sublinks"><a href="#">Industrial, Automotive</a></span>
<span class="sublinks"><a href="#">Product Design</a></span>
<span class="sublinks"><a href="#">Interaction Design</a></span>
<span class="sublinks"><a href="#">Jewellery & Accessory Design</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
<span class="sublinks"><a href="#">AICET</a></span>
<span class="sublinks"><a href="#">CEED</a></span>
<span class="sublinks"><a href="#">NID Entrance Exam</a></span>
<span class="sublinks"><a href="#">NIFT Entrance Exam</a></span>
<span class="sublinks"><a href="#">UCEED</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu15">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">MBBS</a></span>
<span class="sublinks"><a href="#">BDS</a></span>
<span class="sublinks"><a href="#">B.Sc. Nursing</a></span>
<span class="sublinks"><a href="#">M.Sc. Nursing</a></span>
<span class="sublinks"><a href="#">B.Sc. Medicine</a></span>
<span class="sublinks"><a href="#">M.Sc. Medicine</a></span>
<span class="sublinks"><a href="#">B.Pharma</a></span>
<span class="sublinks"><a href="#">M.Pharma</a></span>
<span class="sublinks"><a href="#">Bachelor of Physiotherapy (BPT)</a></span>
<span class="sublinks"><a href="#">Master of Physiotherapy (MPT)</a></span>
<span class="sublinks"><a href="#">BAMS</a></span>
<span class="sublinks"><a href="#">BHMS</a></span>
</div>
</div>

<div class="subMenubox">
<h3>About Course</h3>
<div class="links">
<span class="sublinks"><a href="#">Medical</a></span>
<span class="sublinks"><a href="#">Dental</a></span>
<span class="sublinks"><a href="#">Paramedical</a></span>
<span class="sublinks"><a href="#">Pharmacy</a></span>
</div>
</div>
<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
</div>
</div>
</div>
<div class="subMenuHold" id="submenu16">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">B.Sc.</a></span>
<span class="sublinks"><a href="#">M.Sc.</a></span>
<span class="sublinks"><a href="#">B.Arch</a></span>
<span class="sublinks"><a href="#">M.Arch</a></span>
<span class="sublinks"><a href="#">B.Sc. Aviation</a></span>
<span class="sublinks"><a href="#">M.Sc. Aviation</a></span>
<span class="sublinks"><a href="#">B.Des.</a></span>
<span class="sublinks"><a href="#">M.Des.</a></span>
<span class="sublinks"><a href="#">Ph.D.</a></span>
</div>
</div>

<div class="subMenubox">
<h3>About Course</h3>
<div class="links">
<span class="sublinks"><a href="#">Architecture</a></span>
</div>
</div>
<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
</div>
</div>
</div>

<div class="subMenuHold" id="submenu17">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">DCA</a></span>
<span class="sublinks"><a href="#">BCA</a></span>
<span class="sublinks"><a href="#">MCA</a></span>
<span class="sublinks"><a href="#">M.Arch</a></span>
<span class="sublinks"><a href="#">B.Sc. (CS)</a></span>
<span class="sublinks"><a href="#">M.Sc. (CS)</a></span>
<span class="sublinks"><a href="#">B.Sc. (IT)</a></span>
<span class="sublinks"><a href="#">M.Sc. (IT)</a></span>
</div>
</div>

<div class="subMenubox">
<h3>About Course</h3>
<div class="links">
<span class="sublinks"><a href="#">Computer Application</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu18">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">DHM</a></span>
<span class="sublinks"><a href="#">BHM</a></span>
<span class="sublinks"><a href="#">B.Sc.(HM)</a></span>
<span class="sublinks"><a href="#">Airhostess Training</a></span>
</div>
</div>

<div class="subMenubox">
<h3>About Course</h3>
<div class="links">
<span class="sublinks"><a href="#">Hotel Management</a></span>
</div>
</div>
<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
</div>
</div>

</div>
<div class="subMenuHold" id="submenu19">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">B.Ed.</a></span>
<span class="sublinks"><a href="#">M.Ed.</a></span>
<span class="sublinks"><a href="#">B.P.Ed.</a></span>
<span class="sublinks"><a href="#">M.P.Ed.</a></span>
<span class="sublinks"><a href="#">LLB</a></span>
<span class="sublinks"><a href="#">LLM</a></span>
<span class="sublinks"><a href="#">B.A.</a></span>
<span class="sublinks"><a href="#">M.A.</a></span>
</div>
</div>

<div class="subMenubox">
<h3>About Course</h3>
<div class="links">
<span class="sublinks"><a href="#">Low</a></span>
</div>
</div>
<div class="subMenubox">
<h3>Exam</h3>
<div class="links">
</div>
</div>

</div>
<div class="subMenuHold" id="submenu20">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">B.Sc. Mass Communication</a></span>
<span class="sublinks"><a href="#">Diploma in Visual Communication</a></span>
<span class="sublinks"><a href="#">M.A. - Mass Communication</a></span>
<span class="sublinks"><a href="#">M.Sc - Mass Communication</a></span>
<span class="sublinks"><a href="#">PG Diploma in Mass Communication</a></span>
</div>
</div>
</div>
<div class="subMenuHold" id="submenu21">
<div class="subMenubox">
<h3>Popular Courses</h3>
<div class="links">
<span class="sublinks"><a href="#">B.Com</a></span>
<span class="sublinks"><a href="#">M.Com</a></span>
</div>
</div>
</div>
</div>
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>

<li><a href="#">Study Abroad</a>

<!--submenu start-->
<!--<div class="subMenuArea">
<div class="subMenuRow">
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu19">College Search By</li>
		<li menu-id="submenu20">Top colleges</li>
		<li menu-id="submenu21">Exams</li>
		<li menu-id="submenu22">Resource</li>
	</ol>
</div>

<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu19">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu20">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu21">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu22">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

</div>




</div>

</div>
</div>-->
<!--submenu close-->

</li>

<li><a href="#">Admission 2017</a>

<!--<div class="subMenuArea">
<div class="subMenuRow">
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu23">About Course</li>
		<li menu-id="submenu24">Counseling videos</li>
		<li menu-id="submenu25">College Search By</li>
		<li menu-id="submenu26">Top colleges</li>
		<li menu-id="submenu27">Exams</li>
		<li menu-id="submenu28">Resource</li>
	</ol>
</div>

<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu23">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu24">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu25">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu26">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu27">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu28">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

</div>




</div>

</div>
</div>-->
<!--submenu close-->

</li>

<li><a href="#">Counselling</a>

<!--<div class="subMenuArea">
<div class="subMenuRow">
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu29">Counseling videos</li>
		<li menu-id="submenu30">College Search By</li>
		<li menu-id="submenu31">Top colleges</li>
		<li menu-id="submenu32">Exams</li>
		<li menu-id="submenu33">Resource</li>
	</ol>
</div>

<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu29">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu30">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu31">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu32">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu33">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

</div>




</div>

</div>
</div>-->

</li>

<li><a href="#">Placements</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<!--<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu34">College Search By</li>
		<li menu-id="submenu35">Top colleges</li>
		<li menu-id="submenu36">Exams</li>
		<li menu-id="submenu37">Resource</li>
	</ol>
</div>-->
<!--left menu category close-->

<!--right menu start-->
<!--<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu34">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu35">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 3</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu36">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

<div class="subMenubox">
<h3>Submenu Heading 2</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu37">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
</div>
</div>

</div>




</div>-->
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>


</ul>
</nav>
</div>

<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">

<div class="couponTab icon-bookmark">
<span>
	<?php if($user_login['id']){?>	
	<a href="<?php echo base_url()?>coupon/">C<br>o<br>u<br>p<br>o<br>n</a></span>
	<?php }else{ ?>
	<a href="javascript:void(0);" onClick="document.getElementById('couponClicked').value=1" data-toggle="modal" data-target="#loginModal">C<br>o<br>u<br>p<br>o<br>n</a>
	<?php } ?>
<i></i>
</div>

<div class="userNav">
<ul>
<?php
 if($user_login['id']){?>
	<li class="userLogin"><?php echo $user_login['firstname']; ?></li>
	<li class="userReg" ><a href="<?php echo site_url('home/logout'); ?>" >Logout</a></li>
<?php }else{ ?>
	<li class="userLogin" data-toggle="modal" data-target="#loginModal" onClick="document.getElementById('couponClicked').value=0" >Login</li>
	<li class="userReg" data-toggle="modal" data-target="#registerModal">Register</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>	
</header>
<!-- header close -->