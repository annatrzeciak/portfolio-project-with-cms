$('a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href')).offset().top
    }, 500);
    return false;
});
$(document).ready(function () {
    $('.slider').slick({
        dots: false,
        arrow: true,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: '<i class="arrow arrow-right"></i>',
        prevArrow: '<i class="arrow arrow-left"></i>',
        slidesToShow: 1
    });
});
