<?php
function show_title_box() { ?>
  <div class="content_container">
    <?php breadcrumbs(); ?>
    <p class="title"><?php the_title(); ?></p>
  </div>
<?php }; ?>