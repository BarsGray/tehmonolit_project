<?php get_header(); ?>
<div class="container">
  <?php show_title_box(); ?>
  <div class="content_container">
    <div class="content">
			<?php the_field("text_before"); ?>
      <?php the_content(); ?>
    </div>
    <?php
    if(is_page(11)) show_avtopark();
    if(is_page(20)) show_contacts();
    if(is_page(14)) show_services_table();
    ?>
  </div>
  <?php if(is_page(17)) show_gallery(); ?>
  <div class="content_container">
    <div class="content">
			<?php the_field("text_after"); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>