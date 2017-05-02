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
                <!-- <h3 class="box-title"><?php echo anchor('admin/coupon/create', '<i class="fa fa-plus"></i> Add New Coupon', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php $this->load->view('admin/coupons/manage_coupon_ajax');?>
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