<?php get_header(); ?>
<div class="container">
  <?php show_title_box(); ?>
  <div class="content_container">
    <div class="content">
      <?php the_content(); ?>
    </div>
    <?php if(is_page(20)) show_contacts(); ?>
  </div>
  <?php if(is_page(17)) show_gallery(); ?>
</div>
<?php get_footer(); ?>