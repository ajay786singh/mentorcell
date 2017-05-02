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


<!--course loop-->
<?php 

					foreach($streams as $stream){
						if(in_array($stream['stream_id'],@$stream_id)){
							  echo '<div class="coursesOffer"><h3> '.$stream['stream_name'].'<span class="collegeClose"></span></h3>';
							  
							  
							  
							  foreach($types as $type){
											  if(in_array($type['type_id'],@$type_id)){
											  echo '<h4 data-tab="collegetab'.$type['type_id'].'">'.$type['type_name'].'</h4>';
											  
											  
											  echo  '<div class="subCourses">
												<ul id="collegetab'.$type['type_id'].'" >';
											  
												foreach($course_id as $course){
														echo '<li><a>'.$course->title.'</a></li>';
														//echo '<p>'.$course->duration.'</p>';
														//echo '<p>'.$course->recognition.'</p>';
														//echo '<p>'.$course->fee.'</p>';
														//echo '<p>'.$course->exam.'</p>';
														//echo '<p>'.$course->procedure.'</p>';
												}
												
											  
											 echo  '</div>
												</ul>'; 
											  
											  
											  
											  }
											  
											  
											
						     } 
							  
							echo "</div>";  
							  
						}
											  
					}




				?>
<!--course loop-->



</div>


</div>


<div class="sectionGap">
<div class="heading1" id="why-join">Why Join <?php echo $college->name; ?></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<ul class="liststyletyep">
<?php 
		$why_join = explode(';',$college->why_join);
		if(count($why_join)>1){
		foreach($why_join as $why_join){
		  echo "<li>$why_join</li>";
		}
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
<ul class="liststyletyep">
<?php $services =explode(';',$college->placement_services);
	if(count($services)>1){
	  foreach($services as $service){
		  echo "<li>$service</li>";
	  }
	}  

 ?>
</ul>
</div>

<div class="sectionGap">
<div class="heading2" id="top-recruiting-companies">Top Recruiting Companies</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->top_recruiting_companies);
		if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
		}
 ?>
<ul class="liststyletyep">

</div>


<div class="sectionGap">
<div class="heading2" id="hostel-facility">Hostel Facility</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->hostel_details);
	   $i = 0;
	   if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
	   }

 ?>
</ul>

</div><div class="sectionGap">
<div class="heading2" id="infrastructure">Infrastructure / Teaching Facilities</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->teaching_facilities);
	   $i = 0;
	   if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
	   }

 ?>
</ul>

</div><div class="sectionGap">
<div class="heading2" id="top-faculties">Top Faculties</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->top_faculty);
	   $i = 0;
	   if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
	   }

 ?>
</ul>

</div><div class="sectionGap">
<div class="heading2" id="partner-colleges">Partner Colleges</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->partner_colleges);
	   $i = 0;
	   if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
	   }

 ?>
</ul>

</div><div class="sectionGap">
<div class="heading2" id="ranking-awards">Ranking and Awards</div>
<ul class="liststyletyep">
<?php $companies = explode(';',$college->rank_holders);
		$i = 0;
		if(count($companies)>1){
		foreach($companies as $company){
				echo "<li>$company</li>";
		}
		}

 ?>
</ul>

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
