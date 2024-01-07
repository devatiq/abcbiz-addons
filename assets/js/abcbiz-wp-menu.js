jQuery(function ($) {
    'use strict';
  
    $("#abcbiz-responsive-menu").click(function () {
      $("#abcbiz-mobilemenu").slideToggle("slow");
    });
    $('#abcbiz-mobilemenu .menu-item-has-children').append('<span class="sub-toggle"> <i class="eicon-caret-right"></i> </span>');
    $('#abcbiz-mobilemenu .sub-toggle').click(function () {
      $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
      $(this).children('.eicon-caret-right').first().toggleClass('eicon-caret-down');
    });
  
  });