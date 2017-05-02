  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Courses Type List
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
                 <h3 class="box-title"><?php echo anchor('admin/types/create', '<i class="fa fa-plus"></i> Add New Course Type', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Type ID</th>
				  <th>Course Stream</th>
				  <th>Type Name</th>
                  <th>Type Code</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($types_list as $types){ ?>
                <tr>
				  <td><?php echo $types['type_id'];?></td>
				  <td><?php
							$type_id = $this->common_model->get_single_row("mc_streams", "stream_id",$types['stream_id']);
						echo $type_id['stream_name'];
				  ?>
				  </td>
				  <td><?php echo $types['type_name'];?></td>
                  <td><?php echo $types['type_code'];?></td>
                  <td><?php echo ($types['status']==1)?"Active":"Inactive";?>   </td>
                  <td><a href="<?php echo base_url()."admin/types/edit/".$types['type_id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/types/delete/".$types['type_id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>Type ID</th>
				  <th>Course Stream</th>
				  <th>Type Name</th>
                  <th>Type Code</th>
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