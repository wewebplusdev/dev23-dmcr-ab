$(document).ready(function () {
    // console.log( "ready!" );

    $('.layout-header .btn-search').click(function () {
        $('.search-input').removeClass('hide');
    });
    $('.layout-header .search-input .btn-close').click(function () {
        $('.search-input').addClass('hide');
    });

    const herobannerSwiper = new Swiper('.hero-banner-swiper', {
        // Optional parameters
        slidesPerView: 1,
        // spaceBetween: 30,
        // direction: 'vertical',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
            clickable: true,
        },

        // Navigation arrows
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },

        // And if we need scrollbar
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        // },
    });

});