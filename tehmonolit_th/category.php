<?php
	get_header();

	$qo=get_queried_object();
	$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
	query_posts(array('cat' => $qo->term_id,'paged' => $paged));
?>

  <div class="container">
		<?php show_title_box(); ?>
		<div class="content_container">
			<div class="content">
				<?php the_field("text_before", $qo); ?>
				<?php if(have_posts()){ echo '<div class="services_page">';
					while(have_posts()) { the_post(); ?>
							<div class="category_page_item">
								<div class="category_page_item_img">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-gallery-thumb_35_30'); ?></a>
								</div>
								<div class="category_page_item_rigth">
									<p class="category_page_item_name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									<p class="category_page_item_description"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
									<a class="category_page_item_btn" href="<?php the_permalink(); ?>">Узнать больше</a>
								</div>
							</div>
						<?php } echo '</div>';
					// wp_pagenavi();
				} else echo '<p>Раздел не заполнен</p>'; ?>
				<?php the_field("text_after", $qo); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>