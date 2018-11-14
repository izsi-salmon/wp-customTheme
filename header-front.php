<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php wp_head(); ?>
  </head>
  <body>
<?php wp_nav_menu( array(
  'theme_location' => 'header_nav',
  'container_class' => 'menu-main-menu'
 ) ); ?>

 <?php

    if (get_header_image() == false){
      $image = get_template_directory_uri().'/assets/images/default_banner.jpg';
    } else{
      $image = get_header_image();
    }

  ?>

<div class="header-image" style="background-image:url(<?= get_header_image(); ?>);"></div>
