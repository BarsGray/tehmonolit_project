<?php get_header();?>
	<main class="content category-page page-vn">
		<div class="content-wrapper-vn">
			<ul class="breadcrumb"><?php the_breadcrumb();?></ul>
			
			<?php if ( in_category(4)){ ?>
				
				<div class="category_single micro" itemscope itemtype="https://schema.org/Product">
					<?php if (get_field('alt_title')){ ?>
						<h1 itemprop="name"><?php the_field('alt_title');?></h1>
					<?php } else { ?>
						<h1 itemprop="name"><?php the_title();?></h1>
					<?php } ?>
					<a href="<?php echo get_the_post_thumbnail_url();?>" class="fancybox image"><?php the_post_thumbnail();?></a>
					<p class="description" itemprop="description">Вертикальный вылет: <span><?php the_field('flight_pump');?> м.</span></p>
					<p class="offers" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
						Цена: <span><?php the_field('price_pump');?> руб.</span>
						<meta itemprop="price" content="<?php the_field('price_pump');?>">
						<meta itemprop="priceCurrency" content="RUB">
					</p>
					<a href="#contact_form_pop2" class="fancybox-inline page-vn-zakaz-car">Заказать</a>
				</div>
				<?php
			} else 
				echo get_field('alt_title')!='' ? '<h1>'.get_field('alt_title').'</h1>' : '<h1>'.get_the_title().'</h1>';
			?>
			
			<div class="content-text-page-vn-ex">
				<?php
				if (have_posts()){
					while (have_posts()){
						the_post();
						the_content();
					}
				}
				?>
			</div>
			
			<div class="photo-gallery"><?php echo do_shortcode('[contact-form-7 id="149" title="Форма в нижней части страницы"]');?></div>
		</div>
	</main>
<?php get_footer();?>
