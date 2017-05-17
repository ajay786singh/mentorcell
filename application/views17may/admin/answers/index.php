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
                 <h3 class="box-title"><?php echo anchor('admin/answers/create/'.$question_id, '<i class="fa fa-plus"></i> Add / Edit New Answer', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table answer_id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Answer</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($answer_list as $answers){ ?>
                <tr>
				  <td><?php echo $answers['answer_id'];?></td>
				 
				  <td><?php echo $answers['answer'];?></td>				  
				 
                  <td><?php echo ($answers['correct']==1)?"Correct Answer":"";?>   </td>
                  <td><a href="javascript:void(0);" onClick="deleteRec(<?php echo $question_id;?>,<?php echo $answers['answer_id'];?>)">Delete</a></td>
               </tr>
               <?php }?>
			   <script>
				function deleteRec(question_id,answer_id) {
					var c = window.confirm("Are you sure to delete this answer?");
					if (c == true) {
						location.href =  '<?php echo base_url()."admin/answers/delete"?>/'+question_id+'/'+answer_id;
					}
				}
			   </script>
                </tbody>
                <tfoot>
                <tr>
				  <th>ID</th>
				  <th>Category</th>
				  <th>Answer</th>				  
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