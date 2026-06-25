<?php /* Template Name: Главная */ get_header(); ?>
<div class="bunner">
  <div class="container">
    <div class="text_box">
      <p class="bunner_title">Быстрая подача любого автобетононасоса на Ваш объект</p>
      <p class="text">Аренда мощных АБН от компании «Техмонолит». Подача машины в день обращения, опытные операторы
        и
        честная цена за смену.</p>
    </div>
    <div class="buttons">
      <?php if (get_field('number_1', FRONT_PAGE)): ?>
        <a class="bunner_call_btn" href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE));?>"><span>Позвонить</span></a>
      <?php endif; ?>
      <?php if (get_field('max', FRONT_PAGE)): ?>
        <a class="bunner_max_btn" href="<?php the_field('max', FRONT_PAGE); ?>"><span>Написать в MAX</span></a>
      <?php endif; ?>
    </div>
    <div class="img_bg"></div>
  </div>
</div>
<?php show_avtopark_slider(); ?>
</div>
<div class="advantages">
  <div class="container">
    <p class="title">Почему выбирают нашу технику</p>
    <div class="advantages_box">
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_1"></div>
        <p class="advantages_title">Регулярное ТО и профилактика</p>
        <p class="advantages_text">Постоянный контроль состояния, немедленное устранение неполадок. Если ремонт
          неэффективен — замена детали.</p>
      </div>
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_2"></div>
        <p class="advantages_title">Только проверенные автомобили</p>
        <p class="advantages_text">Современная техника от именитых мировых производителей (Европа, Азия) с
          максимальной эффективностью.</p>
      </div>
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_3"></div>
        <p class="advantages_title">Любая сложность задач</p>
        <p class="advantages_text">Широкий выбор моделей в автопарке под ваш тип работ: дальность подачи бетона по
          горизонту до 200 м.</p>
      </div>
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_4"></div>
        <p class="advantages_title">Горизонтальная подача до 200 м.</p>
        <p class="advantages_text">Спецтехника адаптирована под серьезные строительные объёмы — бесперебойная подача
          бетона.</p>
      </div>
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_5"></div>
        <p class="advantages_title">Работаем с 2004 года</p>
        <p class="advantages_text">Мы повышаем эффективность техники и скорость работ так, чтобы вы сэкономили и
          время, и деньги.</p>
      </div>
      <div class="advantages_item">
        <div class="advantages_icon advantages_icon_6"></div>
        <p class="advantages_title">Компетентные операторы</p>
        <p class="advantages_text">Наши специалисты управляют техникой и следят за каждым кубометром смеси — от
          стрелы
          до точки заливки.</p>
      </div>
    </div>
  </div>
</div>
<?php echo show_foto_slider(); ?>
<div class="content_container">
  <div class="content">
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>