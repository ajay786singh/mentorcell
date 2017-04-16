<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">

<div class="courceHead">

<div class="courcecol bigCol bgColor1">
<i class="icon-users"></i>
<div class="vertical">
<h3>About <?php echo ucwords($exam_data['exam_name']); ?></h3>
<ul>
<li><a href="#">Overview/Summary</a></li>
<li><a href="#eligibility">Eligibility</a></li>
<li><a href="#process">Process</a></li>
<li><a href="#pattern">Pattern</a></li>
<li><a href="#syllabus">Syllabus</a></li>
<li><a href="#contact_information">Contact information</a></li>
</ul>
</div>
</div>

<div class="courcecol bgColor2">
<i class="icon-graduation-cap"></i>
<div class="vertical">
<h4><a href="#">View Colleges accepting <?php echo ucwords($exam_data['exam_name']); ?></a></h4>
</div>
</div>

<div class="courcecol bgColor3">
<i class="icon-repo-push"></i>
<div class="vertical">
<h4><a href="#results">Results of <?php echo ucwords($exam_data['exam_name']); ?></a></h4>
</div>
</div>

<div class="courcecol bgColor4">
<i class="icon-calendar-combined"></i>
<div class="vertical">
<h4><a href="#important_dates">Important Dates</a></h4>
</div>
</div>

<div class="courcecol bgColor5">
<i class="icon-newspaper-o"></i>
<div class="vertical">
<h4><a href="#">News and articles</a></h4>
</div>
</div>



</div>



</div>
</div>
</div>
</section>
<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">


<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">


<div class="sectionGap">
<div class="heading1">About <?php echo ucwords($exam_data['exam_name']); ?></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="informationList" id="overview">
<h3>OVERVIEW/SUMMARY</h3>
<?php echo $exam_data['overview']; ?>
</div>


<div class="informationList" id="eligibility">
<h3>ELIGIBILITY</h3>
<?php echo $exam_data['eligibility']; ?></div>

<div class="informationList" id="process">
<h3>PROCESS</h3>
<?php echo $exam_data['process']; ?></div>

<div class="informationList" id="syllabus">
<h3>SYLLABUS</h3>
<?php echo $exam_data['syllabus']; ?></div>

<div class="informationList" id="contact_information">
<h3>CONTACT INFORMATION</h3>
<?php echo $exam_data['contact_information']; ?>
</div>


</div>
</div>


<div class="sectionGap">
<div class="heading1" id="impotant_dates">Important Dates</div>
<div class="importantDates">

<?php 
if($exam_data['impotant_dates']){
 echo $important_date =$exam_data['impotant_dates']; 
  $imp_date_exp = explode("@@",$important_date);
  $imp_date_name  = unserialize($imp_date_exp[0]);
  $imp_date_content = unserialize($imp_date_exp[1]);
  for( $i=0;$i<count($imp_date_name);$i++){
	if(time() >strtotime($imp_date_name[$i])){
		$exp = "dateLeft";
	}else{
		$exp = "";
	}
?>
<div class="dateBox <?php echo $exp; ?>">
<div class="leftCol">
<span class="day"><?php echo date("d", strtotime($imp_date_name[$i])); ?></span>
<span class="month"><?php echo date("M", strtotime($imp_date_name[$i])); ?></span>
<span class="year"><?php echo date("Y", strtotime($imp_date_name[$i])); ?></span>
</div>
<h4><a href="#"><?php echo @$imp_date_content[$i]; ?></a></h4>
</div>
<?php }
}?>


</div>
</div>


<div class="sectionGap">
<div class="heading1" id="results">Results of <?php echo ucwords($exam_data['exam_name']); ?></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<?php echo $exam_data['results'];  ?>
</div>
</div>


<!--<div class="sectionGap">
<div class="heading1">View Colleges accepting <?php echo ucwords($exam_data['exam_name']); ?></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been.</p>

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing.</p>

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

<p>Check JEE Main 2017 important dates here!</p>

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>-->

<!--<div class="sectionGap">
<div class="heading1">News and Articles</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="newsBox">
<div class="newsImg"><img src="images/news1.jpg" /></div>
<div class="newsContent">
<h3><a href="#">Aadhaar Card Mandatory For JEE Main 2017 Candidates</a></h3>
<h4>Nov 28, 2017</h4>
<p>Aadhaar Card has been made mandatory for JEE Main 2017 Candidates. Check the list of facilitation centres...</p>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="newsBox">
<div class="newsImg"><img src="images/news1.jpg" /></div>
<div class="newsContent">
<h3><a href="#">Aadhaar Card Mandatory For JEE Main 2017 Candidates</a></h3>
<h4>Nov 28, 2017</h4>
<p>Aadhaar Card has been made mandatory for JEE Main 2017 Candidates. Check the list of facilitation centres...</p>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="newsBox">
<div class="newsImg"><img src="images/news2.jpg" /></div>
<div class="newsContent">
<h3><a href="#">Aadhaar Card Mandatory For JEE Main 2017 Candidates</a></h3>
<h4>Nov 28, 2017</h4>
<p>Aadhaar Card has been made mandatory for JEE Main 2017 Candidates. Check the list of facilitation centres released recently. Get further details about this here...</p>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="newsBox">
<div class="newsImg"><img src="images/news2.jpg" /></div>
<div class="newsContent">
<h3><a href="#">Aadhaar Card Mandatory For JEE Main 2017 Candidates</a></h3>
<h4>Nov 28, 2017</h4>
<p>Aadhaar Card has been made mandatory for JEE Main 2017 Candidates. Check the list of facilitation centres released recently. Get further details about this here...</p>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="newsBox">
<div class="newsImg"><img src="<?php echo base_url(); ?>images/news2.jpg" /></div>
<div class="newsContent">
<h3><a href="#">Aadhaar Card Mandatory For JEE Main 2017 Candidates</a></h3>
<h4>Nov 28, 2017</h4>
<p>Aadhaar Card has been made mandatory for JEE Main 2017 Candidates. Check the list of facilitation centres released recently. Get further details about this here...</p>
</div>
</div>
</div>

</div>-->


</div>

<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeSidenav">
<ul>
<li><a href="#" class="active">About <?php echo ucwords($exam_data['exam_name']); ?></a>
<div class="subMenu">
  <ol>
    <li><a href="#overview"  class="active">Overview/Summary</a></li>
	<li><a href="#eligibility">Eligibility</a></li>
	<li><a href="#process">Process</a></li>
	<li><a href="#pattern">Pattern</a></li>
	<li><a href="#syllabus">Syllabus</a></li>
	<li><a href="#contact_information">Contact information</a></li>
  </ol>
  </div>
</li>

<li><a href="#important_dates">Important Dates</a></li>
<li><a href="#">Results of <?php echo ucwords($exam_data['exam_name']); ?></a></li>
<li><a href="#">View Colleges accepting <?php echo ucwords($exam_data['exam_name']); ?></a></li>
<li><a href="#">News and articles</a></li>
</ul>

<!--<a href="#" class="downloadBro"><i class="icon-download"></i> Download Brochure</a>-->
</div>
</div>

</div>
</div>
</div>
</section>
