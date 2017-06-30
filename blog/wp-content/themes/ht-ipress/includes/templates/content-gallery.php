<div class="single_post mbf clearfix">
    <h3 class="single_title"><i class="icon-document-edit mi"></i><?php the_title();?></h3>
    <div class="meta mb"> <?php _e("By ", "highthemes"); the_author_posts_link();?>  / <?php echo ht_time_ago() ?>    /    <?php the_category(", "); ?>    /    <a href="<?php the_permalink();?>"><?php comments_number( __('No Comments', 'highthemes'),  __('1 Comment', 'highthemes'),  __('% Comments', 'highthemes') ); ?></a> </div>

    <?php
    if( $post_gallery_list != '' ) {
    ?>
    <div class="post-gallery mb">
    <?php                            
        for ($i=0; $i < count($gallery_thumb) ; $i++) {                            
    ?>
        <div class="post-gallery-item">
            <img src="<?php echo  $gallery_thumb[$i][0];?>" class="image-shadow" alt="<?php the_title_attribute();?>" >
        </div>
    <?php
        }
    }
    ?>
    </div>

    <div class="post-entry">
    <?php the_content(); ?>
    </div>
    <?php wp_link_pages(array('before'=>'<div class="post-navi clearfix">'.__('<span class="mid">Pages</span>','highthemes'),'after'=>'</div>','link_after'=>'</b>','link_before'=>'<b>')); ?>   

</div><!-- /gallery -->