<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="overlay"></div>
      <div class="container">
        <div class="header_box">
          <a class="logo" href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Логотип"></a>
          <div class="menu_wrap">
            <?php wp_nav_menu('menu=top_menu&container=nav&container_class=menu');?>
            <a class="social_link menu_max" href="/"></a>
          </div>
          <div class="header_contacts">
            <a class="social_link max" href="/"></a>
            <a class="phone" href="tel:+79202291343"><?php echo SVG_PHONE; ?><span>+7 920 229 13 43</span></a>
            <a class="burger_menu_btn"><?php echo SVG_MENU_BTN; ?></a>
          </div>
        </div>
      </div>
    </header>