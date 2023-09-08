<?php get_header(); ?>
<div class="container mt-5">
  <div class="row">
    <!-- <?php
    // Elementor `main-sidebar` location
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('sidebar_right')) {
      get_sidebar('right');
    }
    ?> -->
    <div class="col-xxl-10 col-xl-10 col-lg-12 col-md-12 order-0">
      <header class="cat_header">
        <h3><?php the_title(); ?></h3>
      </header>

      <?php the_content(); ?>

    </div>
    <?php get_sidebar('left') ?>
  </div>
</div>
<?php get_footer(); ?>