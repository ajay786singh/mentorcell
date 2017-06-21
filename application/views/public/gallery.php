
<div class="containerBox">
<div class="sectionHeading"><h5>Career coun<span class="video-col">selling video</span></h5></div>
</div>
<div class="full-width">

<div class="container-fluid" style="padding:0px;">



<div class="manage-back">
<div class="containerBox">

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
</div><!--manage-back-->
</div>
</div>
<div>


</div>
</div>


<style>
.footerSection{
 margin-top: 32px;
}




.manageIcon img{
		width: 64px !important;
	}

.managementArea ul li .manageText{
	text-overflow: inherit;
	
}

.managementArea ul li{
	border-radius:0px;
}
#introductionVideo, video{
	height: 111px !important;
}
.managementArea ul li .manageText{
	font-size: 14px;
	
}
.manageText a{
	    background: #ccc;
		transition: all ease-in-out 0.2s;
    
    padding: 4px 90px 10px 62px;
    
    color: #fff !important;
    
}
.manageText a:hover{
	background: none;
}

.managementArea ul li .manageText{
	margin-top: 30px !important;
    text-transform: capitalize;
    
}

.manage-back {
    background: #f1f1f2;
    width: 100%;
    height: 231px;
	float:left;
	margin-bottom: 40px;
}




.video-col{
	color:#f66132;
}
.managementArea ul li .manageIcon img{
	    position: absolute;
       width: 31px;
      top: 29px;
    left: 65px;
}
.managementArea ul li .manageIcon {
    height: 80px;
    position: relative;
}
.managementArea ul li .manageText{
	margin-top: 16px;
    text-transform: capitalize;
}
.footerWidget h3 a {
    color: #fff !important;
}
p a {
    color: #fff;
}

a:hover, a:focus {
    color: #fff !important;
}
</style>

</section>