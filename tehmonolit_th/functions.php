<?php
function show_title_box() { ?>
  <div class="content_container">
    <?php breadcrumbs();
      $title = '';
      if (is_tax())
        $title = (get_field('alt_zag')) ? get_field('alt_zag') : single_term_title();
      elseif(is_category())
        $title = (get_field('alt_zag')) ? get_field('alt_zag') : single_cat_title('', false);
      elseif(is_404())
        $title = 'Ошибка 404!';
      else
        $title = (get_field('alt_zag')) ? get_field('alt_zag') : get_the_title();
      if(!is_singular('service')) { ?><h1 class="title"><?php echo $title; } ?></h1>
  </div>
<?php };

function show_foto_slider() {
  $foto_slider_title = '';
  $slides = '';
	if (get_field('foto_gallery', 17)){
    $count = 0;
    foreach(get_field('foto_gallery', 17) as $item) {
      if ($count >= 10) break;
      $slides .= "<div class='foto_slider_item swiper-slide'><a href='".$item['url']."' data-fancybox='gallery'><img src='".$item['url']."' alt='".$item['alt']."'></a></div>";
      $count++;
    }
  }
  if(is_front_page()){
    $foto_slider_title = <<<FOTO_SLIDER_TITLE
    <div class="foto_slider_top_row">
      <div class="container">
        <p class="title">Бетонируем сложные объекты профессионально</p>
        <a href="#" class="btn">Фотогалерея</a>
        <p class="text">Приезжаем в назначенное время. Заливаем без потери качества. Убираем за собой. Наши операторы
          управляют бетононасосом и следят за каждым этапом — от развертки стрелы до промывки после смены. Техника
          проходит ТО перед каждым выездом. Вы получаете кубометры, а не головную боль.</p>
      </div>
    </div>
    FOTO_SLIDER_TITLE;
  }
  return <<<FOTO_SLIDER
  <div class="foto_slider_on_main">
    $foto_slider_title
    <div class="foto_slider_container">
      <div class="foto_slider swiper">
        <div class="foto_slider_row swiper-wrapper">$slides</div>
      </div>
      <div class="swiper-pagination foto_slider__pagination"></div>
      <a href="#" class="btn_prev"></a>
      <a href="#" class="btn_next"></a>
    </div>
  </div>
  FOTO_SLIDER;
}

function show_contacts() {
  $adres     = get_field('adres', FRONT_PAGE);
  $number_1  = get_field('number_1', FRONT_PAGE);
  $number_2  = get_field('number_2', FRONT_PAGE);
  $max       = get_field('max', FRONT_PAGE);
  $work_time = get_field('work_time', FRONT_PAGE);

  if($adres):?>
    <div class="contacts_row">
      <p class="label">Адрес</p>
      <p class="value"><?php echo $adres; ?></p>
    </div>
  <?php endif; ?>
  <?php if($number_1 || $number_2):?>
    <div class="contacts_row">
      <p class="label">Телефоны</p>
      <p class="value">
        <?php
        echo $number_1 ? "<a class='tel' href='tel:". merge_numbers($number_1) ."'>$number_1</a>" : '';
        echo $number_2 ? "<a class='tel' href='tel:". merge_numbers($number_2) ."'>$number_2</a>" : '';
        ?>
      </p>
    </div>
  <?php endif; ?>
  <?php if($work_time):?>
    <div class="contacts_row">
      <p class="label">Время работы</p>
      <p class="value"><?php echo $work_time; ?></p>
    </div>
  <?php endif; ?>
  <?php if($max):?>
    <div class="contacts_row">
      <p class="label">Мессенджер</p>
      <p class="value"><a class="social_link max" href="<?php echo $max; ?>"></a></p>
    </div>
  <?php endif; ?>
<?php }

function show_gallery() {
  $foto_gallery = get_field('foto_gallery');
	if ($foto_gallery): ?>
    <div class="gallery">
      <?php foreach($foto_gallery as $item): ?>
        <div class="gallery_item"><a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['sizes']['custom-gallery-thumb_5_3']; ?>" alt="<?php echo $item['alt']; ?>"></a></div>
      <?php endforeach; ?>
      <a href="#" class="gallery_btn">Загрузить ещё</a>
    </div>
<?php endif;
}

function show_avtopark_item ($value = '') {
  $isSingle       = $value === 'single';
  $isSlider       = $value === 'slider';
  $link           = (!$isSingle) ? get_permalink() : '';
  $link_img       = ($isSingle) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
  $avtopark_calss = ($isSlider) ? 'slider_item swiper-slide' : 'avtopark_item' . ($isSingle ? ' single' : '');
  $vilet          = get_field('vilet');
  $price          = get_field('price');
  ?>
  <div class="<?php echo $avtopark_calss; ?>">
    <div class="img"><a <?php echo ($isSingle) ? 'data-fancybox':''; ?> href="<?php echo (!$isSingle) ? $link : $link_img; ?>"><?php the_post_thumbnail('custom-gallery-thumb_35_30'); ?></a></div>
    <div class="info">
      <div class="info_top">
        <?php if($vilet):?><p class="param">Вертикальный вылет - <?php echo $vilet; ?>.</p><?php endif; ?>
        <a <?php echo ($link ==! '') ? "href='$link'" : ''; ?> class="name"><?php the_title(); ?></a>
      </div>
      <div class="info_bottom">
        <?php if($price):?><p class="price"><?php echo $price; ?></p><?php endif; ?>
        <a href="#" class="btn">Заказать</a>
        <?php if(!$isSlider):?><a class="show_all" href="#">Смотреть всё</a><?php endif; ?>
      </div>
    </div>
  </div>
<?php }

function show_avtopark_slider($transport = '') {
  $query = new WP_Query(['post_type' => 'service','posts_per_page' => -1,]);
  if ($query->have_posts()): ?>
  <div class="autopark_slider <?php echo $transport; ?>">
    <div class="container">
      <div class="top_row">
        <div class="left_box">
          <p class="title">Автопарк</p>
          <a class="show_all" href="#">Смотреть всё</a>
        </div>
        <div class="right_box">
          <a class="btn_prev" href="#"><span class="avtive"></span><span class="hover"></span><span class="unavtive"></span></a>
          <a class="btn_next" href="#"><span class="avtive"></span><span class="hover"></span><span class="unavtive"></span></a>
        </div>
      </div>
    </div>
    <div class="autopark_swiper_container">
      <div class="autopark_swiper swiper">
        <div class="slider_row swiper-wrapper">
          <?php while ($query->have_posts()): $query->the_post();
            show_avtopark_item('slider'); ?>
          <?php endwhile; ?>
        </div>
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
  </div>
	<?php wp_reset_postdata(); endif;
}

function show_avtopark() { ?>
  <?php
  $query = new WP_Query(['post_type' => 'service','posts_per_page' => -1,]);
	if ($query->have_posts()): ?>
    <div class="avtopark_section">
      <?php while ($query->have_posts()): $query->the_post();
        show_avtopark_item(); ?>
      <?php endwhile; ?>
    </div>
	<?php wp_reset_postdata(); endif;
}

function show_avtopark_table() {
  $params = get_field('params');
  $vilet  = get_field('vilet'); ?>
  <?php if(!empty($params) || !empty($vilet)): ?>
    <div class="table_params">
      <table>
        <tbody>
          <tr><th>Характеристика</th><th>Значение</th></tr>
          <?php if($vilet):?>
            <tr><td>Вертикальный вылет</td><td><?php echo $vilet; ?></td></tr>
          <?php endif; ?>
          <?php if (!empty($params) && is_array($params)):?>
            <?php foreach ($params as $item):?>
              <tr><td><?php echo $item['parametr_neme']; ?></td><td><?php echo $item['parametr']; ?></td></tr>
            <?php endforeach;?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
<?php }

function show_services_table() {
  $query = new WP_Query(['post_type' => 'service','posts_per_page' => -1,]); ?>
  <div class="table_price">
    <table>
      <tbody>
        <tr><th>Автобетононасос</th><th>Высота стрелы</th><th>Стоимость услуг с НДС 18%</th></tr>
        <?php if($query->have_posts()):?>
          <?php while ($query->have_posts()): $query->the_post(); ?>
            <tr><td><a class="table_price_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td><td><?php the_field('vilet'); ?></td><td><?php the_field('price'); ?></td></tr>
          <?php endwhile; ?>
        <?php wp_reset_postdata(); endif; ?>
      </tbody>
    </table>
  </div>
<?php }