<?php

if( get_post_meta(get_the_ID(), '_ht_slideshow_count', true) == '' ) {
    $number_of_posts = 9;
} else {
    $number_of_posts = (int) get_post_meta(get_the_ID(), '_ht_slideshow_count', true);
}

// homepage slider
$args = array(
    'post_type'      => '',
    'posts_per_page' => $number_of_posts,
    'orderby'       => 'rand',
    'meta_query' => array(
        array(
            'key'     => '_ht_slideshow_item',
            'value'   => 'on',
            'compare' => '=',
        ),
    ),
);
$slideshow_query  = new WP_Query($args);
$slide_item_count = $slideshow_query->post_count;

$j = 0;

if ( $slideshow_query->have_posts() ) :?>
<div class="ipress_slider mbf">
    <div class="slider_a owl-carousel owl-theme">
        <?php 
        for ( $i=0; $i < $slide_item_count; $i+=3 ) { 
        ?>
        <div class="item clearfix">
            <?php 
            $k = 1;                        
            while( $slideshow_query->have_posts() ) : $slideshow_query->the_post();
            $category = get_the_category();
            ?>
            <div class="half">
                <div class="slide_details">
                    <?php
                    if( $category[0] ){
                        $cat_name = $category[0]->cat_name;
                        $cat_id   = $category[0]->term_id;

                        echo '<a class="cat '. ht_category_color( $cat_id ) .'" href="'.get_category_link( $cat_id ).'" title="View all posts under '. $cat_name .'">'. $cat_name .'</a>';
                    }  

                    if ( function_exists('wp_review_show_total') ) {
                        $wp_review_show_total = get_post_meta( $post->ID, 'wp_review_total', true );
                        if( ! empty( $wp_review_show_total ) ) { 
                    ?>
                    <span class="post_rating" href="<?php the_permalink(); ?>" title="Rating"><i class="fa fa-star"></i> <?php echo $wp_review_show_total; ?></span>
                    <?php } } ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <?php 
                        if( $k == 1 ) {
                            the_post_thumbnail( 'slideshow_thumb_full_large' );
                        } else {
                            the_post_thumbnail( 'slideshow_thumb_half_large' );
                        }
                    ?>
                </a>
            </div><!-- /half -->
            <?php 
            $j++;
            $k++;
            if( ($j%3) == 0 ) break;
            endwhile; 
            ?>
        </div><!-- /slide -->
    <?php } ?>
    </div><!-- /slider -->
</div><!-- /slider ipress -->
<?php 
endif; 
wp_reset_postdata();
?>    