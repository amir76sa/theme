<?php if (is_single()) {
  $single = 'position-relative single_lsidebar';
}else{
  $single = '';
}?>
<div class="col-xxl-2 col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 <?php echo $single; ?> <?php echo isset($args['mt']) ? $args['mt'] : null ?>">
<aside class="sidebar">
  <?php dynamic_sidebar('left_sidebar'); ?>
</aside>
</div>