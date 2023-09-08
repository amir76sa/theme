<?php get_header(); ?>
<div class="container mt-5">
  <div class="row">
    <?php get_sidebar('right'); ?>
    <div class="col-xxl-8 col-xl-8 col-lg-9 col-md-9 order-0 ps-4">
      <header class="cat_header">
        <h3><?php echo single_cat_title(); ?></h3>
        <?php dimox_breadcrumbs(); ?>
      </header>
      <div class="latestPosts2">
        <h3 class="latestPosts2__heading"><?php echo $title; ?></h3>
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
            <div class="row g-3 mb-sm-3 mb-5">
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 order-2 order-sm-1 m-0 my-sm-2">
                <div class="latestPosts2__right">
                  <div class="latestPosts2__title">
                    <a href="<?php the_permalink(); ?>">
                      <h2><?php the_title(); ?></h2>
                    </a>
                  </div>
                  <header class="latestPosts2__header">
                  </header>
                  <div class="latestPosts2__meta">
                    <div class="latestPosts2__left">
                      <div class="thumbnail">
                        <?php the_post_thumbnail('home-tabs'); ?>
                        <?php the_post_thumbnail('home-tabs', array('class' => 'blur')); ?>
                      </div>
                    </div>

                    <ul>
                      <li>
                        <i class="bi bi-alarm"></i>
                        <div class="meta_title">
                          <div>تاریخ انتشار</div>
                          <?php the_time('D d M Y'); ?>
                        </div>
                      </li>
                      <li>
                        <i class="bi bi-bar-chart"></i>
                        <div class="meta_title">
                          <div>تعداد بازدید</div>
                          <?= getPostViews(get_the_ID()); ?>
                        </div>
                      </li>
                      <li>
                        <i class="bi bi-person"></i>
                        <div class="meta_title">
                          <div>نویسنده</div>
                          <?php the_author(); ?>
                        </div>
                      </li>
                      <li>
                        <i class="bi bi-card-text"></i>
                        <div class="meta_title">
                          <div>دسته بندی</div>
                          <?php
                          $categories = wp_get_post_categories(get_the_ID());
                          foreach ($categories as $category) { ?>
                            <a href="<?php echo get_category_link($category); ?>"><?php echo get_cat_name($category) ?> </a>
                          <?php } ?>
                        </div>
                      </li>
                      <li>
                        <i class="bi bi-pencil"></i>
                        <div class="meta_title">
                          <div>آخرین آپدیت</div>
                          <?php echo get_the_modified_time('F jS, Y'); ?>
                        </div>
                      </li>

                      <li>
                        <i class="bi bi-chat-quote"></i>
                        <div class="meta_title">
                          <div>نظرات</div>
                          <?php if (get_comments_number() == 0) {
                            echo 'بدون دیدگاه';
                          } else {
                            echo get_comments_number() . ' دیدگاه';
                          } ?>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <p>
                    <?php the_excerpt(); ?>
                  </p>
                  <div class="latestPosts2__download">
                    <div class="latestPosts2__rating">
                      <strong><?php the_field('post_score'); ?></strong>
                      <div class="Stars" style="--rating: <?php the_field('post_score'); ?>;" aria-label="Rating of this product is 2.3 out of 5."></div>
                    </div>
                    <div></div>
                    <a class="latestPosts2__download--link" href="<?php the_permalink(); ?>">دانلود کنید <i class="bi bi-download"></i></a>
                  </div>
                </div>
              </div>
            </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
        <div class="pagination">
          <?php pagination('قبلی', 'بعدی');  ?>
        </div>
      </div>
      <!-- </div> -->
      <?php get_sidebar('left') ?>
    </div>
  </div>
  <?php get_footer(); ?>