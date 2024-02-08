jQuery(function ($) {
  'use strict';

  $(".abcbiz-responsive-menu").click(function () {
      // Use `next` to target the immediately following `.abcbiz-mobilemenu` relative to the clicked `.abcbiz-responsive-menu`
      $(this).next(".abcbiz-mobilemenu").slideToggle("slow");
  });

  $('.abcbiz-mobilemenu .menu-item-has-children').append('<span class="sub-toggle"> <i class="eicon-caret-right"></i> </span>');
  
  $('.abcbiz-mobilemenu').on('click', '.sub-toggle', function () {
      $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
      $(this).children('.eicon-caret-right').first().toggleClass('eicon-caret-down');
  });
});
