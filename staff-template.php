<?php

/*
  Template Name: Staff Page
  Template Post Type: page, post
*/

 ?>


<?php get_header(); ?>

  <div class="container">

    <div class="row">
      <div class="col">
        <h1>Here are all of our staff</h1>
      </div>
    </div>

    <div class="row">
      <?php
        // $allStaffMembers = new WP_Query('post_type=staff&order=ASC&orderby=title');
        $args = array(
          'post_type' => 'staff',
          'order' => 'ASC',
          'orderby' => 'title'
        );
        $allStaffMembers = new WP_Query($args);

       ?>

       <?php if($allStaffMembers->have_posts()): ?>
         <?php while ($allStaffMembers->have_posts()): $allStaffMembers->the_post();?>
           <div class="card">
             <?php if(has_post_thumbnail() ): ?>
                 <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top', 'alt'=>'thumbnail image']); ?>
               <div class="card-body">
             <?php else: ?>
               <div class="card-body">
             <?php endif; ?>
               <h5 class="card-title"><?php the_title(); ?></h5>
             </div>
           </div>
         <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
