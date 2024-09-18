function ABCbizSliderInitialize(uniqueId) {
    'use strict';

    var slider = document.getElementById(uniqueId);

    // Retrieve the settings from the data-settings attribute
    var settings = slider.getAttribute('data-settings');
    var parsedSettings;

    // Parse the settings JSON string
    try {
        parsedSettings = JSON.parse(settings);
    } catch (e) {
        console.error('Error parsing Swiper settings:', e);
        return;
    }

    // Initialize Swiper using the parsed settings
    new Swiper(slider.querySelector('.swiper-container'), {
        loop: parsedSettings.loop || false,        
        autoplay: parsedSettings.autoplay || false,
        pagination: parsedSettings.pagination ? {
            el: slider.querySelector('.swiper-pagination'),
            clickable: true,
        } : false,
        navigation: {
            nextEl: slider.querySelector('.swiper-button-next'),
            prevEl: slider.querySelector('.swiper-button-prev'),
            enabled: parsedSettings.arrows,  // Use the `enabled` property to toggle arrows
        },
        // Define responsive breakpoints for different slidesPerView settings
        breakpoints: {
            // When window width is >= 1024px
            1024: {
                slidesPerView: parseInt(parsedSettings.slidesPerView) || 3,
            },
            // When window width is >= 768px (tablet)
            768: {
                slidesPerView: parseInt(parsedSettings.slidesPerViewTablet) || 2,
            },
            // When window width is >= 320px (mobile)
            320: {
                slidesPerView: parseInt(parsedSettings.slidesPerViewMobile) || 1,
            }
        }
    });
}

jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/global', ($scope) => {
        var sliderElement = $scope.find('.abcbiz-addons-slider-wrapper');
        if (sliderElement.length > 0 && sliderElement.attr('id')) {
            var uniqueId = sliderElement.attr('id');  // Get the unique ID           
            ABCbizSliderInitialize(uniqueId);  // Initialize the Swiper with the unique ID
        }
    });
});