  <?php if (is_single()) {
    $single = 'position-relative single_rsidebar';
  }else{
    $single = '';
  }?>
  <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 order-1 order-md-0 order-sm-0 <?php echo $single; ?>">
    <div class="rightSidebar">
      <?php if (is_front_page()) : ?>
        <nav class="category d-none d-md-block">
          <?php wp_nav_menu(array('theme_location' => 'category-menu', 'container' => '', 'menu_class' => 'menunav', 'walker' => new WalkerNav)); ?>
        </nav>
      <?php endif; ?>
      <?php if (is_home() || is_front_page() || is_page(array('home', 'صفحه اصلی')) ||  is_archive() || is_category() || is_search()) : ?>
        <div
          class="single_category mobile_category 
          <?php if (is_home() || is_page(array('home', 'صفحه اصلی'))) {
            echo 'd-md-none sm-order-1';} ?>">
          <?php wp_nav_menu(array('theme_location' => 'singleCat-menu', 'container' => '', 'menu_class' => 'menunav')); ?>
        </div>
      <?php endif; ?>

      <?php
      if (is_front_page()) {
        $is_home = ' home';
      }else{
        $is_home = '';
      } ?>
      <form class="search-form<?= $is_home; ?>" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
          <input type="text" name="s" class="" placeholder="<?php esc_attr_e('جستجو', 'shop'); ?>" />
          <button role="button" aria-label="search" type="submit" class="" name="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>

    </div>
    <?php dynamic_sidebar('right_sidebar'); ?>
  </div>