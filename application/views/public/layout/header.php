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
			<link href="<?php echo base_url('assets/theme/css/custom.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<link href="<?php echo base_url('assets/theme/css/customResponsive.css'); ?>" rel="stylesheet" type="text/css" media="all" />
			<script>
			var base_url = '<?php echo base_url(); ?>';
			</script>
			
		</head>
<body>

<div id="mainContainer">
<!-- header start -->
<header id="header">
<div class="container-fluid">
<div class="row">
<div class="col-xs-7 col-sm-7 col-md-2 col-lg-2">
<div class="logo"><a href="<?php site_url(); ?>"><img src="<?php echo base_url('assets/theme/images/logo.jpg'); ?>" /></a></div>	
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
		<li menu-id="submenu3">Counseling videos</li>
		<li menu-id="submenu4">College Search By</li>
		<li menu-id="submenu5">Top colleges</li>
		<li menu-id="submenu6">Exams</li>
		<li menu-id="submenu7">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu1">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
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
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu2">
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
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
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

<div class="subMenuHold" id="submenu3">
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
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
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

<div class="subMenuHold" id="submenu4">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
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

<div class="subMenuHold" id="submenu5">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
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

<div class="subMenuHold" id="submenu6">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
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
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
</div>
</div>
</div>

<div class="subMenuHold" id="submenu7">
<div class="subMenubox">
<h3>Submenu Heading 1</h3>
<div class="links">
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
<span class="sublinks"><a href="#">MBA/PGDM</a></span>
<span class="sublinks"><a href="#">BBA/BBM</a></span>
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

<li><a href="#">Engineering</a>
<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu8">About Course</li>
		<li menu-id="submenu9">Counseling videos</li>
		<li menu-id="submenu10">College Search By</li>
		<li menu-id="submenu11">Top colleges</li>
		<li menu-id="submenu12">Exams</li>
		<li menu-id="submenu13">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu8">
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

<div class="subMenuHold" id="submenu11">
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

<div class="subMenuHold" id="submenu12">
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

<div class="subMenuHold" id="submenu13">
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
		<li class="active" menu-id="submenu14">Counseling videos</li>
		<li menu-id="submenu15">College Search By</li>
		<li menu-id="submenu16">Top colleges</li>
		<li menu-id="submenu17">Exams</li>
		<li menu-id="submenu18">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
<div class="subMenuHold active" id="submenu14">
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

<div class="subMenuHold" id="submenu15">
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

<div class="subMenuHold" id="submenu16">
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

<div class="subMenuHold" id="submenu17">
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

<div class="subMenuHold" id="submenu18">
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
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>

<li><a href="#">Study Abroad</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu19">College Search By</li>
		<li menu-id="submenu20">Top colleges</li>
		<li menu-id="submenu21">Exams</li>
		<li menu-id="submenu22">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
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
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>

<li><a href="#">Admission 2017</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
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
<!--left menu category close-->

<!--right menu start-->
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
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>

<li><a href="#">Counselling</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu29">Counseling videos</li>
		<li menu-id="submenu30">College Search By</li>
		<li menu-id="submenu31">Top colleges</li>
		<li menu-id="submenu32">Exams</li>
		<li menu-id="submenu33">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
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
<!--right menu close-->

</div>
</div>
<!--submenu close-->

</li>

<li><a href="#">Placements</a>

<!--submenu start-->
<div class="subMenuArea">
<div class="subMenuRow">
<!--left menu category start-->
<div class="subMenuCol subMenuLeft">
	<ol>
		<li class="active" menu-id="submenu34">College Search By</li>
		<li menu-id="submenu35">Top colleges</li>
		<li menu-id="submenu36">Exams</li>
		<li menu-id="submenu37">Resource</li>
	</ol>
</div>
<!--left menu category close-->

<!--right menu start-->
<div class="subMenuCol subMenuRight">
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




</div>
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
	<a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">C<br>o<br>u<br>p<br>o<br>n</a>
	<?php } ?>
<i></i>
</div>

<div class="userNav">
<ul>
<?php if($user_login['id']){?>
	<!--<li class="userLogin"><?php echo $user_login['email']; ?></li>-->
	<li class="userLogin"><?php echo $user_login['first_name']; ?></li>
	<li class="userReg" ><a href="<?php echo site_url('home/logout'); ?>" >Logout</a></li>
<?php }else{ ?>
	<li class="userLogin" data-toggle="modal" data-target="#loginModal">Login</li>
	<li class="userReg" data-toggle="modal" data-target="#registerModal">Register</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>	
</header>
<!-- header close -->