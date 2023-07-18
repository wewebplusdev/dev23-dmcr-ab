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

    const utSwiper = new Swiper('.wg-utilization-tracking .swiper', {
        // Optional parameters
        slidesPerView: 3,
        spaceBetween: 40,
        // loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 15,
                navigation: false
            },
            578: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },
            1199: {
                spaceBetween: 40
            }
        }
    });

    var scrollSwiper = new Swiper(".scroll-swiper", {
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: true,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        mousewheel: true,
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