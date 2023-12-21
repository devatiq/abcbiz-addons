(function ($) {
    'use strict';
    //About Skill
    var ourskill = $('.abc-skill-bar-area');

    $('.abc-progress-bar > span').each(function () {
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

})(jQuery);