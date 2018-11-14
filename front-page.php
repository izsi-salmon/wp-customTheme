<?php get_header('front'); ?>


    <div class="container">
      <?php
        if( function_exists('the_custom_logo')){
          the_custom_logo();
        }
       ?>

       <?php

          $custom_logo = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
          echo $logo_url;

        ?>

        <?php if($custom_logo): ?>
          <img src="<?php $logo_url; ?>" class"img-fluid" alt="logo">
        <?php endif; ?>

        <div class="row-mb-5 mb-5">
          <div class="card-deck">
            <?php for ($i=1; $i <= 2 ; $i++): ?>

              <?php $featuredPostID =  get_theme_mod('featured_post_'.$i.'_setting');?>
              <?php if($featuredPostID): ?>

                <?php

                    $args = array(
                      'p'= $featuredPostID
                    );
                    $featuredPost = new WP_Query($args);

                 ?>

                 <?php if($featuredPost->have_posts()): $featuredPost->the_post(); ?>
                   <div class="card col-6">
                     <h3><?php the_title(); ?></h3>
                   </div>
                 <?php endif ?>

              <?php endif; ?>


            <?php endfor; ?>
          </div>
        </div>

      <h1 class="h-heading">Welcome</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec metus a orci scelerisque accumsan eget eu elit. In euismod ligula at lorem sagittis ultricies. Vestibulum dui libero, facilisis ut imperdiet at, tincidunt sit amet diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nulla massa, pretium nec dui ac, tristique iaculis lorem. Donec mollis erat sed lacinia placerat. Sed maximus velit ligula, id aliquet nunc euismod eu. Donec at dapibus magna, ut semper ex.</p><p>Quisque eget ornare nisi. In eget elit dictum, viverra leo at, laoreet massa. Mauris et augue dolor. Maecenas non odio mi. Morbi quam magna, aliquam quis urna id, consectetur maximus erat. Suspendisse non augue sed nisl accumsan cursus. Mauris placerat ex eu auctor auctor.</p>
        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
          <div class="col">
            <div class="row">
              <div class="card" >
              <?php if(has_post_thumbnail() ): ?>
                  <?php the_post_thumbnail('full', ['class'=>'card-img', 'alt'=>'thumbnail image']); ?>
                <div class="card-body">
              <?php else: ?>
                <div class="card-body">
              <?php endif; ?>
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text"><?php the_content(); ?></p>
              <a href="<?= esc_url(get_permalink()) ?>" class="btn btn-primary">View post</a>
            </div>
          </div>
            </div>



          <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php if(is_active_sidebar('frontPageSidebar')): ?>
      <div class="col">
        <div id="frontSidebar">
          <?php dynamic_sidebar('frontPageSidebar'); ?>
        </div>
      </div>
    <?php endif; ?>

<?php get_footer(); ?>
