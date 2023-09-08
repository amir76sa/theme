<?php
$taxonomy = get_queried_object();
get_header('developer');
?>
<div style="background-image: url('<?php echo get_field('dev_bg', $taxonomy) ?>');" class="dev_bg"></div>
<div class="container">
  <div class="row">
    <div class="col-xxl-10 col-xl-10 col-lg-12 col-md-12">
      <div class="dev_info d-flex">
        <figure>
          <img src="<?php echo get_field('dev_logo', $taxonomy) ?>">
        </figure>
        <div class="leftSide">
          <div class="leftSide_top">
            <h1><?php single_cat_title(); ?></h1>
            <ul>
              <li>
                <div class="dev_meta">
                  <strong>
                    <?php
                      $args = array(
                        'post_type' => 'post',
                        'post_status' => 'published',
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'developer',
                            'field' => 'term_id',
                            'terms' => $taxonomy->term_id,
                          )
                        ),
                        'numberposts' => -1
                      );
                      $num = count( get_posts( $args ) );
                      echo $num;?>
                  </strong>
                  <span>ساخته های این کمپانی</span>
                </div>
              </li>
              <li>
                <div class="dev_meta">
                  <strong><?php echo get_field('created_year', $taxonomy) ?></strong>
                  <span>سال شروع فـعالـیت</span>
                </div>
              </li>
            </ul>
            <div class="dev_site">
              <span>وبسایت رسمی این توسعه دهنده</span>
              <a rel="nofollow" target="_blank" href="<?php the_field('dev_site', $taxonomy) ?>"><?php the_field('dev_site', $taxonomy) ?></a>
            </div>
          </div>

          <div class="mt-3">
            <p><?php echo $taxonomy->description ?></p>
          </div>
        </div>
      </div>
      <div class="small_post">
        <div class="row g-2 mt-3">
          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'developer',
                'field' => 'term_id',
                'terms' => $taxonomy->term_id,
              )
            ),
          );

          $query = new WP_Query($args);
          if ($query->found_posts) {
            while ($query->have_posts()) {
              $query->the_post();
          ?>

              <div class="col-xxl-2 col-xl-2 col-lg-3 col-sm-6 col-6">
                <div class="article">
                  <a class="article__title--en" href="<?php the_permalink(); ?>"><?php the_field('enName'); ?></a>
                  <a href="<?php the_permalink(); ?>">
                    <figure class="article__image">
                      <?php the_post_thumbnail('home-tabs'); ?>
                      <?php the_post_thumbnail('home-tabs', array('class' => 'blur')); ?>
                    </figure>
                  </a>
                  <a class="article__title--fa" href="<?php the_permalink(); ?>"><?php the_field('faName'); ?></a>
                  <div class="article__meta">
                    <div class="article__stars">
                      <strong><?php the_field('post_score'); ?></strong>
                      <div class="Stars" style="--rating: <?php the_field('post_score'); ?>;" role="img" aria-label="Rating of this product is 2.3 out of 5."></div>
                    </div>
                    <div class="time">
                      <div><?php the_time('d'); ?></div>
                      <?php the_time('M') ?>
                    </div>
                  </div>
                  <a class="abs" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                </div>
              </div>
          <?php
            }
          }
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
    <?php get_sidebar('left', array('mt'=> 'mt-5')) ?>
  </div>
</div>
<?php get_footer(); ?>