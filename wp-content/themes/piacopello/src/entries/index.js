import '../scss/index.scss';
import 'swiper/dist/css/swiper.css';
import Swiper from 'swiper';

const caruseltestimonialesSwiper =  new Swiper('.carouselcontent__right .swiper-container', {
    autoplay: {
        delay: 5000,
    },
    slidesPerView: "auto"    
});
