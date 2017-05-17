<link href="<?php echo base_url('assets/theme/slider-css/lightbox.min.css'); ?>" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo base_url('assets/theme/sliderjs/lightbox-plus-jquery.min.js'); ?>"></script>

<section class="bgWhite collegeHead">
<div class="container">
<div class="row">
<div class="containerBox">

<div class="col-xs-12 col-sm-3 col-md-2"><div class="collegeThumb"><img  width ="100%" src="<?php echo base_url()."upload/".$college->logo; ?>"></div></div>
<div class="col-xs-12 col-sm-9 col-md-10">
<div class="collegeQuick">
<h2><?php echo $college->name; ?><span class="reviewRating"><b>(4.5/5)</b>&nbsp;<span class="rev">(37 Reviews)</span></span></h2>
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
//echo"<pre>";
//print_r($stream_ids); 
foreach($stream_ids as $streamsdata){
	$streamsname = $this->college_model->get_strem_data($streamsdata['stream_id']);
	if($streamsname){
	echo '<div class="coursesOffer"><h3> '.$streamsname->stream_name.'<span class="collegeClose"></span></h3>';
	$courses = $this->college_model->get_types_by_stream($streamsdata['stream_id'],$streamsdata['college_id']);
	echo  '<div class="subCourses">
	<ul id="collegetab'.$streamsdata['stream_id'].'" >';
	foreach($courses as $course){
	if($course['course_id']>0){
		$coursename = $this->college_model->get_course_data($course['course_id']);
		
		
		                                   echo '<li> <strong style="font-weight:bold;">Title:</strong> '.$coursename->course_name.'</a>';
											echo '<p> <strong style="font-weight:bold;">Duration:</strong> '.$coursename->course_duration.'</p>';
														echo '<p> <strong style="font-weight:bold;">Recognition:</strong> '.$course['recognition'].'</p>';
														echo '<p> <strong style="font-weight:bold;">Fee:</strong> '.$course['fee'].'</p>';
														echo '<p> <strong style="font-weight:bold;">Exam:</strong> '.$course['exam'].'</p>';
														echo '<p> <strong style="font-weight:bold;">Procedure:</strong> '.$course['procedure'].'</p></li>';
	}

	}
	echo  '</ul></div>'; 
	echo "</div>";
	}
}
/*foreach($stream_ids as $stream){
						if(in_array($stream['stream_id'],@$stream_id)){
							  echo '<div class="coursesOffer"><h3> '.$stream['stream_name'].'<span class="collegeClose"></span></h3>';
							  foreach($types as $type){
											  if(in_array($type['type_id'],@$type_id)){
											  echo '<h4 data-tab="collegetab'.$type['type_id'].'"><strong style="font-weight:bold;">'.$type['type_name'].'</strong></h4>';
											  
											  
											  echo  '<div class="subCourses">
												<ul id="collegetab'.$type['type_id'].'" >';
											  
												foreach($course_id as $course){
														echo '<li> <strong style="font-weight:bold;">Title:</strong> '.$course->title.'</a>';
														echo '<p> <strong style="font-weight:bold;">Duration:</strong> '.$course->duration.'</p>';
														echo '<p> <strong style="font-weight:bold;">Recognition:</strong> '.$course->recognition.'</p>';
														echo '<p> <strong style="font-weight:bold;">Fee:</strong> '.$course->fee.'</p>';
														echo '<p> <strong style="font-weight:bold;">Exam:</strong> '.$course->exam.'</p>';
														echo '<p> <strong style="font-weight:bold;">Procedure:</strong> '.$course->procedure.'</p></li>';
												}
												
											  
											 echo  '</ul></div>'; 
											 }
								 } 
							  
							echo "</div>";  
							  
						}
											  
					}*/
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
<?php $companies = explode(';',$college->top_recruiting_companies);
		if(count($companies)>1){
		foreach($companies as $company){
				echo "$company";
		}
		}
 ?>
</div>


<div class="sectionGap">
<div class="heading2" id="hostel-facility">Hostel Facility</div>
<?php $companies1 = explode(';',$college->hostel_details);
	   $i = 0;
						    foreach($companies1 as $company1){
							    if($i == count($companies1)){
									echo "$company1";
							    }else{
								   echo "$company1";
							    }
							    $i++;
						    }

 ?>

</div><div class="sectionGap">
<div class="heading2" id="infrastructure">Infrastructure / Teaching Facilities</div>
<?php $companies2 = explode(';',$college->top_faculty);
	   $companies2 = explode(';',$college->teaching_facilities);
						   $i = 0;
						    foreach($companies2 as $company2){
							    if($i == count($companies2)){
									echo "<span>$company2,</span>&nbsp; ";
							    }else{
								   echo "<span>$company2</span>&nbsp; ";
							    }
							    $i++;
						    }

 ?>


</div>
<div class="sectionGap">
<div class="heading2" id="top-faculties">Top Faculties</div>

<?php $companies = explode(';',$college->top_faculty);
						   $i = 0;
						    foreach($companies as $company){
							    if($i == count($companies)){
									echo "<span>$company,</span>&nbsp; ";
							    }else{
								   echo "<span>$company</span>&nbsp; ";
							    }
							    $i++;
						    }

					 ?>


</div>
<div class="sectionGap">
<div class="heading2" id="partner-colleges">Partner Colleges</div>

<?php $companies = explode(';',$college->partner_colleges);
							$i = 0;
							foreach($companies as $company){
							   if($i == count($companies)){
									echo "<span>$company,</span>&nbsp; ";
							    }else{
								   echo "<span>$company</span>&nbsp; ";
							    }
							    $i++;
						  }

					 ?>

</div><div class="sectionGap">
<div class="heading2" id="ranking-awards">Ranking and Awards</div>
<?php $companies = explode(';',$college->rank_holders);
					        $i = 0;
						    foreach($companies as $company){
							    if($i == count($companies)){
									echo "<span>$company,</span>&nbsp; ";
							    }else{
								   echo "<span>$company</span>&nbsp; ";
							    }
							    $i++;
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

<a href="<?php if(!empty($college->brochure)){ echo base_url()."upload/".$college->brochure;} else{ ?> # <?php } ?>" <?php if(!empty($college->brochure)){ ?> download <?php } ?> class="downloadBro"><i class="icon-download"></i> Download Brochure</a>
<style>
   a:focus{
	   outline:none !important;
   }
   a:hover, a:focus{
	   color:#999 !important;
     text-decoration: none !important;
   }
   a:hover, a:focus {
    color: #6a6969 !important;
    
}
   
   ul.infra.flex-ul li {
    float: left;
	margin: 7px 10px;
}


    
   

</style>
</div>
</div>

</div>
</div>
</div>
</section>
