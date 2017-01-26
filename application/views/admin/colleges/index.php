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
                 <h3 class="box-title"><?php echo anchor('admin/colleges/create', '<i class="fa fa-plus"></i> Add New College', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
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
                  <th>Mobile</th>
                  <th>Address</th>
                   <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($college_lists as $college_list){ ?>
                <tr>
				  <td><?php echo $college_list['id'];?></td>
				  <td><img src="<?php echo base_url()."upload/".$college_list['logo'];?>" width="150px;" /></td>
                  <td><?php echo $college_list['name'];?></td>
                  <td><?php echo $college_list['contact_person_name'];?>   </td>
                  <td><?php echo $college_list['email_id'];?></td>
                  <td><?php echo $college_list['phone'];?></td>
                  <td><?php echo $college_list['address'];?><br/><?php
					$city = $this->common_model->get_single_row("cities", "id",$college_list['city']);
					$state = $this->common_model->get_single_row("states", "id",$college_list['state']);
					$country = $this->common_model->get_single_row("countries", "id",101);
				  echo $city['name']." ".$state['name'].", ".$country['name'];?></td>
				  
                  <td><a title="Edit" href="<?php echo base_url()."admin/colleges/view/".$college_list['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a title="Edit" href="<?php echo base_url()."admin/colleges/edit/".$college_list['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a title="Delete" href="<?php echo base_url()."admin/colleges/delete/".$college_list['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a> | <a title="Add Gallry" href="<?php echo base_url()."admin/colleges/gallery/".$college_list['id'];?>"><i class="fa fa-picture-o" aria-hidden="true"></i></a> | <a title="Courses" href="<?php echo base_url()."admin/colleges/course/".$college_list['id'];?>"><i class="fa fa-book" aria-hidden="true"></i></a> | <a title="Assign Courses" href="<?php echo base_url()."admin/colleges/assigncourse/".$college_list['id'];?>"><i class="fa fa-child" aria-hidden="true"></i></a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>ID</th>
				  <th>College Logo</th>
                  <th>College Name</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Mobile</th>
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