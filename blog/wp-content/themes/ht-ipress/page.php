<?php

get_header();

// get sidebar layout
$layout     = get_post_meta( get_the_ID(), '_ht_layout', true );
$slideshow  = get_post_meta( get_the_ID(), '_ht_slideshow_status', true);
$page_title = get_post_meta( get_the_ID(), '_ht_page_title', true);


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
            if( 'off' != $slideshow ){
                load_template( get_stylesheet_directory() . '/includes/slideshow-content.php' );
            }
            ?>        
            <div class="posts <?php echo esc_attr($grid_8_class);?>">
            <?php if( 'on' == $page_title ) {?>
            <div class="title"><h4><?php the_title();?></h4></div>
            <?php } ?>
            <?php
            if(have_posts()):
                while (have_posts()) :the_post();
            ?>
            <div class="page-entry">
            <?php the_content(); ?>
            </div>
            <?php    
                endwhile;
            else:
                get_template_part( 'includes/templates/no-results' );
            endif;             ?>            
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