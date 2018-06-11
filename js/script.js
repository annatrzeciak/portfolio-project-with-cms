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
  var editor = CKEDITOR.replace('editor', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  });
  CKFinder.setupCKEditor(editor, '../');

});
