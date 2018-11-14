<?php get_header(); ?>

    <div class="container">
      <h1>This is the custom theme :)</h1>

      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
          <div class="row">
            <?php if(has_post_thumbnail() ): ?>
              <div class="col-xs-12 col-md-4">
                <?php the_post_thumbnail('thumbnail', ['class'=>'img-fluid', 'alt'=>'thumbnail image']); ?>
              </div>
              <div class="col-xs-12 col-md-8">
            <?php else: ?>
              <div class="col-xs-12 col-md-8">
            <?php endif; ?>
            <h3><?php the_title(); ?></h3>
            <div><?php the_content(); ?></div>
          </div>

          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

<?php get_footer(); ?>
