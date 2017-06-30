<?php
$audio_code = get_post_meta($post->ID, '_audio_code', true);
?>
<div class="single_post mbf clearfix">
	<h3 class="single_title"><i class="icon-volume-full mi"></i><?php the_title();?></h3>
	<div class="meta mb"> <?php _e("By ", "highthemes"); the_author_posts_link();?>  / <?php echo ht_time_ago() ?>    /    <?php the_category(", "); ?>    /    <a href="<?php the_permalink();?>"><?php comments_number( __('No Comments', 'highthemes'),  __('1 Comment', 'highthemes'),  __('% Comments', 'highthemes') ); ?></a> </div>
    <?php 
    if( $audio_code != '' ){
       echo $audio_code; 
    } 
    the_content(); 
    wp_link_pages(array('before'=>'<div class="post-navi clearfix">'.__('<span class="mid">Pages</span>','highthemes'),'after'=>'</div>','link_after'=>'</b>','link_before'=>'<b>')); 
    ?>   
</div><!-- /Audio post -->
