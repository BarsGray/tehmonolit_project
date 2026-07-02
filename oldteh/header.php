<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="yandex-verification" content="0bdbfbdc52648665" />
	<meta name="google-site-verification" content="_NArov4LB0AMlK2mKojKN6BE0CwVpj2oBleQcrmWQ9M" />	
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />

    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<div class="wrapper">
	<?php if (is_front_page()) {?>
			<header class="header">
	<?php } else { ?>
			<header class="header-page-vn">
	<?php }?>
        <div class="header-mobile-top">
            <a href="tel:+74733004329"><i class="fa fa-phone" aria-hidden="true"></i></a><!--74732291343-->
            <a href="#contact_form_pop" class="fancybox-inline"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
            <a href="<?php the_permalink(20); ?>"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
            <a class="open-mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <div class="header-main-row-bottom">
				<div class="header-main-row-bottom-owerlay"></div>
				<div class="header-main-row-bottom-wrapper">
					<div>
						<i class="fa fa-times close" aria-hidden="true"></i>
					</div>
					<div class="nav-mobile">
						<?php
						if ( function_exists( 'wp_nav_menu' ) )
							wp_nav_menu(
								array(
									'theme_location' => 'header_menu',
									//'fallback_cb'=> 'header_menu',
									'container' => 'ul',
									'menu_class' => 'nav-mobile')
							);
						else header_menu();
						?>
					</div>
				</div>
            </div>
        </div>

        <div class="nav">
            <?php
            if ( function_exists( 'wp_nav_menu' ) )
                wp_nav_menu(
                    array(
                        'theme_location' => 'header_menu',
                        //'fallback_cb'=> 'header_menu',
                        'container' => 'ul',
                        'menu_class' => 'nav')
                );
            else header_menu();
            ?>
        </div>
        <div class="header-body">
            <div class="header-address">
                <p class="address-worked"><?php the_field('address', 5); ?> <br/> <a href="<?php the_permalink(20); ?>">Схема проезда</a></p>
                <p class="clock-worked"><?php the_field('schedule', 5); ?></p>
            </div>
            <a href="<?= get_home_url(); ?>" class="logo">
				<!--<img src="<?php bloginfo('template_url'); ?>/img/logo1.png">-->
				<img src="/wp-content/uploads/2019/01/logo1.png" alt="" title="">
				<p>Автобетононасосы</p>
			</a>
            <div class="header-phone">
                <p class="header-phone-first"><?php the_field('phone1', 5); ?></p>
                <p><?php the_field('phone2', 5); ?></p>
                <!--<p><?php // the_field('phone3', 5); ?></p>-->
                <a href="#contact_form_pop" class="header-phone-email fancybox-inline">Обратная связь</a>
            </div>
			<?php if (is_front_page()) {?>
					<div class="clear"></div>
					<img class="truck" src="<?php bloginfo('template_url'); ?>/img/truck.png">
			<?php } ?>
        </div>

    </header><!-- .header-->