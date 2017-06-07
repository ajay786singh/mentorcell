<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Colleges Courses
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
<?php $college_location_eng2 = $this->common_model->get_single_row("mc_colleges","id",$college_id);?>
<h3><?=$college_location_eng2['name'];?></h3>
 </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
      <th>ID</th>
        <th>Stream</th>
                <th>Course</th>
                <th>Specialization</th>
                 <th>Manage</th>
              </tr>
              </thead>
              <tbody>

				<?php foreach($assign_list as $college_list){ ?>
				  <tr>
					<td><?php echo $college_list['assigned_id'];?></td>

					<td><?php 
							  if(!empty($college_list['stream_id'])){
								  $strem = $this->college_model->get_strem_data($college_list['stream_id']);
								 
							if(!empty($strem->stream_name)){  echo $strem->stream_name; ?><?php
							  } }  ?></td>

					<td><?php  if(!empty($college_list['course_id'])){
								  $cad = $this->college_model->get_course_data($college_list['course_id']);
							  if(!empty($cad->course_name)){echo $cad->course_name; ?><?php
							  } } ?>   </td>

					<td><?php  if(!empty($college_list['specialization_id'])){
								  $spel = $this->college_model->get_spel_data($college_list['specialization_id']);
							if(!empty($spel->specialization_name)){  echo $spel->specialization_name; ?><?php
							  } } ?></td>
                        <td>
					<a title="Delete" href="<?php echo base_url()."admin/colleges/deletecourse/".$college_list['assigned_id']."/".$college_id?>">
					<i class="fa fa-trash" aria-hidden="true"></i></a> |
					<a title="Assign Courses" href="<?php echo base_url()."admin/colleges/editassigncourse/".$college_list['assigned_id']."/".$college_id;?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</td>

					</tr>
				 <?php }?>


              </tbody>
              <tfoot>
              <tr>
        <th>ID</th>
        <th>Stream</th>
                <th>Course</th>
                <th>Specialization</th>
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
