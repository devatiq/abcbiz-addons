(function($) {
    'use strict';

    // Function to initialize a specific skill circle
    function initSkillCircle(circle) {
        const $circle = $(circle);

        // Avoid re-initialization
        if ($circle.data('inited')) {
            return;
        }

        const skillValue = $circle.data('skill-value') / 100;
        const skillSize = $circle.data('skill-size');
        const skillColorOne = $circle.data('skill-color-one');
        const skillColorTwo = $circle.data('skill-color-two');
        const skillEmptyColor = $circle.data('skill-empty-color');

        // Initialize circleProgress
        $circle.circleProgress({
            value: skillValue,
            size: skillSize,
            fill: {
                gradient: [skillColorOne, skillColorTwo]
            },
            emptyFill: skillEmptyColor
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(parseInt(skillValue * 100 * progress) + '<i>%</i>');
        });

        $circle.data('inited', true);
    }

    // Document ready and Elementor frontend hook
    function initializeSkillCircles() {
        $('.abcbiz-ele-skill-circle').each(function() {
            initSkillCircle(this);
        });
    }

    // Document ready
    $(function() {
        initializeSkillCircles();
    });

    // Listen for Elementor's editor events to re-initialize
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/global', function() {
            initializeSkillCircles();
        });
    });
})(jQuery);