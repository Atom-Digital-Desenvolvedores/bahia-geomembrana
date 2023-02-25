$(document).ready(function() {
  $('.wq-banner_carousel').owlCarousel({
    items: 1,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true
  });
});

$(document).ready(function() {
  $('.wq-banner_depoimentos').owlCarousel({
     items: 1,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true
  });
});


$('.play').on('click',function() {
	owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function() {
	owl.trigger('stop.owl.autoplay')
})
