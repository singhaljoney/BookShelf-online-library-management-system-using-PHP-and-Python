// <![CDATA[

// Slider 1
function car1_init_buttons(carousel) {
  jQuery('#car1-next').bind('click', function() { carousel.next(); return false; });
  jQuery('#car1-prev').bind('click', function() { carousel.prev(); return false; });
};

// Slider 2
function car2_init_buttons(carousel) {
  jQuery('#car2-next').bind('click', function() { carousel.next(); return false; });
  jQuery('#car2-prev').bind('click', function() { carousel.prev(); return false; });
};

// Slider 3
function car3_init_buttons(carousel) {
  jQuery('#car3-next').bind('click', function() { carousel.next(); return false; });
  jQuery('#car3-prev').bind('click', function() { carousel.prev(); return false; });
};

// Slider 4
function car4_init_buttons(carousel) {
  jQuery('#car4-next').bind('click', function() { carousel.next(); return false; });
  jQuery('#car4-prev').bind('click', function() { carousel.prev(); return false; });
};

$(function() {
  
  // Slider 1 (http://sorgalla.com/jcarousel/ or http://sorgalla.com/projects/jcarousel/)
  $('#car1').jcarousel({
    scroll: 1,
    wrap: 'circular',
    initCallback: car1_init_buttons,
    buttonNextHTML: null,
    buttonPrevHTML: null,
	auto: 5
  });

  // Slider 2 (http://sorgalla.com/jcarousel/ or http://sorgalla.com/projects/jcarousel/)
  $('#car2').jcarousel({
    scroll: 1,
    wrap: 'circular',
    initCallback: car2_init_buttons,
    buttonNextHTML: null,
    buttonPrevHTML: null,
	auto: 5.5
  });

  // Slider 3 (http://sorgalla.com/jcarousel/ or http://sorgalla.com/projects/jcarousel/)
  $('#car3').jcarousel({
    scroll: 1,
    wrap: 'circular',
    initCallback: car3_init_buttons,
    buttonNextHTML: null,
    buttonPrevHTML: null,
	auto: 6
  });

  // Slider 4 (http://sorgalla.com/jcarousel/ or http://sorgalla.com/projects/jcarousel/)
  $('#car4').jcarousel({
    scroll: 1,
    wrap: 'circular',
    initCallback: car4_init_buttons,
    buttonNextHTML: null,
    buttonPrevHTML: null,
	auto: 6.5
  });

});

// ]]>