<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading">Get Coupon</div>

<div class="couponTabs">
<ul>
<li class="active" id="couponTab1">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>Login/Registration</h4>
</li>

<li class="active" id="couponTab2">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>IQ test</h4>
</li>

<li id="couponTab3">
<h3><i class="icon-tick"></i> <img src="<?php echo base_url()?>assets/theme/images/manage-icon.jpg" /></h3>
<h4>Get Coupon</h4>
</li>
</ul>
</div>


<div class="couponHolder">
	<div class="couponRow" id="couponBox1">
	</div>

	<div class="couponRow active" id="couponBox2">
	<div class="iqTest">
	<ol>
		<?php
		$a_question_ids		=	array();
		foreach($questionnaire_list as $k => $ques) {
			$qNo				=	$k+1;
			$question_id		=	$ques['question_id'];
			$a_question_ids[]	=	$question_id;
			$answer_list	= 	$this->common_model->get_all_rows("mc_answers",'question_id',$question_id,'answer_id asc');
			?>
			<li>
				<h3><?php echo $qNo.". ".$ques['question'];?></h3>
				<div class="iqAnsRow">
					<?php
					foreach($answer_list as $kk => $ans) {
						$answer_id	=	$ans['answer_id'];
						$correct	=	$ans['correct'];
						?>
							<div class="iqAnsBox"><input type="radio" name="answer<?php echo $question_id?>" id="ans<?php echo $answer_id;?>" value="<?php echo $answer_id."|".$correct;?>"> <label for="ans<?php echo $answer_id;?>"><?php echo $ans['answer']?></label></div>
						<?php
					}
					?>
				</div>
			</li>
			<?php
		}
		$question_ids		=	"";
		if($a_question_ids) {
			$question_ids	=	implode(",",$a_question_ids);
		}
		?>
	</ol>
	<input type="button" id='question_answer' value="Test Submit" class="go" name="">
	<input type="hidden" id='question_ids' value="<?php echo $question_ids;?>">
	</div>	
</div>

<div class="couponRow" id="couponBox3">

<div class="iqResult">
</div>

</div>
</div>




</div>
</div>
</div>
</section>