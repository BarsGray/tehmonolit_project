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

let isExecuted = false;
window.addEventListener('resize', () => {
  if (window.innerWidth >= 1320) {
    if (!isExecuted && headerMenu.classList.contains('active')) {
      openMenu();
      isExecuted = true;
    }
  } else {
    isExecuted = false;
  }
});

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

// ======================= fancybox =============
Fancybox.bind('[data-fancybox]', {
  dragToClose: false,
  Carousel: {
    Toolbar: {
      display: {
        left: [],
        middle: [],
        right: ['fullscreen','close'],
      },
    },
  },
});
Fancybox.bind('[data-fancybox="gallery"]', {
  dragToClose: false,
  animated: false,
  placeFocusBack: false,
  Carousel: {
    Toolbar: {
      display: {
        left: [],
        middle: [],
        right: ['close'],
      },
    },
  },
});

// ======================= loadMore gallery =============
const gallery = document.querySelector('.gallery');
const gallery_item = document.querySelectorAll('.gallery_item');
const galleryBtn = document.querySelector('.gallery_btn');

let servicesItemsPreviose = 12;
let iShow = servicesItemsPreviose;

if (!gallery_item.length == 0) {

  function galleryBtnHidden() {
    galleryBtn.style.display = 'none';
    gallery.style.paddingBottom = 0;
  }

  if (gallery_item.length <= servicesItemsPreviose) {
    galleryBtnHidden();
  }

  function galleryCounter() {
    for (let i = 0; i < iShow && i < gallery_item.length; i++) {
      gallery_item[i].style.display = 'block';
      setTimeout(() => { gallery_item[i].classList.add('gallery_item_visible'); }, 10);
    }
  }

  galleryCounter();

  galleryBtn.addEventListener('click', function (e) {
    e.preventDefault();

    if (iShow === gallery_item.length) {
      return;
    } else if (iShow + servicesItemsPreviose > gallery_item.length) {
      iShow += gallery_item.length - iShow;
      galleryBtnHidden();
    } else {
      iShow += servicesItemsPreviose;
      if (iShow >= gallery_item.length) {
        galleryBtnHidden();
      }
    }

    galleryCounter();
  });
}

// ======================= Show more content =============
	const hideContainer = document.querySelector('.hide_text');
	const btnMore = document.querySelector('.more');

	if (btnMore) {
		btnMore.addEventListener('click', () => {
			hideContainer.classList.toggle('active');

			if (hideContainer.classList.contains('active')) {
				btnMore.innerHTML = 'Cвернуть';
				btnMore.classList.add('active');
			} else {
				btnMore.innerHTML = 'Подробнее';
				btnMore.classList.remove('active');
			}
		});
	}