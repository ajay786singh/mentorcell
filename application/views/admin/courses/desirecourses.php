  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <?php echo $pagetitle; ?>
       <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
                 <h3 class="box-title"><?php echo anchor('admin/courses/createdesire', '<i class="fa fa-plus"></i> Add New Desire Course', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Course ID</th>
				  <th>Course Name</th>
				  <th>Course Duration</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($courses_list as $courses){ ?>
                <tr>
				  <td><?php echo $courses['id'];?></td>
				  <td><?php echo $courses['name'];?></td>
				  <td><?php echo $courses['duration'];?></td>
                  <td><?php echo ($courses['status']==1)?"Active":"Inactive";?>   </td>
                  <td><a href="<?php echo base_url()."admin/courses/editdesire/".$courses['id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/courses/deletedesire/".$courses['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>Course ID</th>
				  <th>Course Name</th>
				  <th>Course Duration</th>
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