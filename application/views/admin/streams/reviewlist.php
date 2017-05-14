  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Review List
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
				  <th>Review ID</th>
				  <th>college Name</th>
				  <th>Stream Name</th>
              <th>Course Name</th>
              <th>Review Title</th>
                  <th>Person Name</th>
                  <th>Person Email</th>
				  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($review_list as $review){ ?>
                <tr>
				  <td><?php echo $review['id'];?></td>
				  <td><?php
                       $college_name = $this->common_model->get_single_var('name', 'mc_colleges', 'id', $review['college_name']);
				  echo $college_name; ?></td>
				  <td><?php
$stream_name = $this->common_model->get_single_var('stream_name', 'mc_streams', 'stream_id', $review['stream_name']);
				  echo $stream_name; ?>
				  </td>
               <td><?php
$course_name = $this->common_model->get_single_var('course_name', 'mc_courses', 'course_id', $review['course_name']);
				  echo $course_name; ?></td>
               <td><?php echo $review['review_title'];?></td>
               <td><?php echo $review['fname'];?> &nbsp; <?=$review['lname']?></td>
               <td><?php echo $review['email'];?></td>
				  <td><?php if($review['status']==1){ ?> <a href="<?php echo base_url()?>admin/streams/editstatus?stat=<?=$review['status']?>&id=<?=$review['id']?>">Active </a> <?php }else{ ?> <a href="<?php echo base_url()?>admin/streams/editstatus?stat=<?=$review['status']?>&id=<?=$review['id']?>">InActive</a> <?php } ?></td>
                  <td><a href="<?php echo base_url()."admin/streams/viewreview/".$review['id'];?>">View</a> | <a href="<?php echo base_url()."admin/streams/deletereview/".$review['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				<th>Review ID</th>
				  <th>college Name</th>
				  <th>Stream Name</th>
              <th>Course Name</th>
              <th>Review Title</th>
                  <th>Person Name</th>
                  <th>Person Email</th>
                  <th>Status</th>
                  <th>Manage</th>
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