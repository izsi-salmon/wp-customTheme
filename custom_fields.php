<?php

$metaboxes = array(
  'staff' => array(
    'title' => 'Staff Info',
    'applicableto' => 'staff',
    'location' => 'normal',
    'priority' => 'high',
    'fields' => array(
      'staffRole' => array(
        'title' => 'Staff Member\'s role',
        'type' => 'text'
      ),
      'yearStarted' => array(
        'title' => 'Year Staff Member Started',
        'type' => 'number',

      )
    )
  )
  // you can include multiple arrays here
);


function add_custom_fields(){
  global $metaboxes;

  if(!empty($metaboxes)){
    foreach($metaboxes as $id => $metabox){
      // add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )
      add_meta_box($id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id);
    }
  }
}

add_action('admin_init', 'add_custom_fields'); // Adding to admin side

function show_metaboxes($post, $args){
    global $metaboxes;
    // var_dump($args);
    $fields = $metaboxes[$args['id']]['fields'];

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'"';

    if(!empty($fields)){
      foreach ($fields as $id => $field) {
        switch($field['type']){
          case 'text':
            $output .= '<lable for="'.$id.'">'.$field['title'].': </lable>';
            $output .= '<input type="text" name="'.$id.'">';
          break;
          case 'number':
            $output .= '<lable for="'.$id.'">'.$field['title'].': </lable>';
            $output .= '<input type="number" name="'.$id.'">';
          break;
          default:
            $output .= '<lable for="'.$id.'">'.$field['title'].': </lable>';
            $output .= '<input type="text"> name="'.$id.'"';
          break;
        }
      }
    }
    echo $output;
}

function save_metaboxes($postID){
  global $metaboxes;

  if(!wp_verify_nonce($_POST['post_format_meta_box_nonce'],basename(__FILE__))){
    return $postID;
  }
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return $postID;
  }

  if($_POST['post_type'] == 'page'){
    if(! current_user_can('edit_page', $postID)){
      return $postID;
    }
  } elseif(! current_user_can('edit_page', $postID)){
    return $postID;
  }

  $post_type = get_post_type();

  foreach($metaboxes as $id => $metabox){
    if($metabox['applicableto'] == $post_type){
      $fields = $metaboxes[$id]['fields'];

      foreach ($fields as $id => $field) {
        $oldValue = get_post_meta($postID, $id, true);
        $newValue = $_POST[$id];

        if($newValue && $newValue != $oldValue){
          update_post_meta($postID, $id, $newValue);
        }

      }
    }
  }

}

// Missing delete function

add_action('save_post', 'save_metaboxes');
