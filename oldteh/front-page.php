<?php
get_header();
the_post();
?>
    <main class="content">
        <div class="body-content">
            <div class="content-wrapper">
                <!--<img src="<?php bloginfo('template_url');?>/img/img_content_text.jpg" alt="аренда бетононасоса воронеж">-->
                <div class="body-content-text">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
        <div class="slider-home">
            <div class="content-wrapper">
                <p class="title">У нас можно заказать</p>
				<?php
				if (have_rows('home-slider-first')) {
					echo '<ul class="bxslider-slide-home">';
					while (have_rows('home-slider-first')) {
                    the_row();
                    $image = get_sub_field('img_home-slider-first');
                    ?>
                    <li>
						<div class="bxslider-slide-home-img">
							<img src="<?php echo $image['sizes']['img_home-slider-first']; ?>"
							alt="<?php echo $image['alt']; ?>"/>
						</div>
						<div class="car-description">
                            <p class="name-car"><?php the_sub_field('mark_home-slider-first'); ?></p>
                            <p class="price-car">Цена<span><?php the_sub_field('price_home-slider-first'); ?> руб \ час</span></p>
                            <p class="height-car">Высота стрелы<span><?php the_sub_field('height_home-slider-first'); ?> м</span></p>
                        </div>
                    </li><?php
					}
                echo '</ul>';
				}
				?>
                <a class="slider-home-zakaz fancybox-inline" href="#contact_form_pop2">Заказать автонасос</a>
            </div>
        </div>
        <div class="content-wrapper">
           <div class="body-content-text">
				<?php the_field('cooperation_home', 5); ?>
			</div>
        </div>
        <div class="clear"></div>
		<div class="video-home">
			<div class="content-wrapper">
				<iframe width="100%" height="450" src="https://www.youtube.com/embed/h748dfBAKhs" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
        <div class="photo-gallery">
            <div class="content-wrapper">
                <p class="title">Фотогалерея <a href="<?php echo get_permalink(41); ?>">Архив</a></p>
				<?php
				if (have_rows('slider_foto_gallery_home')) {
					echo '<ul class="bxslider-photo-gallery">';
					while (have_rows('slider_foto_gallery_home')) {
                    the_row();
                    $image = get_sub_field('img_slider_foto_gallery_home');
                    ?>
                    <li>
						<img src="<?php echo $image['sizes']['img_slider_foto_gallery_home']; ?>"
							alt="<?php echo $image['alt']; ?>"/>
                    </li><?php
					}
                echo '</ul>';
				}
				?>
				<?php echo do_shortcode( '[contact-form-7 id="149" title="Форма в нижней части страницы"]' ); ?>
            </div>
        </div>
    </main><!-- .content -->

    </div><!-- .wrapper -->

<?php get_footer(); ?>