$('a.nav-link').click(function() {
  $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top
  }, 500);
  return false;
});
$(document).ready(function() {
  if ($('.slider')) {
    $('.slider').slick({
      dots: false,
      arrow: true,
      autoplay: true,
      autoplaySpeed: 3000,
      nextArrow: '<i class="arrow arrow-right"></i>',
      prevArrow: '<i class="arrow arrow-left"></i>',
      slidesToShow: 1
    });
  }
 ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );

});
