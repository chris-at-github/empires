// require('./Vendor/Salvattore');
require('./Vendor/SlickSlider');

var slider = $('.slider');

slider.slick({
	infinite: false,
	arrows: false,
	waitForAnimate: false,
	speed: 0,
	fade: true
});

$('#prev').on('click', function() {

});

$('#next').on('click', function() {
	slider.find('.slick-active').addClass('slick-slide-animate-out');

	setTimeout(function() {
		slider.slick('slickNext');
	}, 1000);
});