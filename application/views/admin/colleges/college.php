
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
				<li style="float:left"><img width="200px;" src="<?php echo base_url()."upload/".$image->asset_name; ?>"></li>
				<?php } ?>
				</ul>
				<ul class="bxslider">
				<?php foreach($videos as $video){ ?>
				<li style="float:left"><video width="200" controls>
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
				<div class="heading1"><h2>Why Join Indian Institute of Technology, Delhi (IITD)</h2></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<ul class="liststyletyep">
				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard </li>
				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard</li>
				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard </li>
				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard </li>
				</ul>

				<!--<div class="collegeRankRating">

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

				</div>-->

				</div>


				</div>


				<div class="sectionGap">
				<div class="heading1"><h2>College Details</h2></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="sectionGap">
				<div class="heading2"><h3>Placement Services</h3></div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>

				<p>For Management Studies (2014-15)</p>

				<p>% of students placed : 100%</br>
				% of students secured PPOs/PPLs : 30 %</br>
				No. of first time recruiters : 28</br>
				Total no. of students placed : 62</br>
				No. of offers mode : 82</br>
				No. of participating companies : 49</br>
				Highest salary offered : Rs. 19.87 Lakhs P.A</br>
				Average salary offered : Rs. 13.27 Lakhs P.A</br>
				Lowest salary offered : Rs. 7.36 Lakhs P.A</p>


				</div>

				<div class="sectionGap">
				<div class="heading2"><h3>Top Recruiting Companies</h3></div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>


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
