  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Description Page List
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
            <div class="box-header with-border"><a href="<?php echo base_url();?>/admin/course_detail/create" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add New Course Description</a></div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Course Description Page Name</th>
                   <th>Manage</th>
               </tr>
                </thead>
                <tbody>
                <?php foreach($course_description_page_name_list as $course_description_page_name){ ?>
                <tr>
                  <td><?php echo $course_description_page_name['course_description_page_name'];?></td>
                  <td><a href="<?php echo base_url()."admin/course_description/edit/".$course_description_page_name['id'];?>">Edit</a> | <a href="<?php echo base_url()."admin/course_description/edit/".$course_description_page_name['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                   <th>Course Name</th>
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