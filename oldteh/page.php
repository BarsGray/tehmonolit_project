<?php get_header(); ?>
    <main class="content page-vn">
        <div class="content-wrapper-vn">
            <div class="breadcrumb">
                <?php the_breadcrumb(); ?>
            </div>
			
			<?php
			$parametr = get_field('alt_title');
			if (!empty($parametr)) { ?>
				<h1><?php the_field('alt_title'); ?></h1>
			<?php } else { ?>
				<h1><?php the_title(); ?></h1>
			<?php }
            ?>
            <div class="content-text-page-vn-ex"><?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        if (is_page(14)) { ?>
                            <p class="page-vn-description-p">
                            <?php the_content(); ?>
                            </p><?php
                            if (!$current = get_query_var('paged'))
                                $current = 1;

                            $params = array(
                                'cat' => 4, // Автобетононасосы
                                'paged' => $current
                            );
                            query_posts($params);
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();
                                    ?>
                                    <div class="car-post-page-vn" itemtype="https://schema.org/ItemList" itemscope>
										<div class="car-post-page-vn-item" itemtype="https://schema.org/Product" itemprop="itemListElement" itemscope>
											<a href="<?php the_permalink();?>" itemprop="url">
												<?
												$parametr_page = get_field('alt_title');
												if(!empty($parametr_page)):
												?>
													<p class="title-car-name" itemprop="name"><?= $parametr_page; ?></p>
												<?
												else:
												?>
													<p class="title-car-name" itemprop="name"><?php the_title(); ?></p>
												<?php
												endif;
												the_post_thumbnail();
												?>
												<meta itemprop="image" content="<?php echo  get_the_post_thumbnail_url();?>">
												
												<div class="car-specifications">
													<p itemprop="description">Вертикальный вылет: <span><?php the_field('flight_pump');?> м.</span></p>
													<p itemtype="https://schema.org/Offer" itemprop="offers" itemscope>
														Цена: <span><?php the_field('price_pump');?> рублей/час</span>
														<meta itemprop="price" content="<?php the_field('price_pump'); ?>">
														<meta itemprop="priceCurrency" content="RUB">
													</p>
												</div>
												<div class="button-panel-vn-page">
													<a href="#contact_form_pop2" class="fancybox-inline page-vn-zakaz-car">Заказать</a>
													<a href="<?php the_permalink(12); ?>" class="link-price-list">Прайс-лист</a>
												</div>
											</a>
										</div>
                                    </div><?php }
                                wp_reset_query();
                            }
							
                        } elseif (is_page(41)){
							
                            $images = get_field('foto_gallery');
                            if ($images): ?>
                                <ul class="foto-gallery-page-vn">
                                <?php foreach ($images as $image): ?>
                                    <li>
                                        <a rel="gallery" href="<?php echo $image['url']; ?>">
                                            <img src="<?php echo $image['sizes']['foto_gallery']; ?>"
                                                 alt="<?php echo $image['alt']; ?>"/>
                                        </a>
                                        <p><?php echo $image['caption']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                                </ul><?php endif;
								
							the_content();
								
                        } elseif (is_page(16)) {
							the_content();?>
							<?php the_field('advantages_cooperation_about'); ?>
							<?php the_field('rent_about'); ?>
						<?php
						
						} elseif (is_page(20)) {
						?>
							<div itemscope itemtype="http://schema.org/LocalBusiness" class="contacts">
								<p itemprop="name" class="company">ООО «Техмонолит»</p>
								<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="address">
									<p class="name">Адрес:</p>
									<span itemprop="postalCode">394020</span>,
									<span itemprop="addressLocality">Воронеж</span>,
									<span itemprop="streetAddress">улица Екатерины Зеленко, 20</span>
								</div>
								<p class="name">Телефон:</p>
								<p><span itemprop="telephone">+7 473-300-43-29</span></p>
								<p><span itemprop="telephone">+7 920-229-13-43</span></p>
								
								<p class="name">E-mail:</p>
								<p><a href="mailto:291343@bk.ru" itemprop="email">291343@bk.ru</a></p>

								<p class="name">Время работы:</p>
								<p><time itemprop="openingHours" datetime="Mo-Su 8:00−21:00">Пн-Вс: с 8:00 – 21:00</time></p>
								
								<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af642673d8a47fa96b5be277bb987486691a0eab44837efb59cb6b159c667a964&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
							</div>
							
							<div class="content-text-page-vn-ex">
								<?php the_content();?>
							</div>
						<?php
						} else {
                            the_content();
                        }
                    }
                } ?>
                <div class="clear"></div>
            </div>
            <div class="site-navigation">
                <div class="wp-pagenavi">
                    <?php kama_pagenavi(); ?>
                </div>
            </div>
            <div class="photo-gallery">
                <?php echo do_shortcode( '[contact-form-7 id="149" title="Форма в нижней части страницы"]' ); ?>
            </div>
			<?php
				$post_id = get_the_ID();
				$tvr_s_txt = get_field('tvr_s_txt', $post_id);
				if($tvr_s_txt){ 
				?><div class="content-text-page-vn-ex"> <?php
				echo $tvr_s_txt;
				?></div><?php
				}
			?>
        </div>
    </main><!-- .content -->

    </div><!-- .wrapper -->

<?php get_footer(); ?>