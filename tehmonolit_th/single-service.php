<?php get_header(); ?>
<div class="container">
  <?php show_title_box(); ?>
  <div class="content_container">
    <?php show_avtopark_item('single');
          show_avtopark_table(); ?>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>