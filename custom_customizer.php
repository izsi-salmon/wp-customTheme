<?php

function custom_theme_customizer($wp_customize){

  $wp_customize->add_section('custom_theme_header_info', array(
    'title' => __('Header Styles','izsitheme'),
    'priority' => 20
  ));

  $wp_customize->add_setting('header_background_colour_setting',array(
    'default' => '#333333',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'header_background_colour_control',
      array(
        'label' => __('Header Background Colour', 'izsitheme'),
        'section' => 'custom_theme_header_info',
        'settings' => 'header_background_colour_setting'
      )
      )
  );

  $wp_customize->add_setting('header_link_colour_setting',array(
    'default' => '#FFFFFF',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'header_link_colour_control',
      array(
        'label' => __('Header Link Colour', 'izsitheme'),
        'section' => 'custom_theme_header_info',
        'settings' => 'header_link_colour_setting'
      )
      )
  );

  // Custom Featured page

  $wp_customize->add_panel('Featured_Posts_Panel', array(
    'title' => __('Featured Posts', 'izsitheme'),
    'priority' => 30,
    'description' => 'This panel with hold the featured posts sections'
  ));

  $args = array(
    'numberofposts' => -1

  );

  $allPosts = get_posts($args);

  $options = array();
  foreach ($allPosts as $singlePost) {
    $options[$singlePost->ID] = $singlePost->post_title;
  }

  // Create a for loop to dynamically repeat identical settings and controls
  for ($i=1; $i <= 2 ; $i++) {

    $wp_customize->add_section('featured_post_'.$i, array(
      'title' => __('Featured Post '.$i,'izsitheme'),
      'priority' => 20 + $i,
      'panel' => 'Featured_Posts_Panel'
    ));

    $wp_customize->add_setting('featured_post_'.$i.'_setting',array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'featured_post_'.$i.'_control',
        array(
          'label' => __('Featured Post', 'izsitheme'),
          'section' => 'featured_post_'.$i,
          'settings' => 'featured_post_'.$i.'_setting',
          'type' => 'select',
          'choices' => $options
        )
        )
    );

  }

}

add_action('customize_register', 'custom_theme_customizer');

function custom_theme_customizer_styles(){

  ?>

  <style type="text/css">
    .menu-main-menu{
      background-color: <?php echo get_theme_mod('header_background_colour_setting', '#333333'); ?>!important;
    }

    li.menu-item a, li.menu-item a:link, li.menu-item a:active, li.menu-item a:visited{
      color: <?php echo get_theme_mod('header_link_colour_setting', '#FFFFFF'); ?>!important;
    }

    li.menu-item a:hover{
      border-bottom: 2px solid <?php echo get_theme_mod('header_link_colour_setting', '#FFFFFF'); ?>!important;
    }
  </style>

  <?php




}
add_action('wp_head', 'custom_theme_customizer_styles');


















// end
