
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
            <form role="form" method="post" action="<?php echo base_url()."colleges/".$form_type;?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">College Name</label>
                  <input type="text" class="form-control" name="college_name" id="college_name" value="<?php echo @$college_data['college_name']; ?>" placeholder="Enter First Name">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" id="location" name="location" value="<?php echo @$college_data['location'] ; ?>" placeholder="Enter City">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Contact Person Name</label>
                  <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="<?php echo @$college_data['contact_person_name']; ?>" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Official Email address</label>
                  <input type="email" class="form-control" id="email_id" value="<?php echo @$college_data['email_id']; ?>" name="email_id" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo @$college_data['pwd']; ?>" name="pwd" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile</label>
                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php echo @$college_data['mobile_number']; ?>" placeholder="Enter Mobile">
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
              <input type="hidden" name="id" value="<?php echo @$college_data['id']; ?>" />
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
