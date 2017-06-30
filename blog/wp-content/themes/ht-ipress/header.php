<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" >
  <meta name="format-detection" content="telephone=no">

  <!-- favicon -->
  <?php if( ot_get_option( 'favicon' ) != '' ) { echo ht_favicon(esc_url(ot_get_option('favicon')));} ?>
  <?php if( ot_get_option('apple_ipad_logo') != '' ): ?>
  <!-- For iPad -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url(ot_get_option('apple_ipad_logo')) ; ?>">
  <?php endif; ?>
  <?php if( ot_get_option('apple_logo') != '' ): ?>
  <!-- For iPhone -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url(ot_get_option('apple_logo')); ?>">
  <?php endif; ?>
  <?php if( ot_get_option('responsive_layout') == 'on' ) {?>
  <!-- responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
  <?php } ?>

  <!-- RSS feed -->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <?php if( ot_get_option('custom-codes-head') != '' ) echo ot_get_option('custom-codes-head'); ?>
  <?php wp_head(); ?>   
  </head>
  <body <?php body_class();?>>

  <div id="layout" class="<?php echo esc_attr(ot_get_option('full-boxed'));?>">
    <header id="header">
      <?php ht_masterslider_status('above_top_header'); ?>
      <?php if( ot_get_option('top_header_status') == 'on' ) { ?>
      <div class="a_head">
        <div class="row clearfix">

          <?php if( ot_get_option('second_menu_status') == 'on' ) { ?>
          <nav>
            <?php       
              wp_nav_menu(array(
                  'theme_location'  => 'second-nav',
                  'container'       => 'div',
                  'container_class' => 'second_menu lefter',
                  'menu_class'      => 'sf-menu',
              )); 
            ?>              
          </nav>   
          <?php } ?>          

          <?php
          // display head news on top bar
          if( ot_get_option('header_news_status') == 'on' ) {
            $args = array(
                'post_type' => 'post',
                'cat'       => ot_get_option('header_news_category'),
            );
            $head_news = new WP_Query( $args );

            if( ot_get_option('header_today_date_status') == 'on' ) { 
              if ( $head_news->have_posts() ) : ?>        
              <div class="breaking_news lefter">
                <div class="freq_out">
                  <div class="freq"><div class="inner_f"></div><div id="layerBall"></div></div>
                </div><!-- /freq -->
                <ul id="js-news" class="js-hidden">
                  <?php while ( $head_news->have_posts() ) : $head_news->the_post(); ?>
                  <li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>
                </ul><!-- /js news -->
              </div><!-- /breaking news -->
          <?php
              endif;
              wp_reset_postdata();
            }
          }
          ?>
          <div class="right_bar">
            <?php
            if( function_exists('icl_get_languages') ) {
                $langs = icl_get_languages('skip_missing=1');
                if($langs) {
                    $current_lang = '';
                    foreach ($langs as $key => $lang) {
                        if($lang['active']){
                            $current_lang = $lang;
                            unset($langs[$key]);
                        }
                    }
            ?>          
            <div class="lang">
              <?php 
              if ( $current_lang ) {
                echo '<a class="activated_lang" title="'.$current_lang['native_name'].'" href="'. $current_lang['url'] .'"><img src="'. $current_lang['country_flag_url'] .'" alt="'. strtoupper($current_lang['language_code']) .'"></a>';
              }
              ?>                                            
              <div class="more_lang">
                <?php
                    foreach ($langs as $key => $lang) {
                      echo '<a class="activated_lang" title="'.$lang['native_name'].'" href="'. $lang['url'] .'"><img src="'. $lang['country_flag_url'] .'" alt="'. strtoupper($lang['language_code']) .'"></a>';
                    }
                ?>              
              </div><!-- /more lang -->
            </div><!-- /lang -->
            <?php 
              } // if $langs
            } // end wpml ?>

            <div class="social social_head">
              <?php echo ht_social_icons_list();  ?>
            </div><!-- /social -->
            
            <?php if( ot_get_option('header_today_date') != '' ) { ?>
            <span id="date_time"><?php echo date_i18n(ot_get_option('header_today_date')); ?></span><!-- /date -->
            <?php } ?>
          </div><!-- /right bar -->
        </div><!-- /row -->
      </div><!-- /a head -->
      <?php } ?>
      <?php ht_masterslider_status('under_top_header'); ?> 
      <div class="b_head">
        <div class="row clearfix">
          <div class="logo <?php echo esc_attr(ot_get_option("logo_align")); ?>">
              <?php if( ot_get_option('dark') == 'on' ) { ?>
                <a title="<?php bloginfo("description");?>" href="<?php echo esc_url(home_url());?>">
                    <?php if (ot_get_option('dark_logo_url')) { ?>
                    <img src="<?php echo esc_url(ot_get_option('dark_logo_url'));?>" alt="<?php bloginfo('description'); ?>"/>
                    <?php } else { ?>
                    <img  src="<?php echo esc_url(get_template_directory_uri() . '/images/logo_dark.png') ?>" alt="Logo"/>
                    <?php }?>
                </a>
              <?php } else { ?>
                <a title="<?php bloginfo("description");?>" href="<?php echo esc_url(home_url());?>">
                      <?php if (ot_get_option('logo_url')) { ?>
                      <img src="<?php echo esc_url(ot_get_option('logo_url'));?>" alt="<?php bloginfo('description'); ?>"/>
                      <?php } else { ?>
                      <img  src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png') ?>" alt="Logo"/>
                      <?php }?>
                </a>
              <?php } ?>
          </div><!-- /logo -->
  
          <?php if ( ot_get_option('header_ads_box') != '' ) { ?>
            <div class="ads">
              <?php echo ot_get_option('header_ads_box'); ?>
            </div><!-- /ads -->
          <?php } ?>

        </div><!-- /row -->
      </div><!-- /b head -->
      <?php ht_masterslider_status('above_nav'); ?>
      <div class="row clearfix">
        <?php if( ot_get_option('sticky_status') == 'on' ) { ?>
        <div class="sticky_true">
        <?php } else { ?>
        <div class="sticky_false">
        <?php } ?>
          <div class="c_head clearfix">
            <nav>            
            <?php       
            if ( has_nav_menu( 'main-nav' ) ) {
              wp_nav_menu(array(
                'theme_location' => 'main-nav',
                'menu_class'     => 'sf-menu',
                'menu_id'        => 'main-menu',
                'container'      => false,
                'walker'         => new description_walker()
              )); 
            } else {
              echo '<div style="height:56px; float:left; line-height:56px; padding-left:30px;">Go to Appreance > Menus > Create New Menu as Main Navigation of iPress</div>';
            }
            ?>      
            </nav><!-- /nav -->
  
            <div class="right_icons">
              <?php 
              if( ot_get_option('random_status') == 'on' ) { 
                $random =  new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
                if ($random->have_posts()) :
                  while( $random->have_posts() ) : $random->the_post();
              ?>
              <a class="random_post bottomtip" href="<?php the_permalink(); ?>" title="<?php _e("Random Post", "highthemes");?>"><i class="icon-media-shuffle"></i></a><!-- /random post -->
              <?php 
                endwhile; 
              endif; 
              wp_reset_postdata();
              } 
              ?>
              <?php if( ot_get_option('search_status') == 'on' ) { ?>
              <div class="search">
                <div class="search_icon"><i class="fa fa-search"></i></div>
                <div class="s_form">
                  <form action="<?php echo esc_url(home_url());?>" id="search" method="get">
                    <input id="inputhead" name="s" type="text" placeholder="<?php _e("Search...", "highthemes");?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form><!-- /form -->
                </div><!-- /s form -->
              </div><!-- /search -->
              <?php } ?>
            </div><!-- /right icons -->
          </div><!-- /c head -->
        </div><!-- /sticky -->      
      </div><!-- /row -->
      <?php ht_masterslider_status('under_nav'); ?>    
    </header><!-- /header -->
