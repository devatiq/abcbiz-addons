(function($) {
    'use strict';

    // Function to initialize a specific skill circle with JSON configuration
    function ABCBizinitSkillCircle(circle) {
        const $circle = $(circle);

        // Avoid re-initialization
        if ($circle.data('inited')) {
            return;
        }

        // Parse the JSON configuration
        const config = JSON.parse($circle.attr('data-circle-config'));

        // Initialize circleProgress with values from JSON
        $circle.circleProgress({
            value: config.skillValue,
            size: config.skillSize,
            fill: {
                gradient: [config.skillColorOne, config.skillColorTwo]
            },
            emptyFill: config.skillEmptyColor
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(parseInt(config.skillValue * 100 * progress) + '<i>%</i>');
        });

        $circle.data('inited', true);
    }

    // Initialize skill circles
    function ABCBizinitializeSkillCircles() {
        $('.abcbiz-ele-skill-circle').each(function() {
            ABCBizinitSkillCircle(this);
        });
    }

    $(function() {
        ABCBizinitializeSkillCircles();
    });

    // Re-initialize in Elementor's editor mode
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/global', function() {
            ABCBizinitializeSkillCircles();
        });
    });
})(jQuery);