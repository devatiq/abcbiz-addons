/**
 * Initialize a Swiper instance for the posts slider.
 *
 * Retrieves the settings from the data-settings attribute of the container element,
 * parses the JSON string, and passes the settings to Swiper.
 *
 * @param {String} uniqueId - The unique ID of the posts slider element.
 */
function ABCbizPostsSliderInitialize(uniqueId) {
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

    // Initialize Swiper using the parsed settings and custom class names
    new Swiper(slider.querySelector('.abcbiz-posts-slider-container'), {
        loop: parsedSettings.loop || false,
        autoplay: parsedSettings.autoplay || false,
        pagination: {
            el: slider.querySelector('.swiper-pagination'),
            clickable: true,
        },
        navigation: {
            nextEl: slider.querySelector('.swiper-button-next'),
            prevEl: slider.querySelector('.swiper-button-prev'),
        },

        // Custom class names for container, wrapper, and slides
        containerModifierClass: 'abcbiz-posts-slider-container-', // Prefix class for container
        wrapperClass: 'abcbiz-posts-slider-wrapper',              // Custom wrapper class
        slideClass: 'abcbiz-posts-slider-single-item',             // Custom slide class

        breakpoints: {
            1024: {
                slidesPerView: parseInt(parsedSettings.slidesPerView) || 3,
            },
            768: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            }
        }
    });
}

// Activate the posts slider on Elementor frontend
jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/global', ($scope) => {
        var sliderElement = $scope.find('.abcbiz-posts-slider-area');
        if (sliderElement.length > 0 && sliderElement.attr('id')) {
            var uniqueId = sliderElement.attr('id');  // Get the unique ID           
            ABCbizPostsSliderInitialize(uniqueId);  // Initialize the Swiper with the unique ID
        }
    });
});
