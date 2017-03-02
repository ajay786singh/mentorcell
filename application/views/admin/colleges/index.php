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
              <?php echo anchor('admin/colleges/create', '<i class="fa fa-plus"></i> Add New College', array('class' => 'btn  btn-primary btn-flat')); ?>

       <?php echo anchor('admin/colleges/import', '<i class="fa fa-plus"></i> Export from Excel', array('class' => 'btn  btn-primary btn-flat pull-right')); ?>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
        <th>ID</th>
        <th>College Logo</th>
                <th>College Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Address</th>
                 <th>Manage</th>
              </tr>
              </thead>
              <tbody>

              


              </tbody>
              <tfoot>
              <tr>
        <th>ID</th>
        <th>College Logo</th>
                <th>College Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Address</th>
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
