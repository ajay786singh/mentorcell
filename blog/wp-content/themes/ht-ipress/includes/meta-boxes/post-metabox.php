<?php 
  $ht_post_metabox = array(
    'id'          => 'ht_post_metabox',
    'title'       => __( 'Highthemes Post Options', 'highthemes' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'   => __('Slideshow', 'highthemes'),
        'id'    => $prefix . 'slideshow_status',
        'type'    => 'on-off',
        'std'   => 'off',
        'desc'    => __('if you like to display the slideshow box on this post, set this option On', 'highthemes')
      ),         
      array(
        'label'   => __('Mark as Featured Posts (Slideshow)', 'highthemes'),
        'id'    => $prefix . 'slideshow_item',
        'type'    => 'on-off',
        'std'   => 'off',
        'desc'    => __('If you want to include this post in slideshow of featured posts, set this option ON', 'highthemes')
      ),  
      array(
        'label'   => __('Mark as Post of Day', 'highthemes'),
        'id'    => $prefix . 'post_day',
        'type'    => 'on-off',
        'std'   => 'off',
        'desc'    => __('If you mark this post as post of day, you can use the correspondinig shortcode to display it on any page.', 'highthemes')
      ),             
      array(
        'label'   => __('Layout', 'highthemes'),
        'id'      => $prefix . 'layout',
        'type'    => 'radio-image',
        'desc'    => __('Overrides the default layout option', 'highthemes'),
        'std'     => 'inherit',
        'choices' => array(
          array(
            'value' => 'inherit',
            'label' => __('Default Layout - Set from Theme Options for all pages and posts', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/layout-off.png'
          ),
          array(
            'value' => 'without-sidebar',
            'label' => __('Without Sidebar - Fullwide', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-1c.png'
          ),
          array(
            'value' => 'sidebar-right',
            'label' => __('1 Sidebar Right', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-2cl.png'
          ),
          array(
            'value' => 'sidebar-left',
            'label' => __('1 Sidebar Left', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-2cr.png'
          ),
          array(
            'value' => 'both-sidebar',
            'label' => __('Both Sidebar', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cm.png'
          ),
          array(
            'value' => 'both-sidebar-right',
            'label' => __('Both Sidebar Right', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cl.png'
          ),
          array(
            'value' => 'both-sidebar-left',
            'label' => __('Both Sidebar Left', 'highthemes'),
            'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cr.png'
          )
        )
      ),
      array(
        'label' => __('Primary Sidebar', 'highthemes'),
        'id'    => $prefix . 'sidebar_primary',
        'type'  => 'sidebar-select',
        'desc'  => __('Overrides default', 'highthemes')
      ),
      array(
        'label' => __('Secondary Sidebar', 'highthemes'),
        'id'    => $prefix . 'sidebar_secondary',
        'type'  => 'sidebar-select',
        'desc'  => __('Overrides default', 'highthemes')
      ),
      array(
        'id'      => $prefix . 'page_body_bg',
        'label'   => __('Post Body Background', 'highthemes'),
        'type'    => 'background',
        'section' => 'styling',
        'desc'   => __('Only on Boxed Layout', 'highthemes'),

      ),         
    )
  );
ot_register_meta_box( $ht_post_metabox );
?>