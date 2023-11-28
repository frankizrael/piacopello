// Import styles
import './scss/app.scss';
// Import scripts
import 'swiper/dist/css/swiper.css';
import Swiper from 'swiper';


//header
	function scrollAnimated(){
		var lastScrollTop = 0, delta = 20;
		$(window).on('scroll',function(){
			var nowScrollTop = $(this).scrollTop();
			if (nowScrollTop > 50){
				$('header').addClass('animated');
			} else {
				$('header').removeClass('animated');
			}
		});
	}
	scrollAnimated();
//another ios
	var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	if (iOS) {
	 	//
	}
	//Js animation by Frankzua
    $("#letrasMP").addClass("active");  
    setTimeout(function(){        
        $("#letrasC").addClass("active"); 
    }, 300);  
    setTimeout(function(){        
        $(".pathFillletter").addClass("active"); 
    }, 500); 
    setTimeout(function(){
        $("#letrasMP").addClass("activeback");
        $("#letrasC").addClass("activeback"); 
        $(".pathFillletter").addClass("activeback");
    },1800);
    setTimeout(function(){
        $(".preload").addClass("active");
    }, 2800);

//scroll
	/*$('.anchor a').on('click', function(event){
      	event.preventDefault();
      	let $this = $(this);
      	let href = $this.attr('href');
      	$('html, body').stop().animate({scrollTop: $(href).offset().top - 130}, 800);
 	});*/
	
//header animation
	

//credits
console.log("ღ Pia Copello! ღ \n Dev con Amor por wampy para DigitalCook");

/* MENU RESPONSIVE */

