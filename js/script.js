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
  tinymce.init({
     selector: '#editor',
     language : 'pl',
     plugins: 'code image link',
     toolbar: "formatselect | epi-personalized-content epi-link anchor numlist bullist indent outdent bold italic underline link alignleft aligncenter alignright | image epi-image-editor media code | epi-dnd-processor | removeformat | fullscreen ",
     images_upload_url: '/upload.php',
     images_upload_base_path: '/images',
     images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/upload.php');
        xhr.onload = function() {
          var json;

          if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
          }
          json = JSON.parse(xhr.responseText);

          if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
          }
          console.log(json.location);
          success('/'+json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
      }
   });
});
function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
