<?php

/**
 * The Template for displaying EDD Products 
 */

get_header();
setPostViews(get_the_ID());
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 order-0 order-md-0 position-relative single_rsidebar">
      <div class="single_info">
        <figure class="thumbnail">
          <?php the_post_thumbnail('single'); ?>
          <?php the_post_thumbnail('single', array('class' => 'blur')); ?>
        </figure>
        <!-- <a href="#download_box" class="download_single">
          دانلود
          <i class="bi bi-download"></i>
        </a> -->
        <?php
        echo edd_get_purchase_link(array('download_id' => get_the_ID(), 'price' => false, 'text' => "خرید محصول", 'style' => 'plain'));
        ?>

        <div class="single_info__meta">
          <ul>
            <li>
              <i class="bi bi-cash-stack"></i>
              <div class="single_info__meta--text">
                <div>قیمت خرید</div>
                <?php edd_price(get_the_ID()); ?>
              </div>
            </li>
            <li>
              <i class="bi bi-alarm"></i>
              <div class="single_info__meta--text">
                <div>تاریخ انتشار</div>
                <?php the_time('D d M Y'); ?>
              </div>
            </li>
            <li>
              <i class="bi bi-pencil"></i>
              <div class="single_info__meta--text">
                <div>آخرین آپدیت</div>
                <?php echo get_the_modified_time('F jS, Y'); ?>
              </div>
            </li>
            <li>
              <i class="bi bi-bar-chart"></i>
              <div class="single_info__meta--text">
                <div>تعداد بازدید</div>
                <?= getPostViews(get_the_ID()); ?>
              </div>
            </li>
            <?php if (get_field('version')) : ?>
              <li>
                <i class="bi bi-gear"></i>
                <div class="single_info__meta--text">
                  <div>نسخه</div>
                  <?php the_field('version') ?>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('required_android')) : ?>
              <li>
                <i class="bi bi-phone"></i>
                <div class="single_info__meta--text">
                  <div>نسخه اندروید مورد نیاز</div>
                  <?php the_field('required_android') ?>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('age')) : ?>
              <li>
                <i class="bi bi-exclamation-triangle"></i>
                <div class="single_info__meta--text">
                  <div>رده سنی</div>
                  <?php the_field('age') ?>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('price')) : ?>
              <li>
                <i class="bi bi-piggy-bank"></i>
                <div class="single_info__meta--text">
                  <div>قیمت در مارکت</div>
                  <?php the_field('price') ?>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('require_interner')) : ?>
              <li>
                <i class="bi bi-wifi"></i>
                <div class="single_info__meta--text">
                  <div>نیازمند اینترنت</div>
                  <?php the_field('require_interner') ?>
                </div>
              </li>
            <?php endif; ?>
            <li>
              <i class="bi bi-chat-quote"></i>
              <div class="single_info__meta--text">
                <div>نظرات</div>
                <?php if (get_comments_number() == 0) {
                  echo 'بدون دیدگاه';
                } else {
                  echo get_comments_number() . ' دیدگاه';
                } ?>
              </div>
            </li>
            <li>
              <i class="bi bi-card-text"></i>
              <div class="single_info__meta--text">
                <div>دسته بندی</div>
                <?php
                $categories = wp_get_post_categories(get_the_ID());
                foreach ($categories as $category) { ?>
                  <a href="<?php echo get_category_link($category); ?>"><?php echo get_cat_name($category) ?> </a>
                <?php } ?>
              </div>
            </li>
          </ul>
        </div>
        <div class="single_category">
          <?php wp_nav_menu(array('theme_location' => 'singleCat-menu', 'container' => '', 'menu_class' => 'menunav')); ?>
        </div>
        <form class="search-form-single" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="input-group">
            <input type="text" name="s" class="" placeholder="<?php esc_attr_e('جستجو', 'shop'); ?>" />
            <button type="submit" class="" name="submit"><i class="bi bi-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-xxl-8 col-xl-8 gx-5 col-lg-9 col-md-9 order-0">
      <?php
      elementor_theme_do_location('single_post');
      ?>
      <div class="single_post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
        <?php the_content(); ?>
        <?php if (get_field('changelog')) : ?>
          <div class="single_post__changelog">
            <header>
              <h3> تغییرات نسخه
                <?php the_field('version') ?>
              </h3>
            </header>
            <?php the_field('changelog'); ?>
          </div>
        <?php endif; ?>
        <?php if(get_field('download') || get_field('system') || get_field('install_guide')): ?>
        <section id="download_box" class="small_post">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php if (get_field('download')) : ?>
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#new-<?php echo $settings['category']; ?>" type="button" role="tab" aria-controls="home" aria-selected="true">
                  لینک های دانلود
                </button>
              </li>
            <?php endif; ?>
            <?php if (get_field('system')) : ?>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#suggest-<?php echo $settings['category']; ?>" type="button" role="tab" aria-controls="profile" aria-selected="false">
                  سیستم مورد نیاز
                </button>
              </li>
            <?php endif; ?>
            <?php if (get_field('install_guide')) : ?>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#updated-<?php echo $settings['category']; ?>" type="button" role="tab" aria-controls="contact" aria-selected="false">
                  راهنمای نصب
                </button>
              </li>
            <?php endif; ?>
          </ul>
          <div class="tab-content" id="myTabContent">
            <?php if (get_field('download')) : ?>
              <div class="tab-pane fade show active" id="new-<?php echo $settings['category']; ?>" role="tabpanel" aria-labelledby="home-tab">
                <!-- tabConent 1 -->
                <?php
                if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                  $ip = $_SERVER['REMOTE_ADDR'];
                }
                $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));
                if ($details->geoplugin_countryCode == 'IR') {
                  $iran = true;
                } else {
                  $iran = false;
                }
                if ($GLOBALS['config']['just_iran'] == 'false' || $iran) :
                ?>
                  <div class="row g-2 mt-3">
                    <span class="all_button">
                      password:
                      www.download.com
                      <i class="bi bi-lock-fill"></i>
                    </span>
                    <div style="margin-bottom: 50px;" class="col-md-12 col-sm-12">
                      <div class="d-flex align-items-start row">
                        <div class="nav flex-column dl-min nav-pills col-sm-3 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                          <?php
                          //downloadbox
                          if (have_rows('download')) :
                            $i = 0;
                            while (have_rows('download')) : the_row();
                              $row_title = get_sub_field('row_title');
                          ?>

                              <button class="nav-link nav-dl <?php echo $i == 0 ? 'active' : ''  ?>" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-<?= $i; ?>" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <?php $i++; ?>
                                <i class="bi bi-<?= get_sub_field('row_icon') ?>"></i>
                                <?= $row_title; ?>
                              </button>

                          <?php
                            endwhile;
                          endif;
                          ?>
                        </div>


                        <?php
                        //downloadbox
                        if (have_rows('download')) : ?>
                          <div class="tab-content dltab-content col-sm-9 col-12" id="v-pills-tabContent">

                            <?php $i = 0;
                            while (have_rows('download')) : the_row();
                              $row_title = get_sub_field('row_title'); ?>
                              <div class="tab-pane dl-pane fade <?php echo $i == 0 ? 'active show' : ''  ?>" id="v-<?= $i; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <?php $i++; ?>
                                <?php if (have_rows('download_row')) :
                                  while (have_rows('download_row')) : the_row();
                                    $link = get_sub_field('download_link');
                                    $title = get_sub_field('download_link_title'); ?>
                                    <div class="download_item">
                                      <a href="<?= $link ?>"><i class="bi bi-download"></i><?= $title ?></a>
                                      <?php if (get_sub_field('qr_code')) : ?>
                                        <i class="bi bi-qr-code qr_icon position-relative" title="اسکن کنید">
                                          <div class="qr_wrapper">
                                            <img src="http://chart.apis.google.com/chart?cht=qr&chs=150x150&chld=L|0&chl=<?= $link ?>" width="150" height="150" alt="اسکن کنید <?php the_title(); ?>" />
                                          </div>
                                        </i>
                                      <?php endif; ?>
                                    </div>
                                  <?php endwhile; ?>
                              </div>

                            <?php endif; ?>
                          <?php
                            endwhile; ?>
                          <div class="info_box">
                            <ul>
                              <li class="password">
                                <i class="bi bi-lock-fill"></i>
                                پسورد فایل: <?php the_field('password'); ?>
                              </li>
                              <?php foreach ($GLOBALS['config']['dl_box_links'] as $item) : ?>
                                <li>
                                  <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
                                </li>
                              <?php endforeach; ?>
                              <li class="report">
                                <a href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal">گزارش خرابی لینک و فایل ها</a>
                              </li>
                            </ul>
                          </div>
                          </div>

                        <?php endif; ?>

                      </div>


                    </div>
                  </div>
                <?php else : ?>
                  <div class="center">
                    <div class="just_iran mt-3">
                      <strong>نکته مهم:‌ </strong>خدمات این وبسایت برای کاربران داخل ایران می‌باشد. در صورت استفاده از VPN آنرا خاموش کرده و صفحه را رفرش کنید!
                    </div>
                  </div>
                <?php endif; ?>
                <!-- tabConent 1 -->
              </div>
            <?php endif; ?>
            <div class="tab-pane fade" id="suggest-<?php echo $settings['category']; ?>" role="tabpanel" aria-labelledby="profile-tab">
              <!-- tabContent 2 -->
              <div class="row g-2 mt-3">
                <div class="">
                  <?php
                  the_field('system');
                  ?>
                </div>
              </div>
              <!-- tabContent 2 -->
            </div>
            <div class="tab-pane fade" id="updated-<?php echo $settings['category']; ?>" role="tabpanel" aria-labelledby="contact-tab">
              <!-- tabContent 3 -->
              <div class="row g-2 mt-3">
                <div class="">
                  <?php
                  the_field('install_guide');
                  ?>
                </div>
              </div>
              <!-- tabContent 3 -->
            </div>
          </div>
        </section>
        <?php endif; ?>
        <?php if (get_field('gallery')) : ?>
          <section class="gallery my-4">
            <header>
              <h3>گالری تصاویر</h3>
            </header>
            <div class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <?php foreach (get_field('gallery') as $item) : ?>
                  <div class="swiper-slide">
                    <a class="gallery_image" href="<?php echo $item; ?>">
                      <img src="<?php echo $item; ?>" />
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-scrollbar"></div>
            </div>
          </section>
        <?php endif; ?>
        <br><br><br>
        <?php
        elementor_theme_do_location('single_post_dlbox');
        ?>
        <section class="comments">
          <?php
          $comments_count = wp_count_comments(get_the_ID());
          // if (comments_open()) {
            comments_template();
          // }
          ?>
        </section>
      </div>
    </div>
    <?php get_sidebar('left') ?>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ارسال گزارش خرابی لینک و فایل</h5>
      </div>
      <div class="modal-body">
        <div class="report_info">
          <?= $GLOBALS['config']['dl_notes']; ?>
        </div>
        <?= do_shortcode('[contact-form-7 id="472" title="فرم گزارش مشکل لینک ها"]'); ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">انصراف</button>
        </div>

      </div>

    </div>
  </div>
</div>

<?php
get_footer();
