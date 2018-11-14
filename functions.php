<?php

function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css', array(), '5.4.2', 'all');
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

// Initialise menus

// Version 1 – from wordpress codex
// function register_my_menu() {
//   register_nav_menu('header-menu',__( 'Header Menu' ));
// }
// add_action( 'init', 'register_my_menu' );

// Version 2
function addCustomMenus(){
  add_theme_support('menus');
  register_nav_menu('header_nav', 'Navigation bar');
  register_nav_menu('footer_nav', 'Footer navigation');
}

add_action('init', 'addCustomMenus');

// add_theme_support('post-formats', array('aside'))

function add_staff_post_type(){

  $labels = array(
    'name' => _x('Staff', 'post type name', 'izsitheme'),
    'singular_name' => _x('Staff', 'post type singular name', 'izsitheme'),
    'add_new_item' => _x('Add new staff member', 'adding new staff member', 'izsitheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for the staff members in the company',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'supports' => array(
      'title',
      'thumbnail'
    ),
    'query_var' => true
  );
  register_post_type('staff', $args);
}

add_action('init', 'add_staff_post_type');

add_theme_support( 'custom_logo', array(
  'height'=> 1,
  'width'=> 1
));

function register_my_sidebars(){
  // register_sidebars for multiple
  register_sidebar(array(
    'id' => 'frontPageSidebar',
    'name'=>'Front Page Sidebar',
    'description'=> 'The sidebar which appears on the right of the front page.',
    'before_widget' => '<div id="%1$s" class="widget custom-widget %2$s">',
    'after_widget' => '</div><hr>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
}

add_action('widgets_init','register_my_sidebars');

register_default_headers(array(
  'banner' => array(
    'url'=> get_template_directory_uri().'/assets/images/default_banner.jpg',
    'thumbnail_url' => get_template_directory_uri().'/assets/images/default_banner.jpg',
    'description' => 'Defualt banner image'
  )
));

$defaults = array(
	'default-image'          => get_template_directory_uri().'/assets/images/default_banner.jpg',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

require get_parent_theme_file_path('custom_customizer.php');

require get_parent_theme_file_path('custom_fields.php');

function add_admin_custom_styles(){
  wp_enqueue_style('admincss', get_template_directory_uri().'/assets/admin.css', array(), '0.0.1', 'all');
}
add_action('admin_enqueue_scripts', 'add_admin_custom_styles');




/* END */
