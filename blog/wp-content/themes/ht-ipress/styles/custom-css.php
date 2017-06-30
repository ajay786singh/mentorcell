<?php

function generate_custom_css(){
        $gen = '';
        $gen .= ht_custom_css();       
        $gen .= ht_accent_css();
        $gen .= ht_general_css();
        $gen .= ht_post_page_bg();
        if(!empty($gen)){
            $wrap_css ='';
            $wrap_css .="<!-- CUSTOM PAGE SECTIONS STYLE -->\n";
            $wrap_css .="<style type=\"text/css\">\n";
            $wrap_css .= $gen;
            $wrap_css .="\n\n</style>\n<!-- END CUSTOM PAGE SECTIONS STYLE -->\n\n";
           echo $wrap_css;
        }
}
add_action('wp_head','generate_custom_css',100);

function ht_custom_css() {

    if( ot_get_option('custom_css') != '' ) {
        return ot_get_option('custom_css');
    }            
}

function ht_post_page_bg() {
    $pp_body_bg = '';

    if( is_page() || is_single() ){
        $pp_body_bg = get_post_meta( get_the_ID(), '_ht_page_body_bg', true);
    }
    if( $pp_body_bg != '' ) {

        $css = '';
        if ( empty ( $pp_body_bg['background-color']      ) )  $pp_body_bg['background-color'] = 'transparent';
        if ( empty ( $pp_body_bg['background-image']      ) )  $pp_body_bg['background-image'] = 'none';
        if ( empty ( $pp_body_bg['background-repeat']     ) )  $pp_body_bg['background-repeat'] = 'repeat';
        if ( empty ( $pp_body_bg['background-attachment'] ) )  $pp_body_bg['background-attachment'] = 'scroll';
        if ( empty ( $pp_body_bg['background-position']   ) )  $pp_body_bg['background-position'] = '0% 0%';
        if ( empty ( $pp_body_bg['background-size']       ) )  $pp_body_bg['background-size'] = 'auto';
        $css .= 'body {'."\n";
        $css .= "\t".'background-color:'.$pp_body_bg['background-color'].';'."\n";        
        $css .= "\t".'background-image: url('.$pp_body_bg['background-image'].');'."\n";        
        $css .= "\t".'background-repeat: '.$pp_body_bg['background-repeat'].';'."\n";        
        $css .= "\t".'background-attachment: '.$pp_body_bg['background-attachment'].';'."\n";        
        $css .= "\t".'background-position: '.$pp_body_bg['background-position'].';'."\n";        
        $css .= "\t".'background-size: '.$pp_body_bg['background-size'].';'."\n";        
        $css .= '}' . "\n";

        if( ! empty ( $pp_body_bg['background-color'] ) || 
            ! empty ( $pp_body_bg['background-image'] ) || 
            ! empty ( $pp_body_bg['background-repeat'] ) || 
            ! empty ( $pp_body_bg['background-attachment'] ) || 
            ! empty ( $pp_body_bg['background-position'] ) || 
            ! empty ( $pp_body_bg['background-size'] ) ) {
            
            return $css;
        }    
    }
}
function ht_accent_css() {

    $css          = '';
    $accent_color = ot_get_option('accent_color');

    if( $accent_color != '' ) {

$css .= '
.colordefault,
.title.colordefault, 
.cat.colordefault, 
li.colordefault:hover > a, 
li.colordefault li:hover > a, 
li.current.colordefault,
#wp-calendar #today,
.wp-polls input.Buttons, 
.wp-polls-ans a,
.tagcloud a:hover,
#footer .tags a:hover,
.right_icons a:hover, 
.search_icon i:hover, 
.search_icon i.activeated_search,
.inner_f,
#layerBall:after,
.owl-theme .owl-controls.clickable .owl-buttons div:hover,
.small_posts .s_thumb span,
.navi span.current,
.navi a:hover,
.post-navi > b,
.post-navi a:hover,
.send-message,
.wpcf7-submit,
.wpcf7-submit:focus,
.wpcf7-submit:active,
#mobilepro:hover, 
#mobilepro.on {'."\n".
"\t".'background:'.$accent_color.';'."\n".
'}'."\n"; 

$css .= '
a:hover,
#footer a:hover,
#header .search button:hover, 
.search-box button:hover {'."\n".
"\t".'color:'.$accent_color.';'."\n".
'}'."\n"; 

$css .= '
::selection {'."\n".
"\t".'background:'.$accent_color.';'."\n".
'}'."\n"; 

$css .= '
::-moz-selection {'."\n".
"\t".'background:'.$accent_color.';'."\n".
'}'."\n"; 

$css .= '
.colordefault.title:after,
.s_form {'."\n".
"\t".'border-top-color:'.$accent_color.' !important;'."\n".
'}'."\n"; 

$css .= '
.wpcf7-form-control:focus,
#commentform textarea:focus,
#commentform input[type=text]:focus {'."\n".
"\t".'border-color:'.$accent_color.';'."\n".
'}'."\n"; 

$css .= '
.s_form:after {'."\n".
"\t".'border-bottom-color:'.$accent_color.' !important;'."\n".
'}'."\n"; 

$css .= '
#layerBall {'."\n".
"\t".'box-shadow: 0 0 1px '.$accent_color.' !important;'."\n".
'}'."\n"; 

$css .= '
#layerBall:before {'."\n".
"\t".'box-shadow: 0 0 4px '.$accent_color.' !important;'."\n".
'}'."\n"; 
    
    }

    return $css;
}

function ht_general_css () {   

    // Widget Title Color
    $css = '';
    $widgets_title_color = ot_get_option('widgets_title_color');
    if(  ! empty ( $widgets_title_color )  ) {
        $add_in = '';
        $add_in .= "\t".'background:'.$widgets_title_color.';'."\n"; 
        $css .= '.widget .title { '."\n".
            $add_in.
        '}'."\n"; 

        $add_in = '';
        $add_in .= "\t".'border-top-color:'.$widgets_title_color.';'."\n"; 
        $css .= '.widget .title:after { '."\n".
            $add_in.
        '}'."\n";                           
    }

    // Heading Typo
    $font_name_heading = ot_get_option('font_name_heading');
    $font_name_headlines = ot_get_option('font_name_headlines');
    $add_in = '';
    if( ! empty ( $font_name_headlines ) ) {
        $add_in .= "\t".'font-family:"'.$font_name_headlines.'",helvetica,arial,sans-serif;'."\n";         
    } elseif( ! empty ( $font_name_heading['font-family'] ) ) {
        $add_in .= "\t".'font-family:"'.$font_name_heading['font-family'].'",helvetica,arial,sans-serif;'."\n"; 
    } else {
        $add_in .= "\t".'font-family:"Roboto, Helvetica, Arial ,Tahome ,sans-serif;'."\n";
    }

    $css .= 'h1, h2, h3, h4, h5, h6 { '."\n".
        $add_in.
    '}'."\n";      

    // body Typo
    $font_body      = ot_get_option('font_body');
    $font_name_body = ot_get_option('font_name_body');
    $add_in    = '';
    if( ! empty ( $font_name_body ) ) {
        $add_in .= "\t".'font-family:"'.$font_name_body.'",Helvetica, Arial ,Tahome ,sans-serif;'."\n";        
    } elseif( ! empty ( $font_body['font-family'] ) ) {
        $add_in .= "\t".'font-family:"'.$font_body['font-family'].'",Helvetica, Arial ,Tahome ,sans-serif;'."\n";        
    } else {
        $add_in .= "\t".'font-family:"Roboto, Helvetica, Arial ,Tahome ,sans-serif;'."\n";
    }
    if(  ! empty ( $font_body['font-size'] )  ) {
        $add_in .= "\t".'font-size:'.$font_body['font-size'].';'."\n";          
    }
    if(  ! empty ( $font_body['font-weight'] )  ) {
        $add_in .= "\t".'font-weight:"'.$font_body['font-weight'].';'."\n";       
    }
    if(  ! empty ( $font_body['line-height'] )  ) {
        $add_in .= "\t".'line-height:"'.$font_body['line-height'].';'."\n";        
    }    

    $css .= 'body { '."\n". $add_in .'}'."\n";

    // Nav Typo
    $font_nav             = ot_get_option('font_nav');
    $font_name_navigation = ot_get_option('font_name_navigation');
    $add_in = '';
    if( ! empty ( $font_name_navigation ) ) {
        $add_in .= "\t".'font-family:"'.$font_name_navigation.'",Helvetica, Arial ,Tahome ,sans-serif;'."\n";    
    } elseif(  ! empty ( $font_nav['font-family'] )  ) {
        $add_in .= "\t".'font-family:"'.$font_nav['font-family'].'",helvetica,arial,sans-serif;'."\n";                   
    } else {
        $add_in .= "\t".'font-family:"Roboto, Helvetica, Arial ,Tahome ,sans-serif;'."\n";
    }
    if(  ! empty ( $font_nav['font-size'] )  ) {
        $add_in .= "\t".'font-size:'.$font_nav['font-size'].';'."\n";
    }
    if(  ! empty ( $font_nav['font-weight'] )  ) {
        $add_in .= "\t".'font-weight:"'.$font_nav['font-weight'].';'."\n";
    }
    $css .= '.sf-menu a { '."\n".
        $add_in.
    '}'."\n";        
    
    // body BG
    $body_bg = ot_get_option('body_bg');
    if( $body_bg != '' ) {
        $add_in  = ''; 
        if(  ! empty ( $body_bg['background-color'] )  ) {
            $add_in .= "\t".'background-color:'.$body_bg['background-color'].';'."\n";        
        }       
        if(  ! empty ( $body_bg['background-image'] )  ) {
            $add_in .= "\t".'background-image: url('.$body_bg['background-image'].');'."\n";        
        }    
        if(  ! empty ( $body_bg['background-repeat'] )  ) {
            $add_in .= "\t".'background-repeat: '.$body_bg['background-repeat'].';'."\n";        
        } 
        if(  ! empty ( $body_bg['background-attachment'] )  ) {
            $add_in .= "\t".'background-attachment: '.$body_bg['background-attachment'].';'."\n";        
        } 
        if(  ! empty ( $body_bg['background-position'] )  ) {
            $add_in .= "\t".'background-position: '.$body_bg['background-position'].';'."\n";        
        } 
        if(  ! empty ( $body_bg['background-size'] )  ) {
            $add_in .= "\t".'background-size: '.$body_bg['background-size'].';'."\n";        
        } 

        if( ! empty ( $body_bg['background-color'] ) || 
            ! empty ( $body_bg['background-image'] ) || 
            ! empty ( $body_bg['background-repeat'] ) || 
            ! empty ( $body_bg['background-attachment'] ) || 
            ! empty ( $body_bg['background-position'] ) || 
            ! empty ( $body_bg['background-size'] ) ) {
            
            $css .= 'body { '."\n". $add_in .'}'."\n";
        }
    }


    return $css;
}

?>