<?php 

$ht_page_metabox = array(
  'id'          => 'page-options',
  'title'       => __('Highthemes Page Options', 'highthemes'),
  'desc'        => '',
  'pages'       => array( 'page' ),
  'context'     => 'normal',
  'priority'    => 'high',
  'fields'      => array(
    array(
      'label'   => __('Page Title', 'highthemes'),
      'id'    => $prefix . 'page_title',
      'type'    => 'on-off',
      'std'   => 'off',
      'desc'    => __('If you like to display page title before content please set this On', 'highthemes')
    ),
    array(
      'label'   => __('Slideshow', 'highthemes'),
      'id'    => $prefix . 'slideshow_status',
      'type'    => 'on-off',
      'std'   => 'on',
      'desc'    => __('if you like to display the slideshow box on this page, set this option On', 'highthemes')
    ),
      array(
          'label'   => __('Slideshow Posts Number', 'highthemes'),
          'id'    => $prefix . 'slideshow_count',
          'type'    => 'text',
          'std'   => '6',
          'desc'    => __('You can limit the number of slider posts here. It should be 3 or 6 or 9, and so on ', 'highthemes')
      ),
      array(
      'label'   => __('Layout', 'highthemes'),
      'id'    => $prefix . 'layout',
      'type'    => 'radio-image',
      'desc'    => __('Overrides the default layout option', 'highthemes'),
      'std'   => 'inherit',
      'choices' => array(
        array(
          'value'   => 'inherit',
          'label'   => __('Default Layout - Set from Theme Options for all pages and posts', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/layout-off.png'
        ),
        array(
          'value'   => 'without-sidebar',
          'label'   => __('Without Sidebar - Fullwide', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-1c.png'
        ),
        array(
          'value'   => 'sidebar-right',
          'label'   => __('1 Sidebar Right', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-2cl.png'
        ),
        array(
          'value'   => 'sidebar-left',
          'label'   => __('1 Sidebar Left', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-2cr.png'
        ),
        array(
          'value'   => 'both-sidebar',
          'label'   => __('Both Sidebar', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cm.png'
        ),
        array(
          'value'   => 'both-sidebar-right',
          'label'   => __('Both Sidebar Right', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cl.png'
        ),
        array(
          'value'   => 'both-sidebar-left',
          'label'   => __('Both Sidebar Left', 'highthemes'),
          'src'   => HT_FRAMEWORK_URL . 'option-framework/assets/images/col-3cr.png'
        )
      )
    ),
    array(
      'label'   => __('Primary Sidebar', 'highthemes'),
      'id'    => $prefix . 'sidebar_primary',
      'type'    => 'sidebar-select',
      'desc'    => __('Overrides default', 'highthemes')
    ),
    array(
      'label' => __('Secondary Sidebar', 'highthemes'),
      'id'    => $prefix . 'sidebar_secondary',
      'type'  => 'sidebar-select',
      'desc'  => __('Overrides default', 'highthemes')
    ),
    array(
      'label' => __('Page Comments', 'highthemes'),
      'id'    => $prefix . 'page_comments',
      'type'  => 'on-off',
      'std'   => 'off',
      'desc'  => __('If you like to display page comments after content please set this On', 'highthemes')
    ),
    array(
      'id'      => $prefix . 'page_body_bg',
      'label'   => __('Page Body Background', 'highthemes'),
      'desc'   => __('Only on Boxed Layout', 'highthemes'),
      'type'    => 'background',
      'section' => 'styling'
    ),    

  )
);  
ot_register_meta_box( $ht_page_metabox );
?>