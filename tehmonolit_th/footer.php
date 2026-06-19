    <footer>
      <div class="container">
        <a class="logo" href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo"></a>
        <?php wp_nav_menu('menu=top_menu&container=nav&container_class=menu');?>
        <a class="phone" href="tel:+79202291343">
          <?php echo SVG_PHONE; ?>
          <span>+7 920 229 13 43</span>
        </a>
        <a class="footer_max" href="/">Мы в MAX</a>
        <div class="copy_row">
          <span>2026</span>
          <a href="https://www.vzh.ru/"><img src="<?php bloginfo('template_url'); ?>/img/logo_vzh.svg" alt="vzh.ru"></a>
        </div>
      </div>
    </footer>
  </div>
<?php wp_footer(); ?>
</body>

</html>