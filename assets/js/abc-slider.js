function ABCbizSliderInitialize(uniqueId) {
    'use strict';

    var slider = document.getElementById(uniqueId);
    var slidesPerView = slider.getAttribute('data-slides-per-view');
    var loop = slider.getAttribute('data-loop') === 'true';
    var autoplayConfig = JSON.parse(slider.getAttribute('data-autoplay'));

    new Swiper(slider.querySelector('.swiper-container'), {
        loop: loop,
        slidesPerView: parseInt(slidesPerView) || 1,
        autoplay: autoplayConfig,
        pagination: {
            el: slider.querySelector('.swiper-pagination'),
            clickable: true,
        },
        navigation: {
            nextEl: slider.querySelector('.swiper-button-next'),
            prevEl: slider.querySelector('.swiper-button-prev'),
        },
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