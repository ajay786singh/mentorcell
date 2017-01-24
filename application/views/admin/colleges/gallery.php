  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Colleges Gallery
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
                 <h3 class="box-title"><?php echo $message; ?></h3>
            </div>
            <!-- /.box-header -->
			<div class="box-body">
				<?php echo form_open(base_url()."index.php/admin/colleges/saveimage", array('class' => 'dropzone form-horizontal', 'id' => 'form-create_stream'));
					?>
				<input type="hidden" name="college_id" value="<?php echo $college_id; ?>" id="college_id">		
				<?php echo form_close();?>
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