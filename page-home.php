<?php 
/* Template Name: Home Elementor editable*/
get_header(); ?>
<div class="container mt-5">
  <div class="row">
    <?php
    // Elementor `main-sidebar` location
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('sidebar_right')) {
      get_sidebar('right');
    }
    ?>
    <div class="col-xxl-8 col-xl-8 col-lg-9 col-md-9 order-0">

      <?php the_content(); ?>

    </div>
    <?php get_sidebar('left') ?>
  </div>
</div>
<?php get_footer(); ?>