  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Counseling Video List
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
                 <h3 class="box-title"><?php echo anchor('admin/streams/create_counseling_video', '<i class="fa fa-plus"></i> Add New Counseling Video', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Video</th>
				  <th>Title</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($counceling_video as $counceling_video){ ?>
                <tr>
				  <td> <video width="320" height="240" controls>
    <source src="<?php echo base_url()."upload/".$counceling_video['video'];?>">
</video>
</td>
				  <td><?php echo $counceling_video['title'];?></td>
                  <td><?php echo ($counceling_video['status']==1)?"Active":"Inactive";?>   </td>
                  <td><a href="<?php echo base_url()."admin/streams/edit_counselingvideo/".$counceling_video['id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/streams/delete_councelingvideo/".$counceling_video['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				 <th>Video</th>
				  <th>Title</th>
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