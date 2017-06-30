<?php

get_header();

// get sidebar layout
$layout      = get_post_meta( get_the_ID(), '_ht_layout', true );
$slideshow   = get_post_meta( get_the_ID(), '_ht_slideshow_status', true );

$layout_mode =   ht_get_sidebar_mode();
$thumb       =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_post_thumbnail_1');
$thumb_large =   wp_get_attachment_image_src( get_post_thumbnail_id(), $layout_mode);


if( $layout_mode == 'large' ) {
    $thumb = $thumb_large;
}

$post_gallery_list = get_post_meta( get_the_ID(), 'post-gallery', true );
if( $post_gallery_list != '' ) {
    $post_gallery_item = explode(",", $post_gallery_list);
    $gallery_thumb = array();
    foreach ($post_gallery_item as $key => $value) {
        if( $layout_mode == 'large' ) {
            $gallery_thumb[$key] = wp_get_attachment_image_src( $value , 'large');
        } else {
            $gallery_thumb[$key] = wp_get_attachment_image_src( $value , 'blog_post_thumbnail_1');
        }    
    }
}

if( 'inherit' == $layout ) {
    $layout = ot_get_option( 'layout-global' );
}

// grid classes
include( locate_template('includes/layout-classes.php') );        

?>
<div class="page-content <?php echo esc_attr($page_content_class);?>">
    <div class="row clearfix">
        <div class="<?php echo esc_attr($grid_9_class);?>">
            <?php
            if( 'on' == $slideshow ) {
                load_template( get_stylesheet_directory() . '/includes/slideshow-content.php' );
            }
            ?>        
            <div class="posts <?php echo esc_attr($grid_8_class);?>">
			<?php
			if ( have_posts() ) :
			    while ( have_posts() ) : the_post();
                    
                    $post_format = get_post_format();
                    if( $post_format == 'video' || $post_format == 'audio' ) {
                        
                        include(locate_template('includes/templates/content-'. get_post_format() .'.php'));

                    } elseif( $post_format == 'gallery' ) {  

                        include(locate_template('includes/templates/content-gallery.php'));
                        
                    } else { 
			        ?>
        			<div class="single_post mbf clearfix">
        				<h3 class="single_title"><i class="icon-document-edit mi"></i><?php the_title();?></h3>
        				<div class="meta mb"> <?php _e("By ", "highthemes"); the_author_posts_link();?>  / <?php echo ht_time_ago() ?>    /    <?php the_category(", "); ?>    /    <a href="<?php the_permalink();?>"><?php comments_number( __('No Comments', 'highthemes'),  __('1 Comment', 'highthemes'),  __('% Comments', 'highthemes') ); ?></a> </div>

                        <?php if( ot_get_option('single_featured') == 'on' ){?>
                            <img class="mbt" src="<?php echo $thumb[0];?>" class="image-shadow" alt="<?php the_title_attribute();?>" >
                        <?php } ?> 

        				<div class="post-entry">
                        <?php the_content(); ?>
                        </div>
                        <?php wp_link_pages(array('before'=>'<div class="post-navi clearfix">'.__('<span class="mid">Pages</span>','highthemes'),'after'=>'</div>','link_after'=>'</b>','link_before'=>'<b>')); ?>   

        			</div><!-- /single post -->
                <?php 
                    the_tags('<p class="mtf tagcloud single_post"><span>'.ot_get_option('tags_post_tr').'</span> ','','</p>');
                    }
                endwhile;
            else:
                get_template_part( 'includes/templates/no-results' );
            endif;
            
            // show share buttons
            if ( ot_get_option( 'share_post' ) == 'on' ) { 
                get_template_part('includes/share-posts'); 
            }

            // author bio
            if( ot_get_option( 'author_box' ) == 'on' ){
                ht_author_bio();             
            }

            // post links
            ?>
            <div class="posts_links mbf clearfix">
                <div class="next-post grid_6 lefter relative"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i><small>'.__('Previous:', 'highthemes').'</small> <span>%title</span>'); ?></div>
                <div class="prev-post grid_6 righter tar relative"><?php next_post_link('%link', '<i class="icon-chevron-right"></i><small>'.__('Next:', 'highthemes').'</small> <span>%title</span>'); ?></div>
            </div><!-- /posts links -->   
            <?php 

            // related posts
            if( ot_get_option( 'related_posts' ) != 'none' ){
                get_template_part('includes/related-posts'); 
            }

            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() ) {
            ?>
            <div id="post-comments">
            	<?php comments_template( '', true ); ?>
            </div>
            <?php } ?>             		
              </div><!-- end posts -->
            <?php if( 'sidebar-right' != $layout && 'sidebar-left' != $layout && 'without-sidebar' != $layout ) {?>
            <div class="grid_4 <?php echo esc_attr($grid_4_class);?> sidebar sidebar_b">
            <?php  get_sidebar('primary'); ?>
            </div><!-- end grid4 -->
            <?php }?>
        </div><!-- end grid9 -->
        
        <?php if('sidebar-right' == $layout || 'sidebar-left' == $layout ) {?>
            <div class="grid_3 <?php echo esc_attr($grid_3_class);?> sidebar sidebar_a">
                <?php  get_sidebar('primary'); ?>
            </div><!-- /grid3 sidebar A -->     
        <?php } else { ?>  
            <?php if('without-sidebar' != $layout ) {?>
            <div class="grid_3 <?php echo esc_attr($grid_3_class);?> sidebar sidebar_a">
                <?php  get_sidebar('secondary'); ?>
            </div><!-- /grid3 sidebar A -->   
            <?php } ?>  
        <?php } ?>   

    </div><!-- /row -->
</div><!-- /end page content -->                
<?php  get_footer();?>