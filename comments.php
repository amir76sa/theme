<?php

/**
 * The template for displaying Comments.
 */

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
  return;
}
// Show Comment Form (customized in functions.php).
comment_form();
?>

<div id="comments">
  <header class="d-flex justify-content-between align-items-center mt-4">
    <h3>دیدگاه کاربران</h3>
    <span class="count"><?= wp_count_comments(get_the_ID())->approved; ?></span>
  </header>
  <?php
  if (comments_open() && !have_comments()) :
  ?>
    <div class="no_comments">
      <?php
      esc_html_e('هنوز دیدگاهی ارسال نشده است اولین نفر باشید!', 'shop');
      ?>
    </div>
  <?php
  endif;

  if (have_comments()) :
  ?>

    <?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
    ?>
      <nav id="comment-nav-above">
        <h1 class="assistive-text"><?php esc_html_e('Comment navigation', 'shop'); ?></h1>
        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'shop')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'shop')); ?></div>
      </nav>
    <?php
    endif;
    ?>
    <ol class="commentlist">
      <?php
      /**
       * Loop through and list the comments. Tell wp_list_comments()
       * to use theme_comment() to format the comments.
       * If you want to overload this in a child theme then you can
       * define theme_comment() and that will be used instead.
       * See theme_comment() in my-theme/functions.php for more.
       */
      wp_list_comments(array('callback' => 'shop_comment'));
      ?>
    </ol>
    <?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
    ?>
      <nav id="comment-nav-below">
        <h1 class="assistive-text"><?php esc_html_e('Comment navigation', 'shop'); ?></h1>
        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'shop')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'shop')); ?></div>
      </nav>
    <?php
    endif;

    /**
     * If there are no comments and comments are closed, let's leave a little note, shall we?
     * But we don't want the note on pages or post types that do not support comments.
     */
  elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) :
    ?>
    <h2 id="comments-title" class="nocomments"><?php esc_html_e('بخش دیدگاه های این مطلب بسته شده است.', 'shop'); ?></h2>
  <?php
  endif;


  ?>
</div><!-- /#comments -->