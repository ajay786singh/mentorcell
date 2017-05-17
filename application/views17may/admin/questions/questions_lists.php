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
            <div class="box-header">
              <h3 class="box-title">Colleges</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>College</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Location</th>
                   <th>Manage</th>
               </tr>
                </thead>
                <tbody>
                <?php foreach($college_lists as $college_list){ ?>
                <tr>
                  <td><?php echo $college_list['college_name'];?></td>
                  <td><?php echo $college_list['contact_person_name'];?>   </td>
                  <td><?php echo $college_list['email_id'];?></td>
                  <td><?php echo $college_list['mobile_number'];?></td>
                  <td><?php echo $college_list['location'];?></td>
                  <td><a href="<?php echo base_url()."colleges/edit/".$college_list['id'];?>">Edit</a> | <a href="<?php echo base_url()."colleges/edit/".$college_list['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>College</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Location</th>
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