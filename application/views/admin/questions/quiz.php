
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quiz Details
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
            
            <form role="form" method="post" action="">
              <div class="box-body">
              
               <div class="form-group">
                  <label for="desire_course_id">Desire Course</label><br>

                  <select name="desire_course_id">
                  <option value="0">-- Select --</option>
                  <?php foreach($desire_courses as $desire_course_data){?>
                  
                  <option value="<?php echo $desire_course_data['id']; ?>"><?php echo $desire_course_data['title']; ?></option>
                  <?php }?>
                  
                  </select>
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1"> Question</label>
                  <input type="text" class="form-control" name="question" id="question" value="<?php echo @$questions_lists['content']; ?>" placeholder="Enter question name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"> Options 1</label>
                  <input type="text" class="form-control" name="option[]" id="answer_1" value="<?php echo @$questions_lists['content']; ?>" placeholder="Enter answer">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Options 2</label>
                  <input type="text" class="form-control" name="option[]" id="answer_2" value="<?php echo @$questions_lists['content']; ?>" placeholder="Enter answer">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Options 3</label>
                  <input type="text" class="form-control" name="option[]" id="answer_3" value="<?php echo @$questions_lists['content']; ?>" placeholder="Enter answer">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Options 4</label>
                  <input type="text" class="form-control" name="option[]" id="answer_4" value="<?php echo @$college_data['content']; ?>" placeholder="Enter answer">
                </div>
                
                <div class="form-group">
                  <label for="answer">Answer</label><br>

                  <select name="answer">
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                   <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
                 </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo @$question_data['id']; ?>" />
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
