var interleaveOffset = 0.5;
var swiperOptions = {
    loop: true,
    speed: 3000,
    grabCursor: true,
    slidesPerView: 3, // Correct casing
    watchSlidesProgress: true,
    mousewheel: true, // Corrected option
    keyboard: true, // Corrected option
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    autoplay: {
        delay: 3000,
    },
    fadeEffect: {
        crossFade: true
    },
};

    var swiper = new Swiper(".swiper-container", swiperOptions);
