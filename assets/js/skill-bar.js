jQuery(function ($) {
    'use strict';

    //Skill bar
    var ourskill = $('.abcbiz-ele-skill-bar-area');
    ourskill.appear({ force_process: true });
  
    $('.abcbiz-ele-progress-bar > span').each(function () {
      var $this = $(this);
      var width = $(this).data('percent');
      $this.css({
        'transition': 'width 3s'
      });
      ourskill.on('appear', function () {
        setTimeout(function () {
          $this.css('width', width + '%');
        }, 500);
      });
    }); 

});