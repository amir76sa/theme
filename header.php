<?php $GLOBALS['config'] = get_option('my_framework'); ?>
<!DOCTYPE html>
<html dir='rtl' lang='fa'>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="<?= $GLOBALS['config']['description'] ?>">
  <script>
    var body = document.querySelector('html');
    if (localStorage.getItem("theme")) {
      var theme = localStorage.getItem("theme");
    }
    if (theme == "light") {
      body.classList.remove("dark");
    } else if (theme == "dark") {
      body.classList.add("dark");
    }
  </script>
  <?php if ($GLOBALS['config']['favicon']['url']) : ?>
    <link rel="shortcut icon" href="<?php echo $GLOBALS['config']['favicon']['url']; ?> " />
  <?php endif; ?>


  <?php wp_head(); ?>
  <?php if (is_single()) : ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "<?php echo get_field('enName') ?>",
        "operatingSystem": "ANDROID",
        "fileSize": "<?php echo get_field('app_size') ?>",
        "softwareVersion": "<?php echo get_field('version') ?>",
        "applicationCategory": "
        <?php
        foreach ((get_the_category()) as $category) {
          echo $category->cat_name . ',';
        }
        ?> ",
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "<?php echo get_field('post_score') ? get_field('gp_votes') : 5 ?>",
          "reviewCount": "<?php echo get_field('gp_votes') ? get_field('gp_votes') : 1 ?>"
        }
      }
    </script>
  <?php endif; ?>
</head>

<?php 
// load header based on user choice
if( theme_options('header_style') == 'modern'){
  get_template_part('inc/template_parts/header/modern');
}else{
  get_template_part('inc/template_parts/header/default');
}
?>


<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog <?php echo theme_options('active_login_right_side') ? 'modal-lg' : 'modal-md' ?>modal-dialog-centered">
    <div class="modal-content">
      <div class="dismiss" data-bs-dismiss="modal" aria-label="بستن">
        <i class="bi bi-x"></i>
      </div>
      <div class="modal-body p-0 d-flex">
        <?php if ($GLOBALS['config']['active_login_right_side']) : ?>
          <div class="rightSide">
            <div class="login_info">
              <?= $GLOBALS['config']['loginModal_info']; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="leftSide">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">ورود</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">عضویت</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php
              if (is_user_logged_in()) {
                echo 'شما وارد اکانت خود شده اید.';
              } else { ?>
                <div class="wg-ajax-login">
                  <div class="wg-ajax-login-inner">
                    <form method="POST">
                      <p class="wg-msg">
                      </p>
                      <p class="wg-user-field">
                        <label>نام کاربری یا ایمیل</label>
                        <input type="text" class="wg-username-email" name="wg-username-email">
                      </p>
                      <p class="wg-user-field">
                        <label>رمز عبور</label>
                        <input type="password" class="wg-password" name="wg-password">
                      </p>
                      <p class="wg-submit">
                        <button type="submit" class="wg-ajax-submit edd-submit" name="wg-ajax-submit">
                          ورود
                        </button>
                        <?php wp_nonce_field('wg_ajax_nonce_check', 'wg_ajax_nonce'); ?>
                      </p>
                    </form>
                  </div>
                </div>
              <?php } ?>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php
              if (is_user_logged_in()) {
                echo 'شما وارد اکانت خود شده اید.';
              } else { ?>
                <div class="wg-ajax-login">
                  <div class="wg-ajax-login-inner">
                    <form method="POST">
                      <p class="wgr-msg">
                      </p>
                      <p class="wg-user-field">
                        <label>نام کاربری</label>
                        <input type="text" class="wgr-username" name="wgr-username">
                      </p>
                      <p class="wg-user-field">
                        <label>ایمیل</label>
                        <input type="text" class="wgr-email" name="wgr-email">
                      </p>
                      <p class="wg-user-field">
                        <label>رمز عبور</label>
                        <input type="password" class="wgr-password" name="wgr-password">
                      </p>
                      <p class="wg-user-field">
                        <label>تکرار رمز عبور</label>
                        <input type="password" class="wgr-password-again" name="wgr-password-again">
                      </p>
                      <p class="wg-submit">
                        <button type="submit" class="wg-ajax-register-submit edd-submit" name="wgr-ajax-submit">
                          عضویت
                        </button>
                        <?php wp_nonce_field('wg_ajax_nonce_check2', 'wg_ajax_nonce2'); ?>
                      </p>
                    </form>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<div class="float_menu_holder"></div>
  <div class="float_menu">
    <div class="logo">
      <?php if ($GLOBALS['config']['logo_image']['url']) : ?>
        <img src="<?= $GLOBALS['config']['logo_image']['url']; ?>" alt="<?php bloginfo('url'); ?>">
      <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('url'); ?>">
      <?php endif; ?>
    </div>
    <ul>
      <?php
      $menuLocations = get_nav_menu_locations();
      $menuID = $menuLocations['main-menu'];
      $primaryNav = wp_get_nav_menu_items($menuID);
      foreach ($primaryNav as $item) :
        $icon = get_field('icon', $item);
      ?>
        <li>
          <a href="<?= $item->url; ?>">
            <i class="bi bi-<?= $icon; ?>"></i>
            <?= $item->title; ?>
          </a>
        </li>
      <?php endforeach; ?>
      <?php
      if ($GLOBALS['config']['show_profile'] == 'true') :
        if (!is_user_logged_in()) { ?>
          <li>
            <a href="#registerModal" data-bs-toggle="modal" data-bs-target="#registerModal">
              <i class="bi bi-person-circle"></i>
              ورود/عضویت
            </a>
          </li>
        <?php } else { ?>
          <li>
            <a href="<?php bloginfo('url') ?>/panel">
              <i class="bi bi-people"></i>
              پنل کاربری
            </a>
          </li>
      <?php }
      endif; ?>
      <?php if ($GLOBALS['config']['show_cart'] == 'true') : ?>
        <li>
          <a href="<?php bloginfo('url') ?>/cart">
            <i class="bi bi-basket"></i>
            سبد خرید
          </a>
        </li>
      <?php endif; ?>
    </ul>
    <div class="float_menu_bottom">
      <div class="darkMode show_dark">
        <i class="bi bi-sun dark_toggle"></i>
      </div>
      <div class="float_menu_search search_triger show_search">
        <i class="bi bi-search"></i>
      </div>
    </div>
  </div>

<body>
