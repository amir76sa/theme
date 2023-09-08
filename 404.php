<?php
get_header(); ?>
<div class="container">
  <div class="not_found m-5 pb-5">
    <h1>404</h1>
    <div>به نظر میرسد شما راه خودتون رو گم کردید!</div>
    <div class="seprator">صفحات مفید</div>
    <?php wp_nav_menu(array('theme_location' => '404-menu', 'container' => '', 'menu_class' => 'menunav')); ?>
  </div>
</div>
<?php get_footer(); ?>