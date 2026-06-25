<?php get_header(); ?>
<div class="container">
  <?php show_title_box(); ?>
  <div class="content_container">
    <div class="content">
			<?php the_field("text_before"); ?>
      <?php the_content(); ?>
			<?php the_field("text_after"); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>