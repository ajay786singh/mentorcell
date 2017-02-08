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
<div class="heading1">Counselling Video(<?php echo count($videos); ?> Videos)</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="youTubePlayer">
<img src="images/youtubeplayer.jpg">
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="videoDiscription">
<h4>Some topic of the Video</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
</div>
</div>

</div>

<div class="sectionGap">
<div class="heading1">College Photos and Videos(<?php echo count($videos); ?> Videos, <?php echo count($images); ?> Photos)</div>

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
<div class="heading1">Courses offered</div>
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
<div class="heading1">Why Join <?php echo $college->name; ?></div>
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
<div class="heading2">Placement Services</div>

<?php $services =explode(';',$college->placement_services);
	  foreach($services as $service){
		  echo "<p>$service</p>";
	  }

 ?>

</div>

<div class="sectionGap">
<div class="heading2">Top Recruiting Companies</div>
<?php $companies = explode(';',$college->top_recruiting_companies);
	   foreach($companies as $company){
		  echo "<span>$company</span>&nbsp; ";
	  }

 ?>


</div>

</div>


</div>





</div>

<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="collegeSidenav">
<ul>
<li><a href="#">Counselling Videos</a></li>
<li><a href="#">Courses Offered</a></li>
<li><a href="#">Why Join IITD</a></li>
<li><a href="#">Ask Current Student</a></li>
<li><a href="#">College Review</a></li>
<li><a href="#" class="active">College Details</a>
  <div class="subMenu">
  <ol>
    <li><a href="#" class="active">Infrastructure</a></li>
	<li><a href="#">Hostel Facility</a></li>
	<li><a href="#">Recognitions and Accreditations</a></li>
	<li><a href="#">Infrastructure / Teaching Facilities</a></li>
	<li><a href="#">Scholarships</a></li>
	<li><a href="#">Ranking and Awards</a></li>
	<li><a href="#">Placement</a></li>
	<li><a href="#">Top Recruitment Company</a></li>
	<li><a href="#">Popular spots nearby campus</a></li>
  </ol>
  </div>
</li>
<li><a href="#">College Details of IITD</a></li>
</ul>

<a href="#" class="downloadBro"><i class="icon-download"></i> Download Brochure</a>

</div>
</div>

</div>
</div>
</div>
</section>
