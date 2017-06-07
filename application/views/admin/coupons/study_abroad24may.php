  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Study Abroad
        <small>(Beta 1.0)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Name</th>
				  <th>Email</th>
                  <th>Phone</th>
                  <th>Courses</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($streams_list as $streams){ ?>
                <tr>
				  <td><?php echo $streams['id'];?></td>
				  <td><?php echo $streams['name'];?></td>
				  <td><?php echo $streams['email'];?></td>
                <td><?php echo $streams['phone'];?></td>
			<?php	$countryname = $this->common_model->get_single_row("countries", "id", $streams['country']);
			$contname = $countryname['name'];
			$statename = $this->common_model->get_single_row("states", "id", $streams['state']);
			$sname = $statename['name'];
			$cityname = $this->common_model->get_single_row("districts", "id", $streams['city']);
			$citname = $cityname['name'];
			$coursename = $this->common_model->get_single_row("mc_courses", "course_id", $streams['courses']);
			$cname = $coursename['course_name'];?>
                  <td><?php echo $cname;?>   </td>
                  <td><?php echo $contname;?>   </td>
                  <td><?php echo $sname;?>   </td>
                  <td><?php echo $citname;?>   </td>
                  <td><?php echo $streams['created'];?>   </td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				   <th>ID</th>
				  <th>Name</th>
				  <th>Email</th>
                  <th>Phone</th>
                  <th>Courses</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Date</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>