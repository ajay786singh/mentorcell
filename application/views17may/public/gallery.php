
<div class="containerBox">
<div class="sectionHeading">Career counseling video</div>

<div class="col-xs-12 col-sm-12">
<div class="managementArea">
<ul>
<?php foreach($counceling_video as $video){ ?>
<li>
<div class="manageIcon"><a class='various fancybox fancybox.iframe' href='<?php echo base_url()."upload/".$video['video'];?>'>
<video width='320' height='100' controls>
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
</section>