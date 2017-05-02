<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Logo List
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
              <?php echo anchor('admin/colleges/createlogo', '<i class="fa fa-plus"></i> Add New logo', array('class' => 'btn  btn-primary btn-flat')); ?>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
        <th>ID</th>
        <th>College Logo</th>
                <th>College Name</th>
                 <th>Manage</th>
              </tr>
              </thead>
              <tbody>

				<?php foreach($logo_lists as $college_list){ ?>
				  <tr>
				  <td><a title="Edit" href="<?php echo base_url()."admin/colleges/view/".$college_list['id'];?>">
					<?php echo $college_list['id'];?></a></td>
				  	<td><img src="<?php echo base_url()."upload/".$college_list['logo'];?>" width="150px;" /></td>
					<td><?php $location_id = $this->college_model->get_location($college_list['college_name']); 
					echo $location_id['0']['name'];?></td>
                   <td>
					<!--<a title="Edit" href="<?php echo base_url()."admin/colleges/view/".$college_list['id'];?>">
					<i class="fa fa-eye" aria-hidden="true"></i></a> |-->
					<a title="Edit" href="<?php echo base_url()."admin/colleges/editlogo/".$college_list['id'];?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
					<a title="Delete" href="<?php echo base_url()."admin/colleges/deletelogo/".$college_list['id'];?>">
					<i class="fa fa-trash" aria-hidden="true"></i></a>
					</td>

					</tr>
				 <?php }?>


              </tbody>
              <tfoot>
              <tr>
        <th>ID</th>
        <th>College Logo</th>
                <th>College Name</th>
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
