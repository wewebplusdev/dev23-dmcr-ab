window.onload = function () {
    $(".preload").delay(400).fadeOut("200", function () {
        $('#preload').addClass('move');
        $('#preload').fadeOut(200);
    });
};

$(document).ready(function () {
    // console.log( "ready!" );

    $(function () {
        AOS.init({
            duration: 2000,
            once: true,
            offset: 0,
        });
    });


    var lazyLoadInstance = new LazyLoad();
    // lazyLoadInstance.update();\

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

    // START: Chart.js set defaults
    Chart.defaults.font.size = 16;
    Chart.defaults.font.family = 'db_helvethaica';
    Chart.defaults.font.lineHeight = '1.2em'
    // END: Chart.js set defaults

    $('.select-control').select2({
        minimumResultsForSearch: -1,
        placeholder: function () {
            $(this).data('placeholder');
        }
    });


});