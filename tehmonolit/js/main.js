// ======================= header =============

function scrollTop() {
  let scroll_scr = window.scrollY;
  if (scroll_scr > 0) {
    document.querySelector('header').classList.add('active');
  } else {
    document.querySelector('header').classList.remove('active');
  }
}
scrollTop();
window.addEventListener('scroll', scrollTop);

// ======================= menu =============
const menuButton = document.querySelector('.burger_menu_btn');
const svgMenuButton = document.querySelector('.burger_menu_btn .ham');
const headerMenu = document.querySelector('.menu_wrap');
const overlay = document.querySelector('.overlay');

function openMenu() {
  document.querySelector('body').classList.toggle('scroll-nane');

  menuButton.classList.toggle('burger_menu_btn--active');
  svgMenuButton.classList.toggle('active');
  headerMenu.classList.toggle('active');
  overlay.classList.toggle('visible');
}

menuButton.addEventListener('click', openMenu);
overlay.addEventListener('click', openMenu);

// ======================= swiper =============
const autopark_swiper = new Swiper('.autopark_swiper', {
  slidesPerView: 'auto',
  spaceBetween: 12,
  normalizeSlideIndex: false,
  navigation: {
    nextEl: ".autopark_slider .btn_next",
    prevEl: ".autopark_slider .btn_prev"
  },
  scrollbar: {
    el: ".autopark_slider .swiper-scrollbar"
  },
  breakpoints: {
    1000: { spaceBetween: 24, }
  },
});

const foto_slider_swiper = new Swiper('.foto_slider', {
  loop: true,
  centeredSlides: false,
  slidesPerView: 1,
  slidesPerGroup: 1,
  spaceBetween: 24,
  navigation: {
    nextEl: ".foto_slider_on_main .btn_next",
    prevEl: ".foto_slider_on_main .btn_prev"
  },
  pagination: {
    el: ".foto_slider__pagination",
    clickable: true,
  },
  breakpoints: {
    890: {
      centeredSlides: true,
    },
  },
});

swiper.on('slideChangeTransitionEnd', () => {
  swiper.pagination.update();
});