<?php get_header(); ?>

<main class="content page-vn">
        <div class="content-wrapper-vn">
            <div class="breadcrumb">
                <?php the_breadcrumb(); ?>
            </div>
			
			<?php
			$parametr = get_field('alt_title');
			if (!empty($parametr)) { ?>
				<p class="h1"> <?php the_field('alt_title'); ?></p>
			<?php } else { ?>
				<p class="h1"><?php the_title(); ?></p>
			<?php }
            ?>
            <div class="content-text-page-vn-ex page404">
				<p class="h1">Ваша страница не найдена.</p>
				<a href="/" class="home404">Вернуться на главную страницу</a>
			</div>
		</div>
</main>

<?php get_footer(); ?>