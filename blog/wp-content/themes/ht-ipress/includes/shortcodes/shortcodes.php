<?php
/**
 *
 * HighThemes Options Framework
 * twitter : http://twitter.com/theHighthemes
 * 
 * List of shortcodes
 * - ht_featured_category
 * - ht_featured_cat_carousel
 * - ht_post_of_day
 * - ht_fancy_title
 * - ht_notification
 * - ht_quote 
 * - ht_button
 * - ht_social  
 * - ht_embed_video
 * - ht_highlight
 * - ht_gap
 * - ht_col
 * - ht_subcol
 */
    

/**
 * Format Highthemes shortcodes to remove extra p
 *
 */
function ht_shortcodes_formatter($content) {
	$block = join("|", array(
		'ht_featured_category',
        'ht_featured_cat_carousel',
        'ht_post_of_day',
        'ht_col',
		'ht_subcol',
		'ht_gap',
		));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}
add_filter('the_content', 'ht_shortcodes_formatter');
add_filter('widget_text', 'ht_shortcodes_formatter');

/**
 * Display A Featured Category
 *
 */
if( ! function_exists( 'ht_featured_category' ) ) {
    function ht_featured_category( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'cat_id'       => '',
            'post_number'  => 9,
            'column'       => '',
            'cat_link'     => '',

        ), $atts));        

        $out         = '';

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $post_number,
            'cat'            => $cat_id,
        );
    
        $fcat_query      = new WP_Query($args);
        $fcat_post_count = $fcat_query->post_count;
        $rss_url         = site_url() . '/?cat=' .$cat_id . '&feed=rss2';

        if ($fcat_query->have_posts()) :

                $out .='
                <div class="posts_block mbf clearfix">
                    <div class="title '. ht_category_color( $cat_id ) .'">';

                if( empty( $cat_link ) ) {
                    $out .='<h4>'.  get_cat_name( $cat_id ) .'</h4>';
                } else {
                    $out .='<a href="'.get_category_link( $cat_id ).'" title="'. get_cat_name( $cat_id ) .'"><h4>'.  get_cat_name( $cat_id ) .'</h4></a>';
                }

                $out .='<a href="'. $rss_url .'" class="feed toptip" title="'.__("RSS Feed", "highthemes").'"><i class="icon-feed"></i></a>
                    </div><!-- /title bar -->';

                $i = 1;
                $j = 0;

                while( $fcat_query->have_posts() ) : $fcat_query->the_post();

                $thumb_large =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'slideshow_thumb_full_large');  
                $thumb_small =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb_small');            

                if( 1 == $column ) {

                    if( 1 == $i ) {
                       $out .='<div class="small_slider_music owl-carousel owl-theme">';
                    }
                    if( ($i - 1) == 0 || ($i - 1) % 4 == 0 ) {
                    $out .='                            
                        <div class="item clearfix">
                            <ul class="small_posts">';
                    }

                    $out .=' 
                            <li class="clearfix">
                                <a class="s_thumb hover-shadow" href="'. get_permalink() .'"><img width="70" height="70" src="'.$thumb_small[0].'" alt="' . the_title_attribute('echo=0') . '"></a></a>
                                <h3><a href="'. get_permalink() .'">'.get_the_title().'</a></h3>
                                <div class="meta mb"> '. ht_time_ago() .' / <a href="'. get_comments_link() .'">'. get_comments_number() .' '.__(' comments','highthemes').'</a> </div>
                            </li>';


                    if( $i == $fcat_post_count || $i % 4 == 0 ) {
                    $out .='                
                            </ul>
                        </div>';
                    }

                            
                    if( $i == $fcat_post_count ) {
                        $out .='</div><!-- /slides -->';
                    }

                    $i++;

                } else {

                    if( $i == 1 ) {
                    $out .='
                        <div class="grid_6 alpha">
                            <div class="mb hover-shadow"><a href="'. get_permalink() .'"><img src="'.$thumb_large[0].'" alt="' . the_title_attribute('echo=0') . '"></a></div>
                            <div class="post_m_content">
                                <h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>
                                <div class="meta mb"> '. ht_time_ago() .' / <a href="'. get_comments_link() .'">'. get_comments_number() . __(" comments"," highthemes") .'</a> </div>
                                <p>'. ht_excerpt(200, '...') .'</p>
                            </div><!-- post content -->
                        </div><!-- /grid6 omega -->';
                        $i++;
                        continue;
                    }

                    if( $i == 2 ) {
                    $out .='    
                        <div class="grid_6 omega">
                            <div class="small_slider_music owl-carousel owl-theme">';
                    }

                    
                    if( $j == 0 || $j%4 == 0 ) {
                    $out .='                            
                        <div class="item clearfix">
                            <ul class="small_posts">';
                    }

                    $out .=' 
                            <li class="clearfix">
                                <a class="s_thumb hover-shadow" href="'. get_permalink() .'"><img width="70" height="70" src="'.$thumb_small[0].'" alt="' . the_title_attribute('echo=0') . '"></a></a>
                                <h3><a href="'. get_permalink() .'">'.get_the_title().'</a></h3>
                                <div class="meta mb"> '. ht_time_ago() .' / <a href="'. get_comments_link() .'">'. get_comments_number() .' '.__('comments','highthemes').'</a> </div>
                            </li>';

                    $j++;

                    if( $i == $fcat_post_count || $j%4 == 0 ) {
                    $out .='                
                                    </ul>
                                </div>';
                    }

                            
                    if( $i == $fcat_post_count ) {
                        $out .='
                            </div><!-- /slides -->
                        </div><!-- grid6 omega -->';
                    }

                    $i++;


                }

                endwhile;
                $out .='</div><!-- posts block -->';
                wp_reset_postdata();
        else:
            $out = __('No Posts Found', 'highthemes');
        endif;                            
               

        return $out;
    }
}
add_shortcode( 'ht_featured_category', 'ht_featured_category' );

/**
 * Display A Featured Category With Carousel
 *
 */
if( ! function_exists( 'ht_featured_cat_carousel' ) ) {
    function ht_featured_cat_carousel( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'cat_id'       =>  '',
            'post_number'  =>  9,
            'cols'         => '3c',
            'show_details' => 'no',
            'cat_link'     => '',

        ), $atts));        

        $out = '';


        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $post_number,
            'cat'            => $cat_id,
        );
    
        $fcat_query      = new WP_Query($args);
        $fcat_post_count = $fcat_query->post_count;
        $rss_url         = site_url() . '/?cat=' .$cat_id . '&feed=rss2';

        if ($fcat_query->have_posts()) :

                $out .='
                <div class="posts_block mbf clearfix">
                    <div class="title '. ht_category_color( $cat_id ) .'">';

                if( empty( $cat_link ) ) {
                    $out .='<h4>'.  get_cat_name( $cat_id ) .'</h4>';
                } else {
                    $out .='<a href="'.get_category_link( $cat_id ).'" title="'. get_cat_name( $cat_id ) .'"><h4>'.  get_cat_name( $cat_id ) .'</h4></a>';
                }

                $out .='<a href="'. $rss_url .'" class="feed toptip" title="'.__('RSS Feed', 'highthemes').'"><i class="icon-feed"></i></a>
                    </div><!-- /title bar -->';

                $out .='<div class="carousel_'.$cols.'_sc">';

                while( $fcat_query->have_posts() ) : $fcat_query->the_post();

                $thumb_large =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'slideshow_thumb_full_large');
                           
                $out .='
                <div>
                <div class="item hover-shadow">
                <a href="'. get_permalink() .'"><img src="'.$thumb_large[0].'" alt="' . the_title_attribute('echo=0') . '"></a>
                </div>';

                if( 'yes' == $show_details ){
                $out .='<div class="post_m_content">
                    <h3> <a href="'.get_permalink().'">'.get_the_title().'</a> </h3>
                    <div class="meta mb"> ' . ht_time_ago().'    /   <a href="'. get_comments_link() .'">'. get_comments_number() .' '.__('comments','highthemes').'</a> </div>
                    <p> '.ht_excerpt(50, '...').'</p>
                </div><!-- post content -->';

                }
                $out .='</div>';

                endwhile;
                $out .='</div></div>';
                wp_reset_postdata();
        else:
            $out = __('no item found', 'highthemes');
        endif;                            
               

        return $out;
    }
}
add_shortcode( 'ht_featured_cat_carousel', 'ht_featured_cat_carousel' );

/**
 * Display A Post As Post Of The Day
 *
 */
if( ! function_exists( 'ht_post_of_day' ) ) {
    function ht_post_of_day( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'title'    => __('Post Of Day', 'highthemes'),
            'vertical' => "no",
            'el_class'   =>  '',
        ), $atts));        
        
        $layout_mode     =   ht_get_sidebar_mode();
        $out = '';

        $args = array(
                'post_type'      => 'post',
                'posts_per_page' => '1',
                'meta_query' => array(
                    array(
                        'key'     => '_ht_post_day',
                        'value'   => 'on',
                        'compare' => '=',
                    ),
                ),        
        );

        $pod_query = new WP_Query($args);
        if ($pod_query->have_posts()) :

                while( $pod_query->have_posts() ) : $pod_query->the_post();
                
                $category = get_the_category();

                if( $vertical == 'no' ) {
                    $thumb_1         =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb_pof_1');
                    $thumb_2         =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb_pof_1');  
                    $thumb_large     =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'slideshow_thumb_full_large');
                } else {
                    $thumb_1         =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_post_thumbnail_1');
                    $thumb_2         =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'slideshow_thumb_full_large');  
                    $thumb_large     =   wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                }

                if( $layout_mode == 'large' ) {
                    $thumb = $thumb_large;
                } elseif( $layout_mode == '2' ) {
                    $thumb = $thumb_2;
                } else {
                    $thumb = $thumb_1;
                }

                if( $category[0] ){
                    $cat_name = $category[0]->cat_name;
                    $cat_id   = $category[0]->term_id;
                }  
                if ( 'yes' == $vertical ){
                    $out .= '
                    <div class="post_day_vertical '. $el_class .'">
                    <div class="title colordefault">
                        <h4>'.$title.'</h4>
                    </div>
                    <div class="mb hover-shadow"><a href="'.get_permalink().'"><img src="'.$thumb[0].'" alt="' . the_title_attribute('echo=0') . '"></a></div>
                    <div class="post_m_content">
                        <h3> <a href="'.get_permalink().'">'.get_the_title().'</a> </h3>
                        <div class="meta mb"> '.ht_time_ago().'    /    <a href="'. get_comments_link() .'">'. get_comments_number() . __(" comments"," highthemes") .' </a> </div>
                         <p>'. ht_excerpt(200, '...') .'</p>
                    </div><!-- post content --></div>';

                } else {

                    $out .=' 
                    <div class="post_day mbf clearfix '. $el_class .'">
                        <div class="title colordefault"><h4>'. $title .'</h4></div>
                        <div class="grid_6 alpha relative">
                            <a class="cat '. ht_category_color( $cat_id ) .'" href="'. esc_url( get_category_link( $category[0]->term_id )) .'" title="View all posts under '. $cat_name .'">'. $cat_name .'</a>
                            <a class="hover-shadow" href="'.get_permalink().'"><img src="'.$thumb[0].'" alt="' . the_title_attribute('echo=0') . '"></a>
                        </div><!-- /grid6 alpha -->
                        <div class="grid_6 omega">
                            <div class="post_day_content">
                                <h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>
                                <div class="meta mb"> '. ht_time_ago() .' / <a href="'. get_comments_link() .'">'. get_comments_number() . __(" comments"," highthemes") .'</a> </div>
                                <p>'. ht_excerpt(200, '...') .'</p>
                            </div><!-- /post content -->
                        </div><!-- /grid6 omega -->
                     </div><!-- /post day -->';
                }

                endwhile;
                wp_reset_postdata();
        else:
            $out = __('There is no post yet.', 'highthemes');
        endif;                            
               

        return $out;
    }
}
add_shortcode( 'ht_post_of_day', 'ht_post_of_day' );

/**
 * Fancy Title
 *
 */
if( ! function_exists( 'ht_fancy_title' ) ) {
    function ht_fancy_title( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'title'  => '', 
            'color'  => 'color9',
        ), $atts));

        return '<div class="title '. $color .'"><h4>'. $title .'</h4></div>';
    }
}
add_shortcode( 'ht_fancy_title', 'ht_fancy_title' );

/**
 * Notification
 *
 */
if( ! function_exists( 'ht_notification' ) ) {
    function ht_notification( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'title'    => '', 
            'type'   => 'success', //success, info, error, warning
        ), $atts));

        switch ( $type ) {
            case 'success':
                $icon = 'fa fa-check';
                break;

            case 'info':
                $icon = 'fa fa-flag';
                break;

            case 'error':
                $icon = 'fa fa-power-off';
                break;

            case 'waring':
                $icon = 'fa fa-exclamation-triangle';
                break;                                                
            
            default:
                $icon = 'fa fa-check';
                break;
        }

        return '<div class="notification-box notification-box-'. $type .'">
                    <p><i class="'. $icon .'"></i>'. $title .'</p>
                    <a class="notification-close notification-close-'. $type .'" href="#"><i class="fa fa-times"></i></a>
                </div>';
    }
}
add_shortcode( 'ht_notification', 'ht_notification' );

/**
 * BlockQuotes
 *
 */
if( ! function_exists( 'ht_quote' ) ) {
    function ht_quote( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'align'    => 'default', // left, right, default 
        ), $atts));

        if( 'default' == $align ) {
            return '<div class="blockquote">'. $content .'</div>';

        } else {
            return '<div class="blockquote '. $align .'">'. $content .'</div>';            
        }
    }
}
add_shortcode( 'ht_quote', 'ht_quote' );

/**
 * Button
 *
 */
if( ! function_exists( 'ht_button' ) ) {
    function ht_button( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'title'    => '', 
            'target'   => '', 
            'link'     => '#', 
            'size'     => 'small', // small, medium, large
            'color'    => 'default', 
            'rel'      =>''
        ), $atts));

        return '<a rel="'.$rel.'" class="tbutton '. $color .' '. $size .'" href="'. $link .'" target="'. $target .'"> <span>'. $title .'</span> </a>';            
    }
}
add_shortcode( 'ht_button', 'ht_button' );

/**
 * Social Icon
 *
 */
if( ! function_exists( 'ht_social' ) ) {
    function ht_social( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'title'    => '', 
            'target'   => '', 
            'url'      => '#', 
            'icon'     => '',
        ), $atts));

        return '<a class="shortcode-social toptip" href="'. $url .'" target="'. $target .'" original-title="'. $title .'"><i class="fa '. $icon .'"></i></a>';            
    }
}
add_shortcode( 'ht_social', 'ht_social' );

/**
* Highlights
*/
if ( !function_exists( 'ht_highlight_shortcode' ) ) {
    function ht_highlight_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'color'         => 'yellow',
            'class'         => '',
        ),
        $atts ) );
        return '<span class="ht-highlight ht-highlight-'. $color .' '. $class .'">' . do_shortcode( $content ) . '</span>';
    
    }
}
add_shortcode('ht_highlight', 'ht_highlight_shortcode');

/**
 * Gap
 */
if( ! function_exists( 'ht_gap' ) ) {
	function ht_gap( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'height'  => '35'
		), $atts));

		return '<div class="gap" style="height:'.$height.'px; line-height:'.$height.'px"></div>';
	}
}
add_shortcode( 'ht_gap', 'ht_gap' );

/**
 * Grid Columns. It follows bootstrap grid naming meaning.
 *
 */
if( ! function_exists( 'ht_col' ) ) {
	function ht_col( $atts, $content = null ) {
		extract( shortcode_atts( array( 'grid' => '' , 'position' => ''), $atts ) );
		$classes = '';
		unset($atts['grid']);
        unset($atts['position']);
		$classes = implode(" ", $atts);

		switch ( $grid ) {
			case '1-1':
				$grid = 'full';
				break;
			case '1-2':
				$grid = 6;
				break;
			case '1-3':
				$grid = 4;
				break;
			case '1-4':
				$grid = 3;
				break;
			case '2-3':
				$grid = 8;
				break;
			case '3-4':
				$grid = 9;
				break;
            case '1-12':
                $grid = 1;
                break;
            case '2-12':
                $grid = 2;
                break;
            case '5-12':
                $grid = 5;
                break;
            case '7-12':
                $grid = 7;
                break;
            case '10-12':
                $grid = 10;
                break;
            case '11-12':
                $grid = 11;
                break;                                                                                                	
																										
			default:
				$grid = 'full';
				break;
		}
		if( $grid == 'full' ) {
            return "<div class='shortcode grid_$grid $classes' >" . do_shortcode( $content ) . '</div>';
        } else {
            return "<div class='shortcode grid_$grid $position $classes' >" . do_shortcode( $content ) . '</div>';
        }
	}
}
add_shortcode( 'ht_col', 'ht_col' );

/**
 * Grid columns used for nested columns
 *
 */
if( ! function_exists( 'ht_sub_col' ) ) {
	function ht_sub_col( $atts, $content = null ) {
		extract( shortcode_atts( array( 'grid' => '' ), $atts ) );
		$classes = '';
		unset($atts['grid']);
		$classes = implode(" ", $atts);
        
        switch ( $grid ) {
            case '1-1':
                $grid = 'full';
                break;
            case '1-2':
                $grid = 6;
                break;
            case '1-3':
                $grid = 4;
                break;
            case '1-4':
                $grid = 3;
                break;
            case '2-3':
                $grid = 8;
                break;
            case '3-4':
                $grid = 9;
                break;
            case '1-12':
                $grid = 1;
                break;
            case '2-12':
                $grid = 2;
                break;
            case '5-12':
                $grid = 5;
                break;
            case '7-12':
                $grid = 7;
                break;
            case '10-12':
                $grid = 10;
                break;
            case '11-12':
                $grid = 11;
                break;                                                                                                  
                                                                                                        
            default:
                $grid = 'full';
                break;
        }
        if( $grid == 'full' ) {
            return "<div class='shortcode grid_$grid $classes' >" . do_shortcode( $content ) . '</div>';
        } else {
            return "<div class='shortcode grid_$grid $position $classes' >" . do_shortcode( $content ) . '</div>';
        }
    }
}
add_shortcode( 'ht_sub_col', 'ht_sub_col' );


/*
 * Divider
 */
if( !function_exists('ht_divider_shortcode') ) {
    function ht_divider_shortcode( $atts ) {
        extract( shortcode_atts( array(
            'margin_top'        => '20px',
            'margin_bottom'     => '20px',
            'class'             => '',
        ),
        $atts ) );
        $style_attr = '';
        if ( $margin_top && $margin_bottom ) {  
            $style_attr = 'style="margin-top: '. intval($margin_top) .'px;margin-bottom: '. intval($margin_bottom) .'px;"';
        } elseif( $margin_bottom ) {
            $style_attr = 'style="margin-bottom: '. intval($margin_bottom) .'px;"';
        } elseif ( $margin_top ) {
            $style_attr = 'style="margin-top: '. intval($margin_top) .'px;"';
        } else {
            $style_attr = NULL;
        }
     return '<hr class="ht-divider '. $class .'" '.$style_attr.' />';
    }
}
add_shortcode( 'ht_divider', 'ht_divider_shortcode' );



/*
 * Heading
 */
if( !function_exists('ht_heading_shortcode') ) {
    function ht_heading_shortcode( $atts ) {
        extract( shortcode_atts( array(
            'title'         => __('Sample Heading', 'highthemes'),
            'type'          => 'h2',
            'style'         => 'double-line',
            'margin_top'    => '',
            'margin_bottom' => '',
            'text_align'    => '',
            'font_size'     => '',
            'color'         => '',
            'class'         => '',
        ),
        $atts ) );


        $style_attr = '';
        if ( $font_size ) {
            $style_attr .= 'font-size: '. $font_size .';';
        }
        if ( $color ) {
            $style_attr .= 'color: '. $color .';';
        }
        if( $margin_bottom ) {
            $style_attr .= 'margin-bottom: '. intval($margin_bottom) .'px;';
        }
        if ( $margin_top ) {
            $style_attr .= 'margin-top: '. intval($margin_top) .'px;';
        }
        
        if ( $text_align ) {
            $text_align = 'text-align-'. $text_align;
        } else {
            $text_align = 'text-align-left';
        }
        
        $output = '<'.$type.' class="ht-heading ht-heading-'. $style .' '. $text_align .' '. $class .'" style="'.$style_attr.'">'.$title.'</'.$type.'>';
       
        
        return $output;
    }
}
add_shortcode( 'ht_heading', 'ht_heading_shortcode' );



/*
 * Google Maps
 */
if (! function_exists( 'ht_shortcode_googlemaps' ) ) {
    function ht_shortcode_googlemaps($atts, $content = null) {
        
        extract(shortcode_atts(array(
                'title'         => '',
                'location'      => '',
                'width'         => '',
                'height'        => '300',
                'zoom'          => 8,
                'align'         => '',
                'class'         => '',
        ), $atts));
        
        // load scripts
        wp_enqueue_script('ht_googlemap');
        wp_enqueue_script('ht_googlemap_api');
        
        
        $output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap '. $class .' " style="height:'.$height.'px;width:100%">';
            $output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.esc_attr($title).'" />' : '';
            $output .= '<input class="location" type="hidden" value="'.esc_attr($location).'" />';
            $output .= '<input class="zoom" type="hidden" value="'.esc_attr($zoom).'" />';
            $output .= '<div class="map_canvas"></div>';
        $output .= '</div>';
        
        return $output;
    }
}
add_shortcode("ht_googlemap", "ht_shortcode_googlemaps");
