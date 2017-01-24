  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Coupons List
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
              <h3 class="box-title">Coupons</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User</th>
                  <th>College</th>
                  <th>Course</th>
                  <th>Coupon</th>
                  <th>Expiry Date</th>
                   <th>Manage</th>
               </tr>
                </thead>
                <tbody>
                <?php foreach($coupons_lists as $coupons_list){ ?>
                <tr>
                  <td><?php echo $coupons_list['first_name']." ".$coupons_list['last_name'];?></td>
                  <td><?php echo $coupons_list['college_name'];?></td>
                  <td><?php echo $coupons_list['title'];?></td>
                  <td><?php echo $coupons_list['coupon'];?></td>
                  <td><?php echo $coupons_list['coupon_expiry_date'];?></td>
                  <td><a href="<?php echo base_url()."coupons/edit/".$coupons_list['id'];?>">Edit</a> | <a href="<?php echo base_url()."colleges/edit/".$coupons_list['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>User</th>
                  <th>College</th>
                  <th>Course</th>
                  <th>Coupon</th>
                  <th>Expiry Date</th>
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