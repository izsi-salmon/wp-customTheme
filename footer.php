
<div class="footer">
  <div class="row footer-inner">
    <div class="col">
      <h5 class="contact-title">Contact us:</h5>
      <div class="contact-wrapper">
        <div class=""><a href="#" class="sm"><i class="fab fa-instagram"></i>instagram</a></div>
        <div class="sm"><a href="#" class="sm"><i class="fab fa-facebook"></i>facebook</a></div>
      </div>

    </div>
    <div class="col">
      <?php wp_nav_menu( array(
        'theme_location' => 'footer_nav',
        'container_class' => 'menu-footer-menu'
       ) ); ?>

    </div>
  </div>
</div>


<?php wp_footer(); ?>
</body>
</html>
