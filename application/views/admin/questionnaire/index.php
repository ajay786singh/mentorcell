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
                 <h3 class="box-title"><?php echo anchor('admin/questionnaire/create', '<i class="fa fa-plus"></i> Add New Questionnaire', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table question_id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Category</th>
				  <th>Question</th>
				  <th>Level</th>
				  <!--<th>Type</th>-->
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($questionnaire_list as $questionnaire){ ?>
                <tr>
				  <td><?php echo $questionnaire['question_id'];?></td>
				  <td>
					<?php
						$question_id = $this->common_model->get_single_row("mc_categories", "category_id",$questionnaire['category_id']);
						echo $question_id['category_name'];
					?>
				  </td>
				  <td><?php echo $questionnaire['question'];?></td>				  
				  <td>
					<?php
						$level = $this->common_model->get_single_row("mc_levels", "level_id",$questionnaire['level_id']);
						echo $level['level'];
					?>
				  </td>
				  <!--<td><?php echo $questionnaire['type'];?></td>-->
                  <td><?php echo ($questionnaire['status']==1)?"Active":"Inactive";?>   </td>
                  <td><a href="<?php echo base_url()."admin/answers/index/".$questionnaire['question_id'];?>">Answers</a> | <a href="<?php echo base_url()."admin/questionnaire/edit/".$questionnaire['question_id'];?>">Edit</a> | <a href="javascript:void(0);" onClick="deleteRec(<?php echo $questionnaire['question_id'];?>)">Delete</a></td>
               </tr>
               <?php }?>
			   <script>
				function deleteRec(question_id) {
					var c = window.confirm("Are you sure to delete?");
					if (c == true) {
						location.href =  '<?php echo base_url()."admin/questionnaire/delete/"?>'+question_id;
					}
				}
			   </script>
                </tbody>
                <tfoot>
                <tr>
				  <th>ID</th>
				  <th>Category</th>
				  <th>Question</th>
				  <th>Level</th>
				  <!--<th>Type</th>-->
                  <th>Status</th>
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