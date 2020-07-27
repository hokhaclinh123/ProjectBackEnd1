$(document).ready(function () {
  $('.thumbnails img').click(function() {
      $('#main-photo').attr('src',$(this).attr('src'));
  })
});