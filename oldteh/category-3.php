<?php get_header(); ?>

<main class="content category-page page-vn">
    <div class="content-wrapper-vn">
        <ul class="breadcrumb">
            <?php the_breadcrumb(); ?>
        </ul>
        <h1><? single_cat_title(''); ?></h1><?php
        if (! $current = get_query_var('paged'))
            $current = 1;

        $params = array(
            'cat' => 3, // Новости
            'paged'=> $current
        );
        query_posts($params);
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <div>
                    <p class="date"><?php echo get_the_date(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="news-title"><?php the_title(); ?></a>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php }
            wp_reset_query();
        }
        ?>
        <div class="site-navigation">
            <div class="wp-pagenavi">
                <?php kama_pagenavi(); ?>
            </div>
        </div>
        <div class="photo-gallery">
            <?php echo do_shortcode( '[contact-form-7 id="149" title="Форма в нижней части страницы"]' ); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
