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
                 <h3 class="box-title"><?php echo anchor('admin/caller/create', '<i class="fa fa-plus"></i> Add New Caller', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Name</th>
				  <th>Phone</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($caller_list as $caller){ ?>
                <tr>
				  <td><?php echo $caller['id'];?></td>
				  <td><?php echo $caller['name'];?></td>
				  <td><?php echo $caller['phone'];?></td>
                  <td><a href="<?php echo base_url()."admin/caller/edit/".$caller['id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/caller/delete/".$caller['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>ID</th>
				  <th>Name</th>
				  <th>Phone</th>
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