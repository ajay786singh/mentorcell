  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Colleges List
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
                 <h3 class="box-title"><?php echo anchor('admin/streams/create', '<i class="fa fa-plus"></i> Add New Stream', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Stream ID</th>
				  <th>Stream Logo</th>
				  <th>Stream Name</th>
                  <th>Stream Code</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($streams_list as $streams){ ?>
                <tr>
				  <td><?php echo $streams['stream_id'];?></td>
				  <td><img src="<?php echo base_url()."upload/".$streams['stream_logo'];?>" width="150px;" /></td>
				  <td><?php echo $streams['stream_name'];?></td>
                  <td><?php echo $streams['stream_code'];?></td>
                  <td><?php echo ($streams['status']==1)?"Yes":"No";?>   </td>
                  <td><a href="<?php echo base_url()."admin/streams/edit/".$streams['stream_id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/streams/delete/".$streams['stream_id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>Stream ID</th>
				  <th>Stream Logo</th>
				  <th>Stream Name</th>
                  <th>Stream Code</th>
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