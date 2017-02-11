<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">

<div class="col-xs-12 col-sm-3 col-md-2"><div class="collegeThumb"></div></div>
<div class="col-xs-12 col-sm-9 col-md-10">
<div class="collegeQuick">
<h2><?php echo $college->name; ?><span class="reviewRating"><b>(4.5/5)</b> 37 Reviews</span></h2>
<h3><?php echo $college->address; ?><?php echo $college->city; ?>, 
					<?php echo $college->state; ?><br/>
					<?php echo $college->country; ?> <?php echo $college->pincode; ?></h3>
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
<div class="heading1" id="counselling-video">Counselling Video(<?php echo count($videos); ?> Videos)</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer">
<img src="images/youtubeplayer.jpg">
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="videoDiscription">
<h4>Some topic of the Video</h4>
<?php 
		$descriptions = explode(';',$college->description);
	   foreach($descriptions as $description){
		  echo "<p>$description</p>";
	  }
?>
</div>
</div>

</div>

<div class="sectionGap">
<div class="heading1" id="college-videos-photos">College Photos and Videos(<?php echo count($videos); ?> Videos, <?php echo count($images); ?> Photos)</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="collegeVideoSlide">
<ul class="bxslider">
<?php foreach($images as $image){ ?>
		<li><img  src="<?php echo base_url()."upload/".$image->asset_name; ?>"></li>
<?php } ?>

</ul>
</div>
</div>

</div>



<div class="sectionGap">
<div class="heading1" id="courses-offered">Courses offered</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="coursesOffer">
<h3>Arts, Law, Languages and Teaching <span class="collegeClose"></span></h3>
<h4 data-tab="collegetab1">Arts <span>(7)</span></h4> <h4 data-tab="collegetab2">Language Learning <span>(4)</span></h4> <h4 data-tab="collegetab3">Social Sciences <span>(1)</span></h4>

<div class="subCourses">
<ul id="collegetab1">
<li><a href="#">M.A. in Economics (International Studies), </a> <span>2 Years</span></li>
<li><a href="#">M.A. in Arts & Aesthetics, </a> <span>2 Years</span></li>
<li><a href="#">M.Phil. in Life Sciences, </a> <span>1 Year</span></li>
<li><a href="#">M.Phil. in Environmental Science, </a> <span>1 Year</span></li>
<li><a href="#">M.Phil. in Social Science, </a> <span>1 Year</span></li>
<li><a href="#">Ph.D. in Computational Biology and Bioinformatics, </a> <span>3 Years</span></li>
<li><a href="#">Ph.D. in Social Science, </a> <span>3 Years</span></li>
</ul>

<ul id="collegetab2">
<li><a href="#">M.A. in Linguistics, </a> <span>2 Years</span></li>
<li><a href="#">M.A. in English, </a> <span>2 Years</span></li>
<li><a href="#">M.A. in Urdu, </a> <span>2 Years</span></li>
<li><a href="#">M.A. in Hindi, </a> <span>2 Years</span></li>
</ul>

<ul id="collegetab3">
<li><a href="#">M.A. in Social Science, </a> <span>2 Years</span></li>
</ul>

</div>
</div>


<div class="coursesOffer">
<h3>Science & Engineering <span class="collegeClose"></span></h3>
<h4 data-tab="collegetab4">MSc <span>(3)</span></h4> <h4 data-tab="collegetab5">M.E / M.Tech <span>(2)</span></h4> <h4 data-tab="collegetab6">Phd<span>(2)</span></h4>

<div class="subCourses">
<ul id="collegetab4">
<li><a href="#">M.Sc. in Biotechnology, </a> <span>2 Years</span></li>
<li><a href="#">M.Sc. in Environmental Sciences, </a> <span>2 Years</span></li>
<li><a href="#">M.Sc. in Life Sciences, </a> <span>2 Years</span></li>
</ul>

<ul id="collegetab5">
<li><a href="#">M.Tech., </a> <span>2 Years</span></li>
<li><a href="#">M.Tech.in Computational and System Biology, </a> <span>2 Years</span></li>
</ul>

<ul id="collegetab6">
<li><a href="#">Ph.D. in Computational Biology and Bioinformatics, </a> <span>3 Years</span></li>
<li><a href="#">Ph.D. in Biotechnology, </a> <span>3 Years</span></li>
</ul>

</div>
</div>





</div>


</div>


<div class="sectionGap">
<div class="heading1" id="why-join">Why Join <?php echo $college->name; ?></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<ul>
<?php 
		$why_join = explode(';',$college->why_join);
	   foreach($why_join as $why_join){
		  echo "<li>$why_join</li>";
	  }
?>
</ul>
<div class="collegeRankRating">

<div class="rankingCol">
<div class="title">Rank of College</div>
<div class="circle">1</div>
</div>


<div class="rankingCol">
<div class="title">College rating</div>
<div class="circle">4.7</div>
</div>

<div class="rankingCol">
<div class="title">Placement rating</div>
<div class="circle">4.3</div>
</div>

</div>

</div>


</div>


<div class="sectionGap">
<div class="heading1">College Details</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="sectionGap">
<div class="heading2" id="placement-services">Placement Services</div>

<?php $services =explode(';',$college->placement_services);
	  foreach($services as $service){
		  echo "<p>$service</p>";
	  }

 ?>

</div>

<div class="sectionGap">
<div class="heading2" id="top-recruiting-companies">Top Recruiting Companies</div>
<?php $companies = explode(';',$college->top_recruiting_companies);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div>


<div class="sectionGap">
<div class="heading2" id="hostel-facility">Hostel Facility</div>
<?php $companies = explode(';',$college->hostel_details);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div><div class="sectionGap">
<div class="heading2" id="infrastructure">Infrastructure / Teaching Facilities</div>
<?php $companies = explode(';',$college->teaching_facilities);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div><div class="sectionGap">
<div class="heading2" id="top-faculties">Top Faculties</div>
<?php $companies = explode(';',$college->top_faculty);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div><div class="sectionGap">
<div class="heading2" id="partner-colleges">Partner Colleges</div>
<?php $companies = explode(';',$college->partner_colleges);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div><div class="sectionGap">
<div class="heading2" id="ranking-awards">Ranking and Awards</div>
<?php $companies = explode(';',$college->rank_holders);
	   foreach($companies as $company){
		  echo "<span>$company,</span>&nbsp; ";
	  }

 ?>


</div>




</div>


</div>





</div>

<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeSidenav">
<ul>
<li><a href="#counselling-video">Counselling Videos</a></li>
<li><a href="#courses-offered">Courses Offered</a></li>
<li><a href="#why-join">Why Join IITD</a></li>
<li><a href="college-videos-photos">College Videos and Photos</a></li>
<li><a href="#" class="active">College Details</a>
  <div class="subMenu">
  <ol>
    <li><a href="#infrastructure" class="active">Infrastructure</a></li>
	<li><a href="#hostel-facility">Hostel Facility</a></li>
	<li><a href="#partner-colleges">Partner Colleges</a></li>
	<li><a href="#top-faculties">Infrastructure / Teaching Facilities</a></li>
	<li><a href="#ranking-awards">Ranking and Awards</a></li>
	<li><a href="#placement-services">Placement</a></li>
	<li><a href="#top-recruiting-companies">Top Recruitment Company</a></li>
  </ol>
  </div>
</li>
<!--<li><a href="#">College Details of IITD</a></li>-->
</ul>

<a href="#" class="downloadBro"><i class="icon-download"></i> Download Brochure</a>

</div>
</div>

</div>
</div>
</div>
</section>
