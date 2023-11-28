import '../scss/page.scss';
import Swal from 'sweetalert2';
import 'swiper/dist/css/swiper.css';
import Swiper from 'swiper';


const solucionesSwiper2 =  new Swiper('.related .swiper-container', {
    autoplay: {
        delay: 5000,
    },
    slidesPerView: 4,
    spaceBetween: 20,
    pagination: {
        el: '.related .minepagination',
        type: 'bullets',
    },
    navigation: {
        nextEl: '.related .buttonleft',
        prevEl: '.related .buttonright',
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

const mylocation = location.href;
const $menus = $(".mainwoocommerce__left a");
for (let i=0; i<$menus.length; i++) {
    if ($menus.eq(i).attr("href") == mylocation) {
        $menus.eq(i).addClass("active");
        $menus.eq(i).closest(".wc-block-product-categories-list--depth-1").closest("li").addClass("active");        
    }
}
