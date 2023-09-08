<?php 
if( theme_options('footer_style') == 'default' ): 
  get_template_part('inc/template_parts/footer/default');
else:
  get_template_part('inc/template_parts/footer/modern');
endif; ?>

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


<?php if( get_field('trailer') ): ?>
<!-- Trailer Modal -->
<div class="modal fade trailerModal" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3>تریلر</h3>
        <button type="button" class="btn-close modal_fix_close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <video controls src="<?php the_field('trailer') ?>"></video>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div id="modal_search">
  <div class="modal_search_inner">
    <div class="text-start">
      <span class="close_modal">
        بستن <i class="bi bi-x"></i>
      </span>
    </div>
    <form action="<?php echo site_url(); ?>">
      <input class="search_input" type="text" name="s" placeholder="کلمه مورد نظر را برای جستجو وارد کنید...">
      <button type="submit">
        <i class="bi bi-search"></i>
      </button>
    </form>

    <div class="mt-5 most_need">
      <h4>مواردی که حتما نیاز خواهید داشت</h4>
      <div class="most_need__inner">

        <?php 
        $must_have_ids = $GLOBALS['config']['must_have_apps'];

        $args = array(
          'number_posts' => -1,
          'post__in' => $must_have_ids
        );

        $query = new WP_Query($args);


        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        ?>
        
        <div class="app">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('home-tabs'); ?>
            <div class="short_name text-truncate">
              <?php echo get_field('faName') ? get_field('faName') : get_field('enName') ?>
            </div>
          </a>
        </div>
      <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>

      </div>
    </div><!-- /.most_need -->
  </div>
</div>

<?php if ($GLOBALS['config']['go_up'] == 'true') : ?>
  <a href="#" aria-label="go up" role="link" class="go_up"><i class="bi bi-chevron-up"></i></a>
<?php endif;

wp_footer();
?>

<div id="toast"></div>

</body>
</html>