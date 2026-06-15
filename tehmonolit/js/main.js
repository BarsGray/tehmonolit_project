window.addEventListener('scroll', function () {
  let scroll_scr = window.scrollY;
  if (scroll_scr > 0) {
    document.querySelector('header').classList.add('active');
  } else {
    document.querySelector('header').classList.remove('active');
  }
});

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



const swiper = new Swiper('.autopark_swiper', {
  slidesPerView: 'auto',
  spaceBetween: 24,
  normalizeSlideIndex: false,
  navigation: {
    nextEl: ".btn_next",
    prevEl: ".btn_prev"
  },
  scrollbar: {
    el: ".autopark_slider .swiper-scrollbar"
  },
  // mousewheel: true
});