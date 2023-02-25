$(document).ready(function() {

	$('.wq-banner_carousel').owlCarousel({
		items: 1,
		smartSpeed: 750,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		loop:true
	});
	$('.wq-projetos-carousel').owlCarousel({
		items: 1,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		loop:true
	});
	$('.wq-banner_depoimentos').owlCarousel({
		items: 1,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		loop:true
	});

	$(".wq-depoimentos_carousel").owlCarousel({
		loop: true,
		nav: false,
		margin: 30,
		navText: false,
		responsiveClass: true,
		smartSpeed: 550,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			0:{
				items: 1
			},
			500:{
				items: 2
			},
			740:{
				items: 3
			},
			1000:{
				items: 3
			}
		}
	});
	$(".wq-parceiros-carousel").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		margin: 30,
		navText: false,
		responsiveClass: true,
		smartSpeed: 550,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause:true,
	});

});


$(function(){

	$(window).scroll(function(){
		if($(this).scrollTop()>110){
			$('.wq-header').each(function(){
				$(this).addClass("wq-header_fixo")
			}
		)}else{
			$('.wq-header').each(function(){
				$(this).removeClass("wq-header_fixo")
			})
		};
	});
	$(window).scroll();

});
