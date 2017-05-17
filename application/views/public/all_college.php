<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><?php if($streamid==37){ echo 'Management'; }else if($streamid==34){echo 'Engineering';} ?></br><span><?php if($type == 'popular'){echo '(Popular Colleges)';}else if($type == 'featured'){ echo '(Featured Colleges)';} ?></span></div>
<?php $get_college_eng2 = $this->common_model->get_college_detail("mc_course_assignment","stream_id",$streamid);
if($type=='popular'){
	$types = 'popular_colleges';
}else if($type=='featured'){
	$types = 'featured_colleges';
}
 if($get_college_eng2){
	 foreach($get_college_eng2 as $college_eng2){
 $eng_college_location2 = $this->common_model->get_all_main_course("mc_colleges","id",$college_eng2['college_id'],$types,"1");
foreach($eng_college_location2 as $college_location_eng2){ ?>

<div class="teamRow">
<div class="teamPic"><img src="<?php echo base_url('upload/'.$college_location_eng2['logo']); ?>"></div>
<div class="teamDetail">
<a target="_blank" href="<?php echo base_url()."search?college=".$college_eng2['college_id']; ?>" ><h3><?=$college_location_eng2['name'];?></h3></a>
<h4><?php echo $college_location_eng2['address']; ?><?php echo $college_location_eng2['city']; ?>, <?php echo $college_location_eng2['state']; ?>,<?php echo $college_location_eng2['country']; ?> <?php echo $college_location_eng2['pincode']; ?></h4>
<p><?=$college_location_eng2['description'];?></p>
</div>
</div>
 <?php
}
	 }
 } ?>
</div>
</div>
</div>

<style>
  .teamRow .teamPic {
    
    height: auto !important;
     border:none !important;
    border-radius:0px !important;
}
.teamRow .teamPic img {
	border-radius:0px !important;
}
</style>
</section>




