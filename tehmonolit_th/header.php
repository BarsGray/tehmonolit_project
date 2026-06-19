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
          <a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Логотип"></a>
          <div class="menu_wrap">
            <?php wp_nav_menu('menu=top_menu&container=nav&container_class=menu');?>
						<?php if (get_field('max', FRONT_PAGE)): ?>
              <a class="social_link menu_max" href="<?php the_field('max', FRONT_PAGE); ?>"></a>
            <?php endif; ?>
          </div>
          <div class="header_contacts">
						<?php if (get_field('max', FRONT_PAGE)): ?>
              <a class="social_link max" href="<?php the_field('max', FRONT_PAGE); ?>"></a>
            <?php endif; ?>
						<?php if (get_field('number_1', FRONT_PAGE)): ?>
              <a class="phone" href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE));?>"><?php echo SVG_PHONE; ?><span><?php the_field('number_1', FRONT_PAGE); ?></span></a>
            <?php endif; ?>
            <a class="burger_menu_btn"><?php echo SVG_MENU_BTN; ?></a>
          </div>
        </div>
      </div>
    </header>