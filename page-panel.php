<?php  /* Template Name: User Panel */
get_header();


$is_loggedin = is_user_logged_in();
$current_user = wp_get_current_user();
//var_dump($current_user);
if (!$is_loggedin) {
  //  auth_redirect();
  header('Location: ' . site_url() . '/');
}
if (empty($_GET['action'])) {
  header('Location: ' . site_url() . '/panel/?action=dashboard');
}
$action = $_GET['action'];

?>
<div class="container mt-5">
  <div class="row panel justify-content-center">
    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3">
      <aside class="panel__menu">
        <ul>
          <li class="avatar"><a href="<?php bloginfo('url') ?>/panel?action=dashboard">
              <?php echo get_avatar($current_user->ID); ?>
              <h3><?php echo $current_user->display_name ?></h3>
            </a></li>
          <li class="<?php echo ($action === 'bookmark') ? 'active' : ''; ?>">
            <a href="<?php bloginfo('url') ?>/panel?action=bookmark">لیست علاقه مندی</a>
          </li>
          <?php if( function_exists('EDD') ):  ?>
          <li class="<?php echo ($action === 'orders') ? 'active' : ''; ?>">
            <a href="<?php bloginfo('url') ?>/panel?action=orders">لیست سفارشات</a>
          </li>
          <?php endif; ?>
          <?php if( function_exists('EDD') ):  ?>
          <li class="<?php echo ($action === 'downloads') ? 'active' : ''; ?>">
            <a href="<?php bloginfo('url') ?>/panel?action=downloads">لیست دانلود ها</a>
          </li>
          <?php endif; ?>
          <?php if( class_exists('EDD_Wallet') ):  ?>
          <li class="<?php echo ($action === 'wallet') ? 'active' : ''; ?>">
            <a href="<?php bloginfo('url') ?>/panel?action=wallet">
              شارژ کیف پول
              <?= do_shortcode('[edd_wallet_value]'); ?>
            </a>
          </li>
          <?php endif; ?>
          <?php if( function_exists('EDD') ):  ?>
          <li class="<?php echo ($action === 'edit') ? 'active' : ''; ?>">
            <a href="<?php bloginfo('url') ?>/panel?action=edit">ویرایش اطلاعات</a>
          </li>
          <?php endif; ?>
          <li>
            <a href="<?= wp_logout_url(site_url()) ?>">خروج</a>
          </li>
        </ul>
      </aside>
    </div>
    <?php
    switch ($action) {
      case "dashboard":
        include('inc/dashboard.php');
        break;
      case "orders":
        include('inc/orders.php');
        break;
      case "downloads":
        include('inc/downloads.php');
        break;
      case "wallet":
        include('inc/wallet.php');
        break;
      case "edit":
        include('inc/edit.php');
        break;
      case "bookmark":
        include('inc/bookmark.php');
        break;
      default:
        // value is not on the list. React accordingly.
        //include('inc/dashboard.php');
    }
    ?>
  </div>
</div>
<?php get_footer(); ?>