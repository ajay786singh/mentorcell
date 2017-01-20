
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        College Details
        <small>Beta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url()."coupons/".$form_type;?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input type="text"  class="form-control" name="student_id" id="student_id" value="<?php echo @$coupon_details['user_id']; ?>" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">College</label>
                  <select name="college_id">
                  <?php foreach($colleges_list as $college_data){ ?>
                  <option value="<?php echo $college_data['id'];?>" <?php if($college_data['id'] == @$coupon_details['college_id']){echo "selected";} ?>><?php echo $college_data['college_name'];?></option>
				  <?php }?>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Desire Course</label>
                  <select name="course_id">
                  <?php foreach($courses_list as $courses_data){ ?>
                  <option value="<?php echo $courses_data['id'];?>" <?php if($courses_data['id'] == @$coupon_details['course_id']){echo "selected";} ?>><?php echo $courses_data['title'];?></option>
				  <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Code</label>
                  <input type="text" class="form-control" id="coupon_code" value="<?php echo @$coupon_details['coupon']; ?>" name="coupon_code" placeholder="Enter Coupon Code">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Expiry Date</label>
                  <input type="text" class="form-control" id="coupon_expiry_date" value="<?php echo @$coupon_details['coupon_expiry_date']; ?>" name="coupon_expiry_date" placeholder="Coupon Expiry date">
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="is_active">
                  <option value="1">Active</option>
                  <option value="0">De-active</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo @$coupon_details['id']; ?>" />
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
