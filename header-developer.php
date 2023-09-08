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
</head>

<header class="dev_header">
  <div class="container  d-flex justify-content-between align-items-center">
    <a href="<?php bloginfo('url'); ?>">
      <div class="logo mt-3 white_filter">
        <?php if ($GLOBALS['config']['logo_image']['url']) : ?>
          <img src="<?= $GLOBALS['config']['logo_image']['url']; ?>" alt="<?php bloginfo('url'); ?>">
        <?php else : ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('url'); ?>">
        <?php endif; ?>
      </div>
    </a>
    <div class="dev_cta">
      <a href="<?php echo site_url(); ?>">بازگشت به سایت <i class="bi bi-arrow-left-circle"></i></a>
    </div>
  </div>
</header>
<body>