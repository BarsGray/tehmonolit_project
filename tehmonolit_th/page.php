<?php get_header(); ?>
<div class="container">
  <?php show_title_box(); ?>
  <div class="content_container">
    <?php 
    if(is_page(20))
      show_contacts();
    ?>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>