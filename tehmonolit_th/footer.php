    <footer>
      <div class="container">
        <a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo"></a>
        <?php wp_nav_menu('menu=top_menu&container=nav&container_class=menu');?>
        <?php if (get_field('number_1', FRONT_PAGE)): ?>
          <a class="phone" href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE)); ?>"><?php echo SVG_PHONE; ?><span><?php the_field('number_1', FRONT_PAGE); ?></span></a>
        <?php endif; ?>
        <?php if (get_field('max', FRONT_PAGE)): ?>
          <a class="footer_max" href="<?php the_field('max', FRONT_PAGE); ?>">Мы в MAX</a>
        <?php endif; ?>
        <div class="copy_row"><span>2026</span><a href="https://www.vzh.ru/"><img src="<?php bloginfo('template_url'); ?>/img/logo_vzh.svg" alt="vzh.ru"></a></div>
      </div>
    </footer>
  </div>
<?php wp_footer(); ?>
</body>

</html>