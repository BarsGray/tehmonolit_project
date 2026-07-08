    <footer>
      <div class="container">
        <a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo"></a>
        <?php wp_nav_menu('menu=top_menu&container=nav&container_class=menu');?>
        <?php if (get_field('number_1', FRONT_PAGE)): ?>
          <a class="phone" href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE)); ?>"><?php echo SVG_PHONE; ?><span><?php the_field('number_1', FRONT_PAGE); ?></span></a>
        <?php endif; ?>
        <?php if (get_field('max', FRONT_PAGE)): ?>
          <a class="footer_max" rel="nofollow" target="_blank" href="<?php the_field('max', FRONT_PAGE); ?>">Мы в MAX</a>
        <?php endif; ?>
        <div class="copy_row">
          <div class="polit">
            <p><?php echo the_privacy_policy_link(); ?></p>
            <p><a href="<?php echo get_page_link(470); ?>">Политика использования файлов cookie</a></p>
            <p><a href="<?php echo get_page_link(474); ?>">Согласие на обработку персональных данных</a></p>
          </div>
          <p><a href="https://www.vzh.ru/"><img src="<?php bloginfo('template_url'); ?>/img/logo_vzh.svg" alt="vzh.ru"></a></p></div>
      </div>
    </footer>
  </div>
  <?php 
    if(!isset($_COOKIE['gdpr_site']))
      echo '<div class="gdpr"><p>Продолжая использовать наш веб-сайт, вы соглашаетесь на использование файлов cookie в соответствии с нашей <a href="'.get_privacy_policy_url().'" target="_blank">политикой конфиденциальности</a>.</p><a href="#">Хорошо</a></div>';
  ?>
<?php wp_footer(); ?>
</body>

</html>