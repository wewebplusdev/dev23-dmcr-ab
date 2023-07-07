
window.onload = function() {
    
};

$(document).ready(function () {
    // callCMS('prd');
});

// const callCMS = (masterkey) => {

//     $.ajax({
//         url: "http://127.0.0.1:3500/dev22-sei/service-api/home/api_mobile",
//         type: "GET",
// 	   headers: {
// 		"Authorization" : "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBJbmZvIjp7ImFwcF90b2tlbiI6InNlaS0yMDIzLXdld2ViIn0sImlhdCI6MTY3NTMzMDIzMywiZXhwIjoxNjc1OTM1MDMzfQ.x5YekPgiilYgShymHlExRi93VMs6J9zKZbL4Uw9k2e4"
// 	  },
//         data: {
//             method: 'CallCms',
//             masterKey: masterkey,
//         },
//         dataType: "JSON",
//         async: false,
//         success: function (data) {
//             if (data) {
//                 alert(data);
//             }
//         }
//     }).done(function () {

//     });
// };

var swiper = new Swiper(".hero-banner", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    speed: 1200,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});

var swiper = new Swiper(".product-slider-center", {
    slidesPerView: 3,
    spaceBetween: 100,
    centeredSlides: true,
    loop: true,
    speed: 800,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            loop: false,
            centeredSlides: false,
            slidesPerView: 2,
            spaceBetween: 10,
            freeMode: true,
        },
        768: {
            centeredSlides: false,
            slidesPerView: 3,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 100,
        },
    },
});

var swiper = new Swiper(".wg-newspin-list", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});

var swiper = new Swiper(".wg-career-list", {
    slidesPerView: 3,
    spaceBetween: 40,
    loop: true,
    speed: 800,
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: false,
    // },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            loop: false,
            centeredSlides: false,
            slidesPerView: 2,
            spaceBetween: 10,
            freeMode: true
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    },
});