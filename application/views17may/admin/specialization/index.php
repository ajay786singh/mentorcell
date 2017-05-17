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
                 <h3 class="box-title"><?php echo anchor('admin/specialization/create', '<i class="fa fa-plus"></i> Add New Specialization', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Course</th>
				  <th>Specialization</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($specialization_list as $specialization){ ?>
                <tr>
				  <td><?php echo $specialization['specialization_id'];?></td>
				  <td><?php
							$course_id = $this->common_model->get_single_row("mc_courses", "	course_id",$specialization['course_id']);
						echo $course_id['course_name'];
				  ?>
				  </td>
				  <td><?php echo $specialization['specialization_name'];?></td>
                  <td><?php echo ($specialization['status']==1)?"Active":"Inactive";?>   </td>
                  <td><a href="<?php echo base_url()."admin/specialization/edit/".$specialization['specialization_id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/specialization/delete/".$specialization['specialization_id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>ID</th>
				  <th>Course</th>
				  <th>Specialization</th>
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