<section class="bgWhite">
<div class="container">
<div class="row">
<div class="containerBox">
<div class="sectionHeading"><h5>Testimonial</h5></div>
<?php $testimonial = $this->common_model->get_all_rows("mc_testimonial", 1,1); ?>
<?php foreach($testimonial as $testiml){ ?>
					
<div class="teamRow">
<div class="teamPic"><img src="<?php if(empty($testiml['image'])){ ?> https://dummyimage.com/200X200/cccacc/fff.jpg&text=no+image <?php }else{ ?><?php echo base_url()."upload/testimonial/".$testiml['image']; }?>"></div>
<div class="teamDetail">
<h3><?=$testiml['username'];?></h3>
<h4><?=$testiml['title'];?></h4>
<p><?=$testiml['description'];?></p>
</div>
</div>
<?php } ?>

</div>
</div>
</div>
</section>




