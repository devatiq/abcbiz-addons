jQuery(document).ready(function($) {
  "use strict";
  var showAlways = $('#abcbiz-back-to-top').hasClass('abcbiz-backtop-always');
  if (!showAlways) {
      $(window).scroll(function() {
          if ($(this).scrollTop() > 300) {
              $('#abcbiz-back-to-top').fadeIn(200);
          } else {
              $('#abcbiz-back-to-top').fadeOut(200);
          }
      });
  } else {
      $('#abcbiz-back-to-top').show();
  }
  
  $('#abcbiz-back-to-top').click(function(event) {
      event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 500);
  });
});
