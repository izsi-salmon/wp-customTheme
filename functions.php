<?php

function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/main.css', array(), '0.0.1', 'all');
  // Scripts
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '4.1.3', true);
  wp_enqueue_script('customscripts', get_template_directory_uri().'/assets/custom-scripts.js', array(), '0.0.1', true);
}

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

// Enabling the ability to have featured images on pages/posts
add_theme_support('post-thumbnails');
add_image_size('icon', 50, 50, true);
