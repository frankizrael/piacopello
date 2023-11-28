import '../scss/home.scss';
import 'swiper/dist/css/swiper.css';
import Swiper from 'swiper';

//add banner info
setTimeout(function(){
    $(".banner__title").addClass("active");
}, 3500);



const solucionesSwiper =  new Swiper('.productsvendido .swiper-container', {
    autoplay: {
        delay: 5000,
    },
    slidesPerView: 4,
    spaceBetween: 20,
    pagination: {
        el: '.productsvendido .minepagination',
        type: 'bullets',
    },
    navigation: {
        nextEl: '.productsvendido .buttonleft',
        prevEl: '.productsvendido .buttonright',
    },
    breakpoints: {
        1050: {
            slidesPerView: 2,
            spaceBetween: 34
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    }
});

const solucionesSwiper2 =  new Swiper('.productsvendido2 .swiper-container', {
    autoplay: {
        delay: 5000,
    },
    slidesPerView: 4,
    spaceBetween: 20,
    pagination: {
        el: '.productsvendido2 .minepagination',
        type: 'bullets',
    },
    navigation: {
        nextEl: '.productsvendido2 .buttonleft',
        prevEl: '.productsvendido2 .buttonright',
    },
    breakpoints: {
        1050: {
            slidesPerView: 2,
            spaceBetween: 34
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    }
});

const blogSwiper =  new Swiper('.blog .swiper-container', {
    slidesPerView: 3,
    spaceBetween: 20,
    navigation: {
        nextEl: '.blog .buttonleft',
        prevEl: '.blog .buttonright',
    },
    breakpoints: {
        950: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    }
});

const othersolucionesSwiper =  new Swiper('.othersoluciones .swiper-container', {
    slidesPerView: 3,
    spaceBetween: 20,
    navigation: {
        nextEl: '.othersoluciones .buttonleft',
        prevEl: '.othersoluciones .buttonright',
    },
    breakpoints: {
        950: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    }
});


const productslistSwiper = new Swiper('.productslist .swiper-container', {
    slidesPerView: 2,
    spaceBetween: 20,
    navigation: {
        nextEl: '.productslist .swip-left',
        prevEl: '.productslist .swip-right',
    },
    breakpoints: {
        1100: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    }
});

const caruseltestimonialesSwiper =  new Swiper('.caruseltestimoniales .swiper-container', {
    slidesPerView: 1,
    navigation: {
        nextEl: '.caruseltestimoniales .carouseleft',
        prevEl: '.caruseltestimoniales .carouseright',
    },
});

const profesionalesSwiper =  new Swiper('.profesionales .swiper-container', {
    slidesPerView: 1,
    navigation: {
        nextEl: '.profesionales .carouseleft',
        prevEl: '.profesionales .carouseright',
    },
});

$(".tabsheaders a").on('click', function(e) {
    e.preventDefault();
    const $this = $(this);
    const dataid = "#"+$this.attr("data-id");
    $(".tabsheaders a").removeClass("active");    
    $this.addClass("active");
    $(".tabContent").hide();
    $(dataid).show();
});
$(".tabsheaders a").eq(0).trigger("click");