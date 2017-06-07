
<div class="containerBox">
<div class="sectionHeading">Career coun<span class="video-col">selling video</span></div>

<div class="col-xs-12 col-sm-12">
<div class="managementArea">
<ul>
<?php foreach($counceling_video as $video){ ?>
<li>
<div class="manageIcon"><img class='play-img' src='<?=base_url();?>assets/theme/images/video-p.png'><a class='various fancybox fancybox.iframe' href='<?php echo base_url()."upload/".$video['video'];?>'>
<video width='320' height='100'>
    <source src="<?php echo base_url()."upload/".$video['video'];?>">
</video></div>
<div class="manageText"><?=$video['title']?></div>
</li>
<?php } ?>
</ul>

</div>

</div>

</div>
</div>
</div>

<style>
.video-col{
	color:#f66132;
}
.managementArea ul li .manageIcon img{
	    position: absolute;
       width: 31px;
      top: 31px;
    left: 79px;
}
.managementArea ul li .manageIcon {
    height: 80px;
    position: relative;
}
.managementArea ul li .manageText{
	margin-top: 16px;
    text-transform: capitalize;
}
a, input, button, *:focus {
    color: #fff !important;
}
</style>

</section>