<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
    <title></title>
  </head>
  <body>
    <div class="container">
      <h1>Home Page</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec metus a orci scelerisque accumsan eget eu elit. In euismod ligula at lorem sagittis ultricies. Vestibulum dui libero, facilisis ut imperdiet at, tincidunt sit amet diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nulla massa, pretium nec dui ac, tristique iaculis lorem. Donec mollis erat sed lacinia placerat. Sed maximus velit ligula, id aliquet nunc euismod eu. Donec at dapibus magna, ut semper ex.</p><p>Quisque eget ornare nisi. In eget elit dictum, viverra leo at, laoreet massa. Mauris et augue dolor. Maecenas non odio mi. Morbi quam magna, aliquam quis urna id, consectetur maximus erat. Suspendisse non augue sed nisl accumsan cursus. Mauris placerat ex eu auctor auctor.</p>
        <?php if(have_posts()): ?>
          <div class="col">
          <?php while(have_posts()): the_post(); ?>
            <div class="row">
              <div class="card" style="width: 18rem;">
              <?php if(has_post_thumbnail() ): ?>
                  <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top', 'alt'=>'thumbnail image']); ?>
                <div class="card-body">
              <?php else: ?>
                <div class="card-body">
              <?php endif; ?>
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text"><?php the_content(); ?></p>
              <a href="#" class="btn btn-primary">View post</a>
            </div>
          </div>
            </div>



          <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>

    <?php wp_footer(); ?>
  </body>
  <!-- <a href="<?= esc_url(get_permalink()) ?>">Post</a> -->
</html>
