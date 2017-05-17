
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        College Details
        <small>Beta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
			<?php //print_r($college);?>
			<div class="box-header with-border">
			<div class="row">	
			<a title="Edit" class="col-md-2 col-sm-2 btn  btn-primary btn-flat pull-left" href="<?php echo base_url()."admin/colleges/edit/".$college_id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
			<a title="Delete" class="col-md-2 col-sm-2 btn  btn-primary btn-flat pull-left" href="<?php echo base_url()."admin/colleges/delete/".$college_id;?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
			<a title="Add Gallery" class="col-md-2 col-sm-2 btn  btn-primary btn-flat pull-left" href="<?php echo base_url()."admin/colleges/gallery/".$college_id;?>"><i class="fa fa-picture-o" aria-hidden="true"></i> Add Gallery</a>
			<a title="Courses" class="col-md-2 col-sm-2 btn  btn-primary btn-flat pull-left" href="<?php echo base_url()."admin/colleges/course/".$college_id;?>"><i class="fa fa-book" aria-hidden="true"></i> Stream & Types</a>
			<a title="Assign Courses" class="col-md-2 col-sm-2 btn  btn-primary btn-flat pull-left" href="<?php echo base_url()."admin/colleges/assigncourse/".$college_id;?>"><i class="fa fa-child" aria-hidden="true"></i> Assign Courses</a>
			</div>
            </div>
			
			<section class="bgWhite collegeHead">
			<div class="container">
				<div class="row">
					<div class="containerBox">

						<div class="col-xs-12 col-sm-3 col-md-2">
						<div class="collegeThumb">
							<img  width ="100%" src="<?php echo base_url()."upload/".$college->logo; ?>">
						</div>
						</div>
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


				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!--<div class="sectionGap">
				<div class="heading1">Counselling Video(7 Videos)</div>

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

				</div>-->

				<div class="sectionGap">
				<div class="heading1"><h2>College Photos and Videos(<?php echo count($videos); ?> Videos, <?php echo count($images); ?> Photos)</h2></div>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="collegeVideoSlide">
				<ul class="bxslider">
				<?php foreach($images as $image){ ?>
				<li style="float:left"><img width="200px;" height="140px;" src="<?php echo base_url()."upload/".$image->asset_name; ?>"></li>
				<?php } ?>
				</ul>
				<ul class="bxslider">
				<?php foreach($videos as $video){ ?>
				<li style="float:left"><video width="200" height="200" controls>
					<source src="<?php echo base_url()."upload/".$video->asset_name; ?>" type="video/mp4">
					<source src="<?php echo base_url()."upload/".$video->asset_name; ?>" type="video/ogg">
						Your browser does not support HTML5 video.
					</video>
				<?php } ?>
				</ul>
				</div>
				</div>

				</div>



				<div class="sectionGap">
				<div class="heading1"><h2>Courses offered</h2></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?php 

					foreach($streams as $stream){
						if(in_array($stream['stream_id'],@$stream_id)){
							  echo '<div class="coursesOffer"><h3> '.$stream['stream_name'].'<span class="collegeClose"></span></h3>';
							  
							  
							  
							  foreach($types as $type){
											  if(in_array($type['type_id'],@$type_id)){
											  echo '<h4 data-tab="collegetab1">'.$type['type_name'].'</h4>';
											  
											  
											  echo  '<div class="subCourses">
												<ul id="collegetab1" style="display:block">';
											  
											   //foreach($courses as $course){
												//	  if(in_array($course['course_id'],@$course_id['term_id'])){
														  
													//	echo '<li><a>'.$course['course_name'].'</a></li>';
													  //}
												//}
												
												
												foreach($course_id as $course){
														echo '<li><a>'.$course->title.'</a></li>';
														echo '<p>'.$course->duration.'</p>';
														echo '<p>'.$course->recognition.'</p>';
														echo '<p>'.$course->fee.'</p>';
														echo '<p>'.$course->exam.'</p>';
														echo '<p>'.$course->procedure.'</p>';
												}
												
											  
											 echo  '</div>
												</ul>'; 
											  
											  
											  
											  }
											  
											  
											
						     } 
							  
							echo "</div>";  
							  
						}
											  
					}




				?>
				




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
							$i = 0;
							foreach($services as $service){
							   echo "<p>$service</p>";
							}

					 ?>

					</div>

					<div class="sectionGap">
					<div class="heading2" id="top-recruiting-companies">Top Recruiting Companies</div>
					<?php $companies = explode(';',$college->top_recruiting_companies);
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
					<div class="heading2" id="hostel-facility">Hostel Facility</div>
					<?php $companies = explode(';',$college->hostel_details);
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
					<div class="heading2" id="infrastructure">Infrastructure / Teaching Facilities</div>
					<?php $companies = explode(';',$college->teaching_facilities);
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


					</div><div class="sectionGap">
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

			

				</div>
				</div>
				</div>
			</section>
        
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
