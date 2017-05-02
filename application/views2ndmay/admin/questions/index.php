  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quiz List
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
              <h3 class="box-title">Quiz</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Desire Course</th>
                  <th>Questions</th>
                   <th>Manage</th>
               </tr>
                </thead>
                <tbody>
                <?php foreach($questions_lists as $questions_list){ ?>
                <tr>
                  <td><?php echo $questions_list['title'];?></td>
                  <td><?php echo $questions_list['content'];?>   </td>
                  <td><a href="<?php echo base_url()."colleges/edit/".$questions_list['id'];?>">Edit</a> | <a href="<?php echo base_url()."questions/edit/".$questions_list['id'];?>">Delete</a></td>
               </tr>
               <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>Desire Course</th>
                  <th>Questions</th>
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