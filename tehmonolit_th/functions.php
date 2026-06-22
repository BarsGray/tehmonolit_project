<?php
function show_title_box() { ?>
  <div class="content_container">
    <?php breadcrumbs(); ?>
    <p class="title"><?php the_title(); ?></p>
  </div>
<?php };

function show_foto_slider() {
  $foto_slider_title = '';
  $slides = '';

	if (get_field('foto_gallery', 17)){
    foreach(get_field('foto_gallery', 17) as $item) {
      $slides .= "<div class='foto_slider_item swiper-slide'><a href='".$item['url']."' data-fancybox='gallery'><img src='".$item['url']."' alt='".$item['alt']."'></a></div>";
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
	if (get_field('foto_gallery')): ?>
    <div class="gallery">
      <?php foreach(get_field('foto_gallery') as $item): ?>
        <div class="gallery_item gallery_item_visible"><a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>"></a></div>
      <?php endforeach; ?>
    </div>
<?php endif;
}