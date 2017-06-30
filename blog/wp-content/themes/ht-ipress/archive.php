<?php

get_header();

// get sidebar layout
$layout     = ot_get_option( 'layout-global' );

// grid classes
include( locate_template('includes/layout-classes.php') ); 
?>
<div class="page-content <?php echo esc_attr($page_content_class);?>">
    <div class="row clearfix">
        <div class="<?php echo esc_attr($grid_9_class);?>">     
            <div class="posts <?php echo esc_attr($grid_8_class);?>">
            <div class="title colordefault"><h4>
            <?php
            if ( is_page() || is_single() ) the_title();
            else if ( is_category() ) _e("Category : ",'highthemes'). single_cat_title('', true);
            else if ( is_tag() ) _e("Tag : ",'highthemes').single_tag_title('', true);
            else if ( is_year() ) echo get_the_date( _x( 'Y', 'yearly archives date format', 'highthemes' ) );
            else if ( is_month() )  echo get_the_date( _x( 'F Y', 'monthly archives date format', 'highthemes' ) );
            else if ( is_day() )  echo get_the_date();
            else if ( is_author() ) echo get_the_author();
            else if ( is_search() ) printf( __('Search results for','highthemes') . " %s", '"' . get_search_query() . '"' );
            else if ( is_tax() ) {
                global $wp_query;
                $term = $wp_query->get_queried_object();
                echo $term->name;
            } 
            ?>
           </h4></div>
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ): the_post();
                        get_template_part('includes/templates/content');
                endwhile;
                get_template_part('includes/pagination');

            else:
                get_template_part( 'includes/templates/no-results' );
            endif;           
            ?>
       
            </div><!-- end posts -->
            <?php if( 'sidebar-right' != $layout && 'sidebar-left' != $layout && 'without-sidebar' != $layout ) {?>
            <div class="grid_4 <?php echo esc_attr($grid_4_class);?> sidebar sidebar_b">
            <?php  get_sidebar('primary'); ?>
            </div><!-- end grid4 -->
            <?php } ?>
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