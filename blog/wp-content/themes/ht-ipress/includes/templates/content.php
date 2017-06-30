<?php
$thumb =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'slideshow_thumb_full_large');
?>
<!-- post -->
    <div id="post-<?php the_ID(); ?>" <?php post_class('post_day mbf clearfix'); ?>>
        <div class="grid_6 alpha relative">
            <a class="hover-shadow" href="<?php the_permalink();?>">
            	<img src="<?php echo $thumb[0];?>" alt="<?php the_title_attribute();?>">
            </a>
        </div><!-- /grid6 alpha -->
        <div class="grid_6 omega">
            <div class="post_day_content">
                <h3> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h3>
                <div class="meta mb"> <?php echo ht_time_ago();?>    /    <a href="<?php echo get_comments_link();?>"><?php comments_number( '0', '1', '%' );?> <?php _e('comments','highthemes');?></a></div>
                <p> 
                <?php 
                if ( ot_get_option('excerpt-length') != '0' ) {
                    the_excerpt(); 
                } 
                ?>
                </p>
            </div><!-- /post content -->
        </div><!-- /grid6 omega -->
    </div><!-- /post day -->
<!-- /post -->