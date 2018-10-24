<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php wp_head(); ?>
  </head>
  <body>
    <h1>This is the custom theme :)</h1>

    <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php wp_footer(); ?>
  </body>
</html>
