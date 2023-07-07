$(document).ready(function () {

    // var wframe = $('.frame-output .title').width();
    // $('.frame-output .title p').css('font-size',wframe / 24);
    // $('.frame-output .desc p').css('font-size',wframe / 28);
    // $('.frame-output .footer p').css('font-size',wframe / 40);
    // $('.frame-output .footer strong').css('font-size',wframe / 40);
    // var wframe = $('.frame-layout').width();
    // var hframe = $('.frame-layout').height();



    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        showOn: 'focus',
        buttonImage: '../img/calendar/calendar.gif',
        buttonImageOnly: true,
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        monthNamesShort: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        changeMonth: true,
        changeYear: true,
        beforeShow: function () {
            dateBefore = null;
            if (jQuery(this).val() != "") {
                var arrayDate = jQuery(this).val().split("-");
                arrayDate[2] = parseInt(arrayDate[2]) - 543;
                jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
            }
            setTimeout(function () {
                $.each(jQuery(".ui-datepicker-year option"), function (j, k) {
                    var textYear = parseInt(jQuery(".ui-datepicker-year option").eq(j).val()) + 543;
                    jQuery(".ui-datepicker-year option").eq(j).text(textYear);
                });
            }, 50);

        },
        onSubmit:function(){
          alert("test");  
        },
        onChangeMonthYear: function () {
            setTimeout(function () {
                $.each(jQuery(".ui-datepicker-year option"), function (j, k) {
                    var textYear = parseInt(jQuery(".ui-datepicker-year option").eq(j).val()) + 543;
                    jQuery(".ui-datepicker-year option").eq(j).text(textYear);
                });
            }, 50);
        },
        onClose: function () {
            if (dateBefore == null) {
                dateBefore = jQuery(this).val();
            }

            if (jQuery(this).val() != "" && jQuery(this).val() == dateBefore) {
                var arrayDate = dateBefore.split("-");
                arrayDate[2] = parseInt(arrayDate[2]) + 543;
                jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);

            }
        },
        onSelect: function (dateText, inst) {
            dateBefore = jQuery(this).val();
            var arrayDate = dateText.split("-");
            arrayDate[2] = parseInt(arrayDate[2]) + 543;
            jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
        }
    });
    
    

    $('.select-control').select2({
        minimumResultsForSearch: Infinity
    });


    $('.tab-collapse').tabCollapse();
    $('.tab-collapse-sm').tabCollapse({
        tabsClass: 'visible-lg visible-md visible-sm hidden-xs',
        accordionClass: 'visible-xs'
    });


    $("[data-fancybox]").fancybox({
        thumbs: false,
        slideShow: false,
        fullScreen: false
    });


    $('.top-graphic .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        center: false,
        smartSpeed: 1500,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
    // $('.top-graphic').delay(800)
    //         .animate({
    //             "opacity":"1"
    //     }, {
    //           queue: true,
    //           duration: 800    
    // });


    $('.frame-list .owl-carousel').owlCarousel({
        items: 5,
        loop: false,
        margin: 5,
        nav: true,
        dots: false,
        center: false,
        smartSpeed: 600,
        autoplay: false,
        navText: ['<span class="fa fa-angle-double-left" aria-hidden="true"></span>', '<span class="fa fa-angle-double-right" aria-hidden="true"></span>'],
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 6
            }
        }
    });


    $('.frame-layout-select .owl-carousel').owlCarousel({
        items: 6,
        loop: false,
        margin: 20,
        nav: true,
        dots: false,
        center: false,
        smartSpeed: 600,
        autoplay: false,
        navText: ['<span class="fa fa-angle-double-left" aria-hidden="true"></span>', '<span class="fa fa-angle-double-right" aria-hidden="true"></span>'],
        responsive: {
            0: {
                items: 2,
                margin: 10
            },
            576: {
                items: 4,
                margin: 10
            },
            993: {
                items: 6
            }
        }
    });


    $(window).scroll(function () {
        if ($(window).scrollTop() > $('.site-header-topbar').height()) {
            $('.site-header').addClass('tiny');
        } else {
            $('.site-header').removeClass('tiny');
        }
    });


    $('.btn-mobile').click(function () {
        $('.site-header-main .main-menu').toggleClass('open');
        $(this).toggleClass('close');
    });



    $('.wg-news .slide .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    $('.wg-issue .slide .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    $('.wg-banner-slider .slide .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });



    //---------- main-page
    $('.wg-news-pin .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
    $('.wg-issue .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
    $('.wg-tcnews .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 3,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
    $('.wg-doc .owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        items: 4,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });
    $('.wg-bannerslide .owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });


    $(".mcscroll").mCustomScrollbar({
        axis: "y",
        scrollButtons: {
            enable: true
        }
    });


    $('.wg-vdo .slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.wg-vdo .slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.wg-vdo .slider-for',
        dots: true,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });


    $('.gallery-detail .slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.gallery-detail .slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        asNavFor: '.gallery-detail .slider-for',
        dots: true,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });


    $('.news-pin .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    $('.news-relate .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 4,
        nav: false,
        dots: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });



    $('.information-list .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        items: 5,
        slideBy: 5,
        nav: false,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        dots: true,
        smartSpeed: 300,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            767: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    });


    $('.intro-img .slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        vertical: false,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1200
    });


    $('.wg-tc .slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        vertical: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800
    });

    $('.wg-ia .slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        vertical: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800
    });

    $('.login-form').delay(1000).animate({
        opacity: 1
    }, 800);


    // var fixedBreak = $('.fixed-break').offset();
    // $(window).scroll(function() {
    //     if($(window).scrollTop() >= fixedBreak) { 
    //         $('.fixed-break').addClass('fixed');
    //     }
    //     else{
    //         $('.fixed-break').removeClass('fixed');
    //     }
    // });


    $('.sitemap-list').isotope({
        itemSelector: '.item',
        percentPosition: true,
        layoutMode: 'fitRows',
        masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: '.item'
        }
        // getSortData: {
        //     number: '.number parseInt'
        // },
        // sortBy : 'number'
    });

    var defaultW = $('.default-wrapper').height();
    $('.default-body').css('min-height',defaultW - 80);

});


jQuery().ready(function(){
});    