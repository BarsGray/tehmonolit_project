jQuery(function($) {
	//меню

    $('.open-mobile-menu').click(function(e){
        e.preventDefault();
        $('.header-main-row-bottom').fadeIn();
    });

    $(".close").click(function(e){
        e.preventDefault();
        $(".header-main-row-bottom").fadeOut();
    });
	
	$(".header-main-row-bottom-owerlay").click(function(e){
        e.preventDefault();
        $(".header-main-row-bottom").fadeOut();
    });

	 // Занесение таблиц в контейнер
	$('.wrapper').find('table').each(function() {
	$(this).wrap('<div class="table_wrap"></div>');
	});
	
	// слайдеры
    $('.bxslider-slide-home').bxSlider({
        mode: 'fade',
        speed: 1000,
        infiniteLoop: true,
        touchEnabled: true,
        preventDefaultSwipeX: true,
        pager: false,
        controls: true,
        prevText: '',
        nextText: '',
        auto: true,
        pause: 6000
    });
	
	var bxslider = $('.bxslider-photo-gallery');
    if (bxslider.length != 0) {
    

    bxslider.bxSlider({
        speed: 1000,
        infiniteLoop: true,
        touchEnabled: true,
        preventDefaultSwipeX: true,
        pager: false,
        controls: true,
        prevText: '',
        nextText: '',
        auto: true,
        pause: 6000,
        minSlides: 1,
        maxSlides: 4,
        moveSlides: 1,
        slideWidth: 275,
        slideMargin: 17
    });

    if ($(window).width() <= 1300 && $(window).width() >= 950){
        bxslider.reloadSlider({
            speed: 1000,
            infiniteLoop: true,
            touchEnabled: true,
            preventDefaultSwipeX: true,
            pager: false,
            controls: true,
            prevText: '',
            nextText: '',
            auto: true,
            pause: 6000,
            minSlides: 1,
            maxSlides: 4,
            moveSlides: 1,
            slideWidth: 235,
            slideMargin: 15
        });
    }
    if ($(window).width() <= 499) {
        bxslider.reloadSlider({
            speed: 1000,
            infiniteLoop: true,
            touchEnabled: true,
            preventDefaultSwipeX: true,
            pager: false,
            controls: true,
            prevText: '',
            nextText: '',
            auto: true,
            pause: 6000
        });
    }
	} 

});